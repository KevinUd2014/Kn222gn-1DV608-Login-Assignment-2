<?php
require_once("userDAL.php");//
class User{

	private $username;
	private $password;

	//private $dal;

	private $giveMeSomeSalt = "MayIHaveSomeSaltPLEASE??";//salt som borde ligga i Settings 
	private $salt2 = "heheh?";//salt som borde ligga i Settings 
	private $salt3 = "?!Youwillneverfindout";//salt som borde ligga i Settings 

	public function __construct($uname,$pword = null)
	{
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

	public function GetPasswordHash(){//hämtar lösenordet!
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
}

