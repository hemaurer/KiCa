<?php
	if (isset($_SESSION['user_login_status']) AND $_SESSION['betreuer'] == 1){
?>


<div class="container">
	<h4>Details</h4>
	<div>
	<?php $date = new DateTime($spiel->Uhrzeit); // Datumsformatierer vorbereiten?>
		<table>
			<tr>
				<td>Heim Team</td>
				<td><?=$spiel->Heim?></td>
			</tr>
			<tr>
				<td>Gegnerisches Team</td>
				<td><?=$spiel->Auswaerts ?></td>
			</tr>
			<?php if (isset($spiel->Heimtore)) { ?>
				<tr>
					<td>Ergebnis</td>
					<td><?=$spiel->Heimtore.":".$spiel->Auswaertstore?></td>
				</tr>
			<?php } ?>
			<tr>
				<td>Spielart</td>
				<td><?=$spiel->Turnier?></td>
			</tr>
			<tr>
				<td>Ort</td>
				<td><?=$spiel->Ort?></td>
			</tr>
			<tr>
				<td>Zeit</td>
				<td><?=$date->format('H:i')?> Uhr</td>
			</tr>
		</table>
	</div>

	<h4>Aufstellung</h4>
	<div class="checkbox">
		<form class="form-horizontal" action="<?php echo URL; ?>spiel/edit_aufstellung/" method="POST">
			<input type="hidden" name="s_id" value="<?php echo $s_id ?>">
			<table>
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
								echo "<tr><td><input type='checkbox' name='arr_aufstellung[]' value='".$spieler->p_id."' checked /> </td><td>";
							} else {
								echo "<tr><td><input type='checkbox' name='arr_aufstellung[]' value='".$spieler->p_id."' /> </td><td>";
							}
							
						} else {
							echo "<tr><td><input type='checkbox' name='arr_aufstellung[]' value='".$spieler->p_id."' />";
							
						}
						echo $spieler->v_name." ".$spieler->name."</td></tr>";
						
					}
				}
				
			?>
			</table>
			<br />
			<input class="btn btn-default" type="submit" name="submit_edit_aufstellung" value="Speichern" />
		</form>
	<div class="checkbox">
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

