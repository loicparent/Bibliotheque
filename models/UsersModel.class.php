<?php 

	class UsersModel extends Model{

		public function get( $username, $password )
			{
				$sql = 'SELECT * FROM users WHERE username=:username AND password=:password';
				$pdost = $this->connexion->prepare($sql);
				$pdost->execute( [
					':username' => $username,
					':password' => $password
				] );
				return $pdost->fetch();
			}
		public function getAll()
			{
				$sql = 'SELECT users.id as id, users.username as username, users.is_admin as isAdmin FROM users';
				$pdost = $this -> connexion -> prepare($sql);
				$pdost -> execute();
				return $pdost->fetchAll();
			}

		public function create( $username, $password )
			{
				$sql = 'INSERT INTO users( username, password) VALUES( :username, :password )';
				$pdost = $this -> connexion -> prepare( $sql );
				$pdost -> execute( [
					':username' => $username,
					':password' => $password
				] );
			}

		public function addToFaves( $userId, $bookId ){
			$sql = 'INSERT INTO favourites(user_id, book_id) VALUES( :user_id, :book_id )';
			$pdost = $this -> connexion -> prepare( $sql );
				$pdost -> execute( [
					':user_id' => $userId,
					':book_id' => $bookId
				] );
			}
		public function removeFromFaves( $userId, $bookId ){
			$sql = 'DELETE FROM favourites WHERE user_id = :user_id AND book_id = :book_id';
			$pdost = $this -> connexion -> prepare( $sql );
				$pdost -> execute( [
					':user_id' => $userId,
					':book_id' => $bookId
				] );
			}
		public function deleteUser( $userId ){
			$sql = 'DELETE FROM users WHERE id = :user_id';
			$sql2 = 'DELETE FROM favourites WHERE user_id = :user_id';
			$pdost = $this -> connexion -> prepare( $sql );
			$pdost2 = $this -> connexion -> prepare( $sql2 );
				$pdost -> execute( [
					':user_id' => $userId
				] );
				$pdost2 -> execute( [
					':user_id' => $userId
				] );
		}
		public function setAdmin( $userId ){
			$sql = "UPDATE users SET is_admin = '1' WHERE id = :user_id";
			$pdost = $this -> connexion -> prepare( $sql );
				$pdost -> execute( [
					':user_id' => $userId
				] );
		}
		public function setUser( $userId ){
			$sql = "UPDATE users SET is_admin = '0' WHERE id = :user_id";

			$pdost = $this -> connexion -> prepare( $sql );
				$pdost -> execute( [
					':user_id' => $userId
				] );
		}
	}