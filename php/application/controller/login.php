<?php

// Login Controller, ruft das Login Model auf (loginmodel.php)
// Behandelt den Login und Logout von Benutzern in der Webanwendung
class Login extends Controller
{

 	// Login Funktion, dass sich Benutzer anmelden können
	public function doLogin()
	{
		if (isset($_POST["submit_login"])) {
			$login_model = $this->loadModel('LoginModel');
            $login_model->doLogin($_POST["str_username"], $_POST["str_password"]);
		}
		header('location: ' . URL );
	}//end doLogin()


	// Logout Funktion, dass Benutzer sich aus der Webanwendung abmelden können
	public function doLogout()
    {
   		if (isset($_GET["submit_logout"])) {
			$login_model = $this->loadModel('LoginModel');
            $login_model->doLogout();
		}
        header('location: ' . URL . 'home/');
    }//end doLogout()

}//end class