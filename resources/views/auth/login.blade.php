@extends('layouts.app')

@section('titulo')
INICIAR SESION
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        {{-- <div class="md:w-1/2">
            <p>Imagen aqui</p>
        </div> --}}

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form method="POST" action="{{route('login')}}">
                @csrf

                @if(session('mensaje'))
                    <p class="bg-red-400 text-white my-2 rounded-lg text-sm p-2 text-center">{{session('mensaje')}}</p>
                @endif         
                <div class="mb-5">
                    <label for="clave" class="mb-2 block uppercase text-gray-500 font-bold">Clave</label>
                    <input type="text" id="clave" name="clave" placeholder="Clave identificadora" class="border p-3 w-full rounded-lg @error('clave') border-red-500 @enderror" value="{{old('clave')}}">
                    @error('clave')
                        <p class="bg-red-400 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password" class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror" value="{{old('password')}}">
                    @error('password')
                        <p class="bg-red-400 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <input type="submit" value="LOGIN" class="bg-blue-600 hover:bg-blue-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">


            </form>
        </div>

    </div>



@endsection