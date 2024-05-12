<x-cliente-layout titulo="Favoritos">
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-6">
                <a class="btn btn-primary" href="{{ route('cliente.homeIndex')}}">&#129044; Regresar</a>
            </div>
            <div class="col-md-6 text-right">
                <form action="{{ route('favoritos.vaciar') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Vaciar Favoritos</button>
                </form>
            </div>
        </div>
        
        @if (session('success'))
            <div class="row mb-3">
                <div class="col-md-12">
                    <x-success-message type="success" :mensaje="session('success')"/>    
                </div>
            </div>
        @endif
        

        <div class="row">
            @forelse($favoritos as $favorito)
                <div class="col-md-6 mb-3">
                    <div class="card h-100" style="border: 1px solid #ccc;background-color: transparent;">
                        <div class="card-body d-flex align-items-center">
                            <img src="{{ asset(\Storage::url($favorito->archivo->ubicacion)) }}" alt="{{ $favorito->nombre }}" class="mr-3" style="max-width: 100px;">
                            <div>
                                <h5 class="card-title">{{$favorito->nombre}}</h5>
                                <p class="card-text">Precio: ${{ number_format($favorito->precio, 2) }}</p>
                                <p class="card-text">Categoría: {{ $favorito->categoria->nombre }}</p>
                                <p class="card-text">Subcategoría: {{ $favorito->subcategoria->nombre}}</p>
                                <div class="d-flex align-items-center">
                                    <form action="{{ route('cliente.carrito.agregar.get', $favorito) }}" method="GET" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">
                                            <i class="fas fa-shopping-cart pr-1"></i> Añadir al carrito
                                        </button>
                                    </form>                                    
                                    <form action="{{route('cliente.quitar_favorito', $favorito)}}" method="POST" class="ml-2">
                                        @csrf
                                        <input type="hidden" name="accion" value="disminuir">
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i> Quitar de favoritos
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12 text-center">
                    <img src="{{ asset('img/corazon-roto.png') }}" alt="No hay favoritos" style="max-width: 250px; margin-bottom: 20px;">
                    <p class="mt-3">Aún no has agregado favoritos. <a href="{{ route('cliente.homeIndex')}}">¡Comienza ahora!</a></p>
                </div>
            @endforelse
        </div>
    </div>
</x-cliente-layout>

