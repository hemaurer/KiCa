// $(function(){

    //Buttons ausschalten (beim Laden der Seite)
    // document.getElementById('submit_change_password').disabled = true;
    // document.getElementById('submit_saveTel').disabled = true;
//});

function toggleModal(modal_id, type, x_id, x_name){
	if (modal_id == 1){ //ID für Add
		
	}else if (modal_id == 2){ //ID für Bearbeiten
		if (type == 'person'){
			$('#modalheader').html("Person bearbeiten");
			$('#modalbody').html('<div class="form-horizontal"><div class="form-group"><label class="control-label col-md-4">Nachname</label><div class="col-md-6"><input class="form-control" type="text" id="str_nachname" value="" placeholder="Nachname" /></div></div><div class="form-group"><label class="control-label col-md-4">Vorname</label><div class="col-md-6"><input class="form-control" type="text" id="str_vorname" value="" placeholder="Vorname" /></div></div><div class="form-group"><label class="control-label col-md-4">Geburtsdatum</label><div class="col-md-6"><div class="sandbox-container input-group "><input class="form-control" id="d_date" type="text"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span></div></div><script> $(\'.sandbox-container input\').datepicker();</script></div><div class="form-group"><label class="control-label col-md-4">Groesse</label><div class="col-md-6"><input class="form-control" type="number" id="int_groesse" value="" placeholder="Beispiel 158cm" /></div></div><div class="form-group"><label class="control-label col-md-4">Betreuer?</label><div class="col-md-6"><select class="form-control" id="b_betreuer" size="1" ><option value="0">Nein</option><option value="1">Ja</option></select></div></div><div class="form-group"><label class="control-label col-md-4">Telefonnummer</label><div class="col-md-6"><input class="form-control" type="number" id="int_tel" value="" placeholder="Telefonnummer" /></div></div></div>');
			$('#modalfooter').html('<a type="submit" class="btn btn-danger" data-dismiss="modal" onclick="passwordSuccess(\''+x_id+'\')">Passwort zurücksetzen</a><button type="button" class="btn btn-default" data-dismiss="modal">Abbrechen</button> <a type="submit" class="btn btn-primary" data-dismiss="modal" onclick="editSuccess(\''+type+'\',\''+x_id+'\')">Speichern</a>');
		}
		if (type == 'spiel'){
		
		}
		if (type == 'mannschaft'){
		
		}
		if (type == 'trainingseinheit'){
		
		}
		if (type == 'traininggruppe'){
		
		}
		if (type == 'turnier'){
			$('#turniermodalheader').html("Turnier bearbeiten");
			$('#turniermodalfooter').html('<button type="button" class="btn btn-default" data-dismiss="modal">Abbrechen</button> <a type="submit" class="btn btn-primary" data-dismiss="modal" onclick="editSuccess(\''+type+'\',\''+x_id+'\')">Speichern</a>');
		}
	}else if (modal_id == 3){ //ID für Löschen
		$('#modalheader').html("Löschen bestätigen");
		$('#modalbody').html('Wollen Sie '+x_name+' wirklich löschen?');
		$('#modalfooter').html('<button type="button" class="btn btn-default" data-dismiss="modal">Abbrechen</button> <a type="submit" class="btn btn-primary" data-dismiss="modal" onclick="successModal(\''+type+'\',\''+x_id+'\')">Löschen</a>');
	}
		
}
function passwordSuccess(x_id) {
	$.post("reset_password",{"p_id": x_id})
		.done(function( data ) {
			if (data == 1){
					$('#successModal_dialog').html('<div class="alert alert-success"><strong>Erfolgreich!</strong> Passwort erfolgreich zurückgesetzt!</div>');
					$('#successModal').modal('toggle');
					window.setTimeout(function(){location.reload();},4000);
				}
				else{
					$('#successModal_dialog').html('<div class="alert alert-danger"><strong>Fehler!</strong> Es ist ein Fehler aufgetreten!</div>');
					$('#successModal').modal('toggle');
					window.setTimeout(function(){location.reload();},4000);
				}
			});

}
//Über den Button "Ändern" des Modals der Größe, um den neuen Wert in die DB schreiben
function editSuccess(type, x_id) {
		
		//Post Request auf die PHP Funktion im Controller von Profil um die Daten in die DB zu schreiben
		
	if (type == "person"){	
	
		/*Inputfeld Wert in Variable definieren*/
		var str_nachname_in = $('#str_nachname');
		var str_nachname = str_nachname_in.val();
		var str_vorname_in = $('#str_vorname');
		var str_vorname = str_vorname_in.val();
		var d_date_in = $('#d_date');
		var d_date = d_date_in.val();
		var int_groesse_in = $('#int_groesse');
		var int_groesse = int_groesse_in.val();
		var b_betreuer_in = $('#b_betreuer');
		var b_betreuer = b_betreuer_in.val();
		var int_tel_in = $('#int_tel');
		var int_tel = int_tel_in.val();
		
		$.post("edit_"+type+"",{"p_id":x_id, "str_nachname":str_nachname, "str_vorname":str_vorname, "d_date":d_date, "int_groesse":int_groesse, "b_betreuer":b_betreuer, "int_tel":int_tel})
			.done(function( data ) {
			 	if (data == 1){
			 			$('#successModal_dialog').html('<div class="alert alert-success"><strong>Erfolgreich!</strong> Person bearbeiten erfolgreich abgeschlossen!</div>');
						$('#successModal').modal('toggle');
						window.setTimeout(function(){location.reload();},4000);
					}
					else{
						$('#successModal_dialog').html('<div class="alert alert-danger"><strong>Fehler!</strong> Es ist ein Fehler aufgetreten!</div>');
						$('#successModal').modal('toggle');
						window.setTimeout(function(){location.reload();},4000);
					}
				}
			);
	}
	if (type == "turnier"){
		var str_name_in = $('#str_name');
		var str_name = str_name_in.val();
		var str_gewinner_in = $('#str_gewinner');
		var str_gewinner = str_gewinner_in.val();
		$.post("edit_"+type+"",{"tu_id":x_id, "str_name":str_name, "str_gewinner":str_gewinner})
			.done(function( data ) {
			 	if (data == 1){
			 			$('#successModal_dialog').html('<div class="alert alert-success"><strong>Erfolgreich!</strong> Turnier erfolgreich bearbeitet!</div>');
						$('#successModal').modal('toggle');
						window.setTimeout(function(){location.reload();},3000);
					}
					else{
						$('#successModal_dialog').html('<div class="alert alert-danger"><strong>Fehler!</strong> Es ist ein Fehler aufgetreten!</div>');
						$('#successModal').modal('toggle');
						window.setTimeout(function(){location.reload();},3000);
					}
				}
			);
	
	}
}



//Über den Button "Löschen" des Modals aufgerufen
function successModal(type, x_id) {
		
		//Post Request auf die PHP Funktion im Controller von Verwaltung um die Daten von DB zu löschen
		
		
		$.post("delete_"+type+"",{"del_id": x_id})
			.done(function( data ) {
			 	if (data == 1){
			 			$('#successModal_dialog').html('<div class="alert alert-success"><strong>Erfolgreich!</strong> Löschen erfolgreich abgeschlossen!</div>');
						$('#successModal').modal('toggle');
						window.setTimeout(function(){location.reload();},4000);
					}
					else{
						$('#successModal_dialog').html('<div class="alert alert-danger"><strong>Fehler!</strong> Es ist ein Fehler aufgetreten!</div>');
						$('#successModal').modal('toggle');
						window.setTimeout(function(){location.reload();},4000);
					}
				});
		
}

//prüft, ob im Modal der Passwortänderung etwas als altes Passwort eingegeben wurde
function checkPassword_alt(){
	var altesPasswort = document.form1.str_altesPassword.value;

	if (altesPasswort != ""){
		//die restlichen Felder des neuen Passworts prüfen
		checkPassword_neu();
	}
	else{
		document.getElementById('submit_change_password').disabled = true;

	}
}

//prüft, ob das eingegebene Passwort bei einer Passwortänderung korrekt wiederholt wurde
function checkPassword_neu() {
	var neuesPassword = document.form1.str_neuesPassword.value;
	var neuesPasswordWiederholt = document.form1.str_neuesPasswordWiederholt.value;

	if(neuesPasswordWiederholt != "" && neuesPassword != ""){
		if(neuesPassword != neuesPasswordWiederholt){
			document.form1.str_neuesPassword.style.backgroundColor = "#E98383";
			document.form1.str_neuesPasswordWiederholt.style.backgroundColor = "#E98383";
			document.getElementById('submit_change_password').disabled = true;
		}else{
			document.form1.str_neuesPassword.style.backgroundColor = '#83E983';
			document.form1.str_neuesPasswordWiederholt.style.backgroundColor = '#83E983';
			document.getElementById('submit_change_password').disabled = false;
		}
	}
	else{
		document.getElementById('submit_change_password').disabled = true;
	}
}

//prüft, ob eine Größe eingegeben wurde und ob der Wert annehmbar ist
function checkGroesse(){

	 var groesse = document.getElementById('neueGroesse').value

	 if (!isNaN(groesse) && groesse > 0 && groesse < 251 && groesse != ""){
	 	 document.getElementById('submit_saveGroesse').disabled = false;
	 }
	 else{
	 	 document.getElementById('submit_saveGroesse').disabled = true;
	 }

}

//prüft, ob eine Größe eingegeben wurde und ob der Wert annehmbar ist
function checkTel(){

	 var tel = document.getElementById('neueTel').value

	 if (!isNaN(tel) && tel > 0 && tel < 999999999999999 && tel != ""){
	 	 document.getElementById('submit_saveTel').disabled = false;
	 }
	 else{
	 	 document.getElementById('submit_saveTel').disabled = true;
	 }

}

//Über den Button "Ändern" des Modals der Größe, um den neuen Wert in die DB schreiben
function saveGroesse() {

		var groesse_value = $('#neueGroesse');

		//Umweg über Variable muss gesetzt werden - das Script funktioniert nicht, wenn der Post Request direkt getätigt wird
		var groesse = groesse_value.val();

		//Post Request auf die PHP Funktion im Controller von Profil um die Daten in die DB zu schreiben
		// $.post("doChangeGroesse", {"int_groesse": groesse});
		$.post("doChangeGroesse", {"int_groesse": groesse})
			 .done(function( data ) {
			 	if (data == 1){
			 			$('#successModal_head').html("Erfolgreich");
			 			$('#successModal_body').html("Größe erfolgreich geändert!");
			 			$('#successModal').modal('toggle');
					}
					else{
						$('#successModal_head').html("Fehler");
			 			$('#successModal_body').html("Größe konnte nicht geändert werden!");
						$('#successModal').modal('toggle');
					}
				});
}

//Über den Button "Ändern" des Modals der Telefonnummer, um den neuen Wert in die DB schreiben
function saveTel() {

		var tel_value = $('#neueTel');

		//Umweg über Variable muss gesetzt werden - das Script funktioniert nicht, wenn der Post Request direkt getätigt wird
		var tel = tel_value.val();

		//Post Request auf die PHP Funktion im Controller von Profil um die Daten in die DB zu schreiben
		$.post("doChangeTel", {"str_tel": tel})
			 .done(function( data ) {
			 	if (data == 1){
			 			$('#successModal_head').html("Erfolgreich");
			 			$('#successModal_body').html("Telefonnummer erfolgreich geändert!");
			 			$('#successModal').modal('toggle');
					}
					else{
						$('#successModal_head').html("Fehler");
			 			$('#successModal_body').html("Telefonnummer konnte nicht geändert werden!");
						$('#successModal').modal('toggle');
					}
				});
}

//Über den Button "Ändern" des Modals des Passworts, um den neuen Wert in die DB schreiben
function savePassword() {

		var pw_value_1 = $('#altesPW');
		var pw_value_2 = $('#neuesPW');
		var pw_value_3 = $('#neuesPW_2');

		//Umweg über Variable muss gesetzt werden - das Script funktioniert nicht, wenn der Post Request direkt getätigt wird
		var pw_alt = pw_value_1.val();
		var pw_neu = pw_value_2.val();
		var pw_neu_2 = pw_value_3.val();

		//Post Request auf die PHP Funktion im Controller von Profil um die Daten in die DB zu schreiben
		$.post("doChangePassword", {"str_altesPassword": pw_alt, "str_neuesPassword": pw_neu, "str_neuesPasswordWiederholt": pw_neu_2})
			 .done(function( data ) {
			 	if (data == 1){
			 			$('#successModal_head').html("Erfolgreich");
			 			$('#successModal_body').html("Passwort erfolgreich geändert!");
			 			$('#successModal').modal('toggle');
					}
					else{
						$('#successModal_head').html("Fehler");
			 			$('#successModal_body').html("Passwort konnte nicht geändert werden!\nBitte überprüfen Sie Ihre Eingaben.");
						$('#successModal').modal('toggle');
					}
				});

}


//Wenn auf Abbrechen gedrückt wird im Modal, das Größe Ändern Modal zurücksetzen
function dismissGroesse() {
	document.getElementById('neueGroesse').value = "";
    document.getElementById('submit_saveGroesse').disabled = true;
}

//Wenn auf Abbrechen gedrückt wird im Modal, das Telefon Ändern Modal zurücksetzen
function dismissTel() {
	document.getElementById('neueTel').value = "";
    document.getElementById('submit_saveTel').disabled = true;
}

//Wenn auf Abbrechen gedrückt wird im Modal, das PW Ändern Modal zurücksetzen
function dismissPW() {
	document.getElementById('altesPW').value = "";
	document.getElementById('neuesPW').value = "";
	document.getElementById('neuesPW_2').value = "";
	document.form1.str_neuesPassword.style.backgroundColor = "#fff";
	document.form1.str_neuesPasswordWiederholt.style.backgroundColor = "#fff";
	document.getElementById('submit_change_password').disabled = true;
}
