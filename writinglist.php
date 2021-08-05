<?php 
 include "connection.php";
 session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Writing List
	</title>
	<link rel="stylesheet" type="text/css" href="style\writinglist.css">
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
		<h1 style="font-size: 30px; padding-left: 50px"> Here's your writings..</h1>
		<br><br>
	
 		<?php 
$q=mysqli_query($db,"SELECT * FROM story where writerusername='$_SESSION[login_user]';");
$row=mysqli_fetch_all($q,MYSQLI_ASSOC);


for($i=0;$i<count($row);$i++){
$c=$row[$i]['content'];
$n=$row[$i]['Name'];
$w=$row[$i]['writer name'];
$g=$row[$i]['genre'];
echo "<br>";
echo "<h1 style='color: white; font-size:30px;'> $n &nbsp &nbsp Genre: $g </h1>";
echo "<br>"; 
//echo "<h1 style='color: white; font-size:20px;'> $w </h1>";
//echo "<br>";
echo "<textarea readonly style='margin: 0px;height:200px;width:500px;'> $c </textarea>"; 
$l=$row[$i]['likes'];
echo "<p style='font-size: 15px; color:white'>$l likes </p>";


?>

<form>
	<?php 
	$com=mysqli_query($db,"SELECT * from `comment(writer)` where storyname='$n';");
	$row1=mysqli_fetch_all($com,MYSQLI_ASSOC);
	?>
		<br>
		<p style="font-size: 20px; color:white"> Comments from reknown authors</p>
<br>
<?php
	


	for ($k=0; $k < count($row1); $k++) { 

		
		$an=$row1[$k]['writername'];
		$cm=$row1[$k]['comment'];
		?>
		
		<?php  
		echo "<p style='font-size: 15px; color:white'>$an </p>";
		echo "<textarea readonly style='height: 70px; width: 400px'> $cm </textarea><br>"
		?>
&nbsp &nbsp &nbsp 
&nbsp &nbsp &nbsp 

		<?php 


	}
	 ?>


</form>
<form>
	<?php 
	$com1=mysqli_query($db,"SELECT * from `comment(user)` where storyname='$n';");
	$row2=mysqli_fetch_all($com1,MYSQLI_ASSOC);
	?>
		<br>
		<p style="font-size: 20px; color:white"> Comments from users</p>
<br>
<?php
	


	for ($j=0; $j < count($row2); $j++) { 

		
		$un=$row2[$j]['username'];
		$cmm=$row2[$j]['comment'];
		?>
		
		<?php  
		echo "<p style='font-size: 15px; color:white'>$un </p>";
		echo "<textarea readonly style='height: 70px; width: 400px'> $cmm </textarea><br>"
		?>
&nbsp &nbsp &nbsp 
&nbsp &nbsp &nbsp 

		<?php 


	}
	 ?>


</form>





 			<?php
 			}  ?>





	</div>
	</section>


</body>
</html>