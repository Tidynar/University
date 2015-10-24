<?php

/**
 * This is basic class for exam. Every exam have unic indetifier called "eid"
 *
 * Class Exam
 */
class Exam {
	private $exam_name = 'Default';
	public $eid = 0;

	function __construct($exam_id) {
		$this->eid = $exam_id;
	}

	/**
	 * Exam object must return name of exam
	 *
	 * @return string
	 */
	function __toString() {
		return $this->exam_name;
	}
}