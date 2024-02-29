<?php
    include_once '../db/DBdriver.php';

    // Obtener el post_id del formulario
    if(isset($_POST['post_id'])) {
        $post_id = $_POST['post_id'];

        // Incrementar el número de likes del post
        $sql = "UPDATE post SET likes = likes + 1 WHERE id = :post_id";
        $statement = $driver->GetPDO()->prepare($sql);
        $statement->bindParam(':post_id', $post_id);
        $statement->execute();
    }

    redirect("Location.href=../blog.php");
    exit();
?>