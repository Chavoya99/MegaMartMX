<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumen de Compra</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center; /* Añadido para centrar la imagen y el texto */
        }
        h1, h2, h3, h4, h5, h6 {
            margin-top: 0;
            margin-bottom: 0.5rem;
        
        }
        p {
            margin-top: 0;
            margin-bottom: 1rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .logo {
            max-width: 500px;
            margin-bottom: 20px; 
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        .contact-info {
            margin-top: 40px;
            text-align: center;
        }
        .contact-info p {
            margin: 3px 0;
        }
        /* Definición de la clase .center para centrar contenido */
        .center {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .purchase-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        hr {
            box-sizing: content-box;
            height: 0;
            overflow: visible;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1.25rem;
        }

        .card-title {
            margin-bottom: 0.75rem;
        }

        .bg-primary {
    background-color: #007bff !important;
}

.text-white {
    color: #fff !important;
}

.font-weight-bold {
    font-weight: bold !important;
}

.font-size-lg {
    font-size: larger !important;
}

.bg-success {
    background-color: #28a745 !important;
}

.bg-warning {
    background-color: #ffc107 !important;
}

.text-dark {
    color: #212529 !important;
}

.table {
    width: 100%;
    margin-bottom: 1rem;
    color: #212529;
}

.table th,
.table td {
    padding: 0.75rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
}

.table thead th {
    vertical-align: bottom;
    border-bottom: 2px solid #dee2e6;
}

.table tbody + tbody {
    border-top: 2px solid #dee2e6;
}

.table-striped tbody tr:nth-of-type(odd) {
    background-color: rgba(0, 0, 0, 0.05);
}

.align-middle {
    vertical-align: middle !important;
}

.text-center {
    text-align: center !important;
}

.img-fluid {
    max-width: 100%;
    height: auto;
}

.list-group {
    display: flex;
    flex-direction: column;
    padding-left: 0;
    margin-bottom: 0;
}

.list-group-item {
    position: relative;
    display: block;
    padding: 0.75rem 1.25rem;
    margin-bottom: -1px;
    background-color: #fff;
    border: 1px solid rgba(0, 0, 0, 0.125);
}

.list-group-item:first-child {
    border-top-left-radius: 0.25rem;
    border-top-right-radius: 0.25rem;
}

.list-group-item:last-child {
    margin-bottom: 0;
    border-bottom-right-radius: 0.25rem;
    border-bottom-left-radius: 0.25rem;
}

.list-group-item:hover, .list-group-item:focus {
    z-index: 1;
    text-decoration: none;
}

.list-group-item.disabled, .list-group-item:disabled {
    color: #6c757d;
    background-color: #fff;
}

.list-group-item.disabled.active, .list-group-item:disabled.active {
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
}

.list-group-item.active {
    z-index: 2;
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, 0.125);
    border-radius: 0.25rem;
}

.card-header {
    padding: 0.75rem 1.25rem;
    margin-bottom: 0;
    background-color: rgba(0, 123, 255, 0.03);
    border-bottom: 1px solid rgba(0, 123, 255, 0.125);
}

    </style>
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
