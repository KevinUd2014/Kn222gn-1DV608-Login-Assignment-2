<?php

	class registerControl{

		private $regModel;
		private $regView;

		public function __construct(RegistrationModel $regModel, registerView $regView){

			$this->regModel = $regModel;
			$ths->regView = $regView;
		}

		public function getLogin(){

			if($this->$regView->checkUserRegisterPost())//om användaren postar i view så ska denna köras!
			{
				try{
					$this->regUsername = $this->$regView->getRegName();//hämtar användarnamnet och lägger in i denna variabel
					$this->regPassword = $this->$regView->getRegPassword();//hämtar lösenordet!
					$this->regReEnterPass = $this->$regView->getRegRePassword();//hämtar lösenordet!
				

					$this->regModel->tryRegistration($this->regUsername, $this->regPassword, $this->regReEnterPass);

					//$this->viewLogin->welcomeMessage();
					/**
					*	Tell view to show logout message
					*/
				}
				catch(EXCEPTION $exceptions){  // kastar ett exception istället!
					$this->$regView->actionMessages($exceptions->getMessage());
				}
			}
		}
	}