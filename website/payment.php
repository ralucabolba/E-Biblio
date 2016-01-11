<?php
	session_start();
	include_once("searchbook.php");
	include_once("pay.php");
	include_once('controller/book_controller.php');
	$bookController = new BookController();
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
			<?php 	if(isset($_SESSION['login_user'])){
					//	include('session.php');
						echo "<ul id='logoutmenu'>
									<li> <p id='welcome'>Welcome : <i>";
						echo $_SESSION['login_user']; 
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
	
		<div class="container background-book">
			<section>
			<form id=payment action='' method='post'>  
				<fieldset>
					<legend>Card Details</legend>
					<ol>
						<li>
						<fieldset>
							<legend>Card Type</legend>
							<ol>
								<li>
									<input id=visa name=cardtype type=radio />
									<label for=visa>VISA</label>
								</li>
								<li>
									<input id=amex name=cardtype type=radio />
									<label for=amex>AmEx</label>
								</li>
								<li>
									<input id=mastercard name=cardtype type=radio />
									<label for=mastercard>Mastercard</label>
								</li>
							</ol>
						</fieldset>
						</li>
						<li>
							<label for=cardnumber>Card Number</label>
							<input id=cardnumber name=cardnumber type=number required />
						</li>
						<li>
							<label for=secure>Security Code</label>
							<input id=secure name=secure type=number required />
						</li>
						<li>
							<label for=namecard>Name on Card</label>
							<input id=namecard name=namecard type=text placeholder="Exact name as on the card" required />
						</li>
					</ol>
				</fieldset>
				<fieldset>
					<button type=submit name='pay'>Pay</button>
				</fieldset>
			</form>
			</section>
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