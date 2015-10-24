<?php
class View {
	public $layout = 'main';

	public function load($template, $data = null, $layout = '') {

		if ( ! empty( $layout ) ) {
			$this->layout = $layout;
		}

		$template = ABSPATH . '/views/' . $template . '.php';


		if(file_exists($template)) {
			$out = '';
			ob_start();

			$title   = $data['title'];
			if(isset($data['title']))
			$body_id = $data['body_id'];

			include_once(ABSPATH . '/views/layouts/' . $this->layout . '.php');

			$out = ob_get_clean();

			echo $out;
		} else {
			throw new Exception('No View at: ' . $template);
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
