<?php
    include_once dirname(__DIR__)."/db/DBdriver.php";
    include_once dirname(__DIR__)."/models/Event.php";
    include_once dirname(__DIR__)."/models/User.php";
    include_once dirname(__DIR__)."/models/Specie.php";

    $event = Event::GetBy("id", 2);

    foreach($event->species_id as $id){
        $specie = Specie::GetBy("id", $id);
        echo "test";
    }
