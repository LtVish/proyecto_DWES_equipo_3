<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <title>Re-Forest-A | Evento</title>

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
   <div id="single">
     <div class="container">

    <!-- Full Article -->
      <div class="row">
      <h2><?=$event-> name?></h2>
      <hr class="subtitle">
      <div class=" block1">
      <div class="col-xs-12 col-sm-9">
        <img src=<?="../".$event-> image?> class="img-responsive">
        <h3>Descripción</h3>
        <p><?=$event-> description?></p>
        <h3>Lugar</h3>
        <p><?=$event-> location?></p>
        <h3>Terreno</h3>
        <p><?=$event-> terrain?></p>
        <h3>Tipo</h3>
        <p><?=$event-> type?></p>
        <h3>Especies</h3>
        <p>
          <?php 
            foreach($event->species_id as $id){
              $specie = Specie::GetBy("id", $id);
              echo '"'.$specie->name.'"  ';
            }
          ?>
        </p>
        <?php if(isset($user) && $user && !$is_participant){?>
        <form style="display: inline;" method=post action="">
            <input type=hidden name=participar value=1>
          <button type="submit" class="btn btn-success">Participar</button>
        </form>
        <?php }?>
        <?php if(isset($is_creator) && $is_creator){?>
        <form style="display: inline;" action="NewEventController.php">
          <input type="hidden" name="action" value="modify">
          <input type="hidden" name="id" value=<?=$event->id?>>
          <button type="submit" class="btn btn-primary">Modificar</button>
        </form>
        <?php }?>
        <?php if(isset($is_admin) && $is_admin && !$event -> state){?>
        <form style="display: inline;" method=post action="">
          <input type=hidden name=validar value=1>
          <button type="submit" class="btn btn-warning">Validar</button>
        </form>
        <?php }?>
        <h4>- By <?=$creator_name?></h4>
        <hr>
        <ul class="list-inline">
          <li><?=$event->date?>|</li>
        </ul>
      </div>
      <div class="col-xs-12 col-sm-3">
        <h4>Añade Especies</h4>
        <hr class="subtitle1">
        <?php
              if(isset($is_creator) && $is_creator){?>
        <form method="post" action="">
            <div>
              <br>
              <label for="especie">Especie: </label>
              <select name="specie" id="specie">
                <?php
                  foreach($species as $specie){
                    ?>
                    <option value=<?=$specie->id?>><?=$specie->name?></option>
                <?php
                  }
                ?>
              </select>
            </div>
            <br>
            <div>
              <button type="submit" class="btn btn-primary">Añadir</button>
            </div>
        </form>
        <?php } ?>
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