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
require_once("model/userDAL.php");

class masterController
{

	//MAKE SURE ERRORS ARE SHOWN... MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
	// error_reporting(E_ALL);
	// ini_set('display_errors', 'On');
	  
	//CREATE OBJECTS OF THE VIEWS  

	public function startMyApplication(){
	//databasen
		

		//original view
		$dtv = new DateTimeView();//
		$lv = new LayoutView();
		$uDAL = new userDAL();
		$rw = new registerView();
		$lm = new LoginModelNew($uDAL, $rw);


		if(isset($_GET["register"]))//delar upp min applikation i en register och en login väg!
		{
			$v = new registerView();// fick sätta denna till V för att det är vy för att den ska kunna köras!
			$rm = new RegistrationModel($uDAL, $rw);
			$rc = new RegisterControl($rm, $v);

			$rc->tryRegisterUser();

			if(isset($_SESSION["Redirect"]) && $_SESSION["Redirect"] == true){//redirekterar mi till login efter succes!
				$Login = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
				header("Location:$Login");
			}
		}
		else
	    {
			
			$v = new LoginView($lm);
			//login kontrollern sköter allt!
			$lc = new LoginControl($v, $lm);//$rm

			$lc->getLogin();
		}
		  
		$lv->render($lm->checkLoginSession(), $v, $dtv); // istället för false först så anropar jag min LoginModel och funktionen getLoginstatus som kollar om man är inloggad! ifrån den! den returnerade true eller false

	}
}