<?php
include '../models/User.php';
include '../db/DBdriver.php';

$db = new DBdriver('database', 'reforestaDB', 'root', 'Pass1234');
?>

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

<!-- CONTENIDO -->

   <div id="contact">
        <div class="container">

            <h2>Suscríbete a nuestra newsletter</h2>

                <?php

                $name = $_POST['name'] ?? '';
                $surname = $_POST['surname'] ?? '';
                $fullName = $name . " " . $surname;
                $nick = $_POST['nick'] ?? '';
                $email = $_POST['email'] ?? '';

                $user = new User(0, $nick, $email, $fullName, 0, [], []);
                $result = $user->subscriptionToNewsletter($nick, $email, $fullName, $db);

                if ($result) { ?>
                    <p>Te has suscrito correctamente a nuestra newsletter.</p>
                    <button type="button" class="btn btn-primary" onclick="location.href='index.php'">Volver a la página principal</button> <?php
                } else { ?>
                    <p>El usuario introducido no existe en nuestra base de datos.</p>
                    <button type="button" class="btn btn-primary" onclick="location.href='newsletter.php'">Intentar de nuevo</button><?php
                }

                $db->TearDown();
                ?>


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
