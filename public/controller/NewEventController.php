<?php
    session_start();

    if(!isset($_SESSION["user"])){
        header("Location: LoginController.php");
    }
    else{
        
    }