<?php 
    class DisponibilitiesController {
        private $disponibilitiesModel = null;
        public function __construct() 
            {
                $this->disponibilitiesModel = new DisponibilitiesModel();
            }
        public function index(){
            $data['dispo'] = $this -> disponibilitiesModel -> getAll();
            $data['styleName'] = "indexations";
            $data['page_title'] = "Bibliothèque en ligne — Tous les livres disponibles";
            $data['view'] = 'index_disponibilities.php';
            return $data;
        }
    }