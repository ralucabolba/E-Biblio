<?php

//include('session.php');
include_once('controller/user_controller.php');
include_once('controller/book_controller.php');
include_once('controller/review_controller.php');
include_once('controller/read_controller.php');

include_once("searchbook.php");
include_once "approve.php";
include_once "del_book.php";
include_once "del_user.php";
include_once "save_book.php";
include_once "insertbook.php";

$userController = new UserController();
$bookController = new BookController();
$reviewController = new ReviewController();
$readController = new ReadingController();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>E-Biblio. Online library. About</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/foundation.min.css">
        <link rel="stylesheet" href="css/foundation.css">
		<link rel="stylesheet" href="css/custom.css">
		
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,800italic,300italic,400italic,600,600italic,700,700italic,800" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
        
	</head>
	<body>
		<div class="container background-beige">
			
			<?php
				if (isset($_SESSION['login_user'])){
					echo "<ul id='logoutmenu'>
							<li> <p id='welcome'>Welcome : <i>";
					echo ($_SESSION['login_user']); 
					echo "</i></p> </li>
								<li> <a href='logout.php' id='logout'>Log Out</a> </li>
						</ul>";
				}
			?>
			
			<header class="row" id="main">
				
				<div class="large-4 column">
					<div class="brand">
						<a href="index.php">E-biblio. Online library</a>
					</div>
				</div>
				
                
                <div class="menu-wrap">
                    <nav id="main">
                        <ul class="menu">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="profile.php">Profile</a></li>
                            <li><a href="#">Categories</a>
                                <ul class="sub-menu">
                                    <?php echo $bookController->getCategories() ?>
                                </ul>
                            </li>
                            <li><a href="about.php">About</a></li>
                            <li><a href="signup_page.php" class="button button-primary">Sign up</a></li>
                        </ul>
                    </nav>
                </div>
				
			</header>
			
			<div class="row searchbar">
				  <div class="large-12  columns">
						<form action = "" method = "post">
							<div class="small-12 columns">
							  <input name="tosearch" type="search" class="dream-search" placeholder="Search">
							  <input type = "hidden" name = "search" value="">
							</div>
						</form>
				  </div>
			</div>
		</div>
	
		<div class="container background-magenta">
			
			<?php if(isset($_SESSION['login_user'])){
				if($_SESSION['login_user'] == 'admin'){?>
				<span><?php echo $merror; ?></span>
			
				<div class="tabform">
				<ul class="tabs">
				<li>
				  <input type="radio" checked name="tabs" id="tab1">
				  <label for="tab1">Users</label>
				  <div id="tab-content1" class="tab-content animated fadeIn">
						<?php echo $userController->getUsersTable(); ?>
				  </div>
				</li>
				<li>
				  <input type="radio" name="tabs" id="tab2">
				  <label for="tab2">Books</label>
				  <div id="tab-content2" class="tab-content animated fadeIn">
						<?php echo $bookController->getBooksTable(); ?>
				  </div>
				</li>
				<li>
				  <input type="radio" name="tabs" id="tab3">
				  <label for="tab3">Reviews</label>
				  <div id="tab-content3" class="tab-content animated fadeIn">
						<?php echo $reviewController->getReviewsTable(); ?>
				  </div>
				</li>
				</ul>
				</div>
			<?php	
			} else {
				?>
				<span><?php echo $merror; ?></span>
			
				<div class="tabform">
				<ul class="tabs">
				<li>
				  <input type="radio" checked name="tabs" id="tab1">
				  <label for="tab1">My information</label>
				  <div id="tab-content1" class="tab-content animated fadeIn">
						<?php
							if(isset($_SESSION['login_user'])){
								echo $userController->getUserTable($_SESSION['login_user']);
							}
							else{
								echo "You must login in order to view or modify your personal information.";
							}
						?>
				  </div>
				</li>
				<li>
				  <input type="radio" name="tabs" id="tab2">
				  <label for="tab2">My books</label>
				  <div id="tab-content2" class="tab-content animated fadeIn">
						<?php
							if(isset($_SESSION['login_user'])){
								echo $readController->getReadTable($_SESSION['login_user']);
							}
							else{
								echo "You must login in order to view or modify your personal information.";
							}
						?>
				  </div>
				</li>
				<!--<li>
				  <input type="radio" name="tabs" id="tab3">
				  <label for="tab3">tab 3</label>
				  <div id="tab-content3" class="tab-content animated fadeIn">
					
				  </div>
				</li>-->
				</ul>
				</div><?php
			}
			}
			else{
					echo "You must login in order to view or modify your personal information.";
				}
			?>
		</div>
		
		
		<footer>
			<div class="container background-darkgreen">
				<div class="row copyright">
					<p>
						<span>E-Biblio. Online Library</span>
						©
						<em id="copyright-year">2015</em>
						|
						<a href="#">Privacy Policy</a>
					</p>
					
					<nav id="icons" class="large-8 column">
						<ul>
							<li><a href="#"><img src="img/facebook.png" alt></a></li>
							<li><a href="#"><img src="img/twitter.png" alt></a></li>
							<li><a href="#"><img src="img/google-plus.png" alt></a></li>
							<li><a href="#"><img src="img/instagram.png" alt></a></li>
						</ul>
					</nav>
				</div>
			</div>
		</footer>
        
	</body>
</html>