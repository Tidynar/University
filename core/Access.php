<?php
require_once(ABSPATH . '/common/access_config.php');
class Access extends Component {
	private $rules;

	function __construct() {
		$rules_obj = new AccessRules();
		$this->rules = $rules_obj->getRules();
	}

	/**
	 * check is access allowed for current user access level
	 *
	 * @param $route string example: "site/index"
	 */
	public function checkAccess($route) {
		if(isset($_SESION['user_access_level'])) {
			$user_access_level = $_SESSION['user_access_level'];
		} else {
			$user_access_level = 'guest';
		}

		if(!empty($this->rules[$user_access_level])) {
			foreach($this->rules[$user_access_level] as $key=>$access_route) {
				if($route == $access_route) {
					return true; //access allowed
				}
			}
			return false; //access disallowed
		} else {
			return App::error404();
		}

	}

}