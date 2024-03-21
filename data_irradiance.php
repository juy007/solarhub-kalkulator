<?php 
 define("BASEPATH", dirname(__FILE__));
include 'config/config.php';

$id_prov =$_POST['id_prov'];

$prov_query = mysqli_query($conn,"SELECT * FROM provinsi WHERE id_provinsi='$id_prov'");
$prov_value=mysqli_fetch_array($prov_query);

echo $prov_value['data_irradiance'];
?>