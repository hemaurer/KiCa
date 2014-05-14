<head>   
   <title>KiCa - Verwaltung</title>
</head>
<?php
	if (isset($_SESSION['user_login_status']) AND $_SESSION['betreuer'] == 1){
?>
<?php /***Personen-Container***/?>
<div class="container">
    <div>
        <h3>Neue Person hinzufügen</h3>
        <form action="<?php echo URL; ?>verwaltung/add_person" method="POST">
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
			<select name="b_betreuer" size="1">
				<option value="0">Nein</option>
				<option value="1">Ja</option>
			</select>
			<label>Telefonnummer</label>
            <input type="text" name="int_tel" value="" />
			<label>Benutzername</label>
            <input type="text" name="str_user" value="" />
			<label>Passwort</label>
            <input type="password" name="str_password" value="" />
            <input type="submit" name="submit_add_person" value="Speichern" />
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
<?php /***Spiele-Container***/?>
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
<?php /***Mannschaften-Container***/?>
<div class="container">
    <div>
        <h3>Neue Mannschaften hinzufügen</h3>
        <form action="<?php echo URL; ?>verwaltung/add_mannschaft" method="POST">
		    <label>Mannschaftsname</label>
            <input type="text" name="str_name" value="" required />
            <input type="submit" name="submit_add_mannschaft" value="Speichern" />
        </form>
    </div>
    <div>
        <h3>Liste aller Mannschaften</h3>
        <table>
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
<?php /***Trainingseinheiten-Container***/?>
<div class="container">
    <div>
        <h3>Neue Trainingseinheiten hinzufügen</h3>
        <form action="<?php echo URL; ?>verwaltung/add_trainingseinheit" method="POST">
		    <label>Training(Name oder Beschreibung)</label>
            <input type="text" name="str_name" value="" required />
			<label>Trainingsort</label>
            <input type="text" name="str_ort" value="" required />
			<label>Zeit</label>
            <input type="text" name="d_zeit" value="" required/>
			<label>Trainingsgruppe</label>
            <input type="text" name="int_tg_id" value="" required/>
            <input type="submit" name="submit_add_trainingseinheit" value="Speichern" />
        </form>
    </div>
    <div>
        <h3>Liste aller Trainingseinheiten</h3>
        <table>
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
<?php /***Trainingsgruppen-Container***/?>
<div class="container">
    <div>
        <h3>Neue Trainingsgruppe hinzufügen</h3>
        <form action="<?php echo URL; ?>verwaltung/add_trainingsgruppe" method="POST">
		    <label>Trainingsgruppenname</label>
            <input type="text" name="str_name" value="" required />
			<label>Trainer</label>
            <input type="text" name="int_trainer" value="" required />
            <input type="submit" name="submit_add_trainingsgruppe" value="Speichern" />
        </form>
    </div>
    <div>
        <h3>Liste aller Trainingsgruppen</h3>
        <table>
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
<?php /***Turnier-Container***/?>
<div class="container">
    <div>
        <h3>Neues Turnier hinzufügen</h3>
        <form action="<?php echo URL; ?>verwaltung/add_turnier" method="POST">
		    <label>Turniername</label>
            <input type="text" name="str_name" value="" required />
			<label>Gewinner</label>
            <input type="text" name="int_gewinner" value="" />
            <input type="submit" name="submit_add_turnier" value="Speichern" />
        </form>
    </div>
    <div>
        <h3>Liste aller Turniere</h3>
        <table>
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
<?php }
    else{
	echo "Diese Seite ist für Sie gesperrt";}                
	?>

