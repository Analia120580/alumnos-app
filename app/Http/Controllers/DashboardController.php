<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $users = $user->role == 'Administrador' ? User::all() : null;
        return view('dashboard', compact('user', 'users'));
    }
}

