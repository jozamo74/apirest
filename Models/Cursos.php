<?php namespace Models;

class Cursos {

	private $connection;

	public function __construct() {
		$this->connection = new ConnectionMySQL();
	}

	public function listCursos($since = '', $amount = ''){

		if (empty($amount)) {
			$sql = "SELECT * FROM cursos";
		} else {
			$sql = "SELECT * FROM cursos LIMIT $since, $amount";
		}

		return  $this->connection->getConnection()->query($sql)->fetchAll(\PDO::FETCH_OBJ);

	}
}