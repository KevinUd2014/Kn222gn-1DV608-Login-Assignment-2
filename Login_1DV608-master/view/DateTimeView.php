<?php

class DateTimeView {


	

	public function show() {

		//$today = getdate();
		//$time = gettimeofday();
		
		date_default_timezone_set("Europe/Stockholm");

		//$day = date("jS");
		//$date = date("H:m:s")
		
		//kan vara så att detta blir servertiden! och isåfall så kan tiden bli fel!
		//måste ha med st, nd och th efter dagen!

		//$timeString = "$today[weekday], the $today[mday] of $today[month] $today[year], The time is $today[hours]:$today[minutes]:$today[seconds]"; //kan ändra Hours osv till bara $date!!
		
		$timeString = date('l\, \t\h\e jS \o\f F Y\, \T\h\e \t\i\m\e \i\s H:i:s');//http://www.w3schools.com/php/func_date_date.asp
																				  //http://php.net/manual/en/function.date.php
		return '<p>' . $timeString . '</p>';
	}
}