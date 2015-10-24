<?php
class Man {

	private $age;
	private $gender;
	private $telephone;
	private $email;

	private $books = [];

	public function getAge() {
		return $this->age;
	}
	public function getGender() {
		return $this->gender;
	}
	public function getTelephone() {
		return $this->telephone;
	}
	public function getEmail() {
		return $this->email;
	}

	/**
	 * Remove book from student (lost or returned to library @see Library )
	 *
	 * @param Book $book
	 *
	 * @throws Exception
	 */
	public function removeBook(Book $book) {
		if(in_array($this->books, $book->getId())) {
			if (($key = array_search($book->getId(), $this->books)) !== false) {
				unset($this->books[$key]);
			}
		} else {
			throw new Exception("Warning, book cannot be deleted - there are no such book owned by student");
		}
	}

}