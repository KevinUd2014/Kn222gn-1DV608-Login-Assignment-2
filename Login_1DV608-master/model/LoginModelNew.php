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

				$this->actionMessage = "Welcome";
				$this->logedinStatus = true;// denna ska skicka så att man kommer vidare till en login skärm!
			}
		}

		public function getLogedinStatus(){
  
			return $this->logedinStatus;//skickar tillbaka vilken status man har om man är inlogad eller inte! true eller false!
		}
		public function loginResultMessage(){//denna anropar jag för att få in felmeddelandet till message i index!

			return $this->actionMessage; 
		}

		public function logoutMessage(){
			$this->logedinStatus = false;
			$this->actionMessage = "Bye bye!";
		}

		public function checkLoginSession(){
			
			if(isset ($_SESSION["checkLoginSession"])){

				if($this->logedinStatus){

					$_SESSION["checkLoginSession"] = true;

				}
				return $_SESSION["checkLoginSession"];

			}

		}
		

		

	}