<?php
// Prüfen, ob ein Parameter mitgegeben wurde
// dadurch wird abgefangen, dass die Seite ohne Parameter aufgerufen wird und Fehler erzeugt
if(isset(Application::$parm_1) && isset(Application::$parm_2)){
	?>
<div class="container">

	<!-- Die Überschrift des Inhalts mit der Sparte -->
	<div id="spartenText">
		<h3>
			<?php
				//Das ausgewählte Turnier anzeigen
				foreach ($spartenDaten as $sparte) {
					if($sparte->ID == Application::$parm_1){
						echo $sparte->Sparte;
						$sparte_id = $sparte->ID;
						//Variable befüllen, um Turniere im Dropdown darstellen zu können
						$turniere = $sparten_model->getTurniere($sparte_id);
						foreach ($turniere as $turnier){
							if ($turnier->ID == $tu_id){
								echo " - ".$turnier->Turnier;
							}
						}
					}
				}
			?>
		</h3>
	</div>

	<!-- Dropdown zur Turnierauswahl -->
	<div id="spartenButton">
		<div class="btn-group">
			 <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
				<span class="spartenDropdownName">
					 <?php
				    	//Text im Dropdown Button nach dem ausgewählten Turnier benennen
						foreach ($turniere as $turnier) {
							if($turnier->ID == Application::$parm_2){
								echo $turnier->Turnier;
							}
						}
					?>
				</span> <span class="caret"></span>
			 </button>
				 <ul class="dropdown-menu btn_spartenButton" role="menu">
					<?php
							// Turniere aus der DB laden und in der Liste anzeigen
							// Freundschaftsspiel wird ganz oben angezeigt
							foreach ($turniere as $turnier) {
								if(isset($turnier->Turnier)){
									if ($turnier->Turnier == "Freundschaftsspiel"){ ?>
										<li><a href="<?php echo URL; echo 'turniere/index/'; echo $sparte_id; echo '/'; if (isset($turnier->ID)){ echo $turnier->ID;} ?>/"><?php if (isset($turnier->Turnier)) echo $turnier->Turnier; ?></a></li>
					<?php 			}
								}
							}

							//Trennlinie zwischen Freundschaftsspiel und anderen Turnieren
							//wird nur angezeigt, wenn auch wirklich mind. 1 anderes Turnier besteht
							$boolean_divider = true;
							//andere Turniere anzeigen
							foreach ($turniere as $turnier) {
								if ($turnier->Turnier <> "Freundschaftsspiel"){
								?>
									<?php
										//Trennlinie anzeigen
										if($boolean_divider == true){
									?>
											<li class="divider"></li>
									<?php
										}
										$boolean_divider = false;
									?>

									<li><a href="<?php echo URL; echo 'turniere/index/'; echo $sparte_id; echo '/'; if (isset($turnier->ID)){ echo $turnier->ID;} ?>/"><?php if (isset($turnier->Turnier)) echo $turnier->Turnier; ?></a></li>
					<?php 		}
							}



					?>
				</ul>
		</div> <!-- End class="btn-group"> -->
	</div> <!-- End id="spartenButton" -->
	<br /><br /><br />

	<div id="spieluebersicht">
	<?php
		if (isset($str_winner)){
			echo "<h4>SIEGER: ".$str_winner."</h4></br>";
		}
		if (count($turnierspiele) > 0){
			if ($turnierspiele[0]->Status == "Freundschaftsspiel"){
				$str_status = $turnierspiele[0]->Status;
				echo "<h4>".$str_status."</h4>";
			}
			foreach ($turnierspiele as $spiel){
				if ($spiel->Status != "Freundschaftsspiel"){
					$str_status = $spiel->Status;
					echo "<h4>".$str_status."</h4>";
				}
				echo "<table class='table'><tr>";
				echo '<td class="termin-details" colspan="2">';
					if (isset($spiel->Uhrzeit)) {$date = new DateTime($spiel->Uhrzeit); echo $date->format('d.m.Y - H:i')." Uhr";};
					if (isset($spiel->Ort)) echo "</br>".$spiel->Ort;
				echo "</td>";
				?>
				<td class="termin"><h4><?php if (isset($spiel->Heim)) echo $spiel->Heim; ?></h4>
				<?php if ((isset($spiel->Heimtore)) && (isset($spiel->Auswaertstore))){ echo "<h4>".$spiel->Heimtore." : ".$spiel->Auswaertstore."</h4>";}else{ echo "<h5>gegen</h5>";} ?>
				<h4><?php if (isset($spiel->Auswaerts)) echo $spiel->Auswaerts; ?></h4></td>
			</tr></table>
			<?php
			} //echo "</table>";
		} else {
			echo "<h4>Keine Spiele vorhanden</h4>";
		}?>
	</div> <!-- End id="spieluebersicht" -->
</div><!-- End Container  -->
<?php }else{ ?>
		<div class="container"> <?php
			echo "Bitte über die Navigation ein Turnier wählen."; ?>
		</div>
<?php } ?>

