<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css -->
    <link href="<?php echo URL; ?>public/css/style.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>

</head>
<body>
<!-- header -->
<div>
    <!-- KiCa Logo -->
    <div>
        <img src="<?php echo URL; ?>public/img/logo.png" />
    </div>
    <!-- navigation -->
    <nav>
        <ul>
            <!-- same like "home" or "home/index" -->
            <li><a a href="<?php echo URL; ?>home/">Home</a></li>
            <li><a href="#">Termine</a></li>
            <li><a href="#">Ligatabelle</a>
                <ul>
                    <li><a href="#">A-Jugend</a></li>
                    <li><a href="#">B-Jugend</a></li>
                    <li><a href="#">C-Jugend</a></li>
                    <li><a href="#">D-Jugend</a></li>
                </ul>
            </li>
            <li><a href="#">Turniere</a></li>

            <!-- Login mit Submenü, die die Forms beinhalten -->
            <!-- Hier wird vom Server anhand von Sessionvariablen über PHP entschieden, wie die Navigation aufgebaut ist -->
            <!-- 3 Varianten: ausgeloggt, eingeloggt, eingeloggt mit Adminrechten -->

            <!-- Session starten, dass die Session Variablen zum Login-Status ausgelesen werden können -->
            <!-- "Login" in der Navigation umbennen in den eingeloggten User -->
            <?php
                @session_start();

                if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1){
            ?>
                    <li><a href="#"><?php echo $_SESSION['username']; ?></a>
            <?php
                }
                else{
             ?>
                    <li><a href="#">Login</a>
            <?php  }
            ?>

            <!-- die restliche Navigation, bzw. Submenu von "Login" -->
                <ul id="login">

                    <!-- Wenn man nicht eingeloggt ist, das Login-Formular in der Navigation anzeigen -->
                    <?php
                        if (!isset($_SESSION['user_login_status'])){
                    ?>
                        <li>
                            <form name="loginform" action="<?php echo URL; ?>login/doLogin" method="post">
                                <input id="login_input_username" class="login_input" type="text" name="str_username" placeholder="Benutzername" required /><br>
                                <input id="login_input_password" class="login_input" type="password" name="str_password" autocomplete="off" placeholder="Passwort" required /><br>
                                <input type="submit" name="submit_login" value="Log in">
                            </form>
                        </li>
                    <?php }
                    ?>

                    <!-- Wenn man eingeloggt ist, die Suche, die Profilseite und den Logout Button unter Login anzeigen -->
                    <?php
                        if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1){
                    ?>
                        <li>
                            <form name="search" action="#" method="get">
                                <input type="text" name="search_query" placeholder="Suchen..." />
                                <input type="submit" name="submit_search" value="Suchen">
                            </form>
                        </li>
                        <li><a href="#">Profil</a></li>
						 <!-- Wenn man eingeloggt ist und Adminrechte hat, die Verwaltungsseite als Option anzeigen -->
						<?php
							if (isset($_SESSION['user_login_status']) AND $_SESSION['betreuer'] == 1){
						?>
							<li><a href="<?php echo URL; ?>verwaltung/">Verwaltung</a></li>
						<?php }
						?>
                        <li>
                            <form name="logoutform" action="<?php echo URL; ?>login/doLogout" method="get">
                                <input type="submit" name="submit_logout" value="Log out" />
                            </form>
                        </li>
                    <?php }
                    ?>

                   

                </ul>
            </li>
        </ul>
    </nav>
</div>
