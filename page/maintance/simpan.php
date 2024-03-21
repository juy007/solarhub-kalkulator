<?php
 
// membaca value dari form
 
$background = $_POST['background'];
$fontHeading = $_POST['fontHeading'];
$fontSizeHeading = $_POST['fontSizeHeading'];
$fontColorHeading = $_POST['fontColorHeading'];
$fontParagraf = $_POST['fontParagraf'];
$fontColorParagraf = $_POST['fontColorParagraf'];
$fontSizeParagraf = $_POST['fontSizeParagraf'];
$alignment = $_POST['alignment'];
 
// membuat baris yang akan ditulis ke file config.php
// untuk setiap value misal: $background = "#FFFFFF";
 
$background = "\$background = \"".$background."\";\n";
$fontHeading = "\$fontHeading = \"".$fontHeading."\";\n";
$fontSizeHeading = "\$fontSizeHeading = \"".$fontSizeHeading."\";\n";
$fontColorHeading = "\$fontColorHeading = \"".$fontColorHeading."\";\n";
$fontParagraf = "\$fontParagraf = \"".$fontParagraf."\";\n";
$fontColorParagraf = "\$fontColorParagraf = \"".$fontColorParagraf."\";\n";
$fontSizeParagraf = "\$fontSizeParagraf = \"".$fontSizeParagraf."\";\n";
$alignment = "\$alignment = \"".$alignment."\";\n";
 
 
// nama file yang akan dibaca
 
$file = "config.php";
 
// membaca file dan menyatakan isi file ke dalam array
 
$arrayRead = file($file);
 
// mengubah isi setiap elemen array dengan nilai yang baru
 
$arrayRead[1] = $background;
$arrayRead[2] = $fontHeading;
$arrayRead[3] = $fontSizeHeading;
$arrayRead[4] = $fontColorHeading;
$arrayRead[5] = $fontParagraf;
$arrayRead[6] = $fontColorParagraf;
$arrayRead[7] = $fontSizeParagraf;
$arrayRead[8] = $alignment;
 
// menyimpan kembali isi array yang baru ke file
$simpan = file_put_contents($file, implode($arrayRead));
 
if ($simpan)  { 
      echo "<h2>Update tampilan sukses</h2>";
      echo "<p><a href=\"page.php\">Lihat tampilan</a></p>";      
}
else echo "<h2>Update tampilan gagal</h2>";
 
?>
