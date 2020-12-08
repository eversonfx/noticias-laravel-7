<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */

    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index()
    {
        return view('admin.home');
    }

    public function perfil()
    {
        $usuario = User::findOrFail(auth()->user()->id);
        return view('admin.perfil')->with(['usuario' => $usuario]);
    }

    public function alterarperfil(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $usuario_busca = User::findOrFail($request->id);
        $usuario_busca->name = $request->name;
        $usuario_busca->email = $request->email;
        // $usuario_busca->role = $request->role;
        if (strcmp(trim($usuario_busca->password), trim($request->password)) != 0) {
            $usuario_busca->password = Hash::make($request->password);
        }

        if ($usuario_busca->save()) {
            return redirect()
                ->route('admin')
                ->with('success', 'Perfil atualizado com sucesso! ');
        } else {
            return redirect()
            ->route('usuarios')
            ->with('error', 'Houve um problema ao atualizar o perfil');
        }
    }

    public function logoutadm()
    {
        auth()->logout();
        return redirect('/login');
    }
}
