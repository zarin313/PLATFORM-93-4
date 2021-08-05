<?php 
 include "connection.php";
 session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
	<link rel="stylesheet" type="text/css" href="story.css">
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
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
<section>




<?php 
$q=mysqli_query($db,"SELECT * FROM story order by name limit 0,1;");
$row=mysqli_fetch_assoc($q);
echo "<textarea readonly style='margin: 0px;height:415px;width:1360px;'> '$row[content]'</textarea>"; 
?>
<form method="post">
<textarea required="" name="comment"placeholder="Write your comment... " style="height: 100px; width: 400px"></textarea><br>
&nbsp &nbsp &nbsp 
&nbsp &nbsp &nbsp 
&nbsp &nbsp &nbsp 
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
<button style="width: 100px; height: 35px;" name="post1" > Post Comment</button>
</form>
<?php
 if(isset($_POST['post1']))
    {		
    	   $q=mysqli_query($db,"SELECT * FROM story order by name limit 0,1;");
           $row=mysqli_fetch_assoc($q);
      	   $r=mysqli_query($db,"SELECT * FROM author where username='$_SESSION[login_author]';");

      	   $row1=mysqli_fetch_assoc($r);
      	   




           mysqli_query($db,"INSERT INTO `comment(writer)` VALUES ('$row[Name]', '$_SESSION[login_author]','$row1[Name]','$_POST[comment]');");
            //mysqli_query($db,"INSERT INTO `writinglist` VALUES ('$_POST[name]','$_SESSION[login_user]','$f $l');");


    
    ?>
    <script type="text/javascript">
    alert("comment written!!");
    window.location="story1.php";
   </script>
   <?php  
}
?>
</section>

</body>
</html>