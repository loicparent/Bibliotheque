<?php 
	class CategoriesController {
		private $categoriesModel = null;
		public function __construct() 
			{
				$this->categoriesModel = new CategoriesModel();
			}
		public function index(){
			$data['books'] = $this -> categoriesModel -> getAll();
			$data['styleName'] = "indexations";
			$data['page_title'] = "Bibliothèque en ligne — Toutes les catégories";
			$data['view'] = 'index_categories.php';
			return $data;
		}
		function view () {
			if ( isset($_REQUEST['id']) ) {
				$data['book'] = $this -> categoriesModel -> getById($_REQUEST['id']);
				$data['books'] = $this -> categoriesModel -> getBooksCategory($_REQUEST['id']);
				$data['styleName'] = "info";
				$data['page_title'] = "Bibliothèque en ligne — info sur le genre ".$data['book'] -> categories_name;
				$data['view'] = 'view_category.php';
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
				if (isset($isError)) {
					header('location: index.php?a=ad&e=categories&error=1');
				} else {
					$this -> categoriesModel -> create( $sentName, $sentDescription );
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
			$data['page_title'] = "Bibliothèque en ligne — Ajouter un genre";
			$data['view'] = 'ad_category.php';
			return $data;
		}
	}