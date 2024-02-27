<?php
    include_once dirname(__DIR__)."/db/DBdriver.php";
    include_once dirname(__DIR__)."/models/Event.php";

    /*$event = Event::GetBy("id", 13);

    $event->__set("state", true);

    $event->Update();

    echo "Evento modificado";*/

    $test = Event::GetBy("id", 13);
    $tests = $test->CalendarFilteredEvents();

    foreach($tests as $test){
        echo $test->__get("name");
    }