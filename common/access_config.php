<?php

class AccessRules {
	//config show what user what controllers can use
	function __construct() {
	}

	public function getRules() {
		return [
			'guest' => [
				'site/index',
				'login/index'
			],
			'user' => [
				'site/index',
				'login/index'
			],
			'administrator' => ['*'] // can use any controller
		];
	}
}

