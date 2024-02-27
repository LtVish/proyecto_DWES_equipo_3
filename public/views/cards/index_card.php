<?php
    function generate_card($publicado, bool $event){
?>
        <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="sol">
                  <img  src=<?=$publicado->image?> width=485 height=300>
                  <div class="behind">
                      <div class="head text-center">
                        <ul class="list-inline">
                          <li> <!-- por añadir los posts -->
                            <a href=<?=$event ? "SingleEventController.php?id=$publicado->id" : ""?>
                             data-toggle="tooltip" data-original-title="Más información">
                              <i class="fa fa-info"></i>
                            </a>
                          </li>
                        </ul>
                      </div>
                      <div class="row box-content">
                        <?php if(!$event){?>
                        <ul class="list-inline text-center">
                          <li><?=$publicado->title?></li>
                          <li><i class="fa fa-heart"></i><?= $publicado->likes?></li>
                        </ul>
                        <?php }
                            else{
                        ?>
                        <ul class="list-inline text-center">
                          <li><?=$publicado->name?></li>
                          <li><i class="fa fa-calendar"></i><?=$publicado->date?></li>
                        </ul>
                        <?php } ?>
                      </div>
                  </div>
                </div>
                </div>
    <?php } ?>