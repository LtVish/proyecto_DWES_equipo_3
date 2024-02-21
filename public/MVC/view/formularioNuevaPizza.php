<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grabar nueva pizza</title>
</head>
<body>
    <form action="controller/PizzaController.php?action=4" enctype="multipart/form-data" method="POST">
    <h3>Título</h3>
    <input type="text" size="40" name="titulo">
    <br><h3>Descripción</h3>
    <textarea name="descripcion" cols="60" rows="6"></textarea><hr>
    <input type="submit" value="Aceptar">
    </form>
</body>
</html>