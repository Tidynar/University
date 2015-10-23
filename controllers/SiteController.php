<?php

class SiteController extends Controller {

	public function index() {
		$this->view->load("site/index");
	}

	public function error404() {
		die('<h1>404 Sorry, there are no page you searched</h1>');
	}

}