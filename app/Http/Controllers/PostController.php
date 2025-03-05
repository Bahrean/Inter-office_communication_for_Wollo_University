<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function AdminPosts2()
    {
        $post = Post::all();
        return view('admin.post2', compact('post'));
    }

    public function AdminPostComment($post)
    {
        $post = Post::findOrFail($post);
        return view('admin.post.comment', compact('post'));
    }

    public function AdminAddPost()
    {
        return view('admin.post.addpost');
    }

    public function AdminPostStore(Request $request)
    {
        $request->validate([
            'heading' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate photo upload
            'description' => 'required|string',
            'like' => 'nullable|string',
            'dislike' => 'nullable|string',
            'comment' => 'nullable|string',
            'posted_by_name' => 'nullable|string|max:255',
            'posted_by_email' => 'nullable|email|max:255', // Validate as email
            'posted_by_photo' => 'nullable|string',
        ]);

        // Initialize the photo file name variable
        $photoFileName = null;

        // Handle photo upload if present
        if ($request->hasFile('photo')) {
            // Generate a unique name for the file
            $photoFileName =
                time() . '_' . $request->file('photo')->getClientOriginalName();

            // Define the upload path
            $destinationPath = public_path('upload/posts');

            // Ensure the directory exists
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            // Move the uploaded file to the destination path
            $request->file('photo')->move($destinationPath, $photoFileName);
        }

        // Save post data into the database
        $post = Post::create([
            'heading' => $request->heading,
            'photo' => $photoFileName, // Save only the file name
            'description' => $request->description,
            'like' => $request->like,
            'dislike' => $request->dislike,
            'comment' => $request->comment,
            'posted_by_name' => $request->posted_by_name,
            'posted_by_email' => $request->posted_by_email,
            'posted_by_photo' => $request->posted_by_photo,
        ]);

        if (!$post) {
            return back()->withErrors([
                'error' => 'Failed to save the post. Please try again.',
            ]);
        }

        // Create a success notification
        $notification = [
            'message' => 'New Post created successfully!',
            'alert-type' => 'success',
        ];

        // Redirect to the intended route with a success message
        return redirect()
            ->route('admin.dashboard')
            ->with($notification);
    }

    public function AdminEditPost()
    {
    }

    public function AdminDeletePost()
    {
    }

    public function StuffPosts()
    {
        $post = Post::all();
        return view('stuff.posts', compact('post'));
    }

    public function StuffCollagePosts()
    {
    }
    //
}
