@extends('layouts.base')

@section('titulo', 'Libros')

@section('contenido')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">Libros</h1>
        <a href="{{ route('libros.create') }}" class="btn btn-primary">Nuevo libro</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped align-middle bg-white">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Año</th>
                    <th>Páginas</th>
                    <th>Disponible</th>
                    <th class="text-end">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($libros as $libro)
                    <tr>
                        <td>{{ $libro->titulo }}</td>
                        <td>{{ $libro->autor->nombre }}</td>
                        <td>{{ $libro->anio_publicacion }}</td>
                        <td>{{ $libro->paginas }}</td>
                        <td>
                            @if ($libro->disponible)
                                <span class="badge bg-success">Sí</span>
                            @else
                                <span class="badge bg-secondary">No</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('libros.edit', $libro) }}"
                               class="btn btn-sm btn-outline-secondary">Editar</a>

                            <form action="{{ route('libros.destroy', $libro) }}" method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('¿Eliminar este libro?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">No hay libros todavía.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $libros->links() }}
@endsection