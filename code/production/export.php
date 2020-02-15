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
	//$exportDatered = $_GET['exportDatered'];
	//print_r($_POST); //FUNGSI UNTUK DEBUG POST DATA
	
	// SISTEM REDUNDANT METRO BARAT
	
	if(isset($_POST['exportButtonRed']) and !empty($_POST['exportDatered'])){ 
	
  // filename for download
  $filename = "data_red_barat" . date('Ymd') . ".xls";

	header("Content-Disposition: attachment; filename=\"$filename\"");
	header("Content-Type: application/vnd.ms-excel");
	// header("Content-Type: text/plain");
	
	$exportDatered = $_POST['exportDatered'];
  $flag = false;
  $sql = "SELECT * FROM redudant_barat where Month(down_time)= Month('$exportDatered') and YEAR(down_time)= YEAR('$exportDatered') ORDER BY id";
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
	
	}elseif(isset($_POST['exportButtonRed']) and empty($_POST['exportDatered'])){
	//$exportDate = $_GET['exportDate'];
	//print_r($_GET);
  
	$filename = "data_red_barat" . date('Ymd') . ".xls";

			header("Content-Disposition: attachment; filename=\"$filename\"");
		 	header("Content-Type: application/vnd.ms-excel");
		  //header("Content-Type: text/plain");
		  
		  $flag = false;
		  $sql = "SELECT * FROM redudant_barat ORDER BY id DESC";
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
	
	// Sistem StandAlone Metro Barat
	
	
	if(isset($_POST['exportButtonSA']) and !empty($_POST['exportDateSA'])){ 
	
  // filename for download
  $filename = "StandAlone-Metro-" . date('Ymd') . ".xls";

	header("Content-Disposition: attachment; filename=\"$filename\"");
	header("Content-Type: application/vnd.ms-excel");
	//header("Content-Type: text/plain"); //aktifkan line ini untuk debug
	
	$exportDateSA = $_POST['exportDateSA'];
  $flag = false;
  $sql = "SELECT * FROM standalone_barat where Month(down_time)=Month('$exportDateSA') and Year(down_time)= Year('$exportDateSA') ORDER BY id";
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
	
	}elseif(isset($_POST['exportButtonSA']) and empty($_POST['exportDateSA'])){
	//$exportDate = $_GET['exportDate'];
	//print_r($_GET);
  
	$filename = "StandAlone-Metro-" . date('Ymd') . ".xls";

		  header("Content-Type: text/plain");
			header("Content-Type: application/vnd.ms-excel");
			//header("Content-Type: text/plain");
		  
		  $flag = false;
		  $sql = "SELECT * FROM standalone_barat ORDER BY id DESC";
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
  
  
  //Peripheral Metro Barat
  
  
  if(isset($_POST['exportButtonPer']) and !empty($_POST['exportDatePer'])){ 
	
  // filename for download
  $filename = "Peripheral-Metro-" . date('Ymd') . ".xls";

	header("Content-Disposition: attachment; filename=\"$filename\"");
	header("Content-Type: application/vnd.ms-excel");
	//header("Content-Type: text/plain"); //aktifkan line ini untuk debug
	
	$exportDatePer = $_POST['exportDatePer'];
  $flag = false;
  $sql = "SELECT * FROM peripheral_barat where month(down_time)=Month('$exportDatePer') and Year(down_time)=Year('$exportDatePer') ORDER BY id";
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
	
	}elseif(isset($_POST['exportButtonPer']) and empty($_POST['exportDatePer'])){
	//$exportDate = $_GET['exportDate'];
	//print_r($_GET);
  
	$filename = "Peripheral-Metro-" . date('Ymd') . ".xls";

		header("Content-Disposition: attachment; filename=\"$filename\"");
		header("Content-Type: application/vnd.ms-excel");
	//	header("Content-Type: text/plain"); //aktifkan line ini untuk debug
		  
		  $flag = false;
		  $sql = "SELECT * FROM peripheral_barat ORDER BY id DESC";
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
  
  
	// SISTEM TIMUR //
	
	
	// SISTEM REDUNDANT TIMUR
	
	if(isset($_POST['exportButtonRedT']) and !empty($_POST['exportDateredT'])){ 
	
  // filename for download
  $filename = "REDUNDANT-TIMUR-" . date('Ymd') . ".xls";

	//header("Content-Disposition: attachment; filename=\"$filename\"");
	//header("Content-Type: application/vnd.ms-excel");
	header("Content-Type: text/plain");
	
	
	$exportDateredT = $_POST['exportDateredT'];
  $flag = false;
  $sql = "SELECT * FROM redudant_timur where Month(down_time)=Month('$exportDateredT') and Year(down_time)=Year('$exportDateredT') ORDER BY id";
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
	
	}elseif(isset($_POST['exportButtonRedT']) and empty($_POST['exportDateredT'])){
	//$exportDate = $_GET['exportDate'];
	//print_r($_GET);
  
	$filename = "REDUNDANT-TIMUR-" . date('Ymd') . ".xls";

			header("Content-Disposition: attachment; filename=\"$filename\"");
			header("Content-Type: application/vnd.ms-excel");
			//header("Content-Type: text/plain");
	
		  $flag = false;
		  $sql = "SELECT * FROM redudant_timur ORDER BY id DESC";
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
  
  
  // SISTEM StandAlone TIMUR
  
  
  if(isset($_POST['exportButtonSAT']) and !empty($_POST['exportDateSAT'])){ 
	
  // filename for download
  $filename = "StandAlone-Timur-" . date('Ymd') . ".xls";

	header("Content-Disposition: attachment; filename=\"$filename\"");
	header("Content-Type: application/vnd.ms-excel");
	//header("Content-Type: text/plain");
	
	$exportDateSAT = $_POST['exportDateSAT'];
  $flag = false;
  $sql = "SELECT * FROM standalone_timur where Month(down_time)=Month('$exportDateSAT') and Year(down_time)=Year('$exportDateSAT') ORDER BY id";
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
	
	}elseif(isset($_POST['exportButtonSAT']) and empty($_POST['exportDateSAT'])){
	//$exportDate = $_GET['exportDate'];
	//print_r($_GET);
  
	$filename = "StandAlone-Timur-" . date('Ymd') . ".xls";

			header("Content-Disposition: attachment; filename=\"$filename\"");
			header("Content-Type: application/vnd.ms-excel");
			//header("Content-Type: text/plain");
	
		  $flag = false;
		  $sql = "SELECT * FROM standalone_timur ORDER BY id DESC";
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
  
  
  // SISTEM Peripheral TIMUR
  
  if(isset($_POST['exportButtonPerT']) and !empty($_POST['exportDatePerT'])){ 
	
  // filename for download
  $filename = "Peripheral-TIMUR-" . date('Ymd') . ".xls";

	header("Content-Disposition: attachment; filename=\"$filename\"");
	header("Content-Type: application/vnd.ms-excel");
	//header("Content-Type: text/plain");

	$exportDatePerT = $_POST['exportDatePerT'];
  $flag = false;
  $sql = "SELECT * FROM peripheral_timur where Month(down_time)=Month('$exportDatePerT') and Year(down_time)=Year('$exportDatePerT') ORDER BY id";
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
	
	}elseif(isset($_POST['exportButtonPerT']) and empty($_POST['exportDatePerT'])){
	//$exportDate = $_GET['exportDate'];
	//print_r($_GET);
  
	$filename = "Peripheral-TIMUR-" . date('Ymd') . ".xls";

			header("Content-Disposition: attachment; filename=\"$filename\"");
			header("Content-Type: application/vnd.ms-excel");
			//header("Content-Type: text/plain");
	
		  $flag = false;
		  $sql = "SELECT * FROM peripheral_timur ORDER BY id DESC";
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
  
  
  // PDF EXPORT
  
  // EXPORT PDF METRO
  $flag2 = false;
  if(isset($_POST['PdfButtonRed']) and !empty($_POST['exportDatered'])){
		$path = (getenv('MPDF_ROOT')) ? getenv('MPDF_ROOT') : __DIR__;
		require_once $path . '/vendor/autoload.php';
		$flag2 = true;
		$exportDatered = $_POST['exportDatered'];

		
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

<div align="center">Redundant Metro-Barat</div>
<table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
<thead>
<tr>
<td width="5%">No</td>
<td width="20%">Peralatan</td>
<td width="20%">Waktu Gangguan</td>
<td width="20%">Waktu Teratasi</td>
<td width="5%">Lama Gangguan(jam)</td>
<td width="25%">Keterangan</td>
</tr>
</thead>
<tbody>';
//<!-- ITEMS HERE -->								

$i=1;
$sql = "SELECT * FROM redudant_barat where MONTH(down_time) = MONTH('$exportDatered') and YEAR(down_time) = YEAR('$exportDatered') ORDER BY down_time ASC";
$query = mysqli_query($db, $sql);
while($icon = mysqli_fetch_array($query)){

$html .= '<tr>
<td align="center">'.$i.'</td>
<td align="center">'.$icon['peralatan'].'</td>
<td align="center">'.$icon['down_time'].'</td>
<td align="center">'.$icon['up_time'].'</td>
<td align="center">'.$icon['int_errortime'].'</td>
<td align="center">'.$icon['keterangan'].'</td>
</tr>';
$i++;
}

$html .= '
<!-- END ITEMS HERE -->

</tbody>
</table>


<div style="text-align: center; font-style: italic;"></div>

';

$html .= '
<br>
<div align="center">StandAlone Metro-Barat</div>
<table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
<thead>
<tr>
<td width="5%">No</td>
<td width="20%">Peralatan</td>
<td width="20%">Waktu Gangguan</td>
<td width="20%">Waktu Teratasi</td>
<td width="10%">Lama Gangguan(jam)</td>
<td width="25%">Keterangan</td>
</tr>
</thead>
<tbody>';
//<!-- ITEMS HERE -->								

$i=1;
$sql = "SELECT * FROM standalone_barat where MONTH(down_time) = MONTH('$exportDatered') and YEAR(down_time) = YEAR('$exportDatered') ORDER BY down_time ASC";
$query = mysqli_query($db, $sql);
while($icon = mysqli_fetch_array($query)){

$html .= '<tr>
<td align="center">'.$i.'</td>
<td align="center">'.$icon['peralatan'].'</td>
<td align="center">'.$icon['down_time'].'</td>
<td align="center">'.$icon['up_time'].'</td>
<td align="center">'.$icon['int_errortime'].'</td>
<td align="center">'.$icon['keterangan'].'</td>
</tr>';
$i++;
}

$html .= '
<!-- END ITEMS HERE -->

</tbody>
</table>


<div style="text-align: center; font-style: italic;"></div>

';

$html .= '
<br>
<div align="center">Peripheral Metro-Barat</div>
<table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
<thead>
<tr>
<td width="5%">No</td>
<td width="20%">Peralatan</td>
<td width="20%">Waktu Gangguan</td>
<td width="20%">Waktu Teratasi</td>
<td width="10%">Lama Gangguan(jam)</td>
<td width="25%">Keterangan</td>
</tr>
</thead>
<tbody>';
//<!-- ITEMS HERE -->								

$i=1;
$sql = "SELECT * FROM peripheral_barat where MONTH(down_time) = MONTH('$exportDatered') and YEAR(down_time) = YEAR('$exportDatered') ORDER BY down_time ASC";
$query = mysqli_query($db, $sql);
while($icon = mysqli_fetch_array($query)){

$html .= '<tr>
<td align="center">'.$i.'</td>
<td align="center">'.$icon['peralatan'].'</td>
<td align="center">'.$icon['down_time'].'</td>
<td align="center">'.$icon['up_time'].'</td>
<td align="center">'.$icon['int_errortime'].'</td>
<td align="center">'.$icon['keterangan'].'</td>
</tr>';
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
	
	
	//PDF TIMUR
	
	
	elseif
	(isset($_POST['PdfButtonRedT']) and !empty($_POST['exportDateredT'])){
		$path = (getenv('MPDF_ROOT')) ? getenv('MPDF_ROOT') : __DIR__;
		require_once $path . '/vendor/autoload.php';
		$exportDateredT = $_POST['exportDateredT'];
		$flag2 = true;
		
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
<span style="font-weight: bold; font-size: 14pt;">PT. PLN(Persero)</span><br />Jalan. Embong Wungu<br />Surabaya<br />Kode Pos<br /><span style="font-family:dejavusanscondensed;">&#9742;</span>031-</div>
</htmlpageheader>

<htmlpagefooter name="myfooter">
<div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
Hal {PAGENO} dari {nb}
</div>
</htmlpagefooter>

<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
<sethtmlpagefooter name="myfooter" value="on" />
mpdf-->
<br />

<div align="center">Redundant Timur</div>
<table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
<thead>
<tr>
<td width="5%">No</td>
<td width="20%">Peralatan</td>
<td width="20%">Waktu Gangguan</td>
<td width="20%">Waktu Teratasi</td>
<td width="5%">Lama Gangguan(jam)</td>
<td width="25%">Keterangan</td>
</tr>
</thead>
<tbody>';
//<!-- ITEMS HERE -->								

$i=1;
$sql = "SELECT * FROM redudant_timur where MONTH(down_time) = MONTH('$exportDateredT') and YEAR(down_time) = YEAR('$exportDateredT') ORDER BY down_time ASC";
$query = mysqli_query($db, $sql);
while($icon = mysqli_fetch_array($query)){

$html .= '<tr>
<td align="center">'.$i.'</td>
<td align="center">'.$icon['peralatan'].'</td>
<td align="center">'.$icon['down_time'].'</td>
<td align="center">'.$icon['up_time'].'</td>
<td align="center">'.$icon['int_errortime'].'</td>
<td align="center">'.$icon['keterangan'].'</td>
</tr>';
$i++;
}

$html .= '
<!-- END ITEMS HERE -->

</tbody>
</table>


<div style="text-align: center; font-style: italic;"></div>

';

$html .= '
<br>
<div align="center">StandAlone Timur</div>
<table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
<thead>
<tr>
<td width="5%">No</td>
<td width="20%">Peralatan</td>
<td width="20%">Waktu Gangguan</td>
<td width="20%">Waktu Teratasi</td>
<td width="10%">Lama Gangguan(jam)</td>
<td width="25%">Keterangan</td>
</tr>
</thead>
<tbody>';
//<!-- ITEMS HERE -->								

$i=1;
$sql = "SELECT * FROM standalone_timur where MONTH(down_time) = MONTH('$exportDateredT') and YEAR(down_time) = YEAR('$exportDateredT') ORDER BY down_time ASC";
$query = mysqli_query($db, $sql);
while($icon = mysqli_fetch_array($query)){

$html .= '<tr>
<td align="center">'.$i.'</td>
<td align="center">'.$icon['peralatan'].'</td>
<td align="center">'.$icon['down_time'].'</td>
<td align="center">'.$icon['up_time'].'</td>
<td align="center">'.$icon['int_errortime'].'</td>
<td align="center">'.$icon['keterangan'].'</td>
</tr>';
$i++;
}

$html .= '
<!-- END ITEMS HERE -->

</tbody>
</table>


<div style="text-align: center; font-style: italic;"></div>

';

$html .= '
<br>
<div align="center">Peripheral Timur</div>
<table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
<thead>
<tr>
<td width="5%">No</td>
<td width="20%">Peralatan</td>
<td width="20%">Waktu Gangguan</td>
<td width="20%">Waktu Teratasi</td>
<td width="10%">Lama Gangguan(jam)</td>
<td width="25%">Keterangan</td>
</tr>
</thead>
<tbody>';
//<!-- ITEMS HERE -->								

$i=1;
$sql = "SELECT * FROM peripheral_timur where MONTH(down_time) = MONTH('$exportDateredT') and YEAR(down_time) = YEAR('$exportDateredT') ORDER BY down_time ASC";
$query = mysqli_query($db, $sql);
while($icon = mysqli_fetch_array($query)){

$html .= '<tr>
<td align="center">'.$i.'</td>
<td align="center">'.$icon['peralatan'].'</td>
<td align="center">'.$icon['down_time'].'</td>
<td align="center">'.$icon['up_time'].'</td>
<td align="center">'.$icon['int_errortime'].'</td>
<td align="center">'.$icon['keterangan'].'</td>
</tr>';
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
	elseif($flag2==false)
	{
		echo "Silahkan kembali, isi tanggal dulu!";
	}
  
?>