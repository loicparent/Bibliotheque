<?php 

	class BooksModel extends Model{ // extends = hérite de Model
		public function getAll() {
			$sql = "SELECT id, title FROM books";
			$requete = $this->connexion->query($sql);
			return $requete->fetchAll();
			// fetchAll() -> retourne un affichage de toute les valeurs => toute les colonnes
		}
		public function getRecent( $start, $count ) {
			$sql = "SELECT books.id, books.title, authors.name as author_name, categories.name as category_name, books.description, books.img_file FROM books 
						JOIN authors on books.author_id = authors.id 
						JOIN editions on books.edition_id = editions.id 
						JOIN categories on books.category_id = categories.id 
						ORDER BY books.id DESC LIMIT {$start},{$count}";
			// ORDER BY id DESC -> récupèreen ordre décrossant les différents id
			$requete = $this->connexion->query($sql);
			return $requete->fetchAll();
			// fetchAll() -> retourne un affichage de toute les valeurs => toute les colonnes
		}
		public function getBookOfWeek() {
			$sql = "SELECT books.id, books.title, books.description, books.img_file FROM books 
						WHERE books.selection = 1";
			$requete = $this->connexion->query($sql);
			return $requete->fetch();
		}

		public function getSameCategory($id) {
			//$category = 'SELECT categories.id as category_id FROM books WHERE books.id = :id';
			$sql = 'SELECT books.id,books.title, books.img_file
					FROM books JOIN categories on books.category_id = categories.id 
					WHERE books.category_id ='.$id;
			$requete = $this->connexion->query($sql);
			$requete -> execute([':id' => $id]);
			return $requete->fetchAll();
			// fetchAll() -> retourne un affichage de toute les valeurs => toute les colonnes
		}
		public function getById($id) {
			$sql = 'SELECT books.id as book_id, books.title, authors.name as authors_name, authors.id as author_id, categories.name as categories_name, categories.id as category_id, books.description, editions.name as editions_name, editions.id as edition_id, books.langage, books.length, books.year, books.disponibility, books.img_file as img_file FROM books 
				JOIN authors on books.author_id = authors.id 
				JOIN editions on books.edition_id = editions.id 
				JOIN categories on books.category_id = categories.id 
				WHERE books.id = :id';
			$requete = $this->connexion->prepare($sql);
			$requete -> execute([':id' => $id]);
			return $requete -> fetch();
		}

		public function create( $title, $author_id, $edition_id, $category_id, $language, $length, $year, $disponibility, $bookOfWeek, $img_file, $description ) {
			$sql = 'INSERT INTO books( title, author_id, edition_id, category_id, langage, length, year, disponibility, selection, img_file, description ) VALUES( :title, :author_id, :edition_id, :category_id, :language, :length, :year, :disponibility, :bookOfWeek, :img_file, :description );';
			
			$requete = $this->connexion->prepare($sql);
			$requete -> execute([
					':title' => $title,
					':author_id' => $author_id,
					':edition_id' => $edition_id,
					':category_id' => $category_id,
					':language' => $language,
					':length' => $length,
					':year' => $year,
					':disponibility' => $disponibility,
					':bookOfWeek' => $bookOfWeek,
					':img_file' => $img_file,
					':description' => $description
				]);
		}
		public function change( $id_book, $title, $author_id, $edition_id, $category_id, $language, $length, $year, $disponibility, $bookOfWeek, $description ) {
			$sql = 'UPDATE books SET title = :title, author_id = :author_id, edition_id = :edition_id, category_id = :category_id, langage = :language, length = :length, year = :year, disponibility = :disponibility, selection = :bookOfWeek, description = :description WHERE id = :id_book';
			
			$requete = $this->connexion->prepare($sql);
			$requete -> execute([
					':id_book' => $id_book,
					':title' => $title,
					':author_id' => $author_id,
					':edition_id' => $edition_id,
					':category_id' => $category_id,
					':language' => $language,
					':length' => $length,
					':year' => $year,
					':disponibility' => $disponibility,
					':bookOfWeek' => $bookOfWeek,
					':description' => $description
				]);
		}
		public function deleteBook( $book_id ) {
			$sql = 'DELETE FROM books WHERE id = :book_id';
			$sql2 = 'DELETE FROM favourites WHERE book_id = :book_id';
			$sql3 = 'DELETE FROM books_libraries WHERE book_id = :book_id;';
			$pdost = $this -> connexion -> prepare( $sql );
			$pdost2 = $this -> connexion -> prepare( $sql2 );
			$pdost3 = $this -> connexion -> prepare( $sql3 );
			$pdost -> execute( [ ':book_id' => $book_id ] );
			$pdost2 -> execute( [ ':book_id' => $book_id ] );
			$pdost3 -> execute( [ ':book_id' => $book_id ] );        
		}

		public function editBook( $book_id ) {
			$sql = 'SELECT books.id as book_id, books.title as title, authors.name as authors_name, authors.id as author_id, categories.name as categories_name, categories.id as category_id, books.description, editions.name as editions_name, editions.id as edition_id, books.langage, books.length, books.year, books.disponibility, books.selection as selection, books.img_file as img_file FROM books 
				JOIN authors on books.author_id = authors.id 
				JOIN editions on books.edition_id = editions.id 
				JOIN categories on books.category_id = categories.id 
				WHERE books.id = :book_id';
			$pdost = $this -> connexion -> prepare( $sql );
			$pdost -> execute( [ ':book_id' => $book_id ] );
			return $pdost -> fetch();
		}
		public function replaceImgBook( $book_id, $img_file ) {
			$sql = "UPDATE books SET img_file = :img_file WHERE id = :book_id";
			$pdost = $this -> connexion -> prepare( $sql );
				$pdost -> execute( [
					':book_id' => $book_id,
					':img_file' => $img_file
				] );
		}

		public function count() { // Compter et retourner le nombre total de livre.
			$sql = 'SELECT COUNT(*) AS total FROM books';
			$req = $this->connexion->query($sql);
			$data = $req->fetch();
			return $data->total;
		}
		
		public function getFavourites( $id ){
			$sql = 'SELECT title, books.img_file as img_file, books.id as book_id FROM favourites 
					JOIN books on book_id = books.id
					JOIN users ON user_id = users.id
					WHERE user_id = :id
					ORDER BY books.id DESC';
			$pdost = $this->connexion->prepare( $sql );
			$pdost->execute( [
				':id' => $id
			] );
			return $pdost->fetchAll();
		}
	}