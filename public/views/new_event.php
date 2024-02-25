<?php
	if(isset($_FILES["image"]["tmp_name"]) && is_uploaded_file($_FILES["image"]["tmp_name"])){
		$dir = "images/";
		$name = $_FILES["image"]["name"];
		move_uploaded_file($_FILES["image"]["tmp_name"], $dir.$name);
	}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <title>Re-Forest-A | Nuevo evento</title>

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
   <div id="contact">
   	  <div class="container">
   	    <div class="col-xs-12 col-sm-8 col-sm-push-2">
       	   <h1>Crea Nuevo Evento</h1>
       	   <hr>
       	   <!--<p>Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>-->
	       <form class="form-horizontal" action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>", method="POST" enctype="multipart/form-data">
	       	  <!--<div class="form-group">
	       	  	<div class="col-xs-6">
	       	  	    <label class="label-control">First Name</label>
	       	  		<input class="form-control" type="text">
	       	  	</div>
	       	  	<div class="col-xs-6">
	       	  	    <label class="label-control">Last Name</label>
	       	  		<input class="form-control" type="text">
	       	  	</div>
	       	  </div>-->
				 <div class="form-group">
					<div class="col-xs-12">
						<label class="label-control">Nombre</label>
						<input class="form-control" type="text" name="name">
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12">
						<label class="label-control">Descripción</label>
						<textarea class="form-control"></textarea>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12">
						<label class="label-control">Terreno</label>
						<input class="form-control" type="text">
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12">
						<label class="label-control">Tipo</label>
						<select class="form-control" type="text" style="background: transparent; color:#31B0D5;">
							<option value="rg_semiillas">Recogida de semillas</option>
							<option value="rf_plantas" selected>Reforestación con plantas jóvenes</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12">
						<label class="label-control">Fecha</label>
						<input class="form-control" type="date">
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12">
						<label class="label-control">Foto</label>
						<input class="form-control" type="file" name="image">
					</div>
				</div>
	       	  <!--<div class="form-group">
	       	  	<div class="col-xs-12">
	       	  		<label class="label-control">Message</label>
	       	  		<textarea class="form-control"></textarea>
	       	  		<button class="pull-right btn btn-lg sr-button">SEND</button>
	       	  	</div>
	       	  </div>-->
			  <div class = "form-group">
				<button class="pull-right btn btn-lg sr-button">SEND</button>
			  </div>
	       </form>
	       <hr class="divider">
	       <div class="address">
	           <!--<p>Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero.</p>
		       <div class="ending text-center">
			        <ul class="list-inline social-buttons">
			            <li><a href="#"><i class="fa fa-facebook sr-icons"></i></a>
			            </li>
			            <li><a href="#"><i class="fa fa-twitter sr-icons"></i></a>
			            </li>
			            <li><a href="#"><i class="fa fa-google-plus sr-icons"></i></a>
			            </li>
			        </ul>
				    <ul class="list-inline contact">
				       <li class="footer-number"><i class="fa fa-phone sr-icons"></i>  (00228)92229954 </li>
				       <li><i class="fa fa-envelope sr-icons"></i>  kouvenceslas93@gmail.com</li>
				    </ul>
				    <p>Photography Fanatic Template &copy; 2017</p>
		       </div>-->
	       </div>
	    </div>   
   	  </div>
   </div>
<!-- Principal Content Start -->

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

