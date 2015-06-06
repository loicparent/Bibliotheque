<?php 
    class ErrorsController {

        public function view () {
            $data['styleName'] = "livre";
            $data['page_title'] = "Bibliothèque en ligne — Page d’erreur";
            $data['view'] = 'view_error.php';
            return $data;
        }
    }