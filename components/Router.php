<?php

class Router extends Component {

	private static $routes = '';
	private static $defaultController = 'site';
	private static $defaultAction = 'index';

	public static function init() {

		self::setRoutes();
		self::setGetParams();

		$controller = self::$routes[1];
		$action     = self::$routes[2];

		if(empty($controller)) {
			$controller = self::$defaultController;
		}
		if(empty($action)) {
			$action = self::$defaultAction;
		}

		$route = trim(strtolower(($controller)) . '/' . trim(strtolower($action)));

		$controller_name = ucfirst(trim(strtolower(($controller)))) . "Controller";
		$method_name     = trim(strtolower($action));
		$controller = new $controller_name;

		if(method_exists($controller, $method_name) && App::$access->checkAccess($route)) {
			$controller->$method_name();
		} else {
			$controller = new SiteController;
			$controller->error404();
		}
	}

	public static function setRoutes() {
		self::$routes = explode('/', $_SERVER['REQUEST_URI']);
	}

	/*
	 * parse url for get parameters
	*/
	public static function setGetParams() {

		$routes = self::$routes;

		if ( !empty($routes[3]) ) {
			$preGet = explode('&', $routes[3]);
			$get = array();
			foreach($preGet as $key=>$value) {
				$string = explode('=', $value);
				$get[$string[0]] = $string[1];
			}
			$_GET = $get;
		}
	}

}