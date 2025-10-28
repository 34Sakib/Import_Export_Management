<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FooterSettingController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Footer::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('logo', function($footer) {
                    if ($footer->logo) {
                        return '<img src="'.asset('images/'.$footer->logo).'" style="width: 50px; height: 50px; border-radius: 5px; object-fit: cover;" alt="Footer Logo">';
                    }
                    return '<span class="badge badge-secondary">No Logo</span>';
                })
                ->addColumn('social_links', function($footer) {
                    $links = [];
                    if ($footer->facebook) $links[] = '<a href="'.$footer->facebook.'" target="_blank" class="btn btn-sm btn-primary"><i class="fab fa-facebook"></i></a>';
                    if ($footer->twitter) $links[] = '<a href="'.$footer->twitter.'" target="_blank" class="btn btn-sm btn-info"><i class="fab fa-twitter"></i></a>';
                    if ($footer->instagram) $links[] = '<a href="'.$footer->instagram.'" target="_blank" class="btn btn-sm btn-danger"><i class="fab fa-instagram"></i></a>';
                    if ($footer->youtube) $links[] = '<a href="'.$footer->youtube.'" target="_blank" class="btn btn-sm btn-danger"><i class="fab fa-youtube"></i></a>';
                    return implode(' ', $links);
                })
                ->addColumn('action', function($footer) {
                    return '<div class="btn-group">
                        <button type="button" class="btn btn-warning btn-sm editBtn" data-id="'.$footer->id.'">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button type="button" class="btn btn-danger btn-sm deleteBtn" data-id="'.$footer->id.'">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </div>';
                })
                ->rawColumns(['logo', 'social_links', 'action'])
                ->make(true);
        }
        
        return view('backend.footer.index');
    }

    public function store(Request $request)
    {
        // Check if a footer setting already exists
        if (Footer::count() > 0) {
            return response()->json([
                'success' => false,
                'message' => 'Only one footer setting is allowed. Please update the existing one.'
            ], 422);
        }

        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'facebook' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'youtube' => 'nullable|url|max:255',
        ]);

        try {
            $data = $request->except('_token', 'logo');
            
            if ($request->hasFile('logo')) {
                $image = $request->file('logo');
                $imageName = 'footer-logo-' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $imageName);
                $data['logo'] = $imageName;
            }

            Footer::create($data);
            
            return response()->json([
                'success' => true,
                'message' => 'Footer settings created successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    public function edit($id)
    {
        $footer = Footer::findOrFail($id);
        return response()->json($footer);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'facebook' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'youtube' => 'nullable|url|max:255',
        ]);

        try {
            $footer = Footer::findOrFail($id);
            $data = $request->except('_token', 'logo', '_method');
            
            if ($request->hasFile('logo')) {
                // Delete old logo if exists
                if ($footer->logo && file_exists(public_path('images/' . $footer->logo))) {
                    unlink(public_path('images/' . $footer->logo));
                }
                
                $image = $request->file('logo');
                $imageName = 'footer-logo-' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $imageName);
                $data['logo'] = $imageName;
            }

            $footer->update($data);
            
            return response()->json([
                'success' => true,
                'message' => 'Footer settings updated successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $footer = Footer::findOrFail($id);
            
            // Delete logo if exists
            if ($footer->logo && file_exists(public_path('images/' . $footer->logo))) {
                unlink(public_path('images/' . $footer->logo));
            }
            
            $footer->delete();
            
            return response()->json([
                'success' => true,
                'message' => 'Footer settings deleted successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
}
