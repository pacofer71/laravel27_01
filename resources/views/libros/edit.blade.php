@extends('plantillas.plantilla1')
@section('titulo')Editar
@endsection
@section('principal')
    Editar Libro
@endsection
@section('contenido')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form name='nuevo'  action="{{route('libros.update', $libro)}}" method='post'>
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="col">
                <input type="text" class="form-control" value="{{$libro->titulo}}" name='titulo' required>
            </div>
            <div class="col">
                <input type="number" class="form-control" value="{{$libro->stock}}" min=0 step=1 name='stock'>
            </div>

        </div>
        <div class="form-row mt-4">
            <div class="col">
                <input type="number" class="form-control" value="{{$libro->pvp}}" min=0 step=0.1 name='pvp' required>
            </div>
            <div class="col">
                <input type='text' maxlength="13" value="{{$libro->isbn}}" class='form-control' required name='isbn' />
            </div>
        </div>
        <div class="form-row mt-4">
            <div class="col">
                <textarea name='sinopsis' rows="3"  cols="50" required class='from-control'>{{$libro->sinopsis}}</textarea>
            </div>
        </div>
        <div class="form-row mt-4">
            <div class="col">
                <input type='submit' value='Editar' class='normal btn btn-success mr-3' />
                <a href="{{route('libros.listado')}}" class='normal btn btn-info'>Volver</a>
            </div>
        </div>
    </form>
@endsection
