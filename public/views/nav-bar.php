<!-- Navigation Bar -->
<nav class="navbar navbar-fixed-top navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand page-scroll" href="#page-top">
                <img width="40" src="../images/logo/logo.png">
            </a>
        </div>
        <div class="collapse navbar-collapse navbar-right" id="menu">
            <ul class="nav navbar-nav">
                <li class="<?php echo ($_SERVER['PHP_SELF'] == '/views/index.php') ? 'active' : ''; ?> lien">
                <a href="index.php"><i class="fa fa-home sr-icons"></i> Inicio </a></li>
                <li class="<?php echo ($_SERVER['PHP_SELF'] == '/views/login.php') ? 'active' : ''; ?> lien">
                <a href="login.php"><i class="fa fa-bookmark sr-icons"></i> Login </a></li>
                <li class="<?php echo ($_SERVER['PHP_SELF'] == '/views/event.php') ? 'active' : ''; ?> lien">
                <a href="event.php"><i class="fa fa-calendar sr-icons"></i> Eventos </a></li>
                <li class="<?php echo ($_SERVER['PHP_SELF'] == '/views/especies.php') ? 'active' : ''; ?> lien">
                <a href="especies.php"><i class="fa fa-calendar sr-icons"></i> Nuestras especies </a></li>
                <li class="<?php echo ($_SERVER['PHP_SELF'] == '/views/logros.php') ? 'active' : ''; ?> lien">
                <a href="logros.php"><i class="fa fa-calendar sr-icons"></i> Logros </a></li>
                <li class="<?php echo ($_SERVER['PHP_SELF'] == '/views/blog.php') ? 'active' : ''; ?> lien">
                <a href="blog.php"><i class="fa fa-file-text sr-icons"></i> Blog</a></li>
                <li class="<?php echo ($_SERVER['PHP_SELF'] == '/views/about.php') ? 'active' : ''; ?> lien">
                <a href="about.php"><i class="fa fa-file-text sr-icons"></i> Sobre nosotros</a></li>
                <li class="<?php echo ($_SERVER['PHP_SELF'] == '/views/contacto.php') ? 'active' : ''; ?> lien">
                <a href="contacto.php"><i class="fa fa-phone-square sr-icons"></i> Contacto</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- End of Navigation Bar -->