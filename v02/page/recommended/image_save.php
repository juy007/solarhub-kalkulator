<?php 
define("BASEPATH", dirname(__FILE__));
session_start();
include '../../config/config.php';
if(mysqli_connect_errno()){
     header("location:../notification/database");
}else{
    if (empty($_SESSION['province']) || empty($_SESSION['name_province']) || empty($_SESSION['data_irradiance']) ||empty($_SESSION['electrical_power']) || empty($_SESSION['type']) || empty($_SESSION['avgbill']) ||empty($_SESSION['module_type'])) {
        header("location:../../");
    }
}
if ($_SESSION['calculator_type'] == 'system_size') {
    $iconbut = '1';
}else if ($_SESSION['calculator_type'] == 'budget') {
    $iconbut = '2';
}else if ($_SESSION['calculator_type'] == 'expected_saving') {
    $iconbut = '3';
}
$page_title = "Best Performance | ".ucwords(str_replace("_"," ", $_SESSION['calculator_type']))." | Image";
$icon_menu = "<img src='../../assets/img/icon/".$iconbut.".png' alt='user' class='img-zoom rounded-circle img-thumbnail mb-4'>";
include '../header.php';
?>
    <div class="container-fluid" >
                <div class="row" >
                    <div class="col-md-12">
                        <a href="../recommended" class="btn btn-dark"><i class="fas fa-chevron-circle-left"></i> <?php echo ucwords($lang['back']); ?></a>
                        <a href="<?php echo "Solarhub_Best_Performance_".ucwords($_SESSION['calculator_type']).".png" ?>" download="<?php echo "Solarhub_Best_Performance_".ucwords($_SESSION['calculator_type']).".png" ?>" class="btn btn-dark"><i class="fas fa-download"></i> <?php echo ucwords($lang['download']); ?></a>
                        <div class="card">
                            <?php
                                //unlink('Solarhub_Size_System.png');
                                //Get the base-64 string from data
                                $filteredData=substr($_POST['img_val'], strpos($_POST['img_val'], ",")+1);

                                //Decode the string
                                $unencodedData=base64_decode($filteredData);

                                //Save the image
                                file_put_contents('Solarhub_Best_Performance_'.ucwords($_SESSION['calculator_type']).'.png', $unencodedData);
                            ?>
                            <img src="<?php echo $_POST['img_val']; ?>">
                        </div>
                    </div>
                </div>
    </div>
<?php include '../footer.php'; ?>