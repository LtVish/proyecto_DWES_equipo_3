<?php
    include_once "../models/Event.php";
    include_once "../models/Post.php";
    include_once "../models/User.php";

    session_start();

    function compareDates(Event $a, Event $b) {

        $dateA = new DateTime($a->date);
        $dateB = new DateTime($b->date);
        
        return $dateA->getTimestamp() <=> $dateB->getTimestamp();
    }

    $events = Event::CalendarFilteredEvents();

    usort($events, "compareDates");

    $posts = Post::GetAll();
    $posts = array_reverse($posts);
    
    include_once "../views/home.php";