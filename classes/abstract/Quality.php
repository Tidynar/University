<?php

class Quality {

	private $max_problems  = 4; //maximum of problems can be
	private $problem_value = 20; //how much of quality decreased for 1 problem
	private $problems      = []; //array of problems
	private $quality_value = 100;

	/**
	 * Calculates quality depends on number of problems
	 */
	public function calculateQuality() {
		$problems_count = $this->problemsCount();

		if($problems_count == 0) {
			$this->quality_value = 0;
		} elseif($problems_count <= $this->max_problems) {
			$this->quality_value = $this->quality_value - ($this->problem_value * $problems_count);
		} else {
			$this->quality_value = 0;
		}

		return $this->quality_value;
	}

	/**
	 * Add problem.
	 *
	 * @param $problem_description
	 * @return boolean
	 */
	public function addProblem($problem_description) {
		if(array_push($this->problems, $problem_description) > 0) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Calculates the amount of problems
	 *
	 * @return int
	 */
	private function problemsCount() {
		return count($this->problems);
	}

	/**
	 * Function prints all problems
	 */
	public function printProblems() {
		if(!empty($this->problems)) {
			foreach ( $this->problems as $key =>$problem ) {
				echo "Problem " . $key . ": " . $problem . "<br>";
			}
		}
	}

}