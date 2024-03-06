<?php
    include_once '../db/DBdriver.php';
    include_once '../models/Post.php';
    include_once '../models/User.php';

    session_start();

    // Se obtienen todos los posts de la base de datos
    $posts = Post::GetAll();

    // Obtener el post_id del formulario y aumentar un like
    if(isset($_POST['post_id'])) {
        $post_id = $_POST['post_id'];
        Post::IncreaseLikes($post_id);

        header("Location: ".$_SERVER['PHP_SELF']."?page=".$_GET['page']);
    }

    // Se comprueba si se ha enviado un nuevo post y se registra en la base de datos
    if (isset($_POST['title'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $tags = $_POST['tags'];
        $category = $_POST['category'];
        $date = $_POST['date'];
        $formattedDate = date('Y-m-d', strtotime($date));

        //
        if(isset($_SESSION["user"])){
            $author = $_SESSION["user"]->id;
            $likes = 0;

            if(isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK){
                $dir = "../images/blog/";
                $name = uniqid() . '_' . $_FILES["image"]["name"];
                $target_file = $dir . basename($name);

                if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
                    $image = $target_file;

                    $newPost = new Post(
                        1,
                        $title,
                        $content,
                        $tags,
                        $category,
                        $formattedDate,
                        $image,
                        $likes,
                        $author
                    );
                    $newPost->Register();
                    $_SESSION["user"] = User::GetBy("id", $author);
                    header("Location: BlogController.php");
                }
            }
        } else {
            echo '<script>alert("Debes iniciar sesión para publicar un post.");</script>';
            echo '<script>window.location.href = "../controller/LoginController.php";</script>';

        }
    }

    // Paginación
    $pages = count($posts)%3 ? intdiv(count($posts), 3) + 1 : intdiv(count($posts),3);
    $page = (int)$_GET["page"];

    if($page > $pages)
        $page = $pages;
    elseif($page < 1){
        $page = 1;
    }

    $show_posts = array_slice($posts, $page*3 - 3, 3);

    include_once '../views/cards/post_card.php';
    include_once '../views/blog.php';

?>