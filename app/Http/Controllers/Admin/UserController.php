<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{


    public function index(Request $request)
    {
        $users = User::where('name', 'LIKE', '%'.$request->input('search').'%')->orWhere('email', 'LIKE', '%'.$request->input('search').'%')->paginate(10);
        return view('admin.users.index', [
            'users' => $users,
            'search' => $request->input('search')
        ]);
    }

    public function show(User $user)
    {
        return view('admin.users.profil', ['user' => $user]);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('danger', 'Utilisateur supprimé');
    }

}
