<head>
   <title>KiCa - Profil</title>
</head>
<?php
	if (isset($_SESSION['user_login_status'])){
?>

<!-- Das Javascript um Felder der Personendaten editierbar zu machen -->
<script src="<?php echo URL; ?>public/js/profil.js"> </script>

<div class="container">
	<!-- Beinhaltet alle Daten zur Person des Profils -->
	<div id="personenDaten">

			<?php //Standardpfad Profilbilder: ../public/img/profilbilder/_noimage.jpg ?>
			<div id="profilBild">
				<div id="bild">
					<p><img src="<?php echo $_SESSION['bild']; ?>" ></p>
				</div>

		            <!-- Datei hochladen -->
		            <!-- Die Encoding-Art enctyoe MUSS wie dargestellt angegeben werden -->
					<form enctype="multipart/form-data" action="<?php echo URL; ?>profil/doChangeProfilbild" method="POST">
					    <!-- MAX_FILE_SIZE muss vor dem Dateiupload Input Feld stehen / Bis zu 3 MB aktuell erlaubt-->
					    <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
					    <!-- Der Name des Input Felds bestimmt den Namen im $_FILES Array -->
					    Bild hochladen:<br>
					    <input name="userfile" type="file"  class="btn btn-default btn-sm" required/>
					    <input type="submit" name="submit_change_profilbild" value="Hochladen" class="btn btn-default btn-sm"/>
					</form>

			</div><!-- End profilBild -->
			<div id="profilDatenWrapper">
				<div id="profilDaten" class="profilContent">
					<table class="table">
						<thead style="background-color: #ddd; font-weight: bold;">
						<tr>
							<td>Meine Daten</td>
							<td></td>
							<td></td>
						</tr>
						</thead>
						<tbody>
							<tr>
								<td><strong>Name: </strong></td>
								<td><?php echo $_SESSION['v_name']; echo" "; echo $_SESSION['name']; ?></td>
								<td></td>
							</tr>
							<tr>
								<td><strong>Benutzername: </strong></td>
								<td><?php echo $_SESSION['username']; ?></td>
								<td></td>
							</tr>
							<tr>
								<td><strong>Geburtsdatum: </strong></td>
								<td><?php echo $_SESSION['geb_datum']; ?></td>
								<td></td>
							</tr>
							<tr>
								<td><strong>Größe: </strong></td>
								<td><span id="groesse_value"><?php echo $_SESSION['groesse']; ?></span> cm</td>
								<td>
									<button id="button_editGroesse" onclick="editGroesse()" class="btn btn-default btn-sm"><span></span></button>
									<button id="button_saveGroesse" onclick="saveGroesse()" class="btn btn-default btn-sm">Speichern</button>
								</td>
							</tr>
							<tr>
								<td><strong>Telefon: </strong></td>
								<td><span id="tel_value"><?php echo $_SESSION['tel']; ?></span></td>
								<td>
									<button id="button_editTel" onclick="editTel()" class="btn btn-default btn-sm"><span></span></button>
									<button id="button_saveTel" onclick="saveTel()" class="btn btn-default btn-sm">Speichern</button>
								</td>
							</tr>
						</tbody>
					</table>
			</div><!-- End profilDaten -->

			<!-- Beinhaltet Daten zu Trainingsgruppen etc. -->
			<div id="trainingsDaten" class="profilContent">
				<table class="table">
					<thead style="background-color: #ddd; font-weight: bold;">
						<tr>
							<td>Meine Trainingsgruppen</td>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($trainingsDaten as $trainingsgruppe) { ?>
						<tr>
							<td><?php if (isset($trainingsgruppe->name)) echo $trainingsgruppe->name; ?></td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div> <!-- End trainingsDaten -->
		</div>
		<!-- Beinhaltet den Dialog um das Passwort zu ändern -->
		<div class="profilContent" id="profilPasswordContent">

			<div class="panel-group" id="accordion">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Passwort ändern</a>
						</h4>
					</div>
					<div id="collapseOne" class="panel-collapse collapse">
						<div class="panel-body">
							<form name="form1" class="form-horizontal" action="<?php echo URL; ?>profil/doChangePassword" method="POST">
								<div class="form-group">
									<label class="control-label col-md-5">Altes Passwort*</label>
									<div class="col-md-5">
										<input class="form-control" type="password" id="altesPW" name="str_altesPassword" value="" required/>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-5">Neues Passwort*</label>
									<div class="col-md-5">
										<input class="form-control" type="password" name="str_neuesPassword" onkeyup="checkPassword()" value="" required />
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-5">Neues Passwort wiederholen*</label>
									<div class="col-md-5">
										<input class="form-control" type="password" name="str_neuesPasswordWiederholt" onkeyup="checkPassword()" value="" required />
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-offset-5 col-md-5">
										<input type="submit" class="btn btn-default" name="submit_change_password" value="Speichern" />
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>


</div><!-- End personenDaten -->
<div id="profilAlerts" class="profilContent">
	<?php
	// Beinhaltet die Alert Boxen, die ausgegeben werden, wenn eine Änderungsabfrage an den Server gesendet wird
	// Informieren darüber, ob die Änderungen erfolgreich war, oder nicht
		if(isset($_SESSION['successChangePW']) && $_SESSION['successChangePW'] == true) {
			echo '<div class="alert alert-success"><a class="close" data-dismiss="alert">×</a><span><strong>Erfolgreich: </strong>Passwort geändert!</span></div>';
			unset($_SESSION['successChangePW']);
		}
		if(isset($_SESSION['successChangePW']) && $_SESSION['successChangePW'] == false) {
			echo '<div class="alert alert-danger"><a class="close" data-dismiss="alert">×</a><span><strong>Fehler: </strong>Passwort konnte nicht geändert werden! Daten richtig eingegeben?</span></div>';
			unset($_SESSION['successChangePW']);
		}
	?>
</div>

</div><!-- End Container  -->
<?php }
    else{
	echo "Bitte melden Sie sich zu erst an.";}
	?>