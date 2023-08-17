@extends('layouts.appSU')

@section('subnav')
    
    <nav class="bg-gray-50 dark:bg-gray-700">
        <div class="max-w-screen-xl px-4 py-3 mx-auto">
            <div class="flex items-center">
                <ul class="flex flex-row font-medium mt-0 mr-6 space-x-8 text-sm">
                    <li>
                        <a href="{{route('super.baseCargos')}}" class="text-gray-900 dark:text-white hover:underline" aria-current="page">Cargos</a>
                    </li>
                    <li>
                        <a href="{{route('super.baseDistritos')}}" class="text-gray-900 dark:text-white hover:underline">Distritos</a>
                    </li>
                    <li>
                        <a href="{{route('super.baseEquipos')}}" class="text-gray-900 dark:text-white hover:underline">Equipos</a>
                    </li>
                    <li>
                        <a href="{{route('super.baseLineas')}}" class="text-gray-900 dark:text-white hover:underline">Lineas</a>
                    </li>
                    <li>
                        <a href="{{route('super.baseReportes')}}" class="text-gray-900 dark:text-white hover:underline">Reportes</a>
                    </li>
                    <li>
                        <a href="{{route('super.baseTiposUsuarios')}}" class="text-gray-900 dark:text-white hover:underline">Tipo de usuarios</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
@endsection

@section('titulo')
    BASE DE DATOS
@endsection

@section('contenido')
<div class="md:flex md:justify-center">
    <div class="md:w-8/12 bg-white p-6 rounded-lg shadow-xl">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        </div>
    </div>
</div>
@endsection