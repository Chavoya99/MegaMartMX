<x-cliente-layout titulo="Carrito de Compras">
    <div class="d-flex justify-content-between align-items-center">
        <a class="btn btn-primary" href="{{ URL::previous() }}"> &#129044; Regresar</a>
    </div>
    
    <br><br>
    @if (session('success'))
        <x-success-message type="success" :mensaje="session('success')"/>
    @endif
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @if(session('carrito') && count(session('carrito')) > 0)
                        @foreach(session('carrito') as $id => $item)
                            <div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
                                <div style="display: flex; align-items: center;">
                                    <img src="{{ asset(\Storage::url($item['producto']->archivo->ubicacion)) }}" alt="{{ $item['producto']->nombre }}" style="max-width: 100px; margin-right: 20px;">
                                    <div>
                                        <h3>{{ $item['producto']->nombre }}</h3>
                                        <p>Precio: ${{ number_format($item['producto']->precio, 2) }}</p>
                                        <form action="{{ route('carrito.agregar', ['id' => $id]) }}" method="POST" style="display: inline;">
                                            @csrf
                                            <input type="hidden" name="accion" value="incrementar">
                                            <input type="hidden" name="max_cantidad" value="{{ $item['producto']->existencia }}"> <!-- Agrega el valor máximo de la cantidad -->
                                            <span>Cantidad: {{ $item['cantidad'] }}</span>
                                            <button type="submit" class="btn btn-primary btn-sm" {{ $item['cantidad'] >= $item['producto']->existencia ? 'disabled' : '' }}> <!-- Deshabilita el botón cuando la cantidad alcanza el máximo -->
                                                <i class="fas fa-plus"></i> Agregar
                                            </button>
                                        </form>
                                        <form action="{{ route('carrito.quitar', ['id' => $id]) }}" method="POST" style="display: inline;">
                                            @csrf
                                            <input type="hidden" name="accion" value="disminuir">
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Quitar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                    <div class="container">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-md-8 text-center">
                                <img src="{{ asset('img/no-hay-ventas.png') }}" alt="No hay ventas" style="max-width: 200px;">
                                <p class="mt-3">Aún no hay productos en tu carrito.
                                    <a href="{{route('clientes')}}">¡Comienza a comprar!</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Resumen del Pedido</h5>
                            <hr>
                            @php
                                $subtotal = 0;
                                $totalProductos = 0; // Variable para contar el total de productos
                                if(session('carrito')) {
                                    foreach(session('carrito') as $id => $item) {
                                        $subtotal += $item['producto']->precio * $item['cantidad'];
                                        $totalProductos += $item['cantidad']; // Suma la cantidad de cada producto
                                    }
                                    if ($subtotal < 150) {
                                        $subtotal += 50; // Suma $50 si el subtotal es menor a $150
                                    }
                                }
                            @endphp
                            @if ($subtotal >= 150)
                                <p style="color: green;">Tu pedido califica para envío GRATIS</p>
                            @else
                                <p style="color: grey;">Envío: $50</p>
                            @endif
                            <p>Subtotal ({{ $totalProductos }} productos): <br><strong style="font-size: 30px;">${{ number_format($subtotal, 2) }}</strong></p>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        @if (session('carrito') && count(session('carrito')) > 0)
                            <form action="{{ route('carrito.confirmar') }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-warning text-dark"><i class="fas fa-dollar-sign"></i> Proceder a la compra</button>
                            </form>
                        @else
                            <button type="submit" class="btn btn-warning text-dark" disabled><i class="fas fa-dollar-sign"></i> Proceder a la compra</button>
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
        <form action="{{ route('carrito.vaciar') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Vaciar carrito</button>
        </form>
    </body>
    </html>
</x-cliente-layout>
