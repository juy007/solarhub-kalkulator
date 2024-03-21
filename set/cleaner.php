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
                <table class="table mb-0 table-centered">
                    <thead>
                        <tr>
                            <th></th>
                            <th id="text-th">Calculate</th>
                            <th id="text-th">Export PDF</th>
                            <th id="text-th">Export Image</th>
                            <th id="text-th">Export Send To E-mail</th>
                            <th id="text-th">Export Go To map</th>
                            <th></th>
                        </tr>
                    </thead>
                            <?php 
                                //system_size
                                $query_css =mysqli_query($conn, "SELECT COUNT(*) AS calculate_ss FROM calculate WHERE calculator_type='system_size'");
                                $value_css =mysqli_fetch_array($query_css);

                                $query_epss =mysqli_query($conn, "SELECT COUNT(*) AS calculate_epss FROM export_amount WHERE calculator_type='system_size' AND export_type='pdf'");
                                $value_epss =mysqli_fetch_array($query_epss);

                                $query_eiss =mysqli_query($conn, "SELECT COUNT(*) AS calculate_eiss FROM export_amount WHERE calculator_type='system_size' AND export_type='image'");
                                $value_eiss =mysqli_fetch_array($query_eiss);

                                $query_eess =mysqli_query($conn, "SELECT COUNT(*) AS calculate_eess FROM export_amount WHERE calculator_type='system_size' AND export_type='email'");
                                $value_eess =mysqli_fetch_array($query_eess);

                                $query_emss =mysqli_query($conn, "SELECT COUNT(*) AS calculate_emss FROM export_amount WHERE calculator_type='system_size' AND export_type='map'");
                                $value_emss =mysqli_fetch_array($query_emss);
                                //________________________________________________________________________

                                 //Budget
                                $query_cb =mysqli_query($conn, "SELECT COUNT(*) AS calculate_b FROM calculate WHERE calculator_type='budget'");
                                $value_cb =mysqli_fetch_array($query_cb);

                                $query_epb =mysqli_query($conn, "SELECT COUNT(*) AS calculate_epb FROM export_amount WHERE calculator_type='budget' AND export_type='pdf'");
                                $value_epb =mysqli_fetch_array($query_epb);

                                $query_eib =mysqli_query($conn, "SELECT COUNT(*) AS calculate_eib FROM export_amount WHERE calculator_type='budget' AND export_type='image'");
                                $value_eib =mysqli_fetch_array($query_eib);

                                $query_eeb =mysqli_query($conn, "SELECT COUNT(*) AS calculate_eeb FROM export_amount WHERE calculator_type='budget' AND export_type='email'");
                                $value_eeb =mysqli_fetch_array($query_eeb);

                                $query_emb =mysqli_query($conn, "SELECT COUNT(*) AS calculate_emb FROM export_amount WHERE calculator_type='budget' AND export_type='map'");
                                $value_emb =mysqli_fetch_array($query_emb);
                                //________________________________________________________________________

                                //expecteed saving
                                $query_ces =mysqli_query($conn, "SELECT COUNT(*) AS calculate_es FROM calculate WHERE calculator_type='expected_saving'");
                                $value_ces =mysqli_fetch_array($query_ces);

                                $query_epes =mysqli_query($conn, "SELECT COUNT(*) AS calculate_epes FROM export_amount WHERE calculator_type='expected_saving' AND export_type='pdf'");
                                $value_epes =mysqli_fetch_array($query_epes);

                                $query_eies =mysqli_query($conn, "SELECT COUNT(*) AS calculate_eies FROM export_amount WHERE calculator_type='expected_saving' AND export_type='image'");
                                $value_eies =mysqli_fetch_array($query_eies);

                                $query_eees =mysqli_query($conn, "SELECT COUNT(*) AS calculate_eees FROM export_amount WHERE calculator_type='expected_saving' AND export_type='email'");
                                $value_eees =mysqli_fetch_array($query_eees);

                                $query_emes =mysqli_query($conn, "SELECT COUNT(*) AS calculate_emes FROM export_amount WHERE calculator_type='expected_saving' AND export_type='map'");
                                $value_emes =mysqli_fetch_array($query_emes);
                                //________________________________________________________________________

                                //best performance
                                $query_cbp =mysqli_query($conn, "SELECT COUNT(*) AS calculate_bp FROM calculate WHERE calculator_type='best_performance'");
                                $value_cbp =mysqli_fetch_array($query_cbp);

                                $query_epbp =mysqli_query($conn, "SELECT COUNT(*) AS calculate_epbp FROM export_amount WHERE calculator_type='best_performance' AND export_type='pdf'");
                                $value_epbp =mysqli_fetch_array($query_epbp);

                                $query_eibp =mysqli_query($conn, "SELECT COUNT(*) AS calculate_eibp FROM export_amount WHERE calculator_type='best_performance' AND export_type='image'");
                                $value_eibp =mysqli_fetch_array($query_eibp);

                                $query_eebp =mysqli_query($conn, "SELECT COUNT(*) AS calculate_eebp FROM export_amount WHERE calculator_type='best_performance' AND export_type='email'");
                                $value_eebp =mysqli_fetch_array($query_eebp);

                                $query_embp =mysqli_query($conn, "SELECT COUNT(*) AS calculate_embp FROM export_amount WHERE calculator_type='best_performance' AND export_type='map'");
                                $value_embp =mysqli_fetch_array($query_embp);
                            ?>
                    <tbody>
                        <tr>
                            <td style="color: #fff;"><img src="../assets/img/icon/1.png" alt="" class="img-zoom rounded-circle img-thumbnail mb-4">
                                System Size
                            </td>
                            <td id="text-th"><span id="value_ss"><?php echo $value_css['calculate_ss']; ?></span><br><button id="ss" class="btn btn-danger btn-xs">Clear</button></td>

                            <td id="text-th"><span id="value_epss"><?php echo $value_epss['calculate_epss']; ?></span><br><button id="epss" class="btn btn-danger btn-xs">Clear</button></td>

                            <td id="text-th"><span id="value_eiss"><?php echo $value_eiss['calculate_eiss']; ?></span><br><button id="eiss" class="btn btn-danger btn-xs">Clear</button></td>

                            <td id="text-th"><span id="value_eess"><?php echo $value_eess['calculate_eess']; ?></span><br><button id="eess" class="btn btn-danger btn-xs">Clear</button></td>

                            <td id="text-th"><span id="value_emss"><?php echo $value_emss['calculate_emss']; ?></span><br><button id="emss" class="btn btn-danger btn-xs">Clear</button></td>

                            <td id="text-th"><a href="delete_all?calculator_type=system_size" id="ssall" class="btn btn-danger">Clear All</a></td>
                        </tr>
                        <tr>
                            <td style="color: #fff;"><img src="../assets/img/icon/2.png" alt="" class="img-zoom rounded-circle img-thumbnail mb-4">
                                Budget
                            </td>
                            <td id="text-th"><span id="value_b"><?php echo $value_cb['calculate_b']; ?></span><br><button id="b" class="btn btn-danger btn-xs">Clear</button></td>

                            <td id="text-th"><span id="value_epb"><?php echo $value_epb['calculate_epb']; ?></span><br><button id="epb" class="btn btn-danger btn-xs">Clear</button></td>

                            <td id="text-th"><span id="value_eib"><?php echo $value_eib['calculate_eib']; ?></span><br><button id="eib" class="btn btn-danger btn-xs">Clear</button></td>

                            <td id="text-th"><span id="value_eeb"><?php echo $value_eeb['calculate_eeb']; ?></span><br><button id="eeb" class="btn btn-danger btn-xs">Clear</button></td>

                            <td id="text-th"><span id="value_emb"><?php echo $value_emb['calculate_emb']; ?></span><br><button id="emb" class="btn btn-danger btn-xs">Clear</button></td>

                            <td id="text-th"><a href="delete_all?calculator_type=budget" id="ball" class="btn btn-danger">Clear All</a></td>
                        </tr>
                        <tr>
                            <td style="color: #fff;"><img src="../assets/img/icon/3.png" alt="" class="img-zoom rounded-circle img-thumbnail mb-4">
                                Expected Saving
                            </td>
                            <td id="text-th"><span id="value_es"><?php echo $value_ces['calculate_es']; ?></span><br><button id="es" class="btn btn-danger btn-xs">Clear</button></td>

                            <td id="text-th"><span id="value_epes"><?php echo $value_epes['calculate_epes']; ?></span><br><button id="epes" class="btn btn-danger btn-xs">Clear</button></td>

                            <td id="text-th"><span id="value_eies"><?php echo $value_eies['calculate_eies']; ?></span><br><button id="eies" class="btn btn-danger btn-xs">Clear</button></td>

                            <td id="text-th"><span id="value_eees"><?php echo $value_eees['calculate_eees']; ?></span><br><button id="eees" class="btn btn-danger btn-xs">Clear</button></td>

                            <td id="text-th"><span id="value_emes"><?php echo $value_emes['calculate_emes']; ?></span><br><button id="emes" class="btn btn-danger btn-xs">Clear</button></td>

                            <td id="text-th"><a href="delete_all?calculator_type=expected_saving" id="esall" class="btn btn-danger">Clear All</a></td>
                        </tr>
                        <tr>
                            <td style="color: #fff;"><img src="../assets/img/icon/3.png" alt="" class="img-zoom rounded-circle img-thumbnail mb-4">
                                Best Performance
                            </td>
                            <td id="text-th"><span id="value_bp"><?php echo $value_cbp['calculate_bp']; ?></span><br><button id="bp" class="btn btn-danger btn-xs">Clear</button></td>

                            <td id="text-th"><span id="value_epbp"><?php echo $value_epbp['calculate_epbp']; ?></span><br><button id="epbp" class="btn btn-danger btn-xs">Clear</button></td>

                            <td id="text-th"><span id="value_eibp"><?php echo $value_eibp['calculate_eibp']; ?></span><br><button id="eibp" class="btn btn-danger btn-xs">Clear</button></td>

                            <td id="text-th"><span id="value_eebp"><?php echo $value_eebp['calculate_eebp']; ?></span><br><button id="eebp" class="btn btn-danger btn-xs">Clear</button></td>

                            <td id="text-th"><span id="value_embp"><?php echo $value_embp['calculate_embp']; ?></span><br><button id="embp" class="btn btn-danger btn-xs">Clear</button></td>

                            <td id="text-th"><a href="delete_all?calculator_type=best_performance" id="bpall" class="btn btn-danger">Clear All</a></td>
                        </tr>
                     
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

         $('#bp').click(function(){
                $.ajax({
                type: 'POST',
                url: 'delete_calculate.php',
                data: 'calculator_type='+'best_performance',
                success: function(response){
                    document.getElementById("value_bp").innerHTML = (response);
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
    //___________________________________________________________________________
    $('#epbp').click(function(){
                $.ajax({
                type: 'POST',
                url: 'delete_export.php',
                data: 'calculator_type='+'best_performance'+'&export='+'pdf',
                success: function(response){
                    document.getElementById("value_epbp").innerHTML = (response);
                    }
                });
        });
         $('#eibp').click(function(){
                $.ajax({
                type: 'POST',
                url: 'delete_export.php',
                data: 'calculator_type='+'best_performance'+'&export='+'image',
                success: function(response){
                    document.getElementById("value_eibp").innerHTML = (response);
                    }
                });
        });
          $('#eebp').click(function(){
                $.ajax({
                type: 'POST',
                url: 'delete_export.php',
                data: 'calculator_type='+'best_performance'+'&export='+'email',
                success: function(response){
                    document.getElementById("value_eebp").innerHTML = (response);
                    }
                });
        });
           $('#embp').click(function(){
                $.ajax({
                type: 'POST',
                url: 'delete_export.php',
                data: 'calculator_type='+'best_performance'+'&export='+'map',
                success: function(response){
                    document.getElementById("value_embp").innerHTML = (response);
                    }
                });
        });

    //___________________________________________________________________________________

    });
</script>  
<?php 
include 'footer.php';
?>