<?php

class userDAL{
	private $conn;

	public function createSqlConnection(){
		//local SQL
		$SQLservername = "localhost";
		$SQLusername = "Register";
		$SQLpassword = "Register123";
		$SQLDatabase = "Register";

		//server SQL
		/*$SQLservername = "mysql8.000webhost.com";
		$SQLusername = "a3759003_RegName";
		$SQLpassword = "Register123";
		$SQLDatabase = "a3759003_Registr";*/

		// Create connection
		$this->conn = mysqli_connect($SQLservername, $SQLusername,$SQLpassword, $SQLDatabase);

		if (!$this->conn) {

		    die("Could not connect: " . mysql_error());

		}
		//echo "Connected successfully";
		return $this->conn;

		
	}
	public function closeSqlConnection(){
		mysqli_close($this->conn);
	}

	public function putUserInDatabase($usernameInput, $passwordInput){

		$connect = $this->createSqlConnection();

		/*
		$this->usernameInput = $usernameInput;// dessa två kommer ta bort alla onödiga blankspace osv. ifårn mina strängar!
		$this->userPasswordInput = $this->hash($usernameInput, $passwordInput);
		*/

		$sqlQuery = "INSERT INTO `register`.`register` (`Username`, `Password`) VALUES ('$usernameInput', '$passwordInput')";
		//$sqlQuery = "INSERT INTO `Register` (`Username`, `Password`) VALUES ('$usernameInput', '$passwordInput')";
		$connResult = $connect->query($sqlQuery);

		$this->closeSqlConnection();
		if(!$connResult){
			throw new EXCEPTION ("User exists, pick another username.");//denna skickar ett felmeddelande om nu en användare redan finns i databasen!
			//return false;
			//echo("Username already in use!"); 
		}

		return true;
	}
	public function getByUsername($username){

		$connect = $this->createSqlConnection();

		$sqlQuery = "SELECT Username, Password FROM Register WHERE BINARY Username='" . $username . "'";
		$connResult = $connect->query($sqlQuery);

		$row = $connResult->fetch_array();

		$this->closeSqlConnection();

		if (!isset($row))
			return null;
		if ($row == NULL)//om användarnamnet är null så returnerar det null!
			return null;

		$user = new User($row["Username"], $row["Password"]);

		return $user;
	}
}
