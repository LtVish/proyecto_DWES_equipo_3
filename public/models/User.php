<?php
include_once '../db/DBdriver.php';
class User{
    private int|null $id;
    private string $nick;
    private string $email;
    private string $full_name;
    private int $karma;
    private bool $subscription;
    private array $events_created_by_id;
    private array $participant_events_id;
    private array $posts_created_by_id;
    //Meter en el resto los eventos asociados para obtener un mayor rendimiento en las consultas y no depender de event

    public function __construct(int|null $id, string $nick,string $email,string $full_name,int $karma,bool $subscription,array $events_created_by_id, array $participant_events_id,array $posts_created_by_id)
    {
        $this->id=$id;
        $this->nick=$nick;
        $this->email=$email;
        $this->full_name=$full_name;
        $this->karma=$karma;
        $this->subscription=$subscription;
        $this->events_created_by_id=$events_created_by_id;
        $this->participant_events_id=$participant_events_id;
        $this->posts_created_by_id=$posts_created_by_id;
    }

    public function __get($name)
    {
        if (property_exists(__CLASS__,$name)) {
            return $this->{$name};
        }
        $trace = debug_backtrace();
        trigger_error(
            'Undefined property via __get(): ' . $name .
            ' in ' . $trace[0]['file'] .
            ' on line ' . $trace[0]['line'],
            E_USER_NOTICE);
        return null;
    }
    public function __set($key,$value)
    {
        if (property_exists(__CLASS__,$key)) {
            $this->{$key}=$value;
        }
    }
    public static function GetAll():array{
        $users=[];
        driver->TearUp();
        $savedStatement=driver->ExecuteSQLQuery("select * from user;");
        while($row=$savedStatement->fetch()){
            $part_events_id=[];
            $created_by_id=[];
            $posts_created_by_id=[];
            $pe_event=driver->ExecuteSQLQuery("select event_id from participant where user_id=".$row['id'].";");
            $ce_event=driver->ExecuteSQLQuery("select id from event where creator_id=".$row['id'].";");
            $ce_posts=driver->ExecuteSQLQuery("select id from post where creator_id=".$row['id'].";");
            while($newRow=$pe_event->fetch()){
                array_push($part_events_id,$newRow['event_id']);
            }
            while($newRow2=$ce_event->fetch()){
                array_push($created_by_id,$newRow2['id']);
            }
            while($newRow3=$ce_posts->fetch()){
                array_push($posts_created_by_id,$newRow3['id']);
            }
            array_push($users,new User($row['id'],$row['nick'],$row['email'],$row['full_name'],$row['karma'],$row['subscription'],$created_by_id,$part_events_id,$posts_created_by_id));
        }
        driver->TearDown();
        return $users;
    }
    public static function GetBy($key,$value,$string=false):User|null{
        try{
            driver->TearUp();
            $value=$string?"'".$value."'":$value;
            $row=driver->ExecuteSQLQuery("select * from user where ".$key."=".$value.";")->fetch();
            if($row==null)throw new Exception("User does not exist in this context");
            $part_events_id=[];
            $created_by_id=[];
            $posts_created_by_id=[];
            $pe_event=driver->ExecuteSQLQuery("select event_id from participant where user_id=".$row['id'].";");
            $ce_event=driver->ExecuteSQLQuery("select id from event where creator_id=".$row['id'].";");
            $ce_posts=driver->ExecuteSQLQuery("select id from post where creator_id=".$row['id'].";");
            while($newRow=$pe_event->fetch()){
                array_push($part_events_id,$newRow['event_id']);
            }
            while($newRow2=$ce_event->fetch()){
                array_push($created_by_id,$newRow2['id']);
            }
            while($newRow3=$ce_posts->fetch()){
                array_push($posts_created_by_id,$newRow3['id']);
            }
            return new User($row['id'],$row['nick'],$row['email'],$row['full_name'],$row['karma'],$row['subscription'],$created_by_id,$part_events_id,$posts_created_by_id);
        }catch(Exception $e){
            echo "<p>Custom Exception: ".$e->getMessage()."</p>";
            return null;
        }
    }
    private static function GetLastIdAdded():int{
        driver->TearUp();
        $row=driver->ExecuteSQLQuery("select max(id) from user;")->fetch();
        driver->TearDown();
        return $row["max(id)"];
    }
    //Nota: El registro puede sobreescribir y añadir propietarios de eventos
    public function Register(){
        //TRANSACTION
        driver->TearUp();
        driver->BeginTransaction();
        driver->AddQueryIntoCurrentTransaction("INSERT INTO user (nick,email,full_name,karma,subscription) VALUES('$this->nick', '$this->email', '$this->full_name',$this->karma,$this->subscription);");
        if(driver->ExecuteTransaction()){
            $this->id=USER::GetLastIdAdded();
            driver->TearDown();
            driver->TearUp();
            driver->BeginTransaction();
            foreach($this->events_created_by_id as $id){
                driver->AddQueryIntoCurrentTransaction("UPDATE event SET creator_id=".$this->id." Where id=".$id.";");
            }
            foreach($this->participant_events_id as $id){
                driver->AddQueryIntoCurrentTransaction("INSERT into participant(user_id,event_id) VALUES($this->id,$id);");
            }
            foreach($this->posts_created_by_id as $id){
                driver->AddQueryIntoCurrentTransaction("UPDATE post SET creator_id=".$this->id." Where id=".$id.";");
            }
            driver->ExecuteTransaction();
        }
        driver->TearDown();
    }
    //NOTA: Los creadores de eventos no se pueden modificar desde este método. Un evento siempre tiene que tener a un creador
    public function Update(){
        driver->TearUp();
        driver->BeginTransaction();
        driver->AddQueryIntoCurrentTransaction("UPDATE user SET nick='$this->nick', email='$this->email', full_name='$this->full_name', karma=$this->karma  where user.id=$this->id");
        driver->AddQueryIntoCurrentTransaction("DELETE FROM participant WHERE user_id=$this->id");
        foreach($this->participant_events_id as $id){
            driver->AddQueryIntoCurrentTransaction("INSERT INTO participant values($this->id,$id)");
        }
        driver->ExecuteTransaction();
        driver->TearDown();
    }
    public function CheckLoginState():bool{
        $DBusers=User::GetAll();
        return count(array_filter($DBusers,fn ($p)=>$p==$this))>0;
    }
}
?>