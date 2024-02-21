<?php
//Llamamos a la clase de carga del vendor para cargar todos los paquetes
include "../../vendor/autoload.php";
//Declaramos el array asociativo
$assoc=["James"=>10,"John"=>80,"Jake"=>50];
//Hacemos uso del módulo Kint, utilizando la función d para hacer debbug
d($GLOBALS,$_SERVER,$assoc);
?>