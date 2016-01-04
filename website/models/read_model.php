<?php

include_once ("entities/reading_entity.php");
//include_once "testdb.php";
		

class ReadingModel{
	function getReading($username){
		require "testdb.php";
		
		$query = "SELECT idUser FROM users WHERE username LIKE '$username'";
		$result = mysql_query($query) or die(mysql_error());
		
		$reads = array();
		
		while($row = mysql_fetch_array($result)){
			$idUser = $row[0];
			
			$query2 = "SELECT * FROM reading WHERE idUser = $idUser";
			$result2 = mysql_query($query2);
			
			while($row2 = mysql_fetch_array($result2)){
				$idRead = $row2['idRead'];
				$idBook = $row2['idBook'];
				$startdate = $row2['startdate'];
				$enddate = $row2['enddate'];
				
				$query3 = "SELECT title, author FROM book WHERE idBook = $idBook";
				$result3 = mysql_query($query3);
				
				while($row3 = mysql_fetch_array($result3)){
					$title = $row3['title'];
					$author = $row3['author'];
					
					$r = new Reading($idRead, $idUser, $title, $author, $startdate, $enddate);
					
					array_push($reads, $r);
				}
			}
		}
		mysql_close();
		return $reads;
	}
}