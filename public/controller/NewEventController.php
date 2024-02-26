<?php
    require_once "../models/Event.php";
    require_once "../models/User.php";
    session_start();
    $user;
    $errors = array();
    $event;
    $validated_inputs;
    $debugger = 0;
    if(!isset($_SESSION["user"])){
        header("Location: LoginController.php");
    }
    elseif(isset($_POST) && isset($_GET["action"]) && ($_GET["action"] == "create" || $_GET["action"] == "modify")){
        $user = $_SESSION["user"];

        if($_GET["action"] == "create")
            $event = new Event(1, "", "", "", "", "", $user->__get("id"), [$user->__get("id")], [], "", "", false);
        elseif(isset($_GET["id"]) && in_array($_GET["id"], $user->__get("events_created_by_id"))){
            $event = Event::GetBy("id", $_GET["id"], true);
        }
        
        if(isset($event)){
            $validated_inputs = 0;
            foreach($_POST as $key => $value){
                switch($key){
                    case "name":
                        if(trim($value)){
                            $event->__set("name", trim($value));
                            $validated_inputs++;
                        }
                        else
                            $errors["name"] = "Introduce un nombre";
                        break;
                    
                    case "description":
                        if(trim($value)){
                            $event->__set("description", trim($value));
                            $validated_inputs++;
                        }
                        else
                            $errors["description"] = "Introduce una descripción";
                        break;

                    case "location":
                        if(trim($value)){
                            $event->__set("location", trim($value));
                            $validated_inputs++;
                        }
                        else
                            $errors["location"] = "Introduce un lugar";
                        break;
                    
                    case "terrain":
                        if(trim($value)){
                            $event->__set("terrain", trim($value));
                            $validated_inputs++;
                        }
                        else
                            $errors["terrain"] = "Introduce un terreno";
                        break;
                    
                    case "type":
                        if($value == "1"){
                            $event->__set("type", "1");
                            $validated_inputs++;
                        }
                        elseif($value == "2"){
                            $event->__set("type", "2");
                            $validated_inputs++;
                        }
                        $debugger = $validated_inputs;
                        break;
                    
                    case "date":
                        if($value){
                            try{
                                $new_date = new DateTime($value);
                                $actual_date = new DateTime(date('d-m-Y'));
                                $intervalo = $actual_date -> diff($new_date);
                                $dias_absoluto = $intervalo -> format("%R%d");
                                if($dias_absoluto > 0){
                                    $event->__set("date", $value);
                                    $validated_inputs++;
                                }
                                else
                                    throw new Exception("pass");
                            }
                            catch(Exception $e){
                                $errors["date"] = "Escoge una fecha posterior a ".date('d-m-Y').$dias_absoluto;
                            }
                        }
                        else
                            $errors["date"] = "Escoge una fecha posterior a ".date('d-m-Y');
                        break;
                }
            }
            if (isset($_FILES['image']) && is_uploaded_file ($_FILES['image']['tmp_name']) && $validated_inputs == 6
                            && ($_FILES['image']['type'] == "image/png" || $_FILES['image']['type'] == "image/jpeg")){

                $nombreImagen = "../images/events/".time().$_FILES['image']['name'];
                move_uploaded_file ($_FILES['image']['tmp_name'], $nombreImagen);
                $event->__set("image", $nombreImagen);
                $validated_inputs++;   
            }
            elseif($validated_inputs == 6){}
                $errors["image"] = "Seleccione un formato válido (jpeg o png)";

            if($_GET["action"] == "create" && $validated_inputs == 7){
                $event->Register();
                $_SESSION["user"] = User::GetBy("id", $user->__get("id"));
                $_SESSION["user"]->__set("karma", $_SESSION["user"]->__get("karma") + 7);
                $_SESSION["user"]->Update();
                header("Location: EventsController.php");
            }
            elseif($_GET["action"] == "modify" && ($validated_inputs == 7 || $validated_inputs == 6)){
                $event->Update();
                header("Location: EventsController.php");
            }
            else{
                include_once "../views/new_event.php";
            }
        }
        else
            header("Location: LoginController.php");
    }
    else
        header("Location: LoginController.php");