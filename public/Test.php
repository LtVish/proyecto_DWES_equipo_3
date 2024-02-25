<?php
include './models/Specie.php';
include './models/Event.php';
include './models/User.php';
include './models/Post.php';
$post=new Post(null,"xd","xd","xd","xd","2020-10-10","xd",1,1);
$post->Register();
//array_push($user->participant_events_id,2);

//echo join(", ",array_map(fn($p)=>$p->name.";".$p->id,Event::GetAll()));
//$u->RegisterUser();
/*
$driver=new DBdriver('database','reforestaDB','root','Pass1234');
$manager= new UserManager($driver);
if($manager->LoginUser(new User(3,"JohnyTest","Johnny@gmail.com","John John",0))){
    echo "<p>LOGGED</p>";
}
$emanager=new EventManager($driver);
$events=$emanager->GetAllEvents();
$event=new Event(1,"HHH","","","2020-12-1","1",
new User(3,"JohnyTest","Johnny@gmail.com","John John",0),[new User(3,"JohnyTest","Johnny@gmail.com","John John",0)],
[],"","");
foreach($events as $e){
    echo '<p>EVENT: '.$e->name.'</p>';
}*/
?>