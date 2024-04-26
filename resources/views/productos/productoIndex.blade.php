<x-mi-layout titulo="Lista de productos">
    <a class="btn btn-primary" href="{{route('producto.create')}}">Agregar producto</a><br><br>
    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th>SubCategoría</th>
                        <th>Precio</th>
                        <th>Código de barras</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as  $producto)
                        <tr>
                            <td>{{$producto->nombre}}</td>
                            <td>{{ucfirst($producto->categoria->nombre)}}</td>
                            <td>{{ucfirst($producto->subcategoria->nombre)}}</td>
                            <td>{{$producto->precio}}</td>
                            <td>{{$producto->codigoBarras}}</td>
                            <td>
                                <a class="btn btn-primary mt-1" href="{{route('producto.show', $producto)}}"> <i class="fa fa-info-circle"></i>Detalle</a>
                                <a class="btn btn-success mt-1" href="{{route('producto.edit', $producto)}}">&#x270E;Editar</a>
                                <form onsubmit="return confirm('Se eliminará el registro, ¿continuar?')" action="{{route('producto.destroy', $producto)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input class="btn btn-danger mt-1" type="submit" value="x Eliminar">
                                </form>
                                
                            </td>
                            
                        </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-mi-layout>