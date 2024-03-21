<?php
define("BASEPATH", dirname(__FILE__));
session_start();
include '../../config/config.php';
//$conn = mysqli_connect("localhost", "solarlab_calculator", "solarlab_calculator","solarlab_calculator");
//$conn = mysqli_connect("localhost", "root", "","solarpanel");
$date= date('d/m/Y');
mysqli_query($conn,"INSERT INTO export_amount VALUES('','$_SESSION[calculator_type]','email','','$date')");

$name_province = $_POST['name_province'];
$data_irradiance = $_POST['data_irradiance'];
$electrical_power = $_POST['electrical_power'];
$type = $_POST['type'];
$avgbill = $_POST['avgbill'];
$module_type = $_POST['module_type'];
$form_page = $_POST['form_page'];

$system_cost = $_POST['system_cost'];
$monthly_savings_ip = $_POST['monthly_savings_ip'];
$monthly_savings = $_POST['monthly_savings'];
$payback_period = $_POST['payback_period'];
$emission_saved = $_POST['emission_saved'];
$planting = $_POST['planting'];
$new_system_size = $_POST['new_system_size'];
$roof_space = $_POST['roof_space'];
$monthly_solar_energy_production = $_POST['monthly_solar_energy_production'];
$monthly_electricity_use = $_POST['monthly_electricity_use'];
$monthly_solar_energy_use = $_POST['monthly_solar_energy_use'];
$monthly_electricity_fed_back_into_pln_grid = $_POST['monthly_electricity_fed_back_into_pln_grid'];
$monthly_electricity_imported_from_pln_grid = $_POST['monthly_electricity_imported_from_pln_grid'];
$new_monthly_bill = $_POST['new_monthly_bill'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include librari phpmailer
include('../../assets/phpmailer/Exception.php');
include('../../assets/phpmailer/PHPMailer.php');
include('../../assets/phpmailer/SMTP.php');
include('../../config/email.php');

$email_pengirim = $email_from; // Isikan dengan email pengirim
$nama_pengirim = $name_from; // Isikan dengan nama pengirim
$email_penerima = $_POST['email']; // Ambil email penerima dari inputan form
$subjek = 'Best Performance | '.ucwords(str_replace("_"," ", $_SESSION['calculator_type'])); // Ambil subjek dari inputan form
if ($_SESSION['calculator_type'] == 'system_size') {
    $label_form_page = "System Size";
}else if ($_SESSION['calculator_type'] == 'budget') {
    $label_form_page ="Budget";
}else if ($_SESSION['calculator_type'] == 'expected_saving') {
    $label_form_page ="Savings";
}
$pesan = "<table align='center' border='0'>
            <tr>
                <td style='border-bottom:2px solid #03239C;'>&nbsp;<b><i class='fas fa-download'></i> INPUT</b></td>
                <td rowspan='2' width='30' style='border-right: 2px solid #03239C;'></td>
                <td rowspan='2' width='30'></td>
                <td style='border-bottom:2px solid #03239C;'>&nbsp;<b><i class='fas fa-upload'></i> OUTPUT</b></td>
            </tr>
            <tr>
                <!-- input-->
                <td valign='top'>
                    <table>
                        <tr>
                            <td>".$lang['detect_location']."</td>
                            <td>:</td>
                            <td><span id='name_province'>".$name_province."</span></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>".$lang['solar_pv_output']."</td>
                            <td>:</td>
                            <td><span id='data_irradiance'>".$data_irradiance."</span></td>
                            <td>kWh/kWp</td>
                        </tr>

                        <tr>
                            <td>".$lang['electrical_power']."</td>
                            <td>:</td>
                            <td><span id='electrical_power'>".$electrical_power."</span></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>".$lang['type']."</td>
                            <td>:</td>
                            <td><span id='type_export'>".$type."</span></td>
                            <td>VA</td>
                        </tr>
                        <tr>
                            <td>".$lang['avg_bill']."</td>
                            <td>:</td>
                            <td><span id='avgbill_export'>".$avgbill."</span></td>
                            <td>IDR</td>
                        </tr>
                        <tr>
                            <td>".$lang['modul_type']."</td>
                            <td>:</td>
                            <td><span id='module_type_export'>".$module_type."</span></td>
                            <td>Wp</td>
                        </tr>
                    </table>
                </td>


                <!-- output-->
                <td>
                    <table>
                        <tr>
                            <td>".$lang['new_system_size']."</td>
                            <td>:</td>
                            <td><span id='new_system_size_export'>".$new_system_size."</span></td>
                            <td>kWp</td>
                        </tr>
                        <tr>
                            <td>".$lang['roof_space']."</td>
                            <td>:</td>
                            <td><span id='roof_space_export'>".$roof_space."</span></td>
                            <td>m2</td>
                        </tr>
                        <tr>
                            <td>".$lang['system_cost']."</td>
                            <td>:</td>
                            <td><span id='system_cost_export'>".$system_cost."</span></td>
                            <td>IDR</td>
                        </tr>

                        <tr>
                            <td>".$lang['monthly_electricity_use']."</td>
                            <td>:</td>
                            <td><span id='monthly_electricity_use'>".$monthly_electricity_use."</span></td>
                            <td>kWh</td>
                        </tr>
                        <tr>
                            <td>".$lang['monthly_solar_energy_production']."</td>
                            <td>:</td>
                            <td><span id='monthly_solar_energy_production'>".$monthly_solar_energy_production."</span></td>
                            <td>kWh</td>
                        </tr>
                        <tr>
                            <td>".$lang['monthly_solar_energy_use']."</td>
                            <td>:</td>
                            <td><span id='monthly_solar_energy_use'>".$monthly_solar_energy_use."</span></td>
                            <td>kWh</td>
                        </tr>
                        <tr>
                            <td>".$lang['monthly_electricity_fed_back_into_pln_grid']."</td>
                            <td>:</td>
                            <td><span id='monthly_electricity_fed_back_into_pln_grid_export'>".$monthly_electricity_fed_back_into_pln_grid."</span></td>
                            <td>kWh</td>
                        </tr>
            
                        <tr>
                            <td>".$lang['monthly_electricity_imported_from_pln_grid']."</td>
                            <td>:</td>
                            <td><span id='monthly_electricity_imported_from_pln_grid_export'>".$monthly_electricity_imported_from_pln_grid."</span></td>
                            <td>kWh</td>
                        </tr>
                        <tr>
                            <td>".$lang['new_monthly_bill']."</td>
                            <td>:</td>
                            <td><span id='new_monthly_bill_export'>".$new_monthly_bill."</span></td>
                            <td>IDR</td>
                        </tr>
                        <tr>
                            <td>".$lang['monthly_savings']."</td>
                            <td>:</td>
                            <td><span id='monthly_savings'>".$monthly_savings."</span></td>
                            <td>IDR</td>
                        </tr>
                        <tr>
                            <td>".$lang['monthly_savings_ip']."</td>
                            <td>:</td>
                            <td><span id='monthly_savings_ip'>".$monthly_savings_ip."</span></td>
                            <td>%</td>
                        </tr>
                        <tr>
                            <td>".$lang['payback_period']."</td>
                            <td>:</td>
                            <td><span id='payback_period'>".$payback_period."</span></td>
                            <td>Year</td>
                        </tr>
                        <tr>
                            <td>".$lang['emission_saved']."</td>
                            <td>:</td>
                            <td><span id='emission_saved'>".$emission_saved."</span></td>
                            <td>kg CO<sub>2</sub></td>
                        </tr>
                        <tr>
                            <td>".$lang['planting']."</td>
                            <td>:</td>
                            <td><span id='planting_export'>".$planting."</span></td>
                            <td>Trees</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table><br><br>"; // Ambil pesan dari inputan form

$mail = new PHPMailer;
$mail->isSMTP();

$mail->Host = $email_host;
$mail->Username = $email_username; // Email Pengirim
$mail->Password = $email_password; // Isikan dengan Password email pengirim
$mail->Port = $email_port;
$mail->SMTPAuth = $email_smtpauth;
$mail->SMTPSecure = $email_smtpsecure;
// $mail->SMTPDebug = 2; // Aktifkan untuk melakukan debugging

$mail->setFrom($email_pengirim, $nama_pengirim);
$mail->addAddress($email_penerima, '');
$mail->isHTML(true); // Aktifkan jika isi emailnya berupa html

// Load file content.php
ob_start();
include "email_content.php";

$content = ob_get_contents(); // Ambil isi file content.php dan masukan ke variabel $content
ob_end_clean();

$mail->Subject = $subjek;
$mail->Body = $content;
$mail->AddEmbeddedImage('../../assets/img/solarlab-logo2.png', 'logo_mynotescode', 'logo.png'); // Aktifkan jika ingin menampilkan gambar dalam email

    $send = $mail->send();

    if($send){ // Jika Email berhasil dikirim
        echo "<h1>Email berhasil dikirim</h1><br /><a href='index.php'>Kembali ke Form</a>";
    }else{ // Jika Email gagal dikirim
        echo "<h1>Email gagal dikirim</h1><br /><a href='index.php'>Kembali ke Form</a>";
        // echo '<h1>ERROR<br /><small>Error while sending email: '.$mail->getError().'</small></h1>'; // Aktifkan untuk mengetahui error message
    }
?>
