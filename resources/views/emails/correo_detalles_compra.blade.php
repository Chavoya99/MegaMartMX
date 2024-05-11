<!DOCTYPE html>
<html lang="en">
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
        }
        h1, h3 {
            color: #333;
        }
        p {
            color: #666;
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
    </style>
</head>
<body>

<div class="container">
    <h1>Hola {{ Auth::user()->name }}</h1>
    <p>Gracias por comprar en MegaMartMX.</p>

    <h3>Este es el resumen de tu compra: {{ $compra->id }}</h3>
    <h3>Fecha de compra: {{ $compra->fecha }}</h3>

    <h3>Subtotal: ${{ $compra->subtotal }} <br> Envío: ${{ $compra->envio }} <br> Total: ${{ $compra->total }}</h3>

    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio unitario</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr>
                    <td>{{ $producto->pivot->nombre_producto }}</td>
                    <td>{{ $producto->pivot->cantidad }}</td>
                    <td>{{ $producto->pivot->precio_unitario }}</td>
                    <td>{{ $producto->pivot->subtotal }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>


