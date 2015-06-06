<?php 

	class EditionsModel extends Model{ // extends = hérite de Model
		public function getAll() {
			$sql = 'SELECT id, name FROM editions';
			$requete = $this->connexion->query($sql);
			return $requete->fetchAll();
			// fetchAll() -> retourne un affichage de toute les valeurs => toute les colonnes
		}

        public function getBooksEdition($id) {
            $sql = 'SELECT books.id, books.title, books.img_file FROM books WHERE books.edition_id ='.$id;
            $requete = $this->connexion->query($sql);
            $requete -> execute([':id' => $id]);
            return $requete->fetchAll();
            // fetchAll() -> retourne un affichage de toute les valeurs => toute les colonnes
        }

        public function getById($id) {
            $sql = 'SELECT editions.id as editions_id, editions.name as editions_name, editions.description as editions_description, editions.img_file as img_file FROM editions 
                WHERE editions.id = :id';
            $requete = $this->connexion->prepare($sql);
            $requete -> execute([':id' => $id]);
            return $requete -> fetch();
        }
        public function create( $name, $img_file, $description ) {
            $sql = 'INSERT INTO editions( name, img_file, description ) VALUES( :name, :img_file, :description );';
            $requete = $this->connexion->prepare($sql);
            $requete -> execute([
                    ':name' => $name,
                    ':img_file' => $img_file,
                    ':description' => $description
                ]);
        }
	}