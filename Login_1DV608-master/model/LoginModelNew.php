<?php

	class LoginModelNew{
		//fick döpa den till new eftersom jag skapade mappen i fel mapp först!
		//ska anropa modelen och få tilbaka svar som i sin tur skickas till view!

		private $usernameInput;
		private $userPasswordInput;
		private $logedinStatus;

		public $fullUserName = "Admin";
		public $fullPassword = "Password";

		public function getLogedinStatus(){

			$this->logedinStatus = $logedinStatus;//skickar tillbaka vilken status man har om man är inlogad eller inte!
		}

		public function trylogingin($Username, $Password){

			$this->usernameInput = trim($Username);// dessa två kommer ta bort alla onödiga blankspace osv. ifårn mina strängar!
			$this->userPasswordInput = trim($Password);

			if()//här ska jag implementera de olika kraven man får t.ex. inte skriva i fält som är tomma!
			{

			}
		}
		

		

	}