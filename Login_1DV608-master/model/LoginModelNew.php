<?php
	session_start();
	class LoginModelNew{
		//fick döpa den till new eftersom jag skapade mappen i fel mapp först!
		//ska anropa modelen och få tilbaka svar som i sin tur skickas till view!

		private $usernameInput;
		private $userPasswordInput;
		private $logedinStatus;
		private $actionMessage;

		public static $fullUserName = "Admin";
		public static $fullPassword = "Password";


		public function __construct()
		{
			if(!isset($_SESSION['isLoginSession']))
			{
				$_SESSION['isLoginSession'] = false;
			}
		}

		public function trylogingin($Username, $Password){ //denna anropas t.ex. i index!


			$this->logedinStatus = false; //vet ej opm denna
			$this->usernameInput = trim($Username);// dessa två kommer ta bort alla onödiga blankspace osv. ifårn mina strängar!
			$this->userPasswordInput = trim($Password);

			if ($this->usernameInput === "") {//här ska jag implementera de olika kraven man får t.ex. inte skriva i fält som är tomma!
			
				$this->actionMessage = "Username is missing";
				$this->logedinStatus = false;
			
			}//här ska jag implementera de olika kraven man får t.ex. inte skriva i fält som är tomma!
			else if ($this->userPasswordInput === "") {
 				
				$this->actionMessage = "Password is missing";
				$this->logedinStatus = false;

			}
			else if($this->usernameInput === self::$fullUserName && $this->userPasswordInput !==  self::$fullPassword
				|| $this->usernameInput !== self::$fullUserName && $this->userPasswordInput === self::$fullPassword)
			{//hade denna uppdelad i två else if satser men satte ihop dem men vet ej om det går att göra bättre!
				$this->actionMessage = "Wrong name or password";
				$this->logedinStatus = false;
			}
			else if($this->usernameInput === self::$fullUserName && $this->userPasswordInput === self::$fullPassword){

				if($_SESSION['isLoginSession']){

					$this->actionMessage = "";
				}
				else{

					$this->actionMessage = "Welcome";
				}

				$_SESSION['isLoginSession'] = true;
				$this->logedinStatus = true;// denna ska skicka så att man kommer vidare till en login skärm!
			}
			//return false;
			//
		}

		public function getLogedinStatus(){
  
			return $this->logedinStatus;//skickar tillbaka vilken status man har om man är inlogad eller inte! true eller false!
		}
		public function loginResultMessage(){//denna anropar jag för att få in felmeddelandet till message i index!

			return $this->actionMessage; 
		}

		public function logoutMessage(){ // denna ska skriva ut bye bye om man loggar ut!
			
			if($_SESSION["isLoginSession"] === false){//om nu checklogin är true så kommer bye bye skrivas ut
				
				$this->actionMessage = "";
				
			}
			else{

				$this->actionMessage = "Bye bye!";

			}

			$_SESSION["isLoginSession"] = false;//sätter sessionen till false!
			session_destroy();//tar bort sessionen
		}
		public function checkLoginSession(){
			
			if(isset ($_SESSION["isLoginSession"])){

				if($_SESSION["isLoginSession"]){

					return $_SESSION["isLoginSession"];

				}
				return false;

			}

		}
		

		

	}