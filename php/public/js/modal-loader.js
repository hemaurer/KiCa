


function toggleModal(modal_id, type, x_id, x_name){
	if (modal_id == 1){ //ID für Add
		
	}else if (modal_id == 2){ //ID für Bearbeiten
		if (type == 'person'){
			$('#personmodalheader').html('Person "'+x_name+'" bearbeiten');
			$('#personmodalbody').html('<div class="form-horizontal"><div class="form-group"><label class="control-label col-md-4">Nachname</label><div class="col-md-6"><input class="form-control" type="text" id="str_nachname" value="" placeholder="Nachname" /></div></div><div class="form-group"><label class="control-label col-md-4">Vorname</label><div class="col-md-6"><input class="form-control" type="text" id="str_vorname" value="" placeholder="Vorname" /></div></div><div class="form-group"><label class="control-label col-md-4">Geburtsdatum</label><div class="col-md-6"><div class="sandbox-container input-group "><input class="form-control" id="d_date" type="text"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span></div></div><script> $(\'.sandbox-container input\').datepicker();</script></div><div class="form-group"><label class="control-label col-md-4">Groesse</label><div class="col-md-6"><input class="form-control" id="int_groesse" value="" placeholder="Beispiel 158cm" /></div></div><div class="form-group"><label class="control-label col-md-4">Betreuer?</label><div class="col-md-6"><select class="form-control" id="b_betreuer" size="1" ><option></option><option value="0">Nein</option><option value="1">Ja</option></select></div></div><div class="form-group"><label class="control-label col-md-4">Telefonnummer</label><div class="col-md-6"><input class="form-control" type="number" id="int_tel" value="" placeholder="Telefonnummer" /></div></div></div>');
			$('#personmodalfooter').html('<div class="pwresbtn"><a type="submit" class="btn btn-danger" data-dismiss="modal" onclick="passwordModal(\'reset_password\',\''+x_id+'\',\''+x_name+'\')">Passwort zurücksetzen</a></div><div class="footerbtn"><button type="button" class="btn btn-default" data-dismiss="modal">Abbrechen</button> <a type="submit"  class="btn btn-primary" data-dismiss="modal" onclick="editSuccess(\''+type+'\',\''+x_id+'\')">Speichern</a></div>');
		}
		if (type == 'spiel'){
			
			$('#spielmodalheader').html('Spiel "'+x_name+'" bearbeiten');
			$('#spielmodalfooter').html('<button type="button" class="btn btn-default" data-dismiss="modal">Abbrechen</button> <a type="submit" class="btn btn-primary" data-dismiss="modal" onclick="editSuccess(\''+type+'\',\''+x_id+'\')">Speichern</a>');
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
function passwordModal(type, x_id, x_name) {
		$('#modalheader').html("Passwort zurücksetzen bestätigen");
		$('#modalbody').html('Wollen Sie das Passwort von "'+x_name+'" wirklich zurücksetzen?');
		$('#modalfooter').html('<button type="button" class="btn btn-default" data-dismiss="modal">Abbrechen</button> <a type="submit" class="btn btn-primary" data-dismiss="modal" onclick="editSuccess(\''+type+'\',\''+x_id+'\')">Passwort zurücksetzen</a>');
		
	
	

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
						window.setTimeout(function(){location.reload();},2000);
					}
					else{
						$('#successModal_dialog').html('<div class="alert alert-danger"><strong>Fehler!</strong> Es ist ein Fehler aufgetreten!</div>');
						$('#successModal').modal('toggle');
						window.setTimeout(function(){location.reload();},2000);
					}
				}
			);
	}
	
	if (type == "reset_password"){	
		$.post("reset_password",{"p_id": x_id})
		.done(function( data ) {
			if (data == 1){
					$('#successModal_dialog').html('<div class="alert alert-success"><strong>Erfolgreich!</strong> Passwort erfolgreich zurückgesetzt!</div>');
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
	
	if (type == "spiel"){
		/*var str_name_in = $('#str_name');
		var str_name = str_name_in.val();
		var int_liga_in = $('#int_liga');
		var int_liga = int_liga_in.val();
		$.post("edit_"+type+"",{"tu_id":x_id, "str_name":str_name, "int_liga":int_liga})
			.done(function( data ) {
			 	if (data == 1){
			 			$('#successModal_dialog').html('<div class="alert alert-success"><strong>Erfolgreich!</strong> Turnier erfolgreich bearbeitet!</div>');
						$('#successModal').modal('toggle');
						window.setTimeout(function(){location.reload();},2000);
					}
					else{
						$('#successModal_dialog').html('<div class="alert alert-danger"><strong>Fehler!</strong> Es ist ein Fehler aufgetreten!</div>');
						$('#successModal').modal('toggle');
						window.setTimeout(function(){location.reload();},2000);
					}
				}
			);*/
	
	}
	
	
	
	
	if (type == "turnier"){
		var str_name_in = $('#str_name');
		var str_name = str_name_in.val();
		var int_liga_in = $('#int_liga');
		var int_liga = int_liga_in.val();
		$.post("edit_"+type+"",{"tu_id":x_id, "str_name":str_name, "int_liga":int_liga})
			.done(function( data ) {
			 	if (data == 1){
			 			$('#successModal_dialog').html('<div class="alert alert-success"><strong>Erfolgreich!</strong> Turnier erfolgreich bearbeitet!</div>');
						$('#successModal').modal('toggle');
						window.setTimeout(function(){location.reload();},2000);
					}
					else{
						$('#successModal_dialog').html('<div class="alert alert-danger"><strong>Fehler!</strong> Es ist ein Fehler aufgetreten!</div>');
						$('#successModal').modal('toggle');
						window.setTimeout(function(){location.reload();},2000);
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
						window.setTimeout(function(){location.reload();},2000);
					}
					else{
						$('#successModal_dialog').html('<div class="alert alert-danger"><strong>Fehler!</strong> Es ist ein Fehler aufgetreten!</div>');
						$('#successModal').modal('toggle');
						window.setTimeout(function(){location.reload();},2000);
					}
				});
		
}
