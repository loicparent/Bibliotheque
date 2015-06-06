<?php 
	
	if(!defined('DB_NAME')){
		define('DB_NAME', 'Bibliotheque');
	}
	if(!defined('USER_NAME')){
		define('USER_NAME', 'root');
	}
	if(!defined('PASSWORD')){
		define('PASSWORD', 'root');
	}
	if(!defined('HOST_NAME')){
		define('HOST_NAME', 'localhost');
	}

	$db_options = [
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, // OBJ => class -> var ≠  ASSOC => tableau associatif['nom'];
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // Affiche un message si on n'arrive pas à se connecter à la base de donnée
	];