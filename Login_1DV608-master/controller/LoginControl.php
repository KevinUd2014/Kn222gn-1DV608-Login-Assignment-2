<?php

	class LoginControl{
		
		//ska anropa modelen och få tilbaka svar som i sin tur skickas till view!

		private $loginUserName;
		private $password;
		private $viewLogin;
		private $modelLogin;
		private $regModel;
		private $regUsername;
		private $regPassword;
		private $regReEnterPass;

		public function __construct(LoginView $viewLogin, LoginModelNew $modelLogin){ //RegistrationModel $regModel

			$this->viewLogin = $viewLogin;  //hämtar denna och ger den värdet av det inskickade värdet!
			$this->modelLogin = $modelLogin;
		}

		public function getLogin(){
			
			
			if($this->viewLogin->checkUserLoginPost())//om användaren postar i view så ska denna köras!
			{
				try{
					$this->loginUserName = $this->viewLogin->getUserName();//hämtar användarnamnet och lägger in i denna variabel
					$this->password = $this->viewLogin->getPassword();//hämtar lösenordet!
				

					$this->modelLogin->trylogingin($this->loginUserName, $this->password);

					$this->viewLogin->welcomeMessage();//
					/**
					*	Tell view to show logout message
					*/
				}
				catch(EXCEPTION $exceptions){  // kastar ett exception istället!
					$this->viewLogin->actionMessages($exceptions->getMessage());
				}
			}
			else if($this->viewLogin->didUserLogout())//denna gör detta om användaren postar en logout
			{
				try{
					$this->modelLogin->logoutModel();//då sätter vi att logoutmessage kommer skrivas ut!
					
					$this->viewLogin->byeMessage();
					/**
					*	Tell view to show logout message
					*/
				}
				catch(EXCEPTION $exceptions){
					$this->viewLogin->actionMessages($exceptions->getMessage());
				}
			}
		}
	}



