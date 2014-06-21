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
        $sql = "SELECT * FROM person ORDER BY name";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
    public function add_person($str_nachname, $str_vorname, $d_date, $int_groesse, $b_betreuer, $int_tel)
    {
		$str_bild = "public/img/profilbilder/_noimage.jpg";
		$str_user = $str_vorname.".".$str_nachname;
		
		/*Benutzername prüfen ob bereits vorhanden*/
		$sql = "SELECT username FROM person";
        $query = $this->db->prepare($sql);
        $query->execute();
		$personen = $query->fetchAll();
		$i="1"; 
		foreach ($personen as $person){
			if ($str_user == $person->username){
				while ($str_user == $person->username){
					$str_user = $str_vorname.".".$str_nachname.$i;
					$i++;
				}
			}
		}
		
		$str_password = password_hash("kica", PASSWORD_DEFAULT);
		$d_obj = new DateTime($d_date);
		$d_gebdatum = $d_obj->format('Y-m-d');
        $sql = "INSERT INTO person (name, v_name, geb_datum, groesse, bild, betreuer, tel, username, password) VALUES (:name, :v_name, :geb_datum, :groesse, :bild, :betreuer, :tel, :username, :password)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':name' => $str_nachname, ':v_name' => $str_vorname, ':geb_datum' => $d_gebdatum, ':groesse' => $int_groesse, ':bild' => $str_bild, ':betreuer' => $b_betreuer, ':tel' => $int_tel, ':username' => $str_user, ':password' => $str_password ));
    }
	public function edit_person($p_id, $str_nachname, $str_vorname, $d_date, $int_groesse, $b_betreuer, $int_tel)
    {	
		/*Vergleichsdaten der Person*/
		$sql = "SELECT * FROM person WHERE p_id=?";
        $query = $this->db->prepare($sql);
        $query->execute(array($p_id));
		$person = $query->fetch(PDO::FETCH_OBJ);
		
		/*Prüfung des Vornamens & Nachnamens & Benutzernamens*/
		if (($str_vorname == null) && ($str_nachname == null)){
			$str_vorname =	$person->v_name;
			$str_nachname =	$person->name;
			$str_user = $person->username;
		}else if(($str_vorname == null) && ($str_nachname != null)){
			$str_vorname =	$person->v_name;
			$str_user = $str_vorname.".".$str_nachname;
			/*Benutzername prüfen ob bereits vorhanden*/
			$sql = "SELECT username FROM person";
			$query = $this->db->prepare($sql);
			$query->execute();
			$usernames = $query->fetchAll();
			$i="1"; 
			foreach ($usernames as $username){
				if ($str_user == $username->username){
					
					while ($str_user == $username->username){
						$str_user = $str_vorname.".".$str_nachname.$i;
						$i++;
					}
				}
			}
		}else if(($str_vorname != null) && ($str_nachname == null)){
			$str_nachname =	$person->name;
			$str_user = $str_vorname.".".$str_nachname;
			/*Benutzername prüfen ob bereits vorhanden*/
			$sql = "SELECT username FROM person";
			$query = $this->db->prepare($sql);
			$query->execute();
			$usernames = $query->fetchAll();
			$i="1"; 
			foreach ($usernames as $username){
				if ($str_user == $username->username){
					
					while ($str_user == $username->username){
						$str_user = $str_vorname.".".$str_nachname.$i;
						$i++;
					}
				}
			}
		}else
		{
			$str_user = $str_vorname.".".$str_nachname;
			/*Benutzername prüfen ob bereits vorhanden*/
			$sql = "SELECT username FROM person";
			$query = $this->db->prepare($sql);
			$query->execute();
			$usernames = $query->fetchAll();
			$i="1"; 
			foreach ($usernames as $username){
				if ($str_user == $username->username){
					
					while ($str_user == $username->username){
						$str_user = $str_vorname.".".$str_nachname.$i;
						$i++;
					}
				}
			}
		}
		
		
		
		/*Datumsfeld prüfen*/
		if ($d_date == null){
			$d_gebdatum = $person->geb_datum;
		}else{
			$d_obj = new DateTime($d_date);
			$d_gebdatum = $d_obj->format('Y-m-d');
		}
		
		/*Groessefeld prüfen*/
		if ($int_groesse == null){
			$int_groesse = $person->groesse;
		}
		
		/*Telefonfeld prüfen*/
		if ($int_tel == null){
			$int_tel = $person->tel;
		}
		
		$str_bild = $person->bild;
		
		/*Updaten der Person*/
		$sql = "UPDATE person SET name=?, v_name=?, geb_datum=?, groesse=?, bild=?, betreuer=?, tel=?, username=? WHERE p_id=?";
		$query = $this->db->prepare($sql);
		$query->execute(array($str_nachname, $str_vorname, $d_gebdatum, $int_groesse, $str_bild, $b_betreuer, $int_tel, $str_user, $p_id));
		echo true;
	}
    public function reset_password($p_id)
    {
		$str_password = password_hash("kica", PASSWORD_DEFAULT);
		/*Updaten der Person*/
		$sql = "UPDATE person SET password=? WHERE p_id=?";
		$query = $this->db->prepare($sql);
		$query->execute(array($str_password, $p_id));
		echo true;
	}
	public function delete_person($p_id)
    {
        $sql = "DELETE FROM person WHERE p_id =?";
        $query = $this->db->prepare($sql);
        $query->execute(array($p_id));
		echo true;
    }

/***Spiele***/
	
	public function get_alle_spiele()
    {
        //$sql = "SELECT * FROM spiel ORDER BY zeit DESC";
		//$sql = "SELECT s.s_id, s.ort, s.heim, s.auswaerts, s.h_tore, s.a_tore, s.stat_id, s.zeit, s.tu_id, m.name as heimname, mm.auswaertsname FROM spiel s LEFT JOIN mannschaft m ON (s.heim = m.m_id) LEFT JOIN (SELECT spiel.auswaerts, mannschaft.m_id, mannschaft.name as auswaertsname FROM spiel, mannschaft WHERE spiel.auswaerts = mannschaft.m_id) mm ON (s.auswaerts = mm.m_id) ORDER BY s.zeit DESC  ";
        $sql = "SELECT spiel.s_id, spiel.ort as Ort, heim.name as Heim, auswaerts.name as Auswaerts, spiel.h_tore as Heimtore, spiel.a_tore as Auswaertstore, `status`.`status` as Status, spiel.zeit as Uhrzeit, turnier.name as Turnier , sparte.name AS Sparte
				FROM spiel 
					JOIN mannschaft as heim ON spiel.heim = heim.m_id
					JOIN mannschaft as auswaerts ON spiel.auswaerts = auswaerts.m_id
					JOIN `status` ON spiel.stat_id =`status`.stat_id
					JOIN turnier ON spiel.tu_id = turnier.tu_id
					JOIN sparte ON spiel.sparte_id = sparte.sparte_id
					ORDER BY spiel.zeit ASC";
		$query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
	public function add_spiel($str_ort, $str_heim, $str_auswaerts, $int_h_tore, $int_a_tore, $str_stat_name, $d_date, $d_time, $str_tu_name, $str_sparte_name)
    {
		/**Heimmannschaft auslesen und ID aus Datenbank heraussuchen und Array splitten**/
		$sql = "Select m_id FROM mannschaft WHERE  name = ?"; 	
        $query = $this->db->prepare($sql);						
		$query->execute(array($str_heim));						
		$arr_heim = $query->fetchAll();							
		foreach($arr_heim as $int_heim){						
			$int_heim = $int_heim->m_id;						
		};
		
		/**Auswaertsmannschaft auslesen und ID aus Datenbank heraussuchen und Array splitten**/
		$sql = "Select m_id FROM mannschaft WHERE  name = ?";	
        $query = $this->db->prepare($sql);						
        $query->execute(array($str_auswaerts));					
		$arr_auswaerts = $query->fetchAll();					
		foreach($arr_auswaerts as $int_auswaerts){				
			$int_auswaerts = $int_auswaerts->m_id;				
		};
		
		/**Turnier auslesen und ID aus Datenbank heraussuchen und Array splitten**/
		$sql = "Select tu_id FROM turnier WHERE  name = ?";	
        $query = $this->db->prepare($sql);						
        $query->execute(array($str_tu_name));					
		$arr_tu_id = $query->fetchAll();					
		foreach($arr_tu_id as $int_tu_id){				
			$int_tu_id = $int_tu_id->tu_id;				
		};
		
		/**Status auslesen und ID aus Datenbank heraussuchen und Array splitten**/
		$sql = "Select stat_id FROM status WHERE  status = ?";	
        $query = $this->db->prepare($sql);						
        $query->execute(array($str_stat_name));					
		$arr_stat_id = $query->fetchAll();					
		foreach($arr_stat_id as $int_stat_id){				
			$int_stat_id = $int_stat_id->stat_id;				
		};
		/**Sparte auslesen und ID aus Datenbank heraussuchen und Array splitten**/
		$sql = "Select sparte_id FROM sparte WHERE  name = ?";	
        $query = $this->db->prepare($sql);						
        $query->execute(array($str_sparte_name));					
		$arr_sparte_id = $query->fetchAll();					
		foreach($arr_sparte_id as $int_sparte_id){				
			$int_sparte_id = $int_sparte_id->sparte_id;				
		};
		/**Zeit formatieren**/
		$d_obj = new DateTime($d_date." ".$d_time);
		$d_zeit = $d_obj->format('Y-m-d H:i:s'); 
		
		/**Neues Spiel in Datenbank schreiben**/
        $sql = "INSERT INTO spiel (ort, heim, auswaerts, h_tore, a_tore, stat_id, zeit, tu_id, sparte_id) VALUES (:ort, :heim, :auswaerts, :h_tore, :a_tore, :stat_id, :zeit, :tu_id, :sparte_id)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':ort' => $str_ort, ':heim' => $int_heim, ':auswaerts' => $int_auswaerts, ':h_tore' => $int_h_tore, ':a_tore' => $int_a_tore, ':stat_id' => $int_stat_id, ':zeit' => $d_zeit, ':tu_id' => $int_tu_id, ':sparte_id' => $int_sparte_id));
    }
	public function edit_spiel($s_id, $str_ort, $str_heim, $str_auswaerts, $int_h_tore, $int_a_tore, $str_stat_name, $d_date, $d_time, $str_tu_name, $str_sparte_name)
    {
		/*Vergleichsdaten des Spiels*/
		$sql = "SELECT * FROM spiel WHERE s_id=?";
        $query = $this->db->prepare($sql);
        $query->execute(array($s_id));
		$spiel = $query->fetch(PDO::FETCH_OBJ); 
		
		/**Wenn Ort null wird der Ort von db genommen**/
		if ($str_ort == null){
			$str_ort = $spiel->ort;
		}
		
		/**Wenn Heim null wird der Heim von db genommen**/
		if ($str_heim == 0){
			$int_heim = $spiel->heim;
		}else{
			/*Mannschaft ID auslesen*/
			$sql = "SELECT m_id FROM mannschaft WHERE name=?";
			$query = $this->db->prepare($sql);
			$query->execute(array($str_heim));
			$int_heim = $query->fetch(PDO::FETCH_OBJ);
		}
	
		/**Wenn Auswaerts null wird der Auswaerts von db genommen**/
		if ($str_auswaerts == 0){
			$int_auswaerts = $spiel->auswaerts;
		}else{
			/*Mannschaft ID auslesen*/
			$sql = "SELECT m_id FROM mannschaft WHERE name=?";
			$query = $this->db->prepare($sql);
			$query->execute(array($str_auswaerts));
			$int_auswaerts = $query->fetch(PDO::FETCH_OBJ);
		}
		
		/**Tore auf null checken**/
		if ($int_h_tore == null){
			$int_h_tore = $spiel->h_tore;
		}
		if ($int_a_tore == null){
			$int_a_tore = $spiel->a_tore;
		}
		/**Status checken**/
		if ($str_stat_name == 0){
			$int_stat_id = $spiel->stat_id;
		}else{
			/*Mannschaft ID auslesen*/
			$sql = "SELECT stat_id FROM status WHERE status=?";
			$query = $this->db->prepare($sql);
			$query->execute(array($str_stat_name));
			$int_stat_id = $query->fetch(PDO::FETCH_OBJ);
		}
		
		/**Wenn Datum gleich 0 wird das Datum aus der Datenbank genommen **/
		if ($d_date == 0){
			$d_zeit = $spiel->zeit;
			$d_obj = new DateTime($d_zeit);
			$d_date = $d_obj->format('Y-m-d'); 
		}
		/**Wenn Zeit gleich 0 wird die Zeit aus der Datenbank genommen **/
		if ($d_time == 0){
			$d_zeit = $spiel->zeit;
			$d_obj = new DateTime($d_zeit);
			$d_time = $d_obj->format('H:i:s'); 
		}
		/**Zeit formatieren**/
		$d_obj = new DateTime($d_date." ".$d_time);
		$d_zeit = $d_obj->format('Y-m-d H:i:s');
		
		/**Turnier auf 0 checken**/
		if ($str_tu_name == 0){
			$int_tu_id = $spiel->tu_id;
		}else{
			/*Turnier ID auslesen*/
			$sql = "SELECT tu_id FROM turnier WHERE name=?";
			$query = $this->db->prepare($sql);
			$query->execute(array($str_tu_name));
			$int_tu_id = $query->fetch(PDO::FETCH_OBJ);
		}
		
		/**Sparte auf 0 checken**/
		if ($str_sparte_name == 0){
			$int_sparte_id = $spiel->sparte_id;
		}else{
			/*Turnier ID auslesen*/
			$sql = "SELECT tu_id FROM turnier WHERE name=?";
			$query = $this->db->prepare($sql);
			$query->execute(array($str_sparte_name));
			$int_sparte_id = $query->fetch(PDO::FETCH_OBJ);
		}
		
		
		$sql = "UPDATE spiel SET ort=?, heim=?, auswaerts=?, h_tore=?, a_tore=?, stat_id=?, zeit=?, tu_id=?, sparte_id=? WHERE s_id=?";
		$query = $this->db->prepare($sql);
		$query->execute(array($str_ort, $int_heim, $int_auswaerts, $int_h_tore, $int_a_tore, $int_stat_id, $d_zeit, $int_tu_id, $int_sparte_id, $s_id));
		echo true;
	}
    public function delete_spiel($s_id)
    {
        $sql = "DELETE FROM spiel WHERE s_id =?";
        $query = $this->db->prepare($sql);
        $query->execute(array($s_id));
		echo true;
    }
	public function get_select_options($index, $selectedOption, $nextSelectId, $str_sparteValue, $str_statusValue, $str_turnierValue, $str_heimValue, $str_auswaertsValue)
	{
		/*Sparten ID herauslesen*/
		$sql = "Select sparte_id FROM sparte WHERE  name = ?";	
		$query = $this->db->prepare($sql);						
		$query->execute(array($str_sparteValue));					
		$arr_sparte_id = $query->fetchAll();					
		foreach($arr_sparte_id as $int_sparte_id){				
			$int_sparte_id = $int_sparte_id->sparte_id;				
		};
		/**Turnier auslesen und ID aus Datenbank heraussuchen und Array splitten**/
		$sql = "Select tu_id FROM turnier WHERE  name = ?";	
        $query = $this->db->prepare($sql);						
        $query->execute(array($str_turnierValue));					
		$arr_tu_id = $query->fetchAll();					
		foreach($arr_tu_id as $int_tu_id){				
			$int_tu_id = $int_tu_id->tu_id;				
		};
		/*Wenn die nächste Selectbox str_status ist, soll folgendes aus der db ausgelesen werden */
		if ($nextSelectId == "str_status".$index){
			$sql = "SELECT status.status AS value FROM status";
		}
		
		/*Wenn die nächste Selectbox str_tu_name ist, soll folgendes aus der db ausgelesen werden */
		if ($nextSelectId == "str_tu_name".$index){
			if ($str_statusValue == "Liga"){
				$int_liga = 1;
			}else{
				$int_liga = 0;
			}
			
			$sql = "SELECT DISTINCT turnier.name AS value FROM turnier JOIN mannschaft_turnier_sparte ON mannschaft_turnier_sparte.tu_id = turnier.tu_id WHERE mannschaft_turnier_sparte.sparte_id = ".$int_sparte_id." AND turnier.liga = ".$int_liga." AND mannschaft_turnier_sparte.m_id = 1";
		}
		
		if ($nextSelectId == "str_heim".$index){
			$sql = "SELECT mannschaft.name AS value FROM mannschaft RIGHT JOIN mannschaft_turnier_sparte ON mannschaft_turnier_sparte.m_id = mannschaft.m_id WHERE mannschaft_turnier_sparte.sparte_id = ".$int_sparte_id." AND mannschaft_turnier_sparte.tu_id = ".$int_tu_id."";
		}
		if ($nextSelectId == "str_auswaerts".$index){
			$sql = "SELECT mannschaft.name AS value FROM mannschaft RIGHT JOIN mannschaft_turnier_sparte ON mannschaft_turnier_sparte.m_id = mannschaft.m_id WHERE mannschaft_turnier_sparte.sparte_id = ".$int_sparte_id." AND mannschaft_turnier_sparte.tu_id = ".$int_tu_id." AND mannschaft.name <> '".$str_heimValue."'";
		}
		$query = $this->db->prepare($sql);
		$query->execute();
        $result = json_encode($query->fetchAll());
        $json_string = substr($result, 1 , (strlen($result)-2));

        echo $json_string;
        return $result;
	}

/***Mannschaften***/

	public function get_alle_mannschaften()
    {
        $sql = "SELECT * FROM mannschaft ORDER BY name";
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
		$sql = "SELECT * FROM mannschaft WHERE m_id=?";
        $query = $this->db->prepare($sql);
        $query->execute(array($m_id));
		$mannschaft = $query->fetch(PDO::FETCH_OBJ);
		if ($str_name == null){
			$str_name = $mannschaft->name;
		}	
		$sql = "UPDATE mannschaft SET name=? WHERE m_id=?";
		$query = $this->db->prepare($sql);
		$query->execute(array($str_name, $m_id));
		echo true;
	}
    public function delete_mannschaft($m_id)
    {
        $sql = "DELETE FROM mannschaft WHERE m_id =?";
        $query = $this->db->prepare($sql);
        $query->execute(array($m_id));
		echo true;
    }

/***Trainingseinheit***/

	public function get_alle_trainingseinheiten()
    {
		$sql = "SELECT trainingseinheit.tr_id, trainingseinheit.name as Name, trainingseinheit.ort as Ort, trainingseinheit.zeit as Uhrzeit, trainingsgruppe.name as Trainingsgruppe, CONCAT (person.name, ', ', person.v_name ) as Trainer 
	FROM trainingseinheit
		JOIN trainingsgruppe ON trainingseinheit.tg_id = trainingsgruppe.tg_id
		JOIN person ON trainingseinheit.trainer = person.p_id";
        //$sql = "SELECT * FROM trainingseinheit ORDER BY name";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
	public function add_trainingseinheit($str_name, $str_ort, $d_date, $d_time, $str_tg_name, $str_trainer)
    {
		/**Trainingsgruppe auslesen und ID aus Datenbank auslesen und Array splitten**/
		$sql = "Select tg_id FROM trainingsgruppe WHERE  name = ?";	
        $query = $this->db->prepare($sql);						
        $query->execute(array($str_tg_name));					
		// $arr_tg_id = $query->fetchAll();					
		// foreach($arr_tg_id as $int_tg_id){				
			// $int_tg_id = $int_tg_id->tg_id;				
		// };
		$int_tg_id = $query->fetch(PDO::FETCH_OBJ);
		
		/**Zeit formatieren**/
		$d_obj = new DateTime($d_date." ".$d_time);
		$d_zeit = $d_obj->format('Y-m-d H:i:s');
		
		/**Trainer auslesen und ID aus Datenbank auslesen und Array splitten**/
		$sql = "Select p_id FROM person WHERE  name = ?";	
        $query = $this->db->prepare($sql);						
        $query->execute(array($str_trainer));					
		// $arr_trainer = $query->fetchAll();					
		// foreach($arr_trainer as $int_trainer){				
			// $int_trainer = $int_trainer->p_id;				
		// };
		$int_trainer = $query->fetch(PDO::FETCH_OBJ);
		
        $sql = "INSERT INTO trainingseinheit (name, ort, zeit, trainer, tg_id) VALUES (:name, :ort, :zeit, :trainer, :tg_id)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':name' => $str_name, ':ort' => $str_ort, ':zeit' => $d_zeit, ':trainer' => $int_trainer, ':tg_id' => $int_tg_id));
    }
	public function edit_trainingseinheit($tr_id, $str_name, $str_ort, $d_time, $d_date, $str_tg, $str_trainer)
    {
		/**Trainer auslesen und ID aus Datenbank auslesen und Array splitten**/
		$sql = "Select p_id FROM person WHERE name=?";	
        $query = $this->db->prepare($sql);						
        $query->execute(array($str_trainer));					
		$arr_trainer = $query->fetchAll();					
		foreach($arr_trainer as $trainer){				
			$int_trainer = $trainer->p_id;				
		};
		
		/**Trainingsgruppe auslesen und ID aus Datenbank auslesen und Array splitten**/
		$sql = "Select tg_id FROM trainingsgruppe WHERE name=?";	
        $query = $this->db->prepare($sql);						
        $query->execute(array($str_tg));					
		$arr_tg = $query->fetchAll();	
		foreach($arr_tg as $int_tg_id){				
			 $int_tg_id = $int_tg_id->tg_id;				
		 };
			
		/**Zeit formatieren**/
		$d_obj = new DateTime($d_date." ".$d_time);
		$d_zeit = $d_obj->format('Y-m-d H:i:s');
		
		// Update ausführen
		$sql = "UPDATE trainingseinheit SET name=?, ort=?, zeit=?, trainer=?, tg_id=? WHERE tr_id=?";
		$query = $this->db->prepare($sql);
		$query->execute(array($str_name, $str_ort, $d_zeit, $int_trainer, $int_tg_id, $tr_id));
		echo true;
	}
    public function delete_trainingseinheit($tr_id)
    {
        $sql = "DELETE FROM trainingseinheit WHERE tr_id =?";
        $query = $this->db->prepare($sql);
        $query->execute(array($tr_id));
		echo true;
    }

/***Trainingsgruppe***/

	public function get_alle_trainingsgruppen()
    {
		$sql = "SELECT tg.tg_id, tg.name FROM trainingsgruppe tg";
        //$sql = "SELECT * FROM trainingsgruppe ORDER BY name";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
	public function add_trainingsgruppe($str_name, $arr_teilnehmer_option)
    {	
		
		/*Neues Trainingsgruppe wird in tbl trainingsgruppe eingetragen*/
        $sql = "INSERT INTO trainingsgruppe (name) VALUES (:name)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':name' => $str_name));
		
		/*Nur wenn eine Person (Checkbox) gewählt wurde, wird auch eine Verknüpfung erstellt.*/
		if(isset($arr_teilnehmer_option)){
			/*neu angelegte Trainingsgruppe-ID auslesen*/
			$sql = "SELECT tg_id FROM trainingsgruppe WHERE name = ?";
			$query = $this->db->prepare($sql);
			$query->execute(array($str_name));
			$trainingsgruppe = $query->fetch(PDO::FETCH_OBJ);
			
			/*egal wieviele Personen gewählt wurden, handelt es sich immer um einen Array, deswegen erübrigt sich diese Abfrage eigentlich*/
			if (is_array($arr_teilnehmer_option)) {
				foreach($arr_teilnehmer_option as $option){
							
					/*neue Verknüpfung in tbl teilnehmer_tg anlegen*/
					$sql = "INSERT INTO teilnehmer_tg (tg_id, p_id) VALUES (:tg_id, :p_id)";
					$query = $this->db->prepare($sql);
					$query->execute(array(':tg_id' => $trainingsgruppe->tg_id, ':p_id' => $option));
				}
			} 
		}
		
		
		
    }
	public function edit_trainingsgruppe($tg_id, $str_name)
    {
		$sql = "UPDATE trainingsgruppe SET name=? WHERE tg_id=?";
		$query = $this->db->prepare($sql);
		$query->execute(array($str_name, $tg_id));
	}
    public function delete_trainingsgruppe($tg_id)
    {
        $sql = "DELETE FROM trainingsgruppe WHERE tg_id =?";
        $query = $this->db->prepare($sql);
        $query->execute(array($tg_id));
		echo true;
    }

/***Turnier***/

	public function get_alle_turniere()
    {
        //$sql = "SELECT * FROM turnier";
		$sql = "SELECT turnier.tu_id AS ID, turnier.name AS Turnier, turnier.liga AS Liga FROM turnier ORDER BY Turnier";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
	public function get_alle_turniere_detail()
    {
        //$sql = "SELECT * FROM turnier";
		$sql = "SELECT turnier.tu_id AS ID, turnier.name AS Turnier, turnier.liga AS Liga, sparte.name AS Sparte, IFNULL(mannschaft.name,'noch nicht ermittelt') AS Gewinner FROM turnier_sparte JOIN turnier ON turnier.tu_id = turnier_sparte.tu_id JOIN sparte ON sparte.sparte_id = turnier_sparte.sparte_id LEFT JOIN mannschaft ON mannschaft.m_id = turnier_sparte.gewinner ORDER BY Turnier";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
	public function add_turnier($str_name, $int_liga, $arr_sparte_option)
    {
		/*Neues Turnier mit Name und Ligawert in tbl Turnier anlegen*/
		$sql = "INSERT INTO turnier (name, liga) VALUES (:name, :liga)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':name' => $str_name, ':liga' => $int_liga));
		
		/*Nur wenn eine Sparte (Checkbox) gewählt wurde, wird auch eine Verknüpfung erstellt.*/
		if(isset($arr_sparte_option)){
			/*neu angelegte Turnier-ID auslesen*/
			$sql = "SELECT tu_id FROM turnier WHERE name = ?";
			$query = $this->db->prepare($sql);
			$query->execute(array($str_name));
			$turnier = $query->fetch(PDO::FETCH_OBJ);
			
			/*egal wieviele Sparten gewählt wurden, handelt es sich immer um einen Array, deswegen erübrigt sich diese Abfrage eigentlich*/
			if (is_array($arr_sparte_option)) {
				foreach($arr_sparte_option as $option){
					/*Sparten ID auslesen*/
					$sql = "SELECT sparte_id FROM sparte WHERE name = ?";
					$query = $this->db->prepare($sql);
					$query->execute(array($option));
					$sparte = $query->fetch(PDO::FETCH_OBJ);
			
					/*neue Verknüpfung in tbl turnier_sparte ohne gewinner anlegen*/
					$sql = "INSERT INTO turnier_sparte (tu_id, sparte_id) VALUES (:tu_id, :sparte_id)";
					$query = $this->db->prepare($sql);
					$query->execute(array(':tu_id' => $turnier->tu_id, ':sparte_id' => $sparte->sparte_id));
				}
			} 
		}
    }
	public function edit_turnier($tu_id, $str_name, $int_liga)
    {
		$sql = "SELECT * FROM turnier WHERE tu_id=?";
        $query = $this->db->prepare($sql);
        $query->execute(array($tu_id));
		$turnier = $query->fetch(PDO::FETCH_OBJ);
		if ($str_name == null){
			$str_name = $turnier->name;
		}							
		if ($int_liga == null){
			$int_liga = $turnier->liga;
		}
		
		// /*Backup*/
		// $sql = "UPDATE turnier SET name=?, gewinner=? WHERE tu_id=?";
		// $query = $this->db->prepare($sql);
		// $query->execute(array($str_name, $int_gewinner, $tu_id));
		
		$sql = "UPDATE turnier SET name=?, liga=? WHERE tu_id=?";
		$query = $this->db->prepare($sql);
		$query->execute(array($str_name, $int_liga, $tu_id));
		echo true;
	}
    public function delete_turnier($tu_id)
    {
        $sql = "DELETE FROM turnier WHERE tu_id =?";
        $query = $this->db->prepare($sql);
        $query->execute(array($tu_id));
		echo true;
    }

/***Status***/
	public function get_alle_stats()
    {
        $sql = "SELECT * FROM status";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
	
	/***Sparte***/
	public function get_alle_sparten()
    {
        $sql = "SELECT * FROM sparte";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
	public function add_sparte($str_name)
    {
        $sql = "INSERT INTO sparte (name) VALUES (:name)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':name' => $str_name));
    }
	
}?>