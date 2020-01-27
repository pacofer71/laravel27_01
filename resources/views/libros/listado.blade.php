@extends('plantillas.plantilla1')
@section('titulo')Listado
    @endsection
@section('principal')
    Listado Libros
    @endsection
@section('contenido')
@if($text=Session::get('mensaje'))
<p class='normal alert alert-info mt-3 mb-2' style="font-weight:bold">{{$text}}</p>
@endif
<a href="{{route('libros.create')}}" class='btn btn-success mb-2 mt-2'>Nuevo Libro</a>
<table class="table table-striped table-dark">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Título</th>
        <th scope="col">Sinopsis</th>
        <th scope="col">pvp(€)</th>
        <th scope="col">Stock</th>
          <th scope="col">ISBN</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
        @foreach($libros as $item)
      <tr>
      <th scope="row">{{$item->id}}</th>
        <td>{{$item->titulo}}</td>
        <td>{{$item->sinopsis}}</td>
        <td>{{$item->pvp}}</td>
          <td>{{$item->isbn}}</td>
        <td>{{$item->stock}}</td>
        <td>
        <form name='borrar' action="{{route('libros.destroy', $item)}}" method='post' style="white-space: nowrap">
            @csrf
            @method('DELETE')
            <a href="{{route('libros.edit', $item)}}" class="btn btn-info normal">Editar</a>
            <input type='submit' value='Borrar' class='btn btn-danger normal' />
        </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{$libros->links()}}
    @endsection
