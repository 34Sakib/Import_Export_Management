<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $testimonials = Testimonial::latest()->get();
            return DataTables::of($testimonials)
                ->addIndexColumn()
                ->addColumn('name', function ($testimonial) {
                    return $testimonial->name;
                })
                ->addColumn('company', function ($testimonial) {
                    return $testimonial->company ?? 'N/A';
                })
                ->addColumn('rating', function ($testimonial) {
                    return str_repeat('★', $testimonial->rating) . str_repeat('☆', 5 - $testimonial->rating);
                })
                ->addColumn('status', function ($testimonial) {
                    $status = $testimonial->is_active ? 'Active' : 'Inactive';
                    $color = $testimonial->is_active ? 'success' : 'danger';
                    return '<span class="badge badge-' . $color . '">' . $status . '</span>';
                })
                ->addColumn('featured', function ($testimonial) {
                    $featured = $testimonial->is_featured ? 'Featured' : 'Regular';
                    $color = $testimonial->is_featured ? 'primary' : 'secondary';
                    return '<span class="badge badge-' . $color . '">' . $featured . '</span>';
                })
                ->addColumn('image', function ($testimonial) {
                    $imageUrl = $testimonial->image_url;
                    return '<img src="' . $imageUrl . '" alt="' . $testimonial->name . '" class="img-thumbnail" style="width: 60px; height: 60px; object-fit: cover;">';
                })
                ->addColumn('action', function ($testimonial) {
                    $btn = '<button type="button" class="btn btn-sm btn-primary btn-edit" data-id="' . $testimonial->id . '" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></button>';
                    $btn .= ' <button type="button" class="btn btn-sm btn-danger btn-delete" data-id="' . $testimonial->id . '" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></button>';
                    return $btn;
                })
                ->rawColumns(['status', 'featured', 'image', 'action'])
                ->make(true);
        }
        
        return view('backend.pages.testimonial.index');
    }

    /**
     * Get testimonial data for edit
     */
    public function getTestimonial($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return response()->json($testimonial);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'content' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $data = $request->except('_token');
            
            // Handle image upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . Str::slug($request->name) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/testimonials'), $imageName);
                $data['image'] = $imageName;
            }
            
            $testimonial = Testimonial::create($data);
            
            return response()->json([
                'success' => true,
                'message' => 'Testimonial created successfully!',
                'data' => $testimonial
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error creating testimonial: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'content' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $data = $request->except(['_token', '_method']);
            
            // Handle image upload
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($testimonial->image && file_exists(public_path('images/testimonials/' . $testimonial->image))) {
                    unlink(public_path('images/testimonials/' . $testimonial->image));
                }
                
                $image = $request->file('image');
                $imageName = time() . '_' . Str::slug($request->name) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/testimonials'), $imageName);
                $data['image'] = $imageName;
            }
            
            $testimonial->update($data);
            
            return response()->json([
                'success' => true,
                'message' => 'Testimonial updated successfully!',
                'data' => $testimonial
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error updating testimonial: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $testimonial = Testimonial::findOrFail($id);
            
            // Delete image if exists
            if ($testimonial->image && file_exists(public_path('images/testimonials/' . $testimonial->image))) {
                unlink(public_path('images/testimonials/' . $testimonial->image));
            }
            
            $testimonial->delete();
            
            return response()->json([
                'success' => true,
                'message' => 'Testimonial deleted successfully!'
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting testimonial: ' . $e->getMessage()
            ], 500);
        }
    }
}
