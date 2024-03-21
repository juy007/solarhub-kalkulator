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
$page_title = "Budget | ". $lang['export_image'];
$icon_menu = "<img width=70 src='../../assets/img/icon/2.png' alt='user' class='rounded-circle img-thumbnail mb-4'>";
include '../header.php';
?>
    <div class="container-fluid" >
                <div class="row" >
                    <div class="col-md-12">
                        <a href="../budget" class="btn btn-dark"><i class="fas fa-chevron-circle-left"></i> Kembali</a>
                        <a href="Solarhub_Budget.png" download="Solarhub_Budget" class="btn btn-dark"><i class="fas fa-download"></i> Download</a>
                        <div class="card">
                            <?php
                                //unlink('Solarhub_Size_System.png');
                                //Get the base-64 string from data
                                $filteredData=substr($_POST['img_val'], strpos($_POST['img_val'], ",")+1);

                                //Decode the string
                                $unencodedData=base64_decode($filteredData);

                                //Save the image
                                file_put_contents('Solarhub_Budget.png', $unencodedData);
                            ?>
                            <img src="<?php echo $_POST['img_val']; ?>">
                        </div>
                    </div>
                </div>
    </div>
<?php include '../footer.php'; ?>