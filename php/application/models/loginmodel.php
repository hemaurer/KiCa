<?php

// Login Model, aufgerufen vom Login Controller (login.php)
// Behandelt den Login und Logout von Benutzern in der Webanwendung
class LoginModel
{

    // Konstruktor, um Datenbank zu definieren und Session zu starten
    public function __construct($db)
    {
        try
        {
            $this->db = $db;
        }
        catch (PDOException $e)
        {
            exit('Database connection could not be established.');
        }

        //Session starten, um Session Variablen zu ermöglichen
        @session_start();
    }//end __construct($db)


    // Login Funktion, dass sich Benutzer anmelden können
    public function doLogin($str_username, $str_password)
    {
        //SQL Abfrage
        $sql = "SELECT p_id, username, betreuer, password, name, v_name, geb_datum, groesse, bild, tel
                FROM person
                WHERE username = '" . $str_username . "';";

        $query = $this->db->prepare($sql);
        $query->execute();

        //Ergebnis der SQL Abfrage als Objekt zurückgeben, das angesprochen werden kann
        $result_set = $query->fetch(PDO::FETCH_OBJ);

        // using PHP 5.5's password_verify() function to check if the provided password fits
        // the hash of that user's password
        if (password_verify($str_password, $result_set->password)) {

            // write user data into PHP SESSION (a file on your server)
            // Session Variablen werden zum Aufbau der Navigation mit zusätzlichen Rechten
            // durch den Login genutzt (header.php)
            // Außerdem werden diese Session Variablen zum Aufbau der Profilseite benötigt
            $_SESSION['p_id'] = $result_set->p_id;
            $_SESSION['username'] = $result_set->username;
            $_SESSION['betreuer'] = $result_set->betreuer;
            $_SESSION['name'] = $result_set->name;
            $_SESSION['v_name'] = $result_set->v_name;
            $_SESSION['geb_datum'] = $result_set->geb_datum;
            $_SESSION['groesse'] = $result_set->groesse;
            $_SESSION['str_bild'] = $result_set->bild;
            $_SESSION['tel'] = $result_set->tel;
            $_SESSION['user_login_status'] = 1;

        }//end if
    }//end doLogin($username, $passwort)

    // Logout Funktion, dass Benutzer sich aus der Webanwendung abmelden können
    public function doLogout()
    {
        // delete the session of the user
        $_SESSION = array();
        session_destroy();
    }//end doLogout()

}//end class
