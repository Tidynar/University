<?php
class Book extends Item {

	private $id;
	private $status = 1;
	private $state_array = [];

	function __construct($id) {
		$this->id = $id;
		$this->$state_array = [
			"front_cover" => 0,
			"back_cover"  => 0,
			"hinge"       => 0
		];
	}

	public function getId() {
		return $this->id;
	}

	/**
	 * Gets state of book elements, if element not exists - returns -1
	 *
	 * @param $key
	 *
	 * @return int
	 */
	public function getState($key) {
		if(isset($this->state_array[$key])) {
			return $this->state_array[$key];
		} else {
			return -1;
		}
	}

	/**
	 * Set state of book element
	 *
	 * @param $key
	 * @param $value
	 *
	 * @return bool|int
	 */
	public function setState($key, $value) {
		if(isset($this->state_array[$key])) {
			$this->state_array[$key] = $value;
			return true;
		} else {
			return -1;
		}
	}

	/**
	 * Set status of book. 0 - missed, 1 - in library, 2 - on hands
	 *
	 * @param $status
	 */
	public function setStatus($status) {
		$this->status = $status;
	}

	/**
	 * Set status of book. 0 - missed, 1 - in library, 2 - on hands
	 *
	 * @return integer $status;
	 */
	public function getStatus() {
		return $this->status;
	}

}