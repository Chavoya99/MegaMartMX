<x-cliente-layout titulo="{{ $producto->nombre }}">
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <a class="btn btn-primary" href="{{ route('cliente.homeIndex')}}"> &#129044; Regresar</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                @if ($producto->archivo)
                                    <img src="{{ asset(\Storage::url($producto->archivo->ubicacion)) }}" class="img-fluid" alt="{{ $producto->nombre }}">
                                @else
                                    <img src="{{ asset('img/producto_default.png') }}" class="img-fluid" alt="{{ $producto->nombre }}">
                                @endif
                            </div>
                            <div class="col-md-8">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><strong>Categoría:</strong> {{ $producto->categoria->nombre }}</li>
                                    <li class="list-group-item"><strong>Subcategoría:</strong> {{ $producto->subcategoria->nombre }}</li>
                                    <li class="list-group-item"><strong>Precio:</strong> ${{ number_format($producto->precio, 2) }}</li>
                                    <li class="list-group-item">
                                        <strong>Descripción:</strong>
                                        <span class="text-success"> Envío gratis <i class="fas fa-bolt"></i></span> 
                                        Para toda la república mexicana a partir de $150 en tu carrito o $50 en envío. 
                                        Envío al día siguiente a la puerta de tu casa. 
                                        Solo pago en efectivo. 
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center" style="border-top: 1px solid #dee2e6;">
                                        <span style="flex-grow: 1;">Disponibilidad: {{ $producto->existencia }}</span>
                                        <div style="flex-grow: 1; text-align: right;">
                                            <form action="{{ route('carrito.agregar', ['id' => $producto->id]) }}" method="POST" id="agregarForm{{$producto->id}}" style="display: inline;">
                                                @csrf
                                                <button type="button" class="btn btn-success " onclick="agregarAlCarrito({{$producto->id}})"><i class="fas fa-plus"></i> Agregar al carrito</button>
                                            </form>
                                            @if ($producto->favoritos()->where('user_id', Auth::id())->exists())
                                                <button class="btn btn-danger" disabled><i class="fas fa-heart"></i> Guardar para más tarde</button>
                                            @else
                                            <form action="{{route('cliente.nuevo_favorito', $producto)}}" method="POST" style="display: inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-danger"><i class="fas fa-heart"></i> Guardar para más tarde</button>
                                            </form>
                                            @endif
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-cliente-layout>

<div class="modal fade" id="mensajeModal" tabindex="-1" role="dialog" aria-labelledby="mensajeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mensajeModalLabel">Producto Agregado al Carrito</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>El producto ha sido agregado correctamente al carrito de compras.</p>
                <div class="container mt-3 mb-3 text-center">
                    <img src="{{ asset('img/seguir.png') }}" alt="Seguir comprando" style="max-width: 100px;">
                </div>
            </div>
            <div class="modal-footer">
                <div class="mr-auto">
                    <a href="{{ route('carrito') }}" class="btn btn-primary">
                        <i class="fas fa-shopping-cart"></i> Ir al carrito
                    </a>
                </div>
                <div class="ml-auto">
                    <button type="button" class="btn btn-warning text-dark" data-dismiss="modal">
                        Seguir comprando <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function agregarAlCarrito(idProducto) {
        var form = document.getElementById("agregarForm" + idProducto);
        var formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (response.ok) {
                $('#mensajeModal').modal('show');
            } else {
                alert("Hubo un error al agregar el producto al carrito");
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert("Hubo un error al agregar el producto al carrito");
        });
    }
</script>
