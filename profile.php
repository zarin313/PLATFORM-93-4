<?php 
  include "connection.php";
  session_start();

   ?>
<!DOCTYPE html>
<html>
<head>
	<title> Profile </title>
	<link rel="stylesheet" type="text/css" href="style\profile.css">
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


	}
	

	
	</header>
	<section>
		 <div class="links"  >
		<h1  ><a href="people.php"> People </a></h1>
		<br>
 		<h1  ><a href="explore.php"> Explore </a></h1>
 		<br>
 		<h1  ><a href="write.php"> Write Story </a></h1>
 		<br>
 		
 		<h1  ><a href="writinglist.php"> My Stories   </a></h1>
 		<br>
 		<h1  ><a href="followers.php"> Followers </a></h1>
 		<br>
 		<h1  ><a href="following.php"> Following </a></h1>

 		




 </div>

	<div class="container">
 		<form action="" method="post">
 			<!--<button class="btn btn-default" style="float: right; width: 70px;" name="submit1">Edit</button> -->
 		</form>
 		<div class="wrapper">
 			<?php

 				
 				$q=mysqli_query($db,"SELECT * FROM user where username='$_SESSION[login_user]';");
 				$r=mysqli_query($db,"SELECT * from story where writerusername='$_SESSION[login_user]';");
 				$row1=mysqli_fetch_all($r,MYSQLI_ASSOC);
 				$c=count($row1);
 			?>
 			

 			<?php
 				$row=mysqli_fetch_assoc($q);

 				
 			?>
 			
 			<div style="text-align: left; color: white;"> <b>Welcome, </b>

	 			
	 				<?php echo"<b>";
	 				echo $_SESSION['login_user']; ?>
	 				<br><br>
	 			</h4>
 			</div>
 			<div style="color:white;">
 			<?php 
 				
 				echo "<table>";
	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Name: </b>";
	 					echo "</td>";

	 					echo "<td>";
	 						echo $row['firstname'];
	 						echo " ";
	 						echo $row['lastname'];
	 					echo "</td>";
	 				echo "</tr>";

	 				

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> UserName: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['username'];
	 					echo "</td>";
	 				echo "</tr>";

	 				

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Email: </b>";	
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['email'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Contact: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['phone'];
	 					echo "</td>";
	 				echo "</tr>";
	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Stories Written: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $c;
	 					echo "</td>";
	 				echo "</tr>";

	 				
 				echo "</table>";
 				echo "</b>";
 			?>
 			<br>
 			</div>
 		
 			
 		</div>
 	</div>



</section>




</body>
</html>