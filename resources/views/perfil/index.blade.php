@extends('layouts.app')

@section('titulo')
    Editar perfil: {{ auth()->user()->username }}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w1/2 bg-white shadow p-6">
            <form class="mt-10 md:mt-0">
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">UserName</label>
                    <input id="usename" name="username" type="text" placeholder="Tu nombre de usuario" class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror" value="{{ auth()->user()->username }}">
                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ auth()->user()->username}} </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold">Imagen perfil</label>
                    <input id="imagen" name="imagen" type="file" class="border p-3 w-full rounded-lg" accept=".jpg, .jpeg, .png">
                </div>

                <input type="submit" value="Guardar cambios" class="bg-sky-600 hover:gb-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection