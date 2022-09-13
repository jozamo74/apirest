<?php namespace Config;

class Enrutador {
	public static function run(Request $request) {
		
		$controller = $request->getController() != null ? ucfirst($request->getController()) . 'Controller' : '';
		$method = $request->getMethod();
		$argument = $request->getArgument();

		$route = ROOT . 'Controllers' . DS . $controller . '.php';
		
		//echo "ROUTE: $route" . PHP_EOL;
		//echo "METHOD: $method" . PHP_EOL;

		if (is_readable($route)) {
			require_once $route;
			
			$openController = 'Controllers\\' . $controller;
			
			$controller = new  $openController();

			if (method_exists($controller, $method)) {
			
				if (!isset($argument)) {
					$data = call_user_func(array($controller, $method));
				} else {
					$data = call_user_func_array(array($controller, $method), $argument);
				}
				
			} else {
				$error = array('state' => 404, 'message' => 'Method not found');
				header('Content-Type: application/json; charset=utf8');
				http_response_code(404);
				echo json_encode($error, JSON_UNESCAPED_UNICODE);
			}
		} else {
			$error = array('state' => 404, 'message' => 'Page not found');
			header('Content-Type: application/json; charset=utf8');
			http_response_code(404);
			echo json_encode($error, JSON_UNESCAPED_UNICODE);
		}

		$controller = $request->getController() != null ? ucfirst($request->getController()) : '';
		$route = ROOT . 'Views' . DS . $controller . DS . $method . '.php';

		if (is_readable($route)) {
			require_once $route;
		} else {
			$error = array('state' => 404, 'message' => 'View not found');
			header('Content-Type: application/json; charset=utf8');
			http_response_code(404);
			echo json_encode($error, JSON_UNESCAPED_UNICODE);
		}

	}
}