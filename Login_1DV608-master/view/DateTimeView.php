<?php
//
class DateTimeView {


	

	public function show() {

		date_default_timezone_set("Europe/Stockholm");
		$timeString = date('l\, \t\h\e jS \o\f F Y\, \T\h\e \t\i\m\e \i\s H:i:s');//http://www.w3schools.com/php/func_date_date.asp
																				  //http://php.net/manual/en/function.date.php
		return '<p>' . $timeString . '</p>';//denna ska skriva ut min sträng!
	}
}