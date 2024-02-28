<?php
    include_once "../models/Event.php";
    include_once "../models/User.php";
    include_once "../models/Post.php";

    session_start();

    if(isset($_SESSION["user"]) && $_SESSION["user"]->nick == "admin"){
        $raw = Event::GetAll();
        $eventos = array_filter($raw, fn($event) => !$event->state);

        $raw = Post::GetAll();

        //No tiene ->state;
        $posts = $raw;

        include_once "../views/admin_panel.php";
    }
    else{
        header("Location: LoginController.php");
    }
