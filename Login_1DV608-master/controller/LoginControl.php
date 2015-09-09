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
			$this->viewLogin = checkUserLogin();
		}



	}



