<?php

 session_start();

 if(isset($_SESSION['login_author'])){
 	unset($_SESSION['login_author']);
 }
 header("location:author1.php")
?>