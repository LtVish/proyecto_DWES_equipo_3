<?php

    include '../models/Post.php';
    include '../views/cards/single_post_template.php';
    include '../models/User.php';

    // Se obtiene el post y el usuario que lo ha escrito
    if(isset($_POST['post_id'])) {
        $post_id = $_POST['post_id'];

        $post = Post::GetBy('id', $post_id);
        $user = User::GetBy('id', $post->creator_id);
    }

    // Si el post ha recibido un like, se aumenta el like en la base de datos y se redirige a la página
    if(isset($_POST['like'])) {
        $post_id = $_POST['like'];

        Post::IncreaseLikes($post_id);
        header('Location: BlogController.php');
    }

    include_once '../views/single_post.php';
?>