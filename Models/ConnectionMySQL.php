<?php namespace Models;
class ConnectionMySQL {

	private $dbh;

	public function __construct(){
		try{
			$this->dbh = new \PDO(DATABASE['DSN'], DATABASE['USER'], DATABASE['PASS'],
			array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
		} catch(\PDOException $e) {
			echo 'Error connection MySQL: ' . $e->getMessage();
		}
	}

	public function getConnection() {
		return $this->dbh;
	}
}