<x-cliente-layout titulo="">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-12">
                <h1>¡Bienvenido! <br>@if (Auth::check()) {{Auth::user()->name}} @endif </h1>
                @if (isset($busqueda))
                    <h3>Resultado de la búsqueda: "{{$busqueda}}"</h3>
                @endif
                
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-8 offset-md-2">
                <div id="carouselPortadas" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('img/descuentos.jpg') }}" class="d-block w-100" alt="Sombrero de Salir" style="max-height: 300px;">
                        </div>
                        <div class="carousel-item ">
                            <img src="{{ asset('img/whats.png') }}" class="d-block w-100" alt="WhatsApp" style="max-height: 300px;">
                        </div>
                        <div class="carousel-item ">
                            <img src="{{ asset('img/licores.png') }}" class="d-block w-100" alt="Licores" style="max-height: 300px;">
                        </div>
                        <div class="carousel-item ">
                            <img src="{{ asset('img/hotSale.png') }}" class="d-block w-100" alt="hotSale" style="max-height: 300px;">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselPortadas" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselPortadas" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
                </div>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-md-12">
                @if (Auth::check())
                    <form action="{{ route('cliente.homeIndex') }}" method="GET" id="filtroForm">
                @else
                    <form action="{{ route('clientes_guest') }}" method="GET" id="filtroForm">
                @endif
                
                    <div class="form-group">
                        <label for="categoria" class="sr-only">Categoría:</label>
                        <select name="categoria" id="categoria" class="form-control form-control-sm" onchange="submit()" style="font-size: 16px; width: 240px;">
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
                        <a href="{{ route('cliente.producto.show', $producto) }}">
                            @if($producto->archivo)
                                <img class="card-img-top is-fluid" src="{{ asset(\Storage::url($producto->archivo->ubicacion)) }}" alt="{{ $producto->nombre }}" style="max-height: 200px; max-width: 200px; margin-left:50px"> 
                            @else
                                <img class="card-img-top" src="{{asset('img/producto_default.png')}}" alt="{{ $producto->nombre }}" style="max-height: 200px;"> 
                            @endif
                        </a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="{{ route('cliente.producto.show', $producto) }}">{{ $producto->nombre }}</a>
                            </h4>
                            <h5>${{ $producto->precio }}</h5>
                        </div>
                        <div class="card-footer">
                            <small class="text-success">Envío gratis <i class="fas fa-bolt"></i></small>
                            <small class="text-muted">a partir de $150 </small> 
                            <small class="text-muted">Disponibles: {{ $producto->existencia }}</small>
                            <div class="d-flex justify-content-between mt-2">
                                <form action="{{ route('carrito.agregar', ['id' => $producto->id]) }}" method="POST" id="agregarForm{{$producto->id}}" style="display: inline;">
                                    @csrf
                                    <button class="btn btn-success btn-sm" @if(Auth::check())  type="button" onclick="agregarAlCarrito({{$producto->id}})" @else type="submit"  @endif><i class="fas fa-plus"></i> Agregar</button>
                                </form>
                                
                                <form action="{{route('cliente.nuevo_favorito', $producto)}}" method="POST" id="guardarForm{{$producto->id}}" style="display: inline;">
                                    @csrf
                                    <button  class="btn btn-danger btn-sm" @if(Auth::check()) type="button" onclick="guardarProducto({{$producto->id}})" @else type="submit" @endif><i class="fas fa-heart"></i> Guardar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="guardarModal{{$producto->id}}" tabindex="-1" role="dialog" aria-labelledby="guardarModalLabel{{$producto->id}}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
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
                <p>El producto ha sido agregado  al carrito de compras<br>¡Sigue asi!</p>
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
    function agregarAlCarrito(idProducto) {
        var form = document.getElementById("agregarForm" + idProducto);
        var formData = new FormData(form);

        presionarBotonActualizar();

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

    function seguirComprando(idProducto) {
        $('#guardarModal' + idProducto).modal('hide');
    }
</script>
