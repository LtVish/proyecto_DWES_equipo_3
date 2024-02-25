<?php

    include '../models/Specie.php';
    include '../db/DBdriver.php'

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <title>Re-Forest-A | Nuestras especies</title>

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

<!-- CONTENIDO DE LA PÁGINA ESPECIES -->

<?php
    $species = Specie::GetAll();
?>

<div class="container">
    <h2>Nuestras Especies</h2>
    <div class="row">
        <?php foreach ($species as $specie): ?>
            <div class="col-md-4">
                <div class="card">
                    <img src="<?php echo $specie->image; ?>" class="card-img-top" alt="<?php echo $specie->name; ?>">
                    <div class="card-body">
                        <h5 class="card-title">Nombre científico: <?php echo $specie->name; ?></h5>
                        <p class="card-text">Clima: <?php echo $specie->climate; ?></p>
                        <p class="card-text">Región: <?php echo $specie->region; ?></p>
                        <p class="card-text">Tiempo que tarda en hacerse adulta: <?php echo $specie->time_to_grow; ?></p>
                        <p class="card-text">Beneficios: <?php echo $specie->benefits; ?></p>
                        <img src="<?php echo $specie->image; ?>" alt="<?php echo $specie->name; ?>" class="img-fluid">
                        <a href="<?php echo $specie->wikipedia; ?>" class="btn btn-primary">Más información</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
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