<?php
include './util.php';
session_start();
//Función aplicada a imprimir el contenido no común.
function aboutInfo(){
    ?>
    <p>
    <?php echo _("Esta es la página de sobre nosotros"); ?>
    </p>
    <?php 

}
checkSession('LANG');
localPagePrinter("aboutInfo");
?>