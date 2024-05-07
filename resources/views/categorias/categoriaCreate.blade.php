<x-admin-layout titulo="Nueva categoría">
    <a class="btn btn-primary" href="{{route('categoria.index')}}">&#129044;Regresar</a><br>
    <h3>Introducir los datos necesarios</h3>
    <form action="{{route('categoria.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="nombre">Nombre</label>
        <input class="form-control" name="nombre" type="text" value="{{old('nombre')}}" placeholder="Nombre" required>
        @error('nombre')
            <div class="alert alert-danger" style="color:red;">{{ $message }}</div>
        @enderror
        <br>
        <button class="btn btn-primary" type="submit">Crear</button>
    </form>
</x-admin-layout>