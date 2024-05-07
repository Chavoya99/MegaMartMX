<x-admin-layout titulo="Editar categoría">
    <a class="btn btn-primary" href="{{route('categoria.show', $categoria)}}">&#129044;Regresar</a><br>
    <h3>Introducir los datos necesarios</h3>
    <form action="{{route('categoria.update', $categoria)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <label for="nombre">Nombre</label>
        <input class="form-control" name="nombre" type="text" value="{{old('nombre') ?? $categoria->nombre}}" placeholder="Nombre" required>
        @error('nombre')
            <div class="alert alert-danger" style="color:red;">{{ $message }}</div>
        @enderror
        <br>
        <button class="btn btn-primary" type="submit">Editar</button>
    </form>
</x-admin-layout>