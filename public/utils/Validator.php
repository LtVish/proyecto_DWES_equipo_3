<?php
    function validate_user(User $user): array{
        $errors = array();
        if(!filter_var($user->__get("email"), FILTER_VALIDATE_EMAIL))
            $errors["email_invalido"] = "Formato de email no válido";
        return $errors;
    }