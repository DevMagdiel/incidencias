@extends('layouts.app')
@section('titulo')
    DATOS DEL REPORTE
@endsection
@section('contenido')
<div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-lg shadow-xl">
        <div class="{{-- flex justify-center --}}">
            <div class="">
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
                        <dt class="text-sm font-medium leading-6 text-gray-900">ESTATUS</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$data->estatusReporte->estatus}}</dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">FECHA DEL REPORTE</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$data->fecha_inicial}}</dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">FECHA DE SOLUCION ESTIMADA</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$data->fecha_estimada}}</dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">FECHA SOLUCION</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$data->fecha_solucion}}</dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">ASIGANDO A</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$data->userEncargado->clave ?? ''}} - {{$data->userEncargado->name ?? ''}}</dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">COMENTARIO SOLUCION</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$data->comentario_solucion ?? ''}}</dd>
                    </div>
                    </dl>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                @if (!$data->evidencia_problema == null)
                    <p class="font-bold uppercase text-center">EVIDENCIA DEL PROBLEMA</p>
                    <img src="{{asset('uploads').'/'.$data->evidencia_problema}}" alt="EVIDENCIA DEL PROBLEMA">
                @else
                    <p class="text-gray-600 uppercase text-sm text-center font-bold">NO HAY IMAGEN DEL PROBLEMA</p>
                @endif
            </div>
            <div class="">
                @if (!$data->evidencia_solucion == null)
                    <p class="font-bold uppercase text-center">EVIDENCIA SOLUCION</p>
                    <img src="{{asset('uploads').'/'.$data->evidencia_solucion}}" alt="EVIDENCIA SOLUCION">
                @else
                    <p class="text-gray-600 uppercase text-sm text-center font-bold">NO HAY IMAGEN DE LA SOLUCION</p>
                @endif                
            </div>
        </div>
    </div>
</div>
@endsection