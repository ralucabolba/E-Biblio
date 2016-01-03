<?php

class Book{
    public $idBook;
    public $title;
    public $author;
    public $publisher;
    public $category;
    public $cover;
    public $description;
    public $rYear;
    public $grades;
    public $noGrades;
	public $price;
    public $location;
    
    function __construct($idBook, $title, $author, $publisher, $category, $cover, $description,
        $rYear, $grades, $noGrades, $price, $location){
        
            $this->idBook = $idBook;
            $this->title = $title;
            $this->author = $author;
            $this->publisher = $publisher;
            $this->category = $category;
            $this->cover = $cover;
            $this->description = $description;
            $this->rYear = $rYear;
            $this->grades = $grades;
            $this->noGrades = $noGrades;
			$this->price = $price;
            $this->location = $location;
    }
}
?>