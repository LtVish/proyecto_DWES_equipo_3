<? 
    include_once "../models/Event.php";
    include_once "../models/User.php";

    function filter_events(array $events){
        $to_return = [];

        if(isset($_GET["location"])){
            foreach($events as $event){
                if(str_contains(strtoupper($event->location), strtoupper($_GET["search"])) && !in_array($event, $to_return)){
                    $to_return[] = $event;
                }
            }
        }

        if(isset($_GET["type_terrain"])){
            foreach($events as $event){
                if(str_contains(strtoupper($event->terrain), strtoupper($_GET["search"])) && !in_array($event, $to_return)){
                    $to_return[] = $event;
                }
            }
        }

        if(isset($_GET["type"])){
            foreach($events as $event){
                if(str_contains(strtoupper($event->type), strtoupper($_GET["search"])) && !in_array($event, $to_return)){
                    $to_return[] = $event;
                }
            }
        }

        if(isset($_GET["date"])){
            foreach($events as $event){
                if(str_contains($event->date, $_GET["search"]) && !in_array($event, $to_return)){
                    $to_return[] = $event;
                }
            }
        }

        if(isset($_GET["state"])){
            foreach($events as $event){
                if($event->state && !in_array($event, $to_return)){
                    $to_return[] = $event;
                }
            }
        }

        if(isset($_GET["user"])){
            $id = User::getIdByNick($_GET["search"]);
            
            if($id){
                foreach($events as $event){
                    if($event->creator_id == $id && !in_array($event, $to_return)){
                        $to_return[] = $event;
                    }
                }
            }
        }

        return $to_return;
    }

    session_start();

    $checkboxes = [];
    $filtered_events = [];

    $events = Event::CalendarFilteredEvents();
    if(!isset($_GET["search"]) || (trim($_GET["search"]) == "" && !isset($_GET["state"]))){
        $filtered_events = $events;
    }
    else{
        $filtered_events = filter_events($events);
    }

    $filtered_events = array_reverse($filtered_events);

    $pages = count($filtered_events)%3 ? intdiv(count($filtered_events), 3) + 1 : intdiv(count($filtered_events),3);
    
    $page = (int)$_GET["page"];
    //echo "<h1>$page</h1>";

    if($page > $pages)
        $page = $pages;
    elseif($page < 1){
        $page = 1;
    }

    $show_events = array_slice($filtered_events, $page*3 - 3, 3);

    include_once '../views/cards/event_card.php';
    include_once "../views/event.php";