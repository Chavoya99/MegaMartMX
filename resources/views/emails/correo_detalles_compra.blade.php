<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Resumen de su Compra</title>
        <link rel="stylesheet" href="{{ asset('css/sb-admin-2.css') }}">
    </head>
    <body>

    <div class="container"><br>
        <div style="width: 50%; margin: 0 auto; text-align: center;">
            <img src="{{ asset('img/logo_lineal.png') }}" alt="Megamartmx" class="logo" style="width: 400px; display: block; margin: 0 auto;">
            <br>
            <strong><h2>Tu pedido N°{{ $compra->id }} ha sido confirmado.</h2></strong>
            <hr>
            <p>¡Hola {{ Auth::user()->name }}!<br>
                Esperamos que te encuentres bien.<br><br>
                Recibimos el pedido y estamos trabajando en él ahora.<br>
                Le enviaremos una actualización por correo electrónico cuando lo hayamos enviado.<br>
                <h3>Gracias por comprar con nosotros. ¡Esperemos que te guste!</h3>
            </p>
        </div>
        <hr>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-4">
                    <h4 class="card-title mb-0">Resumen del pedido</h4>
                    <br>
                    <p>Fecha: {{ $compra->fecha }}<p>
                </div>
                <div class="col-md-8">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="font-weight-bold">Subtotal:</span>
                            <span class="badge bg-primary badge-pill font-weight-bold font-size-lg text-white">${{ $compra->subtotal }}</span>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="font-weight-bold">Envío:</span>
                            <span class="badge badge-success badge-pill font-weight-bold font-size-lg text-white">${{ $compra->envio }}</span>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="font-weight-bold">Total:</span>
                            <span class="badge badge-warning badge-pill font-weight-bold font-size-lg text-dark">${{ $compra->total }}</span>
                        </div>
                    </div>
                </div>
            </div>
        
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <h4 class="card-title mb-4">Productos</h4>
                    <div class="table-responsive">
                        <table class="table table-striped" id="dataTable">
                            <thead>
                                <tr class="bg-primary text-dark">
                                    <th>Producto</th>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Precio unitario</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productos as $producto)
                                    <tr>
                                        <td class="align-middle text-center">
                                            @if ($producto->archivo)
                                                <img src="{{ asset(\Storage::url($producto->archivo->ubicacion)) }}" alt="{{ $producto->nombre }}" class="img-fluid mx-auto" style="max-height: 50px;">
                                            @else
                                                <img src="{{asset('img/producto_default.png')}}" alt="{{ $producto->nombre }}" class="img-fluid mx-auto" style="max-height: 50px;">
                                            @endif
                                        </td>
                                        <td class="align-middle">{{ $producto->pivot->nombre_producto }}</td>
                                        <td class="align-middle">{{ $producto->pivot->cantidad }}</td>
                                        <td class="align-middle">${{ $producto->pivot->precio_unitario }}</td>
                                        <td class="align-middle">${{ $producto->pivot->subtotal }}</td>
                                    </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div style="width: 50%; margin: 0 auto; text-align: center;">
            <div class="contact-info">
                <p>Para dudas o aclaraciones, contáctanos a: <a href="mailto:megamartmx@gmail.com">megamartmx@gmail.com</a></p>
                <p>Visita nuestro sitio web en: <a href="{{route('clientes_guest')}}">megamartmx.com.mx</a></p><br>
            </div>
        </div>    
    </div>
</body>
</html>
