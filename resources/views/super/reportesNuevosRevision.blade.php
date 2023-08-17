@extends('layouts.appSU')
@section('titulo')
    REVISION DE REPORTE
@endsection
@section('contenido')
<div class="md:flex md:justify-center">
    <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
        <div class="px-4 sm:px-0">
            <h3 class="text-base text-center font-bold leading-7 text-gray-900">{{$data->titulo}}</h3>
        </div>
        <div class="mt-6 border-t border-gray-100">
            <dl class="divide-y divide-gray-100">
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm font-medium leading-6 text-gray-900">INFORMACION DE EQUIPO</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$data->equipo->codigo}} - {{$data->equipo->descripcion}}</dd>
            </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm font-medium leading-6 text-gray-900">COMENTARIO</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$data->comentario}}</dd>
            </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm font-medium leading-6 text-gray-900">FECHA DEL REPORTE</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$data->fecha_inicial}}</dd>
            </div>
            </dl>
        </div>
        <div class="mb-5">
            @if (!$data->evidencia_problema == null)
                <p class="font-bold uppercase text-center">EVIDENCIA DEL PROBLEMA</p>
                <img src="{{asset('uploads').'/'.$data->evidencia_problema}}" alt="EVIDENCIA DEL PROBLEMA">
            @else
                <p class="text-gray-600 uppercase text-sm text-center font-bold">NO HAY IMAGEN DEL PROBLEMA</p>
            @endif
        </div>
        <form action="{{route('super.reportesLevantados.editarRevision',$data)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-5">
                <label for="encargado" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SELECCIONA UN ENCARGADO</label>
                <select id="encargado" name="encargado" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach ($responsable as $dat )
                        <option @if($data->encargado_id == $dat->id) selected @endif value="{{$dat->id}}">{{$dat->clave}} - {{$dat->name}}</option>    
                    @endforeach
                </select>
            </div>

            <div class="mb-5">
                <label for="fecha_estimada" class="mb-2 block uppercase text-gray-500 font-bold">FECHA ESTIMADA</label>
                <input type="date" id="fecha_estimada" name="fecha_estimada" placeholder="FECHA" class="border p-3 w-full rounded-lg @error('fecha_estimada') border-red-500 @enderror" value="{{$data->fecha_estimada}}">
                @error('fecha_estimada')
                    <p class="bg-red-400 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>

            <input type="submit" value="ENVIAR REVISION" class="bg-blue-600 hover:bg-blue-800 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">


        </form>
        
    </div>
</div>



@endsection