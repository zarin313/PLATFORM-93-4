<?php
  session_start();

  ?>

<!DOCTYPE html>
<html>
<head>
	
	<title>
      Home
		
		
	</title>
<link rel="stylesheet" type="text/css" href="style\q.css">
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

</head> 

<body >
	<header>

<?php 
	if(isset($_SESSION['login_user']  )){
		?>
	<nav>

	 <ul>
  <li><a class="active" href="q.php">Home</a></li>
 
  <li><a href="profile.php">Profile</a></li>
  <li><a href="logout.php">Logout</a></li>

  <li><a href="about.php">About</a></li>
</ul> 
</nav>
<?php

	}
	
	else{
		?>
		<nav>

	 <ul>
  <li><a class="active" href="q.php">Home</a></li>
  <li><a href="author1.php">Author</a></li>
  <li><a href="loginpage.php">Profile</a></li>
  <li><a href="about.php">About</a></li>
	</ul> 
	</nav>
	<?php
}
 ?>

	
	</header>

		
		
	
	<section>
	<p class="lets" > <a href="loginpage.php"> <br><br><br>
		<br> <br><b>	Let's Go<br> Wherever <br>	You Want To<b> </a> </p>
    </section>



 
</body>

</html>