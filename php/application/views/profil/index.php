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

		<div class="profilContent" id="profilHeadline"><h4>Mein Profil</h4></div>
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

		</div>

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

	<div class="profilContent" id="profilPasswordContent">
		<!-- Stub für die Passwort Ändern Funktion -->
	</div>

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
	</div>
</div><!-- End personenDaten -->
</div><!-- End Container  -->
<?php }
    else{
	echo "Bitte melden Sie sich zu erst an.";}
	?>