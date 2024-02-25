<?php
    include_once dirname(__DIR__)."/db/DBdriver.php";
    include_once dirname(__DIR__)."/models/Post.php";



    $post = new Post(null, "Postazo", "", "", "", date('Y-m-d'), "/images/roble.jpg", 2, 1);

    $post->Register();

    echo "Post registrado";