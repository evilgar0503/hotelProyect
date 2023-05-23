<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AdministrarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('administrar.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createUser()
    {
        return view('administrar.createuser');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storeUser(Request $request): RedirectResponse
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'apellidos' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        event(new Registered($user));

        return redirect()->route('usuarios');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the user's profile information.
     */
    public function updateUser(Request $request): RedirectResponse
    {

        $user = User::findOrFail($request->id);

        $validated = $request->validate([
            'nombre' => ['string', 'max:255'],
            'apellidos' => ['string', 'max:255'],
            'dni' => ['string', 'max:9', 'nullable', Rule::unique(User::class)->ignore($request->id)],
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($request->id)],
        ]);

        if ($request->email != $user->email) {
            $user->email_verified_at = null;
            $user->email = $request->email;
        }

        if ($request->hasFile('foto')) {
            echo "entra";
            $nombrefoto = time() . '-' . $request->file('foto')->getClientOriginalName();
            $user->foto = $nombrefoto;
            $request->file('foto')->storeAs('public/img_users', $nombrefoto);
        }


        $user->nombre = $request->nombre;
        $user->apellidos = $request->apellidos;
        $user->dni = $request->dni;

        $user->update();

        return Redirect::back()->with('status', 'Actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function update(Request $request)
    {
        $usu = User::findOrFail($request->id);
        return view('administrar.editeuser')->with('user', $usu);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
