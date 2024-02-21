<?php
include './util.php';
session_start();
//Función aplicada a imprimir el contenido no común.
function indexInfo(){
    ?>
    <p>
    <?php echo _("Esta es la página de inicio"); ?>
    </p>
    <?php 

}
checkSession('LANG');
localPagePrinter("indexInfo");
?>
