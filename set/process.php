<?php 
define("BASEPATH", dirname(__FILE__));
session_start();
include '../config/config.php';
$password = sha1($_POST['password']);

	$login = mysqli_query($conn,"SELECT * FROM admin WHERE password='$password'");
	$cek = mysqli_num_rows($login);

	if($cek > 0){
		session_start();
		$data=mysqli_fetch_array($login);
		$_SESSION['password'] = $password;
		$_SESSION['admin'] = "login";

		header("location:dashboard");
	}else{
		header("location:../set/?notif=gagal");	
	}
 ?>