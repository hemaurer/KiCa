<?php
	if (isset($_SESSION['user_login_status'])){
?>

<!-- profil.js enthält alle Funktionen, die auf der Profil Seite benötigt werden, z.B. Ändern von Größe -->
<script src="<?php echo URL; ?>public/js/profil.js"> </script>
<script src="<?php echo URL; ?>public/js/format.js"> </script>

<div class="container">

	<!-- Beinhaltet alle Daten zur Person des Profils -->
	<div id="personenDaten">

			<?php //Standardpfad Profilbilder: /public/img/profilbilder/_noimage.jpg ?>
			<!-- Das angezeigte Profilbild des Benutzers -->
			<div id="profilBild">
					<p><img src="<?php echo URL . $_SESSION['bild']; ?>" ></p>
				<!-- Button zum Ändern des Profilbilds -->
				<div align="center">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#profIlbildModal">Profilbild ändern</button>
				</div>
			</div><!-- End profilBild -->

			<br>

			<!-- Der Wrapper umschließt die Profildaten und die Daten zu den Trainingseinheiten -->
			<div id="profilDatenWrapper">
				<div id="profilDaten" class="profilContent">
					<table class="table">
						<thead style="background-color: #ddd; font-weight: bold;">
						<tr>
							<td colspan="3">Meine Daten</td>
						</tr>
						</thead>
						<tbody>
							<tr>
								<td><strong>Name: </strong></td>
								<td colspan="2"><?php echo $_SESSION['v_name']; echo" "; echo $_SESSION['name']; ?></td>
							</tr>
							<tr>
								<td><strong>Benutzername: </strong></td>
								<td colspan="2"><?php echo $_SESSION['username']; ?></td>
							</tr>
							<tr>
								<td><strong>Geburtsdatum: </strong></td>
								<td colspan="2"><?php if (isset($_SESSION['geb_datum'])){$date = new DateTime($_SESSION['geb_datum']); echo $date->format('d.m.Y');} ?></td>
							</tr>
							<tr>
								<td><strong>Größe: </strong></td>
								<td><span id="groesse_value"><?php echo $_SESSION['groesse']; ?></span> cm</td>
								<td> <a data-toggle="modal" data-target="#groesseModal"><span class="glyphicon glyphicon-pencil"></span></a> </td>
							</tr>
							<tr>
								<td><strong>Telefon: </strong></td>
								<td><span id="tel_value"><?php echo $_SESSION['tel']; ?></span></td>
								<td> <a data-toggle="modal" data-target="#telModal"><span class="glyphicon glyphicon-pencil"></span></a> </td>
							</tr>
							<tr>
								<td><strong>Passwort: </strong></td>
								<td>********</td>
								<td> <a data-toggle="modal" data-target="#passwordModal"><span class="glyphicon glyphicon-pencil"></span></a> </td>
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

		</div><!-- End profilDatenWrapper -->

</div><!-- End personenDaten -->

<?php
	// Die verwendeten, ausgelagerten Modale zur Seite hinzuladen
	require 'application/views/_templates/profil_modal.php';
?>

</div><!-- End Container  -->

<?php }
    else{ ?>
		<div class="container"> <?php
			echo "Bitte melden Sie sich zuerst an."; ?>
		</div>
<?php } ?>