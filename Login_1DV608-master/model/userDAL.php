<?php

	class userDAL{

		public function createSqlConnection(){
			$SQLservername = "localhost";
			$SQLusername = "Register";
			$SQLpassword = "Register123";
			$SQLDatabase = "Assignment4";

			// Create connection
			$conn = mysqli_connect($SQLservername, $SQLusername,$SQLpassword, $SQLDatabase);

			if (!$conn) {

			    die('Could not connect: ' . mysql_error());

			}

			echo 'Connected successfully';
			mysqli_close($conn);
		}
	}