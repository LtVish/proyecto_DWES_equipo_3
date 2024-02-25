<?php
    require_once "../models/User.php";
    require_once "../models/Event.php";
    require_once "../models/Post.php";

    function generate_events(User $user): array{
        $eventos = array();

        foreach($user->__get("participant_events_id") as $id){
            $eventos[] = Event::getBy("id", $id);
        }

        return $eventos;
    }

    function generate_posts(User $user): array{
        $posts = array();

        foreach($user->__get("posts_created_by_id") as $id){
            $posts[] = Post::getBy("id", $id);
        }

        return $posts;
    }

    session_start();
    
    if(!isset($_SESSION["user"])){

        header("Location: controller/LoginController.php");
    }
    else{
        $user = $_SESSION["user"];
        $eventos = array();
        $posts = array();
        if(isset($_GET["info"]) && $_GET["info"] == "eventos")
            $eventos = generate_events($user);
        elseif(isset($_GET["info"]) && $_GET["info"] == "posts")
            $posts = generate_posts($user);

        include_once "../views/profile.php" ;
    }