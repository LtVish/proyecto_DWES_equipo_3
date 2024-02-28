<? 
    include_once "../models/Event.php";
    include_once "../models/User.php";
    session_start();
    if(!isset($_GET["search"]))
        $events = Event::GetAll();
    else
        $events = Event::FilteredEvents($_GET["search"]);

    $events = array_reverse($events);

    $pages = count($events)%3 ? intdiv(count($events), 3) + 1 : intdiv(count($events),3);
    
    $page = (int)$_GET["page"];

    if($page > $pages)
        $page = $pages;
    elseif($page < 1){
        $page = 1;
    }

    $show_events = array_slice($events, $page*3 - 3, 3);

    include_once '../views/cards/event_card.php';
    include_once "../views/event.php";