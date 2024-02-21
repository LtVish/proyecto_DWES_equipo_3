<?php
include './util.php';
session_start();
//Función aplicada a imprimir el contenido no común.
function contactInfo(){
    ?>
    <p>
    <?php echo _("Esta es la página de contacto"); ?>
    </p>
    <?php 

}
checkSession('LANG');
localPagePrinter("contactInfo");
?>