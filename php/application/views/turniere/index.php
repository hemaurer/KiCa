<div class="container">
	<!-- Beinhaltet alle Daten zu eintragen -->



	<div id="spartenText">
		<h3>
			<?php
				//Das ausgewählte Turnier anzeigen
				foreach ($turniere as $turnier) {
					if($turnier->ID == Application::$parm_1){
						echo $turnier->Turnier;
					}
				}
			?>
		</h3>
	</div>



</div><!-- End Container  -->
