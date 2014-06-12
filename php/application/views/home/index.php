<div class="container">

	<!-- Kalender Div - wird mit dem Kalender befüllt -->
    <div id='calendar'>

		<!-- Script zum Generieren des Kalenders beim Laden der Seite -->
		<script type="text/javascript">
			$(document).ready(function() {

				 $('#calendar').fullCalendar({
				 editable: true,
				 eventSources:[

				 	// Kalender mit Events (bzw. Daten) füllen - ausgelesen über controller bzw. model
				 	{events:<?php echo $trainingseinheitenDaten;?>, backgroundColor: '#47A447', borderColor : '#47A447', textColor:'#fff'},
				 	{events:<?php echo $ligaDaten;?>,backgroundColor: '#3276B1', borderColor: '#3276B1'},
				 	{events:<?php echo $turnierDaten;?>,backgroundColor: '#D2322D', borderColor:'#D2322D', textColor:'#fff'},
				 	{events:<?php echo $freundschaftsDaten;?>,backgroundColor: '#ED9C28', borderColor:'#ED9C28', textColor:'#fff'},

					]
				 });

			 });
		</script>

		<br>
			<!-- Legende über die Farben im Kalender -->
			<span class="label label-primary">Liga</span>
			<span class="label label-success">Trainingseinheiten</span>
			<span class="label label-danger">Turnier</span>
			<span class="label label-warning">Freundschaftsspiele</span>
		<br><br>
			<!-- Legende über die Anzeige von (A) und (H) -->
			<span class="label label-default">(H): Heimspiel</span>
			<span class="label label-default">(A): Auswärtsspiel</span>
	</div> <!-- End calender -->
</div> <!-- End container -->