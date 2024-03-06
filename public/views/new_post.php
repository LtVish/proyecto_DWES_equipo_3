<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <title>Re-Forest-A | Nuevo Post</title>

	<!-- Bootstrap core css -->
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<!-- Bootstrap core css -->
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<!-- Font Awesome icons -->
	<link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css">
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

            <!-- Formulario para insertar un nuevo post al blog -->
	       <form class="form-horizontal" action="../controller/BlogController.php?page=1", method="POST" enctype="multipart/form-data">
				 <div class="form-group">
					<div class="col-xs-12">
					    <label class="label-control" for="title">Título</label>
						<input class="form-control" type="text" name="title" id="title" required>
					</div>
				</div>

				<div class="form-group">
					<div class="col-xs-12">
						<label class="label-control" for="content">Contenido</label>
						<textarea class="form-control" name="content" id="content" required></textarea>
					</div>
				</div>

				<div class="form-group">
					<div class="col-xs-12">
						<label class="label-control" for="tags">Etiquetas (Separadas por "/")</label>
						<input class="form-control" type="text" name="tags" id="tags" required>
					</div>
				</div>

				<div class="form-group">
					<div class="col-xs-12">
						<label class="label-control" for="category">Categoría</label>
						<select class="form-control" type="text" name="category" id="category"
						required style="background: transparent; color:#31B0D5;">
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
						<input class="form-control" name="date" id="date" type="date" required>
					</div>
				</div>

				<div class="form-group">
					<div class="col-xs-12">
						<label class="label-control" for="image">Foto</label>
						<input class="form-control" type="file" name="image" id="image" required>
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

