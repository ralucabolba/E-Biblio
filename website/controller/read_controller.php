<?php

include_once ('models/read_model.php');

//require ('models/user_model.php');


class ReadingController{
	function getReadTable($username){
		$readModel = new ReadingModel();
		$reads = array();
		$reads = $readModel->getReading($username);
		
		$result = "";
		
		$result = "<div style='height:400px;overflow:auto;'>
					<table class='tables'>
					  <thead>
						<tr>
						  <th>Id</th>
						  <th>Title</th>
						  <th>Author</th>
						  <th>Start date</th>
						  <th>End date</th>
						</tr>
					  </thead>
					  <tbody>";
						
		foreach($reads as $r){
			$result = $result . "<tr>
						  <td>$r->idRead</td>
						  <td>$r->title</td>
						  <td>$r->author</td>
						  <td>$r->startdate</td>
						  <td>$r->enddate</td>
						</tr>";
		}
		
		$result = $result . "</tbody>
					</table>
					</div>";
		
		return $result;
	}
}