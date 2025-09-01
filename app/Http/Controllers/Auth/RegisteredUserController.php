<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Vista de registro
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Guardar nuevo usuario
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name'              => ['required', 'string', 'max:255'],
            'email'             => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password'          => ['required', 'confirmed', Rules\Password::defaults()],
            'phone'             => ['nullable', 'string', 'max:30'],
            'professional_url'  => ['nullable', 'url', 'max:255'],
            'photo'             => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        // Subir foto
        $path = null;
        if ($request->hasFile('photo')) {
            // guarda en storage/app/public/profile-photos
            $path = $request->file('photo')->store('profile-photos', 'public');
        }

        $user = User::create([
            'name'             => $request->string('name'),
            'email'            => $request->string('email')->lower(),
            'password'         => Hash::make($request->string('password')),
            'phone'            => $request->string('phone') ?: null,
            'professional_url' => $request->string('professional_url') ?: null,
            'photo_path'       => $path,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('dashboard');
    }
}

