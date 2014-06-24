<!-- CSS  -->
<link href="<?php echo URL; ?>public/css/fullcalendar.css" rel="stylesheet">

<!-- JS -->
<script type="text/javascript" src="<?php echo URL; ?>public/js/moment.min.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>public/js/fullcalendar.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>public/js/de.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>public/js/home.js"></script>

<div class="container">

	<div id="spartenText" value="test">
		<h3>Kalender der <?php echo $spartenDaten[0]->Sparte; ?></h3>
	</div>

	<!-- Dropdown zur Spartenauswahl -->
	<div id="spartenButton">
		<div class="btn-group">
			 <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
			    <span class="spartenDropdownName" value=""> <?php echo $spartenDaten[0]->Sparte; ?> </span> <span class="caret"></span>
	 		 </button>
				 <ul class="dropdown-menu" role="menu">
	          		<?php
						// Sparten aus der DB laden und in der Liste anzeigen
						// Model wird bereits in header.php angesprochen, deshalb muss nur noch ausgelesen werden
						foreach ($spartenDaten as $sparte) { ?>
								<li role="presentation" ><a href="#" onclick="fillSparte(<?php echo $sparte->ID; echo','; echo '\'';echo $sparte->Sparte; echo'\''; ?>)" role="menuitem" tabindex="-1" ><?php if (isset($sparte->Sparte)) echo $sparte->Sparte; ?></a></li>
					<?php } ?>
		        </ul>
		</div> <!-- End class="btn-group"> -->

		<?php
			//Button anzeigen, wenn ein User eingeloggt ist
			//zur Wechseln der Anzeige von allen Trainingseinheiten und den eigenen Trainings
			if (isset($_SESSION['user_login_status'])){
		?>
			<div class="btn-group">
			  <button id="btn_alleTrainings" type="button" class="btn btn-default" value="alle" onclick="changeAnzeigeTrainingseinheiten()">alle Trainingseinheiten anzeigen</button>
			</div>
		<?php
			}
		?>
	</div> <!-- End id="spartenButton" -->



	<!-- Kalender Div - wird mit dem JQueryKalender befüllt -->
    <div id='calendar'>

		<!-- Script zum Generieren des Kalenders beim Laden der Seite -->
		<script type="text/javascript">
			//beim Laden der Seite den Fullcalender laden
			$(document).ready(function() {

				//Muss injiziert werden, dass die PHP Variable ohne JS Injizierung nicht ausgelesen werden kann
				$('.spartenDropdownName').val("<?php echo $spartenDaten[0]->ID; ?>");

				//Fullcalendar
				$('#calendar').fullCalendar({

			 		//die einzelnen Events aus der Datenbank, bzw. den Variablen dem Kalender hinzufügen
					eventSources:[

					 	// Kalender mit Events (bzw. Daten) füllen - ausgelesen über controller bzw. model
					 	// className wird zur Unterscheidung von Trainingseinheit / Spiel genutzt
					 	{events:<?php echo $trainingseinheitenDaten;?>, backgroundColor: '#47A447', borderColor : '#47A447', textColor:'#fff', className:'training'},
					 	{events:<?php echo $ligaDaten;?>,backgroundColor: '#3276B1', borderColor: '#3276B1', textColor:'#fff', className:'liga'},
					 	{events:<?php echo $turnierDaten;?>,backgroundColor: '#D2322D', borderColor:'#D2322D', textColor:'#fff', className:'turnier'},
					 	{events:<?php echo $freundschaftsDaten;?>,backgroundColor: '#ED9C28', borderColor:'#ED9C28', textColor:'#fff', className:'freundschaft'},

						],

						//beim Klicken auf ein Event ein weiteres JS aufrufen, zur Anzeige des Modals mit Details
						eventClick: function(event) {
					    	//home.js
					    	kalenderModal(event.source.className, event.ID, <?php echo '"'. URL . '"'; ?>, <?php if (isset($_SESSION['betreuer'])) {echo $_SESSION['betreuer']; } else{echo 0; } ?>);
					    }
				});//end $('#calendar').fullCalendar({
			});//end $(document).ready(function() {
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
	<!-- sModal -->
	<div class="modal fade" id="kalenderModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="pModalLabel"><div id="kalendermodalheader"></div></h4>
				</div>
				<div class="modal-body" id="kalendermodalbody">

				</div>
				<!--div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Abbrechen</button>
				</div-->
			</div>
		</div>
	</div>
</div> <!-- End container