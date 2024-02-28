<?php
  include_once "../views/cards/index_card.php";
?>

<!DOCTYPE html>  

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <title>Re-Forest-A | Inicio</title>

  	<!-- Bootstrap core css -->
  	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
  	<!-- Bootstrap core css -->
  	<link rel="stylesheet" type="text/css" href="../css/style.css">
  	<!-- Magnific-popup css -->
  	<link rel="stylesheet" type="text/css" href="../css/magnific-popup.css">
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
   <div id="index">
    <!-- Header -->
      <div class="row">
         <div class="col-xs-12 intro">
            <div class="carousel-inner">
               <div class="item active">
                <img class="img-responsive" src="../images/in-the-forest-1.jpg" alt="header picture">
               </div>
               <div class="carousel-caption">
                  <h1>REFORESTA</h1>
                  <hr>
               </div>
            </div>
         </div>
      </div>

      <div id="index-body">

      <!-- Pictures Navigation table -->
        <div class="table-responsive">
          <table class="table text-center">
            <thead>
              <tr>
                <td><a class="link active" href="#category1" data-toggle="tab">Próximos Eventos</a></td>
                <td><a class="link" href="#category2" data-toggle="tab">Posts Recientes</a></td>
              </tr>
            </thead>
          </table>
          <hr>
        </div>
      
      <!-- Navigation Table Content -->
        <div class="tab-content">

        <!-- First Category pictures -->
           <div id="category1" class="tab-pane active" >
              <div class="row popup-gallery">
                <?php
                  for($i = 0; $i < 8 ; $i++){
                    generate_card($events[$i], true);
                  }
                  ?>
              </div>
           </div>
        <!-- End of First category pictures -->

        <!--second category pictures -->
           <div id="category2" class="tab-pane">
             <div class="row popup-gallery">
              <?php
                  foreach($posts as $post){
                    generate_card($post, false);
                  }
                  ?>
              </div>
           </div>
        <!-- End of second category pictures -->

        
        

        </div>
    <!-- End of Navigation Table Content -->
      </div><!-- End of Index-body box -->

    <!-- Newsletter form -->
      <div class="index-form text-center">
        <h3>SUSCRIBE TO OUR NEWSLETTER </h3>
        <h5>Suscribe to receive our News and Gifts</h5>
        <form class="form-horizontal">
          <div class="form-group">
            <div class="col-xs-12 col-sm-6 col-sm-push-3 col-md-4 col-md-push-4">
            <input class="form-control" type="text" placeholder="Type here your email address">
            <a href="" class="btn btn-lg sr-button">SUBSCRIBE</a>
            </div>
          </div>
        </form>
      </div>
    <!-- End of Newsletter form -->  

    <!-- Box within partners name and logo -->
      <!--<div class="last-box row">
        <div class="col-xs-12 col-sm-4 col-sm-push-4 last-block">
        <div class="partner-box text-center">
          <p>
          <i class="fa fa-map-marker fa-2x sr-icons"></i> 
          <span class="text-muted">35 North Drive, Adroukpape, PY 88105, Agoe Telessou</span>
          </p>
          <h4>Our Main Partners</h4>
          <hr>
          <div class="text-muted text-left">
            <ul class="list-inline">
              <li><img src="../images/index/log2.jpg" alt="logo"></li>
              <li>First Partner Name</li>
            </ul>
            <ul class="list-inline">
              <li><img src="../images/index/log1.jpg" alt="logo"></li>
              <li>Second Partner Name</li>
            </ul>
            <ul class="list-inline">
              <li><img src="../images/index/log3.jpg" alt="logo"></li>
              <li>Third Partner Name</li>
            </ul>
          </div>
        </div>
        </div>
      </div>-->
    <!-- End of Box within partners name and logo -->

   </div><!-- End of index box -->

<!-- Footer -->
<?php include 'footer.php'; ?>

   <!-- Jquery -->
   <script type="text/javascript" src="../js/jquery.min.js"></script>
   <!-- Bootstrap core Javascript -->
   <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
   <!-- Plugins -->
   <script type="text/javascript" src="../js/jquery.easing.min.js"></script>
   <script type="text/javascript" src="../js/jquery.magnific-popup.min.js"></script>
   <script type="text/javascript" src="../js/scrollreveal.min.js"></script>
   <script type="text/javascript" src="../js/script.js"></script>
</body>
</html>
