<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->withCount('likes')->orderBy('created_at', 'desc')->paginate(10);
        return view('posts.timeline', compact('posts'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required|max:180',
        ]);

        Post::create([
            'body' => $request->body,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('timeline');
    }

    public function userPosts()
    {
        $posts = Auth::user()->posts()->withCount('likes')->paginate(10);
        return view('posts.user', compact('posts'));
    }

    public function destroy(Post $post)
    {
        if ($post->user_id == Auth::id()) {
            $post->delete();
        }

        return redirect()->route('timeline');
    }
}
