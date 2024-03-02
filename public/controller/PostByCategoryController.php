<?php
    include '../models/Post.php';
    include_once "../views/cards/post_card.php";

    // Obtener los posts por categoría
    if(isset($_GET['category'])){
      $category = $_GET['category'];
      $postByCategory = Post::GetByCategoryAndOrdered($category);
    } else{
      $postByCategory = Post::GetAll();
    }

    // Obtener el post_id del formulario y aumentar un like
    if(isset($_POST['post_id'])) {
        $post_id = $_POST['post_id'];
        Post::IncreaseLikes($post_id);

        header("Location: ".$_SERVER['PHP_SELF']);
    }

    // Paginación
    $pages = count($postByCategory)%3 ? intdiv(count($postByCategory), 3) + 1 : intdiv(count($postByCategory),3);
    $page = (int)$_GET["page"];

    if($page > $pages)
      $page = $pages;
    elseif($page < 1){
      $page = 1;
    }

    $show_posts = array_slice($postByCategory, $page*3 - 3, 3);

    require_once("../views/postByCategory.php");
?>