<?php 
	class AuthorsController {
		private $authorsModel = null;
		public function __construct() 
			{
				$this->authorsModel = new AuthorsModel();
			}
		public function index(){
			$data['books'] = $this -> authorsModel -> getAll();
			$data['styleName'] = "indexations";
			$data['page_title'] = "Bibliothèque en ligne — Tous les auteurs";
			$data['view'] = 'index_authors.php';
			return $data;
		}
		function view () {
			if ( isset($_REQUEST['id']) ) {
				$data['book'] = $this -> authorsModel -> getById($_REQUEST['id']);
				$data['books'] = $this -> authorsModel -> getBooksAuthor($_REQUEST['id']);
				$data['styleName'] = "info";
				$data['page_title'] = "Bibliothèque en ligne — info sur l'auteur ".$data['book'] -> authors_name;
				$data['view'] = 'view_author.php';
				return $data;
			}else {
				die( 'oups' );
			}
		}
		function create () {
			if($_SERVER['REQUEST_METHOD'] != 'POST') {
				die('euh oups');
			} else {
				if (!isset($_POST['name']) || ($_POST['name'] == "")) {
					$isError = 1;
				} else {
					$sentName = $_POST['name'];
				}
				if (!isset($_POST['description']) || ($_POST['description'] == "")) {
					$isError = 1;
				} else {
					$sentDescription = $_POST['description'];
				}
				if (!isset($_FILES['img_file']['name']) || $_FILES['img_file']['name'] == "") {
					$isError = 1;
				} else {
					$nameParts = explode('.',$_FILES['img_file']['name']); // couper le nom à chaque . et séparer nom/extention
					$ext= strtolower(end($nameParts));
					$newname= md5($_FILES['img_file']['name']).time().'.'.$ext;
					$path='./img/authors/'.$newname;
					$sentImage = $newname;
					move_uploaded_file( $_FILES['img_file']['tmp_name'], $path );
				}
				if (isset($isError)) {
					header('location: index.php?a=ad&e=authors&error=1');
				} else {
					$this -> authorsModel -> create( $sentName, $sentImage, $sentDescription );
					header('location: index.php?a=admin&e=pages');
				}
			}
		}
		public function ad() {
			if( !isset( $_SESSION['connected'] ) || $_SESSION['connected'] !== '1' ){
				header( 'Location: index.php?a=login&e=users' );
			} else if( $_SESSION['isAdmin'] == '0' ) {
				header( 'Location: index.php' );
			}
			$data['styleName'] = "admin";
			$data['page_title'] = "Bibliothèque en ligne — Ajouter un auteur";
			$data['view'] = 'ad_author.php';
			return $data;
		}
	}