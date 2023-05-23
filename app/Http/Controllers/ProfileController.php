<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Reservas;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{

    public function index()
    {

    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        if ($request->hasFile('foto')) {
            $nombrefoto = time() . '-' . $request->file('foto')->getClientOriginalName();
            $request->user()->foto = $nombrefoto;
            $request->file('foto')->storeAs('public/img_users', $nombrefoto);
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Get all users.
     */
    public function show() {
        $usuarios = User::all();
        return view('administrar.dashboard')->with('usuarios', $usuarios);
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {

        if($request->id != Auth::id()) {
            $user = User::findOrFail($request->id);

            $user->delete();
            return Redirect::to('/usuarios');
        }
        else {
            $request->validateWithBag('userDeletion', [
                'password' => ['required', 'current-password'],
            ]);

            $user = $request->user();

            Auth::logout();

            $user->delete();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return Redirect::to('/');
        }

    }
}
