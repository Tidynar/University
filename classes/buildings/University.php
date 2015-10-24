<?php
class University extends Building {

	private $exams_to_approve = ['Math', 'Physic'];
	private $students = [];

	/**
	 * Adds student to university if he meets the requirements
	 *
	 * @param Student $student
	 */
	public function addStudent(Student $student) {
		if($this->checkRequirements($student)) {
			array_push($this->students, $student->sid);
			$student->enroll();
		}
	}

	public function checkRequirements(Student $student) {
		/**
		 * Does student age >=18
		 */
		if($student->getAge() < 18) {
			return false;
		}
		/**
		 * Does student passed all exams
		 */
		if((string)sort($student->passed_exams) != (string)sort($this->exams_to_approve)) {
			return false;
		}

		return true;
	}
}