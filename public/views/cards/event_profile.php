<?php
    function show_event(Event $event){
      ?>
      <div style="margin:10px;">
      <h4 class="label-control"><?=$event->__get("name")?></h4>
      <img src=<?="../".$event->__get("image")?> class="img-responsive">
      <p style="display:inline">
      <?php
        echo $event->__get("state") ? "" : "Por validar";
      ?>
      </p>
      <div class="form-group text-right">
        <button class="btn">Ver</button>
      </div>
    </div>
    <?php
    }