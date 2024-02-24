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
              <?php create_submit("single_post.php?id=".$post->__get("id"), "SABER MÁS...");?>
              <?php $tags = explode("/", $post->__get("tags"));?>
              <?php foreach($tags as $tag){?>
                <span style="border: 1px solid black; border-radius:5px; padding: 5px; background-color:#31B0D5; font-weight:bold; color:white"><?=$tag?></span>
              <?php }?>
            <span style="margin-left: 1em">
              <i class="fa fa-heart sr-icons" style="color:red;"></i> <?=$post->__get("likes")?>
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
?>