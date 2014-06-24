//Wird aufgerufen, wenn auf ein Event im HomeKalender geklickt wird
//öffnet ein Modal und befüllt es über einen Ajax Request mit den passenden Daten aus der DB
function kalenderModal(className, id, URL, isBetreuer){

	//className von Array in String umwandeln
	className = className.toString();
	//className formatieren, dass nur eine Variable genutzt werden muss
	str_prefix = className.substring(0, 1).toUpperCase() + className.substring(1);

		//Ajax Request auf Home Controller getKalenderDetails()
		$.post("getKalenderDetails/", {"className": className, "id": id})
			.done(function( data ) {
				//Rückgabearray als JSON transformieren
			 	var returnedData = JSON.parse(data);

			 	//Prüfen, ob das Spiel in der Vergangenheit liegt, um Tore anzuzeigen
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
				if (className == "training"){
					if(isBetreuer == 1){
						$('#kalendermodalbody').html('<table class="table"> <thead style="background-color: #ddd; font-weight: bold;"> <tr> <td>'+returnedData.Name+'</td> <td><a href="'+URL+'training/index/'+id+'/"><span class="glyphicon glyphicon-pencil"></span></a></td> </tr> </thead> <tbody><tr> <td><strong>Ort: </strong></td> <td>'+returnedData.Ort+'</td> </tr> <tr> <td><strong>Uhrzeit: </strong></td> <td>'+returnedData.Uhrzeit+'</td> </tr> <tr> <td><strong>Trainer: </strong></td> <td>'+returnedData.Trainer+'</td> </tr> <tr> <td><strong>Trainingsgruppe: </strong></td> <td>'+returnedData.Trainingsgruppe+'</td> </tr> </tbody> </table>');
					}else{
						$('#kalendermodalbody').html('<table class="table"> <thead style="background-color: #ddd; font-weight: bold;"> <tr> <td>'+returnedData.Name+'</td> <td></td> </tr> </thead> <tbody> <tr> <td><strong>Ort: </strong></td> <td>'+returnedData.Ort+'</td> </tr> <tr> <td><strong>Uhrzeit: </strong></td> <td>'+returnedData.Uhrzeit+'</td> </tr> <tr> <td><strong>Trainer: </strong></td> <td>'+returnedData.Trainer+'</td> </tr> <tr> <td><strong>Trainingsgruppe: </strong></td> <td>'+returnedData.Trainingsgruppe+'</td> </tr> </tbody> </table>');
					}
						$('#kalendermodalheader').html('Details zur Trainingseinheit');
				}
			 	//wenn es sich nicht um eine Trainingseinheit handelt, ist es ein Spiel
				else{
					if(isBetreuer == 1){
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

//Befüllt den Kalender neu, wenn auf der Home Seite eine andere Sparte ausgewählt wird
function fillSparte(sparte_id, sparte){

	//Ajax Request auf Home Controller getKalenderDaten()
	$.post("getKalenderDaten/", {"sparte_id": sparte_id})
	.done(function( data ) {

		//Da eine Zeichenkette zurückgegeben wird, die einzelnen Rückgaben auftrennen und in Arrays verpacken
		var return_array = data.split('|');

		var trainingseinheitenDaten = JSON.parse(return_array[0]);
		var ligadaten = JSON.parse(return_array[1]);
		var turnierdaten = JSON.parse(return_array[2]);
		var freundschaftsdaten = JSON.parse(return_array[3]);

		//Kalender neu befüllen mit den Rückgabewerten
		$('#calendar').fullCalendar( 'removeEvents');
		$('#calendar').fullCalendar( 'addEventSource', {events:trainingseinheitenDaten, backgroundColor: '#47A447', borderColor : '#47A447', textColor:'#fff', className:'training'} );
		$('#calendar').fullCalendar( 'addEventSource', {events:ligadaten,backgroundColor: '#3276B1', borderColor: '#3276B1', textColor:'#fff', className:'liga'} );
		$('#calendar').fullCalendar( 'addEventSource', {events:turnierdaten,backgroundColor: '#D2322D', borderColor:'#D2322D', textColor:'#fff', className:'turnier'});
		$('#calendar').fullCalendar( 'addEventSource', {events:freundschaftsdaten,backgroundColor: '#ED9C28', borderColor:'#ED9C28', textColor:'#fff', className:'freundschaft'});

		//Den Text des Dropdown Menüs auf die ausgewählte Sparte setzen
		$('.spartenDropdownName').html(sparte);

	});
}