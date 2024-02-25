<?php
    require_once "../models/User.php";
    require_once "../utils/Validator.php";

    function check_register(&$errors){
        $registered = false;
        if(isset($_POST["full_name"]) && !empty(trim($_POST["full_name"]))
            && isset($_POST["nick"]) && !empty(trim($_POST["nick"]))
            && isset($_POST["email"]) && !empty(trim($_POST["email"]))){
                
                $user = new User(null, trim($_POST["nick"]), trim($_POST["email"]), trim($_POST["full_name"]), 0, false,[], [], []);

                // Se valida el email y en función de ello se registra el usuario
                // Errores para mostrar en la vista
                $errors = validate_user($user ->__get("email"), false);
                if(empty($errors)){

                    //Se comprueba de que el usuario no esté registrado en la base de datos
                    if(!User::GetBy("nick", $user->__get("nick"), true) && !User::GetBy("email", $user->__get("email"), true)){
                        $user->Register();
                        if(User::getBy("nick", $_POST["nick"], true))
                            $registered = true;
                    }
                    //Se generan los mensajes de error correspondientes en caso de que el usuario ya esssté registrado
                    else{
                        if(User::GetBy("nick", $user->__get("nick"), true))
                            $errors["nick_usado"] = "El nickname está ya en uso";
                        if(User::GetBy("email", $user->__get("email"), true))
                            $errors["email_usado"] = "El email está ya en uso";
                    }
                }
            }
        
        return $registered;
    }

    function check_login(&$errors){
        if(isset($_POST["login_nick"]) && !empty(trim($_POST["login_nick"]))
            && isset($_POST["login_email"]) && !empty(trim($_POST["login_email"]))){
            
            //Se valida el email y se procede a loguear al usuario
            $errors = validate_user($_POST["login_email"], true);

            //Se comprueba de que nick y el email introducidos en el form coincidan
            if(empty($errors)){
                $user = User::GetBy("nick", $_POST["login_nick"], true);
                if($user  && $user->__get("email") == $_POST["login_email"]){
                    $_SESSION["user"] = $user;
                    header("Location: ProfileController.php?info=posts");
                }
                else
                    $errors["no_existe"] = "El usuario introducido no existe";
            }
        }
    }
    session_start();

    $errors = array();

    if(!isset($_SESSION["user"])){
        $registered = check_register($errors);
        check_login($errors);
        if(!isset($_SESSION["user"]))
            require_once "../views/login.php";
    }
    else{
        header("Location: ProfileController.php?info=posts");
    }
?>