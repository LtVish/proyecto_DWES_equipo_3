<?php include_once "cards/event_profile.php";?>
<?php include_once "cards/post_profile.php";?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Re-Forest-A | Usuarios </title>

	<!-- Bootstrap core css -->
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<!-- Bootstrap core css -->
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<!-- Font Awesome icons -->
	<link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css">
</head>
<body id="page-top">
    <?php include 'nav-bar.php'; ?>
    <div id="contact">
   	  <div class="container">
         <div class="col-xs-12">
         <div>
				<h1>Eventos a validar</h1>
				<div class="horizontal-scroller">
					<?php
						foreach($eventos as $event){
							show_event($event);
						}
					?>
				</div>
			</div>
        </div>
        <div class="col-xs-12" style="margin-bottom: 50px;">
         <div>
				<h1>Posts a validar</h1>
				<div class="horizontal-scroller">
					<?php
						foreach($posts as $post){
							show_post($post);
						}
					?>
				</div>
			</div>
        </div>
      </div>
    </div>
    <?php include 'footer.php'; ?>
</body>