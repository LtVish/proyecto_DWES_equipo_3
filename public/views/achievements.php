<?php
include '../models/Event.php';
include '../models/Specie.php';
include '../db/DBdriver.php';

$db = new DBdriver('database', 'reforestaDB', 'root', 'Pass1234');

$selectedYear = $_POST['year'] ?? null;
$selectedLocation = $_POST['location'] ?? null;
$selectedBenefit = $_POST['benefit'] ?? 0.0;
$filteredEvents = [];

$locations = Event::getPlantedTreesLocations();
$years = Event::getPlantedTreesYears();
$benefitsByValue = Event::getEventsWithBenefitsAbove($selectedBenefit);
?>

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
                <h4>Cantidad de árboles plantados por ubicación</h4>
                    <?php //$locationCount = Event::getPlantedTreesCount('location', 'LocationQueSea'); ?>

                <h4>Cantidad de árboles plantados por especie</h4>
                    <?php //$speciesCount = Event::getPlantedTreesCount('species', 'SpeciesQueSea'); ?>

                <h4>Cantidad de árboles plantados por fecha</h4>
                    <?php //$dateCount = Event::getPlantedTreesCount('date', 'DateQueSea'); ?>

                <h4>Beneficios logrados</h4>
                    <?php //$benefits = Species::GetBenefitsFromSpecies('SpeciesQueSea'); ?>
            </div>

            <!-- Formulario para filtrar logros -->
            <div class="row">
                 <form action="achievements.php" method="post">
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

                        <label for="benefit">Beneficio mínimo</label><br>
                        <input type="number" name="benefit" id="benefit"><br><br>

                        <button type="submit" class="btn btn-primary">Filtrar</button>

                     </div>
                 </form>
            </div>

        </div>
    </div>

  <!-- FILTRADO Y MOSTRADO DE EVENTOS
    <?php

        $sql = "SELECT e.*, s.benefits FROM event e
        LEFT JOIN specie_event se ON e.id = se.event_id
        LEFT JOIN specie s ON se.specie_id = s.id
        WHERE 1";

        if (!empty($selectedYear)) {
            $sql .= " AND YEAR(e.date) = :year";
        }

        if (!empty($selectedLocation)) {
            $sql .= " AND e.location = :location";
        }

        if (!empty($selectedBenefit)) {
            $sql .= " AND b.benefits = :benefit";
        }

        $statement = $pdo->prepare($sql);

        if (!empty($selectedYear)) {
            $statement->bindParam(':year', $selectedYear, PDO::PARAM_STR);
        }

        if (!empty($selectedLocation)) {
            $statement->bindParam(':location', $selectedLocation, PDO::PARAM_STR);
        }

        if (!empty($selectedBenefit)) {
            $statement->bindParam(':benefit', $selectedBenefit, PDO::PARAM_STR);
        }

        $statement->execute();

        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            echo $row['date'] . ' - ' . $row['location'] . ' - ' . $row['benefit'] . '<br>';
        }

    ?>
  -->

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