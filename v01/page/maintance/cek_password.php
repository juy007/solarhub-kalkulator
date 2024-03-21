<?php 
session_start();
$pass_maintance = 'xcode404';
$password = $_POST['password'];
if ($pass_maintance == $password) {
	$_SESSION['go'] = "go";
	 header("location:../maintance/setting");
}else{
	 header("location:../maintance/?password=salah");
}

 ?>