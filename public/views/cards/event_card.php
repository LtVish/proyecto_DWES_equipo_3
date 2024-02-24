
<?php
function show_demo_post(Event $event){?>
        <div class="col-xs-12 col-sm-12">
          <div class="post">
            <div class="post-heading">
              <span><?=$event->__get("date")?></span>
              <img class="img-responsive" src=<?= $event->__get("image")?> alt="post's picture">
            </div>
            <div class="post-body">
              <h3><a href="single_post.html"><strong><?=$event->__get("name")?></strong></a></h3>
              <hr>
              <p><?=substr($event->description, 0, 250)?>
              </p>
            </div>
          <?php create_footer($event);?>
    <?php
    }

    function create_footer(Event $event){?>
          <div class="post-footer">
              <?php create_submit("single_event.php?id=".$event->__get("id"), "SABER MÁS...");?>
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