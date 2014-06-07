<div class="container">
	<!-- Beinhaltet alle Daten zu Terminen -->

	<?php foreach ($eintraege as $tagestermine) {?>
			<h4><?php echo substr($tagestermine[0]->Uhrzeit,0,10)?></h4>
			<?php foreach ($tagestermine as $termin) {?>
				<table class="table">
					<tr>
						<?php if (isset($termin->Heim))  {
									if (isset($termin->Sparte)) echo "<td width='10px'>".$termin->Sparte."</td>";
									if (isset($termin->Heim)) echo "<td width='30px'>".$termin->Heim."</td>";
									if (isset($termin->Heimtore)) echo "<td width='10px'>".$termin->Heimtore."</td><td width='5'>:</td>";
									if (isset($termin->Auswaertstore)) echo "<td width='10'>".$termin->Auswaertstore."</td>";
									if (isset($termin->Auswaerts)) echo "<td width='30'>".$termin->Auswaerts."</td>";
									echo "</tr><tr>";
									if (isset($termin->Uhrzeit)) echo "<td width='40'>".$termin->Uhrzeit."</td>";
									if (isset($termin->Ort)) echo "<td width='25'>".$termin->Ort."</td>";
									if (isset($termin->Status)) echo "<td width='25'>".$termin->Status."</td>";
								} else {
									if (isset($termin->Sparte)) echo "<td width='25px'>".$termin->Sparte."</td>";
									if (isset($termin->Trainingsgruppe)) echo "<td width='25px'>".$termin->Trainingsgruppe."</td>";
									if (isset($termin->Name)) echo "<td width='25'>".$termin->Name."</td>";
									echo "</tr><tr>";
									if (isset($termin->Uhrzeit)) echo "<td width='40'>".$termin->Uhrzeit."</td>";
									if (isset($termin->Ort)) echo "<td width='25'>".$termin->Ort."</td>";
									if (isset($termin->Status)) echo "<td width='25'>".$termin->Status."</td>";
								}
						?>
					</tr>
				</table>
			<?php } ?>
			</br> </br>
	<?php } ?>

</div><!-- End Container  -->
