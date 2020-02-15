<?PHP
  // Original PHP code by Chirp Internet: www.chirp.com.au
  // Please acknowledge use of this code by including this header.
  // This code modded by Fajar Hadi x Telkom University

	include("connection.php");
  function cleanData(&$str)
  {
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
	
	// escape tab characters
    $str = preg_replace("/\t/", "\\t", $str);

    // escape new lines
    $str = preg_replace("/\r?\n/", "\\n", $str);

    // convert 't' and 'f' to boolean values
    if($str == 't') $str = 'TRUE';
    if($str == 'f') $str = 'FALSE';

    // force certain number/date formats to be imported as strings
    if(preg_match("/^0/", $str) || preg_match("/^\+?\d{8,}$/", $str) || preg_match("/^\d{4}.\d{1,2}.\d{1,2}/", $str)) {
      $str = "'$str";
    }

    // escape fields that include double quotes
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
	
  }
	//$exportDateicon = $_GET['exportDateicon'];
	//print_r($_POST);
if(isset($_POST['export']) and !empty($_POST['exportDateicon'])){ 
	
  // filename for download
  $filename = "data_icon" . date('Ymd') . ".xls";

	//header("Content-Disposition: attachment; filename=\"$filename\"");
	//header("Content-Type: application/vnd.ms-excel");
	header("Content-Type: text/plain");
	
	$exportDateicon = $_POST['exportDateicon'];
  $flag = false;
  $sql = "SELECT id,gardu_induk,down_time,up_time,int_errortime,keterangan FROM rekap_icon where MONTH(down_time) = MONTH('$exportDateicon') and YEAR(down_time) = YEAR('$exportDateicon') ORDER BY down_time ASC";
  $result = mysqli_query($db, $sql) or die('Query failed!');
  while($row = mysqli_fetch_assoc($result)) {
    if(!$flag) {
      // display field/column names as first row
      echo implode("\t", array_keys($row)) . "\r\n";
      $flag = true;
    }
    array_walk($row, __NAMESPACE__ . '\cleanData');
    echo implode("\t", array_values($row)) . "\r\n";
  }
	
	}elseif(isset($_POST['export']) and empty($_POST['exportDateicon'])){
	//$exportDate = $_GET['exportDate'];
	//print_r($_GET);
	
	$filename = "data_icon" . date('Ymd') . ".xls";

		  header("Content-Disposition: attachment; filename=\"$filename\"");
		  header("Content-Type: application/vnd.ms-excel");
	$flag = false;
		  $sql = "SELECT * FROM rekapicon ORDER BY id DESC";
		  $result = mysqli_query($db, $sql) or die('Query failed!');
		  while($row = mysqli_fetch_assoc($result)) {
			if(!$flag) {
			  // display field/column names as first row
			  echo implode("\t", array_keys($row)) . "\r\n";
			  $flag = true;
			}
			array_walk($row, __NAMESPACE__ . '\cleanData');
			echo implode("\t", array_values($row)) . "\r\n";
		  }  
  }
  
  
  //EXCEL NODIN
  
  if(isset($_POST['exportButtonExNod']) and !empty($_POST['exportDatenodin'])){ 
	
  // filename for download
  $filename = "data_nodin" . date('Ymd') . ".xls";

	//header("Content-Disposition: attachment; filename=\"$filename\"");
	//header("Content-Type: application/vnd.ms-excel");
	header("Content-Type: text/plain");
	
	$exportDatenodin = $_POST['exportDatenodin'];
  $flag = false;
  $sql = "SELECT * FROM rekap_nodin where Month(tanggal_awal)=Month('$exportDatenodin') ORDER BY id ASC";
  $result = mysqli_query($db, $sql) or die('Query failed!');
  while($row = mysqli_fetch_assoc($result)) {
    if(!$flag) {
      // display field/column names as first row
      echo implode("\t", array_keys($row)) . "\r\n";
      $flag = true;
    }
    array_walk($row, __NAMESPACE__ . '\cleanData');
    echo implode("\t", array_values($row)) . "\r\n";
  }
	
	}elseif(isset($_POST['exportButtonExNod']) and empty($_POST['exportDatenodin'])){
	//$exportDate = $_GET['exportDate'];
	//print_r($_GET);
  
	$filename = "data_nodin_" . date('Ymd') . ".xls";

		  //header("Content-Disposition: attachment; filename=\"$filename\"");
		  //header("Content-Type: application/vnd.ms-excel");
		  header("Content-Type: text/plain");
		  
		  $flag = false;
		  $sql = "SELECT * FROM rekap_nodin ORDER BY id DESC";
		  $result = mysqli_query($db, $sql) or die('Query failed!');
		  while($row = mysqli_fetch_assoc($result)) {
			if(!$flag) {
			  // display field/column names as first row
			  echo implode("\t", array_keys($row)) . "\r\n";
			  $flag = true;
			}
			array_walk($row, __NAMESPACE__ . '\cleanData');
			echo implode("\t", array_values($row)) . "\r\n";
		  }  
  }
  
  //EXPORT PDF NODIN
  if(isset($_POST['exportButtonPdfN']) and !empty($_POST['exportDatenodin'])){
		$path = (getenv('MPDF_ROOT')) ? getenv('MPDF_ROOT') : __DIR__;
		require_once $path . '/vendor/autoload.php';
		$exportDatenodin = $_POST['exportDatenodin'];

		
$mpdf = new \Mpdf\Mpdf([
	'margin_left' => 20,
	'margin_right' => 15,
	'margin_top' => 48,
	'margin_bottom' => 25,
	'margin_header' => 10,
	'margin_footer' => 10
]);


$html = '
<style>
body {font-family: sans-serif;
	font-size: 10pt;
}
#div1 { 
   display:inline-block; 
} 

#img { 
 float:left; 
}
p {	margin: 0pt; }
table.items {
	border: 0.1mm solid #000000;
}
td { vertical-align: top; }
.items td {
	border-left: 0.1mm solid #000000;
	border-right: 0.1mm solid #000000;
	border-top: 0.1mm solid #000000;
}
table thead td { background-color: #EEEEEE;
	text-align: center;
	border: 0.1mm solid #000000;
	font-variant: small-caps;
}
.items td.blanktotal {
	background-color: #EEEEEE;
	border: 0.1mm solid #000000;
	background-color: #FFFFFF;
	border: 0mm none #000000;
	border-top: 0.1mm solid #000000;
	border-right: 0.1mm solid #000000;
}
.items td.totals {
	text-align: right;
	border: 0.1mm solid #000000;
}
.items td.cost {
	text-align: "." center;
}
</style>
</head>
<body>

<!--mpdf
<htmlpageheader name="myheader">
<img id="img" src="pln.png" alt="PT.PLN(Persero)" width=70px height=90px> 
<div align="left" style="color:#0000BB; border-bottom: 1px solid #000000;" margin:"auto"> 
<span style="font-weight: bold; font-size: 14pt;">PT. PLN(Persero)</span><br />Jalan. Embong Wungu<br />Surabaya<br />Kode Pos<br /><span style="font-family:dejavusanscondensed;">&#9742;</span>031-</div></htmlpageheader>

<htmlpagefooter name="myfooter">
<div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
Hal {PAGENO} dari {nb}
</div>
</htmlpagefooter>

<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
<sethtmlpagefooter name="myfooter" value="on" />
mpdf-->
<br />

<table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
<thead>
<tr>
<td width="10%">No</td>
<td width="15%">Nama Nodin</td>
<td width="20%">Tanggal Diterima</td>
<td width="20%">Tanggal Selesai</td>
<td width="10%">Keterangan</td>
</tr>
</thead>
<tbody>';
//<!-- ITEMS HERE -->								

$i=1;
$sql = "SELECT * FROM rekap_nodin where MONTH(tanggal_awal) = MONTH('$exportDatenodin') and YEAR(tanggal_awal) = YEAR('$exportDatenodin') ORDER BY tanggal_awal ASC";
$query = mysqli_query($db, $sql);
while($icon = mysqli_fetch_array($query)){
$html .= '<tr>
<td align="center">'.$i.'</td>
<td align="center">'.$icon['nama'].'</td>
<td align="center">'.$icon['tanggal_awal'].'</td>
<td align="center">'.$icon['tanggal_akhir'].'</td>
<td align="center">'.$icon['keterangan'].'</td>
';
$i++;
}
$html .= '
<!-- END ITEMS HERE -->

</tbody>
</table>


<div style="text-align: center; font-style: italic;"></div>

';

$mpdf->SetProtection(array('print'));
$mpdf->SetTitle("Laporan Bulanan SCADA");
$mpdf->SetAuthor("");
$mpdf->watermark_font = 'DejaVuSansCondensed';
$mpdf->watermarkTextAlpha = 0.1;
$mpdf->SetDisplayMode('fullpage');

$mpdf->WriteHTML($html);

$mpdf->Output();
	}
  
  
  //EXPORT PDF ICON
	
	if(isset($_POST['exportPDF']) and !empty($_POST['exportDateicon'])){
		$path = (getenv('MPDF_ROOT')) ? getenv('MPDF_ROOT') : __DIR__;
		require_once $path . '/vendor/autoload.php';
		$flag2 = true;
		$exportDateicon = $_POST['exportDateicon'];

		
$mpdf = new \Mpdf\Mpdf([
	'margin_left' => 20,
	'margin_right' => 15,
	'margin_top' => 48,
	'margin_bottom' => 25,
	'margin_header' => 10,
	'margin_footer' => 10
]);


$html = '
<style>
body {font-family: sans-serif;
	font-size: 10pt;
}
#div1 { 
   display:inline-block; 
} 

#img { 
 float:left; 
}
p {	margin: 0pt; }
table.items {
	border: 0.1mm solid #000000;
}
td { vertical-align: top; }
.items td {
	border-left: 0.1mm solid #000000;
	border-right: 0.1mm solid #000000;
	border-top: 0.1mm solid #000000;
}
table thead td { background-color: #EEEEEE;
	text-align: center;
	border: 0.1mm solid #000000;
	font-variant: small-caps;
}
.items td.blanktotal {
	background-color: #EEEEEE;
	border: 0.1mm solid #000000;
	background-color: #FFFFFF;
	border: 0mm none #000000;
	border-top: 0.1mm solid #000000;
	border-right: 0.1mm solid #000000;
}
.items td.totals {
	text-align: right;
	border: 0.1mm solid #000000;
}
.items td.cost {
	text-align: "." center;
}
</style>
</head>
<body>

<!--mpdf
<htmlpageheader name="myheader">
<img id="img" src="pln.png" alt="PT.PLN(Persero)" width=70px height=90px> 
<div align="left" style="color:#0000BB; border-bottom: 1px solid #000000;" margin:"auto"> 
<span style="font-weight: bold; font-size: 14pt;">PT. PLN(Persero)</span><br />Jalan. Embong Wungu<br />Surabaya<br />Kode Pos<br /><span style="font-family:dejavusanscondensed;">&#9742;</span>031-</div></htmlpageheader>

<htmlpagefooter name="myfooter">
<div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
Hal {PAGENO} dari {nb}
</div>
</htmlpagefooter>

<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
<sethtmlpagefooter name="myfooter" value="on" />
mpdf-->
<br />

<table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
<thead>
<tr>
<td width="10%">No</td>
<td width="15%">Peralatan</td>
<td width="20%">Waktu Gangguan</td>
<td width="20%">Waktu Teratasi</td>
<td width="10%">Lama Gangguan(jam)</td>
<td width="25%">Keterangan</td>
</tr>
</thead>
<tbody>';
//<!-- ITEMS HERE -->								

$i=1;
$sql = "SELECT * FROM rekap_icon where MONTH(down_time) = MONTH('$exportDateicon') and YEAR(up_time) = YEAR('$exportDateicon') ORDER BY down_time ASC";
$query = mysqli_query($db, $sql);
while($icon = mysqli_fetch_array($query)){
$html .= '<tr>
<td align="center">'.$i.'</td>
<td align="center">'.$icon['gardu_induk'].'</td>
<td align="center">'.$icon['down_time'].'</td>
<td align="center">'.$icon['up_time'].'</td>
<td align="center">'.$icon['int_errortime'].'</td>
<td align="center">'.$icon['keterangan'].'</td>
';
$i++;
}
$html .= '
<!-- END ITEMS HERE -->

</tbody>
</table>


<div style="text-align: center; font-style: italic;"></div>

';

$mpdf->SetProtection(array('print'));
$mpdf->SetTitle("Laporan Bulanan SCADA");
$mpdf->SetAuthor("");
$mpdf->watermark_font = 'DejaVuSansCondensed';
$mpdf->watermarkTextAlpha = 0.1;
$mpdf->SetDisplayMode('fullpage');

$mpdf->WriteHTML($html);

$mpdf->Output();
	}
	
 
?>