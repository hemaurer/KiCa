<!DOCTYPE html>
<html lang="de">
<head>
	<title><?php echo "KiCa - ".ucfirst(Application::$subpage); ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- css -->
    <link href="<?php echo URL; ?>public/css/style.css" rel="stylesheet">
	<link href="<?php echo URL; ?>public/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo URL; ?>public/css/datepicker3.css" rel="stylesheet">
	<link href="<?php echo URL; ?>public/css/bootstrap-timepicker.css" rel="stylesheet">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo URL; ?>public/img/favicon.ico" />

    <!-- JavaScript / jQuery -->
	<script type="text/javascript" src="<?php echo URL; ?>public/js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="<?php echo URL; ?>public/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo URL; ?>public/js/bootstrap-timepicker.js"></script>
	<script type="text/javascript" src="<?php echo URL; ?>public/js/bootstrap-datepicker.js"></script>
</head>
<body>
<!-- header -->
<div class="container" id="header">
    <!-- navigation -->
    <nav class="navbar navbar-default" role="navigation" id="navigation">
		 <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo URL; ?>home/"><span><i class="glyphicon glyphicon-home"></i></span></a>
    </div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">

				<li><a href="<?php echo URL; ?>termine/">Termine</a></li>
				<li class="dropdown"><a href="<?php echo URL; ?>liga/" class="dropdown-toggle" data-toggle="dropdown">Ligatabelle</a>
					<ul class="dropdown-menu">

						<?php
							// Sparten aus der DB laden und in der Liste anzeigen
							// Bildet das Dropdown Menü für die Liga Navigation
							$sparten_model = $this->loadModel('SpartenModel');
	        				$spartenDaten = $sparten_model->getSparten();

	        				// Turniere laden - wird für die Turnier Navigation benötigt (bzw. nur die ID des Freundschaftspiels)
	        				$nav_turniere = $sparten_model->getTurniere(1);

	        				// Es wird nur geprüft, welche ID das Freundschaftsspiel hat
	        				// Dies wird in den Links über die Dropdown Navigation von Turniere als Parameter mitgegeben
	        				// So wird standardmäßig immer ein Freundschaftsspiel als erstes angezeigt, da dies überall besteht
	        				foreach ($nav_turniere as $nav_turnier) {
	        					if($nav_turnier->Turnier == "Freundschaftsspiel"){
	        						$id_freundschaftsspiel = $nav_turnier->ID;
	        					}
							}

						// Dropdown Menü aufbauen
						foreach ($spartenDaten as $sparte) { ?>
								<li><a href="<?php echo URL; echo 'liga/index/'; if (isset($sparte->ID)) echo $sparte->ID; ?>/"><?php if (isset($sparte->Sparte)) echo $sparte->Sparte; ?></a></li>
						<?php } ?>

					</ul>
				</li>
				<li class="dropdown"><a href="<?php echo URL; ?>turniere/" class="dropdown-toggle" data-toggle="dropdown">Turniere</a>
					<ul class="dropdown-menu">

						<?php
						// Dropdown Menü aufbauen
						foreach ($spartenDaten as $sparte) { ?>
								<li><a href="<?php echo URL; echo 'turniere/index/'; if (isset($sparte->ID)) echo $sparte->ID; echo '/'; echo $id_freundschaftsspiel; ?>/"><?php if (isset($sparte->Sparte)) echo $sparte->Sparte; ?></a></li>
						<?php } ?>

					</ul>
				</li>

				<!-- Login mit Submenü, die die Forms beinhalten -->
				<?php
				// Hier wird vom Server anhand von Sessionvariablen über PHP entschieden, wie die Navigation aufgebaut ist
				// 3 Varianten: ausgeloggt, eingeloggt, eingeloggt mit Adminrechten

				// Session starten, dass die Session Variablen zum Login-Status ausgelesen werden können
				// "Login" in der Navigation umbennen in den eingeloggten User
					@session_start();
					if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1){
				?>
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['v_name']; echo " "; echo $_SESSION['name']; ?><img id="profilbild_header" src="<?php echo URL . $_SESSION['bild']; ?>" ></a>
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

								<form class="navbar-form" name="loginform" action="<?php echo URL; ?>login/doLogin/" method="post">
									<div class="form-group">
									<input id="login_input_username" class="form-control" type="text" name="str_username" placeholder="Benutzername" required /><br>
									<input id="login_input_password" class="form-control" type="password" name="str_password" autocomplete="off" placeholder="Passwort" required /><br>
									</div>
									<button type="submit" class="btn btn-default" name="submit_login">Login</button>
								</form>

						<?php }
						?>

						<!-- Wenn man eingeloggt ist, die Profilseite und den Logout Button unter Login anzeigen -->
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

								<form class="navbar-form" name="logoutform" action="<?php echo URL; ?>login/doLogout/" method="get">
									<button class="btn btn-danger" type="submit" name="submit_logout" />Logout</button>
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

	<div class="headline-title">
		<h1>
			<img src="<?php echo URL; ?>public/img/football-icon.png" alt="Fussball">
			KiCa
		   <?php
				// Headline wird aus der Variable aus application.php gelesen
				echo "<small> - ".ucfirst(Application::$subpage)."</small>";
			?>
		</h1>
	</div>
</div>