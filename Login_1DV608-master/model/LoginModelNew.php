<?php
	require_once("User.php");
	class LoginModelNew{
		//fick döpa den till new eftersom jag skapade mappen i fel mapp först!
		//ska anropa modelen och få tilbaka svar som i sin tur skickas till view!

		private $usernameInput;
		private $userPasswordInput;
		private $logedinStatus;
		private $actionMessage;
		private $userDAL;

		public static $fullUserName;
		public static $fullPassword;


		public function __construct($userDAL)//skapar en session med login
		{
			$this->userDAL = $userDAL;
			if(!isset($_SESSION['isLoginSession']))
			{
				$_SESSION['isLoginSession'] = false;
			}
		}

		public function trylogingin($Username, $Password){ //denna anropas t.ex. i index!//

			$this->usernameInput = trim($Username);// dessa två kommer ta bort alla onödiga blankspace osv. ifårn mina strängar!
			$this->userPasswordInput = trim($Password);
			
			if ($this->usernameInput === "") {//här ska jag implementera de olika kraven man får t.ex. inte skriva i fält som är tomma!
			 	throw new EXCEPTION ("Username is missing");
			}//här ska jag implementera de olika kraven man får t.ex. inte skriva i fält som är tomma!
			else if ($this->userPasswordInput === "") {
			 	throw new EXCEPTION ("Password is missing");
			}

			$user = $this->userDAL->getByUsername($this->usernameInput);


			if($user == null || !$user->ComparePassword($this->userPasswordInput)){// fick hjälp med denna av Andreas! jag hade en överkomplicerad!

			 	throw new EXCEPTION ("Wrong name or password");
			}
			else
			{
				if($_SESSION['isLoginSession']){

					throw new EXCEPTION ();
				}
				else{

					$_SESSION['isLoginSession'] = true;
					$_SESSION['userprofile'] = $user;//lägger in user i en session!
				}
			}
		}
		public function logoutModel(){ // denna ska skriva ut bye bye om man loggar ut!


			if(!$_SESSION['isLoginSession']){

				throw new EXCEPTION ();
			}
			else{

				$_SESSION["isLoginSession"] = false;
				unset ($_SESSION["userprofile"]);
			}
		}
		public function checkLoginSession(){

				if($_SESSION["isLoginSession"]){

					return $_SESSION["isLoginSession"];

				}
				return false;
		}
	}