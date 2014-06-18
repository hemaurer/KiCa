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
									<label class="control-label col-md-4">Sparte*</label>
									<div class="col-md-6">
										<select class="form-control" name="str_sparte" id="str_sparte" size="1" onchange="selectFiller('str_sparte', 'str_status')" required>
											<option value="0" selected disabled>Sparte wählen</option>
											<?php foreach ($sparten as $sparte) { ?>
											<option><?php if (isset($sparte->name)) echo $sparte->name; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4">Status*</label>
									<div class="col-md-6">
										<select class="form-control" name="str_stat_name" id="str_status" size="1" onchange="selectFiller('str_status', 'str_tu_name')" disabled required>
											<option value="0" selected disabled>Status wählen</option>
											
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4">Turnier*</label>
									<div class="col-md-6">
										<select class="form-control" name="str_tu_name" id="str_tu_name" size="1" onchange="selectFiller('str_tu_name', 'str_heim')" disabled required>
											<option value="0" selected disabled>Turnier wählen</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4">Heim Team*</label>
									<div class="col-md-6">
										<select class="form-control" name="str_heim" id="str_heim" size="1" onchange="selectFiller('str_heim', 'str_auswaerts')" disabled required>
											<option value="0" selected disabled>Team wählen</option>
											<?php foreach ($mannschaften as $mannschaft) { ?>
											<option><?php if (isset($mannschaft->name)) echo $mannschaft->name; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4">Gegnerisches Team*</label>
									<div class="col-md-6">
										<select class="form-control" name="str_auswaerts" id="str_auswaerts" size="1" disabled required>
											<option value="0" selected disabled>Gegner wählen</option>
											<?php foreach ($mannschaften as $mannschaft) { ?>
											<option><?php if (isset($mannschaft->name)) echo $mannschaft->name; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4">Spielort*</label>
									<div class="col-md-6">
										<input class="form-control" type="text" name="str_ort" value="" placeholder="Spielort" required />
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4">Datum*</label>
									<div class="col-md-6">
										<div data-provide="datepicker" class="input-group date">
											<input class="form-control" name="d_date" type="text" placeholder="Beispiel 01.01.2011" required>
											<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4">Zeit*</label>
									<div align="right" class="col-md-6">
										<div class="input-group">
											<input class="form-control" id="timepicker1" name="d_time" type="text" placeholder="Beispiel 12:00" required>
											<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
										</div>
									</div>
									<script> $('#timepicker1').timepicker({showMeridian: false, defaultTime: false});</script>
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
							<label class="control-label col-md-4">Turniername</label>
							<div class="col-md-6">
								<input class="form-control" type="text" id="str_name" value="" placeholder="Turniername" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">Ligaturnier?</label>
							<div class="col-md-2">
								<label>
									<input type="radio" name="int_liga" value="1">
									Ja
								</label>
							</div>
							<div class="col-md-2">
								<label>
									<input type="radio" name="int_liga" value="0" checked>
									Nein
								</label>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer" id="turniermodalfooter">
				</div>
			</div>
		</div>
	</div>