<?php
	session_start();
	include_once("searchbook.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>E-Biblio. Online library</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/foundation.min.css">
        <link rel="stylesheet" href="css/foundation.css">
		<link rel="stylesheet" href="css/custom.css">
		
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,800italic,300italic,400italic,600,600italic,700,700italic,800" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
        
        <script type = "text/JavaScript">
        function killCopy(e){
            return false
        }
        function reEnable(){
            return true
        }
        document.onselectstart = new Function("return false")
        if(window.sidebar){
            document.onmousedown=killCopy
            document.onClick=reEnable
        }
        </script>
        
        
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
							  <!--<a name="search" href = "">
								<img  class="my-search-image" src="img/search.png" alt="">
							  </a>-->
							  <input type = "hidden" name = "search" value="">
							</div>
						</form>
				  </div>

			</div>
			
			<div class="row feature">
				<div class="large-5 column">
					<h1>A reader lives a thousand lives before he dies.</h1>
					<h5>George R. R. Martin</h5>
				</div>
				<div class="large-7 column">
					<img src="img/books.jpg" alt="" align="right">
				</div>
			</div>
		</div>
	
		<div class="container background-yellow">
			<div class="row about">
				<div class="medium-4 column">
					<p>Register for free</p>
					<img class="icons" src="img/register.png" alt="">
				</div>
				
				<div class="medium-4 column">
					<p>Search books</p>
					<img class="icons" src="img/search.png" alt="">
				</div>
				
				<div class="medium-4 column">
					<p>Start reading</p>
					<img class="icons" src="img/book.png" alt="">
				</div>
			</div>
		</div>
		
		<div class="container background-green">
			<div class="row popular">
				<h3>MOST POPULAR</h3>
                
                <?php 
                    include 'testdb.php';
                    if($dbConnected){
                        $sql = "select idBook, title, author, cover, location from book";
                        $result = mysql_query($sql);
                        
                        $i = 1;
                        while($i <= 4 and $row = mysql_fetch_array($result, MYSQL_ASSOC)){
							$idBook = $row["idBook"];
                            $title = $row["title"];
                            $author = $row["author"];
                            $cover = $row["cover"];
                            $location = $row["location"];
                            
                            $i += 1 ;
                            ?>
                            <div class="medium-3 column">
                                <img src="<?php echo htmlspecialchars($cover) ?>" width="250" height="375" alt="">
                                <a href="book.php?title=<?php echo $title?>&author=<?php echo $author?>&current_book=<?php echo $idBook?>">
									<?php 
										echo $title ;
										//$_SESSION['title'] = $title;
										//$_SESSION['author'] = $author;
									?>
								</a> 
                                <p class="title"><?php echo "by " . $author ?></p>
                            </div>
                            <?php
                            
                        }
                    }
                ?>
                
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