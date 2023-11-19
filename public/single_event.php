<?php include "models/Event.php";?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <title>PhotographItem-Responsive Theme | Blog</title>

  	<!-- Bootstrap core css -->
  	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  	<!-- Bootstrap core css -->
  	<link rel="stylesheet" type="text/css" href="css/style.css">
  	<!-- Font Awesome icons -->
  	<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body id="page-top">

<!-- Navigation Bar -->
   <nav class="navbar navbar-fixed-top navbar-default">
     <div class="container">
       <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a  class="navbar-brand page-scroll" href="#page-top">
              <span>[PHOTO]</span>
            </a>
       </div>
       <div class="collapse navbar-collapse navbar-right" id="menu">
          <ul class="nav navbar-nav">
            <li class=" lien"><a href="index.php"><i class="fa fa-home sr-icons"></i> Home</a></li>
            <li class=" lien"><a href="about.php"><i class="fa fa-bookmark sr-icons"></i> About</a></li>
            <li class="active lien"><a href="event.php"><i class="fa fa-calendar sr-icons"></i> Event</a></li>
            <li class=" lien"><a href="blog.php"><i class="fa fa-file-text sr-icons"></i> Blog</a></li>
            <li class=" lien"><a href="contact.php"><i class="fa fa-phone-square sr-icons"></i> Contact</a></li>
          </ul>
       </div>
     </div>
   </nav>
<!-- End of Navigation Bar -->

<!-- Principal Content Start -->
   <div id="single">
     <div class="container">

    <!-- Full Article -->
      <?php
        $event = new Event(
          "Eventazo",
          "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod soluta corrupti earum officia vel inventore vitae quidem, consequuntur odit impedit.",
          "Terreno salado y resbaladizo",
          "10/10/2017",
          "Fiesta",
          "Kouven",
          ["Kouven", "Kouven2", "Kouven3"],
          ["Kouven", "Kouven2", "Kouven3"],
          "images/blog/elephant.jpg",
          "Lomé"
        );
      ?>
      <div class="row">
      <h2><?=$event->title?></h2>
      <hr class="subtitle">
      <div class=" block1">
      <div class="col-xs-12 col-sm-9">
        <h3>Descripción</h3>
        <p><?=$event->content?></p>
        <h3>Terreno</h3>
        <p><?=$event->terrain?></p>
        <h3>Type</h3>
        <p><?=$event->type?></p>
        <form style="display: inline;">
          <button type="submit" class="btn btn-success">Participar</button>
        </form>
        <form style="display: inline;">
          <button type="submit" class="btn btn-warning">Validar</button>
        </form>
        <h4>- By <?=$event->creator?></h4>
        <hr>
        <ul class="list-inline">
          <li><?=$event->publish_date?>|</li>
        </ul>
      </div>
      <div class="col-xs-12 col-sm-3">
        <h4>Añade Especies</h4>
        <hr class="subtitle1">
        <form>
            <div>
              <br>
              <label for="especie">Especie: </label>
              <select>
                <option value="1">Especie 1</option>
                <option value="2">Especie 2</option>
                <option value="3">Especie 3</option>
                <option value="4">Especie 4</option>
              </select>
            </div>
            <br>
            <div>
              <label for="cantidad">Cantidad: </label>
              <input type=number id=cantidad>
            </div>
            <br>
            <div>
              <button type="submit" class="btn btn-primary">Añadir</button>
            </div>
        </form>
      </div>
    <!-- End of Full Article -->
     </div>
   </div>
<!-- End of Principal Content Start -->

   <!-- Footer -->
   <footer>
     <div class="container text-muted text-center">
         <ul class="list-inline social-buttons">
            <li><a href="#"><i class="fa fa-facebook sr-icons"></i></a>
            </li>
            <li><a href="#"><i class="fa fa-twitter sr-icons"></i></a>
            </li>
            <li><a href="#"><i class="fa fa-google-plus sr-icons"></i></a>
            </li>
         </ul>
         <ul class="list-inline">
           <li class="footer-number"><i class="fa fa-phone sr-icons"></i>  (00228)92229954 </li>
           <li><i class="fa fa-envelope sr-icons"></i>  kouvenceslas93@gmail.com</li>
         </ul>
         <p>Photography Fanatic Template &copy; 2017</p>
     </div>
   </footer>

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