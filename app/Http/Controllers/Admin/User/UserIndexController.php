<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserIndexController extends Controller
{
    public function IndexUser()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }
}
