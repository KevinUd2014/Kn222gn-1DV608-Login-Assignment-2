<?php

	class LoginControl(){
		
		//ska anropa modelen och få tilbaka svar som i sin tur skickas till view!

		private $loginUserName;
		private $password;
		private $viewLogin;

		public function __construct(LoginView $viewLogin){

			$this->viewLogin = $viewLogin;
		}

		public function getLogin(){
			$this->viewLogin = checkUserLogin();
		}



	}



