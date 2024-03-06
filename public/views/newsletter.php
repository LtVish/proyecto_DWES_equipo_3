<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <title>Re-Forest-A | Newsletter</title>

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

   <div id="contact">
        <div class="container">

            <h2>Suscríbete a nuestra newsletter</h2>

            <!-- Formulario de contacto -->
            <div class="row">
                 <form action="../controller/NewsletterSuccessController.php" method="post">
                     <div class="form-group">

                        <label for="name">Nombre</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Nombre" required>

                        <label for="surname">Apellidos</label>
                        <input type="text" id="surname" name="surname" class="form-control" placeholder="Apellidos" required>

                        <label for="nick">Nick</label>
                        <input type="text" id="nick" name="nick" class="form-control" placeholder="Nick del usuario en Re-Forest-A" required>

                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email registrado en Re-Forest-A" required>

                        <label for="birthDate">Fecha de nacimiento</label>
                        <input type="date" id="birthDate" name="birthDate" class="form-control" required>

                        <button type="submit" class="btn btn-primary">Suscríbete</button>

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