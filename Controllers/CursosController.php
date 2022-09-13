<?php namespace Controllers;

use Models\Cursos as Cursos;

class CursosController {

	private $cursos;

	public function __construct() {
		$this->cursos = new Cursos();
	}

	public function index(){

		if ($_SERVER['REQUEST_METHOD'] == 'GET') {

			//$headers = apache_request_headers();
			//$token = $headers['token'];
			//echo "TOKEN: $token";

			$amount = '';
			$since = '';

			if (isset($_GET['page'])) {
				$page = $_GET['page'];
				$amount = 10;
				$since = ($page -1) * $amount;

			} 

			
			$data = array('status' => 200, 'message' => $this->cursos->listCursos($since, $amount));
			
		} else {

			$data = array('status' => 405, 'message' => 'Method not allowed');
		}
		return $data;
	}
}

