<?php
	session_start();  //är denna i Index så lever den i hela projektet!
//INCLUDE THE FILES NEEDED...
require_once('view/LoginView.php');
require_once('view/DateTimeView.php');
require_once('view/LayoutView.php');
require_once('model/LoginModelNew.php');
require_once('controller/LoginControl.php');

//MAKE SURE ERRORS ARE SHOWN... MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
// error_reporting(E_ALL);
// ini_set('display_errors', 'On');
  
//CREATE OBJECTS OF THE VIEWS  

$dtv = new DateTimeView();
$lv = new LayoutView();

$lm = new LoginModelNew();

$v = new LoginView($lm);

$lc = new LoginControl($v, $lm);

$lc->getLogin();

//$isLogedIn = false;
  
$lv->render($lm->checkLoginSession(), $v, $dtv); // istället för false först så anropar jag min LoginModel och funktionen getLoginstatus som kollar om man är inloggad! ifrån den! den returnerade true eller false

