<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = BlogPost::orderBy('created_at', 'desc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('id', function ($post) {
                    return $post->id;
                })
                ->addColumn('title', function ($post) {
                    return $post->title;
                })
                ->addColumn('status', function ($post) {
                    $badgeClass = [
                        'draft' => 'secondary',
                        'published' => 'success',
                        'archived' => 'warning'
                    ][$post->status] ?? 'secondary';

                    return '<span class="badge badge-' . $badgeClass . '">' . ucfirst($post->status) . '</span>';
                })
                ->addColumn('featured_image', function ($post) {
                    if ($post->featured_image) {
                        return "<img src='/images/{$post->featured_image}' style='width: 80px; height: 80px; border-radius:5px; object-fit: cover;' alt='Blog Post Image' />";
                    } else {
                        return '<span class="badge badge-secondary">No Image</span>';
                    }
                })
                ->addColumn('action', function ($post) {
                    return '<div style="display:flex; justify-content:center; gap:10px;">' .
                        '<a href="' . route('admin.blog-posts.show', $post->id) . '" class="btn btn-success"><i class="fas fa-eye"></i></a>' .
                        '<button type="button" class="btn btn-warning editBlogBtn" data-id="' . $post->id . '">
                         <i class="fas fa-edit"></i>
                         </button>' .
                        '<form action="' . route('admin.blog-posts.destroy', $post->id) . '" method="POST" style="display:inline;" onsubmit="return confirm(\'Are you sure?\')">' .
                        csrf_field() .
                        method_field('DELETE') .
                        '<button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>' .
                        '</form>' .
                        '</div>';
                })

                ->rawColumns(['status', 'featured_image', 'action'])
                ->make(true);
        }
        return view('backend.pages.blog_posts.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.blog_posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
                'excerpt' => 'nullable|string',
                'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'status' => 'required|in:draft,published,archived',
                'published_at' => 'nullable|date',
                'meta_title' => 'nullable|string|max:255',
                'meta_description' => 'nullable|string',
                'meta_keywords' => 'nullable|string',
            ]);

            $post = new BlogPost();
            $post->title = $validated['title'];
            $post->slug = Str::slug($validated['title']) . '-' . time();
            $post->content = $validated['content'];
            $post->excerpt = $validated['excerpt'] ?? null;
            $post->status = $validated['status'];
            $post->published_at = $validated['published_at'] ?? now();
            $post->meta_title = $validated['meta_title'] ?? null;
            $post->meta_description = $validated['meta_description'] ?? null;
            $post->meta_keywords = $validated['meta_keywords'] ?? null;

            // Handle featured image upload
            if ($request->hasFile('featured_image')) {
                $image = $request->file('featured_image');
                $imageName = 'blog-' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $imageName);
                $post->featured_image = $imageName;
            }

            $post->save();

            return redirect()->route('admin.blog-posts.index')
                ->with('success', 'Blog post created successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Error creating blog post: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = BlogPost::findOrFail($id);
        return view('backend.pages.blog_posts.show', compact('post'));
    }

    public function ajaxEdit($id)
    {
        $post = BlogPost::findOrFail($id);
        return view('backend.pages.blog_posts.partials.edit_form', compact('post'));
    }
    public function edit($id)
    {
        $post = BlogPost::findOrFail($id);
        return view('backend.pages.blog_posts.edit', compact('post'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $post = BlogPost::findOrFail($id);

            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
                'excerpt' => 'nullable|string',
                'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'status' => 'required|in:draft,published,archived',
                'published_at' => 'nullable|date',
                'meta_title' => 'nullable|string|max:255',
                'meta_description' => 'nullable|string',
                'meta_keywords' => 'nullable|string',
            ]);

            $post->title = $validated['title'];
            $post->content = $validated['content'];
            $post->excerpt = $validated['excerpt'] ?? null;
            $post->status = $validated['status'];
            $post->published_at = $validated['published_at'] ?? $post->published_at;
            $post->meta_title = $validated['meta_title'] ?? null;
            $post->meta_description = $validated['meta_description'] ?? null;
            $post->meta_keywords = $validated['meta_keywords'] ?? null;

            // Handle featured image update
            if ($request->hasFile('featured_image')) {
                // Delete old image if exists
                if ($post->featured_image && file_exists(public_path('images/' . $post->featured_image))) {
                    unlink(public_path('images/' . $post->featured_image));
                }

                $image = $request->file('featured_image');
                $imageName = 'blog-' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $imageName);
                $post->featured_image = $imageName;
            }

            $post->save();

            return redirect()->route('admin.blog-posts.index')
                ->with('success', 'Blog post updated successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Error updating blog post: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $post = BlogPost::findOrFail($id);

            // Delete the featured image if it exists
            if ($post->featured_image && file_exists(public_path('images/' . $post->featured_image))) {
                unlink(public_path('images/' . $post->featured_image));
            }

            $post->delete();

            return response()->json(['success' => true, 'message' => 'Blog post deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error deleting blog post: ' . $e->getMessage()], 500);
        }
    }
}
