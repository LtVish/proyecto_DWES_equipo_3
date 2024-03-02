<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <title>Re-Forest-A | Logros </title>

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

<!-- CONTENIDO DE LA PÁGINA LOGROS -->
   <div id="contact">
        <div class="container">

            <h2>Logros</h2>

            <!-- Información sobre logros-->
            <div class="row">
                <h4>Cantidad total de árboles plantados por ubicación</h4>
                <ul>
                    <?php foreach ($locations as $location): ?>
                        <li><?php echo $location; ?> - <?php echo Event::getPlantedTreesCount('location', $location); ?></li>
                    <?php endforeach; ?>
                </ul>

                <h4>Cantidad total de árboles plantados por especie</h4>
                <ul>
                    <?php foreach (Specie::GetAll() as $specie): ?>
                        <li><?php echo $specie->name; ?> - <?php echo Event::getPlantedTreesCount('species', $specie->id); ?></li>
                    <?php endforeach; ?>
                </ul>

                <h4>Cantidad total de árboles plantados por fecha</h4>
                <ul>
                    <?php foreach ($years as $year): ?>
                        <li><?php echo $year; ?> - <?php echo Event::getPlantedTreesCount('year', $year); ?></li>
                    <?php endforeach; ?>
                </ul>

                <h4>Beneficios logrados</h4>
                <ul>
                    <?php foreach ($benefits as $benefit): ?>
                        <li><?php echo $benefit; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Formulario para filtrar logros -->
            <div class="row">
                 <form action="<?=htmlspecialchars($_SERVER["REQUEST_URI"])?>" method="post">
                     <div class="form-group">

                        <label for="year">Año</label>
                        <select name="year" id="year" class="form-control">
                            <option value="" selected disabled>Seleccione un año</option>
                            <?php foreach ($years as $year): ?>
                                <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                            <?php endforeach; ?>
                        </select>

                        <label for="year">Localidad</label>
                        <select name="location" id="location" class="form-control">
                            <option value="" selected disabled>Seleccione una localidad</option>
                            <?php foreach ($locations as $location): ?>
                                <option value="<?php echo $location; ?>"><?php echo $location; ?></option>
                            <?php endforeach; ?>
                        </select>

                        <label for="species">Especie</label>
                        <select name="species" id="species" class="form-control">
                            <option value="" selected disabled>Seleccione una especie</option>
                            <?php foreach ($species as $specie): ?>
                                <option value="<?php echo $specie->id; ?>"><?php echo $specie->name; ?></option>
                            <?php endforeach; ?>
                        </select>

                        <label for="benefit">Beneficio</label>
                        <select name="benefit" id="benefit" class="form-control">
                            <option value="" selected disabled>Seleccione un beneficio</option>
                            <?php foreach ($benefits as $benefit): ?>
                                <option value="<?php echo $benefit; ?>"><?php echo $benefit; ?></option>
                            <?php endforeach; ?>
                        </select>

                        <button type="submit" class="btn btn-primary">Filtrar</button>

                     </div>
                 </form>
            </div>

                    <!-- Información sobre logros (FILTRADO)-->
                    <div class="row">

                        <?php if (!empty($filteredYears)): ?>
                            <h4>Cantidad de árboles plantados por fecha (Filtrado)</h4>
                            <ul>
                                <li><?php echo $selectedYear; ?> - <?php echo $filteredYears ?></li>
                            </ul>
                        <?php endif; ?>

                        <?php if (!empty($filteredLocations)): ?>
                            <h4>Cantidad de árboles plantados por ubicación (Filtrado)</h4>
                            <ul>
                                <li><?php echo $selectedLocation; ?> - <?php echo $filteredLocations ?></li>
                            </ul>
                        <?php endif; ?>

                        <?php if (!empty($filteredSpecies)): ?>
                            <h4>Cantidad de árboles plantados por especie (Filtrado)</h4>
                            <?php $specie = Specie::GetBy('id', $selectedSpecies); ?>
                            <ul>
                                <li><?php echo $specie->name; ?> - <?php echo $filteredSpecies ?></li>
                            </ul>
                        <?php endif; ?>

                        <?php if (!empty($filteredBenefits)): ?>
                            <h4>Beneficios logrados (Filtrado)</h4>
                            <ul>
                                <li><?php echo $selectedBenefit; ?> - <?php echo $filteredBenefits ?></li>
                            </ul>
                        <?php endif; ?>
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
