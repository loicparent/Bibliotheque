<?php 

    class SearchModel extends Model{ // extends = hérite de Model

        public function searchBooks( $search ) {
            $where = "";
            $search = preg_split('/[\s\-\+]/', $search);
            $count_keyWords = count($search);

            foreach ($search as $key => $searches) {
                $where .= " title LIKE '%$searches%'";
                if ( $key != ( $count_keyWords-1 )){
                    $where .=" AND ";
                }
            }
            $sql = 'SELECT books.title as title, books.id as id, authors.name as author_name, authors.id as author_id, books.img_file as img_file FROM books JOIN authors on books.author_id = authors.id  WHERE'.$where;
            
            $requete = $this->connexion->query($sql);
            return $requete->fetchAll();
        }

        public function searchAuthors( $search ) {
            $where = "";
            $search = preg_split('/[\s\-\+]/', $search);
            $count_keyWords = count($search);

            foreach ($search as $key => $searches) {
                $where .= " name LIKE '%$searches%'";
                if ( $key != ( $count_keyWords-1 )){
                    $where .=" AND ";
                }
            }
            $sql = 'SELECT * FROM authors WHERE'.$where;
            
            $requete = $this->connexion->query($sql);
            return $requete->fetchAll();
        }

        public function searchEditions( $search ) {
            $where = "";
            $search = preg_split('/[\s\-\+]/', $search);
            $count_keyWords = count($search);

            foreach ($search as $key => $searches) {
                $where .= " name LIKE '%$searches%'";
                if ( $key != ( $count_keyWords-1 )){
                    $where .=" AND ";
                }
            }
            $sql = 'SELECT * FROM editions WHERE'.$where;
            
            $requete = $this->connexion->query($sql);
            return $requete->fetchAll();
        }

        public function searchCategories( $search ) {
            $where = "";
            $search = preg_split('/[\s\-\+]/', $search);
            $count_keyWords = count($search);

            foreach ($search as $key => $searches) {
                $where .= " name LIKE '%$searches%'";
                if ( $key != ( $count_keyWords-1 )){
                    $where .=" AND ";
                }
            }
            $sql = 'SELECT * FROM categories WHERE'.$where;
            
            $requete = $this->connexion->query($sql);
            return $requete->fetchAll();
        }

        public function searchLibraries( $search ) {
            $where = "";
            $search = preg_split('/[\s\-\+]/', $search);
            $count_keyWords = count($search);

            foreach ($search as $key => $searches) {
                $where .= " name LIKE '%$searches%'";
                if ( $key != ( $count_keyWords-1 )){
                    $where .=" AND ";
                }
            }
            $sql = 'SELECT * FROM libraries WHERE'.$where;
            
            $requete = $this->connexion->query($sql);
            return $requete->fetchAll();
        }


    }