<?php
	class registerView{

		private static $messageId = 'registerView::Message';
		private $loginModel;
		private $message;

		private static $registerLoginSite = "registerView::register";
		private static $register = "registerView::register";
		private static $regName = "registerView::regUsername";
		private static $regPassword = "registerView::regPassword";
		private static $regRePassword = "registerView::regRePassword";
		private static $previousName;


		public function checkUserRegisterPost(){

			//denna kollar att man har rätt inlogingnsuppgifter!
			if(isset($_POST[self::$register]))//kollar så att man skrivet i något i fälten!//
			{
				self::$previousName = $_POST[self::$regName];
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
			//$response = $this->generateLinkBetweenSitesButton();
			//$message = $this->loginModel->trylogingin($this->getUserName(), $this->getPassword());
			if(isset($_GET["register"])){
				$response .= $this->generateRegistrationFormHTML($this->message);
			}
			return $response;
		}

		private function generateRegistrationFormHTML() {
			return '
				<form method="post" >
					<fieldset>
						
						<p id="' . self::$messageId . '">' . $this->message . '</p>
						<legend>Register a new user - Write a username and password</legend>
						
						<label for="' . self::$regName . '">Username :</label>
						<input type="text" id="' . self::$regName . '" name="' . self::$regName . '"  value="'. self::$previousName .'" /></br>

						<label for="' . self::$regPassword . '">Password :</label>
						<input type="password" id="' . self::$regPassword . '" name="' . self::$regPassword . '" /></br>

						<label for="' . self::$regRePassword . '">Repeat Password :</label>
						<input type="password" id="' . self::$regRePassword . '" name="' . self::$regRePassword . '" /></br>

						<input type="submit" name="' . self::$register . '" value="Register" />
					</fieldset>
				</form>
			';
		}
	}