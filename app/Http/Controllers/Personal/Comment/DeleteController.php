<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;

class DeleteController extends Controller
{
    public function DeleteComment(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('personal.comment.index');
    }
}
