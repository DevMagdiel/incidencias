@extends('layouts.app')
@section('titulo')
    LEVANTAR REPORTE
@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />    
@endpush
@section('contenido')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <div class="md:flex md:justify-center">

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{route('super.baseReportes.guardarReporte')}}" method="POST">
                @csrf

                <div class="mb-5">
                    <label for="equipo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SELECCIONA UN EQUIPO</label>
                    <select id="equipo" name="equipo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($equipo as $data )
                            <option value="{{$data->id}}">{{$data->codigo}} - {{$data->descripcion}}</option>    
                        @endforeach
                    </select>
                </div>

                <div class="mb-5">
                    <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">TITULO</label>
                    <input type="text" id="titulo" name="titulo" placeholder="TITULO" class="border p-3 w-full rounded-lg @error('titulo') border-red-500 @enderror" value="{{old('titulo')}}">
                    @error('titulo')
                        <p class="bg-red-400 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold">COMENTARIO</label>
                    <textarea id="comentario" name="comentario" rows="4" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('comentario') border-red-500 @enderror" placeholder="COMENTARIO"></textarea>
                    @error('comentario')
                        <p class="bg-red-400 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>
                
                

                <div class="mb-5">
                    <input type="hidden" id="evidencia_problema" name="evidencia_problema" value="{{old('evidencia_problema')}}">
                    @error('evidencia_problema')
                        <p class="bg-red-400 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <input type="submit" value="Crear reporte" class="bg-blue-600 hover:bg-blue-800 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">


            </form>

            <form id="dropzone" action="{{route('imagen.store')}}" method="POST" enctype="multipart/form-data" class="dropzone mt-10 border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center" >
                @csrf
            </form>
        </div>

    </div>

@endsection