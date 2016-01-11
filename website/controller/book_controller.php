<?php

include_once ('models/book_model.php');
include_once "addreview.php";
include_once "addstar.php";

//require ('models/user_model.php');


class BookController{
	function getCategoryTable($category){
		$bookModel = new BookModel();
		$books = array();
		$books = $bookModel->getBookByCategory($category);
		
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
	function getCategories(){
		$bookModel = new BookModel();
		$cat = $bookModel->getBookCategory();
		
		$result = "";
		if($cat){
			foreach($cat as $c){
				$result = $result . "<li><a href='book_page.php?category=$c'>$c</a></li>";
			}
		}
		
		
		return $result;
	}
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
						  <!--<th>Delete</th>-->
						</tr>
					  </thead>
					  <tbody>";
						
		foreach($books as $book){
			$result = $result . "<form action='' method='post'>
						<tr>
						  <td width='10px' ><input type='hidden' name='idBook_save' value='$book->idBook' />$book->idBook</td>
						  <!--<td  contenteditable><input type='p' name='title_save' value='$book->title' /></td>-->
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
						  <!--<td>
							
								
								<input type='hidden' name='author_save' value='$book->author' />
								<input type='hidden' name='description_save' value='$book->description' />
								<input type='hidden' name='publisher_save' value='$book->publisher' />
								<input type='hidden' name='category_save' value='$book->category' />
								<input type='hidden' name='cover_save' value='$book->cover' />
								<input type='hidden' name='rYear_save' value='$book->rYear' />
								<input type='hidden' name='grades_save' value='$book->grades' />
								<input type='hidden' name='noGrades_save' value='$book->noGrades' />
								<input type='hidden' name='price_save' value='$book->price' />
								<input type='hidden' name='location_save' value='$book->location' />
								
								<input type='submit' name='save_book' value='' id='save_book'>
							
						  </td>-->
						  <td>
							<form action='' method='post'>
								<input type='hidden' name='book_to_del' value='$book->idBook' />
								<input type='submit' name='delete_book' value='' id='del_book'/>
							</form>
						  </td>
						</tr>
						</form>";
		}
		$result = $result . "<form action='' method='post'>
						<tr>
						  <td/></td>
						  <td  contenteditable><input type='p' name='new_title' value=' ' /></td>
						  <td  contenteditable><input type='p' name='new_author' value=' ' /></td>
						  <td  contenteditable><input type='p' name='new_description' value=' ' /></td>
						  <td  contenteditable><input type='p' name='new_publisher' value=' ' /></td>
						  <td  contenteditable><input type='p' name='new_category' value=' ' /></td>
						  <td  contenteditable><input type='file' name='new_cover' value=' '/></td>
						  <td  contenteditable><input type='p' name='new_rYear' value=' ' /></td>
						  <td  contenteditable><input type='p' value='0/0' /></td>
						  <td  contenteditable><input type='p' name='new_price' value=' ' /></td>
						  <td contenteditable><input type='p' name='new_location' value=' ' /></td>
						  <td><input type='submit' name='insert_book' value=' ' id='insert_book'></td>
						</tr>
					</form>";
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
		$price = $book->price;
		require "testdb.php";
		
		if(isset($_SESSION['login_user'])){
			
			$username = $_SESSION['login_user'];
			$query = "SELECT idUser FROM users WHERE username LIKE '$username'";
			$result = mysql_query($query) or die(mysql_error());
			
			while($row = mysql_fetch_array($result)){
				$idUser = $row[0];
			
				$query2 = "SELECT * FROM reading WHERE idUser = $idUser AND idBook = $book->idBook";
				$result2 = mysql_query($query2) or die(mysql_error());
				
				while($row = mysql_fetch_array($result2)){
					$date = date('Y-m-d');
					$end_date = date("Y-m-d", strtotime($row['enddate']) );
					
					if ($end_date > $date){
						$price = 0;
					}
				}
			}
		}
		
		mysql_close();
		if(isset($_SESSION['login_user'])){
			if($price == 0){
				$link = $book->location;
			}
			else{
				$link = "payment.php";
			}
		}

		if($book != null){
			$_SESSION['current_book'] = $book->idBook;
			$grade = 0;
			if($book->noGrades > 0){
				$grade = $book->grades/$book->noGrades;
			}
			
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
										<p><span>Grade : </span> <span class='al'>$grade</span></a><br></p>
										<form action='' method='post'>
											<fieldset class='rating'>
												<legend>Please rate:</legend>
												<input type='submit' id='star5' name='star5' value='5' /><label for='star5' title='Rocks!'>5 stars</label>
												<input type='submit' id='star4' name='star4' value='4' /><label for='star4' title='Pretty good'>4 stars</label>
												<input type='submit' id='star3' name='star3' value='3' /><label for='star3' title='Meh'>3 stars</label>
												<input type='submit' id='star2' name='star2' value='2' /><label for='star2' title='Kinda bad'>2 stars</label>
												<input type='submit' id='star1' name='star1' value='1' /><label for='star1' title='Sucks big time'>1 star</label>
											</fieldset>
										</form>
									</div>	
					
									<script>
									$(function() {
										c_rate('ratem',19.4,17);	
									});
									</script>
								</div><!--end of produs_centru-->
						
				
				
								<form action='' method='post'>
								<div class='large-4 column column produs_right'>
									<p class='pret'>
										Price : $price&nbsp; Lei
									</p><br>

									<a href = '$link?title=$book->title&author=$book->author&current_book=$book->idBook&link_book=$book->location' class='button info'>Read me</a>
									<br>
													

								</div>
								</form>
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