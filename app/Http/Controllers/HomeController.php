<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $users = User::all()->count();
        $posts = Post::all()->count();
        $recentPost = Post::orderBy('id', 'DESC')->limit(5)->get();
        return view('home.home', [
            'users' => $users,
            'posts' => $posts,
            'recentPost' => $recentPost,
        ]);
    }

}
