<?php
	if (isset($_SESSION['user_login_status']) AND $_SESSION['betreuer'] == 1){
?>
<script src="<?php echo URL; ?>public/js/modal-loader.js"> </script>

<div class="container">
	<?php /***Trainingseinheiten-Edit***/?>
		<form class="form-horizontal" action="<?php echo URL; ?>training/edit_trainingseinheit/" method="POST">
			<input type="hidden" name="tr_id" value="<?php echo $training->tr_id ?>">
			<div class="form-group">
				<label class="control-label col-md-4">Training(Name oder Beschreibung)*</label>
				<div class="col-md-4">
					<input class="form-control" type="text" name="str_name" value="<?php echo $training->Name ?>" required />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4">Trainingsort*</label>
				<div class="col-md-4">
					<input class="form-control" type="text" name="str_ort" value="<?php echo $training->Ort ?>" required />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4">Trainer*</label>
				<div class="col-md-4">
					<select class="form-control" name="str_trainer" size="1" required>
						<option></option>
						<?php foreach ($personen as $person) { ?>
							<?php if ((isset($person->name))&&($person->betreuer == 1)){?>
								<option <?=stristr($training->Trainer,$person->name) ? 'selected="selected"' : ''; ?>><?php echo $person->name; ?></option><?php } ?>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4">Trainingsgruppe*</label>
				<div class="col-md-4">
					<select class="form-control" name="str_tg_name" size="1" required>
						<option></option>
						<?php foreach ($trainingsgruppen as $trainingsgruppe) { ?>
							<option <?=$training->Trainingsgruppe == $trainingsgruppe->name ? 'selected="selected"' : '';?>><?php if (isset($trainingsgruppe->name)) echo $trainingsgruppe->name; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4">Datum*</label>
				<div class="col-md-4">
					<div data-provide="datepicker" class="input-group date">
						<input class="form-control" name="d_date" type="text" value="<?php $date = new DateTime($training->Uhrzeit); echo $date->format('d.m.Y'); ?>"  required>
						<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4">Zeit*</label>
				<div class="col-md-4">
					<div class="input-group">
						<input class="form-control" id="timepicker2" name="d_time" type="text" value="<?php $date = new DateTime($training->Uhrzeit); echo $date->format('H:i');?>" required>
						<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
					</div>
				</div>
				<script> $('#timepicker2').timepicker({showMeridian: false, defaultTime: false});</script>
			</div>
			<div class="form-group">
				<div class="col-md-offset-4 col-md-4">
					<input class="btn btn-warning" type="submit" name="submit_abort" value="Abbrechen" />
					<input class="btn btn-primary" type="submit" name="submit_edit_trainingseinheit" value="Speichern" />
				</div>
			</div>
		</form>
		<br />
		<br />
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
					<input class="btn btn-warning" type="submit" name="submit_abort" value="Abbrechen" />
					<input class="btn btn-primary" type="submit" name="submit_edit_anwesenheitsliste" value="Speichern" />
				</div>
			</form>
		</div>
</div>

 <?php }
    else{ ?>
		<div class="container"> <?php
			echo "Diese Seite ist für Sie gesperrt"; ?>
		</div>
	<?php } ?>

