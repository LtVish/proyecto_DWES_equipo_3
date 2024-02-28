<?php
include_once '../db/DBdriver.php';
class Specie{
    private int $id;
    private string $name;
    private string $climate;
    private string $region;
    private int $growth_time_days;
    private string $benefits;
    private string $image;
    private string $link;
    private array $events_id;
    public function __construct(int $id, string $name, string $climate,string $region, int $growth_time_days
    ,string $benefits, string $image, string $link,$events_id)
    {
        $this->id=$id;
        $this->name=$name;
        $this->climate=$climate;
        $this->region=$region;
        $this->growth_time_days=$growth_time_days;
        $this->benefits=$benefits;
        $this->image=$image;
        $this->link=$link;
        $this->events_id=$events_id;
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
      $species=[];
      driver->TearUp();
      $statement=driver->ExecuteSQLQuery("select * from specie;");
      while($row=$statement->fetch()){
          $events=[];
          $e_statement=driver->ExecuteSQLQuery("select id from event,specie_event where event.id=event_id and specie_id=".$row['id'].";");
          while($s_row=$e_statement->fetch()){
              array_push($events,$s_row['id']);
          }
          array_push($species,new Specie($row['id'],$row['name'],$row['climate'],$row['region'],$row['growth_time_days'],$row['benefits'],
        $row['image'],$row['link'],$events));
      }
      driver->TearDown();
      return $species;
  }
  public static function GetBy($key,$value,$string=false):Specie|null{
    try{
        driver->TearUp();
        $value=$string?"'".$value."'":$value;
        $row=driver->ExecuteSQLQuery("select * from specie where ".$key."=".$value.";")->fetch();
        if($row==null)throw new Exception("Specie does not exist in this context");
        $part_events_id=[];
        $pe_event=driver->ExecuteSQLQuery("select event_id from specie_event where specie_id=".$row['id'].";");
        while($newRow=$pe_event->fetch()){
            array_push($part_events_id,$newRow['event_id']);
        }
        return new Specie($row['id'],$row['name'],$row['climate'],$row['region'],$row['growth_time_days'],$row['benefits'],
        $row['image'],$row['link'],$part_events_id);
    }catch(Exception $e){
        echo "<p>Custom Exception: ".$e->getMessage()."</p>";
        return null;
    }
}
    private static function GetLastIdAdded():int{
        driver->TearUp();
        $row=driver->ExecuteSQLQuery("select max(id) from specie;")->fetch();
        driver->TearDown();
        return $row["max(id)"];
    }
  //MODIFICAR
  function Register(){  
      //TRANSACTION
      driver->TearUp();
      driver->BeginTransaction();
      driver->AddQueryIntoCurrentTransaction("INSERT INTO specie (name,climate,region,growth_time_days
      ,benefits,link,image)
      values('$this->name','$this->climate','$this->region',$this->growth_time_days,'$this->benefits'
      ,'$this->image','$this->link');");
      //AddLast
      if(driver->ExecuteTransaction()){
            $this->id=Specie::GetLastIdAdded();
            driver->TearDown();
            driver->TearUp();
            driver->BeginTransaction();
            foreach($this->events_id as $id){
                driver->AddQueryIntoCurrentTransaction("INSERT INTO specie_event values($this->id,$id)");
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
      driver->AddQueryIntoCurrentTransaction("UPDATE specie
      SET name='$this->name', climate='$this->climate', region='$this->region',
      growth_time_days=$this->growth_time_days, benefits='$this->benefits', image='$this->image'
      , link='$this->link'
      WHERE specie.id=$this->id;");
      driver->AddQueryIntoCurrentTransaction("DELETE FROM specie_event WHERE specie_id=$this->id");
      foreach($this->events_id as $id){
        driver->AddQueryIntoCurrentTransaction("INSERT INTO specie_event values($this->id,$id)");
      }
      driver->ExecuteTransaction();
      driver->TearDown();
  }
}
?>