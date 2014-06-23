<div class="container">
	<!-- Beinhaltet alle Daten zu Terminen -->

	<?php foreach ($eintraege as $tagestermine) {?>
			<h4><?php $date = new DateTime($tagestermine[0]->Uhrzeit); echo $date->format('d.m.Y');?></h4>
			<?php foreach ($tagestermine as $termin) {?>
				<table class="table">
					<tr>
					<?php $date = new DateTime($termin->Uhrzeit); // Datumsformatierer vorbereiten ?>
						<?php if (isset($termin->Heim))  {
									if (isset($termin->Sparte)) {
										echo "<td width='10px'>";
										if (isset($_SESSION['user_login_status'])){
											echo "<a href='".URL."spiel/index/".$termin->s_id."/'>".$termin->Sparte."</a>";
										} else {
										echo $termin->Sparte;
										}
										echo "</td>";
									}
									if (isset($termin->Heim)) echo "<td width='30px'>".$termin->Heim."</td>";
									if (isset($termin->Heimtore)) echo "<td width='10px'>".$termin->Heimtore."</td><td width='5'>:</td>";
									if (isset($termin->Auswaertstore)) echo "<td width='10'>".$termin->Auswaertstore."</td>";
									if (isset($termin->Auswaerts)) echo "<td width='30'>".$termin->Auswaerts."</td>";
									echo "</tr><tr>";
									if (isset($termin->Uhrzeit)) echo "<td width='40'>".$date->format('H:i')." Uhr</td>";
									if (isset($termin->Ort)) echo "<td width='25'>".$termin->Ort."</td>";
									if (isset($termin->Status)) echo "<td width='25'>".$termin->Status."</td>";
								} else {
									if (isset($termin->Sparte)) echo "<td width='25'>".$termin->Sparte."</td>";
									if (isset($termin->Trainingsgruppe)) echo "<td width='25px'>".$termin->Trainingsgruppe."</td>";
									if (isset($termin->Name)){
										echo "<td width='25px'>";
										if (isset($_SESSION['user_login_status']) AND ($_SESSION['betreuer'] == 1)) {
											// Backup, falls PopUp gewünscht
											//$str_WindowOpen = "window.open('','popup','width=580,height=360,scrollbars=no,toolbar=no,status=no,resizable=yes,menubar=no,location=no,directories=no,top=10,left=10')";
											//echo '<a target="popup" onclick="'.$str_WindowOpen.'"href="'.URL.'training/index/'.$termin->tr_id.'/">'.$termin->Name.'</a>';
											echo '<a href="'.URL.'training/index/'.$termin->tr_id.'/">'.$termin->Name.'</a>';
										} else {
											echo $termin->Name;
										}
										echo "</td>";
									}
									echo "</tr><tr>";
									if (isset($termin->Uhrzeit)) echo "<td width='40'>".$date->format('H:i')." Uhr</td>";
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
