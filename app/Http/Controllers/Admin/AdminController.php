<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anime;
use App\Models\Episode;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {

        $users = User::all();
        return view('admin.index', compact('users'));
    }
}
