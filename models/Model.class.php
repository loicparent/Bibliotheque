<?php

	class Model {
		protected $connexion = null;

		public function __construct (){
			include('db.php');
			try {
				$this -> connexion = new PDO(sprintf('mysql:host=%s;dbname=%s', HOST_NAME, DB_NAME), USER_NAME, PASSWORD, $db_options);
				$this -> connexion -> query('SET CHARACTER SET UTF8');
				$this -> connexion -> query('SET NAMES UTF8');
			} catch (PDOException $e) {
				die ($e -> getMessage());
				// à ne pas mettre une fois le site terminé => pas tel quel!
			}
		}
	}