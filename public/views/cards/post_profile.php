<?php
    function show_post(Post $post){
      ?>
      <div style="margin:10px;">
      <h4 class="label-control"><?=$post-> title ?></h4>
      <img src=<?="../".$post-> image ?> class="img-responsive">
      <p style="display:inline">
      </p>
      <div class="form-group text-right">
        <button class="btn">Ver</button>
      </div>
    </div>
<?php }?>
        