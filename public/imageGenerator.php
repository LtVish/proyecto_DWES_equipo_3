<?php
    header("Content-Type: image/png");
    $im=imagecreate(400,400);
    $background_color=imagecolorallocate($im,204,255,255);
    $text_color=imagecolorallocate($im,0,0,0);
    imagestring($im,5,100,100,"Hello, PHP!",$text_color);
    imagepng($im,"cuadrado.png");
    imagedestroy($im);
    header("Content-Type: text/html");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="text/html; charset=UTF-8">
    <title>Generador de imágenes con PHP</title>
</head>
<body>
    <h1>Bienvenido a la página generadora de imágenes con PHP</h1>
    <img src="cuadrado.png" alt="">
</body>
</html>