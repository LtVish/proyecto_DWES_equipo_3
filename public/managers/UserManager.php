<?php
spl_autoload_register(function($class_name){
    include "../utils/".$class_name . ".php";
    include "../models/".$class_name . ".php";
});
class UserManager{
    private DBdriver $driver;
    function __construct(DBdriver $driver)
    {
        $this->driver=$driver;
    }
    function GetAllUsers():array{
        $users=[];
        $savedStatement=$this->driver->ExecuteSQLQuery("select * from user;");
        while($row=$savedStatement->fetch()){
            array_push($users,new User($row['id'],$row['nick'],$row['email'],$row['full_name'],$row['karma']));
        }
        return $users;
    }
    function RegisterUser(User $user){
        $this->driver->ExecuteSQLQuery("INSERT INTO user (nick,email,full_name,karma) VALUES('$user->nick', '$user->email', '$user->full_name',$user->karma);");
    }
    function ModifyUser(User $user){
        $this->driver->ExecuteSQLQuery("UPDATE user SET nick='$user->nick', email='$user->email', full_name='$user->full_name', karma=$user->karma  where user.id=$user->id");
    }
    function LoginUser(User $user):bool{
        $DBusers=$this->GetAllUsers();
        if(count(array_filter($DBusers,fn ($p)=>$p==$user))>0){
            return true;
        }
        else{
            return false;
        }
    }
    function JoinEventUser(User $user, Event $event){
        $this->driver->ExecuteSQLQuery("INSERT INTO participant (user_id,event_id) VALUES($user->id,$event->id)");
    }
}
?>