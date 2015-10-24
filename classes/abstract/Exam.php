<?php

/**
 * This is basic class for exam. Every exam have unic indetifier called "eid"
 *
 * Class Exam
 */
class Exam {
	public $eid = 0;

	function __construct($exam_id) {
		$this->eid = $exam_id;
	}
}