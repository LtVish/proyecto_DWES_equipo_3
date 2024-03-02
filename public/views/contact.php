<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <title>Re-Forest-A | Contacto</title>

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

<!-- CONTENIDO DE LA PÁGINA CONTACTO -->
   <div id="contact">
        <div class="container">

            <h2>Contacta con nosotros</h2>

            <!-- Formulario de contacto -->
            <div class="row">
                 <form action="../views/contact_success.php" method="post">
                     <div class="form-group">

                        <label for="name">Nombre</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Nombre" required>

                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>

                        <label for="year">Teléfono</label>
                        <input type="text" id="localidad" name="localidad" class="form-control" placeholder="Localidad" required>

                        <label for="message">Mensaje</label>
                        <textarea id="message" name="message" class="form-control" placeholder="Mensaje" rows="5" required></textarea>

                        <button type="submit" class="btn btn-primary">Contacta</button>

                     </div>
                 </form>
            </div>

        </div>
    </div>

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