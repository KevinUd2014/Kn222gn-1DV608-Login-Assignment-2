<?php

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


			//$this->logedinStatus = false; //vet ej opm denna
			$this->usernameInput = trim($Username);// dessa två kommer ta bort alla onödiga blankspace osv. ifårn mina strängar!
			$this->userPasswordInput = trim($Password);
			
			if ($this->usernameInput === "") {//här ska jag implementera de olika kraven man får t.ex. inte skriva i fält som är tomma!
			
			 	throw new EXCEPTION ("Username is missing");
			 	//$this->logedinStatus = false;
			
			}//här ska jag implementera de olika kraven man får t.ex. inte skriva i fält som är tomma!
			else if ($this->userPasswordInput === "") {
 				
			 	throw new EXCEPTION ("Password is missing");
			 	//$this->logedinStatus = false;

			}
			else if($this->usernameInput !== self::$fullUserName || $this->userPasswordInput !==  self::$fullPassword){// fick hjälp med denna av Andreas! jag hade en överkomplicerad!
			//hade denna uppdelad i två else if satser men satte ihop dem men vet ej om det går att göra bättre!

			 	throw new EXCEPTION ("Wrong name or password");
			 	//$this->logedinStatus = false;
			}
			else if($this->usernameInput == self::$fullUserName && $this->userPasswordInput == self::$fullPassword){
				if($_SESSION['isLoginSession']){

					throw new EXCEPTION ("");
						//$this->actionMessage = "";
				}
				else{

					$_SESSION['isLoginSession'] = true;
					//throw new EXCEPTION ("Welcome");
					//$this->actionMessage = "Welcome";
				}
				

				//$_SESSION['isLoginSession'] = true;
				//$this->logedinStatus = true;// denna ska skicka så att man kommer vidare till en login skärm!
			}
		}
			//return false;
			//
		//}

		// public function getLogedinStatus(){
  
		// 	return $this->logedinStatus;//skickar tillbaka vilken status man har om man är inlogad eller inte! true eller false!
		// }
		// public function loginResultMessage(){//denna anropar jag för att få in felmeddelandet till message i index!

		// 	return $this->actionMessage; 
		// }

		public function logoutModel(){ // denna ska skriva ut bye bye om man loggar ut!


			if(!$_SESSION['isLoginSession']){

				throw new EXCEPTION ("");
						//$this->actionMessage = "";
			}
			else{

				$_SESSION['isLoginSession'] = true;
					//throw new EXCEPTION ("Welcome");
					//$this->actionMessage = "Welcome";
			}
			// if($_SESSION["isLoginSession"] === false){//om nu checklogin är true så kommer bye bye skrivas ut
				
			// 	$this->actionMessage = "";
				
			// }// TODO: dessa är sånt jag kan ta bort efter jag frågat på handledningen!
			// else{
			// 	$this->actionMessage = "Bye bye!";
			// }
			$_SESSION["isLoginSession"] = false;//sätter sessionen till false!
			//session_destroy();//tar bort sessionen
			//$_SESSION["isLoginSession"] = false;//sätter sessionen till false! var tvungen sätta till false för att destroy!
			//session_destroy();//tar bort sessionen
		}
		public function checkLoginSession(){

				if($_SESSION["isLoginSession"]){

					return $_SESSION["isLoginSession"];

				}
				return false;

			

		}
		

		

	}