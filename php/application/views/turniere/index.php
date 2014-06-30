<div class="container">
	<!-- Beinhaltet alle Daten zu eintragen -->



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
			  <!-- <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#"><span id="spartenDropdownName"> <?php echo $spartenDaten[0]->Sparte; ?> </span><span class="caret"></span> </a> -->
				 <ul class="dropdown-menu" role="menu">
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
	
	<div id=spieluebersicht>
	<?php
		if (isset($str_winner)){
			echo "<h3>SIEGER: ".$str_winner."</h3>";
		}
		if (count($turnierspiele) > 0){
			$str_status = $turnierspiele[0]->Status;
			echo "<h3>".$str_status."</h3><table class='table'><tr>";

			foreach ($turnierspiele as $spiel){
				if (strcmp($str_status,$spiel->Status) !== 0){
					$str_status = $spiel->Status;
					echo "</table><h3>".$str_status."</h3><table class='table'><tr>";
				}
				if (isset($spiel->Heim)) echo "<td>".$spiel->Heim."</td>";
				if (isset($spiel->Heimtore)) {echo "<td>".$spiel->Heimtore."</td><td width='5'> : </td>";} else { echo "<td> gegen </td>";};

				if (isset($spiel->Auswaertstore)) echo "<td>".$spiel->Auswaertstore."</td>";
				if (isset($spiel->Auswaerts)) echo "<td>".$spiel->Auswaerts."</td>";
			?>
			</tr>
			<?php
			}
			echo "</table>";
		} else {
			echo "<h4>Keine Spiele vorhanden</h4>";
		}
	?>

	</div> <!-- End id="spieluebersicht" -->
</div><!-- End Container  -->
