<?php 
 include "connection.php";
 session_start();
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>
 		Write Story
 	</title>
 	<link rel="stylesheet" type="text/css" href="style\write.css">
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

 </head>
 <body>
 	<header>
 		
 		
	
	<nav>

	 <ul>
  <li><a class="active" href="q.php">Home</a></li>
  <li><a href="author.php">Author</a></li>
  <li><a href="profile.php">Profile</a></li>
  <li><a href="logout.php">Logout</a></li>

  <li><a href="about.php">About</a></li>
</ul> 
</nav>


	}
	
 	</header>

 	<section>
 		<div class='write' style="padding: 20px">
 			<h1 style="color: white; font-size: 30px">&nbsp &nbsp Write Your Story Here</h1><br><br>
 			<form  method="post">
 			<input  type="text" name="name" placeholder="Story Name" required="">
 			<input  type="text" name="genre" placeholder="Genre" required=""><br><br>
			<!--<input  type="text" size="1000" name="story" placeholder="Write the story..."style="height: 300px; width: 700px;margin: auto;"><br>	<br><br>-->
			<textarea name="content"placeholder="Write your story... " required="" style="height: 300px; width: 700px"></textarea><br><br>
			<button style="width: 100px; height: 35px;"name="post" required=""> Post story</button>	
		</form>
 		</div>
 		
 	</section>
<?php

    if(isset($_POST['post']))
    {		
      	   $r=mysqli_query($db,"SELECT * FROM user where username='$_SESSION[login_user]';");
      	   $row=mysqli_fetch_assoc($r);
      	   $f=$row['firstname'];
           $l=$row['lastname'];



           mysqli_query($db,"INSERT INTO `story` VALUES ('$_POST[name]','$f $l', '$_SESSION[login_user]','$_POST[genre]','$_POST[content]',0);");
            mysqli_query($db,"INSERT INTO `writinglist` VALUES ('$_POST[name]','$_SESSION[login_user]','$f $l');");


    
    ?>
    <script type="text/javascript">
    alert("Story written!!");
    window.location="profile.php"
   </script>
   <?php  
}

?>
 </body>
 </html>