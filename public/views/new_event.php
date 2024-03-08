
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
       	   <h1><?=$_GET["action"]=="create"?"Crea Nuevo Evento":"Modifica tu evento"?></h1>
       	   <hr>
			  <p>
					<?php echo $modified ? "¡Se ha modificado con éxito!": ""?>
				</p>

	       <form class="form-horizontal" action="<?=htmlspecialchars($_SERVER["REQUEST_URI"])?>", method="POST" enctype="multipart/form-data">
				 <div class="form-group">
					<div class="col-xs-12">
						<label class="label-control">Nombre</label>
						<input required class="form-control" type="text" name="name"
						<?php
							echo $_GET["action"] == "modify" ? "value='".$event-> name."'"  : "";
						?>
						<?php
							echo isset($_POST["name"]) && trim($_POST["name"]) ? "value='".$event-> name."'"  : "";
						?>
						>
					</div>
					<?php if(isset($errors["name"]))
					{?>
					<div class="alert">
  						<?=$errors["name"]?>
					</div>
					<?php } ?>
				</div>
				<div class="form-group">
					<div class="col-xs-12">
						<label class="label-control" for="description">Descripción</label>
						<textarea class="form-control" id="description" name="description" required><?=$_GET["action"] == "modify" ?$event-> description  : ""?><?php echo isset($_POST["description"]) && trim($_POST["description"]) ? $event-> description  : "";?></textarea>
					</div>
					<?php if(isset($errors["description"]))
					{?>
					<div class="alert">
  						<?=$errors["description"]?>
					</div>
					<?php } ?>
				</div>
				<div class="form-group">
					<div class="col-xs-12">
						<label class="label-control">Lugar</label>
						<input class="form-control" type="text" name="location" required
						<?php
							echo $_GET["action"] == "modify" ? "value='".$event-> location."'"  : "";
						?>
						<?php
							echo isset($_POST["location"]) && trim($_POST["location"]) ? "value='".$event-> location."'"  : "";
						?>
						>
					</div>
					<?php if(isset($errors["location"]))
					{?>
					<div class="alert">
  						<?=$errors["location"]?>
					</div>
					<?php } ?>
				</div>
				<div class="form-group">
					<div class="col-xs-12">
						<label class="label-control">Terreno</label>
						<input class="form-control" type="text" name="terrain" required
						<?php
							echo $_GET["action"] == "modify" ? "value='".$event-> terrain."'" : "";
						?>
						<?php
							echo isset($_POST["terrain"]) && trim($_POST["terrain"]) ? "value='".$event-> terrain."'"  : "";
						?>
						>
					</div>
					<?php if(isset($errors["terrain"]))
					{?>
					<div class="alert">
  						<?=$errors["terrain"]?>
					</div>
					<?php } ?>
				</div>
				<div class="form-group">
					<div class="col-xs-12">
						<label class="label-control">Tipo</label>
						<input type="text" class="form-control" name="type" required
						<?php
							echo $_GET["action"] == "modify" ? "value='".$event-> type."'" : "";
						?>
						<?php
							echo isset($_POST["type"]) && trim($_POST["type"]) ? "value='".$event-> type."'"  : "";
						?>
						>
					</div>
					<?php if(isset($errors["type"]))
					{?>
					<div class="alert">
  						<?=$errors["type"]?>
					</div>
					<?php } ?>
				</div>
				<div class="form-group">
					<div class="col-xs-12">
						<label class="label-control">Fecha</label>
						<input class="form-control" type="date"  name="date" required
						<?php
							echo $_GET["action"] == "modify" ? "value=".$event-> date : "";
						?>
						<?php
							echo isset($_POST["date"]) && trim($_POST["date"]) ? "value=".$event-> date : "";
						?>
						>
					</div>
					<?php if(isset($errors["date"]))
					{?>
					<div class="alert">
  						<?=$errors["date"]?>
					</div>
					<?php } ?>
				</div>
				<div class="form-group">
					<div class="col-xs-12">
						<label class="label-control">Foto</label>
						<input class="form-control" type="file" name="image" <?=!$_GET["action"] == "modify" ?"required" : ""?>>
					</div>
					<?php if(isset($errors["image"]))
					{?>
					<div class="alert">
  						<?=$errors["image"]?>
					</div>
					<?php } ?>
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

