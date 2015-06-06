<?php 
	class LibrariesController {
		private $librariesModel = null;
		public function __construct() 
			{
				$this->librariesModel = new LibrariesModel();
			}
		public function index(){
			$data['libraries'] = $this -> librariesModel -> getAll();
			$data['actifLink'] = "libraries";
			$data['styleName'] = "indexations";
			$data['page_title'] = "Bibliothèque en ligne — Toutes les bibliothèques";
			$data['view'] = 'index_libraries.php';
			return $data;
		}
		function view () {
			if ( isset($_REQUEST['id']) ) {
				$data['library'] = $this -> librariesModel -> getById($_REQUEST['id']);
				$data['books'] = $this -> librariesModel -> getBooksLibrary($_REQUEST['id']);
				$data['styleName'] = "info";
				$data['page_title'] = "Bibliothèque en ligne — info sur la bibliothèque de ".$data['library'] -> libraries_name;
				$data['view'] = 'view_library.php';
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
				if (!isset($_POST['address']) || ($_POST['address'] == "")) {
					$isError = 1;
				} else {
					$sentAddress = $_POST['address'];
				}
				if (!isset($_POST['phone']) || ($_POST['phone'] == "")) {
					$isError = 1;
				} else {
					$sentPhone = $_POST['phone'];
				}
				if (!isset($_FILES['img_file']['name']) || $_FILES['img_file']['name'] == "") {
					$isError = 1;
				} else {
					$nameParts = explode('.',$_FILES['img_file']['name']); // couper le nom à chaque . et séparer nom/extention
					$ext= strtolower(end($nameParts));
					$newname= md5($_FILES['img_file']['name']).time().'.'.$ext;
					$path='./img/libraries/'.$newname;
					$sentImage = $newname;
					move_uploaded_file( $_FILES['img_file']['tmp_name'], $path );
				}
				if (isset($isError)) {
					header('location: index.php?a=ad&e=libraries&error=1');
				} else {
					$this -> librariesModel -> create( $sentName, $sentAddress, $sentPhone, $sentImage );
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
			$data['page_title'] = "Bibliothèque en ligne — Ajouter une bibliothèque";
			$data['view'] = 'ad_library.php';
			return $data;
		}
	}