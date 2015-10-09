<?php

//
class LoginView {
	private static $login = 'LoginView::Login';
	private static $logout = 'LoginView::Logout';
	private static $name = 'LoginView::UserName';
	private static $password = 'LoginView::Password';
	private static $cookieName = 'LoginView::CookieName';
	private static $cookiePassword = 'LoginView::CookiePassword';
	private static $keep = 'LoginView::KeepMeLoggedIn';
	private static $messageId = 'LoginView::Message';
	private $loginModel;
	private static $previousName;
	private $message;
	private static $welcomeByeMessage = "";

	private static $registerLoginSite = "LoginView::register";
	private static $register = "LoginView::register";
	private static $regName = "LoginView::regUsername";
	private static $regPassword = "LoginView::regPassword";
	private static $regRePassword = "LoginView::regRePassword";

	public function __construct(LoginModelNew $loginModel){

		$this->loginModel = $loginModel;

	}

	public function checkUserLoginPost(){

		//denna kollar att man har rätt inlogingnsuppgifter!
		if(isset($_POST[self::$login]))//kollar så att man skrivet i något i fälten!
		{
			if(!isset($_SESSION["RedirektUsername"])){
				self::$previousName = $_POST[self::$name];
			}
			return true;
		}

		if(isset($_SESSION["RedirektUsername"])){
			self::$previousName = $_SESSION["RedirektUsername"];
			unset($_SESSION["RedirektUsername"]);
		}
	}

	public function getUserName(){
		
		if(isset($_POST[self::$name])){
		
			return $_POST[self::$name];//man kunde tydligen göra på båda sätten!
		
		}
	}
	public function getPassword(){
		//	echo "lösenordet är vad?";
		if(isset($_POST[self::$password])){

			return $_POST[self::$password];
		}
	}

	public function didUserLogout(){
		if(isset($_POST[self::$logout]))
		{
			return true;
		}
	}
	public function welcomeMessage(){
		self::$welcomeByeMessage = "Welcome";
		$this->actionMessages(self::$welcomeByeMessage);
	}
	public function byeMessage(){
		self::$welcomeByeMessage = "Bye bye!";
		$this->actionMessages(self::$welcomeByeMessage);
	}

	 public function actionMessages($message){// fick lägga till mina if och else if satset här istället!

				$this->message = $message;//tom message
		}


	/**
	 * Create HTTP response
	 *
	 * Should be called after a login attempt has been determined
	 *
	 * @return  void BUT writes to standard output and cookies!
	 */
	public function response() {
		
		$response = "";//skapar bara en tom sträng

		if(isset($_SESSION["Redirect"]) && $_SESSION["Redirect"] == true){//redirekterar mig till login efter succes!
			$this->message = "Registered new user.";
			unset($_SESSION["Redirect"]);
		}

		//else{
		if($this->loginModel->checkLoginSession()){

			$response = $this->generateLogoutButtonHTML($this->message);//anropar denna funktion om man nu lyckas logga in
		}
		else{
			$response .= $this->generateLoginFormHTML($this->message);//failar man så kommer detta visas! igen!  
		}
		return $response;
	}

	/**
	* Generate HTML code on the output buffer for the logout button
	* @param $message, String output message
	* @return  void, BUT writes to standard output!
	*/
	private function generateLogoutButtonHTML($message) {
		return '
			<form  method="post" >
				<p id="' . self::$messageId . '">' . $message .'</p>
				<input type="submit" name="' . self::$logout . '" value="logout"/>
			</form>
		';
	}
	 
	/**
	* Generate HTML code on the output buffer for the logout button
	* @param $message, String output message
	* @return  void, BUT writes to standard output!
	*/
	private function generateLoginFormHTML($message) {
		return '
			<form method="post" > 
				<fieldset>
					
					<legend>Login - enter Username and password</legend>
					<p id="' . self::$messageId . '">' . $message . '</p>
					
					<label for="' . self::$name . '">Username :</label>
					<input type="text" id="' . self::$name . '" name="' . self::$name . '" value="'. self::$previousName .'" />

					<label for="' . self::$password . '">Password :</label>
					<input type="password" id="' . self::$password . '" name="' . self::$password . '" />

					<label for="' . self::$keep . '">Keep me logged in  :</label>
					<input type="checkbox" id="' . self::$keep . '" name="' . self::$keep . '" />
					
					<input type="submit" name="' . self::$login . '" value="login" />
				</fieldset>
			</form>
		';
	}
	
	//CREATE GET-FUNCTIONS TO FETCH REQUEST VARIABLES
	private function getRequestUserName() {
		//RETURN REQUEST VARIABLE: USERNAME
	}
	
}