<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:viewAny,App\Models\User');
    }

    public function index()
    {
        $users = User::latest()->paginate(12);
        return view('admin.users.index', compact('users'));
    }

    public function show(User $user)
    {
        $this->authorize('view', $user);
        return view('admin.users.show', compact('user'));
    }
}

