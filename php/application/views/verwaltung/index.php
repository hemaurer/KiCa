<head>   
   <title>KiCa - Verwaltung</title>
   <script type="text/javascript">$('#timepicker1').timepicker();</script>
   
</head>
<?php
	if (isset($_SESSION['user_login_status']) AND $_SESSION['betreuer'] == 1){
?>

<div class="container">
	<div class="panel-group" id="accordion">
		<?php /***Personen***/?>
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
					<h4>Liste aller Personen</h4>
					<table class="table">
						<thead style="background-color: #ddd; font-weight: bold;">
							<tr>
								<td>ID</td>
								<td>Nachname</td>
								<td>Vorname</td>
								<td>Geburtsdatum</td>
								<td>Löschen</td>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($personen as $person) { ?>
							<tr>
								<td><?php if (isset($person->p_id)) echo $person->p_id; ?></td>
								<td><?php if (isset($person->name)) echo $person->name; ?></td>
								<td><?php if (isset($person->v_name)) echo $person->v_name; ?></td>
								<td><?php if (isset($person->geb_datum)) echo $person->geb_datum; ?></td>
								<td><a href="<?php echo URL . 'verwaltung/delete_person/' . $person->p_id; ?>">x</a></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		
		<?php /***Spiele-Container***/?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Neue Spiele hinzufügen</a>
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
							<div class="col-md-offset-4 col-md-4">
								<input type="submit" class="btn btn-default" name="submit_add_spiel" value="Speichern"/>
							</div>
						</div>
					</form>
					<h4>Liste aller Spiele</h4>
					<table class="table">
						<thead style="background-color: #ddd; font-weight: bold;">
						<tr>
							<td>Id</td>
							<td>Ort</td>
							<td>Heim Team</td>
							<td>Gegnerisches Team</td>
							<td>Zeit</td>
							<td>Löschen</td>
						</tr>
						</thead>
						<tbody>
						<?php foreach ($spiele as $spiel) { ?>
							<tr>
								<td><?php if (isset($spiel->s_id)) echo $spiel->s_id; ?></td>
								<td><?php if (isset($spiel->ort)) echo $spiel->ort; ?></td>
								<td><?php if (isset($spiel->heim)) echo $spiel->heim; ?></td>
								<td><?php if (isset($spiel->auswaerts)) echo $spiel->auswaerts; ?></td>
								<td><?php if (isset($spiel->zeit)) echo $spiel->zeit; ?></td>
								<td><a href="<?php echo URL . 'verwaltung/delete_spiel/' . $spiel->s_id; ?>">x</a></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>	
		<?php /***Mannschaften-Container***/?>

		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Neue Mannschaften hinzufügen</a>
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

					<h4>Liste aller Mannschaften</h4>
					<table class="table">
						<thead style="background-color: #ddd; font-weight: bold;">
							<tr>
								<td>Id</td>
								<td>Mannschaftsname</td>
								<td>Löschen</td>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($mannschaften as $mannschaft) { ?>
							<tr>
								<td><?php if (isset($mannschaft->m_id)) echo $mannschaft->m_id; ?></td>
								<td><?php if (isset($mannschaft->name)) echo $mannschaft->name; ?></td>
								<td><a href="<?php echo URL . 'verwaltung/delete_mannschaft/' . $mannschaft->m_id; ?>">x</a></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>	
		<?php /***Trainingseinheiten-Container***/?>

		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">Neue Trainingseinheiten hinzufügen</a>
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

					<h3>Liste aller Trainingseinheiten</h3>
					<table class="table">
						<thead style="background-color: #ddd; font-weight: bold;">
							<tr>
								<td>Id</td>
								<td>Name</td>
								<td>Ort</td>
								<td>Zeit</td>
								<td>Trainingsgruppe</td>
								<td>Löschen</td>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($trainingseinheiten as $trainingseinheit) { ?>
							<tr>
								<td><?php if (isset($trainingseinheit->tr_id)) echo $trainingseinheit->tr_id; ?></td>
								<td><?php if (isset($trainingseinheit->name)) echo $trainingseinheit->name; ?></td>
								<td><?php if (isset($trainingseinheit->ort)) echo $trainingseinheit->ort; ?></td>
								<td><?php if (isset($trainingseinheit->zeit)) echo $trainingseinheit->zeit; ?></td>
								<td><?php if (isset($trainingseinheit->tg_id)) echo $trainingseinheit->tg_id; ?></td>
								<td><a href="<?php echo URL . 'verwaltung/delete_trainingseinheit/' . $trainingseinheit->tr_id; ?>">x</a></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>	
		
		<?php /***Trainingsgruppen-Container***/?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">Neue Trainingsgruppen hinzufügen</a>
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
							<label class="control-label col-md-4">Trainer*</label>
							<div class="col-md-4">
								<select class="form-control" name="str_trainer" size="1" required>
									<option></option>
									<?php foreach ($personen as $person) { ?>
									<option><?php if ((isset($person->name))&&($person->betreuer = 1)) echo $person->name; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-offset-4 col-md-4">
								<input class="btn btn-default" type="submit" name="submit_add_trainingsgruppe" value="Speichern" />
							</div>
						</div>
					</form>

					<h3>Liste aller Trainingsgruppen</h3>
					<table class="table">
						<thead style="background-color: #ddd; font-weight: bold;">
							<tr>
								<td>Id</td>
								<td>Trainingsgruppe</td>
								<td>Trainer</td>
								<td>Löschen</td>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($trainingsgruppen as $trainingsgruppe) { ?>
							<tr>
								<td><?php if (isset($trainingsgruppe->tg_id)) echo $trainingsgruppe->tg_id; ?></td>
								<td><?php if (isset($trainingsgruppe->name)) echo $trainingsgruppe->name; ?></td>
								<td><?php if (isset($trainingsgruppe->trainer)) echo $trainingsgruppe->trainer; ?></td>
								<td><a href="<?php echo URL . 'verwaltung/delete_trainingsgruppe/' . $trainingsgruppe->tg_id; ?>">x</a></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>	
		
		<?php /***Turnier-Container***/?>
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
							<label class="control-label col-md-4">Gewinner</label>
							<div class="col-md-4">
								<input class="form-control" type="text" name="int_gewinner" value="" placeholder="Gewinner" />
							</div>
						</div>	
						<div class="form-group">
							<div class="col-md-offset-4 col-md-4">
								<input class="btn btn-default" type="submit" name="submit_add_turnier" value="Speichern" />
							</div>
						</div>
					</form>

					<h3>Liste aller Turniere</h3>
					<table class="table">
						<thead style="background-color: #ddd; font-weight: bold;">
							<tr>
								<td>Id</td>
								<td>Turnier</td>
								<td>Gewinner</td>
								<td>Löschen</td>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($turniere as $turnier) { ?>
							<tr>
								<td><?php if (isset($turnier->tu_id)) echo $turnier->tu_id; ?></td>
								<td><?php if (isset($turnier->name)) echo $turnier->name; ?></td>
								<td><?php if (isset($turnier->gewinner)) echo $turnier->gewinner; ?></td>
								<td><a href="<?php echo URL . 'verwaltung/delete_turnier/' . $turnier->tu_id; ?>">x</a></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<?php }
    else{
	echo "Diese Seite ist für Sie gesperrt";}                
	?>

