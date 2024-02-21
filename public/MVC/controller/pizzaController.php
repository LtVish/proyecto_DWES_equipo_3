<?php
echo dirname(__DIR__).'/DB/pizzeriadb.php';
include_once dirname(__DIR__).'/DB/pizzeriadb.php';
require_once dirname(__DIR__).'/models/pizza.php';

function borrarPizza() {
    $pizzaAux = new Pizza($_GET['id']);
    $pizzaAux->delete();
}

function grabarNuevaPizza() {
    $pizzaAux = new Pizza(0,$_POST['titulo'],$_POST['descripcion']);
    $pizzaAux->insert();
}


if(isset($_GET['accion']) && !empty($_GET['accion'])) {
    $accion = $_GET['accion'];
} else {
    //establecemos acción por defecto listar las pizzas de la DB
    $accion= 1;
}

switch($accion) {
    //borrar pizza
    case "2": 
        borrarPizza();
        header('Location: http://'.$_SERVER['SERVER_NAME'].'/index.php');
        break;
    //grabar nueva pizza
    case "4":
        grabarNuevaPizza();
        header('Location: http://'.$_SERVER['SERVER_NAME'].'/index.php');
        break;
    default:
        // Obtiene todas las pizzas
        $data['pizzas'] = Pizza::getPizzas();
        // Las muestra en el listado
        require_once dirname(__DIR__).'/view/listadoPizzas.php';
    break;

}

?>