<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function ShowComment()
    {
        return view('personal.comment.index');
    }
}
