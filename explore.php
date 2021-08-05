<?php 
 include "connection.php";
 session_start();
 ?>


<!DOCTYPE html>
<html>
<head>
	<title> explore</title>
	<link rel="stylesheet" type="text/css" href="style\explore.css">
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>


	<header>
	<nav>

	 <ul>
  <li><a href="q.php">Home</a></li>
  
 
  <li><a href="logout.php">Logout</a></li>
   <li><a href="profile.php">Profile</a></li>


  <li><a href="about.php">About</a></li>
</ul> 
</nav>
</header>
<section>
	<h1 style="color:white; text-align: top; font-size: 40px"> Here's the stories</h1>



<?php 
$q=mysqli_query($db,"SELECT * FROM story  where writerusername= ANY (select following from follow where user='$_SESSION[login_user]')

   order by likes desc ;");
$row=mysqli_fetch_all($q,MYSQLI_ASSOC);


for($i=0,$j=0;$i<count($row),$j<count($row);$i++,$j++){
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
  


  for ($b=0; $b < count($row2); $b++) { 

    
    $un=$row2[$b]['username'];
    $cmm=$row2[$b]['comment'];
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


<form method="post">


<textarea required="" name="comment"placeholder="Write your comment... " style="height: 100px; width: 400px"></textarea><br>

&nbsp &nbsp &nbsp 
&nbsp &nbsp &nbsp 
&nbsp &nbsp &nbsp 
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
<input type="submit" style="width: 100px; height: 35px;" name="<?php echo $i; ?>" value="comment" id="comment" />

</form>

<form method="post">
	&nbsp &nbsp &nbsp 
&nbsp &nbsp &nbsp
&nbsp &nbsp &nbsp 
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
	<input type="submit" style="width: 100px; height: 35px;" name="<?php echo $i; ?>" value="like" id="like" />
</form>

<?php 

if($_POST[$i]=='comment')
    { $flag=1;
      //$c=$row[$i]['content'];
     
     //$w=$row[$i]['writer name'];

          $sub=mysqli_query($db,"SELECT username FROM `comment(user)` where storyname='$n' && username='$_SESSION[login_user]' ;");
          $row2=mysqli_fetch_all($sub,MYSQLI_ASSOC);


          if(count($row2)!=0){
            ?>
           <script type="text/javascript">
           alert("you can not comment more than one time!!");
            window.location="explore.php";
           </script>
   <?php  
          $flag=0;

          }



           $r=mysqli_query($db,"SELECT * FROM user where username='$_SESSION[login_user]';");

           $row1=mysqli_fetch_assoc($r);

           


if($flag!=0){

           mysqli_query($db,"INSERT INTO `comment(user)` VALUES ('$n', '$_SESSION[login_user]','$_POST[comment]');");
            //mysqli_query($db,"INSERT INTO `writinglist` VALUES ('$_POST[name]','$_SESSION[login_user]','$f $l');");


    
    ?>
    <script type="text/javascript">
    alert("comment written!!");
    window.location="explore.php";
   </script>
   <?php

}}
if($_POST[$i]=='like')
    { 
      //$c=$row[$i]['content'];
     
     //$w=$row[$i]['writer name'];

          $sub1=mysqli_query($db,"SELECT username FROM `likes` where storyname='$n' && username='$_SESSION[login_user]' ;");
          $row3=mysqli_fetch_all($sub1,MYSQLI_ASSOC);       
   
         
        $count1=count($row3);   


if($count1==0){

           mysqli_query($db,"INSERT INTO `likes` VALUES ('$n', '$_SESSION[login_user]');");
           mysqli_query($db,"UPDATE `story` SET likes=likes+1 where Name= '$n';");
            //mysqli_query($db,"INSERT INTO `writinglist` VALUES ('$_POST[name]','$_SESSION[login_user]','$f $l');");


    
   

}}}



?>
</section>

</body>
</html>