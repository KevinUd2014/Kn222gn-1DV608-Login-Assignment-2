<?php
require_once("userDAL.php");
class User{

	private $username;
	private $password;

	//private $dal;

	private $giveMeSomeSalt = "MayIHaveSomeSaltPLEASE??";
	private $salt2 = "heheh?";
	private $salt3 = "?!Youwillneverfindout";

	public function __construct($uname,$pword = null)
	{
		//$this->dal = new userDAL();
		$this->username = $uname;
		if ($pword != null)//password får inte vara null!
			$this->password = $this->hash($pword);
	}

	public function GetUsername(){//
		return $this->username;
	}

	public function SetHashedPassword($password)
	{
		$this->password = $password;
	}

	public function GetPasswordHash(){
		return $this->password;
	}

	public function ComparePassword($password){
		if($this->hash($password) == $this->password){ 
			return true;//returnerar true om hash är samma som hash! 
		}
		else{
			return false;
		}
	}

	private function hash($password){//hashar lösenordet och lägger in massa saker i hashen som gör den oläslig!

		return sha1($this->giveMeSomeSalt.$password.$this->salt2.$this->username.$this->salt3);
	}

	// public static function PutInDatabase($user)// denna ska lägga in de nya loginvärderna i datorbasen!
	// {
	// 	$result = self::$dal->putUserInDatabase($user->GetUsername(), $user->GetPasswordHash());
	// 	return $result;
	// }

	// public static function Get($username){

	// 	$data = $this->dal->getByUsername($username);

	// 	if ($data == NULL)//om användarnamnet är null så returnerar det null!
	// 		return null;

	// 	$user = new User($data["Username"]);
	// 	$user->SetHashedPassword($data["Password"]);//sätter de nya lösenordet och usernamnet!

	// 	return $user;
	// }

// // RASMUS SHITE

// 	public static function GetAllUsers()
// 	{
// 		$data = self::$dal->GetAllUsers();
// 		$users = array();
// 		foreach($data as $user)
// 		{
// 			array_push($users,new User($user["Username"]));
// 		}

// 		return $users;
// 	}

// 	public static function ListAllUsers()
// 	{
// 		$users = self::GetAllUsers();
// 		$html = "<ul>";
// 		foreach($users as $user)
// 		{
// 			$html .= "<li>".$user->GetUsername();
// 		}
// 		$html .= "</ul>";

// 		return $html;
// 	}
// 	//SLUT PÅ RASMUS HSITE
}

