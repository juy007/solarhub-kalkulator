<?php 
    define("BASEPATH", dirname(__FILE__));
    session_start();
    unset($_SESSION['province']); unset($_SESSION['name_province']); unset($_SESSION['link_province']); unset($_SESSION['data_irradiance']); unset($_SESSION['electrical_power']); unset($_SESSION['type']); unset($_SESSION['avgbill']); unset($_SESSION['module_type']); unset($_SESSION['form_page']);

    include 'config/config.php';
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Solarhub Indonesia | <?php echo ucwords(strtolower($lang['calculator'])); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta charset="UTF-8"/>
        <meta name="description" content="kalkulator Solarhub Indonesia"/>
        <meta name="keywords" content="kalkulator, Solarhub Indonesia"/>
        <meta name="author" content="Solarhub Indonesia"/>
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/img/Picture2.png">
        <link href="assets/index/plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">
        <!-- App css -->
        <link href="assets/page/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/page/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/index/css/style.css" rel="stylesheet" type="text/css" />

        <script src="assets/page/js/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

        <style type="text/css">
             body{
                background-image: url(assets/img/background5.png);
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size:cover;
                background-position:center;"
            }
            #iconform{
                background-color: #275798;
                border-radius: 100%;
                height: 24px;
                width: 24px; 
                margin-top:auto;
                margin-bottom: auto;
                margin-left: 3px;
            }
            #texticonform{
                font-size: 13px;
                font-weight: bold;
                color: #fff;
                margin-left: -4px;
                margin-top: -1px;

            }
            .satuanForm{
                font-size: 13px;
                background-color: #275798;
                color: #FFF;
            }
            .example-input2-group1{
                color: #fff;
            }
            @media (min-width: 360px) {
                .form-line-sm {
                    width: 100%;
                }
            }

            @media (min-width: 768px) {
                .form-line-md {
                    width: 80%;
                }
            }

            @media (min-width: 992px) {
                .col-md-table {
                    width: 80%;
                }
            }

            @media (min-width: 1200px) {
                .col-lg-table {
                    width: 80%;
                    margin-left: 6px;
                }
            }
        </style>
    </head>
    <body>
        <div class="page-wrapper">
            <div class="page-content">
                <div class="container-fluid"> 
                    <div class="row">
                    </div>
                </div>
            </div>
            <!-- Page Content-->
            <div class="page-content">
                <div class="container-fluid"> 
                    <div class="row">
                        <div class="col-lg-3">
                        </div><!--end col-->
                        <div class="col-lg-6" style="background-color:rgba(0, 0, 0, 0.6);"><br>
                            <div class="row col-lg-11 text-center" style="margin-right: auto;margin-left: auto;">
                                <div class="col-md-6" style="background-color: #fff; padding-top: 3px;">
                                    <a href="https://solarhub.id" target="_blank"><img width="180" src="assets/img/solarlab-logo2.png"></a>
                                </div><!--end col-->
                                <div class="col-md-6" style="background-color: #275798; padding-top: 3px;">
                                    <h3 style="color: #FFF;font-weight: bold;font-size: 18px;"><i class="mdi mdi-calculator"></i><?php echo $lang['calculator']; ?></h3>
                                </div>
                            </div>
                            <hr style="background-color: #fff;" class="form-line-md form-line-sm">
                            <form method="POST" action="process" id="form-calculator">
                                <div class="form-group row">
                                    <label for="" class="example-input2-group1 col-sm-1"></label>
                                    <label for="" class="example-input2-group1 col-sm-3"><!--Detect Location--><?php echo $lang['detect_location']; ?></label>
                                    <div class="input-group col-sm-7">
                                        <select class="form-control" name="province" id="province">
                                            <option value="" id="province_html"><!--Select Location--><?php echo $lang['select_location']; ?></option>
                                            <?php 
                                            $prov_query=mysqli_query($conn,"SELECT * FROM provinsi ORDER BY nama_provinsi ASC");
                                            $prov_value=mysqli_fetch_array($prov_query);
                                            foreach ($prov_query as $key => $value) {
                                                ?>
                                                <option value="<?php echo $value['id_provinsi']; ?>"><?php echo $value['nama_provinsi'] ?></option>
                                            <?php } ?>
                                        </select>
                                        <input type="hidden" name="name_province" id="name_province" readonly="readonly" class="form-control">
                                        <input type="hidden" name="link_province" id="link_province" readonly="readonly" class="form-control">
                                        <div class="input-group-append">
                                            <button type="button" class="input-group-text" id="iconform" data-container="body" data-toggle="popover" data-placement="right" data-content="<?php echo $lang['float_location']; ?>"><i id="texticonform">?</i></button>
                                        </div>
                                    </div>   
                                </div>
                                <div class="form-group row">
                                    <label for="" class="example-input2-group1 col-sm-1"></label>
                                    <label for="example-input2-group1" class="example-input2-group1 col-sm-3"><!--Solar PV Output--><?php echo $lang['solar_pv_output']; ?></label>
                                    <div class="input-group col-sm-7">
                                        <input style="background-color: #FFFFFF;" type="text" name="data_irradiance" id="data_irradiance" class="form-control" readonly="readonly">
                                        <div class="input-group-append">
                                            <span style="margin-right: 28px;" class="input-group-text satuanForm" id=""><i class="">kWh/kWp</i></span>
                                         </div>
                                    </div>   
                                </div>
                                <div class="form-group row">
                                    <label for="" class="example-input2-group1 col-sm-1"></label>
                                    <label for="example-input2-group1" class="example-input2-group1 col-sm-3"><!--Electrical Power--><?php echo $lang['electrical_power']; ?></label>
                                    <div class="input-group col-sm-7">
                                        <select class="form-control" name="electrical_power" id="electrical_power">
                                            <option value=""><!--Select Electrical Power--><?php echo $lang['select_electrical_power']; ?></option>
                                            <?php 
                                            $electrical_power_query=mysqli_query($conn,"SELECT * FROM electrical_power ORDER BY id_electrical_power ASC");
                                            foreach ($electrical_power_query as $key => $electrical_power_value) {
                                                ?>
                                                <option value="<?php echo $electrical_power_value['tegangan']; ?>"><?php echo $electrical_power_value['tegangan'] ?></option>
                                            <?php } ?>
                                        </select>
                                        <div class="input-group-append" style="height: 39px;">
                                             <button type="button" class="input-group-text" id="iconform" data-container="body" data-toggle="popover" data-placement="right" data-content="<?php echo $lang['float_electrical_power']; ?>"><i id="texticonform">?</i></button>
                                        </div>
                                    </div>
                                    <br><br>
                                    <label for="example-input2-group1" class="example-input2-group1 col-sm-4"></label>
                                    <div class="input-group col-sm-7">
                                        <input type="text" placeholder="<?php echo $lang['type']; ?>" id="type" name="type" class="form-control" onkeypress="return hanyaAngka(event)">
                                        <div class="input-group-append">
                                            <span class="input-group-text satuanForm" id=""><i class="">VA</i></span>
                                            <button type="button" class="input-group-text" id="iconform" data-container="body" data-toggle="popover" data-placement="right" data-content="<?php echo $lang['float_type']; ?>"><i id="texticonform">?</i>
                                            </button>
                                        </div>
                                    </div>    
                                </div>
                                <div class="form-group row">
                                    <label for="" class="example-input2-group1 col-sm-1"></label>
                                    <label for="example-input2-group1" class="example-input2-group1 col-sm-3"><!--Avg. bill (monthly)--><?php echo $lang['avg_bill']; ?></label>
                                    <div class="input-group col-sm-7">
                                        <input type="text" id="avgbill" name="avgbill" class="form-control">
                                        <div class="input-group-append" style="height: 39px;">
                                            <span class="input-group-text satuanForm" id=""><i class="">IDR</i></span>
                                            <button type="button" class="input-group-text" id="iconform" data-container="body" data-toggle="popover" data-placement="right" data-content="<?php echo $lang['float_avg_bill']; ?>"><i id="texticonform">?</i></button>
                                        </div>
                                    </div>   
                                    <div class="modal fade form_email" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="notif_avg_bill">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <p style="font-size: 17px;color: #000;"><?php echo $lang['notif_avg_bill']; ?>&nbsp;<span id="xc"></span></p><hr>
                                                    <button style="float: right;" type="button" class="btn btn-dark" onclick="CloseModalNotifAvrBill()"> <i class="mdi mdi-close-circle"></i> <!--Decline--><?php echo $lang['close']; ?></button>

                                                    <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>-->      
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                </div>
                                <div class="form-group row">
                                    <label for="" class="example-input2-group1 col-sm-1"></label>
                                    <label for="example-input2-group1" class="example-input2-group1 col-sm-3"><!--Modul Type--><?php echo $lang['modul_type']; ?></label>
                                    <div class="input-group col-sm-7">
                                        <select class="form-control" name="module_type" id="module_type">
                                            <option value=""><!--Select Modul Type--><?php echo $lang['select_modul_type']; ?></option>
                                            <?php 
                                            $solar_module_capacity_query=mysqli_query($conn,"SELECT * FROM solar_module_capacity ORDER BY id_solar_module_capacity ASC");
                                            foreach ($solar_module_capacity_query as $key => $solar_module_capacity_value) {
                                                ?>
                                                <option value="<?php echo  $solar_module_capacity_value['angka']; ?>"><?php echo  $solar_module_capacity_value['angka'] ?></option>
                                            <?php } ?>
                                        </select>
                                        <input type="hidden" name="form_page" id="form_page" value="0">
                                        <div class="input-group-append">
                                            <span class="input-group-text satuanForm" id=""><i class="">Wp</i></span>
                                            <button type="button" class="input-group-text" id="iconform" data-container="body" data-toggle="popover" data-placement="right" data-content="<?php echo $lang['float_modul_type']; ?>"><i id="texticonform">?</i></button>
                                        </div>
                                    </div>   
                                </div>
                                <div class="form-group row">
                                    <label for="" class="example-input2-group1 col-sm-1"></label>
                                    <label for="example-input2-group1" class="example-input2-group1 col-sm-3"><!--Calculator Type--><?php echo $lang['calculator_type']; ?></label>
                                    <div class="input-group col-sm-7">
                                        <select class="form-control" name="calculator_type" id="calculator_type">
                                            <option value=""><!--Select Calculator Type--><?php echo $lang['select_calculator_type']; ?></option>
                                            <option value="system_size"><?php echo $lang['system_size']; ?></option>
                                            <option value="budget"><?php echo $lang['budget']; ?></option>
                                            <option value="expected_saving"><?php echo $lang['expected_saving']; ?></option>
                                             <option value="recommended"><?php echo $lang['recommended']; ?></option>
                                        </select>
                                        <div class="input-group-append col-sm-1" id="btnRecommendedI1">
                                            
                                        </div>
                                        <div class="input-group-append" id="btnRecommendedI2">
                                            <button type="button" class="input-group-text" id="iconform" data-container="body" data-toggle="popover" data-placement="right" data-content="<?php echo $lang['pop_up_recommended']; ?>"><i id="texticonform">?</i></button>
                                        </div>
                                    </div>
                                    <label for="example-input2-group1" class="example-input2-group1 col-sm-4"></label>
                                    <div class="input-group col-sm-7">

                                    </div>     
                                </div>
                                <div class="form-group row">
                                    <label for="" class="example-input2-group1 col-sm-1"></label>
                                    <label for="example-input2-group1" class="example-input2-group1 col-sm-3"></label>
                                    <div class="input-group col-sm-7">
                                        <button style="background-color: #275798; width: 93%; border: 1px solid #fff; color: #fff;" id="btnContinue" type="button" class="btn btn-block  waves-effect waves-light"><i class="mdi mdi-arrow-right-bold-circle"></i> Continue</button>
                                        <div class="input-group-append">
                                                 
                                        </div>
                                    </div>   
                                </div>
                                <div class="form-group row">
                                    <label for="example-input2-group1" class="example-input2-group1 col-sm-4"></label>
                                    <div class="input-group col-sm-7">
                                        <span class="badge badge-danger" style="font-size: 15px;width: 93%;" id="notif"></span>
                                        <div class="input-group-append">
                                                 
                                        </div>
                                    </div>   
                                </div>
                            </form>
                            <footer class="footer text-center" style="color:#fff;">
                                Copyright &copy; <?php echo date('Y'); ?> Solar Hub Indonesia
                            </footer>
                        </div><!--end col-->
                        <div class="col-lg-3">
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!-- container -->
            </div>
            <!-- end page content -->
        </div>
        <!-- end page-wrapper -->

<?php 
    $electrical_power_query=mysqli_query($conn,"SELECT * FROM electrical_power WHERE tegangan='R1 - 900 VA'");
    $electrical_power_value=mysqli_fetch_array($electrical_power_query);

    $electrical_power_query2=mysqli_query($conn,"SELECT * FROM electrical_power WHERE tegangan='R1 - 1300 VA'");
    $electrical_power_value2=mysqli_fetch_array($electrical_power_query2);

    $electrical_power_query3=mysqli_query($conn,"SELECT * FROM electrical_power WHERE tegangan='R1 - 2200 VA'");
    $electrical_power_value3=mysqli_fetch_array($electrical_power_query3);
 ?>
<script type="text/javascript">
    window.onload=aktiv();
        function aktiv(){
            document.getElementById("form_page").value = '0';
            document.getElementById("btnRecommendedI1").hidden = false;
            document.getElementById("btnRecommendedI2").hidden = true;
            document.getElementById("btnContinue").hidden = true;
            document.getElementById("notif").innerHTML = "";
            btnRecommendedI1
        }
</script>

<script type="text/javascript">
    //mencari data_irradiance per provinsi
    $(document).ready(function(){
        $('#province').change(function(){
            var id_prov =$('#province').val();
            $.ajax({
                type: 'POST',
                url: 'data_irradiance.php',
                data: 'id_prov='+id_prov,
                success: function(response){
                    $('#data_irradiance').val(response);
                    //document.getElementById("data_irradiance").readonly = true;
                        //$('#data_irradiance').html(response);
                    }
            });
        })
    });
</script>

<script type="text/javascript">
    //memasukan nama provinsi ke tag tertentu
    $(document).ready(function(){
        $('#province').change(function(){
            
            var id_prov2 =$('#province').val();
            $.ajax({
                type: 'POST',
                url: 'name_province.php',
                data: 'id_prov='+id_prov2,
                success: function(response){
                    $('#name_province').val(response);
                        //$('#data_irradiance').html(response);
                    }
            });
        })  
    });
</script>

<script type="text/javascript">
    //memasukan link provinsi ke tag tertentu
    $(document).ready(function(){
        $('#province').change(function(){
            
            var id_prov3 =$('#province').val();
            $.ajax({
                type: 'POST',
                url: 'link_province.php',
                data: 'id_prov='+id_prov3,
                success: function(response){
                    $('#link_province').val(response);
                        //$('#data_irradiance').html(response);
                    }
            });
        })  
    });
</script>

<script type="text/javascript">
//memasukan nilai R1 electrical power ke type
    $(document).ready(function(){
        $('#electrical_power').change(function(){
            //document.getElementById("data_irradiance").disabled = false;
            var electrical_powerin =$('#electrical_power').val();

            if (electrical_powerin == <?php echo json_encode($electrical_power_value['tegangan']); ?>) { //900
             document.getElementById("type").value = '900';
            }else if (electrical_powerin == <?php echo json_encode($electrical_power_value2['tegangan']); ?>) { //1300
             document.getElementById("type").value = '1300';
            }else if (electrical_powerin == <?php echo json_encode($electrical_power_value3['tegangan']); ?>) { //2200
             document.getElementById("type").value = '2200';
            }else{
                document.getElementById("type").value = '';
            }
        })
    });
</script>

<script type="text/javascript">   
//jika memilih tipe kalkulator maka akan menampilkan cek bok rekomendasi dan button continue       
    $(document).ready(function(){
        $('#calculator_type').change(function(){
             if ($("#calculator_type").val()== 'recommended') {
                document.getElementById("btnRecommendedI1").hidden = true;
                document.getElementById("btnRecommendedI2").hidden = false;
            }else{
                document.getElementById("btnRecommendedI1").hidden = false;
                document.getElementById("btnRecommendedI2").hidden = true;
            }

            if ($("#calculator_type").val()== '') {
                document.getElementById("btnContinue").hidden = true;
            }else{
                document.getElementById("btnContinue").hidden = false;
            }
        })
    });
</script>

<script type="text/javascript">  
//menutup modal notifikasi rekening minimum
    function CloseModalNotifAvrBill() {
         $('#notif_avg_bill').modal('hide');
    }
</script>

<script type="text/javascript">
//submit form
    $(document).ready(function(){
        $('#btnContinue').click(function(){
            if ($("#province").val() == '' || $("#data_irradiance").val() == '' || $("#electrical_power").val() == '' || $("#type").val() == '' || $("#avgbill").val() == '' || $("#module_type").val() == '') {
            document.getElementById("notif").innerHTML = <?php echo json_encode($lang['notification_validation_form']); ?>;
             }else{
                if ($("#electrical_power").val() =="R1 - 900 VA") {
                    var rekening_minimum = $("#type").val()/1000*40*<?php echo json_encode($electrical_power_value['harga']); ?>;
                }else{
                    var rekening_minimum = $("#type").val()/1000*40*<?php echo json_encode($electrical_power_value2['harga']); ?>;
                }
               
                if ($("#avgbill").val().replace(/\./g, "") < rekening_minimum) {
                    document.getElementById("xc").innerHTML = rekening_minimum;
                    $('#notif_avg_bill').modal('show'); 
                }else{
                        document.getElementById("notif").innerHTML = "";
                        document.getElementById("form-calculator").submit();
                }
                
            }
        })
    });
</script>

<script type="text/javascript">
  // form data irradiance size tidak bisa input tanda koma
 /* $("#data_irradiance").keydown(function (event) {
      if (event.keyCode == 188) {
        alert(<?php echo json_encode($lang['comma_notifications']); ?>);
        return false;
        }
    });
</script>

<script type="text/javascript">
    //agar form hanya input angka dan titik jika angka dari 48
    function hanyaAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 46 || charCode > 57) )

            return false;
        return true;
    }
</script>

<script type="text/javascript">
//membuat form avg bill menjadi format mata uang
    $(document).ready(function(){
        // Format mata uang.
        $( '#avgbill' ).mask('#.##0', {reverse: true});

    })
</script>

        <!-- jQuery  -->
<script src="assets/page/js/bootstrap.bundle.min.js"></script>
<script src="assets/page/js/waves.min.js"></script>
<script src="assets/page/js/jquery.slimscroll.min.js"></script>

<script src="assets/page/plugins/moment/moment.js"></script>
<script src="assets/page/plugins/apexcharts/apexcharts.min.js"></script>
<script src="https://apexcharts.com/samples/assets/irregular-data-series.js"></script>
<script src="https://apexcharts.com/samples/assets/series1000.js"></script>
<script src="https://apexcharts.com/samples/assets/ohlc.js"></script>
<script src="assets/page/plugins/dropify/js/dropify.min.js"></script>
<script src="assets/page/plugins/ticker/jquery.jConveyorTicker.min.js"></script>
<script src="assets/page/plugins/peity-chart/jquery.peity.min.js"></script>
<script src="assets/page/plugins/chartjs/chart.min.js"></script>
<script src="assets/page/pages/jquery.profile.init.js"></script>

<script src="assets/page/plugins/tippy/tippy.all.min.js"></script> 
<script src="assets/page/pages/jquery.tooltipster.js"></script>

   <!-- App js -->
<script src="assets/page/js/jquery.core.js"></script>
   <!-- Chart JS -->
<script src="assets/page/plugins/chartjs/chart.min.js"></script>
        <!--<script src="assets/page/pages/jquery.chartjs.init.js"></script>-->

        <!-- App js -->
<script src="assets/page/js/app.js"></script> 

    </body>
</html>