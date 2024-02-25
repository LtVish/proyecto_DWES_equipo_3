<?php
	include_once "../models/User.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PhotographItem-Responsive Theme | Contact</title>

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
	   	 		<li class=" lien"><a href="home.php"><i class="fa fa-home sr-icons"></i> Home</a></li>
	   	 		<li class=" lien"><a href="about.php"><i class="fa fa-bookmark sr-icons"></i> About</a></li>
				<li class=" lien"><a href="event.php"><i class="fa fa-calendar sr-icons"></i> Event</a></li>
	   	 		<li class=" lien"><a href="blog.php"><i class="fa fa-file-text sr-icons"></i> Blog</a></li>
	   	 		<li class="active lien"><a href="#"><i class="fa fa-phone-square sr-icons"></i> Contact</a></li>
	   	 	</ul>
	   	 </div>
   	 </div>
   </nav>
<!-- End of Navigation Bar -->

<!-- Loggin and Register part -->
   <div id="contact">
   	  <div class="container">
   	    <div class="col-xs-12 col-sm-6">
       	   <h1>Regístrate</h1>
		   <hr>
	       <form class="form-horizontal" action="../controller/LoginController.php", method="POST">
				 <div class="form-group">
					<div class="col-xs-12">
						<label class="label-control">Nombre completo</label>
						<input class="form-control" type="text" name="full_name" required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12">
						<label class="label-control">Nombre de usuario</label>
						<input class="form-control" type="text" name="nick" required>
					</div>
					<?php if(isset($errors["nick_usado"]))
					{?>
						<div class="alert">
							<strong>Error!</strong> <?=$errors["nick_usado"]?>
						</div>
					<?php } ?>
				</div>
				<div class="form-group">
					<div class="col-xs-12">
						<label class="label-control">Email</label>
						<input class="form-control" type="text" type="email" name="email" required>
					</div>
					<?php if(isset($errors["email_usado"]))
					{?>
					<div class="alert">
  						<strong>Error!</strong> <?=$errors["email_usado"]?>
					</div>
					<?php } ?>
					<?php if(isset($errors["email_invalido"]))
					{?>
					<div class="alert">
  						<strong>Error!</strong> <?=$errors["email_invalido"]?>
					</div>
					<?php } ?>
				</div>
				<?php if (!empty($registered) && $registered) { ?>
					<div class="form-group">
						<div class="col-xs-12">
							<label class="label-control">¡Te has registrado!</label>
						</div>
					</div>
				<?php } ?>
			  <div class = "form-group">
				<button class="pull-right btn btn-lg sr-button">SEND</button>
			  </div>
	       </form>
		</div> 
	       <!--<hr class="divider">-->
		<div class="col-xs-12 col-sm-6">
			<h1>Iniciar Sesión</h1>
			<hr>
			<form class="form-horizontal" action="../controller/LoginController.php", method="POST">
				<div class="form-group">
				<div class="col-xs-12">
					<label class="label-control">Nombre de Usuario o Email</label>
					<input class="form-control" type="text" name="login">
				</div>
				</div>
				<div class = "form-group">
					<button class="pull-right btn btn-lg sr-button">SEND</button>
				</div>
			</form>
		</div>

		<!-- user profile part -->
   	  </div>
   </div>
<!-- Principal Content Start -->

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

