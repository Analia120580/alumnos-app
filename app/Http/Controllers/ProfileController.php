<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Muestra el formulario de edición del perfil.
     */
    public function edit(): View
    {
        return view('profile.edit', [
            'user' => Auth::user(),
        ]);
    }

    /**
     * Actualiza la información del perfil del usuario.
     */
    public function update(UpdateProfileRequest $request): RedirectResponse
    {
        $user = Auth::user();

        // Si se sube una nueva foto, la guarda
        if ($request->hasFile('photo')) {
            // Elimina la foto anterior si existe
            if ($user->photo_path) {
                Storage::disk('public')->delete($user->photo_path);
            }
            $photoPath = $request->file('photo')->store('profile_photos', 'public');
        } else {
            // Mantiene la foto existente si no se sube una nueva
            $photoPath = $user->photo_path;
        }

        $user->fill([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'professional_url' => $request->professional_url,
            'photo_path' => $photoPath,
        ]);

        $user->save();

        return redirect()->route('dashboard')->with('status', 'Perfil actualizado correctamente.');
    }

    /**
     * Elimina la cuenta del usuario.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();
        auth()->logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}

