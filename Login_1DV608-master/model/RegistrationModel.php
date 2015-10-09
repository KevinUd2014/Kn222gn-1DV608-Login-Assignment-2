<?php
	require_once("model/User.php");
	require_once("view/registerView.php");
	class RegistrationModel{

		private $usernameInput;
		private $userPasswordInput;
		private $reEnterPassword;

		
		public function __construct($userDAL, $regView){
			$this->userDAL = $userDAL;
			$this->registerView = $regView;
		}

		public function tryRegistration($Username, $Password, $reEnterPass){ //denna anropas t.ex. i index!

			$this->usernameInput = trim($Username);// dessa två kommer ta bort alla onödiga blankspace osv. ifårn mina strängar!
			$this->userPasswordInput = trim($Password);
			$this->reEnterPassword = trim($reEnterPass);

			$message = "";

			if (mb_strlen($this->usernameInput) < 3) {//här ska jag implementera de olika kraven man får t.ex. inte skriva i fält som är tomma!
			
			 	$message .= "Username has too few characters, at least 3 characters.<br>";
			}
			if (mb_strlen($this->userPasswordInput) < 6) {
 				
			 	$message .= ("Password has too few characters, at least 6 characters.<br>");
			}
			if ($message != "")//går in i denna om nu message har något att skriva ut!
			{
				throw new EXCEPTION($message);
			}
			else if ($this->reEnterPassword != $this->userPasswordInput) {//får inte dessa meddelanden att visa sig!!!!
 				
			 	throw new EXCEPTION ("Passwords do not match.");
			}
			else if (preg_match("/^[A-Za-z0-9]+$/",$this->usernameInput) != 1)//kommer kolla alla otillåtna tecken!
			{
				throw new EXCEPTION ("Username contains invalid characters.");
			}

			$user = new User($this->usernameInput, $this->userPasswordInput);

			$_SESSION["Redirect"] = $this->userDAL->putUserInDatabase($user);//redirektar till login när man reggaar sig
			$_SESSION["RedirektUsername"] = $this->registerView->getRegName();//kommer spara namnet man reggar i view!
	}
}