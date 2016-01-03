<?php
	session_start();
	include_once("controller/book_controller.php");
	include_once('searchbook.php');
	$bookController = new BookController();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>E-Biblio. Online library.</title>
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
						<a href="index.html">E-biblio. Online library</a>
					</div>
				</div>
				
                
                <div class="menu-wrap">
                    <nav id="main">
                        <ul class="menu">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="profile.php">Profile</a></li>
                            <li><a href="book_page.php">Categories</a>
                                <ul class="sub-menu">
                                    <li><a href="#">Love</a></li>
                                    <li><a href="#">Fiction</a></li>
                                    <li><a href="#">Mystery</a></li>
                                    <li><a href="#">Personal Development</a></li>
                                </ul>
                            </li>
                            <li><a href="about.php">About</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="signup_page.php" class="button button-primary">Sign up</a></li>
                        </ul>
                    </nav>
                </div>
			</header>
			
			<div class="row searchbar">
				  <div class="large-12  columns">
						<form action = "" method = "post">
							<div class="small-12 columns">
							   <input name="tosearch" type="text" class="dream-search" placeholder="Search">
							  <input type="hidden" name = "search" value="">
							</div>
						</form>
				  </div>

			</div>
			
		</div>
	
		<div class="container background-book">
			<div class="row results">
			  <div class="large-12 columns ">
				<div class="row">
				  <div class="large-9 columns">
					<p> Search Results for '<?php echo $_SESSION['searched_item']?>'</p>
				  </div>
				  <div class=" large-3 columns ">
					<select name="sortOptions">
					  <option value="sortby">Sort By</option>
					  <option value="cats">Cats</option>
					  <option value="title">Title</option>
					  <option value="author">Author</option>
					  <option value="mrecats">More Cats</option>
					</select>
				  </div>
				</div>
				<div class="search-results">
					<?php echo $bookController->getSearchBookTable($_SESSION['searched_item']); ?>
				</div>
				<!--<a href="#" class="button right"> show more results &raquo;</a>-->
			  </div>
			</div>
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