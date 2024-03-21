<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
</head>
<body>
    <div style="float: left;margin-right: 10px;">
        <img src="cid:logo_mynotescode" alt="Logo" style="height: 50px">
    </div>

    <div style="clear: both"></div>
    <hr/>

    <div style="text-align: justify">
        <?php 
        if ($_SESSION['calculator_type'] == 'system_size') {
            $iconbut = '1';
        }else if ($_SESSION['calculator_type'] == 'budget') {
            $iconbut = '2';
        }else if ($_SESSION['calculator_type'] == 'expected_saving') {
            $iconbut = '3';
        }
        echo "<div style='margin-left: 35px; width: 80%;'>
        <br><br>
        <table align='center' border='0'>
            <tr>
                <td style='border-bottom:2px solid #03239C;border-right:2px solid #03239C;'><img width='100' src='https://kalkulator.solarhub.id/assets/img/solarlab-logo2.png'></td>
                <td style='border-bottom:2px solid #03239C;''><img width='40' src='https://kalkulator.solarhub.id/assets/img/icon/".$iconbut.".png'></td>
                <td width='800' style='color: #03239C; border-bottom:2px solid #03239C;padding-top: 12px;'>Best Performance | ".ucwords(str_replace("_"," ", $_SESSION['calculator_type']))."</td>
            </tr>
        </table><br><br><br>".$pesan."<hr>
        <h3 style='font-size: 12px;'>  Copyright &copy;". date('Y')."Solar Hub Indonesia</h3>
    </div>"; // Tampilkan isi pesan ?>
    </div>
</body>
</html>
