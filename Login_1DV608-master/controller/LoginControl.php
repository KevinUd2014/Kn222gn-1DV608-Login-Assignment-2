<?php

	class LoginControl{
		
		//ska anropa modelen och få tilbaka svar som i sin tur skickas till view!

		private $loginUserName;
		private $password;
		private $viewLogin;
		private $modelLogin;

		public function __construct(LoginView $viewLogin, LoginModelNew $modelLogin){

			$this->viewLogin = $viewLogin;  //hämtar denna och ger den värdet av det inskickade värdet!
			$this->modelLogin = $modelLogin;
		}

		public function getLogin(){
			
			
			if($this->viewLogin->checkUserLoginPost())
			{
				$this->loginUserName = $this->viewLogin->getUserName();//hämtar användarnamnet och lägger in i denna variabel
				$this->password = $this->viewLogin->getPassword();//hämtar lösenordet!
				
				$this->checkInlogModel();//anropar funktionen!

			}
			return null;

		}

		public function checkInlogModel(){

			$this->modelLogin->trylogingin($this->loginUserName, $this->password);  // skickar värdena som den fått till modelklassen trylogin och kollar värdena!
		}



	}



