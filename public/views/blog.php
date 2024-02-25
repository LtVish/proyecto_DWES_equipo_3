<?php

include '../models/Post.php';
include_once "cards/post_card.php";
include '../db/DBdriver.php';

$db = new DBdriver('database', 'reforestaDB', 'root', 'Pass1234');

// Se comprueba si se ha enviado un nuevo post y se registra en la base de datos
if (isset($_POST['title'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $tags = $_POST['tags'];
    $category = $_POST['category'];
    $date = $_POST['date'];
    $formattedDate = date('Y-m-d', strtotime($date));

        if(isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK){
            $dir = "../images/";
            $name = uniqid() . '_' . $_FILES["image"]["name"];
            $target_file = $dir . basename($name);

            if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
                $image = $target_file;
            }
        }

    $author = 1;
    $likes = 0;

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
}

// Se obtienen todos los posts de la base de datos
$posts = Post::GetAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <title>Re-Forest-A | Blog</title>

    <!-- Bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <!-- Bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <!-- Font Awesome icons -->
    <link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>


<!-- Navbar -->
<?php include 'nav-bar.php'; ?>

<!-- Principal Content Start -->
   <div id="blog">
     <div class="container">
      <div class="row">

      <!-- Blocks of Posts -->
        <div class="col-xs-12 col-sm-8 row">
            <?php
            // Se muestran todos los posts
                foreach ($posts as $post) {
                  show_demo_post($post);
                }
            ?>

          <!-- Pagination -->
              <nav class="text-left">
                <ul class="pagination">
                  <li class="active"><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#" aria-label="suivant">
                    <span aria-hidden="true">&raquo;</span>
                  </a></li>
                </ul>
              </nav>
        </div>
      <!-- End of Blog Post -->  

      <!-- Side bar -->  
        <div class="col-xs-12 col-sm-4">
           <form class="form-horizontal">
             <div class="input-group">
               <span class="input-group-btn">
                  <a href="new_post.php" class="btn"><i class="fa fa-edit"> Nueva entrada en el blog</i></a>
               </span>
             </div>
           </form>
           <div class="panel">
             <div class="panel-heading">
               <h4>Categorías</h4>
             </div>
             <div class="panel-body">
               <ul class="nav">
                 <li><a href="#">Conciencia ambiental</a></li>
                 <li><a href="#">Proyectos de reforestación</a></li>
                 <li><a href="#">Historias inspiradoras</a></li>
                 <li><a href="#">Educación ambiental</a></li>
                 <li><a href="#">Técnicas de reforestación</a></li>
                 <li class="last"><a href="#">Otros</a></li>
               </ul>
             </div>
           </div>
            <h3>Entradas recientes</h3>
            <hr>
             <div class="post">
               <div class="post-heading">
                 <span>10 APRIL</span>
                 <img class="img-responsive" src="../images/blog/wedding.jpg" alt="post's picture">
               </div>
               <div class="post-body">
                 <span>
                 <i class="fa fa-heart sr-icons"></i> 10
                 <i class="fa fa-comments sr-icons"></i> 10
                 </span>
                 <h4 class="text-left"><a href="single_post.html"><strong>Rubia, te voy a comer tol triángulo de las bermudas</strong></a></h4>
               </div>
             </div>
             <div class="post">
               <div class="post-heading">
                 <span>12 MAY</span>
                 <img class="img-responsive" src="../images/blog/woman.jpg" alt="post's picture">
               </div>
               <div class="post-body">
                 <span>
                 <i class="fa fa-heart sr-icons"></i> 10
                 <i class="fa fa-comments sr-icons"></i> 10
                 </span>
                 <h4 class="text-left"><a href="single_post.html"><strong>Estos arándanos son del tamaño de tus huevecillos</strong></a></h4>
               </div>
             </div>
        </div>
      <!-- End of Side bar --> 
       
      </div>
     </div>
   </div>
<!-- End of Principal Content Start --> 

<!-- Footer -->
<?php include 'footer.php'; ?>

<!-- Jquery -->
   <script type="text/javascript" src="js/jquery.min.js"></script>
   <!-- Bootstrap core Javascript -->
   <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
   <!-- Plugins -->
   <script type="text/javascript" src="js/jquery.easing.min.js"></script>
   <script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>
   <script type="text/javascript" src="js/scrollreveal.min.js"></script>
   <script type="text/javascript" src="js/script.js"></script>
</body>
</html>