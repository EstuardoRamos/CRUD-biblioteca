<div class="mb-3">
    <label for="titulo" class="form-label">Título</label>
    <input type="text" id="titulo" name="titulo"
           class="form-control @error('titulo') is-invalid @enderror"
           value="{{ old('titulo', $libro?->titulo) }}">
    @error('titulo')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="autor_id" class="form-label">Autor</label>
    <select id="autor_id" name="autor_id"
            class="form-select @error('autor_id') is-invalid @enderror">
        <option value="">Selecciona un autor</option>
        @foreach ($autores as $autor)
            <option value="{{ $autor->id }}"
                    @selected(old('autor_id', $libro?->autor_id) == $autor->id)>
                {{ $autor->nombre }}
            </option>
        @endforeach
    </select>
    @error('autor_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="isbn" class="form-label">ISBN (opcional)</label>
    <input type="text" id="isbn" name="isbn" inputmode="numeric"
           class="form-control @error('isbn') is-invalid @enderror"
           value="{{ old('isbn', $libro?->isbn) }}">
    @error('isbn')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label for="anio_publicacion" class="form-label">Año de publicación</label>
        <input type="number" id="anio_publicacion" name="anio_publicacion"
               class="form-control @error('anio_publicacion') is-invalid @enderror"
               value="{{ old('anio_publicacion', $libro?->anio_publicacion) }}">
        @error('anio_publicacion')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label for="paginas" class="form-label">Páginas</label>
        <input type="number" id="paginas" name="paginas"
               class="form-control @error('paginas') is-invalid @enderror"
               value="{{ old('paginas', $libro?->paginas) }}">
        @error('paginas')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-check mb-3">
    <input type="checkbox" id="disponible" name="disponible" value="1"
           class="form-check-input"
           @checked(old('disponible', $libro?->disponible ?? true))>
    <label for="disponible" class="form-check-label">Disponible</label>
</div>