<?php 
 	include "connection.php";
  session_start()

?>



<!DOCTYPE html>
<html>
<head>
	<title>
		Author
	</title>
<link rel="stylesheet" type="text/css" href="style/author1.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	

</head>
<body >
	<header>
	

	 <ul>
  <li><a class="active" href="q.php">Home</a></li>
  <li><a href="author1.php">Author</a></li>
  
  <li><a href="about.php">About</a></li>
</ul> 
	</header>
	<section>
		<div class="box1" >
    	
        
      <form name="login" action="" method="post" align="center">
        
        <div class="login" >

          <input type="text" name="username" placeholder="Username" required="" title="username" > <br><br>
          <input type="password" name="password" placeholder="Password" required="" > <br><br>
          <button name="login">Login</button></div>
      </form>
      
  </div>


	</section> 
<?php 
	if(isset($_POST['login'])){


   $count=0;
      $res=mysqli_query($db,"SELECT * FROM `author` WHERE username='$_POST[username]' && password='$_POST[password]';");
      
      
      $row= mysqli_fetch_assoc($res);
      $count=mysqli_num_rows($res);

      if($count==0)
      {
        ?>
              
              <script type="text/javascript">
                alert("The username and password doesn't match.");
              </script> 
              
           
        <?php
      }
      else
      { 
        $_SESSION['login_author']=$_POST['username']


      

        ?>
          <script type="text/javascript">
            window.location="story1.php"
          </script>
        <?php
      }
    }

  ?>



</body>
</html>