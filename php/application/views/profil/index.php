<?php
	if (isset($_SESSION['user_login_status'])){
?>

<!-- Das Javascript um Felder der Personendaten editierbar zu machen -->
<script src="<?php echo URL; ?>public/js/profil.js"> </script>

<div class="container">
	<!-- Beinhaltet alle Daten zur Person des Profils -->
	<div id="personenDaten">

			<?php //Standardpfad Profilbilder: /public/img/profilbilder/_noimage.jpg ?>
			<div id="profilBild">
				<div id="bild">
					<p><img src="<?php echo URL . $_SESSION['bild']; ?>" ></p>
				</div>

				<div align="center">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bildModal">Profilbild hochladen</button>
				</div>

								<!-- sModal -->
								<div class="modal fade" id="bildModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title" id="pModalLabel">Profilbild hochladen</h4>
											</div>
											<div class="modal-body">

												<div align="center">
													<!-- Datei hochladen -->
										            <!-- Die Encoding-Art enctyoe MUSS wie dargestellt angegeben werden -->
													<form enctype="multipart/form-data" action="<?php echo URL; ?>profil/doChangeProfilbild/" method="POST">
													    <!-- MAX_FILE_SIZE muss vor dem Dateiupload Input Feld stehen / Bis zu 3 MB aktuell erlaubt-->
													    <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
													    <!-- Der Name des Input Felds bestimmt den Namen im $_FILES Array -->
													    <input name="userfile" type="file"  class="btn btn-default" required/></p>
													    <input type="submit" name="submit_change_profilbild" value="Hochladen" class="btn btn-default"/>
													</form>
												</div>

											</div>
										</div>
									</div>
								</div>

			</div><!-- End profilBild -->
			<br>
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
								<td> <a data-toggle="modal" data-target="#bs_Modal" onclick="toggleModal()"><span class="glyphicon glyphicon-pencil"></span></a> </td>
							</tr>

								<?php require 'application/views/_templates/bootstrap_modal.php'; ?>

							<tr>
								<td><strong>Telefon: </strong></td>
								<td><span id="tel_value"><?php echo $_SESSION['tel']; ?></span></td>
								<td> <a data-toggle="modal" data-target="#telModal"><span class="glyphicon glyphicon-pencil"></span></a> </td>
							</tr>
									<!-- sModal -->
									<div class="modal fade" id="telModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title" id="pModalLabel">Telefon ändern</h4>
												</div>
												<div class="modal-body">

													Bitte tragen Sie die neue Telefonnummer ein (als eine Zahl):
													</p>
													<input class="form-control" type="text" id="neueTel" name="str_neueTel" onkeyup="checkTel()" value="" />

												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal" onclick="dismissTel()">Abbrechen</button>
													<button type="button" id="submit_saveTel" class="btn btn-primary" data-dismiss="modal" onclick="saveTel()">Ändern</button>
												</div>
											</div>
										</div>
									</div>
							<tr>
								<td><strong>Passwort: </strong></td>
								<td>********</td>
								<td> <a data-toggle="modal" data-target="#passwordModal"><span class="glyphicon glyphicon-pencil"></span></a> </td>
							</tr>
									<!-- sModal -->
									<div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title" id="pModalLabel">Passwort ändern</h4>
												</div>
												<div class="modal-body">

													<form name="form1" role="form">
														<div class="form-group">
															<label for="altesPW">Altes Passwort</label>
																<input type="password" class="form-control" id="altesPW" name="str_altesPassword" onkeyup="checkPassword_alt()" value="" required/></p>
														</div>
														<div class="form-group">
															<label for="neuesPW">Neues Passwort</label>
																<input type="password" class="form-control" id="neuesPW" name="str_neuesPassword" onkeyup="checkPassword_neu()" value="" required /></p>
														</div>
														<div class="form-group">
															<label for="neuesPW_2">Neues Passwort wiederholen</label>
																<input type="password" class="form-control" id="neuesPW_2" name="str_neuesPasswordWiederholt" onkeyup="checkPassword_neu()" value="" required /></p>
														</div>
													</form>

												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal" onclick="dismissPW()">Abbrechen</button>
													<button type="button" class="btn btn-primary" id="submit_change_password" data-dismiss="modal" onclick="savePassword()">Ändern</button>
												</div>
											</div>
										</div>
									</div>
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

</div><!-- End personenDaten -->

<!-- Modals für die Änderungsdialoge, die über Erfolg oder Misserfolg informieren -->
<div>
	<!-- sModal -->
	<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="pModalLabel"><span id="successModal_head"></span></h4>
				</div>
				<div class="modal-body">
					<span id="successModal_body"><span>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal" onclick="location.reload()">Schliessen</button>
				</div>
			</div>
		</div>
	</div>
</div>

</div><!-- End Container  -->
<?php }
    else{
	echo "Bitte melden Sie sich zu erst an.";}
	?>