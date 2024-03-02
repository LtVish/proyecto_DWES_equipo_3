<?php
    include_once '../db/DBdriver.php';
    include_once '../models/Post.php';

    $posts = Post::GetAll();

    function showRecentPosts (Post $post) { ?>
         <div class="post">
           <div class="post-heading">
              <span><?=$post->__get("publish_date")?></span>
              <img class="img-responsive" src=<?= $post->__get("image")?> alt="post's picture">
           </div>
           <div class="post-body">
              <h3><strong><?=$post->__get("title")?></strong></h3>
           </div>
         </div> <?php
    }
?>

<!-- Side bar -->
<div class="col-xs-12 col-sm-4">
   <form class="form-horizontal">
     <div class="input-group">
       <span class="input-group-btn">
          <a href="../controller/NewPostController.php" class="btn"><i class="fa fa-edit"> Nueva entrada en el blog</i></a>
       </span>
     </div>
   </form>
   <div class="panel">
     <div class="panel-heading">
       <h4>Categorías</h4>
     </div>
     <div class="panel-body">
       <ul class="nav">
         <li><a href="../controller/PostByCategoryController.php?category=1&page=1">Conciencia ambiental</a></li>
         <li><a href="../controller/PostByCategoryController.php?category=2&page=1">Proyectos de reforestación</a></li>
         <li><a href="../controller/PostByCategoryController.php?category=3&page=1">Historias inspiradoras</a></li>
         <li><a href="../controller/PostByCategoryController.php?category=4&page=1">Educación ambiental</a></li>
         <li><a href="../controller/PostByCategoryController.php?category=5&page=1">Técnicas de reforestación</a></li>
         <li class="last"><a href="../controller/PostByCategoryController.php?category=6&page=1">Otros</a></li>
       </ul>
     </div>
   </div>

    <h3>Entradas recientes</h3>
    <?php showRecentPosts($posts[0]); ?>
    <hr>
    <?php showRecentPosts($posts[1]); ?>
</div>
<!-- End of Side bar -->