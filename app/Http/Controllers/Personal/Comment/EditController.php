<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;

class EditController extends Controller
{
    public function EditComment(Comment $comment)
    {
        return view('personal.comment.edit', compact('comment'));
    }
}
