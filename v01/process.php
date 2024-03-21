<?php 
 define("BASEPATH", dirname(__FILE__));
    session_start();
    include 'config/config.php';
//status rekomendesai
$_SESSION['calculator_type'] = $_POST['calculator_type'];
$_SESSION['status_recommended'] = $_POST['status_recommended'];
//end status rekomendesai
if ($_SESSION['status_recommended'] == 'true') {
	//rekomendasi
	$_SESSION['name_province'] = $_POST['name_province_recommended'];
	$prov_query = mysqli_query($conn,"SELECT * FROM provinsi WHERE nama_provinsi='$_POST[name_province_recommended]'");
	$prov_value=mysqli_fetch_array($prov_query);

	$_SESSION['province'] = $prov_value['id_provinsi'];
	$_SESSION['link_province'] = $prov_value['link'];

	$_SESSION['data_irradiance'] = $_POST['data_irradiance_recommended'];
	$_SESSION['electrical_power'] = $_POST['electrical_power_recommended'];
	$_SESSION['type'] = $_POST['type_recommended'];
	$_SESSION['avgbillidr'] = $_POST['avgbill_recommended'];
	$_SESSION['avgbill'] = str_replace('.', '', $_POST['avgbill_recommended']);
	$_SESSION['module_type'] = $_POST['module_type_recommended'];
	//end rekomendasi
}else if ($_SESSION['status_recommended'] == 'false'){
	//bukan rekomendasi
	$_SESSION['province'] = $_POST['province'];
	$_SESSION['name_province'] = $_POST['name_province'];
	$_SESSION['link_province'] = $_POST['link_province'];
	$_SESSION['data_irradiance'] = $_POST['data_irradiance'];
	$_SESSION['electrical_power'] = $_POST['electrical_power'];
	$_SESSION['type'] = $_POST['type'];
	$_SESSION['avgbillidr'] = $_POST['avgbill'];
	$_SESSION['avgbill'] = str_replace('.', '', $_POST['avgbill']);
	$_SESSION['module_type'] = $_POST['module_type'];
	$_SESSION['form_page'] = $_POST['form_page'];
	//end bukan rekomendasi
}

$date = date("d/m/Y");
if ($_POST['calculator_type'] == 'system_size') {
	if ($_SESSION['status_recommended'] == 'true') {
		mysqli_query($conn,"INSERT INTO calculate VALUES('','$prov_value[id_provinsi]','system_size','$date')");
		$_SESSION['form_page'] = $_POST['form_page_recommended'];
		header("location:page/recommended");
	}else if ($_SESSION['status_recommended'] == 'false'){
		header("location:page/system_size");
	}
}elseif ($_POST['calculator_type'] == 'budget') {
	if ($_SESSION['status_recommended'] == 'true') {
		mysqli_query($conn,"INSERT INTO calculate VALUES('','$prov_value[id_provinsi]','budget','$date')");
		$_SESSION['form_page'] = $_POST['form_page_recommended'];
		header("location:page/recommended");
	}else if ($_SESSION['status_recommended'] == 'false'){
	 	header("location:page/budget");
	}
}elseif ($_POST['calculator_type'] == 'expected_saving') {
	if ($_SESSION['status_recommended'] == 'true') {
		mysqli_query($conn,"INSERT INTO calculate VALUES('','$prov_value[id_provinsi]','expected_saving','$date')");
		$_SESSION['form_page'] = $_POST['form_page_recommended']/100;
		header("location:page/recommended");
	}else if ($_SESSION['status_recommended'] == 'false'){
		 header("location:page/expected_saving");
	}
}
 ?>