<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentCreateRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function store(CommentCreateRequest $request)
    {
        $comment = new Comment();
        $data = $request->validated();
        $data['user_id'] = Auth::user()->id;
        $comment->create($data);
        return redirect()->back();
    }

    public function delete(Comment $comment)
    {
        $comment->delete();
        return redirect()->back();
    }

}
