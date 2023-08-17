@extends('layouts.appSU')
@section('titulo')
    ACTUALIZAR DISTRITO 
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{route('super.baseDistritos.update',$data)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-5">
                    <label for="distrito" class="mb-2 block uppercase text-gray-500 font-bold">NOMBRE DEL DISTRITO</label>
                    <input value="{{$data->distrito}}" type="text" id="distrito" name="distrito" placeholder="DISTRITO" class="border p-3 w-full rounded-lg @error('distrito') border-red-500 @enderror" value="{{old('distrito')}}">
                    @error('distrito')
                        <p class="bg-red-400 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>
                
               

                <input type="submit" value="ACTUALIZAR DISTRITO" class="bg-blue-600 hover:bg-blue-800 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">


            </form>
        </div>

    </div>

@endsection

