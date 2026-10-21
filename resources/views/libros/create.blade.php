@extends('layouts.base')

@section('titulo', 'Nuevo libro')

@section('contenido')
    <h1 class="h3 mb-3">Nuevo libro</h1>

    <form action="{{ route('libros.store') }}" method="POST" class="card card-body">
        @csrf

        @include('libros._form', ['libro' => null])

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('libros.index') }}" class="btn btn-outline-secondary">Cancelar</a>
        </div>
    </form>
@endsection