<?php

class Review{
	public $idReview;
	public $description;
	public $approved;
	public $idUser;
	public $idBook;
    
    function __construct($idReview, $description, $approved, $idUser, $idBook){

            $this->idReview = $idReview;
            $this->description = $description;
            $this->approved = $approved;
            $this->idUser = $idUser;
			$this->idBook = $idBook;
    }
}
?>