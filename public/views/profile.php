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

<!-- Navigation Bar -->
<?php include 'nav-bar.php'; ?>
<!-- End of Navigation Bar -->

<div id="contact">
   	  <div class="container">
		<!-- user profile part -->
		<div class="col-xs-4">
			<h1><?=$user-> nick ?></h1>
		   	<hr>
		   	<form class="form-horizontal" action="<?=htmlspecialchars($_SERVER["PHP_SELF"]."?info=".$_GET["info"])?>", method="POST">
			   <div class="form-group">
					<div class="col-xs-12">
						<label class="label-control">Karma: <?=$user-> karma ?></label>
					</div>
				</div>
			   <div class="form-group">
					<div class="col-xs-12">
						<label class="label-control">Nombre Completo: <?=$user-> full_name ?></label>
						<input class="form-control" type="text" type="text" name="mod_nombre">
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12">
						<label class="label-control">Nombre de Usuario: <?=$user-> nick ?></label>
						<input class="form-control" type="text" type="text" name="mod_nick">
					</div>
					<?php if(isset($errors["nick_usado"]))
					{?>
					<div class="alert">
  						<strong>Error!</strong> <?=$errors["nick_usado"]?>
					</div>
					<?php } ?>
				</div>
				<div class="form-group">
					<div class="col-xs-12">
						<label class="label-control">Email: <?=$user-> email ?></label>
						<input class="form-control" type="text" type="email" name="mod_email">
					</div>
					<?php if(isset($errors["email_login"]))
					{?>
					<div class="alert">
  						<strong>Error!</strong> <?=$errors["email_login"]?>
					</div>
					<?php } ?>
					<?php if(isset($errors["email_usado"]))
					{?>
					<div class="alert">
  						<strong>Error!</strong> <?=$errors["email_usado"]?>
					</div>
					<?php } ?>
				</div>
				<div class = "form-group">
					<button class="btn btn-lg sr-button">MODIFICAR USUARIO</button>
				</div>
		   	</form>
			<?php if ($user -> nick == "admin"){?>

				<form class="form-horizontal" action="AdminController.php", method="post">
				<div class = "form-group">
						<button class="btn btn-lg sr-button">Panel Adminstrador</button>
					</div>
				</form>
			<?php }?>
		</div>
		<div class="col-xs-8 p-and-e">
			<div>
				<h1><?=$_GET["info"]=="posts" ? "Tus posts" : "Tus eventos"?></h1>
				<div class="form-group text-right">
					<a href=<?=$_GET["info"]=="posts" ? "#" : "NewEventController.php?action=create"?>
					>
						<button class="btn btn-lg sr-button"><?=$_GET["info"]=="posts" ? "Nuevo post" : "Nuevo evento"?></button>
					</a>
				</div>
				<div class="horizontal-scroller">
					<?php
						foreach($eventos as $event){
							show_event($event);
						}

						foreach($posts as $post){
							show_post($post);
						}
					?>
				</div>
			</div>
			<form class="form-horizontal" action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>", method="GET">
			   <div class = "form-group">
					<input type="hidden" name="info" value=<?=$_GET["info"]=="posts" ? "eventos" : "posts"?>>
					<button class="btn btn-lg sr-button pull-right"><?=$_GET["info"]=="posts" ? "VER EVENTOS" : "VER POSTS"?></button>
				</div>
			</form>
		</div>
   	  </div>
   </div>
   <?php include 'footer.php'; ?>
</body>