<?php
include './util.php';
session_start();
//Función aplicada a imprimir el contenido no común.
function servicesInfo(){
    ?>
    <p>
    <?php echo _("Esta es la página de servicios"); ?>
    </p>
    <?php 

}
checkSession('LANG');
localPagePrinter("servicesInfo");
?>