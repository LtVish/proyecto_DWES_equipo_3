<?php
    function show_post(Post $post, User $user){
    ?>
        <div class="row">
            <img src=<?="../".$post-> image ?> class="img-responsive">
            <h2><?=$post-> title ?></h2>
            <hr class="subtitle">
            <div class=" block1">
                <div class="col-xs-12 col-sm-9">
                    <p><?=$post-> content ?></p>
                    <h4>- By <?=$user -> full_name ?></h4>
                    <hr>
                    <ul class="list-inline">
                    <li><?=$post-> publish_date ?> |</li>
                    <span style="margin-left: 1em">
                        <form method="post" action="<?=htmlspecialchars($_SERVER["REQUEST_URI"])?>" style="display:inline;">
                        <input type="hidden" name="like" value=<?=$post->__get("id")?>>
                            <button type="submit" class="fa fa-heart sr-icons" style="color:red;"></i> <?=$post->__get("likes")?>
                        </form>
                    </span>
                    </ul>
                </div>

                <div class="col-xs-12 col-sm-3">
                    <h4>Recent Post</h4>
                    <hr class="subtitle1">

                    <div class="new new1">
                        <hr>
                           <a href="">Aliquam soluta</a>
                           <h5> By <span>Quae</span></h5>
                           <p>10 April</p><i class="fa fa-clock-o sr-icons"></i>  8:00 AM
                        <hr>
                    </div>

                    <div class="new">
                        <hr>
                            <a href="">Consequuntur</a>
                           <h5> By <span>Omnis</span></h5>
                           <p>12 May</p><i class="fa fa-clock-o sr-icons"></i>  4:00 PM
                           <hr>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }