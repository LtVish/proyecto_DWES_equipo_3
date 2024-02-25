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

<!-- Navbar -->
<?php include 'nav-bar.php'; ?>

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
					<?php if(isset($errors["email_register"]))
					{?>
					<div class="alert">
  						<strong>Error!</strong> <?=$errors["email_register"]?>
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
						<label class="label-control">Nombre de usuario</label>
						<input class="form-control" type="text" name="login_nick">
					</div>
					<?php if(isset($errors["no_existe"]))
					{?>
					<div class="alert">
  						<strong>Error!</strong> <?=$errors["no_existe"]?>
					</div>
					<?php } ?>
				</div>
				<div class="form-group">
					<div class="col-xs-12">
						<label class="label-control">Email</label>
						<input class="form-control" type="text" name="login_email">
					</div>
					<?php if(isset($errors["email_login"]))
					{?>
					<div class="alert">
  						<strong>Error!</strong> <?=$errors["email_login"]?>
					</div>
					<?php } ?>
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

