<x-mi-layout titulo="Detalles del producto">
    <a class="btn btn-primary" href="{{route('producto.index')}}">&#129044;Regresar</a>
    <a class="btn btn-success" href="{{route('producto.edit', $producto)}}">&#x270E;Editar</a><br><br>
        <li>Nombre: {{$producto->nombre}}</li>
        <li>Categoría: {{$producto->categoria}}</li>
        <li>Subcategoría: {{$producto->subCategoria}}</li>
        <li>Precio: {{$producto->precio}}</li>
        <li>Código de barras: {{$producto->codigoBarras}}</li>
</x-mi-layout>