<?php
if(isset(Application::$parm_1)){
	?>

<div class="container">
	<!-- Beinhaltet alle Daten zu eintragen -->

	<div id="spartenText">
		<h3>Tabelle der <?php echo $spartenDaten[(Application::$parm_1 - 1)]->Sparte; ?></h3>
	</div>


			<table class="table">
				<thead style="background-color: #ddd; font-weight: bold;">
					<tr>
						<td>Team</td>
						<td>Spiele</td>
						<td>S</td>
						<td>U</td>
						<td>N</td>
						<td>Punkte</td>
						<td>Tore</td>
						<td>TD</td>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($ligatabelle as $eintrag) { ?>
					<tr>
						<td><?php if (isset($eintrag->Team)) echo $eintrag->Team; ?></td>
						<td><?php if (isset($eintrag->Spiele)) echo $eintrag->Spiele; ?></td>
						<td><?php if (isset($eintrag->S)) echo $eintrag->S; ?></td>
						<td><?php if (isset($eintrag->U)) echo $eintrag->U; ?></td>
						<td><?php if (isset($eintrag->N)) echo $eintrag->N; ?></td>
						<td><?php if (isset($eintrag->Punkte)) echo $eintrag->Punkte; ?></td>
						<td><?php if (isset($eintrag->Tore)) echo $eintrag->Tore; ?></td>
						<td><?php if (isset($eintrag->TD)) echo $eintrag->TD; ?></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>

 <?php }
    else{ ?>
		<div class="container"> <?php
			echo "Bitte über die Navigation eine Liga wählen."; ?>
		</div>
	<?php } ?>
</div><!-- End Container  -->
