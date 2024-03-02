<?php

	if(isset($_FILES["image"]["tmp_name"]) && is_uploaded_file($_FILES["image"]["tmp_name"])){
		$dir = "images/";
		$name = $_FILES["image"]["name"];
		move_uploaded_file($_FILES["image"]["tmp_name"], $dir.$name);
	}

    include_once '../views/new_post.php';
?>

