<?php 
define("BASEPATH", dirname(__FILE__));
include '../../config/config.php';
$date= date('d/m/Y');
mysqli_query($conn,"INSERT INTO export_amount VALUES('','budget','pdf','','$date')");

$name_province_export = $_POST['name_province_export'];
$data_irradiance_export = $_POST['data_irradiance_export'];
$electrical_power_export = $_POST['electrical_power_export'];
$type_export = $_POST['type_export'];
$avgbill_export = $_POST['avgbill_export'];
$module_type_export = $_POST['module_type_export'];
$budget_export = $_POST['budget_export'];

$new_system_cost_export = $_POST['new_system_cost_export'];
$monthly_savings_ip_export = $_POST['monthly_savings_ip_export'];
$monthly_savings_export = $_POST['monthly_savings_export'];
$payback_period_export = $_POST['payback_period_export'];
$emission_saved_export = $_POST['emission_saved_export'];
$planting_export = $_POST['planting_export'];
$new_system_size_export = $_POST['new_system_size_export'];
$roof_space_export = $_POST['roof_space_export'];
$monthly_solar_energy_production_export = $_POST['monthly_solar_energy_production_export'];
$monthly_electricity_use_export = $_POST['monthly_electricity_use_export'];
$monthly_solar_energy_use_export = $_POST['monthly_solar_energy_use_export'];
$monthly_electricity_fed_back_into_pln_grid_export = $_POST['monthly_electricity_fed_back_into_pln_grid_export'];
$monthly_electricity_imported_from_pln_grid_export = $_POST['monthly_electricity_imported_from_pln_grid_export'];
$new_monthly_bill_export = $_POST['new_monthly_bill_export'];

require_once '../../assets/html2pdfnew/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try {
    ob_start();
?>
<html>
<head>
	<title>PDF</title>

    <!-- Custom CSS -->
    <link href="../../assets/page/dist/css/style.min.css" rel="stylesheet">
</head>
<body>
	<div style="margin-left: 35px; width: 80%;">
		<br><br>
		<table align="center" border="0">
			<tr>
				<td style="border-bottom:2px solid #03239C;border-right:2px solid #03239C;"><img width="100" src="../../assets/img/solarlab-logo2.png"></td>
				<td style="border-bottom:2px solid #03239C;"></td>
				<td width="800" style="color: #03239C; border-bottom:2px solid #03239C;padding-top: 5px;"><?php echo $lang['budget']; ?></td>
			</tr>
		</table><br>
		<table align="center" border="0">
			<tr>
				<td width="800" align="center"><span style="color: #275798;"><?php echo $lang['disclaimer2']; ?></span></td>
			</tr>
			
		</table>
		<br><br>
		<table align="center" border="0">
			<tr>
				<td style="border-bottom:2px solid #03239C;">&nbsp;<b><i class="fas fa-download"></i> INPUT</b></td>
				<td rowspan="2" width="30" style="border-right: 2px solid #03239C;"></td>
				<td rowspan="2" width="30"></td>
				<td style="border-bottom:2px solid #03239C;">&nbsp;<b><i class="fas fa-upload"></i> OUTPUT</b></td>
			</tr>
			<tr>
				<!-- input-->
				<td valign="top">
					<table>
						<tr>
							<td><?php echo $lang['detect_location']; ?></td>
							<td>:</td>
							<td><span id="name_province"><?php echo $name_province_export; ?></span></td>
							<td></td>
						</tr>
						<tr>
							<td><?php echo $lang['solar_pv_output']; ?></td>
							<td>:</td>
							<td><span id="data_irradiance"><?php echo $data_irradiance_export; ?></span></td>
							<td>kWh/kWp</td>
						</tr>

						<tr>
							<td><?php echo $lang['electrical_power']; ?></td>
							<td>:</td>
							<td><span id="electrical_power"><?php echo $electrical_power_export; ?></span></td>
							<td></td>
						</tr>
						<tr>
							<td><?php echo $lang['type']; ?></td>
							<td>:</td>
							<td><span id="type_export"><?php echo $type_export; ?></span></td>
							<td>VA</td>
						</tr>
						<tr>
							<td><?php echo $lang['avg_bill']; ?></td>
							<td>:</td>
							<td><span id="avgbill_export"><?php echo $avgbill_export; ?></span></td>
							<td>IDR</td>
						</tr>
						<tr>
							<td><?php echo $lang['modul_type']; ?></td>
							<td>:</td>
							<td><span id="module_type_export"><?php echo $module_type_export; ?></span></td>
							<td>Wp</td>
						</tr>
						<tr>
							<td><?php echo $lang['budget']; ?></td>
							<td>:</td>
							<td><span id="budget_export"><?php echo $budget_export; ?></span></td>
							<td>IDR</td>
						</tr>
					</table>
				</td>


				<!-- output-->
				<td>
					<table>
						<tr>
							<td><?php echo str_replace('<br>', ' ',$lang['new_system_size']); ?></td>
							<td>:</td>
							<td><span id="new_system_size_export"><?php echo $new_system_size_export; ?></span></td>
							<td>kWp</td>
						</tr>
						<tr>
							<td><?php echo str_replace('<br>', ' ',$lang['roof_space']); ?></td>
							<td>:</td>
							<td><span id="roof_space_export"><?php echo $roof_space_export; ?></span></td>
							<td>m2</td>
						</tr>
						<tr>
							<td><?php echo $lang['system_cost']; ?></td>
							<td>:</td>
							<td><span id="new_system_cost_export"><?php echo $new_system_cost_export; ?></span></td>
							<td>IDR</td>
						</tr>

						<tr>
							<td><?php echo $lang['monthly_electricity_use']; ?></td>
							<td>:</td>
							<td><span id="monthly_electricity_use"><?php echo $monthly_electricity_use_export; ?></span></td>
							<td>kWh</td>
						</tr>
						<tr>
							<td><?php echo str_replace('<br>', ' ',$lang['monthly_solar_energy_production']); ?></td>
							<td>:</td>
							<td><span id="monthly_solar_energy_production"><?php echo $monthly_solar_energy_production_export; ?></span></td>
							<td>kWh</td>
						</tr>
						<tr>
							<td><?php echo $lang['monthly_solar_energy_use']; ?></td>
							<td>:</td>
							<td><span id="monthly_solar_energy_use"><?php echo $monthly_solar_energy_use_export; ?></span></td>
							<td>kWh</td>
						</tr>
						<tr>
							<td><?php echo $lang['monthly_electricity_fed_back_into_pln_grid']; ?></td>
							<td>:</td>
							<td><span id="monthly_electricity_fed_back_into_pln_grid_export"><?php echo $monthly_electricity_fed_back_into_pln_grid_export; ?></span></td>
							<td>kWh</td>
						</tr>
			
						<tr>
							<td><?php echo $lang['monthly_electricity_imported_from_pln_grid']; ?></td>
							<td>:</td>
							<td><span id="monthly_electricity_imported_from_pln_grid_export"><?php echo $monthly_electricity_imported_from_pln_grid_export; ?></span></td>
							<td>kWh</td>
						</tr>
						<tr>
							<td><?php echo $lang['new_monthly_bill']; ?></td>
							<td>:</td>
							<td> <span id="new_monthly_bill_export"><?php echo $new_monthly_bill_export; ?></span></td>
							<td>IDR</td>
						</tr>
						<tr>
							<td><?php echo $lang['monthly_savings']; ?></td>
							<td>:</td>
							<td><span id="monthly_savings"><?php echo $monthly_savings_export; ?></span></td>
							<td>IDR</td>
						</tr>
						<tr>
							<td><?php echo $lang['monthly_savings_ip']; ?></td>
							<td>:</td>
							<td><span id="monthly_savings"><?php echo $monthly_savings_ip_export; ?></span></td>
							<td>%</td>
						</tr>
						<tr>
							<td><?php echo $lang['payback_period']; ?></td>
							<td>:</td>
							<td><span id="payback_period"><?php echo $payback_period_export; ?></span></td>
							<td><?php echo $lang['year']; ?></td>
						</tr>
						<tr>
							<td><?php echo $lang['emission_saved']; ?></td>
							<td>:</td>
							<td><span id="emission_saved"><?php echo $emission_saved_export; ?></span></td>
							<td><?php echo $lang['kg_co2']; ?></td>
						</tr>
						<tr>
							<td><?php echo $lang['planting']; ?></td>
							<td>:</td>
							<td><span id="planting_export"><?php echo $planting_export; ?></span></td>
							<td><?php echo $lang['trees']; ?></td>
						</tr>
						
					</table>
				</td>
			</tr>
		</table><br><br><hr>
		<h3 style="font-size: 12px;">Copyright &copy; <?php echo date('Y'); ?> Solar Hub Indonesia</h3>
	</div>
</body>
</html>
<?php 
    $content = ob_get_clean();

    $html2pdf = new Html2Pdf('L', 'A4', 'fr');
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content);
    $html2pdf->output('Solarhub '.$lang['budget'].'.pdf');
} catch (Html2PdfException $e) {
    $html2pdf->clean();

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}