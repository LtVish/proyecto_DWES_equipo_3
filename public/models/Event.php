<?php
spl_autoload_register(function($class_name){
    include "../models/".$class_name . ".php";
});
//AÑADIR PROPIEDAD STRING STATE
class Event{
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

    function show_demo_post(){?>
        <div class="col-xs-12 col-sm-12">
          <div class="post">
            <div class="post-heading">
              <span><?=$this->date?></span>
              <img class="img-responsive" src=<?= $this->image?> alt="post's picture">
            </div>
            <div class="post-body">
              <h3><a href="single_post.html"><strong><?=$this->name?></strong></a></h3>
              <hr>
              <p><?=substr($this->description, 0, 250)?>
              </p>
            </div>
          <?php $this->create_footer();?>
    <?php
    }

    function create_footer(){?>
          <div class="post-footer">
              <?php $this -> create_submit("single_post.php", "SABER MÁS...");?>
          </div>
        </div>
      </div>
    <?php
    }
    
    function create_submit($action, $button_message){?>
      <form method="post" action=<?=$action?> style="display:inline;">
        <input type="hidden" name="post" value="{}">
        <button class="btn" type=submit><?=$button_message?></button>
      </form>
    <?php }
}
?>