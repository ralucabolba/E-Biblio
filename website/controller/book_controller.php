<?php

include_once ('models/book_model.php');
include_once "addreview.php";
include_once "addstar.php";
include_once "approve.php";
include_once "del_book.php";

//require ('models/user_model.php');


class BookController{
	function getBooksTable(){
		$bookModel = new BookModel();
		$books = $bookModel->getBooks();
		
		
		$result = "<div style='height:400px;overflow:auto;'>
					<table class='tables'>
					  <thead>
						<tr>
						  <th>Id</th>
						  <th>Title</th>
						  <th>Author</th>
						  <th>Description</th>
						  <th>Publisher</th>
						  <th>Category</th>
						  <th>Cover</th>
						  <th>Publish year</th>
						  <th>Grade</th>
						  <th>Price</th>
						  <th>Location</th>
						  <th>Action</th>
						  <th>Delete</th>
						</tr>
					  </thead>
					  <tbody>";
						
		foreach($books as $book){
			$result = $result . "<tr>
						  <td>$book->idBook</td>
						  <td  contenteditable>$book->title</td>
						  <td  contenteditable>$book->author</td>
						  <td  contenteditable><div style='height:50px;overflow:auto;'>$book->description</div></td>
						  <td  contenteditable>$book->publisher</td>
						  <td  contenteditable>$book->category</td>
						  <td  contenteditable><img src = '$book->cover' width = 50px height=50px></td>
						  <td  contenteditable>$book->rYear</td>
						  <td  contenteditable>$book->grades/$book->noGrades</td>
						  <td  contenteditable>$book->price</td>
						  <td contenteditable>$book->location</td>
						  <td><input type='submit' name='save_book' value='' id='save_book'></td>
						  <td>
							<form action='' method='post'>
								<input type='hidden' name='book_to_del' value='$book->idBook'>
								<input type='submit' name='delete_book' value='' id='del_book'>
							</form>
						  </td>
						</tr>";
		}
		$result = $result . "<tr>
						  <td  contenteditable></td>
						  <td  contenteditable></td>
						  <td  contenteditable></td>
						  <td  contenteditable></div></td>
						  <td  contenteditable></td>
						  <td  contenteditable></td>
						  <td  contenteditable></td>
						  <td  contenteditable></td>
						  <td  contenteditable></td>
						  <td  contenteditable></td>
						  <td contenteditable></td>
						  <td><input type='submit' name='save_book' value='' id='save_book'></td>
						  <td>
							<form action='' method='post'>
								<input type='hidden' name='book_to_del' value='$book->idBook'>
								<input type='submit' name='delete_book' value='' id='del_book'>
							</form>
						  </td>
						</tr>";
		$result = $result . "</tbody>
					</table>
					</div>";
		return $result;
	}
	function getSearchBookTable($item){
		$bookModel = new BookModel();
		$books = array();
		$books = $bookModel->searchBook($item);
		
		$result = "";
		
		if($books){
			
			foreach($books as $b){
				$_SESSION['current_book'] = $b->idBook;
				
				$result = $result . 
				"<div class='row '>
					<div class='large-2 columns'>
					  <a href='#'> <span> </span><img src='$b->cover' alt='book cover' class=' thumbnail'></a>
					</div>
					<div class='large-10 columns'>
					  <div class='row'>
						<div class=' large-9 columns'>
						  <h5><a href='book.php?title=$b->title&author=$b->author&current_book=$b->idBook'>$b->title</a></h5>
						</div>
						<div class=' large-3 columns'>
						  <a href='book.php?title=$b->title&author=$b->author&current_book=$b->idBook'  class='button  expand medium'><span>Open Book</span> </a>
						</div>
						<div class='row'>
						  <div class=' large-12 columns'>
							<ul class='large-block-grid-2'>
							  <li>
								<ul>
								  <li><strong>Author : </strong>$b->author</li>
								  <li><strong>Published by : </strong>$b->publisher</li>
								  <li><strong>Publish year : </strong>$b->rYear</li>
								  <li><strong>Price : </strong>$b->price</li>
								</ul>
							  </li>
							</ul>
						  </div>
						</div>
					  </div>
					</div>
					<hr>
				  </div>";
			}
		}
		
		return $result;
	}
	
	function getBookTable($title, $author){
		
		$link = '';
		
		$bookModel = new BookModel();
		$userModel = new UserModel();
		
		$book = $bookModel->getBook($title, $author);
		
		$reviews = array();
		$reviews = $bookModel->getBookReview($book->idBook);
		
		//echo $reviews[0]->description;
		
		$result = '';
		$reviews_res = "";
		$r = null;
										
		if($book->price == 0){
			$link = $book->location;
		}
		

		if($book != null){
			$_SESSION['current_book'] = $book->idBook;
			$result = "
					<div class='row popular'>
						
						<h3>$book->title &#8211 $book->author</h3>
						
							<div class='row produs'>
								<div class='produs_sus' style=''>
									<div class='large-4 column poza_produs'>
										<img src='$book->cover' width='250' height='375' alt=''>
									</div>

									<div class='large-4 column produs_centru'>
										<p><span>Publish year : </span>$book->rYear<br></p>
										<p><span>Author : </span> <span class='al'>$book->author</span></a><br></p>
										<p><span>Category : </span> $book->category<br></p>
										<p><span>Publisher : </span> <span class='al'>$book->publisher</span></a><br></p>

										<fieldset class='rating'>
											<legend>Please rate:</legend>
											<input type='radio' id='star5' name='star5' value='5' /><label for='star5' title='Rocks!'>5 stars</label>
											<input type='radio' id='star4' name='star4' value='4' /><label for='star4' title='Pretty good'>4 stars</label>
											<input type='radio' id='star3' name='star3' value='3' /><label for='star3' title='Meh'>3 stars</label>
											<input type='radio' id='star2' name='star2' value='2' /><label for='star2' title='Kinda bad'>2 stars</label>
											<input type='radio' id='star1' name='star1' value='1' /><label for='star1' title='Sucks big time'>1 star</label>
										</fieldset>
							
									</div>	
					
									<script>
									$(function() {
										c_rate('ratem',19.4,17);	
									});
									</script>
								</div><!--end of produs_centru-->
						
				
				
					
								<div class='large-4 column column produs_right'>
									<p class='pret'>
										Price : $book->price&nbsp; Lei
									</p><br>

									<a href = '$link' class='button info'>Read me</a>
								
									<br>
									<p class='wishlist'>
									
										<a href='#' onclick='$.get('/ax.jsp?wsladd=wishlist&amp;id=855515',function(data) {document.location='/wishlist.htm'});return false;' title='Wishlist' class='link_default' rel='nofollow'> </a>
									</p>				

								</div>
							</div>
			

	
						<div class='large-12 column'>	
							<h3>Description</h3>
							<div class='descriere_produs'>		
								<p>$book->description</p>
							</div>
						</div>	

					";
					
			$reviews_res = "<div class = 'large-12 column'>
							<h3>Reviews</h3>
							 <div class='comentarii_utilizatori'> ";
							 
							
			foreach($reviews as $r){
					
				if($r->approved == 1){
					
					$reviews_res = $reviews_res . " <div class='row'>
						<div class='large-12 column user'>" . $userModel->getUsernameById($r->idUser) . " : </div>
						<div class='large-12 column continut_comentariu'>" .  $r->description . "</div><br></div>";
				}
			}
			
			
			$reviews_res = $reviews_res . "
							</div>
						</div>
	
	
						<div class='clear'></div> 
						 
						<div class='large-12 column'>             
							<h3>Add a review</h3>
								 <form name='comentariiprodus1' action='' method='post'>          
								   
								  <div class='textar'>
									<div>Your review : </div>
									<textarea name='comment' cols='47' rows='10' class='contact_input' style='height:100px'></textarea>  
									</div>
									<div class='rand_jos'>
									<!--<a href = '#' class = 'button info'>SEND </a>-->
									<input class = 'button info' name='addreview' type='submit' value=' Send '>
									</div>
								 </form>     
						</div>
							</div>";
		}
		
        return $result . $reviews_res ;
	}
}

?>