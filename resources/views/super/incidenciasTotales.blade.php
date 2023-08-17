@extends('layouts.appSU')
@section('titulo')
    INCIDENCIAS TOTALES
@endsection
@section('contenido')
<div class="md:flex md:justify-center">
    <div class="md:w-10/12 bg-white p-6 rounded-lg shadow-xl">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            @if(session('delete0'))
                <p class="bg-red-400 text-white my-2 rounded-lg text-lg p-2 text-center">{{session('delete0')}}</p>
            @endif
            @if(session('delete1'))
                <p class="bg-green-400 text-white my-2 rounded-lg text-lg p-2 text-center">{{session('delete1')}}</p>
            @endif
            <table class="table-auto w-full text-sm text-center text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            EQUIPO
                        </th>
                        <th scope="col" class="px-6 py-3">
                            RESPONSABLE
                        </th>
                        <th scope="col" class="px-6 py-3">
                            ESTATUS
                        </th>
                        <th scope="col" class="px-6 py-3">
                            COMENTARIO
                        </th>
                        <th scope="col" class="px-6 py-3">
                            FECHA INICIAL
                        </th>
                        <th scope="col" class="px-6 py-3">
                            FECHA ESTIMADA
                        </th>
                        <th scope="col" class="px-6 py-3">
                            FECHA SOLUCION
                        </th>
                        <th scope="col" class="px-6 py-3">
                            TITULO
                        </th>
                        <th scope="col" class="px-6 py-3">
                            ENCARGADO
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $dataItem)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$dataItem->id}}
                            </th>
                            <td class="px-6 py-4">
                                {{$dataItem->equipo->codigo}} - {{$dataItem->equipo->descripcion}}
                            </td>
                            <td class="px-6 py-4">
                                {{$dataItem->userResponsable->clave}} - {{$dataItem->userResponsable->name}}
                            </td>
                            <td class="px-6 py-4">
                                {{$dataItem->estatusReporte->estatus}}
                            </td>
                            <td class="px-6 py-4">
                                {{$dataItem->comentario}}
                            </td>
                            <td class="px-6 py-4">
                                {{$dataItem->fecha_inicial}}
                            </td>
                            <td class="px-6 py-4">
                               {{$dataItem->fecha_estimada}}
                            </td>
                            <td class="px-6 py-4">
                                {{$dataItem->fecha_solucion}}
                            </td>
                            <td class="px-6 py-4">
                                {{$dataItem->titulo}}
                            </td>
                            <td class="px-6 py-4">
                                {{$dataItem->userEncargado->clave ?? ''}} - {{$dataItem->userEncargado->name ?? ''}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection