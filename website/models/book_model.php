<?php

include_once("entities/book_entity.php");
include_once('entities/review_entity.php');

class BookModel{
	function getBooks(){
		require "testdb.php";
		
		$query = "SELECT * FROM book";
		$result = mysql_query($query) or die(mysql_error());
		
		$book_array = array();
		
		//echo $query;
		
		while($row = mysql_fetch_array($result)){
			$idBook = $row[0];
			$title = $row[1];
			$author = $row[2];
			$publisher = $row[3];
			$category = $row[4];
			$cover = $row[5];
			$description = $row[6];
			$rYear = $row[7];
			$grades = $row[8];
			$noGrades = $row[9];
			$price = $row[10];
			$location = $row[11];
			
			$book = new Book($idBook, $title, $author, $publisher, $category, $cover, $description,
        $rYear, $grades, $noGrades, $price, $location);
			
			array_push($book_array, $book);
			
		}
		
		mysql_close();
			
		return $book_array;
	}
	
	function searchBook($item){
		require "testdb.php";
		
		$query = "SELECT * FROM book WHERE title LIKE '%{$item}%' OR author LIKE '%{$item}%'";
		$result = mysql_query($query) or die(mysql_error());
		
		$book_array = array();
		
		//echo $query;
		
		while($row = mysql_fetch_array($result)){
			$idBook = $row[0];
			$title = $row[1];
			$author = $row[2];
			$publisher = $row[3];
			$category = $row[4];
			$cover = $row[5];
			$description = $row[6];
			$rYear = $row[7];
			$grades = $row[8];
			$noGrades = $row[9];
			$price = $row[10];
			$location = $row[11];
			
			$book = new Book($idBook, $title, $author, $publisher, $category, $cover, $description,
        $rYear, $grades, $noGrades, $price, $location);
			
			array_push($book_array, $book);
			
		}
		
		mysql_close();
			
		return $book_array;
	}
	
	function getBookCategory(){
		require "testdb.php";
		$result = mysql_query("SELECT DISTINCT category FROM book") or die(mysql_error());
		$categories = array();
		
		while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
			array_push($categories, $row[0]);
		}
		
		mysql_close();
		
		return $categories;
	}
	
	function getBookByCategory($category){
		require "testdb.php";
		
		$query = "SELECT * FROM book WHERE category like '$category'";
		$result = mysql_query($query) or die(mysql_error());
		
		$book_array = array();
		
		while($row = mysql_fetch_array($result)){
			$idBook = $row[0];
			$title = $row[1];
			$author = $row[2];
			$publisher = $row[3];
			$category = $row[4];
			$cover = $row[5];
			$description = $row[6];
			$rYear = $row[7];
			$grades = $row[8];
			$noGrades = $row[9];
			$location = $row[10];
			
			$book = new Book($idBook, $title, $author, $publisher, $category, $cover, $description,
        $rYear, $grades, $noGrades, $location);
			
			array_push($book_array, $book);
			
			mysql_close();
			
			return $book_array;
		}
		
	}
	
	function getBook($title, $author){
		require "testdb.php";
		
		$query = "SELECT * FROM book WHERE title LIKE '$title' AND author LIKE '$author'";
		$result = mysql_query($query) or die(mysql_error());
		
		while($row = mysql_fetch_array($result)){
			$idBook = $row[0];
			$title = $row[1];
			$author = $row[2];
			$publisher = $row[3];
			$category = $row[4];
			$cover = $row[5];
			$description = $row[6];
			$rYear = $row[7];
			$grades = $row[8];
			$noGrades = $row[9];
			$price = $row[10];
			$location = $row[11];
			
			$book = new Book($idBook, $title, $author, $publisher, $category, $cover, $description,
        $rYear, $grades, $noGrades, $price, $location);
			
			mysql_close();
			
			return $book;
		}
	}
	
	function getBookReview($idBook){
		require "testdb.php";
		
		$query = "SELECT * FROM review WHERE idBook = $idBook";
		$result = mysql_query($query) or die(mysql_error());
		
		$review_array = array();
		
		while($row = mysql_fetch_array($result)){
			$idReview = $row[0];
			$description = $row[1];
			$approved = $row[2];
			$idUser = $row[3];
			$idBook = $row[4];
			
			$review = new Review($idReview, $description, $approved, $idUser, $idBook);
			
			array_push($review_array, $review);
		}
		
		mysql_close();
		
		return $review_array;
	}
}

?>