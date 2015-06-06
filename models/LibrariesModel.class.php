<?php 

	class LibrariesModel extends Model{ // extends = hérite de Model
		public function getAll() {
			$sql = 'SELECT id, name FROM libraries';
			$requete = $this->connexion->query($sql);
			return $requete->fetchAll();
			// fetchAll() -> retourne un affichage de toute les valeurs => toute les colonnes
		}
        public function getAllFromBook( $book_id ) {
            $sql = 'SELECT libraries.id as library_id, libraries.name as library_name FROM books_libraries 
                    JOIN libraries ON library_id = libraries.id
                    WHERE book_id =:book_id';
            $requete = $this->connexion->prepare($sql);
            $requete -> execute([
                ':book_id' => $book_id
            ]);
            return $requete->fetchAll();
            // fetchAll() -> retourne un affichage de toute les valeurs => toute les colonnes
        }

        public function getBooksLibrary($id) {
            $sql = 'SELECT books.id, books.title, books.img_file FROM books
                    JOIN books_libraries ON book_id = books.id WHERE books_libraries.library_id ='.$id;
            $requete = $this->connexion->query($sql);
            return $requete->fetchAll();
            // fetchAll() -> retourne un affichage de toute les valeurs => toute les colonnes
        }
        public function addBooksLibrary($librariesItem, $img_file) {
            // récupérer l'id correspondant au livre qu'on vient d'ajouter grâce au nom de l'image qui est unique.
            $sql = 'SELECT books.id as book_id FROM books 
                WHERE books.img_file = :img_file;';
                $requete = $this->connexion->prepare($sql);
                $requete -> execute([ ':img_file' => $img_file ]);
                $result = $requete -> fetch();
                $book_id = $result -> book_id;
            // compter le nombre de bibliothèque ajouter.
            $counter = count( $librariesItem );

            // Pour chaque bibliothèque sélectionnée, ajouter la bibliothèque au livre.
            for ($i=0; $i < $counter ; $i++) { 

                $sql1 = 'INSERT INTO books_libraries( book_id, library_id  ) VALUES( :book_id, :librariesItem );';
                $requete1 = $this->connexion->prepare($sql1);
                $requete1 -> execute([
                        ':librariesItem' => $librariesItem[$i],
                        ':book_id' => $book_id
                    ]);
            }
        }

        public function changeBooksLibrary($librariesItem, $id_book) {
            // Supprimer le lien existant entre le livre et la bibliothèque
            $sql = 'DELETE FROM books_libraries WHERE book_id = :book_id;';
            $pdost = $this -> connexion -> prepare( $sql );
            $pdost -> execute( [ ':book_id' => $id_book ] );

            // compter le nombre de bibliothèque ajouter.
            $counter = count( $librariesItem );
            // Pour chaque bibliothèque sélectionnée, ajouter la bibliothèque au livre.
            for ($i=0; $i < $counter ; $i++) { 
                $sql2 = 'INSERT INTO books_libraries( book_id, library_id  ) VALUES( :id_book, :librariesItem );';
                $requete2 = $this->connexion->prepare($sql2);
                $requete2 -> execute([
                        ':librariesItem' => $librariesItem[$i],
                        ':id_book' => $id_book
                    ]);
            }
        }

        public function getById($id) {
            $sql = 'SELECT libraries.id as libraries_id, libraries.name as libraries_name, libraries.address as libraries_address, libraries.phone as libraries_phone, libraries.img_file as img_file FROM libraries 
                WHERE libraries.id = :id';
            $requete = $this->connexion->prepare($sql);
            $requete -> execute([':id' => $id]);
            return $requete -> fetch();
        }
        public function create( $name, $address, $phone, $img_file ) {
            $sql = 'INSERT INTO libraries( name, address, phone, img_file  ) VALUES( :name, :address, :phone, :img_file );';
            $requete = $this->connexion->prepare($sql);
            $requete -> execute([
                    ':name' => $name,
                    ':address' => $address,
                    ':phone' => $phone,
                    ':img_file' => $img_file
                ]);
        }
	}