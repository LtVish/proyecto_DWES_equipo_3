<?php include "../models/Event.php";?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <title>PhotographItem-Responsive Theme | Blog</title>

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
   <div id="single">
     <div class="container">

    <!-- Full Article -->
      <?php
        $event = new Event(
          1,
          "Eventazo",
          "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod soluta corrupti earum officia vel inventore vitae quidem, consequuntur odit impedit.",
          "Terreno salado y resbaladizo",
          "10/10/2017",
          "Fiesta",
          1,
          [1, 2, 3],
          [1, 2, 3],
          "../images/pino.jpg",
          "Lomé",
          true
        );
      ?>
      <div class="row">
      <h2><?=$event->__get("name")?></h2>
      <hr class="subtitle">
      <div class=" block1">
      <div class="col-xs-12 col-sm-9">
        <h3>Descripción</h3>
        <p><?=$event->__get("description")?></p>
        <h3>Terreno</h3>
        <p><?=$event->__get("terrain")?></p>
        <h3>Type</h3>
        <p><?=$event->__get("type")?></p>
        <form style="display: inline;">
          <button type="submit" class="btn btn-success">Participar</button>
        </form>
        <form style="display: inline;">
          <button type="submit" class="btn btn-warning">Validar</button>
        </form>
        <h4>- By <?=$event->__get("creator_id")?></h4>
        <hr>
        <ul class="list-inline">
          <li><?=$event->__get("date")?>|</li>
        </ul>
      </div>
      <div class="col-xs-12 col-sm-3">
        <h4>Añade Especies</h4>
        <hr class="subtitle1">
        <form>
            <div>
              <br>
              <label for="especie">Especie: </label>
              <select>
                <option value="1">Especie 1</option>
                <option value="2">Especie 2</option>
                <option value="3">Especie 3</option>
                <option value="4">Especie 4</option>
              </select>
            </div>
            <br>
            <div>
              <label for="cantidad">Cantidad: </label>
              <input type=number id=cantidad>
            </div>
            <br>
            <div>
              <button type="submit" class="btn btn-primary">Añadir</button>
            </div>
        </form>
      </div>
    <!-- End of Full Article -->
     </div>
   </div>
<!-- End of Principal Content Start -->

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