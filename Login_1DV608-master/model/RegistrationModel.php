<?php

	class RegistrationModel{

		private $usernameInput;
		private $userPasswordInput;
		private $reEnterPassword;

		
/*
		public function __construct($userDAL){
			$this->userDAL = $userDAL;
		}
*/
		public function tryRegistration($Username, $Password, $reEnterPass){ //denna anropas t.ex. i index!


			//$this->logedinStatus = false; //vet ej opm denna
			$this->usernameInput = trim($Username);// dessa två kommer ta bort alla onödiga blankspace osv. ifårn mina strängar!
			$this->userPasswordInput = trim($Password);
			$this->reEnterPassword = trim($reEnterPass);

			//echo $this->usernameInput;
			
			if (mb_strlen($this->usernameInput) < 3) {//här ska jag implementera de olika kraven man får t.ex. inte skriva i fält som är tomma!
			
			 	throw new EXCEPTION ("Username is missing");
			 	//$this->logedinStatus = false;
			
			}//här ska jag implementera de olika kraven man får t.ex. inte skriva i fält som är tomma!
			else if(empty($this->userPasswordInput)){
				throw new EXCEPTION ("Password is Empty");
			}
			else if (mb_strlen($this->userPasswordInput) < 6) {
 				
			 	throw new EXCEPTION ("Password is to short!");
			 	//$this->logedinStatus = false;
			}
			else if ($this->reEnterPassword != $this->userPasswordInput) {//får inte dessa meddelanden att visa sig!!!!
 				
			 	throw new EXCEPTION ("Password is not the same");
			 	//$this->logedinStatus = false;
			}
			

			$user = new User($this->usernameInput,$this->userPasswordInput);
			User::PutInDatabase($user);
	}
	//denna funktion ska inte vara synlig för då kan man enkelt hacka och lista ut alla lösenord osv.
	
	
}