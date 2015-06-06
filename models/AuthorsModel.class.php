<?php 

	class AuthorsModel extends Model{ // extends = hérite de Model
		public function getAll() {
			$sql = 'SELECT id, name FROM authors';
			$requete = $this->connexion->query($sql);
			return $requete->fetchAll();
			// fetchAll() -> retourne un affichage de toute les valeurs => toute les colonnes
		}

		public function getBooksAuthor($id) {
            $sql = 'SELECT books.id, books.title, books.img_file FROM books WHERE books.author_id ='.$id;
            $requete = $this->connexion->query($sql);
            $requete -> execute([':id' => $id]);
            return $requete->fetchAll();
            // fetchAll() -> retourne un affichage de toute les valeurs => toute les colonnes
        }

		public function getById($id) {
			$sql = 'SELECT authors.id as authors_id, authors.name as authors_name, authors.biography as authors_biography, authors.img_file as img_file FROM authors
				WHERE authors.id = :id';
			$requete = $this->connexion->prepare($sql);
			$requete -> execute([':id' => $id]);
			return $requete -> fetch();
		}
        public function create( $name, $img_file, $description ) {
            $sql = 'INSERT INTO authors( name, img_file, biography ) VALUES( :name, :img_file, :description );';
            $requete = $this->connexion->prepare($sql);
            $requete -> execute([
                    ':name' => $name,
                    ':img_file' => $img_file,
                    ':description' => $description
                ]);
        }
	}