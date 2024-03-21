<?php
	defined("BASEPATH") or exit("No direct access allowed");
    
    $servername = "localhost";
    $database = "kalkulator";
    $username = "root";
    $password = "";

	$conn = mysqli_connect($servername, $username, $password, $database);
	if(mysqli_connect_errno()){
     header("location:page/notification/database");
    }

	$query_lang=mysqli_query($conn,"SELECT * FROM lang WHERE status='true'");
	$lang=mysqli_fetch_array($query_lang);
?>