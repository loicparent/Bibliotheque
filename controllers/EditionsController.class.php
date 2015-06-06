<?php 
	class EditionsController {
		private $editionsModel = null;
		public function __construct() 
			{
				$this->editionsModel = new EditionsModel();
			}
		public function index(){
			$data['books'] = $this -> editionsModel -> getAll();
			$data['styleName'] = "indexations";
			$data['page_title'] = "Bibliothèque en ligne — Toutes les éditions";
			$data['view'] = 'index_editions.php';
			return $data;
		}
		function view () {
			if ( isset($_REQUEST['id']) ) {
				$data['book'] = $this -> editionsModel -> getById($_REQUEST['id']);
				$data['books'] = $this -> editionsModel -> getBooksEdition($_REQUEST['id']);
				$data['styleName'] = "info";
				$data['page_title'] = "Bibliothèque en ligne — info sur l’édition ".$data['book'] -> editions_name;
				$data['view'] = 'view_edition.php';
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
					$path='./img/editions/'.$newname;
					$sentImage = $newname;
					move_uploaded_file( $_FILES['img_file']['tmp_name'], $path );
				}
				if (isset($isError)) {
					header('location: index.php?a=ad&e=editions&error=1');
				} else {
					$this -> editionsModel -> create( $sentName, $sentImage, $sentDescription );
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
			$data['page_title'] = "Bibliothèque en ligne — Ajouter une édition";
			$data['view'] = 'ad_edition.php';
			return $data;
		}
	}