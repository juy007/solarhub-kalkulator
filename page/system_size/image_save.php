<style type="text/css">
    #share-sossial-buttons img {
width: 35px;
padding: 5px;
border: 0;
box-shadow: 0;
display: inline;
}<span id="mce_marker" data-mce-type="bookmark" data-mce-fragment="1">​</span>
</style>

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
$page_title = $lang['system_size']." | ". $lang['export_image'];
$icon_menu = "<img src='../../assets/img/icon/1.png' alt='user' class='img-zoom rounded-circle img-thumbnail mb-4'>";
include '../header.php';
?>
    <div class="container-fluid" >
                <div class="row" >
                    <div class="col-md-12">
                        <a href="../system_size" class="btn btn-dark"><i class="fas fa-chevron-circle-left"></i> <?php echo ucwords($lang['back']); ?></a>
                        <a href="<?php echo 'Solarhub '.$lang['system_size'].'.png'; ?>" download="<?php echo 'Solarhub '.$lang['system_size'].'.png'; ?>" class="btn btn-dark"><i class="fas fa-download"></i> <?php echo ucwords($lang['download']); ?></a> 
                        

                    <!--    <a href="http://www.facebook.com/sharer.php?u=https://kalkulator.solarhub.id/page/system_size/Solarhub Ukuran Sistem.png" target="_blank"><img width="30" src="../../assets/img/icon/fb.png"></a>

                        <a href="https://twitter.com/share?url=https://kalkulator.solarhub.id/page/system_size/Solarhub Ukuran Sistem.png" target="_blank"><img width="30" src="../../assets/img/icon/tw.png"></a>

                         <a href="https://twitter.com/share?url=https://kalkulator.solarhub.id/page/system_size/Solarhub Ukuran Sistem.png" target="_blank"><img width="30" src="../../assets/img/icon/ig.png"></a>

                          <a href="https://twitter.com/share?url=https://kalkulator.solarhub.id/page/system_size/Solarhub Ukuran Sistem.png" target="_blank"><img width="30" src="../../assets/img/icon/wa.png"></a>-->
    
                        <div class="card">
                            <?php
                                //unlink('Solarhub '.$lang['system_size'].'.png');
                                //Get the base-64 string from data
                                $filteredData=substr($_POST['img_val'], strpos($_POST['img_val'], ",")+1);

                                //Decode the string
                                $unencodedData=base64_decode($filteredData);

                                //Save the image
                                file_put_contents('Solarhub '.$lang['system_size'].'.png', $unencodedData);
                            ?>
                            <img src="<?php echo $_POST['img_val']; ?>">
                            
                            <!--  <a href="https://api.whatsapp.com/send?text=<?php base64_decode($_POST['img_val']); ?>" data-action="share/whatsapp/share" target="_blank">Bagikan ke WhatsApp</a>

                              <a href="https://api.whatsapp.com/send?text=https://www.google.co.in/search?q=google+images&source=lnms&tbm=isch&sa=X&ved=0ahUKEwiQprLgy_7eAhULWysKHUb_A4MQ_AUIDigB&biw=1280&bih=622#imgrc=4rCznFK24LPiKM: " data-action="share/whatsapp/share"><i class="fa fa-whatsapp"></i> aaa  </a>-->

                        </div>
                    </div>
                </div>
    </div>
<?php include '../footer.php'; ?>
