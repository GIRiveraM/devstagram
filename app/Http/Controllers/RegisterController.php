<?php

namespace App\Http\Controllers;

use auth;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {

        //Modificar el Request
        $request->request->add(['username' => Str::slug($request->username)]);

        //Validaciones
        $this->validate($request,[
            'name' => ['required','max:30'],
            'username' => ['required','unique:users','min:3','max:20'],
            'email' => ['required','unique:users','email','max:60'],
            'password' =>['required','confirmed','min:6'],
        ]);

        //Guarda la información en la tabla
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        //Otra forma de autenticar
        auth()->attempt($request->only('email','password'));


        //Redirecionar
        return redirect()->route('posts.index');
    }
}
