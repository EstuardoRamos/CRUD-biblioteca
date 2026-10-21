@extends('layouts.base')

@section('titulo', 'Editar libro')

@section('contenido')
    <h1 class="h3 mb-3">Editar libro</h1>

    <form action="{{ route('libros.update', $libro) }}" method="POST" class="card card-body">
        @csrf
        @method('PUT')

        @include('libros._form')

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('libros.index') }}" class="btn btn-outline-secondary">Cancelar</a>
        </div>
    </form>
@endsection