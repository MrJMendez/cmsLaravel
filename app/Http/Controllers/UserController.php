<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $this->authorize('view', auth()->user());
        $users = User::all();
        return view('admin.users.all_users', ['users' => $users]);
    }
}
