<?php


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
			self::$previousName = $_POST[self::$name];
			return true;
		}
	}
	// public function checkUserRegisterPost(){

	// 	//denna kollar att man har rätt inlogingnsuppgifter!
	// 	if(isset($_POST[self::$register]))//kollar så att man skrivet i något i fälten!
	// 	{
	// 		//self::$previousName = $_POST[self::$regName];
	// 		return true;
	// 	}
	// }

	public function getUserName(){
		//echo "användarnamn är vad?";
		//$userInputName = $_POST[self::$name];
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
	// public function getRegName(){
	// 	if(isset($_POST[self::$regName]))
	// 	{
	// 		return $_POST[self::$regName];
	// 	}
	// }
	// public function getRegPassword(){
	// 	if(isset($_POST[self::$regPassword]))
	// 	{
	// 		return $_POST[self::$regPassword];
	// 	}
	// }
	// public function getRegRePassword(){
	// 	if(isset($_POST[self::$regRePassword]))
	// 	{
	// 		return $_POST[self::$regRePassword];
	// 	}
	// }
	public function welcomeMessage(){
		self::$welcomeByeMessage = "Welcome";
		$this->actionMessages(self::$welcomeByeMessage);
	}
	public function byeMessage(){
		self::$welcomeByeMessage = "Bye bye!";
		$this->actionMessages(self::$welcomeByeMessage);
	}

	 public function actionMessages($message){// fick lägga till mina if och else if satset här istället!
	 	//$message = "";
	
		//echo $message;
		$this->message = $message;//tom message

	// 	if($this->checkUserLoginPost())
	// 	{

	// 		if($this->getUserName() == "")
	// 		{
	// 			$this->message = "Username is missing";
	// 		} 
			
	// 		else if($this->getPassword() == "")
	// 		{
	// 			$this->message = "Password is missing";
	// 		}
	// 		else if (!$this->loginModel->checkLoginSession()){
	// 			$this->message = "Wrong name or password";
	// 		}
			
	// 		else if($this->loginModel->checkLoginSession() && $_SESSION["successMessage"])//man måste ha båda korrekta och även 
	// 		{
	// 			$_SESSION["successMessage"] = false;
	// 			$this->message = "Welcome";
	// 		}
	// 		else if ($this->didUserLogout() && !$_SESSION["successMessage"]) //flytta denna utanför if!
	// 		{
	// 			$_SESSION["successMessage"] = true;
	// 			$this->message = "Bye bye!";
	// 			session_destroy();
	// 		}
		}

	// }


	/**
	 * Create HTTP response
	 *
	 * Should be called after a login attempt has been determined
	 *
	 * @return  void BUT writes to standard output and cookies!
	 */
	public function response() {
		

		//$this->actionMessages();//anropar min funktion!
		//$this->message = self::$welcomeByeMessage;
		//$message = $this->loginModel->loginResultMessage();//anropar funktionen!

		$response = "";//skapar bara en tom sträng
		//$response = $this->generateLinkBetweenSitesButton();
		//$message = $this->loginModel->trylogingin($this->getUserName(), $this->getPassword());
		//if(isset($_GET["register"])){
		//$response .= $this->generateRegistrationFormHTML($this->message);
		//}

		//else{
		if($this->loginModel->checkLoginSession()){

			$response = $this->generateLogoutButtonHTML($this->message);//anropar denna funktion om man nu lyckas logga in
		}
		else{

			$response .= $this->generateLoginFormHTML($this->message);//failar man så kommer detta visas! igen!  
		}
	//}
		return $response;
	}

	// private function generateLinkBetweenSitesButton(){

	// 	if(isset($_GET["register"]))
	// 	{
	// 		return "<a href=?"">Login Page</a>";
	// 				//"<h2>Register new user</h2>";
	// 	}
	// 	else
	// 	{
	// 		return "<a href=?register>Registration Page</a>";
	// 	}
	// 	//return '<a href=?register>Registration Page</a>';
	// }

	// private function generateRegistrationFormHTML() {
	// 	return '
	// 		<form method="post" >
	// 			<fieldset>
					
	// 				<p id="' . self::$messageId . '">' . $this->message . '</p>
	// 				<legend>Register a new user - Write a username and password</legend>
					
	// 				<label for="' . self::$regName . '">Username :</label>
	// 				<input type="text" id="' . self::$regName . '" name="' . self::$regName . '"  /></br>

	// 				<label for="' . self::$regPassword . '">Password :</label>
	// 				<input type="password" id="' . self::$regPassword . '" name="' . self::$regPassword . '" /></br>

	// 				<label for="' . self::$regRePassword . '">Repeat Password :</label>
	// 				<input type="password" id="' . self::$regRePassword . '" name="' . self::$regRePassword . '" /></br>

	// 				<input type="submit" name="' . self::$register . '" value="Register" />
	// 			</fieldset>
	// 		</form>
	// 	';
	// }


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