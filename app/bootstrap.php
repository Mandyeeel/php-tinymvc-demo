<?php 
	
	require_once('../app/config/config.php');
	 
	spl_autoload_register(function($classname){
		include_once(APPROOT . '/libraries/' . $classname . '.php');
	});