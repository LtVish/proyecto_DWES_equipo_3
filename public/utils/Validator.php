<?php
    function validate_user(string $email, bool $login): array{
        $errors = array();
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            if(!$login)
                $errors["email_register"] = "Formato de email no válido";
            else
            $errors["email_login"] = "Formato de email no válido";
        }
        return $errors;
    }