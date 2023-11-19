<?php
include './models/Event.php';
include './models/User.php';
include './managers/UserManager.php';
include './utils/DBdriver.php';
include './managers/EventManager.php';
echo 'h';

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
$emanager->ValidateEvent($event);
?>