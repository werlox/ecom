<?php
date_default_timezone_set("Indian/Maldives");

	session_start();
	
	function logged_in() {
		if(isset($_SESSION['login'])){
		return ($_SESSION['login'] == "Admin") || ($_SESSION['login'] == "Standard");
	}}
	
	function logged_in_admin() {
		if(isset($_SESSION['login'])){
		return ($_SESSION['login'] == "Admin");
	}}
	
	function logged_in_ac() {
		if(isset($_SESSION['login'])){
		return ($_SESSION['login'] == "Guest");
	}}
	
		
	function confirm_logged_in() {
		if (!logged_in()) {
			header("location login.php");
		}
	}

	if(!isset($_SESSION['items'])) {
		$_SESSION['items'] = array();
	}

?>
