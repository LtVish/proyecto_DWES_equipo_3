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
            <!-- Enlaces a las diferentes secciones de la web. Además, se muestra con subrayado la sección actual -->
                <li class="<?php echo ($_SERVER['PHP_SELF'] == '/views/index.php') ? 'active' : ''; ?> lien">
                <a href="HomeController.php"><i class="fa fa-home sr-icons"></i> Inicio </a></li>
                <li class="<?php echo ($_SERVER['PHP_SELF'] == '/views/login.php') ? 'active' : ''; ?> lien">
                <a href="LoginController.php"><i class="fa fa-user sr-icons"></i> Login </a></li>
                <li class="<?php echo ($_SERVER['PHP_SELF'] == '/views/event.php') ? 'active' : ''; ?> lien">
                <a href="EventsController.php?page=1"><i class="fa fa-calendar sr-icons"></i> Eventos </a></li>
                <li class="<?php echo ($_SERVER['PHP_SELF'] == '/views/species.php') ? 'active' : ''; ?> lien">
                <a href="SpeciesController.php"><i class="fa fa-tree sr-icons"></i> Nuestras especies </a></li>
                <li class="<?php echo ($_SERVER['PHP_SELF'] == '/views/achievements.php') ? 'active' : ''; ?> lien">
                <a href="AchievementsController.php"><i class="fa fa-trophy sr-icons"></i> Logros </a></li>
                <li class="<?php echo ($_SERVER['PHP_SELF'] == '/views/blog.php') ? 'active' : ''; ?> lien">
                <a href="BlogController.php?page=1"><i class="fa fa-file-text sr-icons"></i> Blog</a></li>
                <li class="<?php echo ($_SERVER['PHP_SELF'] == '/views/newsletter.php') ? 'active' : ''; ?> lien">
                <a href="NewsletterController.php"><i class="fa fa-newspaper-o sr-icons"></i> Newsletter</a></li>
                <li class="<?php echo ($_SERVER['PHP_SELF'] == '/views/about.php') ? 'active' : ''; ?> lien">
                <a href="AboutController.php"><i class="fa fa-users sr-icons"></i> Sobre nosotros</a></li>
                <li class="<?php echo ($_SERVER['PHP_SELF'] == '/views/contact.php') ? 'active' : ''; ?> lien">
                <a href="ContactController.php"><i class="fa fa-phone-square sr-icons"></i> Contacto</a></li>
                <!-- Si el usuario está logueado, se muestra su nick y su karma, además de un enlace para cerrar sesión -->
                <?php if(isset($_SESSION["user"])){?>
                <li>
                    <?php echo $_SESSION["user"] -> nick . " - karma: " . $_SESSION["user"] -> karma;?>
                </li>
                <li>
                    <a href="LoginController.php?logout"><i class="fa fa-user sr-icons"></i>Logout</a>
                </li>
                <?php }?>
            </ul>
        </div>
    </div>
</nav>
<!-- End of Navigation Bar -->