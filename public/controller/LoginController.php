<?php
    require_once "../models/User.php";
    require_once "../utils/Validator.php";

    function check_register(&$errors){
        $registered = false;
        if(isset($_POST["full_name"]) && !empty(trim($_POST["full_name"]))
            && isset($_POST["nick"]) && !empty(trim($_POST["nick"]))
            && isset($_POST["email"]) && !empty(trim($_POST["email"]))){
                
                $user = new User(null, trim($_POST["nick"]), trim($_POST["email"]), trim($_POST["full_name"]), 0, [], []);
                $errors = validate_user($user);
                if(empty($errors)){
                    if(!User::GetBy("nick", $user->__get("nick"), true) && !User::GetBy("email", $user->__get("email"), true)){
                        $user->Register();
                        if(User::getBy("nick", $_POST["nick"], true))
                            $registered = true;
                    }
                    else{
                        if(User::GetBy("nick", $user->__get("nick"), true))
                            $errors["nick_usado"] = "El nickname está ya en uso";
                        if(User::GetBy("email", $user->__get("email"), true))
                            $errors["email_invalido"] = "El email está ya en uso";
                    }
                }
            }
        
        return $registered;
    }

    function check_login(){
        if(isset($_POST["login"]) && !empty($_POST["login"])){

        }
    }
    session_start();

    $errors = array();

    $registered = check_register($errors);

    require_once "../views/login.php"
?>