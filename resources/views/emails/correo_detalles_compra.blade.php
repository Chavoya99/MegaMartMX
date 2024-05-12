<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumen de Compra</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> <!-- Enlace al archivo CSS -->
</head>
<body>

<div class="container">
    <div class="purchase-info">
        <h3>Compra N° {{ $compra->id }}</h3>
        <h3>{{ $compra->fecha }}</h3>
    </div>
    <hr>
    <img src="{{ asset('img/logo_completo.png') }}" alt="Megamartmx" class="logo">

    <h1 class="">¡Hola {{ Auth::user()->name }}!</h1>
    <p>Gracias por comprar con Nosotros.<br> ¡Esperemos te guste!</p>
    <h1>Resumen del pedido<h1>
    <h3>Subtotal: ${{ $compra->subtotal }} + Envío: ${{ $compra->envio }} <br> Total: ${{ $compra->total }}</h3>
    <br>
    <h1>Productos<h1>
    <table>
        <thead>
            <tr>
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
                            <img src="ruta/a/imagen/por/defecto.jpg" alt="{{ $producto->nombre }}" class="img-fluid mx-auto" style="max-height: 50px;">
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
    <div class="contact-info">
        <p>Para dudas o aclaraciones, contáctanos a: <a href="mailto:megamartmx@gmail.com">megamartmx@gmail.com</a></p>
        <p>Visita nuestro sitio web en: <a href="{{route('clientes_guest')}}">megamartmx.com.mx</a></p>
    </div>
</div>

</body>
</html>
