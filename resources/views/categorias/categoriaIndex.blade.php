<x-admin-layout titulo="Lista de categorías">
    @if (session('success'))
        <x-success-message type="success" :mensaje="session('success')"/>
    @endif

    <a class="btn btn-primary" href="{{route('categoria.create')}}">Agregar categoría</a><br><br>
    <div class="container-fluid">
            <div class="table-responsive">
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Cantidad de subcategorías</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categorias as  $categoria)
                            <tr>
                                <td>{{ucfirst($categoria->nombre)}}</td>
                                <td>{{count($categoria->subcategorias)}}</td>
                                <td>
                                    <a class="btn btn-primary mt-1" href="{{route('categoria.show', $categoria)}}"> <i class="fa fa-info-circle"></i>Detalle</a>
                                    <a class="btn btn-success mt-1" href="{{route('categoria.edit', $categoria)}}">&#x270E;Editar</a>
                                    @can('delete', Auth::user())
                                        <form onsubmit="return confirm('Se eliminará el registro y todas sus relaciones, ¿continuar?')" action="{{route('categoria.destroy', $categoria)}}" method="POST">
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