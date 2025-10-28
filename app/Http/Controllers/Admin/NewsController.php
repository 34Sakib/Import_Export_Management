<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Log;

class NewsController extends Controller
{
    /**
     * Display a listing of the news.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = News::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('id', function ($news) {
                    return $news->id;
                })
                ->addColumn('title', function ($news) {
                    return $news->title;
                })
                ->addColumn('short_description', function ($news) {
                    $description = $news->short_description;
                    if (strlen($description) > 60) {
                        return substr($description, 0, 60) . '...';
                    }
                    return $description;
                })
                ->addColumn('publish_date', function ($news) {
                    return $news->publish_date ? $news->publish_date->format('M d, Y') : 'Not set';
                })
                ->addColumn('status', function ($news) {
                    $status = $news->is_published ? 'Published' : 'Draft';
                    $color = $news->is_published ? 'success' : 'warning';
                    return '<span class="badge badge-' . $color . '">' . $status . '</span>';
                })
                ->addColumn('image', function ($news) {
                    if ($news->image) {
                        return "<img src='" . asset('images/' . $news->image) . "' style='width: 80px; height: 80px; border-radius:5px; object-fit: cover;' alt='News Image' />";
                    } else {
                        return '<span class="badge badge-secondary">No Image</span>';
                    }
                })
                ->addColumn('action', function ($news) {
                    return '<div style="display:flex; justify-content:center; gap:10px;">' .
                        '<button type="button" class="btn btn-info btn-sm viewNewsBtn" data-id="' . $news->id . '" data-toggle="tooltip" title="View"><i class="fas fa-eye"></i></button>' .
                        '<button type="button" class="btn btn-warning btn-sm editNewsBtn" data-id="' . $news->id . '" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></button>' .
                        '<form action="' . route('admin.news.destroy', $news->id) . '" method="POST" style="display:inline;" onsubmit="return confirm(\'Are you sure you want to delete this news item?\')">' .
                        csrf_field() .
                        method_field('DELETE') .
                        '<button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></button>' .
                        '</form>' .
                        '</div>';
                })
                ->rawColumns(['status', 'image', 'action'])
                ->make(true);
        }

        return view('backend.pages.news.index');
    }

    /**
     * Show the form for creating a new news item.
     */
    public function create()
    {
        // This will be handled by modal
        return response()->json([
            'status' => 'success',
            'html' => view('backend.pages.news.create')->render()
        ]);
    }

    /**
     * Store a newly created news item in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'short_description' => 'required|string|max:500',
                'content' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'publish_date' => 'required|date',
                'is_published' => 'boolean',
                'meta_title' => 'nullable|string|max:255',
                'meta_description' => 'nullable|string|max:500',
                'meta_keywords' => 'nullable|string|max:255',
            ]);

            // Handle image upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $imageName);
                $validated['image'] = $imageName;
            }

            // Set default values if not provided
            $validated['is_published'] = $request->has('is_published') ? true : false;
            $validated['slug'] = Str::slug($validated['title']);

            // Create the news
            $news = News::create($validated);

            return response()->json([
                'status' => 'success',
                'message' => 'News created successfully!',
                'data' => $news
            ]);

        } catch (\Exception $e) {
            Log::error('Error creating news: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Error creating news: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified news item.
     */
    public function show($id)
    {
        try {
            $news = News::findOrFail($id);
            return response()->json([
                'status' => 'success',
                'data' => $news
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'News not found'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified news item.
     */
    public function edit($id)
    {
        try {
            $news = News::findOrFail($id);
            
            // Return the edit form with news data
            return response()->json([
                'status' => 'success',
                'html' => view('backend.pages.news.edit', compact('news'))->render()
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'News not found: ' . $e->getMessage()
            ], 404);
        }
    }

    /**
     * Update the specified news item in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $news = News::findOrFail($id);
            
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'short_description' => 'required|string|max:500',
                'content' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'publish_date' => 'required|date',
                'is_published' => 'boolean',
                'meta_title' => 'nullable|string|max:255',
                'meta_description' => 'nullable|string|max:500',
                'meta_keywords' => 'nullable|string|max:255',
            ]);

            // Handle image upload
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($news->image && file_exists(public_path('images/' . $news->image))) {
                    unlink(public_path('images/' . $news->image));
                }
                
                $image = $request->file('image');
                $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $imageName);
                $validated['image'] = $imageName;
            } else if ($request->has('remove_image') && $request->remove_image == '1') {
                // If remove_image flag is set, remove the image
                if ($news->image && file_exists(public_path('images/' . $news->image))) {
                    unlink(public_path('images/' . $news->image));
                }
                $validated['image'] = null;
            }

            // Set published status
            $validated['is_published'] = $request->has('is_published') ? true : false;
            
            // Update the news
            $news->update($validated);

            return response()->json([
                'status' => 'success',
                'message' => 'News updated successfully!',
                'data' => $news
            ]);

        } catch (\Exception $e) {
            Log::error('Error updating news: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Error updating news: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified news item from storage.
     */
    public function destroy($id)
    {
        try {
            $news = News::findOrFail($id);
            
            // Delete the image if it exists
            if ($news->image && file_exists(public_path('images/' . $news->image))) {
                unlink(public_path('images/' . $news->image));
            }
            
            $news->delete();
            
            return redirect()->route('admin.news.index')
                ->with('success', 'News deleted successfully!');
            
        } catch (\Exception $e) {
            Log::error('Error deleting news: ' . $e->getMessage());
            return redirect()->route('admin.news.index')
                ->with('error', 'Error deleting news: ' . $e->getMessage());
        }
    }
}
