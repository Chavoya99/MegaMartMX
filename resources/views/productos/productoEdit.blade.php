<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear nuevo producto</title>
</head>
<body>
    <a href="{{route('producto.index')}}">Cancelar</a><br>
    <h1>Introducir los datos necesarios</h1>
    <form action="{{route('producto.update', $producto)}}" method="POST">
        @csrf
        @method('PATCH')
        <label for="nombre">Nombre</label>
        <input name="nombre" type="text" value="{{old('nombre') ?? $producto->nombre}}">

        <br>
        <label for="categoria">Categoría</label>
        <select name="categoria" id="categoria">
            <option value="lacteos" @selected(old('categoria') ?? $producto->categoria == "lacteos")>Lácteos</option>
            <option value="bebidas" @selected(old('categoria') ?? $producto->categoria == "bebidas")>Bebidas</option>
            <option value="botanas" @selected(old('categoria') ?? $producto->categoria == "botanas")>Botanas</option>
        </select>

        <br>
        <label for="subCategoria">Subcategoria</label>
        <select name="subCategoria" id="subCategoria">
            <option value="energetizantes" @selected(old('subCategoria') ?? $producto->subCategoria == "energetizantes")>Energetizantes</option>
            <option value="vinos y licores" @selected(old('subCategoria') ?? $producto->subCategoria == "vinos y licores")>Vinos y licores</option>
            <option value="frituras" @selected(old('subCategoria') ?? $producto->subCategoria == "frituras")>Frituras</option>
        </select>
        <br>            
        <label for="precio">Precio</label>
        <input name="precio" type="number" value="{{old('precio') ?? $producto->precio}}">
        
        <br>
        <label for="codigoBarras">Código de barras</label>
        <input name="codigoBarras" type="text" value="{{old('codigoBarras') ?? $producto->codigoBarras}}">
        <br>
        <button type="submit">Editar</button>
    </form>
</body>
</html>