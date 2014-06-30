$(function(){

    //Buttons disablen (beim Laden der Seite)
    //werden durch Funktionen auf Inhalt geprüft und danach wieder enabled
    document.getElementById('submit_change_password').disabled = true;
    document.getElementById('submit_saveTel').disabled = true;
    document.getElementById('submit_saveGroesse').disabled = true;
});


//Über den Button Bild zurücksetzen des Modals bei Bild ändern
//um das Profilbild auf das Standardbild zurückzusetzen
function resetProfilbild() {

	//Post Request auf die PHP Funktion im Controller von Profil um die Daten in die DB zu schreiben
	$.post("doChangeProfilbild/", {"resetProfilbild": "1"})
		 .done(function( data ) {
					$('#successModal_dialog').html('<div class="alert alert-success"><strong>Erfolgreich!</strong> Bild erfolgreich zurückgesetzt!</div>');
					$('#successModal').modal('toggle');
					window.setTimeout(function(){location.reload();},2000);
			});
}

//prüft, ob im Modal der Passwortänderung etwas als altes Passwort eingegeben wurde
function checkPassword_alt(){
	var str_altesPasswort = document.form1.str_altesPassword.value;

	if (str_altesPasswort != ""){
		inputColoration("reset", "altesPW");
		//die restlichen Felder des neuen Passworts prüfen
		checkPassword_neu();
	}
	else{
		inputColoration("error", "altesPW");
		document.getElementById('submit_change_password').disabled = true;

	}
}

//prüft, ob das eingegebene Passwort bei einer Passwortänderung korrekt wiederholt wurde
function checkPassword_neu() {
	var str_neuesPasswort = document.form1.str_neuesPassword.value;
	var str_neuesPasswortWiederholt = document.form1.str_neuesPasswordWiederholt.value;

	if(str_neuesPasswortWiederholt != "" && str_neuesPasswort != ""){
		if(str_neuesPasswort != str_neuesPasswortWiederholt){
			inputColoration("error", "neuesPW");
			inputColoration("error", "neuesPW_2");
			document.getElementById('submit_change_password').disabled = true;
		}else{
			inputColoration("reset", "neuesPW");
			inputColoration("reset", "neuesPW_2");
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
	 	 inputColoration("reset", "neueGroesse");
	 }
	 else{
	 	 document.getElementById('submit_saveGroesse').disabled = true;
	 	 inputColoration("error", "neueGroesse");
	 }

}

//prüft, ob eine Größe eingegeben wurde und ob der Wert annehmbar ist
function checkTel(){

	 var tel = document.getElementById('neueTel').value

	 if (!isNaN(tel) && tel > 0 && tel < 999999999999999 && tel != ""){
	 	 document.getElementById('submit_saveTel').disabled = false;
	 	 inputColoration("reset", "neueTel");
	 }
	 else{
	 	 document.getElementById('submit_saveTel').disabled = true;
	 	 inputColoration("error", "neueTel");
	 }

}

//Über den Button "Ändern" des Modals der Größe, um den neuen Wert in die DB schreiben
function saveGroesse() {

		var groesse_value = $('#neueGroesse');

		//Umweg über Variable muss gesetzt werden - das Script funktioniert nicht, wenn der Post Request direkt getätigt wird
		var groesse = groesse_value.val();

		//Post Request auf die PHP Funktion im Controller von Profil um die Daten in die DB zu schreiben
		// $.post("doChangeGroesse", {"int_groesse": groesse});
		$.post("doChangeGroesse/", {"int_groesse": groesse})
			 .done(function( data ) {
			 	if (data == 1){
			 			/*$('#successModal_head').html("Erfolgreich");
			 			$('#successModal_body').html("Größe erfolgreich geändert!");
			 			$('#successModal').modal('toggle');*/

						$('#successModal_dialog').html('<div class="alert alert-success"><strong>Erfolgreich!</strong> Größe erfolgreich geändert!</div>');
						$('#successModal').modal('toggle');
						window.setTimeout(function(){location.reload();},2000);
					}
					else{
						/*$('#successModal_head').html("Fehler");
			 			$('#successModal_body').html("Größe konnte nicht geändert werden!");
						$('#successModal').modal('toggle');*/

						$('#successModal_dialog').html('<div class="alert alert-danger"><strong>Fehler!</strong> Es ist ein Fehler aufgetreten!</div>');
						$('#successModal').modal('toggle');
						window.setTimeout(function(){location.reload();},2000);
					}
				});
}

//Über den Button "Ändern" des Modals der Telefonnummer, um den neuen Wert in die DB schreiben
function saveTel() {

		var tel_value = $('#neueTel');

		//Umweg über Variable muss gesetzt werden - das Script funktioniert nicht, wenn der Post Request direkt getätigt wird
		var tel = tel_value.val();

		//Post Request auf die PHP Funktion im Controller von Profil um die Daten in die DB zu schreiben
		$.post("doChangeTel/", {"str_tel": tel})
			 .done(function( data ) {
			 	if (data == 1){
			 			/*$('#successModal_head').html("Erfolgreich");
			 			$('#successModal_body').html("Telefonnummer erfolgreich geändert!");*/
						$('#successModal_dialog').html('<div class="alert alert-success"><strong>Erfolgreich!</strong> Telefonnummer erfolgreich geändert!</div>');
			 			$('#successModal').modal('toggle');
						window.setTimeout(function(){location.reload();},2000);
					}
					else{
						$('#successModal_dialog').html('<div class="alert alert-danger"><strong>Fehler!</strong> Es ist ein Fehler aufgetreten!</div>');
						$('#successModal').modal('toggle');
						window.setTimeout(function(){location.reload();},2000);
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
		$.post("doChangePassword/", {"str_altesPassword": pw_alt, "str_neuesPassword": pw_neu, "str_neuesPasswordWiederholt": pw_neu_2})
			 .done(function( data ) {
			 	if (data == 1){
			 			$('#successModal_dialog').html('<div class="alert alert-success"><strong>Erfolgreich!</strong> Passwort erfolgreich geändert!</div>');
			 			$('#successModal').modal('toggle');
						window.setTimeout(function(){location.reload();},2000);
					}
					else{
						$('#successModal_dialog').html('<div class="alert alert-danger"><strong>Fehler!</strong> Es ist ein Fehler aufgetreten!</div>');
						$('#successModal').modal('toggle');
						window.setTimeout(function(){location.reload();},2000);
					}
				});

}


//Wenn auf Abbrechen gedrückt wird im Modal, das Größe Ändern Modal zurücksetzen
function dismissGroesse() {
	inputColoration("reset", "neueGroesse");
	document.getElementById('neueGroesse').value = "";
    document.getElementById('submit_saveGroesse').disabled = true;
}

//Wenn auf Abbrechen gedrückt wird im Modal, das Telefon Ändern Modal zurücksetzen
function dismissTel() {
	inputColoration("reset", "neueTel");
	document.getElementById('neueTel').value = "";
    document.getElementById('submit_saveTel').disabled = true;
}

//Wenn auf Abbrechen gedrückt wird im Modal, das PW Ändern Modal zurücksetzen
function dismissPW() {
	document.getElementById('altesPW').value = "";
	document.getElementById('neuesPW').value = "";
	document.getElementById('neuesPW_2').value = "";
	inputColoration("reset", "altesPW");
	inputColoration("reset", "neuesPW");
	inputColoration("reset", "neuesPW_2");
	document.getElementById('submit_change_password').disabled = true;
}
