<?php
	class registerView{

		private static $messageId = 'LoginView::Message';
		private $loginModel;
		private $message;

		private static $registerLoginSite = "LoginView::register";
		private static $register = "LoginView::register";
		private static $regName = "LoginView::regUsername";
		private static $regPassword = "LoginView::regPassword";
		private static $regRePassword = "LoginView::regRePassword";


		public function checkUserRegisterPost(){

			//denna kollar att man har rätt inlogingnsuppgifter!
			if(isset($_POST[self::$register]))//kollar så att man skrivet i något i fälten!
			{
				//self::$previousName = $_POST[self::$regName];
				return true;
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
			$response = $this->generateLinkBetweenSitesButton();
			//$message = $this->loginModel->trylogingin($this->getUserName(), $this->getPassword());
			if(isset($_GET["register"])){
				$response .= $this->generateRegistrationFormHTML($this->message);
			}
		}
		private function generateLinkBetweenSitesButton(){

			if(isset($_GET["register"]))
			{
				return "<a href=?>Login Page</a>";
						//"<h2>Register new user</h2>";
			}
			else
			{
				return "<a href=?register>Registration Page</a>";
			}
			//return '<a href=?register>Registration Page</a>';
		}

		private function generateRegistrationFormHTML() {
			return '
				<form method="post" >
					<fieldset>
						
						<p id="' . self::$messageId . '">' . $this->message . '</p>
						<legend>Register a new user - Write a username and password</legend>
						
						<label for="' . self::$regName . '">Username :</label>
						<input type="text" id="' . self::$regName . '" name="' . self::$regName . '"  /></br>

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