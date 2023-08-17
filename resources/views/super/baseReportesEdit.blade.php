@extends('layouts.appSU')
@section('titulo')
    EDITAR REPORTE
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{route('super.baseReportes.update',$data)}}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-5">
                    <label for="equipo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SELECCIONA UN EQUIPO</label>
                    <select id="equipo" name="equipo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($equipo as $dat )
                            <option @if($data->equipo_id == $dat->id) selected @endif value="{{$dat->id}}">{{$dat->codigo}}-{{$dat->descripcion}} | {{$dat->user->clave}}-{{$dat->user->name}}</option>    
                        @endforeach
                    </select>
                </div>

                <div class="mb-5">
                    <label for="estatus" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SELECCIONA UN ESTATUS</label>
                    <select id="estatus" name="estatus" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($estatus as $dat )
                            <option @if($data->equipo_id == $dat->id) selected @endif value="{{$dat->id}}">{{$dat->estatus}}</option>    
                        @endforeach
                    </select>
                </div>

                <div class="mb-5">
                    <label for="encargado" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SELECCIONA UN ENCARGADO</label>
                    <select id="encargado" name="encargado" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($responsable as $dat )
                            <option @if($data->encargado_id == $dat->id) selected @endif value="{{$dat->id}}">{{$dat->clave}} - {{$dat->name}}</option>    
                        @endforeach
                    </select>
                </div>

                <div class="mb-5">
                    <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">TITULO</label>
                    <input type="text" id="titulo" name="titulo" placeholder="TITULO" class="border p-3 w-full rounded-lg @error('titulo') border-red-500 @enderror" value="{{$data->titulo}}">
                    @error('titulo')
                        <p class="bg-red-400 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold">COMENTARIO</label>
                    <textarea id="comentario" name="comentario" rows="4" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('comentario') border-red-500 @enderror" placeholder="COMENTARIO">{{$data->comentario}}</textarea>
                    @error('comentario')
                        <p class="bg-red-400 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="fecha_inicial" class="mb-2 block uppercase text-gray-500 font-bold">FECHA DE INICIAL</label>
                    <input type="date" id="fecha_inicial" name="fecha_inicial" placeholder="FECHA" class="border p-3 w-full rounded-lg @error('fecha_inicial') border-red-500 @enderror" value="{{$data->fecha_inicial}}">
                    @error('fecha_inicial')
                        <p class="bg-red-400 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="fecha_estimada" class="mb-2 block uppercase text-gray-500 font-bold">FECHA ESTIMADA</label>
                    <input type="date" id="fecha_estimada" name="fecha_estimada" placeholder="FECHA" class="border p-3 w-full rounded-lg @error('fecha_estimada') border-red-500 @enderror" value="{{$data->fecha_estimada}}">
                    @error('fecha_estimada')
                        <p class="bg-red-400 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="fecha_solucion" class="mb-2 block uppercase text-gray-500 font-bold">FECHA DE SOLUCION</label>
                    <input type="date" id="fecha_solucion" name="fecha_solucion" placeholder="FECHA" class="border p-3 w-full rounded-lg @error('fecha_solucion') border-red-500 @enderror" value="{{$data->fecha_solucion}}">
                    @error('fecha_solucion')
                        <p class="bg-red-400 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <input type="submit" value="Actualizar reporte" class="bg-blue-600 hover:bg-blue-800 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">


            </form>
        </div>

    </div>

@endsection

