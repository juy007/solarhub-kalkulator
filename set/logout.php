<?php 
	session_start();
	unset($_SESSION['admin']);
	unset($_SESSION['password']);

	header("location:../set");
 ?>