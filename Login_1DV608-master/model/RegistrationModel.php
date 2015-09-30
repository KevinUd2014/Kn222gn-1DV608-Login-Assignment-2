<?php

	class RegistrationModel{

		private $usernameInput;
		private $userPasswordInput;
		private $reEnterPassword;

		public function tryRegistration($Username, $Password, $reEnterPass){ //denna anropas t.ex. i index!


			//$this->logedinStatus = false; //vet ej opm denna
			$this->usernameInput = trim($Username);// dessa två kommer ta bort alla onödiga blankspace osv. ifårn mina strängar!
			$this->userPasswordInput = trim($Password);
			$this->reEnterPassword = trim($reEnterPass);
			
			if (mb_strlen($this->usernameInput)< 3) {//här ska jag implementera de olika kraven man får t.ex. inte skriva i fält som är tomma!
			
			 	throw new EXCEPTION ("Username is missing");
			 	//$this->logedinStatus = false;
			
			}//här ska jag implementera de olika kraven man får t.ex. inte skriva i fält som är tomma!
			else if (mb_strlen($this->userPasswordInput)< 6) {
 				
			 	throw new EXCEPTION ("Password is missing");
			 	//$this->logedinStatus = false;

			}
			else if ($this->reEnterPassword != $this->userPasswordInput) {
 				
			 	throw new EXCEPTION ("Password is not the same");
			 	//$this->logedinStatus = false;

			}
	}
}