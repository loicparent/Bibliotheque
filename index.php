<?php 

	error_reporting(E_ALL);
	ini_set('display_error',1);

	session_start();

	set_include_path('views:configs:controllers:models:helpers:' . get_include_path());
	// set_include_path => définir les dossiers qu'il peut voir.

	
	spl_autoload_register(function ($className) {
		include($className  . '.class.php');
	});

	// Inclusion des routes => chemin
	include('routes.php');
	include('db.php');

	// Créer un tableau qui récupère les routes:
	// explode = divise le tableau en deux cellules par le paramètre entré ici '/'
	$routeParts = explode('/', $routes['default']);
	// $a = action et $e = controller
	$a = isset($_REQUEST['a']) ? $_REQUEST['a'] : $routeParts[0];
	$e = isset($_REQUEST['e']) ? $_REQUEST['e'] : $routeParts[1];
	$route = $a . '/' . $e; // regrouper l'explode
	
	if (!in_array($route, $routes)) {
		//Afficher la page 404 si on est hors du routage
		header('location: index.php?a=view&e=errors&type=404');
		die();
	}

	// Déterminer le choix du controller.
	$controllerFileName = ucfirst($e) . 'Controller';
	$controller = new $controllerFileName;

	//Exécuter la fonction correspondante à l'action demandée
	$data = call_user_func([$controller, $a]);

	include('views/layout.php');