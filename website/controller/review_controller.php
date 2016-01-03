<?php

include_once ("models/review_model.php");


class ReviewController{
	function getReviewsTable(){
		
		$reviewModel = new ReviewModel();
		$reviews = $reviewModel->getReviews();

		$result = "<div style='height:400px;overflow:auto;'>
					<table class='tables'>
					  <thead>
						<tr>
						  <th>Id review</th>
						  <th>Description</th>
						  <th>Id user</th>
						  <th>Id book</th>
						  <th>Approved</th>
						  <th>Approve review</th>
						</tr>
					  </thead>
					  <tbody>";
						
		foreach($reviews as $review){
			$result = $result . "<tr>
						  <td>$review->idReview</td>
						  <td><div style='width:600px;height:40px;overflow:auto;'>$review->description</div></td>
						  <td>$review->idUser</td>
						  <td>$review->idBook</td>
						  <td>$review->approved</td>
						  <td>
							<form action='' method='post'>
							<!--<input type='image' src='img/check.png' alt='submit' style = 'width: 40px; height: 40px;' name='approve'/>-->
							<input type='hidden' name='idreview' value='$review->idReview' />
							<input type='submit' name='approve' value='' id='approve'/>
							
							</form>
						  </td>
						</tr>";
			
		}
		
		$result = $result . "</tbody>
					</table>
					</div>";
		return $result;
	}
}