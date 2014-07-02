//Wird aufgerufen, wenn auf ein Event im HomeKalender geklickt wird
//öffnet ein Modal und befüllt es über einen Ajax Request mit den passenden Daten aus der DB
function kalenderModal(str_className, id, URL, b_isBetreuer){

	//str_className von Array in String umwandeln
	//beinhaltet die Art des Events von Fullcalender (z.B: Trainingseinheiten, Liga etc.)
	str_className = str_className.toString();
	//str_className formatieren, dass nur eine Variable genutzt werden muss
	str_prefix = str_className.substring(0, 1).toUpperCase() + str_className.substring(1);

		//Ajax Request auf Home Controller getKalenderDetails()
		$.post("getKalenderDetails/", {"className": str_className, "id": id})
			.done(function( data ) {
				//Rückgabearray als JSON transformieren
			 	var returnedData = JSON.parse(data);

			 	//Prüfen, ob das Spiel in der Vergangenheit liegt, um Tore anzuzeigen
			 	//Ist es in der Zukunft (noch keine Tore) wird statt den Toren "vs." angezeigt
			 	var Tore = "vs.";
			 	if (returnedData.Heimtore != null){
			 		Tore = "" + returnedData.Heimtore + " : " + returnedData.Auswaertstore;
			 	}

			 	//bei Turnierspielen den Status (z.B. Achtelfinale) zur Anzeige hinzufügen
			 	if(returnedData.Status != "Freundschaftsspiel" && returnedData.Status != "Liga"){
			 		returnedData.Turnier = returnedData.Turnier + " - " + returnedData.Status;
			 	}

			 	//Zeit formatieren
			 	var t = returnedData.Uhrzeit.split(/[- :]/);
			 	returnedData.Uhrzeit = "" + t[2] + "." + t[1] + "." + t[0] + " - " + t[3] + ":" + t[4] + " Uhr";

				//Wenn ein Betreuer eingeloggt ist, einen Bearbeiten-Button zum Modal hinzufügen
				//Variablen für die Bearbeitenbuttons definieren
				var str_bearbeiten_button_training = "";
				var str_bearbeiten_button_spiel = "";

				// Buttons aktivieren
				if(b_isBetreuer == 1){
					str_bearbeiten_button_training = '<a href="'+URL+'training/index/'+id+'/"><span class="glyphicon glyphicon-pencil"></span></a>';
					str_bearbeiten_button_spiel = '<a href="'+URL+'spiel/index/'+id+'/"><span class="glyphicon glyphicon-pencil"></span></a>';
				}

			 	//Modal zur Anzeige der Details mit den Werten aus dem Post Request befüllen
				if (str_className == "training"){
					$('#kalendermodalbody').html('<table class="table"> <thead style="background-color: #ddd; font-weight: bold;"> <tr> <td>'+returnedData.Name+'</td> <td align="right">'+str_bearbeiten_button_training+'</td> </tr> </thead> <tbody> <tr> <td><strong>Ort: </strong></td> <td>'+returnedData.Ort+'</td> </tr> <tr> <td><strong>Uhrzeit: </strong></td> <td>'+returnedData.Uhrzeit+'</td> </tr> <tr> <td><strong>Trainer: </strong></td> <td>'+returnedData.Trainer+'</td> </tr> <tr> <td><strong>Trainingsgruppe: </strong></td> <td>'+returnedData.Trainingsgruppe+'</td> </tr> </tbody> </table>');
					$('#kalendermodalheader').html('Details zur Trainingseinheit');
				}
			 	//wenn es sich nicht um eine Trainingseinheit handelt, ist es ein Spiel
				else{
					$('#kalendermodalbody').html('<table class="table"> <thead style="background-color: #ddd; font-weight: bold;"> <tr> <td> '+returnedData.Turnier+'</td> <td colspan="2" align="right"> '+str_bearbeiten_button_spiel+'</td> </tr> </thead> <tbody> <tr> <td width="45%"> '+returnedData.Heim+'</td> <td width="10%" align="center"> <strong>'+Tore+'</strong> </td> <td width="45%" align="right"> '+returnedData.Auswaerts+'</td> </tr> <tr> <td> '+returnedData.Uhrzeit+'</td> <td></td> <td align="right"> '+returnedData.Ort+'</td> </tr> </tbody> </table>');
					$('#kalendermodalheader').html('Details zum '+str_prefix+'spiel');
				}

				//Modal anzeigen
			 	$('#kalenderModal').modal('toggle');
			});
}

//Befüllt den Kalender neu, wenn auf der Home Seite eine andere str_sparte ausgewählt wird
function fillSparte(sparte_id, str_sparte){

	//value vom Button wird über den Ajax Request mit fillSparte() an den Controller übergeben
	//hierdurch wird festgestellt, ob alle Trainings oder nur die eigenen geladen werden sollen,
	//je nachdem, was gerade ausgewählt ist
	var eigeneTrainings = $('#chkbox_eigeneTrainings').val();

	//Ajax Request auf Home Controller getKalenderDaten()
	$.post("getKalenderDaten/", {"sparte_id": sparte_id, "eigeneTrainings": eigeneTrainings})
	.done(function( data ) {

		//Da eine Zeichenkette zurückgegeben wird, die einzelnen Rückgaben auftrennen und in Arrays verpacken
		var return_array = data.split('|');

		var trainingseinheitenDaten = JSON.parse(return_array[0]);
		var trainerDaten = JSON.parse(return_array[1]);
		var ligaDaten = JSON.parse(return_array[2]);
		var turnierDaten = JSON.parse(return_array[3]);
		var freundschaftsDaten = JSON.parse(return_array[4]);

		//Kalender neu befüllen mit den Rückgabewerten
		$('#calendar').fullCalendar( 'removeEvents');
		$('#calendar').fullCalendar( 'addEventSource', {events:trainingseinheitenDaten, backgroundColor: '#5cb85c', borderColor : '#5cb85c', textColor:'#fff', className:'training'} );
		$('#calendar').fullCalendar( 'addEventSource', {events:trainerDaten, backgroundColor: '#5cb85c', borderColor : '#5cb85c', textColor:'#fff', className:'training'} );
		$('#calendar').fullCalendar( 'addEventSource', {events:ligaDaten,backgroundColor: '#428bca', borderColor: '#428bca', textColor:'#fff', className:'liga'} );
		$('#calendar').fullCalendar( 'addEventSource', {events:turnierDaten,backgroundColor: '#d9534f', borderColor:'#d9534f', textColor:'#fff', className:'turnier'});
		$('#calendar').fullCalendar( 'addEventSource', {events:freundschaftsDaten,backgroundColor: '#f0ad4e', borderColor:'#f0ad4e', textColor:'#fff', className:'freundschaft'});

		//Den Text des Dropdown Menüs auf die ausgewählte str_sparte setzen
		$('.spartenDropdownName').html(str_sparte);
		$('.spartenDropdownName').val(sparte_id);

		//Text der Überschrift auf die str_sparte anpassen ("Kalender der ...")
		$('#home_kalenderSparte').html(str_sparte);

	});
}

//Wechselt zwischen eigenen Trainings und allen Trainings, wenn der Benutzer eingeloggt ist
function changeAnzeigeTrainingseinheiten(){

	//den Text des Buttons ändern, sobald auf ihn geklickt wird
	//value vom Button wird über den Ajax Request mit fillSparte() an den Controller übergeben
	//hierdurch wird festgestellt, ob alle Trainings oder nur die eigenen geladen werden sollen
	if ($('#chkbox_eigeneTrainings').val() == "ja"){
		$('#chkbox_eigeneTrainings').val("nein");
	}
	else{
		$('#chkbox_eigeneTrainings').val("ja");
	}

	//um die Trainings neu zu laden wird fillSparte() aufgerufen
	//dies benötigt 2 Parameter, die zuvor ausgelesen werden müssen
	var sparte_id = $('.spartenDropdownName').val();
	var str_sparte = $('.spartenDropdownName').html();

	//fillSparte aufrufen, um den Kalender neu zu befüllen
	fillSparte(sparte_id, str_sparte);

}