<?php
    function show_post(Post $post){
      ?>
      <div style="margin:10px;">
      <h4 class="label-control"><?=$post-> title ?></h4>
      <img src=<?="../".$post-> image ?> class="img-responsive">
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