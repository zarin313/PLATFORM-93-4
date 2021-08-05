<?php
  include "connection.php";

?>




<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="style\style4.css">
</head>
<body >
	<header>

<div class="nav">
<ul >
  <li><a class="active" href="q.php">Home</a></li>
  <li><a href="author.php">Author</a></li>
 
  <li><a href="about.php">About</a></li>
</ul>
</div>
</header>
<section>
	
	
    
    <br> <br><br>
    <div class="box1">
      <br> <br><br><br><br>
        
      <form name="signup" action="" method="post" align="right">
        <br><br>
        <div class="signup">
          <input type="text" name="firstname" placeholder="Firstname" required="" title="firstname" > <br><br>
          <input type="text" name="lastname" placeholder="Lastname" required="" title="lastname" > <br><br>
          <input type="text" name="dateofbirth" placeholder="Dateofbirth (YYYY-MM-DD)" required="" title="dateofbirth" > <br><br>
          <input type="text" name="email" placeholder="Email" required="" title="email" > <br><br>
          <input type="text" name="phone" placeholder="Phone" required="" title="phone" > <br><br>
          <input type="text" name="username" placeholder="Username" required="" title="username" > <br><br>
          <input type="password" name="password" placeholder="Password" required="" > <br><br>
          
          <input  type="submit" name="submit" value="Signup" style="color: black; width: 70px; height: 30px">
      </form>
      <p style="color: white; padding-left: 800px;">
        <br>
        
       
      </p>
  </div>

</section>

<?php

    if(isset($_POST['submit']))
    {
      $count=0;
      $sql="SELECT username FROM user";
      $result=mysqli_query($db,$sql);

      while($row=mysqli_fetch_assoc($res))
      {
        if($row['username']==$_POST['username'])
        {
          $count=$count+1;
        }
      }
      if($count==0)

       {
        mysqli_query($db,"INSERT INTO `user`VALUES('$_POST[firstname]', '$_POST[lastname]', '$_POST[dateofbirth]','$_POST[email]','$_POST[phone]', '$_POST[username]', '$_POST[password]');");
    
    ?>
    <script type="text/javascript">
    alert("Signup successfully!!");
    window.location="loginpage.php"
   </script>

    <?php
       }
       else
      {
        ?>
          <script type="text/javascript">
          alert("username already exists");
          </script>
    
        <?php
    }
  }
  ?>

</body>
</html>
