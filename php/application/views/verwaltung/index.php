<?php
	if (isset($_SESSION['user_login_status']) AND $_SESSION['betreuer'] == 1){
?>
<script src="<?php echo URL; ?>public/js/modal-loader.js"> </script>
<script type="text/javascript">$('#timepicker1').timepicker();</script>


<div class="container">
	<ul class="nav nav-tabs">
		<li class="active">
			<a data-toggle="tab" href="#add">Hinzufügen</a>
		</li>
		<li>
			<a data-toggle="tab" href="#edit">Bearbeiten</a>
		</li>
	</ul>
	<div id="tabcontent" class="tab-content">
	<?php /***Add-Tab***/?>
		<div id="add" class="tab-pane fade in active">
			<div class="panel-group" id="accordion">
				<?php /***Personen-Add***/?>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Neue Person hinzufügen</a>
						</h4>
					</div>
					<div id="collapseOne" class="panel-collapse collapse">
						<div class="panel-body">
							<form class="form-horizontal" action="<?php echo URL; ?>verwaltung/add_person" method="POST">
								<div class="form-group">
									<label class="control-label col-md-4">Nachname*</label>
									<div class="col-md-4">
										<input class="form-control" type="text" name="str_nachname" value="" placeholder="Nachname" required/>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4">Vorname*</label>
									<div class="col-md-4">
										<input class="form-control" type="text" name="str_vorname" value="" placeholder="Vorname" required />
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4">Geburtsdatum*</label>
									<div class="col-md-4">
										<div class="sandbox-container input-group ">
											<input class="form-control" name="d_date" type="text">
											<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
										</div>
									</div>
									<script> $('.sandbox-container input').datepicker();</script>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4">Groesse</label>
									<div class="col-md-4">
										<input class="form-control" type="number" name="int_groesse" value="" placeholder="Beispiel 158cm" />
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4">Betreuer?*</label>
									<div class="col-md-4">
										<select class="form-control" name="b_betreuer" size="1" required>
											<option value="0">Nein</option>
											<option value="1">Ja</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4">Telefonnummer</label>
									<div class="col-md-4">
										<input class="form-control" type="number" name="int_tel" value="" placeholder="Telefonnummer" />
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-offset-4 col-md-4">
										<input type="submit" class="btn btn-default" name="submit_add_person" value="Speichern" />
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>

				<?php /***Spiele-Add***/?>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Neues Spiel hinzufügen</a>
						</h4>
					</div>
					<div id="collapseTwo" class="panel-collapse collapse">
						<div class="panel-body">
							<form class="form-horizontal" action="<?php echo URL; ?>verwaltung/add_spiel" method="POST">
								<div class="form-group">
									<label class="control-label col-md-4">Spielort*</label>
									<div class="col-md-4">
										<input class="form-control" type="text" name="str_ort" value="" placeholder="Spielort" required />
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4">Heim Team*</label>
									<div class="col-md-4">
										<select class="form-control" name="str_heim" size="1" required>
											<option></option>
											<?php foreach ($mannschaften as $mannschaft) { ?>
											<option><?php if (isset($mannschaft->name)) echo $mannschaft->name; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4">Gegnerisches Team*</label>
									<div class="col-md-4">
										<select class="form-control" name="str_auswaerts" size="1" required>
											<option></option>
											<?php foreach ($mannschaften as $mannschaft) { ?>
											<option><?php if (isset($mannschaft->name)) echo $mannschaft->name; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4">Status*</label>
									<div class="col-md-4">
										<select class="form-control" name="str_stat_name" size="1" required>
											<option></option>
											<?php foreach ($stats as $status) { ?>
											<option><?php if (isset($status->status)) echo $status->status; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4">Zeit*</label>
									<div class="col-md-3">
										<div class="sandbox-container input-group ">
											<input class="form-control" name="d_date" type="text">
											<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
										</div>
									</div>
									<script> $('.sandbox-container input').datepicker();</script>
									<div class="col-md-2">
										<div class="input-group">
											<input class="form-control" id="timepicker1" name="d_time" type="text">
											<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
										</div>
									</div>
									<script> $('#timepicker1').timepicker({showMeridian: false});</script>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4">Turnier*</label>
									<div class="col-md-4">
										<select class="form-control" name="str_tu_name" size="1" required>
											<option></option>
											<?php foreach ($turniere as $turnier) { ?>
											<option><?php if (isset($turnier->name)) echo $turnier->name; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4">Sparte*</label>
									<div class="col-md-4">
										<select class="form-control" name="str_sparte" size="1" required>
											<option></option>
											<?php foreach ($sparten as $sparte) { ?>
											<option><?php if (isset($sparte->name)) echo $sparte->name; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-offset-4 col-md-4">
										<input type="submit" class="btn btn-default" name="submit_add_spiel" value="Speichern"/>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>

				<?php /***Mannschaften-Add***/?>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Neue Mannschaft hinzufügen</a>
						</h4>
					</div>
					<div id="collapseThree" class="panel-collapse collapse">
						<div class="panel-body">
							<form class="form-horizontal" action="<?php echo URL; ?>verwaltung/add_mannschaft" method="POST">
								<div class="form-group">
									<label class="control-label col-md-4">Mannschaftsname*</label>
									<div class="col-md-4">
										<input class="form-control" type="text" name="str_name" value="" placeholder="Mannschaftsname" required />
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-offset-4 col-md-4">
										<input class="btn btn-default" type="submit" name="submit_add_mannschaft" value="Speichern" />
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>

				<?php /***Trainingseinheiten-Add***/?>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">Neue Trainingseinheit hinzufügen</a>
						</h4>
					</div>
					<div id="collapseFour" class="panel-collapse collapse">
						<div class="panel-body">
							<form class="form-horizontal" action="<?php echo URL; ?>verwaltung/add_trainingseinheit" method="POST">
								<div class="form-group">
									<label class="control-label col-md-4">Training(Name oder Beschreibung)*</label>
									<div class="col-md-4">
										<input class="form-control" type="text" name="str_name" value="" placeholder="Training" required />
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4">Trainingsort*</label>
									<div class="col-md-4">
										<input class="form-control" type="text" name="str_ort" value="" placeholder="Trainingsort" required />
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4">Zeit*</label>
									<div class="col-md-3">
										<div class="sandbox-container input-group ">
											<input class="form-control" name="d_date" type="text">
											<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
										</div>
									</div>
									<script> $('.sandbox-container input').datepicker();</script>
									<div class="col-md-2">
										<div class="input-group">
											<input class="form-control" id="timepicker2" name="d_time" type="text">
											<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
										</div>
									</div>
									<script> $('#timepicker2').timepicker({showMeridian: false});</script>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4">Trainer*</label>
									<div class="col-md-4">
										<select class="form-control" name="str_trainer" size="1" required>
											<option></option>
											<?php foreach ($personen as $person) { ?>
											<?php if ((isset($person->name))&&($person->betreuer == 1)){?><option><?php echo $person->name; }?></option>
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
											<option><?php if (isset($trainingsgruppe->name)) echo $trainingsgruppe->name; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-offset-4 col-md-4">
										<input class="btn btn-default" type="submit" name="submit_add_trainingseinheit" value="Speichern" />
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>

				<?php /***Trainingsgruppen-Add***/?>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">Neue Trainingsgruppe hinzufügen</a>
						</h4>
					</div>
					<div id="collapseFive" class="panel-collapse collapse">
						<div class="panel-body">
							<form class="form-horizontal" action="<?php echo URL; ?>verwaltung/add_trainingsgruppe" method="POST">
								<div class="form-group">
									<label class="control-label col-md-4">Trainingsgruppenname*</label>
									<div class="col-md-4">
										<input class="form-control" type="text" name="str_name" value="" placeholder="Trainingsgruppenname" required />
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-offset-4 col-md-4">
										<input class="btn btn-default" type="submit" name="submit_add_trainingsgruppe" value="Speichern" />
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>

				<?php /***Turnier-Add***/?>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">Neues Turnier hinzufügen </a>
						</h4>
					</div>
					<div id="collapseSix" class="panel-collapse collapse">
						<div class="panel-body">
							<form class="form-horizontal" action="<?php echo URL; ?>verwaltung/add_turnier" method="POST">
								<div class="form-group">
									<label class="control-label col-md-4">Turniername*</label>
									<div class="col-md-4">
										<input class="form-control" type="text" name="str_name" value="" placeholder="Turniername" required />
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4">Ligaturnier?</label>
									<div class="col-md-4">
										<select class="form-control" name="int_liga" size="1">
											<option></option>
											<option value="1">Ja</option>
											<option value="0">Nein</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-offset-4 col-md-4">
										<input class="btn btn-default" type="submit" name="submit_add_turnier" value="Speichern" />
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>




				<?php /***Sparte-Add***/?>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">Neue Sparte hinzufügen </a>
						</h4>
					</div>
					<div id="collapseSeven" class="panel-collapse collapse">
						<div class="panel-body">
							<form class="form-horizontal" action="<?php echo URL; ?>verwaltung/add_sparte" method="POST">
								<div class="form-group">
									<label class="control-label col-md-4">Sparte*</label>
									<div class="col-md-4">
										<input class="form-control" type="text" name="str_name" value="" placeholder="Sparte" required />
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-offset-4 col-md-4">
										<input class="btn btn-default" type="submit" name="submit_add_sparte" value="Speichern" />
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php /***Edit-Tab***/?>
		<div id="edit" class="tab-pane fade">
			<div class="panel-group" id="edit-accordion">

				<?php /***Personen-Edit***/?>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#edit-accordion" href="#personedit">Personen bearbeiten</a>
						</h4>
					</div>
					<div id="personedit" class="panel-collapse collapse">
						<div class="panel-body">
							<h3>Liste aller Personen</h3>
							<table class="table">
								<thead style="background-color: #ddd; font-weight: bold;">
									<tr>
										<td>Nachname</td>
										<td>Vorname</td>
										<td>Geburtsdatum</td>
										<td align="right" width="1%">Bearbeiten</td>
										<td align="right" width="1%">Löschen</td>
									</tr>
								</thead>
								<tbody>
								<?php foreach ($personen as $person) { ?>
									<tr>
										<td><?php if (isset($person->name)) echo $person->name; ?></td>
										<td><?php if (isset($person->v_name)) echo $person->v_name; ?></td>
										<td><?php if (isset($person->geb_datum)) echo $person->geb_datum; ?></td>
										<!--td align="center"><a href="<?php echo URL . 'verwaltung/' ?>"><span class="glyphicon glyphicon-pencil"></span></a></td-->
										<td align="center"><a data-toggle="modal" data-target="#person_Modal" onclick="toggleModal('2','person','<?php echo $person->p_id; ?>','<?php echo $person->v_name; ?> <?php echo $person->name;?>')"><span class="glyphicon glyphicon-pencil"></span></a></td>
										<!--td><a href="<?php echo URL . 'verwaltung/delete_person/' . $person->p_id; ?>"><span><i class="glyphicon glyphicon-remove"></i></span></a></td-->
										<!--td><a data-toggle="modal" data-target="#pModal<?php echo $person->p_id; ?>"><span class="glyphicon glyphicon-remove"></span></a></td-->
										<td align="center"><a data-toggle="modal" data-target="#bs_Modal" onclick="toggleModal('3','person','<?php echo $person->p_id; ?>','<?php echo $person->v_name; ?> <?php echo $person->name;?>')"><span class="glyphicon glyphicon-remove"></span></a></td>
									</tr>

								<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<?php /***Spiele-Edit***/?>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#edit-accordion" href="#spieledit">Spiele bearbeiten</a>
						</h4>
					</div>
					<div id="spieledit" class="panel-collapse collapse">
						<div class="panel-body">
							<h3>Liste aller Spiele</h3>
							<table class="table">
								<thead style="background-color: #ddd; font-weight: bold;">
								<tr>
									<td>Heim Team</td>
									<td>Gegnerisches Team</td>
									<td>Heim Tore</td>
									<td>Gegner Tore</td>
									<td>Spielart</td>
									<td>Ort</td>
									<td>Zeit</td>
									<td align="right" width="1%">Bearbeiten</td>
									<td align="right" width="1%">Löschen</td>
								</tr>
								</thead>
								<tbody>
								<?php foreach ($spiele as $spiel) { ?>
									<tr>
										<td><?php if (isset($spiel->heimname)) echo $spiel->heimname; ?></td>
										<td><?php if (isset($spiel->auswaertsname)) echo $spiel->auswaertsname; ?></td>
										<td><?php if (isset($spiel->h_tore)) echo $spiel->h_tore; ?></td>
										<td><?php if (isset($spiel->a_tore)) echo $spiel->a_tore; ?></td>
										<td><?php if (isset($spiel->stat_id)) echo $spiel->stat_id; ?></td>
										<td><?php if (isset($spiel->ort)) echo $spiel->ort; ?></td>
										<td><?php if (isset($spiel->zeit)) echo $spiel->zeit; ?></td>
										<td align="center"><a href="<?php echo URL . 'verwaltung/' ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
										<!--td><a href="<?php echo URL . 'verwaltung/delete_spiel/' . $spiel->s_id; ?>"><span><i class="glyphicon glyphicon-remove"></i></span></a></td-->
										<!--td align="center"><a data-toggle="modal" data-target="#sModal<?php echo $spiel->s_id; ?>"><span class="glyphicon glyphicon-remove"></span></a></td-->
										<td align="center"><a data-toggle="modal" data-target="#bs_Modal" onclick="toggleModal('3','spiel','<?php echo $spiel->s_id; ?>','<?php echo $spiel->heimname; ?> gegen <?php echo $spiel->auswaertsname;?>')"><span class="glyphicon glyphicon-remove"></span></a></td>
									</tr>

								<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<?php /***Mannschaften-Edit***/?>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#edit-accordion" href="#medit">Mannschaften bearbeiten</a>
						</h4>
					</div>
					<div id="medit" class="panel-collapse collapse">
						<div class="panel-body">
							<h3>Liste aller Mannschaften</h3>
							<table class="table">
								<thead style="background-color: #ddd; font-weight: bold;">
									<tr>
										<td>Mannschaftsname</td>
										<td align="right" width="1%">Bearbeiten</td>
										<td align="right" width="1%">Löschen</td>
									</tr>
								</thead>
								<tbody>
								<?php foreach ($mannschaften as $mannschaft) { ?>
									<tr>
										<td><?php if (isset($mannschaft->name)) echo $mannschaft->name; ?></td>
										<td align="center"><a href="<?php echo URL . 'verwaltung/' ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
										<td align="center"><a data-toggle="modal" data-target="#bs_Modal" onclick="toggleModal('3','mannschaft','<?php echo $mannschaft->m_id; ?>','<?php echo $mannschaft->name; ?>')"><span class="glyphicon glyphicon-remove"></span></a></td>
									</tr>
								<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<?php /***Trainingseinheiten-Edit***/?>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#edit-accordion" href="#tredit">Trainingseinheiten bearbeiten</a>
						</h4>
					</div>
					<div id="tredit" class="panel-collapse collapse">
						<div class="panel-body">
							<h3>Liste aller Trainingseinheiten</h3>
							<table class="table">
								<thead style="background-color: #ddd; font-weight: bold;">
									<tr>
										<td>Name</td>
										<td>Ort</td>
										<td>Zeit</td>
										<td>Trainingsgruppe</td>
										<td align="right" width="1%">Bearbeiten</td>
										<td align="right" width="1%">Löschen</td>
									</tr>
								</thead>
								<tbody>
								<?php foreach ($trainingseinheiten as $trainingseinheit) { ?>
									<tr>
										<td><?php if (isset($trainingseinheit->name)) echo $trainingseinheit->name; ?></td>
										<td><?php if (isset($trainingseinheit->ort)) echo $trainingseinheit->ort; ?></td>
										<td><?php if (isset($trainingseinheit->zeit)) echo $trainingseinheit->zeit; ?></td>
										<td><?php if (isset($trainingseinheit->tg_id)) echo $trainingseinheit->tg_id; ?></td>
										<td align="center"><a href="<?php echo URL . 'verwaltung/' ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
										<td align="center"><a data-toggle="modal" data-target="#bs_Modal" onclick="toggleModal('3','trainingseinheit','<?php echo $trainingseinheit->tr_id; ?>','<?php echo $trainingseinheit->name; ?>')"><span class="glyphicon glyphicon-remove"></span></a></td>

										<!--td><a href="<?php echo URL . 'verwaltung/delete_trainingseinheit/' . $trainingseinheit->tr_id; ?>"><span><i class="glyphicon glyphicon-remove"></i></span></a></td-->
									</tr>

								<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<?php /***Trainingsgruppen-Edit***/?>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#edit-accordion" href="#tgedit">Trainingsgruppen bearbeiten</a>
						</h4>
					</div>
					<div id="tgedit" class="panel-collapse collapse">
						<div class="panel-body">
							<h3>Liste aller Trainingsgruppen</h3>
							<table class="table">
								<thead style="background-color: #ddd; font-weight: bold;">
									<tr>
										<td>Trainingsgruppe</td>
										<td>Trainer</td>
										<td align="right" width="1%">Bearbeiten</td>
										<td align="right" width="1%">Löschen</td>
									</tr>
								</thead>
								<tbody>
								<?php foreach ($trainingsgruppen as $trainingsgruppe) { ?>
									<tr>
										<td><?php if (isset($trainingsgruppe->name)) echo $trainingsgruppe->name; ?></td>
										<td><?php if (isset($trainingsgruppe->tr_name)) echo $trainingsgruppe->tr_name; ?></td>
										<td align="center"><a href="<?php echo URL . 'verwaltung/' ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
										<td align="center"><a data-toggle="modal" data-target="#bs_Modal" onclick="toggleModal('3','trainingsgruppe','<?php echo $trainingsgruppe->tg_id; ?>','<?php echo $trainingsgruppe->name; ?>')"><span class="glyphicon glyphicon-remove"></span></a></td>
										<!--td align="center"><a data-toggle="modal" data-target="#tgModal<?php echo $trainingsgruppe->tg_id; ?>"><span class="glyphicon glyphicon-remove"></span></a></td>
										<!--td><a href="<?php echo URL . 'verwaltung/delete_trainingsgruppe/' . $trainingsgruppe->tg_id; ?>"><span><i class="glyphicon glyphicon-remove"></i></span></a></td-->
									</tr>

								<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<?php /***Turnier-Edit***/?>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#edit-accordion" href="#tuedit">Turniere bearbeiten </a>
						</h4>
					</div>
					<div id="tuedit" class="panel-collapse collapse">
						<div class="panel-body">
							<h3>Liste aller Turniere</h3>
							<table class="table">
								<thead style="background-color: #ddd; font-weight: bold;">
									<tr>
										<td>Turnier</td>
										<td>Liga</td>
										<td align="right" width="1%">Bearbeiten</td>
										<td align="right" width="1%">Löschen</td>
									</tr>
								</thead>
								<tbody>
								<?php foreach ($turniere as $turnier) { ?>
									<tr>
										<td><?php if (isset($turnier->name)) echo $turnier->name; ?></td>
										<td><?php if (isset($turnier->liga)){
											if ($turnier->liga == 1){
											echo "ja"; }else
											{ echo "nein"; }}?></td>
										<!--td align="center"><a href="<?php echo URL . 'verwaltung/edit_turnier/' ?>"><span class="glyphicon glyphicon-pencil"></span></a></td-->
										<td align="center"><a data-toggle="modal" data-target="#turnier_Modal" onclick="toggleModal('2','turnier','<?php echo $turnier->tu_id; ?>','<?php echo $turnier->name; ?>')"><span class="glyphicon glyphicon-pencil"></span></a></td>
										<td align="center"><a data-toggle="modal" data-target="#bs_Modal" onclick="toggleModal('3','turnier','<?php echo $turnier->tu_id; ?>','<?php echo $turnier->name; ?>')"><span class="glyphicon glyphicon-remove"></span></a></td>
										<!--td><a data-toggle="modal" data-target="#tuModal<?php echo $turnier->tu_id; ?>"><span class="glyphicon glyphicon-remove"></span></a></td-->
										<!--<td><a href="<?php echo URL . 'verwaltung/delete_turnier/' . $turnier->tu_id; ?>"><span><i class="glyphicon glyphicon-remove"></i></span></a></td>-->
									</tr>
								<?php } ?>


								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php require 'application/views/_templates/bootstrap_modal.php'; ?>
</div>

 <?php }
    else{ ?>
		<div class="container"> <?php
			echo "Diese Seite ist für Sie gesperrt"; ?>
		</div>
	<?php } ?>

