<?php
    include_once dirname(__DIR__)."/db/DBdriver.php";
    include_once dirname(__DIR__)."/models/Event.php";
    include_once dirname(__DIR__)."/models/User.php";

    $event = Event::GetBy("id", 14);

    $event -> name = "adios";

    echo $event -> name;
