<?php

class Auth extends Component {

	function __construct() {

	}

	public function checkLogged() {
		if(isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
			if($this->checkPassword($_SESSION['login'], $_SESSION['password'])) {
				return true;
			} else {
				return false;
			}
		}
	}

	public function login($login, $password) {
		$user_id = $this->checkPassword($login, $password);
		if($user_id) {
			$_SESSION['logged'] = true;
			$_SESSION['login'] = $login;
			$_SESSION['password'] = MD5($password);
			$_SESSION['user_access_level'] = $this->getUserAccessLevel($this->checkPassword($login, $password));
		} else {
			$_SESSION['user_access_level'] = self::GUEST_ACCESS_LEVEL;
		}
	}

	public function logout() {
		$_SESSION['logged'] = false;
		unset($_SESSION['login']);
		unset($_SESSION['password']);
		unset($_SESSION['user_access_level']);

		return true;
	}

	private function checkPassword($login, $password) {
		$query = App::$db->prepare('SELECT id FROM users WHERE login = ? AND password = ?');
		$query->execute([$login, MD5($password)]);
		$user_id = $query->fetchColumn();

		if($user_id) {
			return $user_id;
		} else {
			return false;
		}
	}

	private function getUserAccessLevel($user_id){
		$query = App::$db->prepare('SELECT user_access_level FROM users WHERE id = ?');
		$query->execute([$user_id]);
		$user_access_level = $query->fetchColumn();
		return $user_access_level;
	}
}