<?php
spl_autoload_register(function($class_name){
    include "../models/".$class_name . ".php";
});
//AÑADIR PROPIEDAD STRING STATE
class Event extends Post{
    private int $id;
    private string $name;
    private string $description;
    private string $terrain;
    private string $date;
    private string $type;
    private User $creator;
    private array $participants;
    private array $species;
    private string $image;
    private string $location;
    function __construct(int $id,string $name,string $description,string $terrain,
    string $date,string $type,User $creator,array $participants, array $species,string $image,
    string $location){
        $this->id=$id;
        $this->name=$name;
        $this->description=$description;
        $this->terrain=$terrain;
        $this->date=$date;
        $this->type=$type;
        $this->creator=new User($creator->id,$creator->nick,$creator->email,$creator->full_name,$creator->karma);
        $this->participants=$participants;
        $this->species=$species;
        $this->image=$image;
        $this->location=$location;
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

    function create_footer(){?>
        <div class="post-footer">
                    <?php $this->create_submit("single_event.php", "SABER MÁS...");?>
                </div>
            </div>
        </div>
    <?php }
}
?>