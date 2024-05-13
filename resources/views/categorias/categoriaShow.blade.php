<x-admin-layout titulo="Detalles de categoría">
    <h1>{{$categoria->nombre}}</h1>
    <a class="btn btn-primary" href="{{route('categoria.index')}}">&#129044;Regresar</a>
    <a class="btn btn-success" href="{{route('categoria.edit', $categoria)}}">&#x270E;Editar</a><br><br>
    
    @if (session('success'))
        <x-success-message type="success" :mensaje="session('success')"/>
    @endif
    <a class="btn btn-primary" href="{{route('subcategoria.create', $categoria)}}">Agregar subcategoría</a><br><br>
    <h2>Subcategorías relacionadas</h2>
    <div class="table-responsive">
        <table class="table" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr class="bg-primary text-white">
                    <th>Nombre</th>
                    <th>Cantidad de productos</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categoria->subcategorias as  $subcategoria)
                    <tr>
                        <td>{{ucfirst($subcategoria->nombre)}}</td>
                        <td>{{count($subcategoria->productos)."::::".$subcategoria->productos}}</td>
                        <td>
                            <a class="btn btn-success mt-1" href="{{route('subcategoria.edit', [$subcategoria, $categoria])}}">&#x270E;Editar</a>
                            @can('delete', Auth::user())
                                <form style="display: inline;" onsubmit="return confirm('Se eliminará el registro, ¿continuar?')" action="{{route('subcategoria.destroy', [$subcategoria, $categoria])}}" method="POST">
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