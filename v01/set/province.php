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
    <div class="col-lg-12">
        <div class="row">
            <div class="table-responsive col-sm-10 back-trans" style="margin: auto;">
                <table class="table mb-0 table-centered col-sm-10" style="margin: auto;">
                    <thead>
                        <tr>
                            <th id="text-th">Province</th>
                            <th id="text-th">Data Irradiance</th>
                            <th id="text-th">URL</th>
                        </tr>
                    </thead>
                           
                    <tbody>
                        <?php 
                            $prov_query=mysqli_query($conn,"SELECT * FROM provinsi ORDER BY nama_provinsi ASC");
                            $prov_value=mysqli_fetch_array($prov_query);
                            foreach ($prov_query as $key => $value) {
                         ?>
                        <tr>
                            <td id="text-tr"><?php echo $value['nama_provinsi']; ?></td>
                            <td id="text-th"><?php echo $value['data_irradiance']; ?></td>
                            <td id="text-tr"><a style="color: #FBB624;" target="_blank" href="<?php echo "https://solarhub.id/location/".$value['link']; ?>"><?php echo "https://solarhub.id/location/".$value['link']; ?></a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table><!--end /table-->
            </div><!--end /tableresponsive-->
        </div><!--end row-->
    </div>
</div>

<script type="text/javascript">
    //export email
    $(document).ready(function(){

        $('#ss').click(function(){
                $.ajax({
                type: 'POST',
                url: 'delete_calculate.php',
                data: 'calculator_type='+'system_size',
                success: function(response){
                    document.getElementById("value_ss").innerHTML = (response);
                    }
                });
        });
        $('#b').click(function(){
                $.ajax({
                type: 'POST',
                url: 'delete_calculate.php',
                data: 'calculator_type='+'budget',
                success: function(response){
                    document.getElementById("value_b").innerHTML = (response);
                    }
                });
        });

        $('#es').click(function(){
                $.ajax({
                type: 'POST',
                url: 'delete_calculate.php',
                data: 'calculator_type='+'expected_saving',
                success: function(response){
                    document.getElementById("value_es").innerHTML = (response);
                    }
                });
        });

    });
</script>  

<script type="text/javascript">
    //export email
    $(document).ready(function(){

        $('#epss').click(function(){
                $.ajax({
                type: 'POST',
                url: 'delete_export.php',
                data: 'calculator_type='+'system_size'+'&export='+'pdf',
                success: function(response){
                    document.getElementById("value_epss").innerHTML = (response);
                    }
                });
        });
         $('#eiss').click(function(){
                $.ajax({
                type: 'POST',
                url: 'delete_export.php',
                data: 'calculator_type='+'system_size'+'&export='+'image',
                success: function(response){
                    document.getElementById("value_eiss").innerHTML = (response);
                    }
                });
        });
          $('#eess').click(function(){
                $.ajax({
                type: 'POST',
                url: 'delete_export.php',
                data: 'calculator_type='+'system_size'+'&export='+'email',
                success: function(response){
                    document.getElementById("value_eess").innerHTML = (response);
                    }
                });
        });
           $('#emss').click(function(){
                $.ajax({
                type: 'POST',
                url: 'delete_export.php',
                data: 'calculator_type='+'system_size'+'&export='+'map',
                success: function(response){
                    document.getElementById("value_emss").innerHTML = (response);
                    }
                });
        });

    //___________________________________________________________________________________
        $('#epb').click(function(){
                $.ajax({
                type: 'POST',
                url: 'delete_export.php',
                data: 'calculator_type='+'budget'+'&export='+'pdf',
                success: function(response){
                    document.getElementById("value_epb").innerHTML = (response);
                    }
                });
        });

        $('#eib').click(function(){
                $.ajax({
                type: 'POST',
                url: 'delete_export.php',
                data: 'calculator_type='+'budget'+'&export='+'image',
                success: function(response){
                    document.getElementById("value_eib").innerHTML = (response);
                    }
                });
        });

        $('#eeb').click(function(){
                $.ajax({
                type: 'POST',
                url: 'delete_export.php',
                data: 'calculator_type='+'budget'+'&export='+'email',
                success: function(response){
                    document.getElementById("value_eeb").innerHTML = (response);
                    }
                });
        });

        $('#emb').click(function(){
                $.ajax({
                type: 'POST',
                url: 'delete_export.php',
                data: 'calculator_type='+'budget'+'&export='+'map',
                success: function(response){
                    document.getElementById("value_emb").innerHTML = (response);
                    }
                });
        });
    //___________________________________________________________________________________
        $('#epes').click(function(){
                $.ajax({
                type: 'POST',
                 url: 'delete_export.php',
                data: 'calculator_type='+'expected_saving'+'&export='+'pdf',
                success: function(response){
                    document.getElementById("value_epes").innerHTML = (response);
                    }
                });
        });

        $('#eies').click(function(){
                $.ajax({
                type: 'POST',
                 url: 'delete_export.php',
                data: 'calculator_type='+'expected_saving'+'&export='+'image',
                success: function(response){
                    document.getElementById("value_eies").innerHTML = (response);
                    }
                });
        });

        $('#eees').click(function(){
                $.ajax({
                type: 'POST',
                 url: 'delete_export.php',
                data: 'calculator_type='+'expected_saving'+'&export='+'email',
                success: function(response){
                    document.getElementById("value_eees").innerHTML = (response);
                    }
                });
        });

        $('#emes').click(function(){
                $.ajax({
                type: 'POST',
                 url: 'delete_export.php',
                data: 'calculator_type='+'expected_saving'+'&export='+'map',
                success: function(response){
                    document.getElementById("value_emes").innerHTML = (response);
                    }
                });
        });

    });
</script>  
<?php 
include 'footer.php';
?>