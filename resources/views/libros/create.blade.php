@extends('plantillas.plantilla1')
@section('titulo')Nuevo
@endsection
@section('principal')
Crear Libro
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
<form name='nuevo' method='post' action="{{route('libros.store')}}">
    @csrf
    <div class="form-row">
        <div class="col">
            <input type="text" class="form-control" placeholder="Titulo" name='titulo' required>
        </div>
        <div class="col">
            <input type="number" class="form-control" placeholder="stock" min=0 step=1 name='stock'>
        </div>

    </div>
    <div class="form-row mt-4">
        <div class="col">
            <input type="number" class="form-control" placeholder="PVP(€)" min=0 step=0.1 name='pvp' required>
        </div>
        <div class="col">
            <input type='text' maxlength="13" placeholder='ISBN' class='form-control' required name='isbn' />
        </div>
    </div>
    <div class="form-row mt-4">
        <div class="col">
            <textarea name='sinopsis' placeholder="Sinópsis" rows="3"  cols="50" required class='from-control'></textarea>
        </div>
    </div>
    <div class="form-row mt-4">
        <div class="col">
            <input type='submit' value='Crear' class='normal btn btn-success mr-3' />
            <input type='reset' value='Limpiar' class='normal btn btn-warning mr-3' />
            <a href="{{route('libros.listado')}}" class='normal btn btn-info'>Volver</a>
        </div>
    </div>
</form>
@endsection