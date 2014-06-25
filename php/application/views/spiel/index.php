<?php
	if (isset($_SESSION['user_login_status']) AND $_SESSION['betreuer'] == 1){
?>


<div class="container">
	<div class="form-horizontal">
		<div class="form-group">
			<label class="control-label col-md-3">Details</label>
			<div class="col-md-6">
			<?php $date = new DateTime($spiel->Uhrzeit); // Datumsformatierer vorbereiten?>
				<table class="table">
					<tr>
						<th>Heim Team</th>
						<td><?=$spiel->Heim?></td>
					</tr>
					<tr>
						<th>Gegnerisches Team</th>
						<td><?=$spiel->Auswaerts ?></td>
					</tr>
					<?php if (isset($spiel->Heimtore)) { ?>
						<tr>
							<th>Ergebnis</th>
							<td><?=$spiel->Heimtore.":".$spiel->Auswaertstore?></td>
						</tr>
					<?php } ?>
					<tr>
						<th>Spielart</th>
						<td><?=$spiel->Turnier?></td>
					</tr>
					<tr>
						<th>Ort</th>
						<td><?=$spiel->Ort?></td>
					</tr>
					<tr>
						<th>Zeit</th>
						<td><?=$date->format('H:i')?> Uhr</td>
					</tr>
				</table>
			</div>
		</div>


		<div class="form-group">
			<form action="<?php echo URL; ?>spiel/edit_aufstellung/" method="POST">
				<input type="hidden" name="s_id" value="<?php echo $s_id ?>">
				<div class="form-group">
					<label class="control-label col-md-3">Aufstellung</label>
					<div class="col-md-6">
						<ul class="form-control" id="checkboxSelect">
							<div class="checkbox">
							<?php 
								// Liste alle Personen auf
								foreach ($personen as $spieler){
									$b_aufgestellt = false;
									echo "";
									// Betreuer auslassen
									if ($spieler->betreuer == 0) {
										// Wenn keine Aufstellung bisher vorhanden ist, muss nicht geprüft werden, ob er aufgestellt ist
										if (count($aufstellung) > 0){
											foreach ($aufstellung as $aufgestellterSpieler) {
												if (strstr($aufgestellterSpieler->Spieler, $spieler->name) !== false){
													$b_aufgestellt = true;
													break;
												} 
											}
											// Checkbox darstellen, checked oder nicht
											if ($b_aufgestellt){
												echo "<li><label><input type='checkbox' name='arr_aufstellung[]' value='".$spieler->p_id."' checked /></label></li>";
											} else {
												echo "<li><label><input type='checkbox' name='arr_aufstellung[]' value='".$spieler->p_id."' /> </label></li>";
											}
											
										} else {
											echo "<li><label><input type='checkbox' name='arr_aufstellung[]' value='".$spieler->p_id."' />";
											
										}
										echo $spieler->v_name." ".$spieler->name."</label></li>";
									}
								}
							?>
							</div>
						</ul>
					</div>
				</div>
				<br />
				<div class="form-group">
					<div class="col-md-offset-3 col-md-6">
						<input class="btn btn-default" type="submit" name="submit_edit_aufstellung" value="Speichern" />
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

 <?php
	} else { 
		// Eingeloggter User, aber kein Betreuer, daher nur Ansichtsseite
		if (isset($_SESSION['user_login_status'])){		
	?>
			<div class="container">
				<h4>Aufstellung</h4>
				<table>
				<?php 
					// Wenn Aufstellung vorhanden ist, stelle die aufgestellten Spieler dar
					if (count($aufstellung) > 0){
						foreach ($personen as $spieler){
							$b_aufgestellt = false;
							foreach ($aufstellung as $aufgestellterSpieler) {
								if (strstr($aufgestellterSpieler->Spieler, $spieler->name) !== false){
									$b_aufgestellt = true;
									break;
								} 
							}
							if ($b_aufgestellt){
								echo "<tr><td>".$spieler->v_name." ".$spieler->name."</td></tr>";
							}
						}
					} else {
							echo "<h5>Keine Aufstellung vorhanden</h5>";
					}
					
				?>
				</table>
			</div>
	<?php
		} else {	?>	
		<div class="container"> <?php
			echo "Diese Seite ist für Sie gesperrt"; ?>
		</div>
	<?php } 
	}?>

