<x-admin-layout titulo="Detalles de categoría">
    <h1>{{$categoria->nombre}}</h1>
    <a class="btn btn-primary" href="{{route('categoria.index')}}">&#129044;Regresar</a>
    <a class="btn btn-success" href="{{route('categoria.edit', $categoria)}}">&#x270E;Editar</a><br><br>
    
    @if (session('success'))
        <x-success-message type="success" :mensaje="session('success')"/>
    @endif
    <a class="btn btn-primary" href="{{route('subcategoria.create')}}">Agregar categoría</a><br><br>
    <h2>Subcategorías relacionadas</h2>
    <div class="table-responsive">
        <table class="table" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categoria->subcategorias as  $subcategoria)
                    <tr>
                        <td>{{$subcategoria->nombre}}</td>
                        <td>
                            <a class="btn btn-primary mt-1" href="{{route('producto.show', $subcategoria)}}"> <i class="fa fa-info-circle"></i>Detalle</a>
                            <a class="btn btn-success mt-1" href="{{route('producto.edit', $subcategoria)}}">&#x270E;Editar</a>
                            @can('delete', Auth::user())
                                <form style="display: inline;" onsubmit="return confirm('Se eliminará el registro, ¿continuar?')" action="{{route('producto.destroy', $subcategoria)}}" method="POST">
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


    <br>
</x-admin-layout>