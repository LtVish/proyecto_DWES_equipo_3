<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Pizzeria DEMO</h1>
<a href="../view/formularioNuevaPizza.php">Crear nueva pizza</a>
<?php
    foreach($data['pizzas'] as $pizza){
?>
    <h3><?=$pizza->getTitulo()?></h3>
    <p><?=$pizza->getDescripcion()?></p>
    <a href="controller/PizzaController.php?accion=2&id=<?=$pizza->getId()?>">Borrar esta pizza</a>
<?php
    }
?>
</body>
</html>