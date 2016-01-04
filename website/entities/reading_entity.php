<?php

class Reading{
    public $idRead;
    public $idUser;
    public $title;
	public $author;
    public $startdate;
    public $enddate;

    
    function __construct($idRead, $idUser, $title, $author, $startdate, $enddate){
        
            $this->idRead = $idRead;
            $this->idUser = $idUser;
            $this->title = $title;
			$this->author = $author;
            $this->startdate= $startdate;
            $this->enddate = $enddate;

    }
}
?>