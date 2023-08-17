@extends('layouts.appSU')
@section('titulo')
    EQUIPOS
@endsection

@section('contenido')
<div class="flex justify-center">
    <div class="flex justify-end w-10/12">
        <a href="{{route('super.baseEquipos.create')}}" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Agregar</a>
    </div>
</div>
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
                            RESPONSABLE
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
                        <th scope="col" class="px-6 py-3">
                            ACCIONES
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
                                {{$dataItem->user->clave ?? ''}} - {{$dataItem->user->name ?? ''}}
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
                            <td class="px-6 py-4">
                            
                                <a href="{{route('super.baseEquipos.edit', $dataItem)}}" class="block text-white  bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-200 font-medium rounded-lg text-sm px-4 py-2.5 text-center dark:focus:ring-blue-900">EDITAR</a>
                                
                                <form class="block pt-3" method="POST" action="{{route('super.baseEquipos.destroy', $dataItem->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <input class=" text-white  bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-200 font-medium rounded-lg text-sm px-4 py-2.5 text-center dark:focus:ring-red-900" type="submit" value="ELIMINAR">
                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

