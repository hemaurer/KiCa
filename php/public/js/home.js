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

			 	//Modal zur Anzeige der Details mit den Werten aus dem Post Request befüllen
				if (str_className == "training"){
					//Wenn ein Betreuer eingeloggt ist, einen Bearbeiten-Button zum Modal hinzufügen
					if(b_isBetreuer == 1){
						$('#kalendermodalbody').html('<table class="table"> <thead style="background-color: #ddd; font-weight: bold;"> <tr> <td>'+returnedData.Name+'</td> <td><a href="'+URL+'training/index/'+id+'/"><span class="glyphicon glyphicon-pencil"></span></a></td> </tr> </thead> <tbody><tr> <td><strong>Ort: </strong></td> <td>'+returnedData.Ort+'</td> </tr> <tr> <td><strong>Uhrzeit: </strong></td> <td>'+returnedData.Uhrzeit+'</td> </tr> <tr> <td><strong>Trainer: </strong></td> <td>'+returnedData.Trainer+'</td> </tr> <tr> <td><strong>Trainingsgruppe: </strong></td> <td>'+returnedData.Trainingsgruppe+'</td> </tr> </tbody> </table>');
					}else{
						$('#kalendermodalbody').html('<table class="table"> <thead style="background-color: #ddd; font-weight: bold;"> <tr> <td>'+returnedData.Name+'</td> <td></td> </tr> </thead> <tbody> <tr> <td><strong>Ort: </strong></td> <td>'+returnedData.Ort+'</td> </tr> <tr> <td><strong>Uhrzeit: </strong></td> <td>'+returnedData.Uhrzeit+'</td> </tr> <tr> <td><strong>Trainer: </strong></td> <td>'+returnedData.Trainer+'</td> </tr> <tr> <td><strong>Trainingsgruppe: </strong></td> <td>'+returnedData.Trainingsgruppe+'</td> </tr> </tbody> </table>');
					}
						$('#kalendermodalheader').html('Details zur Trainingseinheit');
				}
			 	//wenn es sich nicht um eine Trainingseinheit handelt, ist es ein Spiel
				else{
					if(b_isBetreuer == 1){
					//Wenn ein Betreuer eingeloggt ist, einen Bearbeiten-Button zum Modal hinzufügen
						$('#kalendermodalbody').html('<table class="table"> <thead style="background-color: #ddd; font-weight: bold;"> <tr> <td>'+returnedData.Turnier+'</td> <td></td> <td><a href="'+URL+'spiel/index/'+id+'/"><span class="glyphicon glyphicon-pencil"></span></a></td> </tr> </thead> <tbody> <tr> <td>'+returnedData.Heim+'</td> <td><strong>'+Tore+'</strong></td> <td>'+returnedData.Auswaerts+'</td> </tr> <tr> <td>'+returnedData.Uhrzeit+'</td> <td></td> <td>'+returnedData.Ort+'</td> </tr> </tbody> </table>');
					}else{
						$('#kalendermodalbody').html('<table class="table"> <thead style="background-color: #ddd; font-weight: bold;"> <tr> <td>'+returnedData.Turnier+'</td> <td></td> <td></td> </tr> </thead> <tbody> <tr> <td>'+returnedData.Heim+'</td> <td><strong>'+Tore+'</strong></td> <td>'+returnedData.Auswaerts+'</td> </tr> <tr> <td>'+returnedData.Uhrzeit+'</td> <td></td> <td>'+returnedData.Ort+'</td> </tr> </tbody> </table>');
					}
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
		$('#calendar').fullCalendar( 'addEventSource', {events:trainingseinheitenDaten, backgroundColor: '#5cb85c', borderColor : '#5cb85c', textColor:'#fff', str_className:'training'} );
		$('#calendar').fullCalendar( 'addEventSource', {events:trainerDaten, backgroundColor: '#5cb85c', borderColor : '#5cb85c', textColor:'#fff', str_className:'training'} );
		$('#calendar').fullCalendar( 'addEventSource', {events:ligaDaten,backgroundColor: '#428bca', borderColor: '#428bca', textColor:'#fff', str_className:'liga'} );
		$('#calendar').fullCalendar( 'addEventSource', {events:turnierDaten,backgroundColor: '#d9534f', borderColor:'#d9534f', textColor:'#fff', str_className:'turnier'});
		$('#calendar').fullCalendar( 'addEventSource', {events:freundschaftsDaten,backgroundColor: '#f0ad4e', borderColor:'#f0ad4e', textColor:'#fff', str_className:'freundschaft'});

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