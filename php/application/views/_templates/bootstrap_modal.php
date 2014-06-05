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