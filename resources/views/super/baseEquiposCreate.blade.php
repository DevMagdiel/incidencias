@extends('layouts.appSU')
@section('titulo')
    CREAR EQUIPO
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{route('super.baseEquipos.store')}}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="codigo" class="mb-2 block uppercase text-gray-500 font-bold">CODIGO</label>
                    <input type="text" id="codigo" name="codigo" placeholder="CODIGO" class="border p-3 w-full rounded-lg @error('codigo') border-red-500 @enderror" value="{{old('codigo')}}">
                    @error('codigo')
                        <p class="bg-red-400 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">DESCRIPCION</label>
                    <textarea id="descripcion" name="descripcion" rows="4" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('descripcion') border-red-500 @enderror" placeholder="DESCRIPCION"></textarea>
                    @error('descripcion')
                        <p class="bg-red-400 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="serie" class="mb-2 block uppercase text-gray-500 font-bold">SERIE</label>
                    <input type="text" id="serie" name="serie" placeholder="SERIE" class="border p-3 w-full rounded-lg @error('serie') border-red-500 @enderror" value="{{old('serie')}}">
                    @error('serie')
                        <p class="bg-red-400 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>
                 
                <div class="mb-5">
                    <label for="valor" class="mb-2 block uppercase text-gray-500 font-bold">VALOR</label>
                    <input type="number" id="valor" name="valor" placeholder="VALOR" class="border p-3 w-full rounded-lg @error('valor') border-red-500 @enderror" value="{{old('nombre')}}">
                    @error('valor')
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
                    <label for="fecha" class="mb-2 block uppercase text-gray-500 font-bold">FECHA DE ASIGNACION</label>
                    <input type="date" id="fecha" name="fecha" placeholder="FECHA" class="border p-3 w-full rounded-lg @error('fecha') border-red-500 @enderror" value="{{old('fecha')}}">
                    @error('fecha')
                        <p class="bg-red-400 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="estatus" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SELECCIONA UN ESTATUS</label>
                    <select id="estatus" name="estatus" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($estatus as $data )
                            <option value="{{$data->id}}">{{$data->estatus}}</option>    
                        @endforeach
                        
                    </select>
                </div>

                <div class="mb-5">
                    <label for="responsable" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SELECCIONA UN RESPONSABLE</label>
                    <select id="responsable" name="responsable" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" selected>NO ASIGNADO</option>
                        @foreach ($responsable as $data )
                            <option value="{{$data->id}}">{{$data->clave}} - {{$data->name}} {{$data->apellidos}}</option>    
                        @endforeach
                        
                    </select>
                </div>

                <div class="mb-5">
                    <label for="linea" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SELECCIONA UNA LINEA</label>
                    <select id="linea" name="linea" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($linea as $data )
                            <option value="{{$data->id}}">{{$data->nombre}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-5">
                    <label for="distrito" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SELECCIONA UN DISTRITO</label>
                    <select id="distrito" name="distrito" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($distrito as $data )
                            <option value="{{$data->id}}">{{$data->distrito}}</option>    
                        @endforeach
                        
                    </select>
                </div>
                
               

                <input type="submit" value="Crear equipo" class="bg-blue-600 hover:bg-blue-800 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">


            </form>
        </div>

    </div>

@endsection

