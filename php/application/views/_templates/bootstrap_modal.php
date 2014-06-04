	<!-- bs-Modal -->
	<div class="modal fade" id="bs_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="pModalLabel"><div id="modalheader"></div></h4>
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

	<!-- Turnier-Modal -->
	<div class="modal fade" id="turnier_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="pModalLabel"><div id="turniermodalheader"></div></h4>
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
							<label class="control-label col-md-4">Gewinner</label>
							<div class="col-md-6">
								<select class="form-control" id="str_gewinner" size="1">
									<option></option>
									<?php foreach ($mannschaften as $mannschaft) { ?>
										<option><?php if (isset($mannschaft->name)) echo $mannschaft->name; ?></option>
									<?php } ?>
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