<? 
    include_once "../models/Event.php";

    $events = Event::GetAll();

    include_once '../views/cards/event_card.php';
    include_once "../views/event.php";