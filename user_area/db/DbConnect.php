<?php 
	class DbConnect {
		private $host = 'localhost';
		private $dbName = 'chatapp';
		private $user = 'root';
		private $pass = '';
		private $port = '3307';
	

		public function connect() {
			try {
				$conn = new PDO('mysql:host=' . $this->host . ';port='.$this->port.'; dbname=' . $this->dbName, $this->user, $this->pass);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				return $conn;
			} catch( PDOException $e) {
				echo 'Database Error: ' . $e->getMessage();
			}
		}
	}
 ?>