<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostIndexController extends Controller
{
    public function IndexPost()
    {
        $posts = Post::all();
        return view('admin.post.index', compact('posts'));
    }
}
