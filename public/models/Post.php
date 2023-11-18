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
                 <a class="btn" href="single_post.html">SABER MÁS...</a>
                 <span>
                 <i class="fa fa-heart sr-icons"></i> <?=$this->likes?>
                 </span>
               </div>
             </div>
           </div>
        <?php
        }
    }
?>