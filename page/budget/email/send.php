<?php
$name_province_image = "7757563278";
$data_irradiance_image = "7757563278";
$electrical_power_image = "7757563278";
$type_image = "7757563278";
$avgbill_image = "7757563278";
$module_type_image = "7757563278";
$system_size_image = "7757563278";

$system_cost_image = "7757563278";
$monthly_savings_ip_image = "7757563278";
$monthly_savings_image = "7757563278";
$payback_period_image = "7757563278";
$emission_saved_image = "7757563278";
$planting_image = "7757563278";
$new_system_size_image = "7757563278";
$roof_space_image = "7757563278";
$monthly_solar_energy_production_image = "7757563278";
$monthly_electricity_use_image = "7757563278";
$monthly_solar_energy_use_image = "7757563278";
$monthly_electricity_fed_back_into_pln_grid_image = "7757563278";
$monthly_electricity_imported_from_pln_grid_image = "7757563278";
$new_monthly_bill_image = "7757563278";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include librari phpmailer
include('phpmailer/Exception.php');
include('phpmailer/PHPMailer.php');
include('phpmailer/SMTP.php');

$email_pengirim = 'calsolarlab@solarlab.id'; // Isikan dengan email pengirim
$nama_pengirim = 'Solarlab Calculator'; // Isikan dengan nama pengirim
$email_penerima = $_POST['email_penerima']; // Ambil email penerima dari inputan form
$subjek = "System Size"; // Ambil subjek dari inputan form
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
                            <td>Province</td>
                            <td>:</td>
                            <td><span id='name_province'>".$name_province_image."</span></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Data Irradiance</td>
                            <td>:</td>
                            <td><span id='data_irradiance'>".$data_irradiance_image."</span></td>
                            <td>kWh/kWp</td>
                        </tr>

                        <tr>
                            <td>Electrical Power</td>
                            <td>:</td>
                            <td><span id='electrical_power'>".$electrical_power_image."</span></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>(Type)</td>
                            <td>:</td>
                            <td><span id='type_image'>".$type_image."</span></td>
                            <td>VA</td>
                        </tr>
                        <tr>
                            <td>Avg. bill (monthly)</td>
                            <td>:</td>
                            <td><span id='avgbill_image'>".$avgbill_image."</span></td>
                            <td>IDR</td>
                        </tr>
                        <tr>
                            <td>Module Type</td>
                            <td>:</td>
                            <td><span id='module_type_image'>".$module_type_image."</span></td>
                            <td>Wp</td>
                        </tr>
                        <tr>
                            <td>System Size</td>
                            <td>:</td>
                            <td><span id='system_size_image'>".$system_size_image."</span></td>
                            <td>kWp</td>
                        </tr>
                    </table>
                </td>


                <!-- output-->
                <td>
                    <table>
                        <tr>
                            <td>New System Size</td>
                            <td>:</td>
                            <td><span id='new_system_size_image'>".$new_system_size_image."</span></td>
                            <td>kWp</td>
                        </tr>
                        <tr>
                            <td>Roof Space</td>
                            <td>:</td>
                            <td><span id='roof_space_image'>".$roof_space_image."</span></td>
                            <td>m2</td>
                        </tr>
                        <tr>
                            <td>System Cost</td>
                            <td>:</td>
                            <td><span id='system_cost_image'>".$system_cost_image."</span></td>
                            <td>IDR</td>
                        </tr>

                        <tr>
                            <td>Monthly Electricity Use</td>
                            <td>:</td>
                            <td><span id='monthly_electricity_use'>".$monthly_electricity_use_image."</span></td>
                            <td>kWh</td>
                        </tr>
                        <tr>
                            <td>Monthly Solar Energy Production</td>
                            <td>:</td>
                            <td><span id='monthly_solar_energy_production'>".$monthly_solar_energy_production_image."</span></td>
                            <td>kWh</td>
                        </tr>
                        <tr>
                            <td>Monthly Solar Energy Use</td>
                            <td>:</td>
                            <td><span id='monthly_solar_energy_use'>".$monthly_solar_energy_use_image."</span></td>
                            <td>kWh</td>
                        </tr>
                        <tr>
                            <td>Monthly Electricity Fed Back<br>Into PLN Grid (65%)</td>
                            <td>:</td>
                            <td><span id='monthly_electricity_fed_back_into_pln_grid_image'>".$monthly_electricity_fed_back_into_pln_grid_image."</span></td>
                            <td>kWh</td>
                        </tr>
            
                        <tr>
                            <td>Monthly Energy Importen From PLN</td>
                            <td>:</td>
                            <td><span id='monthly_electricity_imported_from_pln_grid_image'>".$monthly_electricity_imported_from_pln_grid_image."</span></td>
                            <td>kWh</td>
                        </tr>
                        <tr>
                            <td>New Monthly Bill</td>
                            <td>:</td>
                            <td> <span id='new_monthly_bill_image'>".$new_monthly_bill_image."</span></td>
                            <td>IDR</td>
                        </tr>
                        <tr>
                            <td>Monthly Saving</td>
                            <td>:</td>
                            <td><span id='monthly_savings'>".$monthly_savings_image."</span></td>
                            <td>IDR</td>
                        </tr>
                        <tr>
                            <td>Monthly Saving (In Percent)</td>
                            <td>:</td>
                            <td><span id='monthly_savings'>".$monthly_savings_ip_image."</span></td>
                            <td>%</td>
                        </tr>
                        <tr>
                            <td>Payback Period</td>
                            <td>:</td>
                            <td><span id='payback_period'>".$payback_period_image."</span></td>
                            <td>Year</td>
                        </tr>
                        <tr>
                            <td>Emission Saved</td>
                            <td>:</td>
                            <td><span id='emission_saved'>".$emission_saved_image."</span></td>
                            <td>kg CO2</td>
                        </tr>
                        <tr>
                            <td>(Equal To) Planting</td>
                            <td>:</td>
                            <td><span id='planting_image'>".$planting_image."</span></td>
                            <td>Trees</td>
                        </tr>
                        
                    </table>
                </td>
            </tr>
        </table><br><br>"; // Ambil pesan dari inputan form
$attachment = $_FILES['attachment']['name']; // Ambil nama file yang di upload

$mail = new PHPMailer;
$mail->isSMTP();

$mail->Host = 'solarlab.id';
$mail->Username = $email_pengirim; // Email Pengirim
$mail->Password = 'calsolarlab404'; // Isikan dengan Password email pengirim
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
// $mail->SMTPDebug = 2; // Aktifkan untuk melakukan debugging

$mail->setFrom($email_pengirim, $nama_pengirim);
$mail->addAddress($email_penerima, '');
$mail->isHTML(true); // Aktifkan jika isi emailnya berupa html

// Load file content.php
ob_start();
include "content.php";

$content = ob_get_contents(); // Ambil isi file content.php dan masukan ke variabel $content
ob_end_clean();

$mail->Subject = $subjek;
$mail->Body = $content;
$mail->AddEmbeddedImage('../../../assets/img/solarlab-logo2.png', 'logo_mynotescode', 'logo.png'); // Aktifkan jika ingin menampilkan gambar dalam email

if(empty($attachment)){ // Jika tanpa attachment
    $send = $mail->send();

    if($send){ // Jika Email berhasil dikirim
        echo "<h1>Email berhasil dikirim</h1><br /><a href='index.php'>Kembali ke Form</a>";
    }else{ // Jika Email gagal dikirim
        echo "<h1>Email gagal dikirim</h1><br /><a href='index.php'>Kembali ke Form</a>";
        // echo '<h1>ERROR<br /><small>Error while sending email: '.$mail->getError().'</small></h1>'; // Aktifkan untuk mengetahui error message
    }
}else{ // Jika dengan attachment
    $tmp = $_FILES['attachment']['tmp_name'];
    $size = $_FILES['attachment']['size'];

    if($size <= 25000000){ // Jika ukuran file <= 25 MB (25.000.000 bytes)
        $mail->addAttachment($tmp, $attachment); // Add file yang akan di kirim

        $send = $mail->send();

        if($send){ // Jika Email berhasil dikirim
            echo "<h1>Email berhasil dikirim</h1><br /><a href='index.php'>Kembali ke Form</a>";
        }else{ // Jika Email gagal dikirim
            echo "<h1>Email gagal dikirim</h1><br /><a href='index.php'>Kembali ke Form</a>";
            // echo '<h1>ERROR<br /><small>Error while sending email: '.$mail->getError().'</small></h1>'; // Aktifkan untuk mengetahui error message
        }
    }else{ // Jika Ukuran file lebih dari 25 MB
        echo "<h1>Ukuran file attachment maksimal 25 MB</h1><br /><a href='index.php'>Kembali ke Form</a>";
    }
}
?>
