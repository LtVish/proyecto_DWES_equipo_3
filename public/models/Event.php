<?php
include_once '../db/DBdriver.php';
class Event{
    private int $id;
    private string $name;
    private string $description;
    private string $terrain;
    private string $date;
    private string $type;
    private int $creator_id;
    private array $participants_id;
    private array $species_id;
    private string $image;
    private string $location;
    private bool $state;

    function __construct(int $id,string $name,string $description,string $terrain,
    string $date,string $type,int $creator_id,array $participants_id, array $species_id,string $image,
    string $location,bool $state){
        $this->id=$id;
        $this->name=$name;
        $this->description=$description;
        $this->terrain=$terrain;
        $this->date=$date;
        $this->type=$type;
        $this->creator_id=$creator_id;
        $this->participants_id=$participants_id;
        $this->species_id=$species_id;
        $this->image=$image;
        $this->location=$location;
        $this->state=$state;
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

    static function GetAll():array{
      $events=[];
      driver->TearUp();
      $statement=driver->ExecuteSQLQuery("select * from event;");
      while($row=$statement->fetch()){
          $participants=[];
          $species=[];
          $p_statement=driver->ExecuteSQLQuery("select user.id from user,participant where user_id=user.id and event_id=".$row['id'].";");
          $s_statement=driver->ExecuteSQLQuery("select id from specie,specie_event where specie.id=specie_id and event_id=".$row['id'].";");
          while($p_row=$p_statement->fetch()){
              array_push($participants,$p_row['id']);
          }
          while($s_row=$s_statement->fetch()){
              array_push($species,$s_row['id']);
          }
          array_push($events,new Event($row['id'],$row['name'],$row['description'],$row['terrain'],$row['date'],
            $row['type'],$row['creator_id'],
            $participants,$species,$row['image'],$row['location'],$row["state"]));
      }
      driver->TearDown();
      return $events;
  }
  //Adaptar el GETBy a Event/Post/Specie
  public static function GetBy($key,$value,$string=false):Event|null{
    try{
        driver->TearUp();
        $value=$string?"'".$value."'":$value;
        $row=driver->ExecuteSQLQuery("select * from event where ".$key."=".$value.";")->fetch();
        if($row==null)throw new Exception("Event does not exist in this context");
        $part_users_id=[];
        $part_species_id=[];
        $pe_user=driver->ExecuteSQLQuery("select user_id from participant where event_id=".$row['id'].";");
        $ce_specie=driver->ExecuteSQLQuery("select specie_id from specie_event where event_id=".$row['id'].";");
        while($newRow=$pe_user->fetch()){
            array_push($part_users_id,$newRow['user_id']);
        }
        while($newRow2=$ce_specie->fetch()){
            array_push($part_species_id,$newRow2['id']);
        }
        return new Event($row['id'],$row['name'],$row['description'],$row['terrain'],$row['date'],$row['type'],$row['creator_id'],$part_users_id,$part_species_id
        ,$row['image'],$row['location'],$row['state']);
    }catch(Exception $e){
        echo "<p>Custom Exception: ".$e->getMessage()."</p>";
        return null;
    }
}
    private static function GetLastIdAdded():int{
        driver->TearUp();
        $row=driver->ExecuteSQLQuery("select max(id) from event;")->fetch();
        driver->TearDown();
        return $row["max(id)"];
    }
  //MODIFICAR
  function Register(){  
      //TRANSACTION
      driver->TearUp();
      driver->BeginTransaction();
      driver->AddQueryIntoCurrentTransaction("INSERT INTO event (name,description,terrain,date,type,creator_id,image,location)
      values('$this->name','$this->description','$this->terrain','$this->date','$this->type',".
      $this->creator_id.",'$this->image','$this->location');");
      //AddLast
      if(driver->ExecuteTransaction()){
            $this->id=Event::GetLastIdAdded();
            driver->TearDown();
            driver->TearUp();
            driver->BeginTransaction();
            foreach($this->participants_id as $id){
                driver->AddQueryIntoCurrentTransaction("INSERT INTO participant values($id,$this->id)");
            }
            foreach($this->species_id as $id){
                driver->AddQueryIntoCurrentTransaction("INSERT INTO specie_event values($id,$this->id)");
            }
            driver->ExecuteTransaction();
        }
      driver->TearDown();
  }
  //Aquí se puede cambiar el creador del evento (No se puede cambiar el estado)
  function Update(){
    driver->TearUp();
    driver->BeginTransaction();
      //TRANSACTIO[] Por cambiar
      driver->AddQueryIntoCurrentTransaction("UPDATE event
      SET name='$this->name', description='$this->description', terrain='$this->terrain',
      date='$this->date', type='$this->type', creator_id=".
      $this->creator_id.", image='$this->image'
      , location='$this->location', state=$this->state
      WHERE event.id=$this->id;");
      driver->AddQueryIntoCurrentTransaction("DELETE FROM participant WHERE event_id=$this->id");
      driver->AddQueryIntoCurrentTransaction("DELETE FROM specie_event WHERE event_id=$this->id");
      foreach($this->participants_id as $id){
          driver->AddQueryIntoCurrentTransaction("INSERT INTO participant values($id,$this->id)");
      }
      foreach($this->species_id as $id){
          driver->AddQueryIntoCurrentTransaction("INSERT INTO specie_event values($id,$this->id)");
      }
      driver->ExecuteTransaction();
      driver->TearDown();
  }
  static function FilteredEvents(string $word):array{
      return array_filter(Event::GetAll(),
      fn($event)=>str_contains($event->name,$word)||str_contains($event->description,$word)
      ||str_contains($event->location,$word)||str_contains($event->terrain,$word)||
  str_contains($event->type,$word)||$word==$event->date||str_contains($event->state,$word)||$word==$event->creator_id);
  }
  function ValidateEvent():void{
    driver->TearUp();
    driver->BeginTransaction();
    driver->AddQueryIntoCurrentTransaction("UPDATE event SET state=true WHERE id=$this->id");
    driver->ExecuteTransaction();
    driver->TearDown();
  }
  function CalendarFilteredEvents():array{
  return array_filter($this->GetAll(),fn($event)=>date_diff(date_create(),
  date_create($event->date))->m<=3 && date_create()<date_create($event->date) && 
  date_diff(date_create(),date_create($event->date))->days<=93);
  }
}
?>