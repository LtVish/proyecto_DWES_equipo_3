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
                  foreach($events as $event){
                    generate_card($event, true);
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
      </div>

   </div>

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
