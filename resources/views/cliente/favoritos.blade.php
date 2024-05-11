<x-cliente-layout titulo="Favoritos">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <a class="btn btn-primary" href="{{ route('cliente.homeIndex')}}"> &#129044; Regresar</a>
        </div>    
    </div>
    @if (session('success'))
        <x-success-message type="success" :mensaje="session('success')"/>    
    @endif
    <div class="col-md-8">
        @if(count($favoritos) > 0)
            @foreach($favoritos as $favorito)
                <div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
                    <div style="display: flex; align-items: center;">
                        <img src="{{ asset(\Storage::url($favorito->archivo->ubicacion)) }}" alt="{{ $favorito->nombre }}" style="max-width: 100px; margin-right: 20px;">
                        <div>
                            <h3>{{$favorito->nombre}}</h3>
                            <p>Precio: ${{ number_format($favorito->precio, 2) }}</p>
                            <p>Categoría: {{ $favorito->categoria->nombre }}</p>
                            <p>Subcategoría: {{ $favorito->subcategoria->nombre}}</p>
                            <form action="{{ route('cliente.producto.show', $favorito) }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus pr-1"></i>Comprar
                                </button>
                            </form>
                            <form action="{{route('cliente.quitar_favorito', $favorito)}}" method="POST" style="display: inline;">
                                @csrf
                                <input type="hidden" name="accion" value="disminuir">
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Quitar de favoritos</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-8 text-center">
                    <img src="{{ asset('img/corazon-roto.png') }}" alt="No hay favoritos" style="max-width: 200px;">
                    <p class="mt-3">Aún no has agregado favoritos.
                        <a href="{{route('cliente.homeIndex')}}">¡Comienza ahora!</a>
                    </p>
                </div>
            </div>
        </div>
        @endif
    </div>
</x-cliente-layout>