<?php
    function show_post(Post $post){
      ?>
      <div style="margin:10px;">
      <h4 class="label-control"><?=$post->__get("title")?></h4>
      <img src=<?="../".$post->__get("image")?> class="img-responsive">
      <p style="display:inline">
      <?php
        //echo $event->__get("state") ? "" : "Por validar";
      ?>
      </p>
      <div class="form-group text-right">
        <button class="btn">Ver</button>
      </div>
    </div>
    <?php
    }