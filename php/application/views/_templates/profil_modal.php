<!-- Die folgenden Modale sind Komponenten von Bootstrap und werden über die Ändern Buttons aufgerufen -->
<!-- Profilbild Modal -->
<div class="modal fade" id="profIlbildModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="pModalLabel">Profilbild ändern</h4>
			</div>
			<div class="modal-body">

				<div align="center">

					<!-- Datei hochladen -->
		            <!-- Die Encoding-Art enctyoe MUSS wie dargestellt angegeben werden -->
					<form enctype="multipart/form-data" action="<?php echo URL; ?>profil/doChangeProfilbild/" method="POST">
					    <!-- MAX_FILE_SIZE muss vor dem Dateiupload Input Feld stehen / Bis zu 3 MB aktuell erlaubt-->
					    <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
					    <input type="hidden" name="resetProfilbild" value="0"/>
					    <!-- Der Name des Input Felds bestimmt den Namen im $_FILES Array -->
					    <input name="userfile" type="file" id="profilFileDialog" class="btn btn-default" required/>
					    <input type="submit" name="submit_change_profilbild" value="Hochladen" class="btn btn-primary"/>
					</form>
				</div>

			</div>
			<div class="modal-footer">
					<button type="button" class="btn btn-danger btn-left" data-dismiss="modal" onclick="resetProfilbild()">Profilbild zurücksetzen</button>
					<button type="button" class="btn btn-default btn-right" data-dismiss="modal" >Abbrechen</button>
			</div>
		</div>
	</div>
</div>

<!-- Größe Modal -->
<div class="modal fade" id="groesseModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="pModalLabel">Größe ändern</h4>
			</div>
			<div class="modal-body">

				<div class="form-group">
					<label>Bitte tragen Sie die neue Größe in cm ein:</label>
					<input class="form-control" type="text" id="neueGroesse" name="str_neueGroesse" onkeyup="checkGroesse()" value="" />
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal" onclick="dismissGroesse()">Abbrechen</button>
				<button type="button" id="submit_saveGroesse" class="btn btn-primary" data-dismiss="modal" onclick="saveGroesse()">Speichern</button>
			</div>
		</div>
	</div>
</div>

<!-- Telefon Modal -->
<div class="modal fade" id="telModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="pModalLabel">Telefon ändern</h4>
			</div>
			<div class="modal-body">

				<div class="form-group">
					<label>Bitte tragen Sie die neue Telefonnummer ein (als eine Zahl):</label>
					<input class="form-control" type="text" id="neueTel" name="str_neueTel" onkeyup="checkTel()" value="" />
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal" onclick="dismissTel()">Abbrechen</button>
				<button type="button" id="submit_saveTel" class="btn btn-primary" data-dismiss="modal" onclick="saveTel()">Speichern</button>
			</div>
		</div>
	</div>
</div>

<!-- Passwort Modal -->
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
				<button type="button" class="btn btn-primary" id="submit_change_password" data-dismiss="modal" onclick="savePassword()">Speichern</button>
			</div>
		</div>
	</div>
</div>

<!-- success-Modal -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" id="successModal_dialog">
	</div>
</div>