<?php

/**
 * This building used to get books
 *
 * Class Library
 */
class Library extends Building {

	private $avaible_books = [];

	public function getBook() {

	}

	/**
	 * Function returns book to library and removes it from man
	 *
	 * @param Man $man
	 * @param Book $book
	 */
	public function returnBook(Man $man, Book $book) {
		$book_quality = $this->examinBook($book);

		if($book_quality > 80) {
			$book->setStatus(1);
			$man->removeBook($book);
			$this->addBookToAvaible($book);

			return true;
		} else {
			return false;
		}
	}

	/**
	 * This function checks is all ok with book - no cuts, broken pages
	 *
	 * @param Book $book
	 * @return Quality $quality
	 */
	public function examinBook(Book $book) {
		$quality = new Quality;

		if($book->getState("back_cover") != 100) {
			$problem_description = "Bad state of back cover";
			$quality->addProblem($problem_description);
		}

		if($book->getState("front_cover") != 100) {
			$problem_description = "Bad state of front cover";
			$quality->addProblem($problem_description);
		}

		if($book->getState("hinge") != 100) {
			$problem_description = "Bad state of hinge";
			$quality->addProblem($problem_description);
		}

		return $quality->calculateQuality();
	}

	/**
	 * This function adds book to number of avaible books
	 *
	 * @param Book $book
	 */
	public function addBookToAvaible(Book $book) {
		array_push($avaible_books, $book->getId());
	}

}