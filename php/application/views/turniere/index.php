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
					}
				}

				//Variable befüllen, um Turniere im Dropdown darstellen zu können
				$turniere = $sparten_model->getTurniere($sparte_id);
			?>
		</h3>
	</div>

		<!-- Dropdown zur Turnierauswahl -->
		<div id="spartenButton">
			<div class="btn-group">
				 <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
				    <span class="spartenDropdownName"> <?php echo $turniere[0]->Turnier; ?> </span> <span class="caret"></span>
		 		 </button>
				  <!-- <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#"><span id="spartenDropdownName"> <?php echo $spartenDaten[0]->Sparte; ?> </span><span class="caret"></span> </a> -->
					 <ul class="dropdown-menu" role="menu">
		          		<?php
							// Turniere aus der DB laden und in der Liste anzeigen
							// Freundschaftsspiel wird ganz unten angezeigt
								foreach ($turniere as $turnier) {
									if ($turnier->Turnier <> "Freundschaftsspiel"){
									?>
										<li><a href="<?php echo URL; echo 'turniere/index/'; if (isset($turnier->ID)) echo $turnier->ID; ?>/"><?php if (isset($turnier->Turnier)) echo $turnier->Turnier; ?></a></li>
						<?php 		}
								}
								foreach ($turniere as $turnier) {
									if(isset($turnier->Turnier)){
										if ($turnier->Turnier == "Freundschaftsspiel"){ ?>
											<li class="divider"></li>
											<li><a href="<?php echo URL; echo 'turniere/index/'; if (isset($turnier->ID)) echo $turnier->ID; ?>/"><?php if (isset($turnier->Turnier)) echo $turnier->Turnier; ?></a></li>
						<?php 			}
									}
								}



						?>
			        </ul>
			</div> <!-- End class="btn-group"> -->
		</div> <!-- End id="spartenButton" -->







</div><!-- End Container  -->
