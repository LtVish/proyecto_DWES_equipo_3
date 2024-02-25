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
<?php include 'nav-bar.php'; ?>
<!-- End of Navigation Bar -->

<div id="contact">
   	  <div class="container">
		<!-- user profile part -->
		<div class="col-xs-4">
			<h1><?=$user->nick?></h1>
		   	<hr>
		   	<form class="form-horizontal" action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>", method="POST">
			   <div class="form-group">
					<div class="col-xs-12">
						<label class="label-control">Karma: <?=$user->karma?></label>
					</div>
				</div>
			   <div class="form-group">
					<div class="col-xs-12">
						<label class="label-control">Nombre Completo: <?=$user->full_name?></label>
						<input class="form-control" type="text" type="text" name="mod_nombre">
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12">
						<label class="label-control">Nombre de Usuario: <?=$user->nick?></label>
						<input class="form-control" type="text" type="text" name="mod_nick">
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12">
						<label class="label-control">Email: <?=$user->email?></label>
						<input class="form-control" type="text" type="email" name="mod_email">
					</div>
				</div>
				<input type="hidden" name="id" value="<?=$user->id?>">
				<div class = "form-group">
					<button class="btn btn-lg sr-button">MODIFICAR USUARIO</button>
					<button class="btn btn-lg sr-button">VER POSTS</button>
					<button class="btn btn-lg sr-button">PANEL ADMINISTRADOR</button>
				</div>
		   	</form>
		</div>
		<div class="col-xs-8 p-and-e">
			<div>
				<h1>Tus Eventos</h1>
				<div class="form-group text-right">
					<button class="btn btn-lg sr-button">Nuevo Evento</button>
				</div>
				<div class="horizontal-scroller">
					<?php
						for($i = 1; $i < 8; $i++){
							?>
							<div style="margin:10px;">
								<h4 class="label-control">Evento <?=$i?> buen evento venid a disfrutar</h4>
								<img src="../images/roble.jpg" class="img-responsive">
								<p style="display:inline">Por validar</p>
								<div class="form-group text-right">
									<button class="btn">Modificar</button>
								</div>
							</div>
					<?php
						}
					?>
				</div>
			</div>
		</div>
   	  </div>
   </div>
   <?php include 'footer.php'; ?>
</body>