<?php
session_start();

include_once('login.php');
include_once('register.php');
include_once('searchbook.php');

include_once('controller/book_controller.php');
	$bookController = new BookController();

//if(isset($_SESSION['login_user'])){
//	header("location: profile.php");
//}
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
	
		<div class="container background-magenta">
			<div id="row main" class='signup'>
				<h1>Login or Register</h1>
					<div id="login">
						<h2>Login</h2>
						<form action="" method="post">
							<label>Username :</label>
							<input id="name" name="username" placeholder="username" type="text">
							
							<label>Password :</label>
							<input id="password" name="password" placeholder="**********" type="password">
							
							<input name="submit" type="submit" value=" Login ">
							<span><?php echo $error; ?></span>
						</form>
					</div>
					
					
					<div id="register">
						<h2>Register</h2>
						<form action="" method="post">
							<label>First name :</label>
							<input id="firstname" name="firstname" placeholder="firstname" type="text">
							
							<label>Last name :</label>
							<input id="lastname" name="lastname" placeholder="lastname" type="text">
							
							<label>Email :</label>
							<input id="email" name="email" placeholder="email" type="text">
							
							<label>Username :</label>
							<input id="name" name="username" placeholder="username" type="text">
							
							<label>Password :</label>
							<input id="password" name="password" placeholder="**********" type="password">
							
							<input name="register" type="submit" value=" Register ">
							<span><?php echo $rerror; ?></span>
						</form>
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