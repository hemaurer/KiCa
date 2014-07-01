<?php
	if (isset($_SESSION['user_login_status']) AND $_SESSION['betreuer'] == 1){
?>

<script src="<?php echo URL; ?>public/js/modal-loader.js"> </script>

<div class="container">
	<div class="form-horizontal">
		<div class="form-group">
			<label class="control-label col-md-3">Details</label>
			<div class="col-md-6">
			<?php $date = new DateTime($training->Uhrzeit); // Datumsformatierer vorbereiten?>
				<table class="table">
					<tr>
						<th>Name</th>
						<td><?=$training->Name?></td>
					</tr>
					<tr>
						<th>Ort</th>
						<td><?=$training->Ort ?></td>
					</tr>
					<tr>
						<th>Zeit</th>
						<td><?=$date->format('H:i')?> Uhr</td>
					</tr>
					<tr>
						<th>Datum</th>
						<td><?=$date->format('d.m.Y')?></td>
					</tr>
					<tr>
						<th>Trainingsgruppe</th>
						<td><?=$training->Trainingsgruppe?></td>
					</tr>
					<tr>
						<th>Trainer</th>
						<td><?=$training->Trainer?></td>
					</tr>
				</table>
			</div>
		</div>
		
		
		<div class="form-group">
			<form action="<?php echo URL; ?>training/edit_anwesenheitsliste/" method="POST">
				<input type="hidden" name="tr_id" value="<?php echo $tr_id ?>">
				<div class="form-group">
					<label class="control-label col-md-3">Anwesenheitsliste</label>
					<div class="col-md-6">
						<ul class="form-control" id="checkboxSelect">
							<div class="checkbox">
							<?php
								// Liste alle Personen auf
								foreach ($anwesenheitsliste as $person){
									$b_anwesend = true;?>
							
									<li>
										<label>
											<input type="checkbox" id="p_ids[]" name="p_ids[]" value="<?php echo $person->p_id ?>"
											<?php
												foreach ($abwesenheitsliste as $abwesend){
													if (stripos($abwesend->Teilnehmer, $person->Teilnehmer) !== false){
														$b_anwesend = false;
														break;
													}
												}
												if ($b_anwesend) {
													echo "checked";
												}
											?>><?php echo $person->Teilnehmer ?>
										</label>
									</li>
						<?php 	} ?>
							</div>
						</ul>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-offset-1 col-md-2">
						<button type="submit" class="btn btn-info" name="submit_create_PDF">
							<span class="glyphicon glyphicon-print"></span> Drucken
						</button>
					</div>
					<div class="col-md-6">
						<input class="btn btn-default" type="submit" name="submit_abort" value="Abbrechen" />
						<input class="btn btn-primary" type="submit" name="submit_edit_anwesenheitsliste" value="Speichern" />
					</div>
				</div>
			</form>
			
		</div>
	</div>
</div>
 <?php }
    else{ ?>
		<div class="container"> <?php
			echo "Diese Seite ist für Sie gesperrt."; ?>
		</div>
	<?php } ?>




