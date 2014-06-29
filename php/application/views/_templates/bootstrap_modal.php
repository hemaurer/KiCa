	<!-- bs-Modal -->
	<div class="modal fade" id="bs_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="ModalLabel"><div id="modalheader"></div></h4>
				</div>
				<div class="modal-body" id="modalbody">
				</div>
				<div class="modal-footer" id="modalfooter">
				</div>
			</div>
		</div>
	</div>
	
	<!-- success-Modal -->
	<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog" id="successModal_dialog">
		</div>
	</div>
	<!-- Spiel-Modal -->
	<div class="modal fade" id="spiel_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="ModalLabel">
						<div id="spielmodalheader">
						</div>
					</h4>
				</div>
				<div class="modal-body" id="spielmodalbody">
					<div class="form-horizontal">
						<div class="form-group">
							<label class="control-label col-md-4">Sparte</label>
							<div class="col-md-6">
								<select class="form-control" name="str_sparte" id="str_sparte2" size="1" onchange="selectFiller('2', 'str_sparte2', 'str_status2')" required>
									<option value="0" selected disabled>Sparte wählen</option>
									<?php foreach ($sparten as $sparte) { ?>
									<option><?php if (isset($sparte->name)) echo $sparte->name; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">Status</label>
							<div class="col-md-6">
								<select class="form-control" name="str_stat_name" id="str_status2" size="1" onchange="selectFiller('2','str_status2', 'str_tu_name2')" disabled required>
									<option value="0" selected disabled>Status wählen</option>
									
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">Turnier</label>
							<div class="col-md-6">
								<select class="form-control" name="str_tu_name" id="str_tu_name2" size="1" onchange="selectFiller('2','str_tu_name2', 'str_heim2')" disabled required>
									<option value="0" selected disabled>Turnier wählen</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">Heim Team</label>
							<div class="col-md-6">
								<select class="form-control" name="str_heim" id="str_heim2" size="1" onchange="selectFiller('2', 'str_heim2', 'str_auswaerts2')" disabled required>
									<option value="0" selected disabled>Team wählen</option>
									<?php foreach ($mannschaften as $mannschaft) { ?>
									<option><?php if (isset($mannschaft->name)) echo $mannschaft->name; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">Gegnerisches Team</label>
							<div class="col-md-6">
								<select class="form-control" name="str_auswaerts" id="str_auswaerts2" size="1" disabled required>
									<option value="0" selected disabled>Gegner wählen</option>
									<?php foreach ($mannschaften as $mannschaft) { ?>
									<option><?php if (isset($mannschaft->name)) echo $mannschaft->name; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">Spielort</label>
							<div class="col-md-6">
								<input class="form-control" type="text" name="str_ort" id="str_ort2" value="" placeholder="Spielort" required />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">Datum</label>
							<div class="col-md-6">
								<div data-provide="datepicker" class="input-group date">
									<input class="form-control" name="d_date" id="d_date2" type="text" placeholder="Beispiel 01.01.2011" required>
									<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">Zeit</label>
							<div align="right" class="col-md-6">
								<div class="input-group">
									<input class="form-control" id="d_time2" name="d_time" type="text" placeholder="Beispiel 12:00" required>
									<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
								</div>
							</div>
							<script> $('#d_time2').timepicker({showMeridian: false, defaultTime: false});</script>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">Tore</label>
							<div class="col-md-2">
								<input class="form-control" type="text" name="int_heimtor" id="int_heimtor"/>
							</div>
							<label class="control-label col-md-1">:</label>
							<div class="col-md-2">
								<input class="form-control" type="text" name="int_auswaertstor" id="int_auswaertstor" />
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer" id="spielmodalfooter">
				</div>
			</div>
		</div>
	</div>
	
	<!-- Turnier-Modal -->
	<div class="modal fade" id="turnier_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="ModalLabel"><div id="turniermodalheader"></div></h4>
				</div>
				<div class="modal-body" id="modalbody">
					<div class="form-horizontal">
						<div class="form-group">
							<label class="control-label col-md-4">Turniername*</label>
							<div class="col-md-6">
								<input class="form-control" type="text" name="str_name" id="str_name_edit_turnier" value="" placeholder="Turniername" required />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">Liga?*</label>
							<div class="col-md-2">
								<label>
									<input type="radio" id="int_liga" name="int_liga_ja" value="1">
									Ja
								</label>
							</div>
							<div class="col-md-2">
								<label>
									<input type="radio" id="int_liga" name="int_liga_nein" value="0">
									Nein
								</label>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">Sparten wählen</label>
							<div class="col-md-6">
								<ul class="form-control" id="checkboxSelect">
								<div class="checkbox">
									<?php
									foreach ($sparten as $sparte) { ?>
									<li>
											<label>
												<input type="checkbox" id="arr_sparte_option" name="arr_sparte_option[]" value="<?php if (isset($sparte->sparte_id)){ echo $sparte->sparte_id; ?>"><?php echo $sparte->name; }?>
											</label>
									</li>
									<?php
									} ?>
								</div>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer" id="turniermodalfooter">
				</div>
			</div>
		</div>
	</div>
	<!-- Turnier-Sparte-Modal -->
	<div class="modal fade" id="turnier_sparte_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="ModalLabel"><div id="turnier_sparte_header"></div></h4>
				</div>
				<div class="modal-body" id="turnier_sparte_body">
					<div class="form-horizontal">
						<div class="form-group">
							<label class="control-label col-md-4">Turnierteilnehmer wählen</label>
							<div class="col-md-6">
								<ul class="form-control" id="checkboxSelect">
									<div class="checkbox" id="turnier_sparte_checkbox">
										<?php 
											
											foreach ($mannschaften as $mannschaft) { ?>
											<li>
													<label>
														<input type="checkbox" id="arr_mannschaft_option" name="arr_mannschaft_option[]" value="<?php if (isset($mannschaft->m_id)){ echo $mannschaft->m_id; ?>"><?php echo $mannschaft->name;} ?>
													</label>
											</li>
											<?php 
											$i++;} ?>
									</div>
								</ul>
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-4">Gewinner</label>
							<div class="col-md-6">
								<select class="form-control" name="str_gewinner" id="str_gewinner_edit_turnier_sparte" size="1" >
									<option value="0" selected disabled>Gewinner wählen</option>
									<?php foreach ($mannschaften as $mannschaft) { ?>
									<option><?php if (isset($mannschaft->name)) echo $mannschaft->name; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						
					</div>
				</div>
				<div class="modal-footer" id="turnier_sparte_footer">
				</div>
			</div>
		</div>
	</div>
	
	<!-- Trainingseinheit-Modal -->			
	<div class="modal fade" id="trainingseinheit_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="ModalLabel"><div id="trainingseinheitheader"></div></h4>
				</div>
				<div class="modal-body" id="trainingseinheitbody">
					<div class="form-horizontal">
								<div class="form-group">
									<label class="control-label col-md-4">Training(Name oder Beschreibung)*</label>
									<div class="col-md-6">
										<input class="form-control" type="text" name="str_name" id="str_name_edit_trainingseinheit" value="" placeholder="Training" required/>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4">Trainingsort*</label>
									<div class="col-md-6">
										<input class="form-control" type="text" name="str_ort" id="str_ort_edit_trainingseinheit" value="" placeholder="Trainingsort" required/>
									</div>
								</div>							
								<div class="form-group">
									<label class="control-label col-md-4">Trainer*</label>
									<div class="col-md-6">
										<select class="form-control" name="str_trainer" id="str_trainer_edit_trainingseinheit" size="1">
											<option value="0" selected disabled>Wählen...</option>
											<?php foreach ($personen as $person) { ?>
											<?php if ((isset($person->name))&&($person->betreuer == 1)){?><option><?php echo $person->name; ?></option><?php } ?>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4">Trainingsgruppe*</label>
									<div class="col-md-6">
										<select class="form-control" name="str_tg_name" id="str_tg_name_edit_trainingseinheit" size="1">
											<option value="0" selected disabled>Wählen...</option>
											<?php foreach ($trainingsgruppen as $trainingsgruppe) { ?>
											<option><?php if (isset($trainingsgruppe->name)) echo $trainingsgruppe->name; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4">Datum*</label>
									<div class="col-md-6">
										<div data-provide="datepicker" class="input-group date">
											<input class="form-control" name="d_date" id="d_date_edit_trainingseinheit" type="text" placeholder="Beispiel 01.01.2011" required>
											<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4">Zeit*</label>
									<div class="col-md-6">
										<div class="input-group">
											<input class="form-control" id="d_time_edit_trainingseinheit" name="d_time" type="text" placeholder="Beispiel 12:00" required>
											<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
										</div>
									</div>
									<script> $('#d_time_edit_trainingseinheit').timepicker({showMeridian: false, defaultTime: false});</script>
								</div>	
							</div>
				</div>
				<div class="modal-footer" id="trainingseinheitfooter">
				</div>
			</div>
		</div>
	</div>
	
	
	
	<!-- Trainingsgruppe-Modal -->
	<div class="modal fade" id="trainingsgruppe_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="ModalLabel"><div id="trainingsgruppemodalheader"></div></h4>
				</div>
				<div class="modal-body" id="modalbody">
					<div class="form-horizontal">
						<div class="form-group">
							<label class="control-label col-md-4">Trainingsgruppe*</label>
							<div class="col-md-6">
								<input class="form-control" type="text" id="str_name_edit_trainingsgruppe" value="" placeholder="Trainingsgruppe" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">Teilnehmer wählen</label>
							<div class="col-md-6">
								<ul class="form-control" id="checkboxSelect">
								<div class="checkbox">
									<?php	
									foreach ($personen as $person) { 
									if ($person->betreuer != 1){ ?>
									<li>
											<label>
												<input type="checkbox" name="arr_teilnehmer_option[]" id="arr_teilnehmer_option" value="<?php if (isset($person->p_id)){echo $person->p_id; } ?>"><?php echo $person->v_name; ?> <?php echo $person->name; ?>
											</label>
									</li>
									<?php 
									}} ?>
								</div>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer" id="trainingsgruppemodalfooter">
				</div>
			</div>
		</div>
	</div>