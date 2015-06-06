<?php 

    class DisponibilitiesModel extends Model{ // extends = hérite de Model
        public function getAll() {
            $sql = 'SELECT id, title FROM books WHERE disponibility = 1';
            $requete = $this->connexion->query($sql);
            return $requete->fetchAll();
            // fetchAll() -> retourne un affichage de toute les valeurs => toute les colonnes
        }
    }