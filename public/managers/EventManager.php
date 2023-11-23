<?php
spl_autoload_register(function($class_name){
    include "../utils/".$class_name . ".php";
    include "../models/".$class_name . ".php";
});
class EventManager{
    private DBdriver $driver;
    function __construct(DBdriver $driver)
    {
        $this->driver=$driver;
    }
    function GetAllEvents():array{
        $events=[];
        $statement=$this->driver->ExecuteSQLQuery("select * from event;");
        while($row=$statement->fetch()){
            $creator_row=$this->driver->ExecuteSQLQuery("select * from user where id=".$row['creator_id'].";")->fetch();
            $participants=[];
            $species=[];
            $p_statement=$this->driver->ExecuteSQLQuery("select user.id,user.nick,user.email,user.full_name,user.karma from user,participant where user_id=user.id and event_id=".$row['id'].";");
            $s_statement=$this->driver->ExecuteSQLQuery("select 
            id, name, climate, region, growth_time_days, benefits, image, link from specie, specie_event where specie.id=specie_id and event_id=".$row['id'].";");
            while($p_row=$p_statement->fetch()){
                array_push($participants,new User($p_row['id'],$p_row['nick'],$p_row['email'],$p_row['full_name'],$p_row['karma']));
            }
            while($s_row=$s_statement->fetch()){
                array_push($species,new Specie($s_row['id'],$s_row['name'],$s_row['climate'],$s_row['region'],$s_row['growth_time_days'],
                $s_row['benefits'],$s_row['image'],$s_row['link']));
            }
            array_push($events,new Event($row['id'],$row['name'],$row['description'],$row['terrain'],$row['date'],
        $row['type'],new User($creator_row['id'],$creator_row['nick'],$creator_row['email'],$creator_row['full_name'],$creator_row['karma']),
        $participants,$species,$row['image'],$row['location']));
        }
        return $events;
    }
    function RegisterEvent(Event $event){    
        $this->driver->ExecuteSQLQuery("INSERT INTO event (name,description,terrain,date,type,creator_id,image,location)
        values('$event->name','$event->description','$event->terrain','$event->date','$event->type',".
        $event->creator->id.",'$event->image','$event->location');");
        foreach($event->participants as $participant){
            $this->driver->ExecuteSQLQuery("INSERT INTO participant values($participant->id,$event->id)");
        }
        foreach($event->species as $specie){
            $this->driver->ExecuteSQLQuery("INSERT INTO specie_event values($specie->id,$event->id)");
        }
    }
    function ModifyEvent(Event $changedEvent){
        $this->driver->ExecuteSQLQuery("UPDATE event
        SET name='$changedEvent->name', description='$changedEvent->description', terrain='$changedEvent->terrain',
        date='$changedEvent->date', type='$changedEvent->type', creator_id=".
        $changedEvent->creator->id.", image='$changedEvent->image'
        , location='$changedEvent->location'
        WHERE event.id=$changedEvent->id;");
        $this->driver->ExecuteSQLQuery("DELETE FROM participant WHERE event_id=$changedEvent->id");
        $this->driver->ExecuteSQLQuery("DELETE FROM specie_event WHERE event_id=$changedEvent->id");
        foreach($changedEvent->participants as $participant){
            $this->driver->ExecuteSQLQuery("INSERT INTO participant values($participant->id,$changedEvent->id)");
        }
        foreach($changedEvent->species as $specie){
            $this->driver->ExecuteSQLQuery("INSERT INTO specie_event values($specie->id,$changedEvent->id)");
        }
    }
    function FilteredEvents(string $word):array{
        return array_filter($this->GetAllEvents(),
        fn($event)=>str_contains($event->name,$word)||str_contains($event->description,$word)
        ||str_contains($event->location,$word)||str_contains($event->terrain,$word)||
    str_contains($event->type,$word)||$word==$event->date||str_contains($event->state,$word)||$word=$event->creator_id);
    }
    function ValidateEvent(Event $event):void{
        $this->driver->ExecuteSQLQuery("UPDATE event SET state=true WHERE id=$event->id");
    }
    function CalendarFilteredEvents():array{
    return array_filter($this->GetAllEvents(),fn($event)=>date_diff(date_create(),
    date_create($event->date))->m<=3 && date_create()<date_create($event->date) && 
    date_diff(date_create(),date_create($event->date))->days<=93);
    }
}
?>