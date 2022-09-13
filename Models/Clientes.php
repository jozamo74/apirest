<?php namespace Models;

class Clientes {

	private $connection;

	private $name;
	private $subname;
	private $email;
	private $key;
	private $id_client;
	private $id;

	public function __construct() {
		$this->connection = new ConnectionMySQL();
	}

	public function add(){
		
	}
	
}