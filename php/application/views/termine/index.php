<div class="container">
	<!-- Beinhaltet alle Daten zu Terminen -->

<?php /*Deutsch-Sprachige Formatierung*/
	$tag[0] = "Sonntag";
	$tag[1] = "Montag";
	$tag[2] = "Dienstag";
	$tag[3] = "Mittwoch";
	$tag[4] = "Donnerstag";
	$tag[5] = "Freitag";
	$tag[6] = "Samstag";
	$monat[1] = "Januar";
	$monat[2] = "Februar";
	$monat[3] = "März";
	$monat[4] = "April";
	$monat[5] = "Mai";
	$monat[6] = "Juni";
	$monat[7] = "Juli";
	$monat[8] = "August";
	$monat[9] = "September";
	$monat[10] = "Oktober";
	$monat[11] = "November";
	$monat[12] = "Dezember";
		foreach ($eintraege as $tagestermine) {?>
			<h4><?php $date = new DateTime($tagestermine[0]->Uhrzeit); echo $tag[$date->format("w")]." ". $date->format('d.')." ".$monat[$date->format("n")];?></h4>
			<?php foreach ($tagestermine as $termin) {?>
				<table class="table">
					<tr>
					<?php $date = new DateTime($termin->Uhrzeit); // Datumsformatierer vorbereiten ?>
						<?php if (isset($termin->Heim))  {
									echo '<td class="termin-details" colspan="2">';								
									if (isset($termin->Sparte)) {echo $termin->Sparte;}
									if (isset($termin->Uhrzeit)) echo "</br>".$date->format('d.m.Y - H:i')." Uhr";
									if (isset($termin->Status)) echo "<strong></br>".$termin->Status."</strong>";
									if (isset($termin->Ort)) echo "</br>".$termin->Ort;
									if (isset($_SESSION['user_login_status'])){
											echo '</br><a href="'.URL.'spiel/index/'.$termin->s_id.'/"><span class="glyphicon glyphicon-pencil"></span> Aufstellung</a>';
									};
									echo "</td>";
									?>
									<td class="termin"><h4><?php if (isset($termin->Heim)) echo $termin->Heim; ?></h4>
									<?php if ((isset($termin->Heimtore)) && (isset($termin->Auswaertstore))){ echo "<h4>".$termin->Heimtore." : ".$termin->Auswaertstore."</h4>";}else{ echo "<h5>gegen</h5>";} ?>
									<h4><?php if (isset($termin->Auswaerts)) echo $termin->Auswaerts; ?></h4></td>
									<?php 
								} else {
									echo '<td class="termin-details" colspan="2">';
									if (isset($termin->Trainer)) echo $termin->Trainer;
									if (isset($termin->Uhrzeit)) echo "</br>".$date->format('d.m.Y - H:i')." Uhr";
									if (isset($termin->Trainingsgruppe)) echo "<strong></br>".$termin->Trainingsgruppe."</strong>"; 
									if (isset($termin->Ort)) echo "</br>".$termin->Ort; 
									if (isset($_SESSION['user_login_status']) AND ($_SESSION['betreuer'] == 1)) {
											echo '</br><a href="'.URL.'training/index/'.$termin->tr_id.'/"><span class="glyphicon glyphicon-pencil"></span> Anwesenheitsliste</a>';
									}
									echo "</td>";
									?>
									<td class="termin"><h4>Training:</h4> 
									<?php
									echo "<h4>";
									if (isset($termin->Name)){echo $termin->Name;}
									echo "</h4></td>";
								}
						?>
					</tr>
				</table>
			<?php } ?>
			</br> </br>
	<?php } ?>

</div><!-- End Container  -->
