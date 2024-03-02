<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <title>Re-Forest-A | Logros </title>

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

<body id="page-top">

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
                foreach ($show_posts as $post) {
                  show_demo_post($post);
                }
            ?>

            <!-- Pagination -->
          <nav class="text-center" style="font-size: 20px;">
            <ul class="pagination">
              <?php if($page > 1){
              ?>
            <li><a href="<?= !isset($_GET["search"]) ? "PostByCategoryController.php?category=".$_GET['category']."&page=".($page - 1) :
            "PostByCategoryController.php?category=".$_GET['category']."&page=".($page - 1)."&search=".$_GET["search"] ?>"
            aria-label="Anterior"><span aria-hidden="true">&laquo; Anterior</span></a></li>
                <span aria-hidden="true">&laquo; Anterior</span>
              </a></li>
              <?php } ?>
              <?php if($page < $pages){
              ?>
            <li><a href="<?= !isset($_GET["search"]) ? "PostByCategoryController.php?category=".$_GET['category']."&page=".($page + 1) :
            "PostByCategoryController.php?category=".$_GET['category']."&page=".($page + 1)."&search=".$_GET["search"] ?>"
            aria-label="Siguiente"><span aria-hidden="true">Siguiente &raquo;</span></a></li>
                <span aria-hidden="true">Siguiente &raquo;</span>
              </a></li>
              <?php } ?>
            </ul>
          </nav>
        </div>
      <!-- End of Blog Post -->

      <?php include 'sidebar_blog.php' ?>
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