<?php 
	class UsersController {
		private $usersModel = null;
		private $booksModel = null;
		public function __construct() 
			{
				$this->usersModel = new UsersModel();
				$this->booksModel = new BooksModel();
			}
		public function login()
			{
				$data['actifLink'] = "login";
				$data['styleName'] = "compte";
				$data['page_title'] = "Bibliothèque en ligne — Connexion";
				$data['view'] = 'login_user.php'; // nom du fichier cible
				return $data;
			}
		public function check()
			{
				if( empty( $_REQUEST['username']) || empty( $_REQUEST['password']) ){
					// erreur si on a pas remplis tous les champs
					header('location: index.php?a=login&e=users&error=1');
					die();
				}
				
				$username = $_REQUEST['username'];
				$password = sha1( $_REQUEST['password'] );

				$user = $this->usersModel->get( $username, $password );

				if( $user ){
					$this->connect( $user->username, $user->id, $user->is_admin );
				} else {
					// erreur si mauvais mot de passe => UI pas dans la base de donnée
					header('location: index.php?a=login&e=users&error=2');
					die();
				}
			}
		public function connect( $username, $id, $isAdmin )
			{
				$_SESSION['user'] = $username;
				$_SESSION['id'] = $id;
				$_SESSION['connected'] = '1';

				if( $isAdmin == 1 ){
					$_SESSION['isAdmin'] = '1';
					header( 'Location: index.php?a=admin&e=pages' ); // redirection.
				} else if( $isAdmin == 0 ) {
					$_SESSION['isAdmin'] = '0';
					header( 'Location: index.php?a=view&e=users' ); // redirection.
				} else {
					header( 'Location: index.php?a=view&e=users' ); // redirection.
				}
			}
		public function disconnect()
			{
				session_destroy();
				unset( $_SESSION['user'] );
				unset( $_SESSION['connected'] );
				header( 'Location: index.php' ); // redirection.
			}
		public function register()
			{
				$data['actifLink'] = "register";
				$data['styleName'] = "compte";
				$data['page_title'] = "Bibliothèque en ligne — Inscription";
				$data['view'] = 'register_user.php'; // nom du fichier cible
				return $data;
			}
		public function create()
			{
				if ( empty( $_REQUEST['username']) || empty( $_REQUEST['password'] ) || empty( $_REQUEST['password2'] ) ){
					// erreur si on a pas remplis tous les champs
					header('location: index.php?a=register&e=users&error=1');
					die();
				}

				if( $_REQUEST['password'] != $_REQUEST['password2'] ) {
					// erreur si les mots de passes entré sont différents
					header('location: index.php?a=register&e=users&error=2');
					die();
				}
				
				$username = $_REQUEST['username'];
				$password = sha1( $_REQUEST['password'] );
				$user = $this->usersModel->get( $username, $password );
				if ($user) {
					// erreur si le compte existe déjà
					header('location: index.php?a=register&e=users&error=3');
					die();
				}

				$user = $this->usersModel->create( $username, $password );
				$user = $this->usersModel->get( $username, $password );
				$this->connect( $user->username, $user->id, $user->is_admin );
				header( 'Location: index.php?a=view&e=users' );
			}
		public function view() {
			if( !isset( $_SESSION['connected'] ) || $_SESSION['connected'] !== '1' ){
				header( 'Location: index.php' );
				die();
			}

			$data['books'] = $this -> booksModel -> getFavourites( $_SESSION['id'] );
			$data['actifLink'] = "user";
			$data['styleName'] = "admin";
			$data['page_title'] = "Bibliothèque en ligne — Mon compte";
			$data['view'] = 'view_user.php';


			return $data;
		}

		public function ad() {
			if( !isset( $_SESSION['connected'] ) || $_SESSION['connected'] !== '1' ){
			header( 'Location: index.php?a=login&e=users' );
		} else if( $_SESSION['isAdmin'] == '0' ) {
			header( 'Location: index.php' );
		}

			$data['users'] = $this -> usersModel -> getAll();
			$data['styleName'] = "admin";
			$data['page_title'] = "Bibliothèque en ligne — Modifier/supprimer un utilisateur";
			$data['view'] = 'ad_users.php';
			return $data;
		}
		public function setAdmin() {
			if( !isset( $_SESSION['connected'] ) || $_SESSION['connected'] !== '1' ){
			header( 'Location: index.php?a=login&e=users' );
		} else if( $_SESSION['isAdmin'] == '0' ) {
			header( 'Location: index.php' );
		}
			$who = $_GET['id'];
			$setAdmin = $this -> usersModel -> setAdmin( $who );
			header( 'Location: index.php?a=ad&e=users' );
		}
		public function setUser() {
			if( !isset( $_SESSION['connected'] ) || $_SESSION['connected'] !== '1' ){
			header( 'Location: index.php?a=login&e=users' );
		} else if( $_SESSION['isAdmin'] == '0' ) {
			header( 'Location: index.php' );
		}
			$who = $_GET['id'];
			$setUser = $this -> usersModel -> setUser( $who );
			header( 'Location: index.php?a=ad&e=users' );
		}
		public function delete() {
			if( !isset( $_SESSION['connected'] ) || $_SESSION['connected'] !== '1' ){
			header( 'Location: index.php?a=login&e=users' );
		} else if( $_SESSION['isAdmin'] == '0' ) {
			header( 'Location: index.php' );
		}
			$user = $_GET['id'];
			$delete = $this -> usersModel -> deleteUser( $user );
			header( 'Location: index.php?a=ad&e=users' );
		}
	}