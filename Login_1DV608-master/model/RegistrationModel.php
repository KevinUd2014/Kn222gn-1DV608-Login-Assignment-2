<?php

	class RegistrationModel{

		private $usernameInput;
		private $userPasswordInput;
		private $reEnterPassword;

		private $userDAL;

		private $giveMeSomeSalt = "MayIHaveSomeSaltPLEASE??";

		public function __construct($userDAL){
			$this->userDAL = $userDAL;

		}

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
			else if (mb_strlen($this->userPasswordInput) < 6) {
 				
			 	throw new EXCEPTION ("Password is missing");
			 	//$this->logedinStatus = false;

			}
			else if ($this->reEnterPassword != $this->userPasswordInput) {//får inte dessa meddelanden att visa sig!!!!
 				
			 	throw new EXCEPTION ("Password is not the same");
			 	//$this->logedinStatus = false;

			}
	}
	//denna funktion ska inte vara synlig för då kan man enkelt hacka och lista ut alla lösenord osv.
	public function putUserInDatabase($usernameInput, $PasswordInput){

		$connect = $this->userDAL->createSqlConnection();
		$this->usernameInput = $usernameInput;// dessa två kommer ta bort alla onödiga blankspace osv. ifårn mina strängar!
		$this->userPasswordInput = $this->hash($PasswordInput);
		$sqlQuery = "INSERT INTO`Register`.`Register` (`Username`, `Password`) VALUES ('$this->usernameInput', '$this->userPasswordInput')";
		$connResult = $connect->query($sqlQuery);

		if(!$connResult){

			echo("Användarnamnet finns redan!"); 
		}
		$this->userDAL->closeSqlConnection();
	}
	public function hash($PasswordInput){

		return sha1($this->$giveMeSomeSalt.$PasswordInput."heheh?"."?!Youwillneverfindout");
	}
}