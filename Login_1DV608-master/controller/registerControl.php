<?php

	class registerControl{

		private $regModel;
		private $regView;

		public function __construct(RegistrationModel $regModel, registerView $regView){

			$this->regModel = $regModel;
			$this->regView = $regView;
		}

		public function tryRegisterUser(){

			if($this->regView->checkUserRegisterPost())//om användaren postar i view så ska denna köras!
			{
				try{
					$this->regUsername = $this->regView->getRegName();//hämtar användarnamnet och lägger in i denna variabel
					$this->regPassword = $this->regView->getRegPassword();//hämtar lösenordet!
					$this->regReEnterPass = $this->regView->getRegRePassword();//hämtar lösenordet!
				

					$this->regModel->tryRegistration($this->regUsername, $this->regPassword, $this->regReEnterPass);
				}
				catch(EXCEPTION $exceptions){  // kastar ett exception istället!
					$this->regView->actionMessages($exceptions->getMessage());//
				}//
			}
		}
	}