<?php
    //Función para poder montar los elementos comunes a todas las páginas
    function localPagePrinter(callable $content){
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>
            <ul><li><a href="?Session=en_US">English</a></li><li><a href="?Session=es_ES">Español</a></li></ul>
            <h1> <?php echo _("Bienvenid@ a este sitio web multilingüe") ?> </h1>
            <ul>
                <li><a href="./index.php"><?php echo _("Inicio") ?></a></li>
                <li><a href="./aboutUs.php"><?php echo _("Acerca de nosotros") ?></a></li>
                <li><a href="./services.php"><?php echo _("Servicios") ?></a></li>
                <li><a href="./contact.php"><?php echo _("Contacto") ?></a></li>
            </ul>
            <?php $content(); ?>
        </body>
        </html>
        <?php
    }
    //Función auxiliar para traducir el contenido
    function enableTranslation($lang="en_US",$rute="locale/"){
        
        putenv("LC_ALL=".$lang);
        setlocale(LC_ALL,$lang);

        bindtextdomain("default",$rute);
        textdomain("default");
    }
    //Función para comprobar el estado de la sesión, comprobando si proviene de un Get y si hay una sesión activa
    function checkSession($s='LANG'){
        if(isset($_GET['Session'])){
            $_SESSION[$s]=$_GET['Session'];
        }
        if(isset($_SESSION[$s])){
            enableTranslation($_SESSION[$s]);
        }
    }

?>