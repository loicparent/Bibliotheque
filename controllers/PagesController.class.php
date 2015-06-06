<?php 

class PagesController {

	private $authorsModel = null;
	private $categoriesModel = null;
	private $editionsModel = null;
	private $librariesModel = null;
	private $booksModel = null;
	private $searchModel = null;

	public function __construct(){
		$this->authorsModel = new AuthorsModel();
		$this->categoriesModel = new CategoriesModel();
		$this->editionsModel = new EditionsModel();
		$this->librariesModel = new LibrariesModel();
		$this->booksModel = new BooksModel();
		$this->searchModel = new SearchModel();
	}

	public function admin() {
		if( !isset( $_SESSION['connected'] ) || $_SESSION['connected'] !== '1' ){
			header( 'Location: index.php?a=login&e=users' );
		} else if( $_SESSION['isAdmin'] == '0' ) {
			header( 'Location: index.php' );
		}

		$data['authors'] = $this->authorsModel->getAll();
		$data['categories'] = $this->categoriesModel->getAll();
		$data['editions'] = $this->editionsModel->getAll();
		$data['libraries'] = $this->librariesModel->getAll();

		$data['actifLink'] = "admin";
		$data['styleName'] = "admin";
		$data['page_title'] = "Bibliothèque en ligne — Administration";
		$data['view'] = 'view_admin.php';
		return $data;
	}

	public function search() {
		if( isset( $_POST['main-search'] ) ){
			$search = htmlspecialchars(trim($_POST['main-search']));
			if (empty( $search )) {
				// error: champs vide
				header('location: index.php?a=search&e=pages&error=1');
				die();
			} else if ( strlen( $search ) <= 2 ) {
				// erro: mot-clé trop court
				header('location: index.php?a=search&e=pages&error=2');
				die();
			} else {
				$data['resultBooks'] = $this->searchModel->searchBooks( $search );
				$data['resultAuthors'] = $this->searchModel->searchAuthors( $search );
				$data['resultEditions'] = $this->searchModel->searchEditions( $search );
				$data['resultCategories'] = $this->searchModel->searchCategories( $search );
				$data['resultLibraries'] = $this->searchModel->searchLibraries( $search );
			}
		}

		$data['styleName'] = "indexations";
		$data['page_title'] = "Bibliothèque en ligne — Résultat(s) de recherche";
		$data['view'] = 'view_result.php';

		return $data;
	}
}