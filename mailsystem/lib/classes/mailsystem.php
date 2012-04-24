<?php

	// Includes
	include('db.php');

class mailsystem
{

	// Initialisatie
	private $db;

	// Constructor
	public function __construct() {

		$this->db = new db('localhost', '52089', 'gudaeb', 'prj_2011_2012_emedia_med2d_t5');
        // $this->db = new db('localhost', 'root', '841nk2s', 'prj_2011_2012_emedia_med2d_t5');

	}

	// Methodes: Subscribers
	public function getSubscribers($type = '') {
		
		if(!$type):
		
			$query	= 'SELECT * FROM mail_subscribers ORDER BY id ASC;';

		else: 
		
			$query	= 'SELECT * FROM mail_subscribers WHERE type = "'.$type.'" ORDER BY id ASC;';

		endif; 
		
		return $this->db->query($query, true);
				
	}
	public function removeSubscriber($id) {
		
		$query = 'DELETE FROM mail_subscribers WHERE id = '.$id.';';
		$this->db->query($query);
				
	}
	public function addSubscriber($name = '', $email, $child_name = '', $child_class = '', $employee_function = '', $employee_class = '', $type) {
		
		$query = 'INSERT INTO mail_subscribers VALUES ("", "'.$name.'", "'.$email.'", "'.$child_name.'", "'.$child_class.'", "'.$employee_function.'", "'.$employee_class.'", "'.$type.'");';
		$this->db->query($query);
				
	}
	
	// Methodes: Login
    public function login($username, $password) {
		
		// Todo: User Logged in is true naar de user class verplaatsen
	
		// Check of de gebruikersnaam en het wachtwoord overeenkomen met een database entry, zo ja: vul user_function met de functie van deze gebruiker
        $query = 'SELECT function FROM mail_users WHERE username ="' . $username . '" AND password = "' . $password . '";';
		$query_result = $this->db->query($query, true);
		$user_function = $query_result[0]->function;

		if ($user_function == "editor"):
			
			session_start();
			$_SESSION["login"] = "editor";
			return true;
						
		else:
	
			return false;
			
		endif;
		
    }
    public function logout() {
		
		if ($_SESSION["login"]):
		
			session_destroy();
		
		endif;
		
    }
	public function areThereAnyUsersLoggedIn() {
		
		// Todo: Editor misschien betere weghalen, als er toch geen verschillende typen zijn
		
		if($_SESSION["login"] == "editor"):
		
			return true;
		
		else: 
		
			return false;
		
		endif;
		
	}
	
}

?>
