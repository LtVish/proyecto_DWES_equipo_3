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
    <style>
        .pagination > li > button{
            margin-right: 5px;
            margin-left: 5px;
            color: #31b0d5;
            background-color: white;
            border-radius: 6px;
          }
          .pagination > li > button:hover{
            background-color: #31b0d5;
            color: #f1f1f1;
          }
    </style>
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
          <form class="form-horizontal" action="EventsController.php" method=get>
          <nav class="text-center" style="font-size: 20px;">
            <ul class="pagination">
              <?php if($page > 1){
              ?>
              <li><button id="anterior" type=submit name="page" value=<?=$page -1?> aria-label="suivant">
                <span aria-hidden="true">&laquo; Anterior</span>
              </button></li>
              <?php } ?>
              <?php if($page < $pages){
              ?>
              <li><button id="siguiente" class="eventos" type=submit name="page" value=<?=($page +1)?> aria-label="suivant">
                <span aria-hidden="true">Siguiente &raquo;</span>
              </button></li>
              <?php } ?>
            </ul>
          </nav>
        </div>
      <!-- End of Blog Post -->  

      <!-- Side bar -->  
        <div class="col-xs-12 col-sm-4">
             <div class="input-group">
               <input class="form-control" type="text" placeholder="Buscar" name="search" 
                <?=isset($_GET["search"])?"value='".$_GET["search"]."'":""?>>
               <span class="input-group-btn">
                  <a class="btn" type="submit"><i class="fa fa-search"></i></a>
               </span>
             </div>
             <div class="panel-body" style="color: black;">
                <label for="filter_location">
                  <input type="checkbox" id="filter_location" name="location" 
                  <?=isset($_GET["location"])?"checked":""?>> Ubicación
                </label><br>

                <label for="filter_type">
                  <input type="checkbox" id="filter_type" name="type_terrain"
                  <?=isset($_GET["type_terrain"])?"checked":""?>> Tipo Terreno
                </label><br>

                <label for="filter_type">
                  <input type="checkbox" id="filter_type" name="type"
                  <?=isset($_GET["type"])?"checked":""?>> Tipo Evento
                </label><br>

                <label for="filter_date">
                  <input type="checkbox" id="filter_date" name="date"
                  <?=isset($_GET["date"])?"checked":""?>> Fecha
                </label><br>

                <label for="filter_state">
                  <input type="checkbox" id="filter_state" name="state"
                    <?=isset($_GET["state"])?"checked":""?>> Validado
                </label><br>

                <label for="filter_user">
                  <input type="checkbox" id="filter_user" name="user"
                  <?=isset($_GET["user"])?"checked":""?>> Anfitrión
                </label>
             </div>
           </form>
           <div class="panel">
             <div class="panel-heading">
                 <a href="NewEventController.php?action=create"> <button class="btn btn-primary btn-block" type="submit">Nuevo Evento</button></a>
             </div>
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
        </div>--!>
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