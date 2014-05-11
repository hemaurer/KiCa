<head>   
   <title>KiCa - Verwaltung</title>
</head>
<div class="container">
    <h2>You are in the View: application/views/verwaltung/index.php (everything in this box comes from that file)</h2>
    <div>
        <h3>Neue Person hinzufügen</h3>
        <form action="<?php echo URL; ?>verwaltung/edit_person" method="POST">
            <label>ID</label>
            <input type="text" name="p_id" value="" required />
		    <label>Nachname</label>
            <input type="text" name="str_nachname" value="" required />
            <label>Vorname</label>
            <input type="text" name="str_vorname" value="" required />
            <label>Geburtsdatum</label>
            <input type="text" name="d_gebdatum" value="" required/>
			<label>Groesse</label>
            <input type="text" name="int_groesse" value="" />
			<label>Bild</label>
            <input type="text" name="str_bild" value="" />
			<label>Betreuer?</label>
            <input type="text" name="b_betreuer" value="" required/>
			<label>Telefonnummer</label>
            <input type="text" name="int_tel" value="" />
			<label>Benutzername</label>
            <input type="text" name="str_user" value="" />
			<label>Passwort</label>
            <input type="password" name="str_password" value="" />
            <input type="submit" name="submit_edit_person" value="Speichern" />
        </form>
    </div>
    <div>
        <h3>Liste aller Personen (data from first model)</h3>
        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>Id</td>
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

<div class="container">
    <div>
        <h3>Neue Spiele hinzufügen</h3>
        <form action="<?php echo URL; ?>verwaltung/add_spiel" method="POST">
		    <label>Spielort</label>
            <input type="text" name="str_ort" value="" required />
            <label>Heim Team</label>
            <input type="text" name="int_heim" value="" required />
            <label>Gegnerisches Team</label>
            <input type="text" name="int_auswaerts" value="" required/>
			<label>Status</label>
            <input type="text" name="int_stat_id" value="" required/>
			<label>Zeit</label>
            <input type="text" name="d_zeit" value="" required/>
            <input type="submit" name="submit_add_spiel" value="Speichern" />
        </form>
    </div>
    <div>
        <h3>Liste aller Spiele</h3>
        <table>
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
