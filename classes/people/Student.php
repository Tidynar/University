<?php

/**
 * This is class to work with student
 *
 * Class Student
 */
class Student extends Man {

	private $enrolled = false;
	public $passed_exams = [];
	public $sid = 0;

	public function __construct($student_id) {
		$this->sid = $student_id;
	}
	public function passExam(Exam $exam) {
		array_push($this->passed_exams, $exam->eid);
	}

	/**
	 * Student is approved to university
	 */
	public function enroll() {
		$this->enroll = true;
	}
}
