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
<div class="container">
    <!-- KiCa Logo -->
    <div>
        <img src="<?php echo URL; ?>public/img/logo.png" />
    </div>
    <!-- navigation -->
    <nav>
        <ul>
            <!-- same like "home" or "home/index" -->
            <li><a href="<?php echo URL; ?>">Home</a></li>
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
            <!-- Login mit Submenü, die die Forms beinhalten (und im registrierten Zustand auch weitere Felder) -->
            <!-- dies muss eventuell über 2 Header oder sonstige Restriktionen geschehen -->
			<li><a href="#">Login</a>
                <ul id="login">
                    <li>
                        <form name="login" action="<?php echo URL; ?>home/login" method="post">
                            <input type="text" placeholder="Benutzername" name="username"><br>
                            <input type="password" placeholder="Passwort" name="password"><br>
                            <input type="submit" name="Submit">
                        </form>
                    </li>
                    <!-- Verwaltung nur zu Testzwecken hier enthalten - später nur im eingeloggten Zustand an dieser Stelle zu finden -->
                    <li><a href="<?php echo URL; ?>verwaltung/">Verwaltung</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</div>
