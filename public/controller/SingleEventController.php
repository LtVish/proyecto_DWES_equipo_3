<?php
    include_once "../models/Event.php";
    include_once "../models/User.php";

    function add_participant(Event $event, User $user){
        if(isset($_POST["participar"])){
            $new_participants = $event->participants_id;
            $new_participants[] = $user->id;
            $event->participants_id = $new_participants;
            $event->Update();
            $_SESSION["user"] = User::GetBy("id", $user-> id);
            $user = $_SESSION["user"];
            if($event->state){
                $user -> karma += 3;
                $user -> Update();
            }
        }
    }

    function validate(Event &$event, User $user){
        if(isset($_POST["validar"]) && $user-> nick == "admin"){
            $participants = $event->participants_id;

            foreach($participants as $id){
                $participant = User::GetBy("id", $id);
                $participant->karma+=3;
                if($participant->id == $event->creator_id)
                    $participant->karma+=4;
                $participant->Update();
            }

            $event->ValidateEvent();
            $_SESSION["user"] = User::GetBy("id", $user->id);
            $event = Event::GetBy("id", $event->id);
        }
    }

    session_start();
    $user = "";
    $is_from_user;

    if(isset($_SESSION["user"]))
        $user = $_SESSION["user"];

    if(isset($_GET["id"]) && is_numeric($_GET["id"])){
        $event = Event::GetBy("id", $_GET["id"]);

        if($event){
            $creator_name = User::GetBy("id", $event-> creator_id)->nick;
            if($user){
                add_participant($event, $user);
                validate($event, $user);
                $is_from_user = $event-> creator_id == $user-> id;
                $is_participant = false;
                $is_creater = false;
                $is_admin = false;
                if($user){
                    $is_participant = in_array($user->id, $event->participants_id);
                    $is_creator = $event->creator_id == $user -> id;
                    $is_admin = $user->nick == "admin";
                }
            }
            include_once "../views/single_event.php";
        }
        else
            header("Location: EventsController.php?page=1");
    }
    else{
        header("Location: EventsController.php?page=1");
    }
