<?php

class Controller {
	public $view;

	function __construct() {
		if(App::$auth->checkLogged()) {

		}
		$this->view = new View();
	}
}