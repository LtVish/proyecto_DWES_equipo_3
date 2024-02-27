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
                <a href="HomeController.php"><i class="fa fa-home sr-icons"></i> Inicio </a></li>
                <li class="<?php echo ($_SERVER['PHP_SELF'] == '/views/login.php') ? 'active' : ''; ?> lien">
                <a href="LoginController.php"><i class="fa fa-user sr-icons"></i> Login </a></li>
                <li class="<?php echo ($_SERVER['PHP_SELF'] == '/views/event.php') ? 'active' : ''; ?> lien">
                <a href="EventsController.php?page=1"><i class="fa fa-calendar sr-icons"></i> Eventos </a></li>
                <li class="<?php echo ($_SERVER['PHP_SELF'] == '/views/species.php') ? 'active' : ''; ?> lien">
                <a href="species.php"><i class="fa fa-tree sr-icons"></i> Nuestras especies </a></li>
                <li class="<?php echo ($_SERVER['PHP_SELF'] == '/views/achievements.php') ? 'active' : ''; ?> lien">
                <a href="achievements.php"><i class="fa fa-trophy sr-icons"></i> Logros </a></li>
                <li class="<?php echo ($_SERVER['PHP_SELF'] == '/views/blog.php') ? 'active' : ''; ?> lien">
                <a href="blog.php"><i class="fa fa-file-text sr-icons"></i> Blog</a></li>
                <li class="<?php echo ($_SERVER['PHP_SELF'] == '/views/newsletter.php') ? 'active' : ''; ?> lien">
                <a href="newsletter.php"><i class="fa fa-newspaper-o sr-icons"></i> Newsletter</a></li>
                <li class="<?php echo ($_SERVER['PHP_SELF'] == '/views/about.php') ? 'active' : ''; ?> lien">
                <a href="about.php"><i class="fa fa-users sr-icons"></i> Sobre nosotros</a></li>
                <li class="<?php echo ($_SERVER['PHP_SELF'] == '/views/contact.php') ? 'active' : ''; ?> lien">
                <a href="contact.php"><i class="fa fa-phone-square sr-icons"></i> Contacto</a></li>
                <?php if(isset($_SESSION["user"])){?>
                <li style="font-size: 20px;">
                    <?php echo $_SESSION["user"] -> nick . "---karma: " . $_SESSION["user"] -> karma;?>
                </li>
                <?php }?>
            </ul>
        </div>
    </div>
</nav>
<!-- End of Navigation Bar -->