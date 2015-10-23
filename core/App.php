<?php

class App extends StdClass {
	public static $config = [];
	public static $router;
	public static $db;
	public static $auth;
	public static $access;

	protected static $_instance;

	public static function getIstance() {
		if (self::$_instance === null) {
			self::$_instance = new self;
		}
		return self::$_instance;
	}

	public static function start(){
		$router = new Router();
		self::$db = self::loadDb();
		self::$auth = self::loadAuth();
		self::$access = self::loadAccess();
		self::$router = $router::init();
	}

	private static function loadConfig() {
		self::$config = [];
	}

	private static function loadDb() {
		return new Db();
	}

	private static function loadAuth() {
		return new Auth();
	}

	private static function loadAccess() {
		return new Access();
	}


	public static function error404() {
		Header('Location' . '/site/error404');
	}
}