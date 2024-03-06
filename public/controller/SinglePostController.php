<?php

    include '../models/Post.php';
    include '../views/cards/single_post_template.php';
    include '../models/User.php';

    if(isset($_POST['post_id'])) {
        $post_id = $_POST['post_id'];

        $post = Post::GetBy('id', $post_id);
        $user = User::GetBy('id', $post->creator_id);
    }

    if(isset($_POST['like'])) {
        $post_id = $_POST['like'];

        Post::IncreaseLikes($post_id);
        header('Location: BlogController.php');
    }

    include_once '../views/single_post.php';
?>