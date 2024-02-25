<?php
    require_once "../models/User.php";
    session_start();

    function generate_events(User $user): array{
        $eventos = array();

        

        return $eventos;
    }
    
    if(!isset($_SESSION["user"]))
        header("Location: LoginController.php");
    else{
        $user = $_SESSION["user"];

        $eventos = generate_events($user);
    }