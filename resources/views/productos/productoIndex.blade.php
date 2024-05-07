<x-admin-layout titulo="Lista de productos">
    @if (session('success'))
        <x-success-message type="success" :mensaje="session('success')"/>
    @endif
    
    <a class="btn btn-primary" href="{{route('producto.create')}}">Agregar producto</a><br><br>
    <div class="container-fluid">
        
            <div class="table-responsive">
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Categoría</th>
                            <th>SubCategoría</th>
                            <th>Precio</th>
                            <th>Existencia</th>
                            <th>Código de barras</th>
                            <th>Proveedor</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productos as  $producto)
                            <tr>
                                <td>
                                    @if ($producto->archivo)
                                        <img src="{{asset(\Storage::url($producto->archivo->ubicacion))}}" width="80" height="80" alt="{{$producto->nombre}}">
                                    @else
                                        <img src="{{asset('img/producto_default.png')}}" width="80" height="80" alt="{{$producto->nombre}}">
                                    @endif
                                </td>
                                <td>{{$producto->nombre}}</td>
                                <td>{{ucfirst($producto->categoria->nombre)}}</td>
                                <td>{{ucfirst($producto->subcategoria->nombre)}}</td>
                                <td>${{$producto->precio}}</td>
                                <td>{{$producto->existencia}}</td>
                                <td>{{$producto->codigoBarras}}</td>
                                <td>{{$producto->proveedor->nombre}}</td>
                                <td>
                                    <a class="btn btn-primary mt-1" href="{{route('producto.show', $producto)}}"> <i class="fa fa-info-circle"></i>Detalle</a>
                                    <a class="btn btn-success mt-1" href="{{route('producto.edit', $producto)}}">&#x270E;Editar</a>
                                    @can('delete', Auth::user())
                                        <form onsubmit="return confirm('Se eliminará el registro, ¿continuar?')" action="{{route('producto.destroy', $producto)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input class="btn btn-danger mt-1" type="submit" value="x Eliminar">
                                        </form>
                                    @endcan
                                </td>
                                
                            </tr> 
                        @endforeach
                    </tbody>
                </table>
            </div>
     
    </div>
</x-admin-layout>