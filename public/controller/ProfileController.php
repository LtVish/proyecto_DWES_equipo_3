<?php
    require_once "../models/User.php";
    require_once "../models/Event.php";
    require_once "../models/Post.php";
    require_once "../utils/Validator.php";

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

    function comprobar_modificacion(User $user, array &$errors){
        if(isset($_POST["mod_email"]) && !empty(trim($_POST["mod_email"]))){
            $errors = validate_user($_POST["mod_email"], true);
            if(!$errors){
                $test_user = User::GetBy("email", trim($_POST["mod_email"]), true);
                if(!$test_user)
                    $user->__set("email", trim($_POST["mod_email"]));
                else
                    $errors["email_usado"] = "El email ya está en uso";
            }
        }

        if(isset($_POST["mod_nombre"]) && !empty(trim($_POST["mod_nombre"]))){
            $user->__set("full_name", $_POST["mod_nombre"]);
        }

        if(isset($_POST["mod_nick"]) && !empty(trim($_POST["mod_nick"]))){
            $test_user = User::GetBy("nick", trim($_POST["mod_nick"]), true);
            if(!$test_user)
                $user->__set("nick", trim($_POST["mod_nick"]));
            else
                $errors["nick_usado"] = "El nick ya está en uso";
        }

        $user->Update();
    }

    session_start();
    
    if(!isset($_SESSION["user"])){

        header("Location: controller/LoginController.php");
    }
    else{
        $user = $_SESSION["user"];
        $errors = array();
        comprobar_modificacion($user, $errors);
        $eventos = array();
        $posts = array();
        if(isset($_GET["info"]) && $_GET["info"] == "eventos")
            $eventos = generate_events($user);
        elseif(isset($_GET["info"]) && $_GET["info"] == "posts")
            $posts = generate_posts($user);

        include_once "../views/profile.php" ;
    }