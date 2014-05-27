<head>
   <title>KiCa - Termine</title>
</head>


<div class="container">
	<!-- Beinhaltet alle Daten zu Terminen -->


	<h3>Spiele</h3>
			<table class="table">
				<thead style="background-color: #ddd; font-weight: bold;">
					<tr>
						<td>#</td>
						<td>Ort</td>
						<td>Heim</td>
						<td>Auswärts</td>
						<td>Heimtore</td>
						<td>Auswärtstore</td>
						<td>Status</td>
						<td>Uhrzeit</td>
						<td>Turnier</td>
						<td>Sparte</td>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($termine_spiele as $termin) { ?>
					<tr>
						<td><?php if (isset($termin->s_id)) echo $termin->s_id; ?></td>
						<td><?php if (isset($termin->Ort)) echo $termin->Ort; ?></td>
						<td><?php if (isset($termin->Heim)) echo $termin->Heim; ?></td>
						<td><?php if (isset($termin->Auswaerts)) echo $termin->Auswaerts; ?></td>
						<td><?php if (isset($termin->Heimtore)) echo $termin->Heimtore; ?></td>
						<td><?php if (isset($termin->Auswaertstore)) echo $termin->Auswaertstore; ?></td>
						<td><?php if (isset($termin->Status)) echo $termin->Status; ?></td>
						<td><?php if (isset($termin->Uhrzeit)) echo $termin->Uhrzeit; ?></td>
						<td><?php if (isset($termin->Turnier)) echo $termin->Turnier; ?></td>
						<td><?php if (isset($termin->Sparte)) echo $termin->Sparte; ?></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>

	<h3>Trainingseinheiten</h3>
			<table class="table">
				<thead style="background-color: #ddd; font-weight: bold;">
					<tr>
						<td>#</td>
						<td>Name</td>
						<td>Ort</td>
						<td>Uhrzeit</td>
						<td>Trainingsgruppe</td>
						<td>Trainer</td>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($termine_trainingseinheiten as $termin) { ?>
					<tr>
						<td><?php if (isset($termin->tr_id)) echo $termin->tr_id; ?></td>
						<td><?php if (isset($termin->Name)) echo $termin->Name; ?></td>
						<td><?php if (isset($termin->Ort)) echo $termin->Ort; ?></td>
						<td><?php if (isset($termin->Uhrzeit)) echo $termin->Uhrzeit; ?></td>
						<td><?php if (isset($termin->Trainingsgruppe)) echo $termin->Trainingsgruppe; ?></td>
						<td><?php if (isset($termin->Trainer)) echo $termin->Trainer; ?></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>

</div><!-- End Container  -->
