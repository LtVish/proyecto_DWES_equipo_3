<?php
    include_once dirname(__DIR__)."/db/DBdriver.php";
    include_once dirname(__DIR__)."/models/Event.php";
    include_once dirname(__DIR__)."/models/User.php";

    $palabra = "palabra";

    echo(str_contains('', $palabra));
