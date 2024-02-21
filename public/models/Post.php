<?php
    class Post{
        private $id;
        private $title;
        private $content;
        private $tags;
        private $category;
        private $publish_date;
        private $image;
        private $likes;
        private $creator_id;

        function __construct(int|null $id,
        string $title, string $content, string $tags, string $category, string $date, string $image, 
            int $likes, int $creator_id){
            $this->id=$id;
            $this->title = $title;
            $this->content = $content;
            $this->tags = $tags;
            $this->category = $category;
            $this->publish_date = $date;
            $this->image_path = $image;
            $this->likes = $likes;
            $this->creator_id=$creator_id;
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
          $posts=[];
          driver->TearUp();
          $statement=driver->ExecuteSQLQuery("select * from post;");
          while($row=$statement->fetch()){
              array_push($posts,new Post($row['id'],$row['title'],$row['content'],$row['tags'],$row['category'],$row['publish_date'],
            $row['image'],$row['likes'],$row['creator_id']));
          }
          driver->TearDown();
          return $posts;
      }
      public static function GetBy($key,$value,$string=false):Post|null{
        try{
            driver->TearUp();
            $value=$string?"'".$value."'":$value;
            $row=driver->ExecuteSQLQuery("select * from post where ".$key."=".$value.";")->fetch();
            if($row==null)throw new Exception("Post does not exist in this context");
            return new Post($row['id'],$row['title'],$row['content'],$row['tags'],$row['category'],$row['publish_date'],
            $row['image'],$row['likes'],$row['creator_id']);
        }catch(Exception $e){
            echo "<p>Custom Exception: ".$e->getMessage()."</p>";
            return null;
        }
    }
        private static function GetLastIdAdded():int{
            driver->TearUp();
            $row=driver->ExecuteSQLQuery("select max(id) from post;")->fetch();
            driver->TearDown();
            return $row["max(id)"];
        }
      //MODIFICAR
      function Register(){  
          //TRANSACTION
          driver->TearUp();
          driver->BeginTransaction();
          driver->AddQueryIntoCurrentTransaction("INSERT INTO post (title,content,tags,category,publish_date,image,creator_id,likes)
          values('$this->title','$this->content','$this->tags','$this->category','$this->publish_date','".
          $this->image."',$this->creator_id,$this->likes);");
          driver->ExecuteTransaction();
          driver->TearDown();
      }
      //Aquí se puede cambiar el creador del evento (No se puede cambiar el estado)
      function Update(){
        driver->TearUp();
        driver->BeginTransaction();
          //TRANSACTIO[] Por cambiar
          driver->AddQueryIntoCurrentTransaction("UPDATE post
          SET title='$this->title', content='$this->content', tags='$this->tags',
          category='$this->category', publish_date='$this->publish_date', creator_id=".
          $this->creator_id.", image='$this->image'
          , likes=$this->likes
          WHERE post.id=$this->id;");
          driver->ExecuteTransaction();
          driver->TearDown();
      }
/*
        function show_demo_post(){?>
            <div class="col-xs-12 col-sm-12">
              <div class="post">
                <div class="post-heading">
                  <span><?=$this->publish_date?></span>
                  <img class="img-responsive" src=<?= $this->image_path?> alt="post's picture">
                </div>
                <div class="post-body">
                  <h3><a href="single_post.html"><strong><?=$this->title?></strong></a></h3>
                  <hr>
                  <p><?=substr($this->content, 0, 250)?>
                  </p>
                </div>
              <?php $this->create_footer();?>
        <?php
        }

        function create_footer(){?>
              <div class="post-footer">
                  <?php $this -> create_submit("single_post.php", "SABER MÁS...");?>
                  <?php foreach($this->tags as $tag){?>
                    <span style="border: 1px solid black; border-radius:5px; padding: 5px; background-color:#31B0D5; font-weight:bold; color:white"><?=$tag?></span>
                  <?php }?>
                <span style="margin-left: 1em">
                  <i class="fa fa-heart sr-icons" style="color:red;"></i> <?=$this->likes?>
                </span>
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
*/
    }
?>