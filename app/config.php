<?php 
	session_start();

	if (!isset($_SESSION['global_token'])) {
		$_SESSION['global_token'] = md5( uniqid( mt_rand(),true ) );
	}

	if (!defined('BASE_PATH')) {
		define('BASE_PATH','http://localhost/equipo-3-tm-22-4ta/');
	}

	/*if(!isset($_SESSION['id'])) {
		if("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] != BASE_PATH) 
		header('Location:' . BASE_PATH);
	}*/
?>