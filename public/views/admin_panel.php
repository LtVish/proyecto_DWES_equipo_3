<?php include_once "cards/event_profile.php";?>
<?php include_once "cards/post_profile.php";?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PhotographItem-Responsive Theme | Contact</title>

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