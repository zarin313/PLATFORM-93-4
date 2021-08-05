<?php
  include "connection.php";
  session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="style\style2.css">
</head>
<body >
	<header>

<div class="nav">
<ul >
  <li><a class="active" href="q.php">Home</a></li>
  <li><a href="author1.php">Author</a></li>
 
  <li><a href="about.php">About</a></li>
  <li><a href="signup.php">Sign Up</a></li>
</ul>
</div>
</header>
<section>
	
	
    <br> <br><br>
    <div class="box1">
    	<br> <br><br><br><br><br><br><br><br>
        
      <form name="login" action="" method="post" align="right">
        <br><br>
        <div class="login">
          <input type="text" name="username" placeholder="Username" required="" title="username" > <br><br>
          <input type="password" name="password" placeholder="Password" required="" > <br><br>
          <input  type="submit" name="submit" value="login" style="color: black; width: 70px; height: 30px">
      </form>
      <p style="color: white; padding-left: 800px;">
        <br>
        
        New to this website? &nbsp <a style="color: white;" href="signup.php">Sign Up</a>
      </p>
  </div>

</section>

  <?php

  if(isset($_POST['submit']))
  {
    $count=0;
    $res=mysqli_query($db,"SELECT * FROM `user` WHERE username='$_POST[username]' && password='$_POST[password]';");
    $count=mysqli_num_rows($res);
    if($count==0){
      ?>
       <script type="text/javascript">
          alert("username and password does not match");
          </script>
        <?php
    }
    else
    {
      $_SESSION['login_user']=$_POST['username']
      ?>
         <script type="text/javascript">
          window.location="profile.php"
          </script>
      <?php
    }
  }

?>
</body>
</html>