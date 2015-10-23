<?php
class Db extends Component {

	function __construct() {
		if(!defined('DB_HOST')
			|| !defined('DB_NAME')
			|| !defined('DB_LOGIN')
			|| !defined('DB_PASSWORD')) {
			throw new Exception('Please, define DB_HOST, DB_NAME, DB_LOGIN and DB_PASSWORD at common/config.php file');
		} else {
			return $this->init();
		}
	}

	private function init() {
		$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";";
		$opt = array(
			PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		);
		$pdo = new PDO($dsn, DB_LOGIN, DB_PASSWORD, $opt);

		return $pdo;
	}

}
