<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css -->

    <link href="<?php echo URL; ?>public/css/style.css" rel="stylesheet">
	<link href="<?php echo URL; ?>public/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo URL; ?>public/css/datepicker3.css" rel="stylesheet">
	<link href="<?php echo URL; ?>public/css/bootstrap-timepicker.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
	<script type="text/javascript" src="<?php echo URL; ?>public/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../public/js/bootstrap-timepicker.js"></script>
	<script type="text/javascript" src="<?php echo URL; ?>public/js/bootstrap-datepicker.js"></script>
</head>
<body>
<!-- header -->
<div class="container" id="header">
    <!-- navigation -->
    <nav class="navbar navbar-default" role="navigation" id="navigation">
		 <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo URL; ?>home/"><span><i class="glyphicon glyphicon-home"></i></span></a>
    </div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">

				<li><a href="<?php echo URL; ?>termine/">Termine</a></li>
				<li class="dropdown"><a href="<?php echo URL; ?>ligatabelle/" class="dropdown-toggle" data-toggle="dropdown">Ligatabelle</a>
					<ul class="dropdown-menu">
						<li><a href="#">A-Jugend</a></li>
						<li><a href="#">B-Jugend</a></li>
						<li><a href="#">C-Jugend</a></li>
						<li><a href="#">D-Jugend</a></li>
					</ul>
				</li>
				<li><a href="<?php echo URL; ?>turniere/">Turniere</a></li>

				<!-- Login mit Submenü, die die Forms beinhalten -->
				<!-- Hier wird vom Server anhand von Sessionvariablen über PHP entschieden, wie die Navigation aufgebaut ist -->
				<!-- 3 Varianten: ausgeloggt, eingeloggt, eingeloggt mit Adminrechten -->

				<!-- Session starten, dass die Session Variablen zum Login-Status ausgelesen werden können -->
				<!-- "Login" in der Navigation umbennen in den eingeloggten User -->
				<?php
					@session_start();

					if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1){
				?>
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['v_name']; echo " "; echo $_SESSION['name']; ?></a>
				<?php
					}
					else{
				 ?>
				<li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown">Login</a>
				<?php  }
				?>

				<!-- die restliche Navigation, bzw. Submenu von "Login" -->
					<ul id="login" class="dropdown-menu">

						<!-- Wenn man nicht eingeloggt ist, das Login-Formular in der Navigation anzeigen -->
						<?php
							if (!isset($_SESSION['user_login_status'])){
						?>

								<form class="navbar-form" name="loginform" action="<?php echo URL; ?>login/doLogin" method="post">
									<div class="form-group">
									<input id="login_input_username" class="form-control" type="text" name="str_username" placeholder="Benutzername" required /><br>
									<input id="login_input_password" class="form-control" type="password" name="str_password" autocomplete="off" placeholder="Passwort" required /><br>
									</div>
									<button type="submit" class="btn btn-default" name="submit_login">Login</button>
								</form>

						<?php }
						?>

						<!-- Wenn man eingeloggt ist, die Suche, die Profilseite und den Logout Button unter Login anzeigen -->
						<?php
							if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1){
						?>

							<li><a href="<?php echo URL; ?>profil/">Profil</a></li>
							 <!-- Wenn man eingeloggt ist und Adminrechte hat, die Verwaltungsseite als Option anzeigen -->
							<?php
								if (isset($_SESSION['user_login_status']) AND $_SESSION['betreuer'] == 1){
							?>
								<li class="divider"></li>
								<li><a href="<?php echo URL; ?>verwaltung/">Verwaltung</a></li>
							<?php }
							?>
							<li class="divider"></li>

								<form class="navbar-form" name="logoutform" action="<?php echo URL; ?>login/doLogout" method="get">
									<button class="btn btn-default" type="submit" name="submit_logout" />Logout</button>
								</form>

						<?php }
						?>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
</div>
<!-- Anzeige der Überschrift des Seiteninhalts -->
<div class="container" id="headline">
    <?php
   		// Headline wird generiert über eine Abfrage einer Session Variable, die beim Laden des jeweiligen Subseiten-Controllers gesetzt wird
    	if (isset($_SESSION['user_login_status'])){

	    	if ($_SESSION['subpage']== "Home"){ echo "<h4>Home</h4>"; }
	    	if ($_SESSION['subpage']== "Profil"){ echo "<h4>Mein Profil</h4>"; }
	    	if ($_SESSION['subpage']== "Verwaltung"){ echo "<h4>Verwaltung</h4>"; }

    	}
    	else{
	    		echo "<h4>Home</h4>";
	    }
    ?>
</div>