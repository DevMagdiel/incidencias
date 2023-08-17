@extends('layouts.appAdm')
@section('titulo')
    EQUIPOS ASIGNADOS
@endsection

@section('contenido')
<div class="md:flex md:justify-center">
    <div class="md:w-10/12 bg-white p-6 rounded-lg shadow-xl">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
           
            <table class="table-auto w-full text-sm text-center text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            CODIGO
                        </th>
                        <th scope="col" class="px-6 py-3">
                            DESCRIPCION
                        </th>
                        <th scope="col" class="px-6 py-3">
                            SERIE
                        </th>
                        <th scope="col" class="px-6 py-3">
                            VALOR
                        </th>
                        <th scope="col" class="px-6 py-3">
                            COMENTARIO
                        </th>
                        <th scope="col" class="px-6 py-3">
                            FECHA DE ASIGNACION
                        </th>
                        <th scope="col" class="px-6 py-3">
                            LINEA
                        </th>
                        <th scope="col" class="px-6 py-3">
                            ESTATUS
                        </th>
                        <th scope="col" class="px-6 py-3">
                            DISTRITO
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
                                {{$dataItem->codigo}}
                            </td>
                            <td class="px-6 py-4">
                                {{$dataItem->descripcion}}
                            </td>
                            <td class="px-6 py-4">
                                {{$dataItem->serie}}
                            </td>
                            <td class="px-6 py-4">
                                {{$dataItem->valor}}
                            </td>
                            <td class="px-6 py-4">
                                {{$dataItem->comentario}}
                            </td>
                            <td class="px-6 py-4">
                                {{$dataItem->fecha_asignacion}}
                            </td>
                            <td class="px-6 py-4">
                                {{$dataItem->linea->nombre}}
                            </td>
                            <td class="px-6 py-4">
                                {{$dataItem->estatusEquipo->estatus}}
                            </td>
                            <td class="px-6 py-4">
                                {{$dataItem->distrito->distrito}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection