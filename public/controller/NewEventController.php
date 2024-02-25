<?php
    require_once "../models/Event.php";
    session_start();
    $user;
    $errors = array();
    $event;
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
        
        if($event){
            $validated_inputs = 0;
            foreach($datos as $key => $value){
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
                                $errors["date"] = "Escoge una fecha posterior a ".date('d-m-Y');
                            }
                        }
                        else
                            $errors["date"] = "Escoge una fecha posterior a ".date('d-m-Y');
                        break;
                    
                    case "image":
                        if (is_uploaded_file ($_FILES['image']['tmp_name'])
                            && ($_FILES['image']['type'] == "image/png" || $_FILES['image']['type'] == "image/jpeg")){
                            $nombreDirectorio = "../images/events/";
                            move_uploaded_file ($_FILES['fichero']['tmp_name'], $nombreDirectorio .
                            $_FILES['fichero']['name']);
                        }
                        else
                            $errors["date"]
                            
                        break;
                }
            }
        }
    }