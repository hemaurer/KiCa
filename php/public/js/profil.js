//Speichern Buttons zum Datenändern ausblenden beim Laden der Seite
$(function(){
    $("#button_saveGroesse").hide();
    $("#button_saveTel").hide();
});





//Das Groesse Feld editierbar machen, um es ändern zu können
function editGroesse() {

			var groesse_value = $('#groesse_value');

	    var text = groesse_value.text();
	    var input = $('<input value="'+text+'" />')
	    groesse_value.text('').append(input);
	    input.select();
	    //geht nicht richtig:
	    $('#button_editGroesse').removeClass('glyphicon glyphicon-pencil').addClass('glyphicon glyphicon-ok');

	    //Wird neben das Textfeld von Groesse geklickt, wird es wieder in statischen Text geändert
	    //Buttons werden dementsprechend wieder angepasst
		input.blur(function() {
	        var text = $(this).val();
	        $(this).parent().text(text);
	        $(this).remove();

	        //geht nicht richtig:
	    	$('#button_editGroesse').removeClass('glyphicon glyphicon-ok').addClass('glyphicon glyphicon-pencil');

			$("#button_editGroesse").hide();
			$("#button_saveGroesse").show();
	    });
}

//Über den Button "Speichern" nach dem Ändern der Größe den neuen Wert in die DB schreiben
function saveGroesse() {

			var groesse_value = $('#groesse_value');

		alert("Größe gespeichert.");

		//Umweg über Variable muss gesetzt werden - das Script funktioniert nicht, wenn der Post Request direkt getätigt wird
		var text = groesse_value.text();

		//Buttons anzeigen / verstecken
		$("#button_editGroesse").show();
		$("#button_saveGroesse").hide();

		//Post Request auf die PHP Funktion im Controller von Profil um die Daten in die DB zu schreiben
		$.post("doChangeGroesse", {"int_groesse": text});
}


function editTel() {

			var tel_value = $('#tel_value');

	    var text = tel_value.text();
	    var input = $('<input value="'+text+'" />')
	    tel_value.text('').append(input);
	    input.select();

 		//geht nicht richtig:
	    $('#button_editTel').removeClass('glyphicon glyphicon-pencil').addClass('glyphicon glyphicon-ok');

	    //Wird neben das Textfeld von Groesse geklickt, wird es wieder in statischen Text geändert
	    //Buttons werden dementsprechend wieder angepasst
		input.blur(function() {
	        var text = $(this).val();
	        $(this).parent().text(text);
	        $(this).remove();

	        //geht nicht richtig:
	    	$('#button_editTel').removeClass('glyphicon glyphicon-ok').addClass('glyphicon glyphicon-pencil');

			$("#button_editTel").hide();
			$("#button_saveTel").show();
	    });
}

//Über den Button "Speichern" nach dem Ändern der Größe den neuen Wert in die DB schreiben
function saveTel() {

			var tel_value = $('#tel_value');

		alert("Telefonnummer gespeichert.");

		//Umweg über Variable muss gesetzt werden - das Script funktioniert nicht, wenn der Post Request direkt getätigt wird
		var text = tel_value.text();

		//Buttons anzeigen / verstecken
		$("#button_editTel").show();
		$("#button_saveTel").hide();

		//Post Request auf die PHP Funktion im Controller von Profil um die Daten in die DB zu schreiben
		$.post("doChangeTel", {"str_tel": text});
}

