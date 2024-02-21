<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(7);
        return view('posts.index', compact('posts'));
    }

    public function home()
    {
        $posts = Post::All();
        return view('home', compact('posts'));
    }

    public function postshow($id)
    {
        $post = Post::findOrFail($id);
        return view('post', compact('post'));
    }

    public function create()
    {
        return view('posts.add');
    }

    public function search(Request $request)
    {
        $q = $request->search;
        $posts = Post::Where('description', 'LIKE', '%' . $q . '%')->get();
        return view('posts.search', compact('posts'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required | min:3 | max:50 | string',
            'description' => 'required | min:5 | max:1000 | string',
            'user_id' => ['required', 'exists:users,id']
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = $request->user_id;
        $post->save();
        return back()->with('success', 'Post Added Successfully');
    }
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }
    public function update($id, Request $request)
    {
        $post = Post::findOrFail($id);
        //Validate the request parameters
        $request->validate([
            'title' => 'required | min:3 | max:50 | string',
            'description' => 'required | min:5 | max:1000 | string',
            'user_id' => ['required', 'exists:users,id']
        ]);
        // Update Data Parameters
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = $request->user_id;
        $post->save();
        return redirect('posts')->with('success', 'Post Updated Successfully');
    }
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return back()->with('success', 'Post Deleted Successfully');
    }
}
