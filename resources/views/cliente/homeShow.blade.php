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
                                <img src="{{ asset(\Storage::url($producto->archivo->ubicacion)) }}" class="img-fluid" alt="{{ $producto->nombre }}">
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
                                            <form action="{{ route('cliente.nuevo_favorito', $producto) }}" method="POST" id="guardarForm{{$producto->id}}" style="display: inline;">
                                                @csrf
                                                <button type="button" class="btn btn-danger" onclick="guardarProducto({{$producto->id}})"><i class="fas fa-heart"></i> Guardar para más tarde</button>
                                            </form>                                            
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

<div class="modal fade" id="guardarModal{{$producto->id}}" tabindex="-1" role="dialog" aria-labelledby="guardarModalLabel{{$producto->id}}" aria-hidden="true">    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="guardarModalLabel{{$producto->id}}">¡Que bien!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <p>El producto ha sido agregado a favoritos<br>¡Sigue asi!</p>
                <div class="container mt-3 mb-3 text-center">
                    <img src="{{ asset('img/guardar.png') }}" alt="Seguir comprando" style="max-width: 150px;">
                </div>
            </div>
            <div class="modal-footer">
                
                <a href="{{ route('cliente.favoritos') }}" class="btn btn-danger">
                    <i class="fas fa-heart"></i> Ir a favoritos
                </a>
                <div class="ml-auto">
                    <button type="button" class="btn btn-warning text-dark" data-dismiss="modal">
                        Seguir comprando <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
            
        </div>
    </div>
</div>

<div class="modal fade" id="mensajeModal" tabindex="-1" role="dialog" aria-labelledby="mensajeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="mensajeModalLabel">¡Excelente!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <p>El producto ha sido agregado al carrito de compras<br>¡Sigue así!</p>
                <div class="container mt-3 mb-3 text-center">
                    <img src="{{ asset('img/seguir.png') }}" alt="Seguir comprando" style="max-width: 150px;">
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
    function guardarProducto(idProducto) {
        var form = document.getElementById("guardarForm" + idProducto);
        var formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (response.ok) {
                $('#guardarModal' + idProducto).modal('show'); 
            } else {
                alert("Hubo un error al guardar el producto en favoritos");
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert("Hubo un error al guardar el producto en favoritos");
        });
    }

    function seguirComprando() {
        $('#guardarModal').modal('hide');
    }
</script>





