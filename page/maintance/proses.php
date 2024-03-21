<?php 
    include 'status_maintance.php';
    session_start();
  
 $proses=$_GET['proses'];
 if ($proses == "logout") {
 	unset($_SESSION['go']);
 	header("location:../");
 }elseif ($proses == "running") {
	$status = $_POST['status'];
 
	$background = "\$background = \"".$background."\";\n";
	$status = "\$fontHeading = \"".$status."\";\n";

	$file = "status_maintance.php";
 
	$arrayRead = file($file);
 
	$arrayRead[7] = $fontSizeParagraf;
	$arrayRead[8] = $alignment;
	 
	// menyimpan kembali isi array yang baru ke file
	$simpan = file_put_contents($file, implode($arrayRead));
 }
 ?>

	