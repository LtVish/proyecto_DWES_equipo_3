<?php
    include_once "../models/User.php";

    $name = $_POST['name'] ?? '';
    $surname = $_POST['surname'] ?? '';
    $fullName = $name . " " . $surname;
    $nick = $_POST['nick'] ?? '';
    $email = $_POST['email'] ?? '';

    $user = new User(0, $nick, $email, $fullName, 0, 0, [], [], []);
    $result = $user->subscriptionToNewsletter($nick, $email, $fullName);

    include_once "../views/newsletter_success.php";
?>