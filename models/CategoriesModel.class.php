<?php 

	class CategoriesModel extends Model{ // extends = hérite de Model
		public function getAll() {
			$sql = 'SELECT id, name FROM categories';
			$requete = $this->connexion->query($sql);
			return $requete->fetchAll();
			// fetchAll() -> retourne un affichage de toute les valeurs => toute les colonnes
		}

        public function getBooksCategory($id) {
            $sql = 'SELECT books.id, books.title, books.img_file FROM books WHERE books.category_id ='.$id;
            $requete = $this->connexion->query($sql);
            $requete -> execute([':id' => $id]);
            return $requete->fetchAll();
            // fetchAll() -> retourne un affichage de toute les valeurs => toute les colonnes
        }

        public function getById($id) {
            $sql = 'SELECT categories.id as categories_id, categories.name as categories_name, categories.description as categories_description FROM categories 
                WHERE categories.id = :id';
            $requete = $this->connexion->prepare($sql);
            $requete -> execute([':id' => $id]);
            return $requete -> fetch();
        }
        public function create( $name, $description ) {
            $sql = 'INSERT INTO categories( name, description ) VALUES( :name, :description );';
            $requete = $this->connexion->prepare($sql);
            $requete -> execute([
                    ':name' => $name,
                    ':description' => $description
                ]);
        }
	}