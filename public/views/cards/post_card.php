<?php
    function show_demo_post(Post $post){?>
        <div class="col-xs-12 col-sm-12">
          <div class="post">
            <div class="post-heading">
              <span><?=$post->__get("publish_date")?></span>
              <img class="img-responsive" src=<?= $post->__get("image")?> alt="post's picture">
            </div>
            <div class="post-body">
              <h3><a href="single_post.html"><strong><?=$post->__get("title")?></strong></a></h3>
              <hr>
              <p><?=substr($post->content, 0, 250)?>
              </p>
            </div>
          <?php create_footer($post);?>
    <?php
    }

    function create_footer(Post $post){?>
          <div class="post-footer">
          <a href="single_post.html" class="btn">Read more</a>
          <?php $category = $post->__get("category");
          $categoryName = getCategoryName($category);?>
          <span style="border: 1px solid black; border-radius:5px; padding: 9px; background-color:darkgrey; font-weight:bold; color:white"><?=$categoryName?></span>
              <?php $tags = explode("/", $post->__get("tags"));?>
              <?php foreach($tags as $tag){?>
                <span style="border: 1px solid black; border-radius:5px; padding: 5px; background-color:#31B0D5; color:white"><?=$tag?></span>
              <?php }?>
            <span style="margin-left: 1em">
              <i class="fa fa-heart sr-icons" style="color:red;"></i> <?=$post->__get("likes")?>
              <button class="fa fa-heart sr-icons" style="color:white; padding: 5px; background-color:red; border-radius:15px;">Like</i></button>
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

    function getCategoryName($category) {
        switch($category) {
        case 1: return "Conciencia ambiental";
        case 2: return "Proyectos de reforestación";
        case 3: return "Historias inspiradoras";
        case 4: return "Educación ambiental";
        case 5: return "Técnicas de reforestación";
        case 6: return "Otros";
        default: return "Categoría no definida";
        }
    }
?>