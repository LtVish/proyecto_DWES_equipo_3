<?php
    include_once "../models/User.php";

    // Se recogen los datos del formulario
    $name = $_POST['name'] ?? '';
    $surname = $_POST['surname'] ?? '';
    $fullName = $name . " " . $surname;
    $nick = $_POST['nick'] ?? '';
    $email = $_POST['email'] ?? '';

    // Se crea un nuevo usuario con los datos recogidos
    $user = new User(0, $nick, $email, $fullName, 0, 0, [], [], []);

    // Se intenta suscribir al usuario a la newsletter
    $result = $user->subscriptionToNewsletter($nick, $email, $fullName);

    include_once "../views/newsletter_success.php";
?>