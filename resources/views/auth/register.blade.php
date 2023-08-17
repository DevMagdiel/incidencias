@extends('layouts.appSU')

@section('titulo')
REGISTRAR NUEVO USUARIO
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        {{-- <div class="md:w-1/2">
            <p>Imagen aqui</p>
        </div> --}}

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{route('registrar')}}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="clave" class="mb-2 block uppercase text-gray-500 font-bold">Clave</label>
                    <input type="text" id="clave" name="clave" placeholder="Clave identificadora" class="border p-3 w-full rounded-lg @error('clave') border-red-500 @enderror" value="{{old('clave')}}">
                    @error('clave')
                        <p class="bg-red-400 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>
                
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">Nombre</label>
                    <input type="text" id="name" name="name" placeholder="Nombre" class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror" value="{{old('name')}}">
                    @error('name')
                        <p class="bg-red-400 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="apellidos" class="mb-2 block uppercase text-gray-500 font-bold">Apellidos</label>
                    <input type="text" id="apellidos" name="apellidos" placeholder="Apellidos" class="border p-3 w-full rounded-lg @error('apellidos') border-red-500 @enderror" value="{{old('apellidos')}}">
                    @error('apellidos')
                        <p class="bg-red-400 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="telefono" class="mb-2 block uppercase text-gray-500 font-bold">Telefono</label>
                    <input type="text" id="telefono" name="telefono" placeholder="Telefono" class="border p-3 w-full rounded-lg @error('telefono') border-red-500 @enderror" value="{{old('telefono')}}">
                    @error('telefono')
                        <p class="bg-red-400 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="edad" class="mb-2 block uppercase text-gray-500 font-bold">Edad</label>
                    <input type="text" id="edad" name="edad" placeholder="Edad" class="border p-3 w-full rounded-lg @error('edad') border-red-500 @enderror" value="{{old('edad')}}">
                    @error('edad')
                        <p class="bg-red-400 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                {{-- ESTE SE VA CAMBIAR POR UN SELECT --}}
                <div class="mb-5">
                    <label for="cargo" class="mb-2 block uppercase text-gray-500 font-bold">Cargo</label>
                    <select id="cargo" name="cargo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($cargos as $data )
                            <option value="{{$data->id}}">{{$data->nombre}}</option>    
                        @endforeach
                    </select>
                </div>
                {{-- ESTE SE VA CAMBIAR POR UN SELECT --}}
                <div class="mb-5">
                    <label for="linea" class="mb-2 block uppercase text-gray-500 font-bold">Linea de negocio</label>
                    <select id="linea" name="linea" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($lineas as $data )
                            <option value="{{$data->id}}">{{$data->nombre}}</option>    
                        @endforeach
                    </select>
                </div>
                {{-- ESTE SE VA CAMBIAR POR UN SELECT --}}
                <div class="mb-5">
                    <label for="tipoUser" class="mb-2 block uppercase text-gray-500 font-bold">Tipo de usuario</label>
                    <select id="tipoUser" name="tipoUser" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($tipoUsuarios as $data )
                            <option value="{{$data->id}}">{{$data->nombre}}</option>    
                        @endforeach
                    </select>
                </div>

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Correo</label>
                    <input type="email" id="email" name="email" placeholder="Correo" class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror" value="{{old('email')}}">
                    @error('email')
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

                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Confirmacion password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirmacion password" class="border p-3 w-full rounded-lg @error('password_confirmation') border-red-500 @enderror" value="{{old('password_confirmation')}}">
                    @error('password_confirmation')
                        <p class="bg-red-400 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <input type="submit" value="Crear cuenta" class="bg-blue-600 hover:bg-blue-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">


            </form>
        </div>

    </div>



@endsection