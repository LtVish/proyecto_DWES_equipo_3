<?php
    class Post{
        private $title;
        private $content;
        private $tags;
        private $category;
        private $publish_date;
        private $image_path;
        private $likes;

        function __construct(
            string $title, string $content, array $tags, string $category, string $date, string $image_path, 
            int $likes){
            $this->title = $title;
            $this->content = $content;
            $this->tags = $tags;
            $this->category = $category;
            $this->publish_date = $date;
            $this->image_path = $image_path;
            $this->likes = $likes;
        }

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
                <div class="post-footer">
                  <?php $this -> create_submit_button(); ?>
                    <?php foreach($this->tags as $tag){?>
                      <a style="border: 1px solid black; border-radius:5px; padding: 5px; background-color:#31B0D5; font-weight:bold; color:white"><?=$tag?></a>
                    <?php }?>
                  <span style="margin-left: 1em">
                    <i class="fa fa-heart sr-icons" style="color:red;"></i> <?=$this->likes?>
                  </span>
                </div>
              </div>
            </div>
        <?php
        }

        function create_submit_button(){?>
          <form method="post" action="single_post.php" style="display:inline;">
            <input type="hidden" name="post" value="{}">
            <button class="btn" type=submit>SABER MÁS...</button>
          </form>
        <?php
        }
    }
?>