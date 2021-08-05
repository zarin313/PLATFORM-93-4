<?php 
 include "connection.php";
 session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>
    Stories
		
	</title>
	<link rel="stylesheet" type="text/css" href="style\new.css">
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body >
<header>
	<nav>

	 <ul>
  <li><a href="q.php">Home</a></li>
  
 
  <li><a href="writerlogout.php">Logout</a></li>

  <li><a href="about.php">About</a></li>
</ul> 
</nav>
</header>

<section>



<h1 style="color:white; text-align: top; font-size: 40px"> Here's the stories</h1>



<?php 
$q=mysqli_query($db,"SELECT * FROM story order by likes desc ;");
$row=mysqli_fetch_all($q,MYSQLI_ASSOC);


for($i=0;$i<count($row);$i++){
$c=$row[$i]['content'];
$n=$row[$i]['Name'];
$w=$row[$i]['writer name'];
$g=$row[$i]['genre'];
echo "<br>";
echo "<h1 style='color: white; font-size:30px;'> $n &nbsp &nbsp Genre: $g </h1>";
echo "<br>"; 
echo "<h1 style='color: white; font-size:20px;'> $w </h1>";
echo "<br>";
echo "<textarea readonly style='margin: 0px;height:200px;width:800px;'> $c </textarea>"; 
?>
<form method="post">
<textarea required="" name="comment"placeholder="Write your comment... " style="height: 100px; width: 400px"></textarea><br>
&nbsp &nbsp &nbsp 
&nbsp &nbsp &nbsp 
&nbsp &nbsp &nbsp 
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
<input type="submit" style="width: 100px; height: 35px;" name="<?php echo $i; ?>" value="post" id="submit"/>

</form>
<?php 

if(isset($_POST[$i]))
    { $flag=1;
      //$c=$row[$i]['content'];
     
     //$w=$row[$i]['writer name'];

          $sub=mysqli_query($db,"SELECT writerusername FROM `comment(writer)` where storyname='$n' && writerusername='$_SESSION[login_author]' ;");
          $row2=mysqli_fetch_all($sub,MYSQLI_ASSOC);


          if(count($row2)!=0){
            ?>
           <script type="text/javascript">
           alert("you can not comment more than one time!!");
            window.location="story1.php";
           </script>
   <?php  
          $flag=0;

          }



           $r=mysqli_query($db,"SELECT * FROM author where username='$_SESSION[login_author]';");

           $row1=mysqli_fetch_assoc($r);

           


if($flag!=0){

           mysqli_query($db,"INSERT INTO `comment(writer)` VALUES ('$n', '$_SESSION[login_author]','$row1[Name]','$_POST[comment]');");
            //mysqli_query($db,"INSERT INTO `writinglist` VALUES ('$_POST[name]','$_SESSION[login_user]','$f $l');");


    
    ?>
    <script type="text/javascript">
    alert("comment written!!");
    window.location="story1.php";
   </script>
   <?php

}}}
?>

</section>


</body>
</html>