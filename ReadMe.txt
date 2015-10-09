Instructions to run my Application

1. Download my repository.
2. Create a new database, (Don't create a Database with the same name as the Table "Register")
3. Enter this SQL command to create the tables you need:
  
  CREATE TABLE `Register` (
  `Username` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `Password` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`Username`)
  ) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

4. Enter all the missing SQL connection strings in Settings.php to create a connection to the database, hostname, databasename, username and password to the database
5. Run the application and register and try to login!
