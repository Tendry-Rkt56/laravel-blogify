<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->input('search');
        $posts = Post::with('comments');
        $posts = $posts->inRandomOrder()->whereHas('user', function ($query) use ($search) {
            $query->where('name', 'LIKE', '%'.$search.'%')->whereNotNull('image');
        })->orderBy('id', 'ASC')->paginate(10);
        return view('admin.posts.index', [
            'posts' => $posts,
            'search' => $request->input('search')
        ]);
    }

    public function show(Post $post)
    {
        return view('admin.posts.post', ['post' => $post]);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('danger', 'Post supprimé');
    }

}
