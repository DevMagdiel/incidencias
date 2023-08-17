@extends('layouts.appSU')
@section('titulo')
    EDITAR CARGO
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        {{-- <div class="md:w-1/2">
            <p>Imagen aqui</p>
        </div> --}}

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{route('super.baseCargos.update',$cargo)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-5">
                    <label for="nombre" class="mb-2 block uppercase text-gray-500 font-bold">NOMBRE DEL CARGO</label>
                    <input type="text" id="nombre" name="nombre" placeholder="" value="{{$cargo->nombre}}" class="border p-3 w-full rounded-lg @error('nombre') border-red-500 @enderror" value="{{old('nombre')}}">
                    @error('nombre')
                        <p class="bg-red-400 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>
                
                <input type="submit" value="ACTUALIZAR cargo" class="bg-blue-600 hover:bg-blue-800 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">


            </form>
        </div>

    </div>

@endsection

