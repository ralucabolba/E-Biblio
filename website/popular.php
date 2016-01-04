<?php
	include 'testdb.php';
	if($dbConnected){
		$sql = "SELECT idBook, title, author, cover, location FROM book ORDER BY (grades DIV noGrades) DESC;";
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
					?>
				</a> 
				<p class="title"><?php echo "by " . $author ?></p>
			</div>
			<?php
			
		}
	}
?>