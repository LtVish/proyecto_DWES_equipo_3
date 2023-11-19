<?php
    include "Post.php";

    class Event extends Post{
        private $terrain;
        private $type;
        private $creator;
        private $participants;
        private $species;
        private $location;
        function __construct(string $name, string $description, string $terrain, string $date, string $type,
            string $creator, array $participants, array $species, string $image_path, string $location){
                $this->title = $name;
                $this->content = $description;
                $this->terrain = $terrain;
                $this->publish_date = $date;
                $this->type = $type;
                $this->creator = $creator;
                $this->participants = $participants;
                $this->species = $species;
                $this->image_path = $image_path;
                $this->location = $location;
        }

        public function __get($name){
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