<?php 
 include "connection.php";
 session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>
		People
	</title>
	<link rel="stylesheet" type="text/css" href="style/people.css">
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
		<h1 style="font-size: 30px; padding-left: 50px"><br><br> People you may Follow !!</h1>
		<br><br>
		<?php
			$q=mysqli_query($db,"SELECT * FROM user where username <> '$_SESSION[login_user]' order by username");
		//$count=mysqli_query($db,"SELECT count(*) FROM writinglist where writerusername='$_SESSION[login_user]';");
 			?>
 			
 			<div style="font-size: 20px; padding-left: 50px">
 			
 			<?php
 				
 				$row=mysqli_fetch_all($q,MYSQLI_ASSOC);
 				//print_r($row);
 			 
 				
 				for($i=0;$i<count($row);$i++){
 					echo $i+1;
 					echo ". ";
 					echo $row[$i]['username'];
 					$n=$row[$i]['username'];
 					
 					?>
 					<br>
 					<script type="text/javascript"> 
               //function change() 
//{
        //         var elem = document.getElementById('submitId');
         //         elem.value = 'following';
                  //
                 // document.getElementById("submit").value="following";
           //       return true;
                  

  //  }
</script>
 					
 					<form method="post" action="">
 						&nbsp &nbsp
 					<input  id="submit" onclick="this.value='following'" type="submit" style="width: 80px; height: 20px;" name="<?php echo $i; ?>" value="Follow"  />
 					</form>


 					
 					


    				<?php

 						if(isset($_POST[$i]))
   				 		{    
   				 			$d=mysqli_query($db,"SELECT * from `follow` where user='$_SESSION[login_user]' && following='$n';");
   				 			$row2=mysqli_fetch_all($d,MYSQLI_ASSOC);




   				 		if(count($row2)==0){
         				
           				mysqli_query($db,"INSERT INTO `follow` VALUES ('$_SESSION[login_user]','$n');");
           			}


    
    				?>
    
	<?php
						}
					
 					
 					
 					echo "<br>";


 				}
	 					


 				
 			?>
 			</div>




	</div>

	
	</section>
	


</body>
</html>