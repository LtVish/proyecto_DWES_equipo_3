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
       	   <h1>Nueva entrada en el blog</h1>
       	   <hr>

	       <form class="form-horizontal" action="blog.php", method="POST" enctype="multipart/form-data">
				 <div class="form-group">
					<div class="col-xs-12">
					    <label class="label-control" for="title">Título</label>
						<input class="form-control" type="text" name="title" id="title">
					</div>
				</div>

				<div class="form-group">
					<div class="col-xs-12">
						<label class="label-control" for="content">Contenido</label>
						<textarea class="form-control" name="content" id="content"></textarea>
					</div>
				</div>

				<div class="form-group">
					<div class="col-xs-12">
						<label class="label-control" for="tags">Etiquetas (Separadas por "/")</label>
						<input class="form-control" type="text" name="tags" id="tags">
					</div>
				</div>

				<div class="form-group">
					<div class="col-xs-12">
						<label class="label-control" for="category">Categoría</label>
						<select class="form-control" type="text" name="category" id="category" style="background: transparent; color:#31B0D5;">
							<option value="" selected disabled>Selecciona una categoría</option>
							<option value="1">Conciencia ambiental</option>
							<option value="2">Proyectos de reforestación</option>
							<option value="3">Historias inspiradoras</option>
							<option value="4">Educación ambiental</option>
							<option value="5">Técnicas de reforestación</option>
							<option value="6">Otros</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<div class="col-xs-12">
						<label class="label-control" for="date">Fecha</label>
						<input class="form-control" name="date" id="date" type="date">
					</div>
				</div>

				<div class="form-group">
					<div class="col-xs-12">
						<label class="label-control" for="image">Foto</label>
						<input class="form-control" type="file" name="image" id="image">
					</div>
				</div>

			  <div class = "form-group">
				<button class="pull-right btn btn-lg sr-button">Publicar</button>
			  </div>
	       </form>
	       <hr class="divider">
	       <div class="address">
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

