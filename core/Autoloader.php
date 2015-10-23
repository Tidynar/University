<?php
class Autoloader {
	private $class_name;
	private $controllers_path = '';
	private $models_path = '';
	private $components_path = '';
	private $core_path = '';
	private $include_path;

	function __construct($class_name) {
		$this->class_name        = $class_name;
		$this->controllers_path  = ABSPATH . '/controllers/';
		$this->models_path       = ABSPATH . '/models/';
		$this->components_path   = ABSPATH . '/components/';
		$this->core_path         = ABSPATH . '/core/';
		$this->classes_path      = ABSPATH . '/classes/';
	}

	public function run() {
		$check_model      = $this->checkElement($this->models_path);
		$check_controller = $this->checkElement($this->controllers_path);
		$check_component  = $this->checkElement($this->components_path);
		$check_classes    = $this->checkElement($this->classes_path);
		$check_core       = $this->checkElement($this->core_path);

		if($check_model || $check_component || $check_controller || $check_core || $check_classes) {
			$this->includeClass();
		} else {
			throw new Exception('Class with name ' . $this->class_name . ' not found.');
		}
	}

	private function checkElement($path) {
		$element_path = $path . $this->class_name . '.php';

		if(AUTOLOADER_DEBUG == true)
			echo 'Checking ' . $element_path . '...<br />';

		if(is_file($element_path)) {
			$this->include_path = $element_path;
			return true;
		} else {
			return false;
		}
	}

	private function includeClass() {
		require_once($this->include_path);
		if(AUTOLOADER_DEBUG == true)
			echo 'Included class <strong>' . $this->class_name . '</strong><br />';
		return false;
	}
}
?>