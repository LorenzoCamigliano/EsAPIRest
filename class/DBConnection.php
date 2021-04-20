<?php

class DBConnection {
    private $_dbHostname = "zmysql:3306";
    private $_dbName = "FI_ITIS_MEUCCI";
    private $_dbUsername = "root";
    private $_dbPassword = "password";
    private $_con;

    public function getConnection() {
			$this->conn = null;

			try{
				$this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
				$this->conn->exec("set names utf8");
			}catch(PDOException $exception){
				echo "Connection error: " . $exception->getMessage();
			}

			return $this->conn;
		}
}
?>
