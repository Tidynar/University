<?php
class View {
	public $layout = 'main';

	public function load($template, $data = null, $layout = null) {

		if(!is_null($layout)) {
			$this->layout = $layout;
		}

		$templatefile = ABSPATH . '/views/' . $template . '.php';

		if($this->layout == 'login') {
			include($templatefile);
		} else {
			include_once(ABSPATH . '/views/layouts/' . $this->layout . '.php');
		}
		return true;
	}

	public function load_partial($template, $data = null, $buffer_output = false) {
		$out = '';
		$templatefile = ABSPATH . '/views/' . $template . '.php';
		if(file_exists($templatefile)){
			ob_start();

			include($templatefile);

			$out = ob_get_clean();
			if($buffer_output == true) {
				return $out;
			} else {
				echo $out;
			}

		} else {
			die('oops, no View :( <br> ' . $templatefile);
		}

		return true;
	}
}
?>
