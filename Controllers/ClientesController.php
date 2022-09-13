<?php namespace Controllers;

use Models\Clientes as Clientes;

class ClientesController{

	private $clientes;

	public function __construct() {
		$this->clientes = new Clientes();
	}

	public function AddClient(){
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			
			$data = json_decode(file_get_contents('php://input'));

			echo "nombre: $data->name";
			if (isset($data->name) && !preg_match(ONLY_CHARATER, $data->name)) {
				$data = array('status' => 404 , 'message' => 'name is error');
			}else if (isset($data->surname) && !preg_match(ONLY_CHARATER, $data->surname)){
				$data = array('status' => 404 , 'message' => 'surname is error');
			} else if (isset($data->email) && !filter_var($data->email, FILTER_VALIDATE_EMAIL)){
				$data = array('status' => 404, 'message' => 'email is error');
			}
			
			$data = array('status' => 200 , 'message' => $data);

		} else {
			$data = array('status' => 400 , 'message' => 'Bad Request');
		}

		return $data;
	}

}