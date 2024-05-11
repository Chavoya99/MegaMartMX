<x-cliente-layout titulo="Comprar productos">
    <h1>Bienvenido @if (Auth::check()) {{Auth::user()->name}} @endif</h1>
    <div class="container-fluid">
        <!-- Filtro por Categorías -->
        <div class="row mb-2">
            <div class="col-md-12">
                <form action="{{ route('cliente.homeIndex') }}" method="GET" id="filtroForm">
                    <div class="form-group">
                        <label for="categoria" class="sr-only">Categoría:</label>
                        <select name="categoria" id="categoria" class="form-control form-control-sm" onchange="submitForm()" style="font-size: 16px; width: 240px;">
                            <option value="all">Todas las categorías</option>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}" {{ $categoria->id == $categoriaSeleccionada ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            @if(count($productos) > 0)
            
                @foreach ($productos as $producto)
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card h-100">
                            <a  href="{{ route('cliente.producto.show', $producto) }}">
                                <img class="card-img-top" src="{{ asset(\Storage::url($producto->archivo->ubicacion)) }}" alt="{{ $producto->nombre }}" style="max-height: 200px;"> 
                            </a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a  href="{{ route('cliente.producto.show', $producto) }}">{{ $producto->nombre }}</a>
                                </h4>
                                <h5>${{ $producto->precio }}</h5>
                                <p class="card-text">{{ $producto->descripcion }}</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-success">Envío gratis <i class="fas fa-bolt"></i></small>
                                <small class="text-muted">a partir de $150 </small> 
                                <small class="text-muted">Disponibles: {{ $producto->existencia }}</small>
                                <div class="d-flex justify-content-between mt-2">
                                    <form action="{{ route('carrito.agregar', ['id' => $producto->id]) }}" method="POST" id="agregarForm{{$producto->id}}" style="display: inline;">
                                        @csrf
                                        <button type="button" class="btn btn-success btn-sm" onclick="agregarAlCarrito({{$producto->id}})"><i class="fas fa-plus"></i> Agregar</button>
                                    </form>
                                    <a class="btn btn-primary btn-sm" href="{{ route('cliente.producto.show', $producto) }}"> <i class="fa fa-info-circle"></i> Detalles</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-md-12 text-center">
                    <img src="{{ asset('img/gato.png') }}" alt="Pronto surtiremos más productos" style="max-width: 240px;">
                    <br><br><h3>Pronto surtiremos más producto.</h3>
                    <h5>La paciencia es una virtud</h5>
                </div>
            @endif
        </div>
    </div>
</x-cliente-layout>

<!-- Modal -->
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
    function submitForm() {
        document.getElementById("filtroForm").submit();
    }

    window.onload = function() {
        var categoriaSeleccionada = "{{ $categoriaSeleccionada }}";
        if (categoriaSeleccionada) {
            document.getElementById("categoria").value = categoriaSeleccionada;
        }
    }

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
