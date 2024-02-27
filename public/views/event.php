
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <title>Re-Forest-A | Eventos</title>

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
            foreach($show_events as $event){
              show_demo_post($event);
            }
          ?>
              <nav class="text-center" style="font-size: 20px;">
                <ul class="pagination">
                  <?php if($page > 1){
                  ?>
                  <li><a href=<?=!isset($_GET["search"])?"EventsController.php?page=".($page -1):"EventsController.php?page=".($page -1)."&search=".$_GET["search"]?> aria-label="suivant">
                    <span aria-hidden="true">&laquo; Anterior</span>
                  </a></li>
                  <?php } ?>
                  <?php if($page < $pages){
                  ?>
                  <li><a href=<?=!isset($_GET["search"])?"EventsController.php?page=".($page +1):"EventsController.php?page=".($page +1)."&search=".$_GET["search"]?> aria-label="suivant">
                    <span aria-hidden="true">Siguiente &raquo;</span>
                  </a></li>
                  <?php } ?>
                </ul>
              </nav>
        </div>
      <!-- End of Blog Post -->  

      <!-- Side bar -->  
        <div class="col-xs-12 col-sm-4">
           <form class="form-horizontal" action="EventsController.php?page=1" method=get>
             <div class="input-group">
              <input type="hidden" name="page" value=1>
               <input class="form-control" type="text" placeholder="Buscar" name="search">
               <span class="input-group-btn">
                  <a class="btn" type="submit"><i class="fa fa-search"></i></a>
               </span>
             </div>
           </form>
           <div class="panel">
             <div class="panel-heading">
                 <a href="NewEventController.php?action=create"> <button class="btn btn-primary btn-block" type="submit">Nuevo Evento</button></a>
             </div>
             <!--<div class="panel-body">
               <ul class="nav">
                 <li><a href="#">Category I</a></li>
                 <li><a href="#">Category II</a></li>
                 <li><a href="#">Category III</a></li>
                 <li><a href="#">Category IV</a></li>
                 <li class="last"><a href="#">Category V</a></li>
               </ul>
             </div>-->
           </div>
           <div class="well">
             <h4>Atención</h4>
             <p>A continuación se muestran los eventos añadidos en el orden cronológcio</p>
           </div>
            <!--<h3>Recent Posts</h3>
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
                 <h4 class="text-left"><a href="single_post.html"><strong>Aliquam soluta</strong></a></h4>
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
                 <h4 class="text-left"><a href="single_post.html"><strong>Consequuntur</strong></a></h4>
               </div>
             </div>
        </div>-->
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