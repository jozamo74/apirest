<?php namespace Config;

class Request{

	private $controller;
	private $method;
	private $argument;

	public function __construct() {

		if (isset($_GET['url'])) {
			$ruta = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
			
			$ruta = explode('/', $ruta);
			$ruta = array_filter($ruta);

			$this->controller = strtolower(array_shift($ruta));
			$this->method = (count($ruta)> 0) ? strtolower(array_shift($ruta)) : 'index' ;

			if (count($ruta) > 0) {
				$this->argument = $ruta;
			}
		}

	}

	public function getController() {
		return $this->controller;
	}

	public function getMethod(){
		return $this->method;
	}

	public function getArgument(){
		return $this->argument;
	}
}