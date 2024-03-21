<?php 
define("BASEPATH", dirname(__FILE__));
session_start();
include '../../config/config.php';
if (empty($_SESSION['province']) || empty($_SESSION['name_province']) || empty($_SESSION['data_irradiance']) ||empty($_SESSION['electrical_power']) || empty($_SESSION['type']) || empty($_SESSION['avgbill']) ||empty($_SESSION['module_type'])) {
        header("location:../../");
    }
$page_title = "Expected Saving";
$icon_menu = "<img src='../../assets/img/icon/3.png' alt='user' class='img-zoom rounded-circle img-thumbnail mb-4'>";// "<i class='mdi mdi-cards-playing-outline' style='font-size:50px; width:150px;'></i>";
include '../header.php';
?>
<div class="container-fluid"> 
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 style="background-color: #275798; color:#fff;" class="mt-0 header-title btn btn-skew"><span><?php echo $lang['your_solar_calculator']; ?></span></h4>
                    <p class="text-muted mb-4"></p> 
                     
                    <hr>
                    <form>
                        <div class="form-group">
                            <label for="example-input2-group1" class="example-input2-group1">Saving</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="font-size: 10px;"><i>0 %</i></span>
                                </div>
                                <input type="range" class="custom-range form-control" value="0" max="100" id="myRange">
                                <input type="hidden" name="expected_saving" id="expected_saving">
                                <div class="input-group-append">
                                    <span class="input-group-text" style="font-size: 10px;"><i>100 %</i></span>
                                    <span class="input-group-text isiformrange" style="font-size: 10px;"><i id="outputrange">0</i>&nbsp;%</span>
                                     <button type="button" class="input-group-text" id="iconform" data-container="body" data-toggle="popover" data-placement="right" data-content="<?php echo $lang['float_savings']; ?>"><i id="texticonform">?</i></button>
                                </div>
                            </div>  
                        </div>
                        <span class="badge badge-danger" style="font-size: 15px;width: 100%;" id="notif"></span><br><br>
                        <button id="btncalculate" type="button" class="btn btn-dark" onclick="calculate()"><i class="mdi mdi-counter"></i> <?php echo $lang['calculate']; ?></button>
                <!--    <button id="recommended" style="" type="button" class="btn btn-dark"><i class="mdi mdi-image-filter-frames"></i> Recommended</button>-->
                        <button style="float: right;" type="reset" class="btn btn-danger" id="reset"><i class="mdi mdi-lock-reset"></i> Reset</button>                      
                    </form>          
                </div><!--end card-body-->
            </div><!--end card-->
            <div class="card" id="export_button">
                <div class="card-body">
                 <h4 style="background-color: #275798; color:#fff;" class="mt-0 header-title btn btn-skew"><span><?php echo $lang['export']; ?></span></h4>
                        <!--Form export PDF-->
                    <form method="POST" action="" id="form_export">
                        <input type="hidden" class="form-control" name="name_province_export" id="name_province_export" value="<?php echo $_SESSION['name_province']; ?>">
                        <input type="hidden" class="form-control" name="data_irradiance_export" id="data_irradiance_export" value="<?php echo $_SESSION['data_irradiance']; ?>">
                        <input type="hidden" class="form-control" name="electrical_power_export" id="electrical_power_export" value="<?php echo $_SESSION['electrical_power']; ?>">
                        <input type="hidden" class="form-control" name="type_export" id="type_export" value="<?php echo $_SESSION['type']; ?>">
                        <input type="hidden" class="form-control" name="avgbill_export" id="avgbill_export" value="<?php echo $_SESSION['avgbillidr']; ?>">
                        <input type="hidden" class="form-control" name="module_type_export" id="module_type_export" value="<?php echo $_SESSION['module_type']; ?>">
                        <input type="hidden" name="expected_saving_export" id="expected_saving_export">

                              <!--output report -->
                        <input type="hidden" name="monthly_electricity_use_export" id="monthly_electricity_use_export">
                        <input type="hidden" name="new_system_size_export" id="new_system_size_export">
                        <input type="hidden" name="roof_space_export" id="roof_space_export">
                        <input type="hidden" name="new_system_cost_export" id="new_system_cost_export">
                        <input type="hidden" name="monthly_solar_energy_production_export" id="monthly_solar_energy_production_export">
                        <input type="hidden" name="monthly_solar_energy_use_export" id="monthly_solar_energy_use_export">
                        <input type="hidden" name="monthly_electricity_could_be_exported_export" id="monthly_electricity_could_be_exported_export">
                        <input type="hidden" name="monthly_electricity_fed_back_into_pln_grid_export" id="monthly_electricity_fed_back_into_pln_grid_export">
                        <input type="hidden" name="monthly_electricity_imported_from_pln_grid_export" id="monthly_electricity_imported_from_pln_grid_export">
                        <input type="hidden" name="monthly_bill_export" id="monthly_bill_export">
                        <input type="hidden" name="monthly_savings_export" id="monthly_savings_export">
                        <input type="hidden" name="new_monthly_savings_ip_export" id="new_monthly_savings_ip_export">
                        <input type="hidden" name="payback_period_export" id="payback_period_export">
                        <input type="hidden" name="emission_saved_export" id="emission_saved_export">
                        <input type="hidden" name="planting_export" id="planting_export">

                        <input type="hidden" name="email_export" id="email_export">
                    </form>
                    <div class="modal fade form_email" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title mt-0" id="exampleModalLabel"><i class="mdi mdi-email-mark-as-unread mr-2"></i> E-mail</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="form-group row">
                                             <label for="example-input2-group1" class="example-input2-group1 col-sm-2"></label>
                                            <div class="input-group col-sm-8">
                                                <input type="email" id="email_send" name="email_send" class="form-control">
                                                <div class="input-group-append">
                                                      <button id="expemailsend" style="background-color: #275798;" type="button" class="btn btn-dark"> <?php echo $lang['send_email']; ?></button>
                                                </div><br>
                                                 <span style="font-size: 15px;width: 100%;color: #8A0009;" id="email_incorrect"></span>
                                                 <span style="font-size: 15px;width: 100%;color: #045C00;" id="email_successfully"></span>
                                            </div>   
                                        </div>
                                    </form>       
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                 <hr>
                 <div class="button-items" style="">
                    <?php 
                        $export_pdf_q=mysqli_query($conn,"SELECT COUNT(*) AS count_pdf FROM export_amount WHERE calculator_type='expected_saving' AND export_type='pdf'");
                        $export_pdf_v=mysqli_fetch_array($export_pdf_q);
                        $export_image_q=mysqli_query($conn,"SELECT COUNT(*) AS count_image FROM export_amount WHERE calculator_type='expected_saving' AND export_type='image'");
                        $export_image_v=mysqli_fetch_array($export_image_q);
                        $export_email_q=mysqli_query($conn,"SELECT COUNT(*) AS count_email FROM export_amount WHERE calculator_type='expected_saving' AND export_type='email'");
                        $export_email_v=mysqli_fetch_array($export_email_q);
                        $export_map_q=mysqli_query($conn,"SELECT COUNT(*) AS count_map FROM export_amount WHERE calculator_type='expected_saving' AND export_type='map'");
                        $export_map_v=mysqli_fetch_array($export_map_q);
                     ?>
                    <button id="exppdf" type="button" class="btn btn-dark btn-lg btn-block  waves-effect waves-light"><i class="mdi mdi-file-pdf mr-2"></i>PDF</button>
                    <!--<span style="font-size: 12px; top: -50px; float: right;"> <?php echo $export_pdf_v['count_pdf']; ?> Click</span><br><br>-->

                    <button id="expimage" type="button" class="btn btn-dark btn-lg btn-block  waves-effect waves-light"><i class="mdi mdi-file-image mr-2"></i><?php echo $lang['export_image']; ?></button>
                    <!--<span style="font-size: 12px; top: -50px; float: right;"><?php echo $export_image_v['count_image']; ?> Click</span><br><br>-->

                    <button id="expemail" type="button" class="btn btn-dark btn-lg btn-block  waves-effect waves-light" data-toggle="modal" data-animation="bounce" data-target=".form_email"><i class="mdi mdi-email-mark-as-unread mr-2"></i><?php echo $lang['export_email']; ?></button>
                    <!--<span style="font-size: 12px; top: -50px; float: right;"><?php echo $export_email_v['count_email']; ?> Click</span><br><br>-->

                    <button id="expmap" type="button" class="btn btn-dark btn-lg btn-block  waves-effect waves-light"><i class="mdi mdi-map mr-2"></i><?php echo $lang['export_map']; ?></button>
                    <!--<span style="font-size: 12px; top: -50px; float: right;"> <?php echo $export_map_v['count_map']; ?> Click</span>-->
                </div>
            </div>
        </div>
    </div><!--end col-->

    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="tab-content" id="profile-tabContent">
                <!--     <table border="1">
                        <tr>
                            <td>estimated_monthly_saving</td>
                            <td id="estimated_monthly_saving_test"></td>
                        </tr>
                        <tr>
                            <td>New Monthly Bill</td>
                            <td id="new_monthly_bill_test"></td>
                        </tr>
                        <tr>
                            <td>Monthly Electricity Use</td>
                            <td id="monthly_electricity_use_test"></td>
                        </tr>
                        <tr>
                            <td>monthly_energy_imported_from_pln</td>
                            <td id="monthly_energy_imported_from_pln_test"></td>
                        </tr>
                        <tr>
                            <td>monthly_required_solar_yield</td>
                            <td id="monthly_required_solar_yield_test"></td>
                        </tr>
                         <tr>
                            <td>estimated_system_size:</td>
                            <td><span id="estimated_system_size_test"></span></td>
                        </tr>
                        <tr>
                            <td>Adjusted system size:</td>
                            <td><span id="adjusted_system_size_1_test"></span></td>
                        </tr>
                        <tr>
                            <td>Solar module:</td>
                            <td><span id="total_solar_module_test"></span></td>
                        </tr>                        
                        <tr>
                            <td>new_system_size:</td>
                            <td><span id="new_system_size_test"></span></td>
                        </tr>
                        <tr>
                            <td>roof_space:</td>
                            <td><span id="roof_space_test"></span></td>
                        </tr>
                        <tr>
                            <td>new system_cost:</td>
                            <td><span id="new_system_cost_test"></span></td>
                        </tr>
                        <tr>
                            <td>Monthly Solar Energy Production</td>
                            <td id="monthly_solar_energy_production_test"></td>
                        </tr>
                        <tr>
                            <td>Monthly Solar Energy Use</td>
                            <td id="monthly_solar_energy_use_test"></td>
                        </tr>
                        <tr>
                            <td>monthly_electricity_could_be_exported</td>
                            <td id="monthly_electricity_could_be_exported_test"></td>
                        </tr>
                        <tr>
                            <td>Monthly Electricity Fed Back Into PLN Grid (65%)</td>
                            <td id="monthly_electricity_fed_back_into_pln_grid_test"></td>
                        </tr>
                        <tr>
                            <td>Monthly Electricity Imported From PLN Grid</td>
                            <td id="monthly_electricity_imported_from_pln_grid_test"></td>
                        </tr>
                        <tr>
                            <td>Monthly Bill</td>
                            <td id="monthly_bill_test"></td>
                        </tr>
                        <tr>
                            <td>Monthly Savings</td>
                            <td id="monthly_savings_test"></td>
                        </tr>
                        <tr>
                            <td>new_monthly_savings_ip :</td>
                            <td><span id="new_monthly_savings_ip_test"></span></td>
                        </tr>
                        <tr>
                            <td>payback_period:</td>
                            <td><span id="payback_period_test"></span></td>
                        </tr>
                         <tr>
                            <td>emission_saved:</td>
                            <td><span id="emission_saved_test"></span></td>
                        </tr>
                         <tr>
                            <td>planting:</td>
                            <td><span id="planting_test"></span></td>
                        </tr>
                    </table>-->
                    <div class="tab-pane fade show active" id="profile-dash">
                        <h4 style="background-color: #275798; color:#fff;" class="header-title mt-0 btn btn-skew"><?php echo $lang['key_result']; ?></h4>        
                        <div class="row">
                            <div class="col-xs-table col-lg-table" style="">
                                <div class="card">
                                    <div class="card-body bg-gradient0 output1">
                                        <div class="">
                                            <div class="card-icon">
                                                <!--<i style="color: #FFF;" class="fas fa-coins"></i>-->
                                                <img style="margin-right: 9px;" height="85" width="85" src="../../assets/img/icon/LAB1.png">
                                            </div>
                                            <h2 class="font-weight-bold text-white"></h2>
                                            <p class="text-white mb-0 font-12"><?php echo strtoupper($lang['system_cost']); ?></p>
                                        </div>
                                    </div>
                                    <div class="card-body dash-info-carousel">                                   
                                        <div id="carousel_best_saler" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <div class="text-center">
                                                        <div class="align-item-center">
                                                            <h5 class="font-15 d-inline-block align-self-center" id="new_system_cost_a">0</h5><br>
                                                            <a class="btn btn-sm btn-dark text-light mb-2">IDR</a><hr>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--end card-body-->
                                </div>
                            </div><!--end col-->
                            <div class="col-xs-table col-lg-table" style="">
                                <div class="card">
                                    <div class="card-body bg-gradient0 output1">
                                        <div class="">
                                            <div class="card-icon">
                                                <!--<i style="color: #FFF;" class="fas fa-coins"></i>-->
                                                <img style="margin-right: 9px;" height="85" width="85"  src="../../assets/img/icon/LAB2.png">
                                            </div>
                                            <h2 class="font-weight-bold text-white"></h2>
                                            <p class="text-white mb-0 font-12"><?php echo strtoupper($lang['monthly_savings_ip']); ?></p> 
                                        </div>
                                    </div>
                                    <div class="card-body dash-info-carousel">                                   
                                        <div id="carousel_best_saler" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <div class="text-center">
                                                        <div class="align-item-center">
                                                            <h5 class="font-15 d-inline-block align-self-center" id="new_monthly_savings_ip_a">0</h5><br>
                                                            <a class="btn btn-sm btn-dark text-light mb-2">%</a><hr>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--end card-body-->
                                </div>
                            </div><!--end col-->
                            <div class="col-xs-table col-lg-table" style="">
                                <div class="card">
                                    <div class="card-body bg-gradient0 output1">
                                        <div class="">
                                            <div class="card-icon">
                                                <!--<i style="color: #FFF;" class="fas fa-coins"></i>-->
                                                <img style="margin-right: 9px;" height="85" width="85"  src="../../assets/img/icon/LAB3.png">
                                            </div>
                                            <h2 class="font-weight-bold text-white"></h2>
                                            <p class="text-white mb-0 font-12"><?php echo strtoupper($lang['payback_period']); ?></p>
                                        </div>
                                    </div>
                                    <div class="card-body dash-info-carousel">                             
                                        <div id="carousel_best_saler" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <div class="text-center">
                                                        <div class="align-item-center">
                                                            <h5 class="font-15 d-inline-block align-self-center" id="payback_period_a">0</h5><br>
                                                            <a class="btn btn-sm btn-dark text-light mb-2"><?php echo $lang['year']; ?></a><hr>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--end card-body-->
                                </div>
                            </div><!--end col-->
                            <div class="col-xs-table col-lg-table" style="">
                                <div class="card">
                                    <div class="card-body bg-gradient0 output1">
                                        <div class="">
                                            <div class="card-icon">
                                                <!--<i style="color: #FFF;" class="fas fa-coins"></i>-->
                                                <img height="85" width="85"  src="../../assets/img/icon/LAB4.png">
                                            </div>
                                            <h2 class="font-weight-bold text-white"></h2>
                                            <p class="text-white mb-0 font-12"><?php echo strtoupper($lang['emission_saved']); ?></p>    
                                        </div>
                                    </div><!--end card-body-->
                                    <div class="card-body dash-info-carousel">                             
                                        <div id="carousel_best_saler" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <div class="text-center">
                                                        <div class="align-item-center">
                                                            <h5 class="font-15 d-inline-block align-self-center" id="emission_saved_a">0</h5><br>
                                                            <a class="btn btn-sm btn-dark text-light mb-2">Kg CO<sub>2</sub></a><hr>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--end card-body-->
                                </div><!--end card-->
                            </div><!--end col-->
                            <div class="col-xs-table col-lg-table" style="">
                                <div class="card">
                                    <div class="card-body bg-gradient0 output1">
                                        <div class="">
                                            <div class="card-icon">
                                                <!--<i style="color: #FFF;" class="fas fa-coins"></i>-->
                                                <img height="85" width="85"  src="../../assets/img/icon/LAB5.png">
                                            </div>
                                            <h2 class="font-weight-bold text-white"></h2>
                                            <p class="text-white mb-0 font-12"><?php echo strtoupper($lang['planting']); ?></p>
                                        </div>
                                    </div><!--end card-body-->
                                    <div class="card-body dash-info-carousel">                                        
                                        <div id="carousel_best_saler" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <div class="text-center">
                                                        <div class="align-item-center">
                                                            <h5 class="font-15 d-inline-block align-self-center" id="planting_a">0</h5><br>
                                                            <a class="btn btn-sm btn-dark text-light mb-2"><?php echo $lang['trees']; ?></a><hr>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--end card-body-->
                                </div><!--end card-->
                            </div><!--end col-->
                        </div><!--end row--> 
                        <div class="row">
                            
                        </div><!--end row--> 
                    </div><!--end tab-pane-->
                </div>  <!--end tab-content-->
                <div class="tab-content" id="profile-tabContent">
                    <div class="tab-pane fade show active" id="profile-dash">
                     <!--<h4 style="background-color: #275798; color:#fff;" class="header-title mt-0 btn btn-skew">ELECTRICITY BILL COMPARISON</h4>--> 
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body" style="text-align: center;"><br>
                                        <h4 class="card-title mt-0" style="font-size: 13px;"><?php echo strtoupper($lang['new_system_size']); ?></h4>
                                        <button class="btn btn-dark btn-square col-sm-9" style="background-color: #24539B;">
                                            <span id="new_system_size_b">0</span>
                                            <hr style="background-color: #fff;">
                                            kWp
                                        </button>   
                                    </div><!--end card -body-->
                                </div><!--end card-->
                            </div><!--end col-->
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body" style="text-align: center;"><br>
                                        <h4 class="card-title mt-0" style="font-size: 13px;"><?php echo strtoupper($lang['roof_space']); ?></h4>
                                        <button class="btn btn-dark btn-square col-sm-9" style="background-color: #24539B;">
                                            <span id="roof_space_b">0</span>
                                            <hr style="background-color: #fff;">
                                            m<sup>2</sup>
                                        </button>   
                                    </div><!--end card -body-->
                                </div><!--end card-->
                            </div><!--end col-->
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body" style="text-align: center;">
                                        <h4  class="card-title mt-0" style="font-size: 13px;"><?php echo strtoupper($lang['monthly_solar_energy_production']); ?></h4>
                                        <button class="btn btn-dark btn-square col-sm-9" style="background-color: #24539B;">
                                            <span id="monthly_solar_energy_production_b">0</span>
                                            <hr style="background-color: #fff;">
                                            kWh
                                        </button>   
                                    </div><!--end card -body-->
                                </div><!--end card-->
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end tab-pane-->
                </div>  <!--end tab-content-->                                                                  
            </div><!--end card-body-->
        </div><!--end card-->
      
        <div class="card">
            <div class="card-body">
                <div class="tab-content" id="profile-tabContent">
                    <div class="tab-pane fade show active" id="profile-dash">
                        <h4 style="background-color: #275798; color:#fff;" class="header-title mt-0 btn btn-skew"><?php echo strtoupper($lang['your_solar_potential_in_details']); ?></h4> 
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card">
                                    <h4 class="header-title mt-0 btn btn-dark
                                    btn-square btn-skew waves-effect waves-light"><?php echo strtoupper($lang['solar_system']); ?></h4> 
                                    <div class="card-body">
                                        <table id="footable-1" class="table" data-sorting="true">
                                            <tr>
                                                <td><?php echo $lang['new_system_size2']; ?></td>
                                                <td id="new_system_size_c">0</td>
                                                <td>kWp</td>
                                            </tr>
                                            <tr>
                                                <td><?php echo $lang['monthly_electricity_use']; ?></td>
                                                <td id="monthly_electricity_use_c">0</td>
                                                <td>kWh</td>
                                            </tr>
                                            <tr style="border-top: hidden;margin-top: -70px">
                                                <td colspan="3" style="font-size: 11px; color: #275798;">
                                                    <?php echo $lang['monthly_electricity_use_text']; ?>
                                                </td>
                                           </tr>
                                            <tr>
                                                <td><?php echo str_replace("<br>"," ",$lang['monthly_solar_energy_production']); ?></td>
                                                <td id="monthly_solar_energy_production_c">0</td>
                                                <td>kWh</td>
                                            </tr>
                                            <tr>
                                                <td><?php echo $lang['monthly_solar_energy_use']; ?></td>
                                                <td id="monthly_solar_energy_use_c">0</td>
                                                <td>kWh</td>
                                            </tr>
                                            <tr>
                                                <td><?php echo $lang['monthly_electricity_fed_back_into_pln_grid']; ?></td>
                                                <td id="monthly_electricity_fed_back_into_pln_grid_c">0</td>
                                                <td>kWh</td>
                                            </tr>
                                             <tr style="border-top: hidden;margin-top: -70px">
                                                 <td colspan="3" style="font-size: 11px; color: #275798;">
                                                    <?php echo $lang['monthly_electricity_fed_back_into_pln_grid_text']; ?>
                                                </td>
                                           </tr>
                                            <tr>
                                                <td><?php echo $lang['monthly_electricity_imported_from_pln_grid']; ?></td>
                                                <td id="monthly_electricity_imported_from_pln_grid_c">0</td>
                                                <td>kWh</td>
                                            </tr>
                                            <tr>
                                                <td><?php echo $lang['roof_space']; ?></td>
                                                <td id="roof_space_c">0</td>
                                                <td>m<sup>2</sup></td>
                                            </tr>
                                        </table><!--end table-->
                                    </div><!--end card-body-->
                                </div><!--end card-->
                            </div><!--end col-->
                            <div class="col-sm-6">
                                <div class="card">
                                    <h4 class="header-title mt-0 btn btn-dark
                                    btn-square btn-skew waves-effect waves-light"><?php echo strtoupper($lang['cost']); ?></h4>
                                    <div class="card-body">
                                        <table id="footable-1" class="table" data-sorting="true">
                                             <tr>
                                                <td><?php echo $lang['system_cost']; ?></td>
                                                <td id="new_system_cost_c">0</td>
                                                <td>IDR</td>
                                            </tr>
                                            <tr>
                                                <td><?php echo $lang['new_monthly_bill']; ?></td>
                                                <td id="monthly_bill_c">0</td>
                                                <td>IDR</td>
                                            </tr>
                                            <tr>
                                                <td><?php echo $lang['monthly_savings']; ?></td>
                                                <td id="monthly_savings_c">0</td>
                                                <td>IDR</td>
                                            </tr>
                                            <tr>
                                                <td><?php echo $lang['monthly_savings_ip']; ?></td>
                                                <td id="new_monthly_savings_ip_c">0</td>
                                                <td>%</td>
                                            </tr>
                                             <tr>
                                                <td><?php echo $lang['payback_period']; ?></td>
                                                <td id="payback_period_c">0</td>
                                                <td><?php echo $lang['year']; ?></td>
                                            </tr>
                                             <tr>
                                                <td><?php echo $lang['emission_saved']; ?></td>
                                                <td id="emission_saved_c">0</td>
                                                <td>Kg CO<sub>2</sub></td>
                                            </tr>
                                             <tr>
                                                <td><?php echo $lang['planting']; ?></td>
                                                <td id="planting_c">0</td>
                                                <td><?php echo $lang['trees']; ?></td>
                                            </tr>
                                        </table><!--end table-->
                                    </div><!--end card-body-->
                                </div><!--end card-->
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end tab-pane-->
                </div>  <!--end tab-content-->                                                                       
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->

    <div class="col-12" id="area-grafik">
        <div class="card">
            <!--<div class="card-body">
                    <div class="wrap">
                        <div class="jctkr-label">
                            <strong>Province wich often used</strong>
                        </div>
                        <div class="js-conveyor-example">
                            <ul>
                                <?php 

                                $prov_query00=mysqli_query($conn,"SELECT * FROM provinsi ORDER BY nama_provinsi ASC");
                                $prov_value00=mysqli_fetch_array($prov_query00);
                                foreach ($prov_query00 as $key => $value00) {
                                    ?>

                                    <li>
                                        <i style="background-color: #275799; color: #FFF; height: 110px;width: 110px; border-radius: 100px; " class="mdi mdi-flag"></i>
                                        <span style="color: #275799;" class="font-12"><b><?php echo $value00['nama_provinsi']; ?></b></span>
                                        <span class="text-dark mb-0 font-12 ">100 x</span>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                     <canvas id="pro-doughnut" height="4"></canvas> 
                </div>--><!--end card-body-->
            <div class="card-body border-bottom" id="area-grafik">
                <div class="fro_profile">
                    <div class="row">
                        <div class="col-lg-2 mb-3 mb-lg-0">
                        </div>
                        <div class="col-lg-8 mb-3 mb-lg-0">
                            <h4 class="mt-0 header-title"><?php echo strtoupper($lang['electricity_bill_comparison']); ?></h4>
                            <div class="row">
                                <span style="font-weight: bold;font-size: 20px; padding: 8px;color: #000; writing-mode:tb-rl;-webkit-transform:rotate(-90deg);-moz-transform:rotate(-90deg);-o-transform: rotate(-90deg);-ms-transform:rotate(-90deg);transform: rotate(180deg);white-space:nowrap;float:left; text-align: center;">IDR</span>
                                <div class="col-10 align-item-center" style="text-align: center;">
                                    <div class="">
                                        <div id="budget_grafik"></div>
                                    </div>
                                    <span style="font-weight: bold;color: #000;"><?php echo strtoupper($lang['year']); ?></span>
                                </div>
                            </div> 
                        </div><!--end col-->
                        <div class="col-lg-2 mb-3 mb-lg-0">
                        </div>
                    </div><!--end row-->
                </div><!--end f_profile-->                                                                                
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->

</div><!-- container -->
<?php 
    // pemanggilan nilai untuk rumus perhitungan
    $solar_module_capacity_query2=mysqli_query($conn,"SELECT * FROM solar_module_capacity WHERE tipe='mono'");
    $solar_module_capacity_value2=mysqli_fetch_array($solar_module_capacity_query2);

    $solar_module_capacity_query3=mysqli_query($conn,"SELECT * FROM solar_module_capacity WHERE tipe='poli'");
    $solar_module_capacity_value3=mysqli_fetch_array($solar_module_capacity_query3);

    $system_price_query=mysqli_query($conn,"SELECT * FROM system_price WHERE tipe='for poli'");
    $system_price_value=mysqli_fetch_array($system_price_query);

    $system_price_query2=mysqli_query($conn,"SELECT * FROM system_price WHERE tipe='for mono'");
    $system_price_value2=mysqli_fetch_array($system_price_query2);

    $electrical_power_query=mysqli_query($conn,"SELECT * FROM electrical_power WHERE tegangan='R1 - 900 VA'");
    $electrical_power_value=mysqli_fetch_array($electrical_power_query);

    $electrical_power_query2=mysqli_query($conn,"SELECT * FROM electrical_power WHERE tegangan='R1 - 1300 VA'");
    $electrical_power_value2=mysqli_fetch_array($electrical_power_query2);

    $electrical_power_query3=mysqli_query($conn,"SELECT * FROM electrical_power WHERE tegangan='R1 - 2200 VA'");
    $electrical_power_value3=mysqli_fetch_array($electrical_power_query3);

    $system_losses_query=mysqli_query($conn,"SELECT * FROM system_losses");
    $system_losses_value=mysqli_fetch_array($system_losses_query);
    $system_losses_persen=$system_losses_value['system_losses']/100;

    $compensation_query=mysqli_query($conn,"SELECT * FROM compensation");
    $compensation_value=mysqli_fetch_array($compensation_query);
    $compensation_persen=$compensation_value['compensation']/100;

    $conversion_query=mysqli_query($conn,"SELECT * FROM conversion");
    $conversion_value=mysqli_fetch_array($conversion_query);
?>
<script type="text/javascript">
    // fungsi pertama
    window.onload=aktiv();
    function aktiv(){
        $("#area-grafik").hide();
        
        
        document.getElementById("expected_saving").value = <?php echo json_encode($_SESSION['form_page']); ?>;
        document.getElementById("myRange").value = <?php echo json_encode($_SESSION['form_page']); ?>;
        document.getElementById("outputrange").innerHTML = <?php echo json_encode($_SESSION['form_page']); ?>;

        document.getElementById("notif").innerHTML = "";
        document.getElementById("reset").hidden = true;

        document.getElementById("exppdf").disabled = true;
        document.getElementById("expimage").disabled = true;
        document.getElementById("expemail").disabled = true;
        document.getElementById("expmap").disabled = true;
    }
</script>

<script>
    var slider = document.getElementById("myRange");
    var output = document.getElementById("outputrange");
    var output2 = document.getElementById("expected_saving");
    output2.value = slider.value;
    output.value = slider.value;

    slider.oninput = function() {
        output2.value = this.value;
        output.innerHTML = this.value;
    }
</script>

<script type="text/javascript">
// proses perhitungan
    function calculate() {
        //variabel input
        var data_irradiance = Number(<?php echo json_encode($_SESSION['data_irradiance']); ?>);
        var electrical_power = Number(<?php echo json_encode($_SESSION['electrical_power']); ?>);
        var type = Number(<?php echo json_encode($_SESSION['type']); ?>);
        var avgbill = Number(<?php echo json_encode($_SESSION['avgbill']); ?>);
        var module_type = Number(<?php echo json_encode($_SESSION['module_type']); ?>);
        var savings = Number($("#expected_saving").val()/100);
        document.getElementById("expected_saving_export").value = savings*100;
        
        // variabel rumus
        var estimated_monthly_saving;
        var new_monthly_bill;
        var monthly_energy_imported_from_pln;
        var monthly_required_solar_yield;
        var estimated_system_size;
        var adjusted_system_size_1;
        var total_solar_module;

        // variabel output
        var monthly_electricity_use;
        var new_system_size;
        var roof_space;
        var new_system_cost;
        var monthly_solar_energy_production;
        var monthly_solar_energy_use;
        var monthly_electricity_could_be_exported;
        var monthly_electricity_fed_back_into_pln_grid;
        var monthly_electricity_imported_from_pln_grid;
        var monthly_bill;
        var monthly_savings;
        var new_monthly_savings_ip;
        var payback_period;
        var emission_saved;
        var planting;
   
        // validasi form _______________________________________________________________________________
        if ($("#expected_saving").val() == '' || $("#expected_saving").val() == '0') {
            document.getElementById("notif").innerHTML = <?php echo json_encode($lang['notification_validation_form']); ?>;
        }else{
            document.getElementById("notif").innerHTML = "";
            document.getElementById("reset").hidden = false;

            document.getElementById("exppdf").disabled = false;
            document.getElementById("expimage").disabled = false;
            document.getElementById("expemail").disabled = false;
            document.getElementById("expmap").disabled = false;

            $("#area-grafik").show();

        // proses perhitungan ___________________________________________________________________________
        //Math.Ceil() dibulatkan ke atas
        //Math.Floor() dibulatkan ke bawah
        //Math.Round() angka 0.5 ke atas akan dibulatkan ke atas dan 0.49 akan dibulatkan ke bawah
        //Math.pow(bilangan, pangkat) pangkat
        //bilangan.to.fixed() membatasi jumlah angka di belakang koma

        //1. estimated_monthly_saving
        //Rumus: saving*avg bill
        //satuan: IDR
            var estimated_monthly_saving_result = savings * avgbill;
            estimated_monthly_saving = Math.round(estimated_monthly_saving_result);
        //______________________________________________________________________________________
        //2. new_monthly_bill
        //Rumus: Avg. bill (monthly)-Estimated monthly saving
        //satuan:IDR
            var new_monthly_bill_result = avgbill- estimated_monthly_saving;
            new_monthly_bill = Math.round(new_monthly_bill_result);
        //______________________________________________________________________________________
        //3. monthly_electricity_use
        //Rumus: IF(Electrical power="R1 - 900 VA", Avg. bill/electrical power R1 900 =harga, Avg. bill/electrical power R1 1300 =harga)
        //satuan:kWh
             if (electrical_power == <?php echo json_encode($electrical_power_value['tegangan']); ?>) {
                var monthly_electricity_use_result = avgbill/<?php echo json_encode($electrical_power_value['harga']); ?>;
                monthly_electricity_use = Math.round(monthly_electricity_use_result);
                document.getElementById("monthly_electricity_use_export").value = monthly_electricity_use;
                document.getElementById("monthly_electricity_use_c").innerHTML = monthly_electricity_use;
            
            }else{
                var monthly_electricity_use_result = avgbill/<?php echo json_encode($electrical_power_value2['harga']); ?>;
                monthly_electricity_use = Math.round(monthly_electricity_use_result);
                document.getElementById("monthly_electricity_use_export").value = monthly_electricity_use;
                document.getElementById("monthly_electricity_use_c").innerHTML = monthly_electricity_use;
            }
        //______________________________________________________________________________________
        //4. monthly_energy_imported_from_pln
        //Rumus: Monthly electricity use*(1-Saving)
        //satuan:kWh
            var monthly_energy_imported_from_pln_result = monthly_electricity_use*(1- savings);
            monthly_energy_imported_from_pln = Math.round(monthly_energy_imported_from_pln_result);
        //______________________________________________________________________________________
        //5. monthly_required_solar_yield
        //Rumus: (Monthly electricity use-Monthly energy imported from PLN)/(1*0.71+0.65*0.29)
        //satuan:kWh
            var monthly_required_solar_yield_result = (monthly_electricity_use - monthly_energy_imported_from_pln)/(1*0.71+0.65*0.29);
            monthly_required_solar_yield = Math.round(monthly_required_solar_yield_result);
        //______________________________________________________________________________________
        //6. estimated_system_size
        //Rumus:Monthly required solar yield/30/(1-system losses)/Data irradiance
        //satuan:kWp
            var estimated_system_size_result = monthly_required_solar_yield/30/(1- <?php echo json_encode( $system_losses_persen); ?>)/data_irradiance;
            estimated_system_size = Number(estimated_system_size_result.toFixed(1));
        //______________________________________________________________________________________
        //7. adjusted_system_size_1
        //Rumus: IF(Estimated system size>=((Type)/1000*1.2), ((Type)/1000*1.2), Estimated system size)
        //satuan:kWp
            var type_a= type/1000*1.2;
            if (estimated_system_size >= type_a ) {
                adjusted_system_size_1 = Number(type_a.toFixed(1));
            }else{
                adjusted_system_size_1 = Number(estimated_system_size);
            }
        //______________________________________________________________________________________
        //8.total_solar_module
        //Rumus: ROUNDDOWN(Adjusted system size (1)*1000/Module type,0)
        //satuan:pcs
            var total_solar_module_result = adjusted_system_size_1 *1000/module_type;
            total_solar_module = Math.floor(total_solar_module_result);
        //______________________________________________________________________________________
        //9. new_system_size
        //Rumus: Total solar module*Module type/1000
        //satuan:kWp
            var new_system_size_result = total_solar_module * module_type / 1000;
            new_system_size = Number(new_system_size_result.toFixed(1));
            document.getElementById("new_system_size_b").innerHTML = new_system_size;
            document.getElementById("new_system_size_c").innerHTML = new_system_size;
            document.getElementById("new_system_size_export").value = new_system_size;
        //______________________________________________________________________________________
        //10. roof_space
        //Rumus: IF(Module type=350, New system size*1000/modul power density for mono, New system size*1000/modul power density for mono)
        //satuan:m<sup>2</sup>
            if (module_type == 350) {
                var roof_space_result =  new_system_size*1000/<?php echo json_encode($solar_module_capacity_value2['modul_power_density']); ?>;
                roof_space = Math.round(roof_space_result);
                document.getElementById("roof_space_b").innerHTML = roof_space;
                document.getElementById("roof_space_c").innerHTML = roof_space;
                document.getElementById("roof_space_export").value = roof_space;
            }else{
                var roof_space_result =  new_system_size*1000/<?php echo json_encode($solar_module_capacity_value3['modul_power_density']); ?>;
                 roof_space = Math.round(roof_space_result);
                document.getElementById("roof_space_b").innerHTML = roof_space;
                document.getElementById("roof_space_c").innerHTML = roof_space;
                document.getElementById("roof_space_export").value = roof_space;
            }
        //______________________________________________________________________________________
        //11. new_system_cost
        //Rumus: New system size*system price for poli
        //satuan:IDR
            var new_system_cost_result = new_system_size*<?php echo json_encode($system_price_value['harga']); ?>;
            new_system_cost = Math.round(new_system_cost_result); 
            function rubah(angka){
               var reverse = angka.toString().split('').reverse().join(''),
               ribuan = reverse.match(/\d{1,3}/g);
               ribuan = ribuan.join('.').split('').reverse().join('');
               return ribuan;
            }
            document.getElementById("new_system_cost_a").innerHTML = rubah(new_system_cost);
            document.getElementById("new_system_cost_c").innerHTML = rubah(new_system_cost);
            document.getElementById("new_system_cost_export").value = rubah(new_system_cost);
        //______________________________________________________________________________________
        //12. monthly_solar_energy_production
        //Rumus: New system size*data irradiance*(1-system losses)*30
        //satuan:kWh
            var monthly_solar_energy_production_result = new_system_size*data_irradiance*(1- <?php echo json_encode($system_losses_persen); ?>)*30;
            monthly_solar_energy_production = Math.round(monthly_solar_energy_production_result);
             document.getElementById("monthly_solar_energy_production_b").innerHTML = monthly_solar_energy_production;
            document.getElementById("monthly_solar_energy_production_c").innerHTML = monthly_solar_energy_production;
            document.getElementById("monthly_solar_energy_production_export").value = monthly_solar_energy_production;

        //______________________________________________________________________________________
        //13. monthly_solar_energy_use
        //Rumus: Monthly solar energy production*0.71
        //satuan:kWh
            var monthly_solar_energy_use_result = monthly_solar_energy_production*0.71;
            monthly_solar_energy_use = Math.round(monthly_solar_energy_use_result);
            document.getElementById("monthly_solar_energy_use_c").innerHTML = monthly_solar_energy_use;
            document.getElementById("monthly_solar_energy_use_export").value = monthly_solar_energy_use;
        //______________________________________________________________________________________
        //14. monthly_electricity_could_be_exported
        //Rumus: Monthly solar energy production-Monthly solar energy use
        //satuan:kWh
            var monthly_electricity_could_be_exported_result = monthly_solar_energy_production - monthly_solar_energy_use;
            monthly_electricity_could_be_exported = Math.round(monthly_electricity_could_be_exported_result);
        //______________________________________________________________________________________
        //15. monthly_electricity_fed_back_into_pln_grid
        //Rumus: compensation*Monthly electricity could be exported
        //satuan:kWh
            var monthly_electricity_fed_back_into_pln_grid_result = <?php echo json_encode($compensation_persen); ?>*monthly_electricity_could_be_exported;
           monthly_electricity_fed_back_into_pln_grid = Math.round(monthly_electricity_fed_back_into_pln_grid_result);
           document.getElementById("monthly_electricity_fed_back_into_pln_grid_c").innerHTML = monthly_electricity_fed_back_into_pln_grid;
            document.getElementById("monthly_electricity_fed_back_into_pln_grid_export").value = monthly_electricity_fed_back_into_pln_grid;
        //______________________________________________________________________________________
        //16.monthly_electricity_imported_from_pln_grid
        //Rumus: Monthly electricity use-Monthly solar energy use-Monthly electricity fed back into PLN grid (65%)
        //satuan:kWh
            var monthly_electricity_imported_from_pln_grid_result = monthly_electricity_use - monthly_solar_energy_use - monthly_electricity_fed_back_into_pln_grid;
            monthly_electricity_imported_from_pln_grid = Math.round(monthly_electricity_imported_from_pln_grid_result);
            document.getElementById("monthly_electricity_imported_from_pln_grid_c").innerHTML = monthly_electricity_imported_from_pln_grid;
            document.getElementById("monthly_electricity_imported_from_pln_grid_export").value = monthly_electricity_imported_from_pln_grid;
        //______________________________________________________________________________________
        //17. monthly_bill
        //Rumus: IF(Electrical power="R1 - 900 VA", Monthly electricity imported from PLN grid*electrical power R1 900 =harga, Monthly electricity imported from PLN grid*electrical power R1 1300 =harga)
        //satuan:IDR
             if (electrical_power == <?php echo json_encode($electrical_power_value['tegangan']); ?>) {
                var monthly_bill_result = monthly_electricity_imported_from_pln_grid*<?php echo json_encode($electrical_power_value['harga']); ?>;
                monthly_bill = Math.round(monthly_bill_result);
                function rubah(angka){
                    var reverse = angka.toString().split('').reverse().join(''),
                    ribuan = reverse.match(/\d{1,3}/g);
                    ribuan = ribuan.join('.').split('').reverse().join('');
                    return ribuan;
                }
                document.getElementById("monthly_bill_c").innerHTML = rubah(monthly_bill);
                document.getElementById("monthly_bill_export").value = rubah(monthly_bill);

            }else{
                var monthly_bill_result = monthly_electricity_imported_from_pln_grid*<?php echo json_encode($electrical_power_value2['harga']); ?>;
                monthly_bill = Math.round(monthly_bill_result);
                function rubah(angka){
                    var reverse = angka.toString().split('').reverse().join(''),
                    ribuan = reverse.match(/\d{1,3}/g);
                    ribuan = ribuan.join('.').split('').reverse().join('');
                    return ribuan;
                }
                document.getElementById("monthly_bill_c").innerHTML = rubah(monthly_bill);
                document.getElementById("monthly_bill_export").value = rubah(monthly_bill);

            }
        //______________________________________________________________________________________
        //18.monthly_savings
        //Rumus: Avg. bill (monthly)-Monthly bill
        //satuan:IDR
            var monthly_savings_result = avgbill - monthly_bill;
            monthly_savings = Math.round(monthly_savings_result);
            function rubah(angka){
                    var reverse = angka.toString().split('').reverse().join(''),
                    ribuan = reverse.match(/\d{1,3}/g);
                    ribuan = ribuan.join('.').split('').reverse().join('');
                     return ribuan;
                 }
            document.getElementById("monthly_savings_c").innerHTML = rubah(monthly_savings);
            document.getElementById("monthly_savings_export").value = rubah(monthly_savings);
        //______________________________________________________________________________________
        //16.new_monthly_savings_ip
        //Rumus: Monthly savings/Avg. bill (monthly)
        //satuan:%
            var new_monthly_savings_ip_result= monthly_savings / avgbill;
            new_monthly_savings_ip = Math.round(new_monthly_savings_ip_result*100);
            document.getElementById("new_monthly_savings_ip_a").innerHTML = new_monthly_savings_ip;
            document.getElementById("new_monthly_savings_ip_c").innerHTML = new_monthly_savings_ip;
            document.getElementById("new_monthly_savings_ip_export").value = new_monthly_savings_ip;
        //______________________________________________________________________________________
        //17. payback_period
        //Rumus: New system cost/(Monthly savings*12)
        //satuan:year
            var payback_period_result = new_system_cost/(monthly_savings * 12);
            payback_period = Math.round(payback_period_result);
            document.getElementById("payback_period_a").innerHTML = payback_period;
            document.getElementById("payback_period_c").innerHTML = payback_period;
            document.getElementById("payback_period_export").value = payback_period;
        //______________________________________________________________________________________
        //18. emission_saved
        //Rumus:(Monthly electricity use-Monthly electricity imported from PLN grid)*conversion
        //satuan:kg CO2
            var emission_saved_result = (monthly_electricity_use - monthly_electricity_imported_from_pln_grid)*<?php echo json_encode($conversion_value['conversion']); ?>;
            emission_saved = Math.round(emission_saved_result);
            document.getElementById("emission_saved_a").innerHTML = emission_saved;
            document.getElementById("emission_saved_c").innerHTML = emission_saved;
            document.getElementById("emission_saved_export").value = emission_saved;
        //______________________________________________________________________________________
        //18. planting
        //Rumus: Emission saved*0.05
        //satuan:trees
            var planting_result = emission_saved * 0.05;
            planting = Math.round(planting_result);
            document.getElementById("planting_a").innerHTML = planting;
            document.getElementById("planting_c").innerHTML = planting;
            document.getElementById("planting_export").value = planting;
        //______________________________________________________________________________________
        //aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
        /*    document.getElementById("estimated_monthly_saving_test").innerHTML = estimated_monthly_saving;
            document.getElementById("new_monthly_bill_test").innerHTML = new_monthly_bill;
            document.getElementById("monthly_electricity_use_test").innerHTML = monthly_electricity_use;
            document.getElementById("monthly_energy_imported_from_pln_test").innerHTML = monthly_energy_imported_from_pln;
            document.getElementById("monthly_required_solar_yield_test").innerHTML = monthly_required_solar_yield;
            document.getElementById("estimated_system_size_test").innerHTML = estimated_system_size;
            document.getElementById("adjusted_system_size_1_test").innerHTML = adjusted_system_size_1;
            document.getElementById("total_solar_module_test").innerHTML = total_solar_module;
            document.getElementById("new_system_size_test").innerHTML = new_system_size;
            document.getElementById("roof_space_test").innerHTML = roof_space;
            document.getElementById("new_system_cost_test").innerHTML = new_system_cost;
            document.getElementById("monthly_solar_energy_production_test").innerHTML = monthly_solar_energy_production;
            document.getElementById("monthly_solar_energy_use_test").innerHTML = monthly_solar_energy_use;
            document.getElementById("monthly_electricity_could_be_exported_test").innerHTML = monthly_electricity_could_be_exported;
            document.getElementById("monthly_electricity_fed_back_into_pln_grid_test").innerHTML = monthly_electricity_fed_back_into_pln_grid;
            document.getElementById("monthly_electricity_imported_from_pln_grid_test").innerHTML = monthly_electricity_imported_from_pln_grid;
            document.getElementById("monthly_bill_test").innerHTML = monthly_bill;
            document.getElementById("monthly_savings_test").innerHTML = monthly_savings;
            document.getElementById("new_monthly_savings_ip_test").innerHTML = new_monthly_savings_ip;
            document.getElementById("payback_period_test").innerHTML = payback_period;
            document.getElementById("emission_saved_test").innerHTML = emission_saved;
            document.getElementById("planting_test").innerHTML = planting; */
        //bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb
             // Rumus Grafik____________________________________________________________________________________
            //System Cost
            var solar_rooftop_system= <?php echo json_encode($system_price_value['harga']) ?>;
            var net_meter_exim = 900000;                              
            var discount_capital = 0;
            var electricity_consumption = monthly_electricity_use/30;
            var solar_pv_production = monthly_solar_energy_production/30;
                if (electrical_power == <?php echo json_encode($electrical_power_value['tegangan']); ?>) {
                    var pln_electricity_tariff = <?php echo json_encode($electrical_power_value['harga']); ?>;
                }else{
                    var pln_electricity_tariff = <?php echo json_encode($electrical_power_value2['harga']); ?>;
                }          
            var discount_rate = 3/100;
            var solar_resources = data_irradiance; 
            var electricity_tariff_increase= 3/100;
            var solar_system_degradation = 0.8/100;
            //+-----+-------------------------+-----------------+-----------------------+-------------------+
            //|Year |Solar Production (kWh)   |Savings (IDR)    |Bill without PV (IDR)  |Bill with PV (IDR) |
            //+-----+-------------------------+-----------------+-----------------------+-------------------+
            /*|1    |*/
            var solar_production1 = solar_pv_production*365;/*|*/
            var savings1=solar_production1*pln_electricity_tariff*(0.65*0.29+1*0.71); /*|*/
            var bill_without_pv1=electricity_consumption*365*pln_electricity_tariff;/*|*/
            var bill_with_pv1  = bill_without_pv1 - savings1 ;/*|*/

            var bwop1 = bill_without_pv1.toFixed(0);
            var bwp1 = bill_with_pv1.toFixed(0)
            //+-----+-------------------------+--------------------+---------------------+------------------+
            /*|2    |*/
            //solar_production1*((1- solar_system_degradation)^(2-1))
            var solar_production2=solar_production1*(Math.pow((1- solar_system_degradation),2-1));/*|*/
            //solar_production2*pln_electricity_tariff*((1+electricity_taripff_increase)^(2-1))*(0.65*0.29+1*0.71);
            var savings2=solar_production2*pln_electricity_tariff*(Math.pow((1+electricity_tariff_increase),2-1))*(0.65*0.29+1*0.71); /*|*/
            //bill_without_pv1*((1+electricity_taripff_increase)^(2-1));
            var bill_without_pv2=bill_without_pv1*(Math.pow((1+electricity_tariff_increase),2-1));/*|*/
            var bill_with_pv2  = bill_without_pv2 - savings2 ;/*|*/

            var bwop2 = bill_without_pv2.toFixed(0);
            var bwp2 = bill_with_pv2.toFixed(0)
            //+-----+-------------------------+----------------------+--------------------+------------------+
            /*|3    |*/
            var solar_production3=solar_production2*(Math.pow((1- solar_system_degradation),3-2));/*|*/
            var savings3=solar_production3*pln_electricity_tariff*(Math.pow((1+electricity_tariff_increase),3-2))*(0.65*0.29+1*0.71); /*|*/
            var bill_without_pv3 = bill_without_pv2*(Math.pow((1+electricity_tariff_increase),3-2)) ;/*|*/
            var bill_with_pv3  = bill_without_pv3 - savings3 ;/*|*/

            var bwop3 = bill_without_pv3.toFixed(0);
            var bwp3 = bill_with_pv3.toFixed(0)
            //+-----+-------------------------+----------------------+--------------------+------------------+
            /*|4    |*/
            var solar_production4=solar_production3*(Math.pow((1- solar_system_degradation),4-3));/*|*/
            var savings4=solar_production4*pln_electricity_tariff*(Math.pow((1+electricity_tariff_increase),4-3))*(0.65*0.29+1*0.71) ; /*|*/
            var bill_without_pv4 = bill_without_pv3*(Math.pow((1+electricity_tariff_increase),4-3)) ;/*|*/
            var bill_with_pv4  = bill_without_pv4 - savings4 ;/*|*/

            var bwop4 = bill_without_pv4.toFixed(0);
            var bwp4 = bill_with_pv4.toFixed(0)
            //+-----+-------------------------+----------------------+--------------------+------------------+
            /*|5    |*/
            var solar_production5=solar_production4*(Math.pow((1- solar_system_degradation),5-4));/*|*/
            var savings5=solar_production5*pln_electricity_tariff*(Math.pow((1+electricity_tariff_increase),5-4))*(0.65*0.29+1*0.71) ; /*|*/
            var bill_without_pv5 = bill_without_pv4*(Math.pow((1+electricity_tariff_increase),5-4)) ;/*|*/
            var bill_with_pv5  = bill_without_pv5 - savings5 ;/*|*/

            var bwop5 = bill_without_pv5.toFixed(0);
            var bwp5 = bill_with_pv5.toFixed(0)
            //+-----+-------------------------+----------------------+--------------------+------------------+
            /*|6    |*/
            var solar_production6=solar_production5*(Math.pow((1- solar_system_degradation),6-5));/*|*/
            var savings6=solar_production6*pln_electricity_tariff*(Math.pow((1+electricity_tariff_increase),6-5))*(0.65*0.29+1*0.71) ; /*|*/
            var bill_without_pv6 = bill_without_pv5*(Math.pow((1+electricity_tariff_increase),6-5)) ;/*|*/
            var bill_with_pv6  = bill_without_pv6 - savings6 ;/*|*/

            var bwop6 = bill_without_pv6.toFixed(0);
            var bwp6 = bill_with_pv6.toFixed(0)
            //+-----+-------------------------+----------------------+--------------------+------------------+
            /*|7    |*/
            var solar_production7=solar_production6*(Math.pow((1- solar_system_degradation),7-6));/*|*/
            var savings7=solar_production7*pln_electricity_tariff*(Math.pow((1+electricity_tariff_increase),7-6))*(0.65*0.29+1*0.71) ; /*|*/
            var bill_without_pv7 = bill_without_pv6*(Math.pow((1+electricity_tariff_increase),7-6)) ;/*|*/
            var bill_with_pv7  = bill_without_pv7 - savings7 ;/*|*/

            var bwop7 = bill_without_pv7.toFixed(0);
            var bwp7 = bill_with_pv7.toFixed(0)
            //+-----+-------------------------+----------------------+--------------------+------------------+
            /*|8    |*/
            var solar_production8=solar_production7*(Math.pow((1- solar_system_degradation),8-7));/*|*/
            var savings8=solar_production8*pln_electricity_tariff*(Math.pow((1+electricity_tariff_increase),8-7))*(0.65*0.29+1*0.71); /*|*/
            var bill_without_pv8 = bill_without_pv7*(Math.pow((1+electricity_tariff_increase),8-7)) ;/*|*/
            var bill_with_pv8  = bill_without_pv8 - savings8 ;/*|*/

            var bwop8 = bill_without_pv8.toFixed(0);
            var bwp8 = bill_with_pv8.toFixed(0)
            //+-----+-------------------------+----------------------+--------------------+------------------+
            /*|9    |*/
            var solar_production9=solar_production8*(Math.pow((1- solar_system_degradation),9-8));/*|*/
            var savings9=solar_production9*pln_electricity_tariff*(Math.pow((1+electricity_tariff_increase),9-8))*(0.65*0.29+1*0.71); /*|*/
            var bill_without_pv9 = bill_without_pv8*(Math.pow((1+electricity_tariff_increase),9-8)) ;/*|*/
            var bill_with_pv9  = bill_without_pv9 - savings9 ;/*|*/

            var bwop9 = bill_without_pv9.toFixed(0);
            var bwp9 = bill_with_pv9.toFixed(0)
            //+-----+-------------------------+----------------------+--------------------+------------------+
            /*|10   |*/
            var solar_production10  =solar_production9*(Math.pow((1- solar_system_degradation),10-9));/*|*/
            var savings10 =solar_production10*pln_electricity_tariff*(Math.pow((1+electricity_tariff_increase),10-9))*(0.65*0.29+1*0.71); /*|*/
            var bill_without_pv10= bill_without_pv9*(Math.pow((1+electricity_tariff_increase),10-9)) ;/*|*/
            var bill_with_pv10 = bill_without_pv10 - savings10 ;/*|*/

            var bwop10 = bill_without_pv10.toFixed(0);
            var bwp10 = bill_with_pv10.toFixed(0)
            //+-----+-------------------------+----------------------+--------------------+------------------+
            /*|11   |*/
            var solar_production11  =solar_production10*(Math.pow((1- solar_system_degradation),11-10));/*|*/
            var savings11=solar_production11*pln_electricity_tariff*(Math.pow((1+electricity_tariff_increase),11-10))*(0.65*0.29+1*0.71); /*|*/
            var bill_without_pv11= bill_without_pv10*(Math.pow((1+electricity_tariff_increase),11-10)) ;/*|*/
            var bill_with_pv11 = bill_without_pv11 - savings11 ;/*|*/

            var bwop11 = bill_without_pv11.toFixed(0);
            var bwp11 = bill_with_pv11.toFixed(0)
            //+-----+-------------------------+----------------------+--------------------+------------------+
            /*|12   |*/
            var solar_production12  =solar_production11*(Math.pow((1- solar_system_degradation),12-11)) /*|*/
            var savings12=solar_production12*pln_electricity_tariff*(Math.pow((1+electricity_tariff_increase),12-11))*(0.65*0.29+1*0.71); /*|*/
            var bill_without_pv12= bill_without_pv11*(Math.pow((1+electricity_tariff_increase),12-11)) ;/*|*/
            var bill_with_pv12 = bill_without_pv12 - savings12 ;/*|*/

            var bwop12 = bill_without_pv12.toFixed(0);
            var bwp12 = bill_with_pv12.toFixed(0)
            //+-----+-------------------------+----------------------+--------------------+------------------+
            /*|13   |*/
            var solar_production13  =solar_production12*(Math.pow((1- solar_system_degradation),13-12));/*|*/
            var savings13=solar_production13*pln_electricity_tariff*(Math.pow((1+electricity_tariff_increase),13-12))*(0.65*0.29+1*0.71); /*|*/
            var bill_without_pv13= bill_without_pv12*(Math.pow((1+electricity_tariff_increase),13-12)) ;/*|*/
            var bill_with_pv13 = bill_without_pv13 - savings13 ;/*|*/

            var bwop13 = bill_without_pv13.toFixed(0);
            var bwp13 = bill_with_pv13.toFixed(0)
            //+-----+-------------------------+----------------------+--------------------+------------------+
            /*|14   |*/
            var solar_production14  =solar_production13*(Math.pow((1- solar_system_degradation),14-13));/*|*/
            var savings14=solar_production14*pln_electricity_tariff*(Math.pow((1+electricity_tariff_increase),14-13))*(0.65*0.29+1*0.71); /*|*/
            var bill_without_pv14= bill_without_pv13*(Math.pow((1+electricity_tariff_increase),14-13)) ;/*|*/
            var bill_with_pv14 = bill_without_pv14 - savings14 ;/*|*/

            var bwop14 = bill_without_pv14.toFixed(0);
            var bwp14 = bill_with_pv14.toFixed(0)
            //+-----+-------------------------+----------------------+--------------------+------------------+
            /*|15   |*/
            var solar_production15  =solar_production14*(Math.pow((1- solar_system_degradation),15-14));/*|*/
            var savings15=solar_production15*pln_electricity_tariff*(Math.pow((1+electricity_tariff_increase),15-14))*(0.65*0.29+1*0.71); /*|*/
            var bill_without_pv15= bill_without_pv14*(Math.pow((1+electricity_tariff_increase),15-14)) ;/*|*/
            var bill_with_pv15 = bill_without_pv15 - savings15 ;/*|*/

            var bwop15 = bill_without_pv15.toFixed(0);
            var bwp15 = bill_with_pv15.toFixed(0)
            //+-----+-------------------------+----------------------+--------------------+------------------+
            /*|16   |*/
            var solar_production16  =solar_production15*(Math.pow((1- solar_system_degradation),16-15));/*|*/
            var savings16=solar_production16*pln_electricity_tariff*(Math.pow((1+electricity_tariff_increase),16-15))*(0.65*0.29+1*0.71); /*|*/
            var bill_without_pv16= bill_without_pv15*(Math.pow((1+electricity_tariff_increase),16-15)) ;/*|*/
            var bill_with_pv16 = bill_without_pv16 - savings16 ;/*|*/

            var bwop16 = bill_without_pv16.toFixed(0);
            var bwp16 = bill_with_pv16.toFixed(0)
            //+-----+-------------------------+----------------------+--------------------+------------------+
            /*|17   |*/
            var solar_production17  =solar_production16*(Math.pow((1- solar_system_degradation),17-16));/*|*/
            var savings17=solar_production17*pln_electricity_tariff*(Math.pow((1+electricity_tariff_increase),17-16))*(0.65*0.29+1*0.71); /*|*/
            var bill_without_pv17= bill_without_pv16*(Math.pow((1+electricity_tariff_increase),17-16)) ;/*|*/
            var bill_with_pv17 = bill_without_pv17 - savings17 ;/*|*/

            var bwop17 = bill_without_pv17.toFixed(0);
            var bwp17 = bill_with_pv17.toFixed(0)
            //+-----+-------------------------+----------------------+--------------------+------------------+
            /*|18   |*/
            var solar_production18  =solar_production17*(Math.pow((1- solar_system_degradation),18-17));/*|*/
            var savings18=solar_production18*pln_electricity_tariff*(Math.pow((1+electricity_tariff_increase),18-17))*(0.65*0.29+1*0.71); /*|*/
            var bill_without_pv18= bill_without_pv17*(Math.pow((1+electricity_tariff_increase),18-17)) ;/*|*/
            var bill_with_pv18 = bill_without_pv18 - savings18 ;/*|*/

            var bwop18 = bill_without_pv18.toFixed(0);
            var bwp18 = bill_with_pv18.toFixed(0)
            //+-----+-------------------------+----------------------+--------------------+------------------+
            /*|19   |*/
            var solar_production19  =solar_production18*(Math.pow((1- solar_system_degradation),19-18));/*|*/
            var savings19=solar_production19*pln_electricity_tariff*(Math.pow((1+electricity_tariff_increase),19-18))*(0.65*0.29+1*0.71); /*|*/
            var bill_without_pv19= bill_without_pv18*(Math.pow((1+electricity_tariff_increase),19-18)) ;/*|*/
            var bill_with_pv19 = bill_without_pv19 - savings19 ;/*|*/

            var bwop19 = bill_without_pv19.toFixed(0);
            var bwp19 = bill_with_pv19.toFixed(0)
            //+-----+-------------------------+----------------------+--------------------+------------------+
            /*|20   |*/
            var solar_production20  =solar_production19*(Math.pow((1- solar_system_degradation),20-19));/*|*/
            var savings20=solar_production20*pln_electricity_tariff*(Math.pow((1+electricity_tariff_increase),20-19))*(0.65*0.29+1*0.71); /*|*/
            var bill_without_pv20= bill_without_pv19*(Math.pow((1+electricity_tariff_increase),20-19)) ;/*|*/
            var bill_with_pv20 = bill_without_pv20 - savings20 ;/*|*/

            var bwop20 = bill_without_pv20.toFixed(0);
            var bwp20 = bill_with_pv20.toFixed(0)
            //+-----+-------------------------+----------------------+--------------------+------------------+
            /*|21   |*/
            var solar_production21  =solar_production20*(Math.pow((1- solar_system_degradation),21-20));/*|*/
            var savings21=solar_production21*pln_electricity_tariff*(Math.pow((1+electricity_tariff_increase),21-20))*(0.65*0.29+1*0.71); /*|*/
            var bill_without_pv21= bill_without_pv20*(Math.pow((1+electricity_tariff_increase),21-20)) ;/*|*/
            var bill_with_pv21 = bill_without_pv21 - savings21 ;/*|*/

            var bwop21 = bill_without_pv21.toFixed(0);
            var bwp21 = bill_with_pv21.toFixed(0)
            //+-----+-------------------------+----------------------+--------------------+------------------+
            /*|22   |*/
            var solar_production22  =solar_production21*(Math.pow((1- solar_system_degradation),22-21));/*|*/
            var savings22=solar_production22*pln_electricity_tariff*(Math.pow((1+electricity_tariff_increase),22-21))*(0.65*0.29+1*0.71); /*|*/
            var bill_without_pv22= bill_without_pv21*(Math.pow((1+electricity_tariff_increase),22-21)) ;/*|*/
            var bill_with_pv22 = bill_without_pv22 - savings22 ;/*|*/

            var bwop22 = bill_without_pv22.toFixed(0);
            var bwp22 = bill_with_pv22.toFixed(0)
            //+-----+-------------------------+----------------------+--------------------+------------------+
            /*|23   |*/
            var solar_production23  =solar_production22*(Math.pow((1- solar_system_degradation),23-22));/*|*/
            var savings23=solar_production23*pln_electricity_tariff*(Math.pow((1+electricity_tariff_increase),23-22))*(0.65*0.29+1*0.71); /*|*/
            var bill_without_pv23= bill_without_pv22*(Math.pow((1+electricity_tariff_increase),23-22)) ;/*|*/
            var bill_with_pv23 = bill_without_pv23 - savings23 ;/*|*/

            var bwop23 = bill_without_pv23.toFixed(0);
            var bwp23 = bill_with_pv23.toFixed(0)
            //+-----+-------------------------+----------------------+--------------------+------------------+
            /*|24   |*/
            var solar_production24  =solar_production23*(Math.pow((1- solar_system_degradation),24-23));/*|*/
            var savings24=solar_production24*pln_electricity_tariff*(Math.pow((1+electricity_tariff_increase),24-23))*(0.65*0.29+1*0.71); /*|*/
            var bill_without_pv24= bill_without_pv23*(Math.pow((1+electricity_tariff_increase),24-23)) ;/*|*/
            var bill_with_pv24 = bill_without_pv24 - savings24 ;/*|*/

            var bwop24 = bill_without_pv24.toFixed(0);
            var bwp24 = bill_with_pv24.toFixed(0)
            //+-----+-------------------------+----------------------+--------------------+------------------+
            /*|25   |*/
            var solar_production25  =solar_production24*(Math.pow((1- solar_system_degradation),25-24));/*|*/
            var savings25=solar_production25*pln_electricity_tariff*(Math.pow((1+electricity_tariff_increase),25-24))*(0.65*0.29+1*0.71); /*|*/
            var bill_without_pv25= bill_without_pv24*(Math.pow((1+electricity_tariff_increase),25-24)) ;/*|*/
            var bill_with_pv25 = bill_without_pv25 - savings25 ;/*|*/

            var bwop25 = bill_without_pv25.toFixed(0);
            var bwp25 = bill_with_pv25.toFixed(0)
            //+-----+-------------------------+----------------------+--------------------+------------------+

            //Menampilkan Grafik Yang dihitung___________________________________________________
            var optionsLine = {
              chart: {
                height: 500,
                type: 'line',
                zoom: {
                  enabled: false
                }
              },
              plotOptions: {
                stroke: {
                  width: 4,
                  curve: 'smooth'
                },
              },
              //colors: colorPalette,
              labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25"],
              series: [
                {
                  name: <?php echo json_encode(strtoupper($lang['bill_without_pv'])); ?>,
                  data: [bwop1,bwop2,bwop3,bwop4,bwop5,bwop6,bwop7,bwop8,bwop9,bwop10,bwop11,bwop12,bwop13,bwop14,bwop15,bwop16,bwop17,bwop18,bwop19,bwop20,bwop21,bwop22,bwop23,bwop24,bwop25]
                },
                {
                  name: <?php echo json_encode(strtoupper($lang['bill_with_pv'])); ?>,
                  data: [bwp1,bwp2,bwp3,bwp4,bwp5,bwp6,bwp7,bwp8,bwp9,bwp10,bwp11,bwp12,bwp13,bwp14,bwp15,bwp16,bwp17,bwp18,bwp19,bwp20,bwp21,bwp22,bwp23,bwp24,bwp25]
                },
              ],
              title: {
                floating: false,
                text: '',
                align: 'left',
                style: {
                  fontSize: '18px'
                }
              },
              subtitle: {
                text: '',
                align: 'center',
                margin: 30,
                offsetY: 40,
                style: {
                  color: '#222',
                  fontSize: '24px',
                }
              },
              markers: {
                size: 0
              },

              grid: {

              },
              xaxis: {
                labels: {
                  show: true
                },
                axisTicks: {
                  show: true
                },
                tooltip: {
                  enabled: true
                }
              },
              yaxis: {
                tickAmount: 10,
                labels: {
                  show: true
                },
                axisBorder: {
                  show: false,
                },
                axisTicks: {
                  show: false
                },
                min: 0,
              },
              legend: {
                position: 'top',
                horizontalAlign: 'right',
                offsetY: -20,
                offsetX: -30
              }

            }

            var chartLine = new ApexCharts(document.querySelector('#budget_grafik'), optionsLine);

            // a small hack to extend height in website sample dashboard
            chartLine.render().then(function () {
              var ifr = document.querySelector("#wrapperr");
              if (ifr.contentDocument) {
                ifr.style.height = ifr.contentDocument.body.scrollHeight + 20 + 'px';
              }
        });
            
            //Menampilkan Grafik Yang dihitung__________________________________________________END


              $.ajax({
                type: 'POST',
                url: 'calculate_save.php',
                data: 'id_prov=1',
                success: function(response){
                    //$('#name_province').val(response);
                        //$('#data_irradiance').html(response);
                    }
                });
        }
    }//end Calculate
</script>



<script type="text/javascript">
    // Reset form input dan output
    $(document).ready(function(){
        $('#reset').click(function(){
            document.getElementById("notif").innerHTML = "";
            document.getElementById("reset").hidden = true;

            document.getElementById("exppdf").disabled = true;
            document.getElementById("expimage").disabled = true;
            document.getElementById("expemail").disabled = true;
            document.getElementById("expmap").disabled = true;

            $("#area-grafik").hide();
            

            document.getElementById("new_system_size_b").innerHTML = '0';
            document.getElementById("new_system_size_c").innerHTML = '0';
            document.getElementById("roof_space_b").innerHTML = '0';
            document.getElementById("roof_space_c").innerHTML = '0';
            document.getElementById("new_system_cost_a").innerHTML = '0';
            document.getElementById("new_system_cost_c").innerHTML = '0';
            document.getElementById("monthly_electricity_use_c").innerHTML = '0';
            document.getElementById("monthly_solar_energy_production_b").innerHTML = '0';
            document.getElementById("monthly_solar_energy_production_c").innerHTML = '0';
            document.getElementById("monthly_solar_energy_use_c").innerHTML = '0';
            document.getElementById("monthly_electricity_fed_back_into_pln_grid_c").innerHTML = '0';
            document.getElementById("monthly_electricity_imported_from_pln_grid_c").innerHTML = '0';
            document.getElementById("monthly_bill_c").innerHTML = '0';
            document.getElementById("monthly_savings_c").innerHTML = '0';
            document.getElementById("new_monthly_savings_ip_a").innerHTML = '0';
            document.getElementById("new_monthly_savings_ip_c").innerHTML = '0';
            document.getElementById("payback_period_a").innerHTML = '0';
            document.getElementById("emission_saved_a").innerHTML = '0';
            document.getElementById("emission_saved_c").innerHTML = '0';
            document.getElementById("planting_a").innerHTML = '0';
            document.getElementById("planting_c").innerHTML = '0';

            document.getElementById("expected_saving").value = 0;
            document.getElementById("myRange").value = 0;
            document.getElementById("outputrange").innerHTML = 0;
        });
    });
</script>

<script type="text/javascript">
    //memasukan email dari form input ke form export
    $(document).ready(function(){
        $('#email_send').keyup(function(){
            document.getElementById("email_export").value = $('#email_send').val();
        })
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
    //export pdf
    $(document).ready(function(){
        $('#exppdf').click(function(){
            document.getElementById("form_export").action = 'export_pdf';
            document.getElementById("form_export").submit();
        });
    });
</script>

<script type="text/javascript">
    //export image
    $(document).ready(function(){
        $('#expimage').click(function(){
            document.getElementById("form_export").action = 'export_image';
            document.getElementById("form_export").submit();
        });
    });
</script>

<script type="text/javascript">
    //export email
    $(document).ready(function(){
        $('#expemail').click(function(){
                document.getElementById("email_incorrect").innerHTML = '';
                document.getElementById("email_successfully").innerHTML = '';
    });
</script>

<script type="text/javascript">
    //export email
    $(document).ready(function(){
        $('#expemailsend').click(function(){
            var em=document.getElementById("email_send").value;
            var atpos=em.indexOf("@");
            var dotpos=em.lastIndexOf(".");
            if (atpos<1 || dotpos<atpos+2 || dotpos+2>=em.length)
            {
                document.getElementById("email_incorrect").innerHTML = <?php echo json_encode($lang['notif_email_incorrect']); ?>;
               document.getElementById("email_successfully").innerHTML = '';
            }else{
                document.getElementById("email_successfully").innerHTML = <?php echo json_encode($lang['notif_email_send']); ?>;
                document.getElementById("email_incorrect").innerHTML = '';
                $.ajax({
                type: 'POST',
                url: 'email_send.php',
                data: 'name_province='+$('#name_province_export').val()+'&data_irradiance='+$('#data_irradiance_export').val()+'&electrical_power='+$('#electrical_power_export').val()+'&type='+$('#type_export').val()+'&avgbill='+$('#avgbill_export').val()+'&module_type='+$('#module_type_export').val()+'&expected_saving='+$('#expected_saving_export').val()+'&new_system_cost='+$('#new_system_cost_export').val()+'&new_monthly_savings_ip='+$('#new_monthly_savings_ip_export').val()+'&monthly_savings='+$('#monthly_savings_export').val()+'&payback_period='+$('#payback_period_export').val()+'&emission_saved='+$('#emission_saved_export').val()+'&planting='+$('#planting_export').val()+'&new_system_size='+$('#new_system_size_export').val()+'&roof_space='+$('#roof_space_export').val()+'&monthly_solar_energy_production='+$('#monthly_solar_energy_production_export').val()+'&monthly_electricity_use='+$('#monthly_electricity_use_export').val()+'&monthly_solar_energy_use='+$('#monthly_solar_energy_use_export').val()+'&monthly_electricity_fed_back_into_pln_grid='+$('#monthly_electricity_fed_back_into_pln_grid_export').val()+'&monthly_electricity_imported_from_pln_grid='+$('#monthly_electricity_imported_from_pln_grid_export').val()+'&monthly_bill='+$('#monthly_bill_export').val()+'&email='+$('#email_export').val(),
                success: function(response){
                    document.getElementById("email_successfully").innerHTML = <?php echo json_encode($lang['notif_email_success']); ?>;
                    }
                });
            }
        });
    });
</script>

<script type="text/javascript">
    //export map
    $(document).ready(function(){
        $('#expmap').click(function(){
            $.ajax({
                type: 'POST',
                url: 'export_map.php',
                data: 'id_prov=1',
                success: function(response){
                    //$('#name_province').val(response);
                        //$('#data_irradiance').html(response);
                    }
                });
            var win = window.open(<?php echo json_encode("https://solarhub.id/location/".$_SESSION['link_province']); ?>,'_blank');
            win.focus();
        });
    });
</script>
                        
<script type="text/javascript">
//Menampilkan Grafik 0_____________________________________________________________________
      !function($) {
            "use strict";

            var ChartJs = function() {};

            ChartJs.prototype.respChart = function(selector,type,data, options) {
                // get selector by context
                var ctx = selector.get(0).getContext("2d");
                // pointing parent container to make chart js inherit its width
                var container = $(selector).parent();

                // enable resizing matter
                $(window).resize( generateChart );

                // this function produce the responsive Chart JS
                function generateChart(){
                    // make chart width fit with its container
                    var ww = selector.attr('width', $(container).width() );
                    switch(type){
                        case 'Line':
                        new Chart(ctx, {type: 'line', data: data, options: options});
                        break;
                    }
                    // Initiate new chart or Redraw

                };
                // run function - render chart at first load
                generateChart();
            },

            //init
            ChartJs.prototype.init = function() {
                //creating lineChart system size
                var lineChart = {
                    labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25"],
                    datasets: [{
                        label: <?php echo json_encode(strtoupper($lang['bill_without_pv'])); ?>,
                        fill: false,
                        backgroundColor: '#275799',
                        borderColor: '#275799',
                        data: [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]
                    }, {
                        label: <?php echo json_encode(strtoupper($lang['bill_with_pv'])); ?>,
                        fill: false,
                        backgroundColor: '#FFC60B',
                        borderColor: "#FFC60B",
                        //borderDas00h: [5, 5],
                        data: [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]
                    }]
                };

                var lineOpts = {
                    responsive: true,
                    // title:{
                    //     display:true,
                    //     text:'Chart.js Line Chart'
                    // },
                    tooltips: {
                        mode: 'index',
                        intersect: false
                    },
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            // scaleLabel: {
                            //     display: true,
                            //     labelString: 'Month'
                            // },
                            gridLines: {
                                color: "rgba(0,0,0,0.1)"
                            }
                        }],
                        yAxes: [{
                            gridLines: {
                                color: "rgba(255,255,255,0.05)",
                                fontColor: '#fff'
                            },
                            ticks: {
                                //max: 100000,
                                min: 0
                                //stepSize: 50
                            }
                        }]
                    }
                };

                this.respChart($("#expected-saving_view"),'Line',lineChart, lineOpts);

            },
            $.ChartJs = new ChartJs, $.ChartJs.Constructor = ChartJs

        }(window.jQuery),

        //initializing
        function($) {
            "use strict";
            $.ChartJs.init()
        }(window.jQuery);
        //Menampilkan Grafik 0_____________________________________________________________________END
</script>

<?php include '../footer.php'; ?>