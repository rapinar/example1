<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function ShowDashboard()
    {
        return view('personal.main.index');
    }
}
