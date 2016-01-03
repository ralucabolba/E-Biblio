<?php

include_once ("entities/review_entity.php");
		

class ReviewModel{
	function getReviews(){
		require "testdb.php";
		
		$query = "SELECT * FROM review";
		$result = mysql_query($query) or die(mysql_error());
		
		$reviews = array();
		
		while($row = mysql_fetch_array($result)){
			$idReview = $row[0];
			$description = $row[1];
			$approved = $row[2];
			$idUser = $row[3];
			$idBook = $row[4];
			
			$review = new Review($idReview, $description, $approved, $idUser, $idBook);
			
			array_push($reviews, $review);
		}
		mysql_close();
		return $reviews;
	}
}

?>