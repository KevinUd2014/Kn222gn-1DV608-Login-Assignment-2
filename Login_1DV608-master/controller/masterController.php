<?php
session_start();
//chdir("../");
require_once('view/LoginView.php');
require_once('view/DateTimeView.php');
require_once('view/LayoutView.php');
require_once('view/registerView.php');
require_once('model/LoginModelNew.php');
require_once('controller/LoginControl.php');
require_once('controller/registerControl.php');
require_once("model/RegistrationModel.php");
require_once("model/RegistrationModel.php");
require_once("model/userCredentials.php");
require_once("model/userDAL.php");

class masterController
{

	//MAKE SURE ERRORS ARE SHOWN... MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
	// error_reporting(E_ALL);
	// ini_set('display_errors', 'On');
	  
	//CREATE OBJECTS OF THE VIEWS  

	// $mysql_host = "mysql8.000webhost.com";
	// $mysql_database = "a3759003_RegBase";
	// $mysql_user = "a3759003_Ass4";
	// $mysql_password = "Register123";//databasen med ösen osv.
	public function startMyApplication(){
	//databasen
		
		$uC = new userCredentials();

		//original view
		$dtv = new DateTimeView();//
		$lv = new LayoutView();
		$lm = new LoginModelNew();



		if(isset($_GET["register"]))
		{
			$uDAL = new userDAL();
			$v = new registerView();// fick sätta denna till V för att det är vy för att den ska kunna köras!
			$rm = new RegistrationModel();
			$rc = new RegisterControl($rm, $v);

			$rc->tryRegisterUser();
		}
		else
	    {
			
			$v = new LoginView($lm);
			//login kontrollern sköter allt!
			$lc = new LoginControl($v, $lm);//$rm

			$lc->getLogin();
		}

		$uDAL->createSqlConnection(); //skriver ut om connection till datorbasen funkade!

		

		//$isLogedIn = false;
		  
		$lv->render($lm->checkLoginSession(), $v, $dtv); // istället för false först så anropar jag min LoginModel och funktionen getLoginstatus som kollar om man är inloggad! ifrån den! den returnerade true eller false

	}
}