<?php 

class Dbh{
	private $host;
	private $username;
	private $pwd;
	private $dbname;

	protected function connect(){
		$this->host = "localhost";
		$this->username= "root";
		$this->pwd = "";
		$this->dbname = "employeeDB";

		$conn = new mysqli($this->host, $this->username, $this->pwd, $this->dbname);
		return $conn;
	
	}
}
