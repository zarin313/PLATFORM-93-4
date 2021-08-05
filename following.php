<?php 
 include "connection.php";
 session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>
		following
	</title>
	<link rel="stylesheet" type="text/css" href="style\followers.css">
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<header>
 		
 		
	
	<nav>

	 <ul>
  <li><a class="active" href="q.php">Home</a></li>
 
  <li><a href="profile.php">Profile</a></li>
  <li><a href="logout.php">Logout</a></li>

  <li><a href="about.php">About</a></li>
</ul> 
</nav>
</header>
<section style="text-align: left;color: white;">
	<div class="list">
		<h1 style="font-size: 30px; padding-left: 50px"><br><br>  Following !!</h1>
		<br><br>
		<?php
			$q=mysqli_query($db,"SELECT * FROM `follow` where user='$_SESSION[login_user]';");
		//$count=mysqli_query($db,"SELECT count(*) FROM writinglist where writerusername='$_SESSION[login_user]';");
 			?>
 			
 			<div style="font-size: 20px; padding-left: 50px">
 			
 			<?php
 				$row=mysqli_fetch_all($q,MYSQLI_ASSOC);
 				//print_r($row);
 			 
 				
 				for($i=0;$i<count($row);$i++){
 					echo $i+1;
 					echo ". ";
 					echo $row[$i]['following'];

 					echo "<br>";
 					$n=$row[$i]['following'];
 				
 				?>
 				<form method="post">
 						&nbsp &nbsp
 					<input  type="submit" style="width: 80px; height: 20px; " name="<?php echo $i; ?>" value="Unfollow" id="submit" />
 					</form>
 					<?php

 						if(isset($_POST[$i]))
   				 		{    
   				 			//$d=mysqli_query($db,"SELECT * from `follow` where user='$_SESSION[login_user]' && following='$n';");
   				 			//$row2=mysqli_fetch_all($d,MYSQLI_ASSOC);




   				 		
         				
           				mysqli_query($db,"DELETE from `follow` where user='$_SESSION[login_user]' && following='$n' ;");

           				
           			}
           		echo "<br>";
           	}

           			?>
 				
	 					


 				
 			
 			</div>





	</div>
	</section>


</body>
</html>