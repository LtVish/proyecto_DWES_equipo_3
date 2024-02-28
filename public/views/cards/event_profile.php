<?php
    function show_event(Event $event){
      ?>
      <div style="margin:10px;">
      <h4 class="label-control"><?=$event-> name ?></h4>
      <img src=<?="../".$event-> image?> class="img-responsive">
      <p style="display:inline">
      <?php
        echo $event-> state  ? "" : "Por validar";
      ?>
      </p>
      <div class="form-group text-right">
        <a href=<?="SingleEventController.php?id=".$event-> id ?>><button class="btn">Ver</button></a>
      </div>
    </div>
    <?php
    }