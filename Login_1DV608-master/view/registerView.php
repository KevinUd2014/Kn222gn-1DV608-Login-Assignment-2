<?php
	class registerView{

		private static $messageId = 'RegisterView::Message';
		private $loginModel;
		private $message;

		private static $registerLoginSite = "RegisterView::Register";
		private static $register = "RegisterView::Register";
		private static $regName = "RegisterView::UserName";
		private static $regPassword = "RegisterView::Password";
		private static $regRePassword = "RegisterView::PasswordRepeat";
		private static $previousName;

		/*
		public function GetRegisterUser(){
			try{
				$userName = getRegName();
				return new User($userName, $password);
			}
			catch(){
				//set error
			}
			return null;
		}
		*/
		public function checkUserRegisterPost(){

			//denna kollar att man har rätt inlogingnsuppgifter!
			if(isset($_POST[self::$register]))//kollar så att man skrivet i något i fälten!//
			{
				self::$previousName = strip_tags($_POST[self::$regName]);
				return true;
			}
		}

		public function getRegName(){
			
		 	if(isset($_POST[self::$regName]))
		 	{
		 		return $_POST[self::$regName];
			}
		 }

		public function getRegPassword(){

			if(isset($_POST[self::$regPassword]))
			{
				return $_POST[self::$regPassword];
			}
		}
		public function getRegRePassword(){

			if(isset($_POST[self::$regRePassword]))
			{
				return $_POST[self::$regRePassword];
			}
		}

		public function actionMessages($message){// fick lägga till mina if och else if satset här istället!
		    //echo $message;
			$this->message = $message;
		}

		public function response() {
		
			$response = "";//skapar bara en tom sträng
			if(isset($_GET["register"])){
				$response .= $this->generateRegistrationFormHTML($this->message);
			}
			return $response;
		}

		private function generateRegistrationFormHTML() {
			return '
				<form method="post" >
					<fieldset>
						<legend>Register a new user - Write a username and password</legend>
						<p id="' . self::$messageId . '">' . $this->message . '</p>
						
						
						<label for="' . self::$regName . '">Username :</label>
						<input type="text" id="' . self::$regName . '" name="' . self::$regName . '"  value="'. self::$previousName .'" /><br />

						<label for="' . self::$regPassword . '">Password :</label>
						<input type="password" id="' . self::$regPassword . '" name="' . self::$regPassword . '" /><br />

						<label for="' . self::$regRePassword . '">Repeat Password :</label>
						<input type="password" id="' . self::$regRePassword . '" name="' . self::$regRePassword . '" /><br />

						<input type="submit" name="' . self::$register . '" value="Register" />
					</fieldset>
				</form>
			';
		}
	}