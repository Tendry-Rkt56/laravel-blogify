<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $users = User::where('name', 'LIKE', '%'.$request->input('search').'%')->orWhere('email', 'LIKE', '%'.$request->input('search').'%')->paginate(10);
        return view('user.users.index', [
            'users' => $users,
            'search' => $request->input('search')
        ]);
    }

    public function show(User $user)
    {
        $user->with('posts');
        return view('user.users.profil', ['user' => $user]);
    }
}
