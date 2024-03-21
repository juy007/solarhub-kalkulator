<?php 
define("BASEPATH", dirname(__FILE__));
session_start();
include '../config/config.php';
if($_SESSION['admin'] !="login"){
 header("location:../set");
}
include 'header.php';
?>
<div class="row back-trans">
    <div class="col-lg-10 back-trans" style="margin: auto;">
        <div class="col-lg-6" style="padding-top: 50px;padding-bottom: 180px;">
            <form method="POST" action="process" id="form-calculator">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label text-left example-input2-group1">Language</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="country" id="country">
                            <option id="lang_on" value="<?php echo $lang['country']; ?>"><?php echo ucwords($lang['country']); ?></option>
                            <?php 
                            $query_language= mysqli_query($conn, "SELECT * FROM lang ORDER BY country ASC");
                            while ($value_language=mysqli_fetch_array($query_language)) {
                             ?>
                             <option value="<?php echo $value_language['country']; ?>"><?php echo ucwords($value_language['country']); ?></option>
                         <?php } ?>
                         </select>
                     </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label text-right example-input2-group1"></label>
                    <div class="col-sm-6">
                        <button style="float: right;" id="save_lang" type="button" class="btn btn-primary"><i class="mdi mdi-arrow-right-bold-circle"></i> Save</button>
                 &nbsp;<span id="notif" style="color: #04AF00; float: left;"></span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    
    //export email
    $(document).ready(function(){

        $('#save_lang').click(function(){
            $.ajax({
                type: 'POST',
                url: 'country.php',
                data: 'country='+$('#country').val(),
                success: function(response){
                    document.getElementById("lang_on").innerHTML = (response);
                    document.getElementById('notif').innerHTML = 'Success';
                }
            });
        });
    });
</script>  

<?php 
include 'footer.php';
?>