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
	<!-- Personen-Modal -->
	<div class="modal fade" id="person_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="ModalLabel"><div id="personmodalheader"></div></h4>
				</div>
				<div class="modal-body" id="personmodalbody">
				</div>
				<div class="personenfooter" id="personmodalfooter">
				</div>
			</div>
		</div>
	</div>
	
	
	
	<!-- Spiel-Modal -->
	<!--div class="modal fade" id="spiel_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="ModalLabel"><div id="spielmodalheader"></div></h4>
				</div>
				<div class="modal-body" id="modalbody">
					
					<div class="form-horizontal">
						<div class="form-group">
							<label class="control-label col-md-4">Spielort</label>
							<div class="col-md-6">
								<input class="form-control" type="text" id="str_ort" value="" placeholder="Spielort" required />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">Heim Team</label>
							<div class="col-md-6">
								<select class="form-control" id="str_heim" size="1" required>
									<option></option>
									<?php foreach ($mannschaften as $mannschaft) { ?>
									<option><?php if (isset($mannschaft->name)) echo $mannschaft->name; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">Gegnerisches Team</label>
							<div class="col-md-6">
								<select class="form-control" id="str_auswaerts" size="1" required>
									<option></option>
									<?php foreach ($mannschaften as $mannschaft) { ?>
									<option><?php if (isset($mannschaft->name)) echo $mannschaft->name; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">Status</label>
							<div class="col-md-6">
								<select class="form-control" id="str_stat_name" size="1" required>
									<option></option>
									<?php foreach ($stats as $status) { ?>
									<option><?php if (isset($status->status)) echo $status->status; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">Zeit</label>
							<div class="col-md-4">
								<div class="sandbox-container input-group ">
									<input class="form-control" id="d_date" type="text">
									<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
								</div>
							</div>
							<script> $('.sandbox-container input').datepicker();</script>
							<div class="col-md-3">
								<div class="input-group">
									<input class="form-control" id="timepicker1 d_time"  type="text">
									<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
								</div>
							</div>
							<script> $('#timepicker1').timepicker({showMeridian: false});</script>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">Turnier</label>
							<div class="col-md-6">
								<select class="form-control" id="str_tu_name" size="1" required>
									<option></option>
									<?php foreach ($turniere as $turnier) { ?>
									<option><?php if (isset($turnier->name)) echo $turnier->name; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">Sparte</label>
							<div class="col-md-6">
								<select class="form-control" id="str_sparte" size="1" required>
									<option></option>
									<?php foreach ($sparten as $sparte) { ?>
									<option><?php if (isset($sparte->name)) echo $sparte->name; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
					</div>	
					
					
					
					
				</div>
				<div class="modal-footer" id="spielmodalfooter">
				</div>
			</div>
		</div-->
	
	
	
	
	
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
							<div class="col-md-6">
								<select class="form-control" id="int_liga" size="1">
									<option></option>
									<option value="1">Ja</option>
									<option value="0">Nein</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer" id="turniermodalfooter">
				</div>
			</div>
		</div>
	</div>