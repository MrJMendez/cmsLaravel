<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admin.index');
    }
    public function display()
    {
        if (auth()->user()->isAdmin()) {
            $posts = Post::all();
            return view('admin.all_posts_view', ['posts' => $posts]);
        }

        $posts = auth()->user()->posts;

        return view('admin.all_posts_view', ['posts' => $posts]);
    }
    public function create()
    {
        return view('admin.create_post');
    }

    public function store(Request $request)
    {
        $input =  $request->validate([
            'title' => "required|max:255",
            'content' => "required",
            'file_path' => 'file',
            'p_date' => "required",
            'p_status' => "required"
        ]);

        $input['author_first_name'] =  auth()->user()->first_name;
        $input['author_last_name'] =  auth()->user()->last_name;

        if ($file = $request->file('file_path')) {
            $input['file_path'] = $file->getClientOriginalName();
            $file->move('images', $file->getClientOriginalName());
        }

        auth()->user()->posts()->create($input);
        $request->session()->flash('post_created', 'Post created successfully');

        return redirect()->route('allPosts');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();
        session()->flash('post_deleted', 'Post deleted successfully');
        return redirect()->route('allPosts');
    }

    public function edit(Post $post)
    {
        return view('admin.edit_post', ['post' => $post]);
    }

    public function update(Post $post, Request $request)
    {
        // if ($request->user()->cannot('update', $post)) {
        //     abort(403);
        // }

        /* The if statement above and this authorize call below accomplishes
         the same thing */
        $this->authorize('update', $post);

        $input =  $request->validate([
            'title' => "required|max:255",
            'content' => "required",
            'file_path' => 'file',
            'p_date' => "required",
            'p_status' => "required"
        ]);

        if ($file = $request->file('file_path')) {
            $input['file_path'] = $file->getClientOriginalName();
            $file->move('images', $file->getClientOriginalName());
        }

        $post->update($input);
        session()->flash('post_updated', 'Post updated successfully');
        return redirect()->route('allPosts');
    }
}
