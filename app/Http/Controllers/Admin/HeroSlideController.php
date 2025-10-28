<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSlide;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;

class HeroSlideController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = HeroSlide::orderBy('order')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('id', function ($slide) {
                    return $slide->id;
                })
                ->addColumn('title', function ($slide) {
                    return $slide->title;
                })
                ->addColumn('image', function ($slide) {
                    if ($slide->image) {
                        return "<img src='/storage/hero-slides/{$slide->image}' style='width: 120px; height: 80px; border-radius:5px; object-fit: cover;' alt='Hero Slide' />";
                    } else {
                        return '<span class="badge badge-secondary">No Image</span>';
                    }
                })
                ->addColumn('status', function ($slide) {
                    return $slide->is_active 
                        ? '<span class="badge badge-success">Active</span>'
                        : '<span class="badge badge-secondary">Inactive</span>';
                })
                ->addColumn('action', function ($slide) {
                    return '<div class="d-flex justify-content-center gap-2">' .
                        '<button type="button" class="btn btn-info btn-sm viewSlideBtn" data-id="' . $slide->id . '" data-toggle="modal" data-target="#viewSlideModal">' .
                        '<i class="fas fa-eye"></i>' .
                        '</button>' .
                        '<button type="button" class="btn btn-warning btn-sm editSlideBtn" data-id="' . $slide->id . '">' .
                        '<i class="fas fa-edit"></i>' .
                        '</button>' .
                        '<form action="' . route('admin.hero-slides.destroy', $slide->id) . '" method="POST" style="display:inline;" onsubmit="return confirm(\'Are you sure?\')">' .
                        csrf_field() .
                        method_field('DELETE') .
                        '<button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>' .
                        '</form>' .
                        '</div>';
                })
                ->rawColumns(['image', 'status', 'action'])
                ->make(true);
        }
        return view('backend.pages.hero-slides.index');
    }

    
    public function create()
    {
        
    }

    
    public function store(Request $request)
    {
        // Check if GD extension is loaded
        if (!extension_loaded('gd') || !function_exists('gd_info')) {
            return response()->json([
                'status' => 'error',
                'message' => 'GD extension is not installed or enabled on your server. Please enable the GD extension in your PHP configuration.'
            ], 500);
        }

        \Log::info('HeroSlide Store Request:', $request->all());
        
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'subtitle' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'button_text' => 'nullable|string|max:50',
                'button_url' => 'nullable|url|max:255',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'is_active' => 'boolean',
                'order' => 'integer|min:0'
            ]);
            
            \Log::info('Validation passed', $validated);
            $imageName = null;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = 'hero-slide-' . time() . '.' . $image->getClientOriginalExtension();
                
                // Store the original image
                $image->storeAs('public/hero-slides', $imageName);
                
                // Create image manager with desired driver
                $manager = new ImageManager(new Driver());
                
                // Read the image
                $img = $manager->read($image->getRealPath());
                
                // Resize the image
                $img->scaleDown(1920, 1080);
                
                // Save the resized image
                $img->save(storage_path('app/public/hero-slides/' . $imageName));
            }

            // Check if image was uploaded
            if (empty($imageName)) {
                throw new \Exception('No image was uploaded or there was an error processing the image.');
            }

            // Create the hero slide
            $slideData = [
                'title' => $validated['title'],
                'subtitle' => $validated['subtitle'] ?? null,
                'description' => $validated['description'] ?? null,
                'button_text' => $validated['button_text'] ?? null,
                'button_url' => $validated['button_url'] ?? null,
                'image' => $imageName,
                'is_active' => $validated['is_active'] ?? true,
                'order' => $validated['order'] ?? 0,
            ];

            \Log::info('Creating hero slide with data:', $slideData);
            
            $slide = HeroSlide::create($slideData);
            \Log::info('Hero slide created successfully', ['id' => $slide->id]);

            return response()->json([
                'status' => 'success',
                'message' => 'Hero slide created successfully.',
                'data' => $slide
            ]);
        } catch (\Exception $e) {
            \Log::error('Error in HeroSlideController@store: ' . $e->getMessage());
            \Log::error($e->getTraceAsString());
            
            return response()->json([
                'status' => 'error',
                'message' => 'Error creating hero slide: ' . $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ], 500);
        }
    }

    public function show($id)
    {
        $slide = HeroSlide::findOrFail($id);
        return response()->json($slide);
    }

    
    public function edit($id)
    {
        $slide = HeroSlide::findOrFail($id);
        return response()->json($slide);
    }

    
    public function update(Request $request, $id)
    {
        // Check if GD extension is loaded
        if (!extension_loaded('gd') || !function_exists('gd_info')) {
            return response()->json([
                'status' => 'error',
                'message' => 'GD extension is not installed or enabled on your server. Please enable the GD extension in your PHP configuration.'
            ], 500);
        }

        $slide = HeroSlide::findOrFail($id);
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'button_text' => 'nullable|string|max:50',
            'button_url' => 'nullable|url|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'is_active' => 'boolean',
            'order' => 'integer|min:0'
        ]);

        try {
            $updateData = [
                'title' => $validated['title'],
                'subtitle' => $validated['subtitle'] ?? null,
                'description' => $validated['description'] ?? null,
                'button_text' => $validated['button_text'] ?? null,
                'button_url' => $validated['button_url'] ?? null,
                'is_active' => $validated['is_active'] ?? true,
                'order' => $validated['order'] ?? 0,
            ];

            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($slide->image && Storage::exists('public/hero-slides/' . $slide->image)) {
                    Storage::delete('public/hero-slides/' . $slide->image);
                }

                $image = $request->file('image');
                $imageName = 'hero-slide-' . time() . '.' . $image->getClientOriginalExtension();
                
                // Store the original image
                $image->storeAs('public/hero-slides', $imageName);
                
                // Create image manager with desired driver
                $manager = new ImageManager(new Driver());
                
                // Read the image
                $img = $manager->read($image->getRealPath());
                
                // Resize the image
                $img->scaleDown(1920, 1080);
                
                // Save the resized image
                $img->save(storage_path('app/public/hero-slides/' . $imageName));
                
                $updateData['image'] = $imageName;
            }

            $slide->update($updateData);

            return response()->json([
                'status' => 'success',
                'message' => 'Hero slide updated successfully.',
                'data' => $slide
            ]);
        } catch (\Exception $e) {
            \Log::error('Error updating hero slide: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Error updating hero slide: ' . $e->getMessage()
            ], 500);
        }
    }

    
    public function destroy($id)
    {
        try {
            $slide = HeroSlide::findOrFail($id);
            
            // Delete image if exists
            if ($slide->image && Storage::exists('public/hero-slides/' . $slide->image)) {
                Storage::delete('public/hero-slides/' . $slide->image);
            }
            
            $slide->delete();
            
            return response()->json(['success' => 'Hero slide deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error deleting hero slide: ' . $e->getMessage()], 500);
        }
    }
}
