<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Service::orderBy('created_at', 'desc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('id', function ($event) {
                    return $event->id;
                })
                ->addColumn('title', function ($event) {
                    return $event->title;
                })
                ->addColumn('description', function ($event) {
                    $description = $event->description;
                    if (strlen($description) > 60) {
                        return substr($description, 0, 60) . '...';
                    }
                    return $description;
                })
                ->addColumn('image', function ($event) {
                    if ($event->image && $event->image !== 'nophoto.png') {
                        return "<img src='/images/{$event->image}' style='width: 80px; height: 80px; border-radius:5px; object-fit: cover;' alt='Service Image' />";
                    } else {
                        return '<span class="badge badge-secondary">No Image</span>';
                    }
                })
                ->addColumn('action', function ($service) {
                    return '<div style="display:flex; justify-content:center; gap:10px;">' .
                           '<a href="'.route('admin.service.show',$service->id).'" class="btn btn-success"><i class="fas fa-eye"></i></a>' .
                           '<a href="'.route('admin.service.edit',$service->id).'" class="btn btn-info"><i class="fas fa-edit"></i></a>' .
                           '<form action="'.route('admin.service.destroy', $service->id).'" method="POST" style="display:inline;" onsubmit="return confirm(\'Are you sure you want to delete this service?\')">' .
                           '<input type="hidden" name="_token" value="'.csrf_token().'">' .
                           '<input type="hidden" name="_method" value="DELETE">' .
                           '<button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>' .
                           '</form>' .
                           '</div>';
                })
                ->rawColumns(['id','title', 'description', 'image', 'action'])
                ->make(true);
        }
        return view('backend.pages.service.list');
    }

    public function testDataTables()
    {
        return view('backend.pages.service.test_datatables');
    }

    public function create()
    {
        return view('backend.pages.service.create');
    }

    public function store(Request $request) {
        try {
            // Validate input
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'image' => 'nullable|mimes:jpeg,png,avif,jpg,gif,svg,webp|max:2048',
            ]);
    
            $service = new Service();
    
            // Handle image upload if a new image is provided
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move('images', $imageName);
                $service->image = $imageName;
            } else {
                $service->image = 'nophoto.png';
            }
    
            // Set other fields
            $service->title = $request->input('title');
            $service->description = $request->input('description') ?? 'No description';
    
            $result = $service->save();
    
            if ($result) {
                return back()->with('success', 'Service created successfully.');
            } else {
                throw new \Exception('Failed to save service to database.');
            }
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Service creation failed: ' . $e->getMessage());
            return back()->with('error', $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            // Validate input
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'image' => 'nullable|mimes:jpeg,png,avif,jpg,gif,svg,webp|max:2048',
            ]);

            $service = Service::findOrFail($id);

            // Handle image upload if a new image is provided
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move('images', $imageName);
                $service->image = $imageName;
            }

            // Update other fields
            $service->title = $request->input('title');
            $service->description = $request->input('description') ?? 'No description';

            $result = $service->save();

            if ($result) {
                return back()->with('success', 'Service updated successfully.');
            } else {
                throw new \Exception('Failed to update service in database.');
            }
        } catch (\Exception $e) {
            Log::error('Service update failed: ' . $e->getMessage());
            return back()->with('error', $e->getMessage());
        }
    }

    public function show($id)
    {
        $service = Service::findOrFail($id);
        return view('backend.pages.service.show', compact('service'));
    }

    public function edit($id){
        $service = Service::findOrFail($id);
        return view("backend.pages.service.edit", compact('service'));
    } 

    public function destroy($id)
    {
        try {
            $service = Service::findOrFail($id);
            $service->delete();
            return redirect()->back()->with('success', 'Service deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Service deletion failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Service not found or could not be deleted.');
        }
    }

}
