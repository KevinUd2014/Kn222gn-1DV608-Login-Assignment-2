<?php
	//session_start();  //är denna i Index så lever den i hela projektet!
//INCLUDE THE FILES NEEDED...

	require_once("controller\masterController.php");

	$masterController = new masterController();

	$masterController->startMyApplication();

// require_once('view/LoginView.php');
// require_once('view/DateTimeView.php');
// require_once('view/LayoutView.php');
// require_once('model/LoginModelNew.php');
// require_once('controller/LoginControl.php');
// require_once("model/RegistrationModel.php");
// require_once("model/RegistrationModel.php");
// require_once("model/userCredentials.php");
// require_once("model/userDAL.php");

// //MAKE SURE ERRORS ARE SHOWN... MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
// // error_reporting(E_ALL);
// // ini_set('display_errors', 'On');
  
// //CREATE OBJECTS OF THE VIEWS  

// // $mysql_host = "mysql8.000webhost.com";
// // $mysql_database = "a3759003_RegBase";
// // $mysql_user = "a3759003_Ass4";
// // $mysql_password = "Register123";//databasen med ösen osv.

// //databasen
// $uDAL = new userDAL();
// $uC = new userCredentials();

// //original view
// $dtv = new DateTimeView();//
// $lv = new LayoutView();

// //loginmodellen
// $lm = new LoginModelNew();
// //reg modellen
// $rm = new RegistrationModel();
// //loginvyn - skriver ut
// $v = new LoginView($lm);
// //login kontrollern sköter allt!
// $lc = new LoginControl($v, $lm, $rm);

// $uDAL->createSqlConnection(); //skriver ut om connection till datorbasen funkade!

// $lc->getLogin();

// //$isLogedIn = false;
  
// $lv->render($lm->checkLoginSession(), $v, $dtv); // istället för false först så anropar jag min LoginModel och funktionen getLoginstatus som kollar om man är inloggad! ifrån den! den returnerade true eller false

