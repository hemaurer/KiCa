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
		<br />
		<br />
		<div class="form-group">
			<h2>Anwesenheitsliste</h2>
			<br />
			<div class="form-group">
				<form action="<?php echo URL; ?>training/edit_anwesenheitsliste/" method="POST">
					<input type="hidden" name="tr_id" value="<?php echo $tr_id ?>">
					<div class="col-md-6">
					<?php
						foreach ($anwesenheitsliste as $person){
					?>
						<?php
							$b_anwesend = true;?>
							<ul class="form-control" id="checkboxSelect">
								<div class="checkbox">
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
																		?>>
										</label>
									</li>
									<label class="control-label col-md-3"><?php echo $person->Teilnehmer ?></label>
								<br />
								</div>
							</ul>
					<?php
						}
					?>
						<input class="btn btn-default" type="submit" name="submit_abort" value="Abbrechen" />
						<input class="btn btn-info" type="submit" name="submit_create_PDF" value="Drucken" />
						<input class="btn btn-primary" type="submit" name="submit_edit_anwesenheitsliste" value="Speichern" />
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

</div>


