<?php

class VerwaltungsModel
{
    function __construct($db) {
        try 
		{
            $this->db = $db;
        } 
		catch (PDOException $e) 
		{
            exit('Database connection could not be established.');
        }
    }
    
/***Personen***/
	
	public function get_alle_personen()
    {
        $sql = "SELECT * FROM person";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // libs/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change libs/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }
    public function add_person($str_nachname, $str_vorname, $d_gebdatum, $int_groesse, $str_bild, $b_betreuer, $int_tel, $str_user, $str_password)
    {
        // clean the input from javascript code for example
        // $artist = strip_tags($artist);
        // $track = strip_tags($track);
        // $link = strip_tags($link);
		// $str_nachname = strip_tags(str_nachname);
		// $str_vorname = strip_tags($str_vorname);
		// $d_gebdatum = strip_tags($d_gebdatum);
		// $int_groesse = strip_tags($int_groesse);
		// $str_bild = strip_tags($str_bild);
		// $b_betreuer = strip_tags($b_betreuer);
		// $int_tel = strip_tags($int_tel);
		// $str_user = strip_tags($str_user);
		$str_password = password_hash($str_password, PASSWORD_DEFAULT);
		
        $sql = "INSERT INTO person (name, v_name, geb_datum, groesse, bild, betreuer, tel, username, password) VALUES (:name, :v_name, :geb_datum, :groesse, :bild, :betreuer, :tel, :username, :password)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':name' => $str_nachname, ':v_name' => $str_vorname, ':geb_datum' => $d_gebdatum, ':groesse' => $int_groesse, ':bild' => $str_bild, ':betreuer' => $b_betreuer, ':tel' => $int_tel, ':username' => $str_user, ':password' => $str_password ));
    }
	public function edit_person($p_id, $str_nachname, $str_vorname, $d_gebdatum, $int_groesse, $str_bild, $b_betreuer, $int_tel, $str_user, $str_password)
    {
		$sql = "UPDATE person SET name=?, v_name=?, geb_datum=?, groesse=?, bild=?, betreuer=?, tel=?, username=?, password=? WHERE p_id=?";
		$query = $this->db->prepare($sql);
		$query->execute(array($str_nachname, $str_vorname, $d_gebdatum, $int_groesse, $str_bild, $b_betreuer, $int_tel, $str_user, $str_password, $p_id));
	}
    public function delete_person($p_id)
    {
        $sql = "DELETE FROM person WHERE p_id = :p_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':p_id' => $p_id));
    }

/***Spiele***/
	
	public function get_alle_spiele()
    {
        $sql = "SELECT * FROM spiel";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
	public function add_spiel($str_ort, $int_heim, $int_auswaerts, $int_h_tore, $int_a_tore, $int_stat_id, $d_zeit, $int_tu_id)
    {
		// $str_ort = strip_tags($str_ort);
		// $int_heim = strip_tags($int_heim);
		// $int_auswaerts = strip_tags($int_auswaerts);
		// $int_h_tore = strip_tags($int_h_tore);
		// $int_a_tore = strip_tags($int_a_tore);
		// $int_stat_id = strip_tags($int_stat_id);
		// $d_zeit = strip_tags($d_zeit);
		// $int_tu_id = strip_tags($int_tu_id);
		
        $sql = "INSERT INTO spiel (ort, heim, auswaerts, h_tore, a_tore, stat_id, zeit, tu_id) VALUES (:ort, :heim, :auswaerts, :h_tore, :a_tore, :stat_id, :zeit, :tu_id)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':ort' => $str_ort, ':heim' => $int_heim, ':auswaerts' => $int_auswaerts, ':h_tore' => $int_h_tore, ':a_tore' => $int_a_tore, ':stat_id' => $int_stat_id, ':zeit' => $d_zeit, ':tu_id' => $int_tu_id));
    }
	public function edit_spiel($s_id, $str_ort, $int_heim, $int_auswaerts, $int_h_tore, $int_a_tore, $int_stat_id, $d_zeit, $int_tu_id)
    {
		$sql = "UPDATE spiel SET ort=?, heim=?, auswaerts=?, h_tore=?, a_tore=?, stat_id=?, zeit=?, tu_id=? WHERE s_id=?";
		$query = $this->db->prepare($sql);
		$query->execute(array($str_ort, $int_heim, $int_auswaerts, $int_h_tore, $int_a_tore, $int_stat_id, $d_zeit, $int_tu_id, $s_id));
	}
    public function delete_spiel($s_id)
    {
        $sql = "DELETE FROM spiel WHERE s_id = :s_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':s_id' => $s_id));
    }

/***Mannschaften***/

	public function get_alle_mannschaften()
    {
        $sql = "SELECT * FROM mannschaft";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
	public function add_mannschaft($str_name)
    {
        $sql = "INSERT INTO mannschaft (name) VALUES (:name)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':name' => $str_name));
    }
	public function edit_mannschaft($m_id, $str_name)
    {
		$sql = "UPDATE mannschaft SET name=? WHERE m_id=?";
		$query = $this->db->prepare($sql);
		$query->execute(array($str_name, $m_id));
	}
    public function delete_mannschaft($m_id)
    {
        $sql = "DELETE FROM mannschaft WHERE m_id = :m_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':m_id' => $m_id));
    }

/***Trainingseinheit***/

	public function get_alle_trainingseinheiten()
    {
        $sql = "SELECT * FROM trainingseinheit";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
	public function add_trainingseinheit($str_name, $str_ort, $d_zeit, $int_tg_id)
    {
        $sql = "INSERT INTO trainingseinheit (name, ort, zeit, tg_id) VALUES (:name, :ort, :zeit, :tg_id)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':name' => $str_name, ':ort' => $str_ort, ':zeit' => $d_zeit, ':tg_id' => $int_tg_id));
    }
	public function edit_trainingseinheit($tr_id, $str_name, $str_ort, $d_zeit, $int_tg_id)
    {
		$sql = "UPDATE trainingseinheit SET name=?, ort=?, zeit=?, tg_id=? WHERE tr_id=?";
		$query = $this->db->prepare($sql);
		$query->execute(array($str_name, $str_ort, $d_zeit, $int_tg_id, $tr_id));
	}
    public function delete_trainingseinheit($tr_id)
    {
        $sql = "DELETE FROM trainingseinheit WHERE tr_id = :tr_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':tr_id' => $tr_id));
    }

/***Trainingsgruppe***/

	public function get_alle_trainingsgruppen()
    {
        $sql = "SELECT * FROM trainingsgruppe";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
	public function add_trainingsgruppe($str_name, $int_trainer)
    {
        $sql = "INSERT INTO trainingsgruppe (name, trainer) VALUES (:name, :trainer)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':name' => $str_name, ':trainer' => $int_trainer));
    }
	public function edit_trainingsgruppe($tg_id, $str_name, $int_trainer)
    {
		$sql = "UPDATE trainingsgruppe SET name=?, trainer=? WHERE tg_id=?";
		$query = $this->db->prepare($sql);
		$query->execute(array($str_name, $int_trainer, $tg_id));
	}
    public function delete_trainingsgruppe($tg_id)
    {
        $sql = "DELETE FROM trainingsgruppe WHERE tg_id = :tg_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':tg_id' => $tg_id));
    }

/***Turnier***/

	public function get_alle_turniere()
    {
        $sql = "SELECT * FROM turnier";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
	public function add_turnier($str_name, $int_gewinner)
    {
        $sql = "INSERT INTO turnier (name, gewinner) VALUES (:name, :gewinner)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':name' => $str_name, ':gewinner' => $int_gewinner));
    }
	public function edit_turnier($tu_id, $str_name, $int_gewinner)
    {
		$sql = "UPDATE turnier SET name=?, gewinner=? WHERE tu_id=?";
		$query = $this->db->prepare($sql);
		$query->execute(array($str_name, $int_gewinner, $tu_id));
	}
    public function delete_turnier($tu_id)
    {
        $sql = "DELETE FROM turnier WHERE tu_id = :tu_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':tu_id' => $tu_id));
    }

}?>