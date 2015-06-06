<?php 
	class Paginate{

		public static function getStart( $perPage, $totalBooks ){
			$totalPages = self::getTotal( $totalBooks, $perPage ); // self:: car c'est une fonction static => pas une instance => pas de this et pas de new ...
			$page = self::getPage( $totalPages );
			$start = ( $page > 1 ) ? ( $page * $perPage ) - $perPage : 0;	// formule pour calculer le numéro du livre de la page.
			return $start;
		}

		public static function getPage( $totalPages ){
			if( isset( $_GET['page'] ) ){
				$page = intval( $_GET['page'] );
				if( $page > $totalPages ){
					$page = $totalPages;
				}
			} else {
				$page = 1;
			}
			return $page;
		}

		public static function getTotal( $totalBooks, $perPage ){
			return ceil( $totalBooks / $perPage );
		}
	}