<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostCreateRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->input('search');
        $posts = Post::with('comments');
        $posts = $posts->whereHas('user', function ($query) use ($search) {
            $query->where('name', 'LIKE', '%'.$search.'%')->whereNotNull('image');
        })->orderBy('id', 'DESC')->paginate(10);
        return view('user.posts.index', [
            'posts' => $posts,
            'search' => $request->input('search')
        ]);
    }

    public function show(Post $post)
    {
        return view('user.posts.post', ['post' => $post]);
    }

    public function store(PostCreateRequest $request)
    {
        $post = new Post();
        $data = $request->validated();
        $data['user_id'] = request()->user()->id;
        /** @var UploadedFile $image */
        $image = $request->validated('image');
        if ($image !== null || !$image->getError()) {
            $data['image'] = $image->store('posts', 'public');
        }
        $post->create($data);
        return redirect()->route('user.posts.index');
    }

    public function create()
    {
        return view('user.posts.create');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        if ($post->image) {
            Storage::disk('public')->delete($post->image ??  '');
        }
        $route = request()->user()->isAdmin() ? 'admin.posts.index' : 'user.posts.index';
        return redirect()->route($route)->with('danger', 'Votre publication a été supprimée');
    }


}
