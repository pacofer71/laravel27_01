@extends('plantillas.plantilla1')
@section('titulo')Buscar
@endsection
@section('principal')
    Buscar Libros
@endsection
@section('contenido')
    <div class="row mb-5">
        <div class="col-md-12">
            <div class="header">

                {{ Form::open(['route'=>'libros.index', 'method'=>'get', 'class'=>'form-inline float-right', 'role'=>'search']) }}
                <h3 class="normal mr-3" style="font-weight:bold">BUSCAR:</h3>
                <div class="form-group mr-2">
                    @if(!$request->get('titulo'))
                        <input type="search" placeholder="Título" name="titulo" class="form-control">
                    @else
                        <input type="search" value="{{ $request->get('titulo') }}" name="titulo" class="form-control">
                    @endif
                </div>
                <div class="form-group">
                    @if(!$request->get('sinopsis'))
                        <input type="search" placeholder="Sinopsis" name="sinopsis" class="form-control">
                    @else
                        <input type="search" value="{{ $request->get('sinopsis') }}" name="sinopsis" class="form-control">
                    @endif
                    </div>
                <div class="form-group ml-2">
                    <label class="sr-only" for="inline">Username</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">€</div>
                        </div>
                        <select class="form-control peque" id="inline" name="pvp">
                            <option value="1" >Menor de 10</option>
                            <option value="2" >Entre 10 y 50</option>
                            <option value="3">Mayor que 50</option>
                        </select>
                    </div>
                </div>
                <div class="form-group ml-2">
                    <input type="submit" class="btn btn-success" value="Buscar">

                </div>
                {{ Form::close() }}
            </div>
        </div>


    </div>
    <i class="fa fa-search"></i>
    <table class="table table-striped table-dark">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Título</th>
            <th scope="col">Sinopsis</th>
            <th scope="col">pvp(€)</th>
            <th scope="col">Stock</th>
            <th scope="col">ISBN</th>

        </tr>
        </thead>
        <tbody>
        @foreach($libros as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->titulo}}</td>
                <td>{{$item->sinopsis}}</td>
                <td>{{$item->pvp}}</td>
                <td>{{$item->stock}}</td>
                <td>{{$item->isbn}}</td>


            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $libros->appends(Request::except('page'))->links() }}
@endsection
