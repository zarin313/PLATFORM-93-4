<?php 
 include "connection.php";
 session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Stories for Authors
	</title>
	<link rel="stylesheet" type="text/css" href="style\as.css">
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body bgcolor="black" >
	<header>
 		
 		
	
	<nav>

	 <ul>
  <li><a href="q.php">Home</a></li>
  <li><a href="">Author</a></li>
  <li><a href="author profile.php">Profile</a></li>
  <li><a href="writerlogout.php">Logout</a></li>

  <li><a href="about.php">About</a></li>
</ul> 
</nav>
</header>

	<section style="text-align: center;color: white;">
	<div class="list">
		<h1 style="font-size: 20px; padding-left: 50px"><br><br> Here's the stories</h1>
		<br><br>
		<?php
		$q=mysqli_query($db,"SELECT * FROM story order by name;");
		//$count=mysqli_query($db,"SELECT count(*) FROM writinglist where writerusername='$_SESSION[login_user]';");
 			?>
 			
 			<div style="font-size: 20px; padding-left: 50px">
 			
 			<?php
 				$row=mysqli_fetch_all($q,MYSQLI_ASSOC);
 				//print_r($row);
 			 
 				
 				for($i=0;$i<count($row);$i++){
 					echo $i+1;
 					echo ". ";
 					//echo $row[$i]['Name'];
 					echo '<a href ="story1.php">'.$row[$i]['Name'].'</a>'; 
 					echo " : ";
 					
 					echo $row[$i]['writer name'];
 					echo "<br>";
 				}
	 					


 				
 			?>
 			</div>





	</div>
	
</section>

</body>
</html>