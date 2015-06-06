<?php 
	class BooksController {

		private $booksModel = null;
		private $usersModel = null;
		private $authorsModel = null;
		private $categoriesModel = null;
		private $editionsModel = null;
		private $librariesModel = null;

		public function __construct(){
			$this -> booksModel = new BooksModel();
			$this -> usersModel = new UsersModel();
			$this-> authorsModel = new AuthorsModel();
			$this-> categoriesModel = new CategoriesModel();
			$this-> editionsModel = new EditionsModel();
			$this-> librariesModel = new LibrariesModel();
		}

		public function pagination () {
			//Compter le nbre de livre
			$totalBooks = $this->booksModel->count();
			//on défini le nbre de livre 
			$perPage = 5;
			$start = Paginate::getStart( $perPage, $totalBooks );
			$data['books'] = $this -> booksModel -> getRecent( $start, $perPage );
			$data['view'] = 'index_allBooks.php';
			$data['actifLink'] = "allBooks";
			$data['styleName'] = "indexations";
			$data['page_title'] = "Bibliothèque en ligne — Tous les livres";
			$data['totalPages'] = Paginate::getTotal( $totalBooks, $perPage );
			return $data;
		}

		public function addfave(){
			if( !isset( $_GET['id'] ) ){
				die('Un problème est survenu lors de la récupération de donné.');
			} else if( !isset($_SESSION['id']) ){
				die('heu tu n‘es pas connecté');
			}
			$userId=$_SESSION['id'];
			$bookId=$_GET['id'];

			$this->usersModel->addToFaves( $userId, $bookId );
			header('Location: index.php?a=view&e=books&id='.$bookId);

		}

		public function removefave(){
			if( !isset( $_GET['id'] ) ){
				die('Un problème est survenu lors de la récupération de donné.');
			} else if( !isset($_SESSION['id']) ){
				die('heu tu n‘es pas connecté');
			}
			$userId=$_SESSION['id'];
			$bookId=$_GET['id'];

			$this->usersModel->removeFromFaves( $userId, $bookId );
			if (isset($_REQUEST['dir']) && $_REQUEST['dir'] == 'user' ) {
				header('Location: index.php?a=view&e=users&id='.$userId);
			} else {
				header('Location: index.php?a=view&e=books&id='.$bookId);
			}

		}

		function index () {
			$data['books'] = $this -> booksModel -> getRecent( 0, 3 );
			$data['bookOfWeek'] = $this -> booksModel -> getBookOfWeek();
			$data['actifLink'] = "index";
			$data['styleName'] = "style";
			$data['page_title'] = "Bibliothèque en ligne — Accueil";
			$data['view'] = 'index_books.php';
			return $data;
		}
		function view () {
			if ( isset($_REQUEST['id']) ) {
				if (isset($_SESSION['connected']) && $_SESSION['connected'] == 1 && $_SESSION['isAdmin'] == 0) {
					$favourites = $this -> booksModel -> getFavourites( $_SESSION['id'] );
					$data['isInFavourites'] = false;
					foreach ($favourites as $fav) {						
						if ( $_REQUEST['id'] == $fav -> book_id ) {
							$data['isInFavourites'] = true;
						}
					}
				}
				$data['sameCategory'] = $this -> booksModel -> getSameCategory($_REQUEST['id']);
				$data['book_libraries'] = $this -> librariesModel -> getAllFromBook($_REQUEST['id']);
				$data['book'] = $this -> booksModel -> getById($_REQUEST['id']);
				$data['styleName'] = "livre";
				$data['page_title'] = "Bibliothèque en ligne — ".$data['book'] -> title;
				$data['view'] = 'view_book.php';
				return $data;
			}else {
				die( 'Un problème est survenu lors de la récupération de donné.' );
			}
		}
		function create () {
			if($_SERVER['REQUEST_METHOD'] != 'POST') {
				die('Un problème est survenu lors de l’envoi de donnée au serveur');
			} else {
				if (!isset($_POST['title']) || ($_POST['title'] == "")) {
					$isError = 1;
				} else {
					$sentTitle = $_POST['title'];
				}
				if (!isset($_POST['author']) || ($_POST['author'] == "")) {
					$isError = 1;
				} else {
					$sentAuthor = $_POST['author'];
				}
				if (!isset($_POST['edition']) || ($_POST['edition'] == "")) {
					$isError = 1;
				} else {
					$sentEdition = $_POST['edition'];
				}
				if (!isset($_POST['category']) || ($_POST['category'] == "")) {
					$isError = 1;
				} else {
					$sentCategory = $_POST['category'];
				}
				if (!isset($_POST['library']) || ($_POST['library'] == "")) {
					$isError = 1;
				} else {
					$sentLibrary = $_POST['library'];
				}
				if (!isset($_POST['language']) || ($_POST['language'] == "")) {
					$isError = 1;
				} else {
					$sentLanguage = $_POST['language'];
				}
				if (!isset($_POST['length']) || ($_POST['length'] == "")) {
					$isError = 1;
				} else {
					$sentLength = $_POST['length'];
				}
				if (!isset($_POST['year']) || ($_POST['year'] == "")) {
					$isError = 1;
				} else {
					$sentYear = $_POST['year'];
				}
				if (!isset($_POST['disponibility'])) {
					$isError = 1;
				} else {
					$sentDisponibility = $_POST['disponibility'];
				}
				if (!isset($_POST['bookOfWeek'])) {
					$sentBookOfWeek = 0;
				} else {
					$sentBookOfWeek = 1;
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
					$path='./img/covers/'.$newname;
					$sentImage = $newname;

					move_uploaded_file( $_FILES['img_file']['tmp_name'], $path );
				}
				if (isset($isError)) {
					header('location: index.php?a=admin&e=pages&error=1');
				} else {
					$this -> booksModel -> create( $sentTitle, $sentAuthor, $sentEdition, $sentCategory, $sentLanguage, $sentLength,$sentYear, $sentDisponibility, $sentBookOfWeek, $sentImage, $sentDescription );
					$this -> librariesModel -> addBooksLibrary( $sentLibrary, $sentImage );
					header('location: index.php?a=admin&e=pages');
					die();
				}
			}

		}

		function change () {
			if($_SERVER['REQUEST_METHOD'] != 'POST') {
				die('Un problème est survenu lors de l’envoi de donnée au serveur');
			} else {
				if (!isset($_POST['id']) || ($_POST['id'] == "")) {
					die('error No Found ID of book');
				} else {
					$id_book = $_POST['id'];
				}
				if (!isset($_POST['title']) || ($_POST['title'] == "")) {
					$isError = 1;
				} else {
					$sentTitle = $_POST['title'];
				}
				if (!isset($_POST['author']) || ($_POST['author'] == "")) {
					$isError = 1;
				} else {
					$sentAuthor = $_POST['author'];
				}
				if (!isset($_POST['edition']) || ($_POST['edition'] == "")) {
					$isError = 1;
				} else {
					$sentEdition = $_POST['edition'];
				}
				if (!isset($_POST['category']) || ($_POST['category'] == "")) {
					$isError = 1;
				} else {
					$sentCategory = $_POST['category'];
				}
				if (!isset($_POST['library']) || ($_POST['library'] == "")) {
					$isError = 1;
				} else {
					$sentLibrary = $_POST['library'];
				}
				if (!isset($_POST['language']) || ($_POST['language'] == "")) {
					$isError = 1;
				} else {
					$sentLanguage = $_POST['language'];
				}
				if (!isset($_POST['length']) || ($_POST['length'] == "")) {
					$isError = 1;
				} else {
					$sentLength = $_POST['length'];
				}
				if (!isset($_POST['year']) || ($_POST['year'] == "")) {
					$isError = 1;
				} else {
					$sentYear = $_POST['year'];
				}
				if (!isset($_POST['disponibility'])) {
					$isError = 1;
				} else {
					$sentDisponibility = $_POST['disponibility'];
				}
				if (!isset($_POST['bookOfWeek'])) {
					$sentBookOfWeek = 0;
				} else {
					$sentBookOfWeek = 1;
				}
				if (!isset($_POST['description']) || ($_POST['description'] == "")) {
					$isError = 1;
				} else {
					$sentDescription = $_POST['description'];
				}
				if (isset($isError)) {
					header('location: index.php?a=edit&e=books&id='.$id_book.'&error=1');
				} else {
					$this -> booksModel -> change( $id_book ,$sentTitle, $sentAuthor, $sentEdition, $sentCategory, $sentLanguage, $sentLength, $sentYear, $sentDisponibility, $sentBookOfWeek, $sentDescription );
					$this -> librariesModel -> changeBooksLibrary( $sentLibrary, $id_book );
					header('location: index.php?a=view&e=books&id='.$id_book);
					die();
				}
			}
		}

		public function delete(){
			if ( isset($_REQUEST['id']) && isset($_REQUEST['img_file']) ) {
				if ($_SESSION['connected'] == 1 && $_SESSION['isAdmin'] == 1) {
					$bookId = $_GET['id'];
					$img_file = $_GET['img_file'];
					unlink ('./img/covers/'.$img_file);
					$this->booksModel->deleteBook( $bookId );
					header( 'Location: index.php?a=pagination&e=books' );
				}
			} else {
				die('Un problème est survenu lors de la récupération de donné.');
			}
		}


		public function edit(){
			if( !isset( $_SESSION['connected'] ) || $_SESSION['connected'] !== '1' ){
				header( 'Location: index.php?a=login&e=users' );
			} else if( $_SESSION['isAdmin'] == '0' ) {
				header( 'Location: index.php' );
			}
			$bookId = $_GET['id'];
			$data['books'] = $this->booksModel->editBook( $bookId );
			$data['authors'] = $this->authorsModel->getAll();
			$data['categories'] = $this->categoriesModel->getAll();
			$data['editions'] = $this->editionsModel->getAll();
			$data['libraries'] = $this->librariesModel->getAll();
			$data['book_libraries'] = $this -> librariesModel -> getAllFromBook( $bookId );
			$data['styleName'] = "admin";
			$data['page_title'] = "Bibliothèque en ligne — Mofifier le livre ".$data['books'] -> title;
			$data['view'] = 'edit_book.php';
			return $data;
		}
		public function editImg(){
			if( !isset( $_SESSION['connected'] ) || $_SESSION['connected'] !== '1' ){
				header( 'Location: index.php?a=login&e=users' );
			} else if( $_SESSION['isAdmin'] == '0' ) {
				header( 'Location: index.php' );
			}
			$bookId = $_GET['id'];
			$data['books'] = $this->booksModel->editBook( $bookId );
			$data['styleName'] = "admin";
			$data['page_title'] = "Bibliothèque en ligne — Mofifier l’image du livre ".$data['books'] -> title;
			$data['view'] = 'editImg_book.php';
			return $data;
		}
		public function replaceImg(){
			if( !isset( $_SESSION['connected'] ) || $_SESSION['connected'] !== '1' ){
				header( 'Location: index.php?a=login&e=users' );
			} else if( $_SESSION['isAdmin'] == '0' ) {
				header( 'Location: index.php' );
			}
			$bookId = $_GET['id'];

			if (!isset($_FILES['img_file']['name']) || $_FILES['img_file']['name'] == "") {
				$isError = 1;
			} else {
				//supprimer du dossier l'image existante
				$img = $_GET['img'];

				//ajouter la nouvelle image (renomée) dans la base de donnée + dans le dossier
				$nameParts = explode('.',$_FILES['img_file']['name']); // couper le nom à chaque . et séparer nom/extention
				$ext= strtolower(end($nameParts));
				$newname= md5($_FILES['img_file']['name']).time().'.'.$ext;
				$path='./img/covers/'.$newname;
				$img_file = $newname;
				move_uploaded_file( $_FILES['img_file']['tmp_name'], $path );
				unlink ('./img/covers/'.$img);	
			}

			if (isset($isError)) {
				header('location: index.php?a=editImg&e=books&id='.$bookId.'&error=1');
			} else {
				$this->booksModel->replaceImgBook( $bookId, $img_file );
				$data['books'] = $this->booksModel->editBook( $bookId );
				$data['authors'] = $this->authorsModel->getAll();
				$data['categories'] = $this->categoriesModel->getAll();
				$data['editions'] = $this->editionsModel->getAll();
				$data['libraries'] = $this->librariesModel->getAll();
				$data['book_libraries'] = $this -> librariesModel -> getAllFromBook( $bookId );
				$data['styleName'] = "admin";
				$data['page_title'] = "Bibliothèque en ligne — Mofifier le livre ".$data['books'] -> title;
				$data['view'] = 'edit_book.php';
				return $data;
			}
		}

	}