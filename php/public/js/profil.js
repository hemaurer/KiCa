// Page Onload
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
		 			// Sucess Modal anzeigen und Seite neuladen
					$('#successModal_dialog').html('<div class="alert alert-success"><strong>Erfolgreich!</strong> Bild erfolgreich zurückgesetzt!</div>');
					$('#successModal').modal('toggle');
					window.setTimeout(function(){location.reload();},2000);
			});
}

//prüft, ob im Modal der Passwortänderung etwas als altes Passwort eingegeben wurde
function checkPassword_alt(){

	var str_altesPasswort = document.form1.str_altesPassword.value;

	if (str_altesPasswort != ""){
		// Wenn das Textfeld NICHT leer ist, Fehlermeldung zurücksetzen
		inputColoration("reset", "altesPW");
		//die restlichen Felder des neuen Passworts prüfen
		checkPassword_neu();
	}
	else{
		// Wenn das Textfeld leer ist, Input Feld mit Fehlermeldung versehen und Button disablen
		inputColoration("error", "altesPW");
		document.getElementById('submit_change_password').disabled = true;
	}
}

//prüft, ob das eingegebene Passwort bei einer Passwortänderung korrekt wiederholt wurde
function checkPassword_neu() {

	var str_neuesPasswort = document.form1.str_neuesPassword.value;
	var str_neuesPasswortWiederholt = document.form1.str_neuesPasswordWiederholt.value;

	// Prüfen, ob die beiden Passwörter NICHT leer sind
	if(str_neuesPasswortWiederholt != "" && str_neuesPasswort != ""){
		// dann prüfen ob die beiden Passwörter unterschiedlich sind
		if(str_neuesPasswort != str_neuesPasswortWiederholt){
			// in diesem Fall Fehlermeldungen anzeigen und Button disablen
			inputColoration("error", "neuesPW");
			inputColoration("error", "neuesPW_2");
			document.getElementById('submit_change_password').disabled = true;
		}else{
			// Ansonsten Fehlermeldungen entfernen und Button aktivieren
			inputColoration("reset", "neuesPW");
			inputColoration("reset", "neuesPW_2");
			document.getElementById('submit_change_password').disabled = false;
		}
	}
	else{
		// Wenn ein Feld leer ist, Button disablen
		document.getElementById('submit_change_password').disabled = true;
	}
}

//prüft, ob eine Größe eingegeben wurde und ob der Wert annehmbar ist
function checkGroesse(){

	 var int_groesse = document.getElementById('neueGroesse').value

	 // Prüfen auf Nummer, die zwischen 1 und 250 ist
	 if (!isNaN(int_groesse) && int_groesse > 0 && int_groesse < 251 && int_groesse != ""){
	 	// Wenn ja, Fehlermeldung zurücksetzen, Button aktivieren
	 	inputColoration("reset", "neueGroesse");
	 	document.getElementById('submit_saveGroesse').disabled = false;
	 }
	 else{
	 	// Wenn nein, Fehlermeldung anzeigen und Button disablen
	 	inputColoration("error", "neueGroesse");
	 	document.getElementById('submit_saveGroesse').disabled = true;
	 }
}

//prüft, ob eine Größe eingegeben wurde und ob der Wert annehmbar ist
function checkTel(){

	 var int_tel = document.getElementById('neueTel').value

	 // Prüfen, ob es eine Nummer ist zwischen 1 und 999999999999999
	 if (!isNaN(int_tel) && int_tel > 0 && int_tel < 999999999999999 && int_tel != ""){
	 	// Wenn ja, Fehlermeldung zurücksetzen, Button aktivieren
	 	inputColoration("reset", "neueTel");
	 	document.getElementById('submit_saveTel').disabled = false;
	 }
	 else{
	 	// Wenn nein, Fehlermeldung anzeigen und Button disablen
	 	inputColoration("error", "neueTel");
	 	document.getElementById('submit_saveTel').disabled = true;
	 }

}

//Über den Button "Ändern" des Modals der Größe, um den neuen Wert in die DB schreiben
function saveGroesse() {

		//Umweg über Variable muss gesetzt werden - das Script funktioniert nicht, wenn der Post Request direkt getätigt wird
		var groesse_value = $('#neueGroesse');
		var int_groesse = groesse_value.val();

		//Post Request auf die PHP Funktion im Controller von Profil um die Daten in die DB zu schreiben
		$.post("doChangeGroesse/", {"int_groesse": int_groesse})
			 .done(function( data ) {
			 	if (data == 1){
			 			// Wenn erfolgreich, Sucess Modal anzeigen und Seite neuladen
						$('#successModal_dialog').html('<div class="alert alert-success"><strong>Erfolgreich!</strong> Größe erfolgreich geändert!</div>');
						$('#successModal').modal('toggle');
						window.setTimeout(function(){location.reload();},2000);
					}
					else{
						// Wenn NICHT erfolgreich, Sucess Modal anzeigen und Seite neuladen
						$('#successModal_dialog').html('<div class="alert alert-danger"><strong>Fehler!</strong> Es ist ein Fehler aufgetreten!</div>');
						$('#successModal').modal('toggle');
						window.setTimeout(function(){location.reload();},2000);
					}
				});
}

//Über den Button "Ändern" des Modals der Telefonnummer, um den neuen Wert in die DB schreiben
function saveTel() {

		//Umweg über Variable muss gesetzt werden - das Script funktioniert nicht, wenn der Post Request direkt getätigt wird
		var tel_value = $('#neueTel');
		var int_tel = tel_value.val();

		//Post Request auf die PHP Funktion im Controller von Profil um die Daten in die DB zu schreiben
		$.post("doChangeTel/", {"str_tel": int_tel})
			 .done(function( data ) {
			 	if (data == 1){
			 			// Wenn erfolgreich, Sucess Modal anzeigen und Seite neuladen
						$('#successModal_dialog').html('<div class="alert alert-success"><strong>Erfolgreich!</strong> Telefonnummer erfolgreich geändert!</div>');
			 			$('#successModal').modal('toggle');
						window.setTimeout(function(){location.reload();},2000);
					}
					else{
						// Wenn NICHT erfolgreich, Sucess Modal anzeigen und Seite neuladen
						$('#successModal_dialog').html('<div class="alert alert-danger"><strong>Fehler!</strong> Es ist ein Fehler aufgetreten!</div>');
						$('#successModal').modal('toggle');
						window.setTimeout(function(){location.reload();},2000);
					}
				});
}

//Über den Button "Ändern" des Modals des Passworts, um den neuen Wert in die DB schreiben
function savePassword() {

		//Umweg über Variable muss gesetzt werden - das Script funktioniert nicht, wenn der Post Request direkt getätigt wird
		var pw_value_1 = $('#altesPW');
		var pw_value_2 = $('#neuesPW');
		var pw_value_3 = $('#neuesPW_2');
		var str_pw_alt = pw_value_1.val();
		var str_pw_neu = pw_value_2.val();
		var str_pw_neu_2 = pw_value_3.val();

		//Post Request auf die PHP Funktion im Controller von Profil um die Daten in die DB zu schreiben
		$.post("doChangePassword/", {"str_altesPassword": str_pw_alt, "str_neuesPassword": str_pw_neu, "str_neuesPasswordWiederholt": str_pw_neu_2})
			 .done(function( data ) {
			 	if (data == 1){
			 			// Wenn erfolgreich, Sucess Modal anzeigen und Seite neuladen
			 			$('#successModal_dialog').html('<div class="alert alert-success"><strong>Erfolgreich!</strong> Passwort erfolgreich geändert!</div>');
			 			$('#successModal').modal('toggle');
						window.setTimeout(function(){location.reload();},2000);
					}
					else{
						// Wenn NICHT erfolgreich, Sucess Modal anzeigen und Seite neuladen
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
