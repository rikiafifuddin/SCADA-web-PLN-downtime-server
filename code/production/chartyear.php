<?php

include("connection.php");

$year = date('Y');
if (isset($_POST['Monthpick'])){
	$datepick = new DateTime(date('Y-m-d H:i:s', strtotime($_POST['bulan'])));
	$datepick = $datepick->format('Y');
	$year = $datepick;

	$Jhari=date('t');
    $THIM = 24 * $Jhari;
    $bulan = $_POST['bulan'];
	header("location:index.php");


//JUMLAH LAMA GANGGUAN BARAT

	$sqlredbarat = "SELECT sum(int_errortime) as sumredbarat FROM redudant_barat WHERE Year(down_time) = '$year' "; 
	$queryredbarat = mysqli_query($db, $sqlredbarat);
	$redudant_barat = mysqli_fetch_array($queryredbarat);
	$redudant_barat = ($redudant_barat['sumredbarat']);

	$sqlsabarat = "SELECT sum(int_errortime) as sumsabarat FROM standalone_barat WHERE Year(down_time) = '$year' "; 
	$querysabarat = mysqli_query($db, $sqlsabarat);
	$standalone_barat = mysqli_fetch_array($querysabarat);
	$standalone_barat = ($standalone_barat['sumsabarat']);

	$sqlperbarat = "SELECT sum(int_errortime) as sumperbarat FROM peripheral_barat WHERE Year(down_time) = '$year' "; 
	$queryperbarat = mysqli_query($db, $sqlperbarat);
	$peripheral_barat = mysqli_fetch_array($queryperbarat);
	$peripheral_barat = ($peripheral_barat['sumperbarat']);

	$summerrortime_barat = $redudant_barat + $standalone_barat +$peripheral_barat;
	$summerrortime_barat_per = $summerrortime_barat/10;
	setcookie("summerrortime_barat", $summerrortime_barat);	

//BANYAK GANGGUAN BARAT

	$sqlcountredbarat = "SELECT count(id) as countredbarat FROM redudant_barat  WHERE Year(down_time) = '$year'"; 
	$querycountredbarat = mysqli_query($db, $sqlcountredbarat);
	$countredudant_barat = mysqli_fetch_array($querycountredbarat);
	$countredudant_barat = ($countredudant_barat['countredbarat']);

	$sqlcountsabarat = "SELECT count(id) as countsabarat FROM standalone_barat  WHERE Year(down_time) = '$year'"; 
	$querycountsabarat = mysqli_query($db, $sqlcountsabarat);
	$countstandalone_barat = mysqli_fetch_array($querycountsabarat);
	$countstandalone_barat = ($countstandalone_barat['countsabarat']);

	$sqlcountperbarat = "SELECT count(id) as countperbarat FROM peripheral_barat  WHERE Year(down_time) = '$year'"; 
	$querycountperbarat = mysqli_query($db, $sqlcountperbarat);
	$countperipheral_barat = mysqli_fetch_array($querycountperbarat);
	$countperipheral_barat = ($countperipheral_barat['countperbarat']);

	$countbarat = $countredudant_barat + $countstandalone_barat + $countperipheral_barat;
	setcookie("countbarat", $countbarat);

//Gangguan Per Bulan
	//Redudant
	$sqlredbaratjan = "SELECT sum(int_errortime) as sumredbaratjan FROM redudant_barat WHERE MONTH(down_time)=01 and Year(down_time) = '$year'";
	$queryredbaratjan = mysqli_query($db, $sqlredbaratjan);
	$redudant_baratjan = mysqli_fetch_array($queryredbaratjan);
	$redudant_baratjan = ($redudant_baratjan['sumredbaratjan']);
	if ($redudant_baratjan==NULL){
		$redudant_baratjan=0;
		
	}

	$sqlredbaratfeb = "SELECT sum(int_errortime) as sumredbaratfeb FROM redudant_barat WHERE MONTH(down_time)=02 and Year(down_time) = '$year'";
	$queryredbaratfeb = mysqli_query($db, $sqlredbaratfeb);
	$redudant_baratfeb = mysqli_fetch_array($queryredbaratfeb);
	$redudant_baratfeb = ($redudant_baratfeb['sumredbaratfeb']);
	if ($redudant_baratfeb==NULL){
		$redudant_baratfeb=0;	
	}

	$sqlredbaratmar = "SELECT sum(int_errortime) as sumredbaratmar FROM redudant_barat WHERE MONTH(down_time)=03 and Year(down_time) = '$year'";
	$queryredbaratmar = mysqli_query($db, $sqlredbaratmar);
	$redudant_baratmar = mysqli_fetch_array($queryredbaratmar);
	$redudant_baratmar = ($redudant_baratmar['sumredbaratmar']);
	if ($redudant_baratmar==NULL){
		$redudant_baratmar=0;
	}

	$sqlredbaratapr = "SELECT sum(int_errortime) as sumredbaratapr FROM redudant_barat WHERE MONTH(down_time)=04 and Year(down_time) = '$year'";
	$queryredbaratapr = mysqli_query($db, $sqlredbaratapr);
	$redudant_baratapr = mysqli_fetch_array($queryredbaratapr);
	$redudant_baratapr = ($redudant_baratapr['sumredbaratapr']);
	if ($redudant_baratapr==NULL){
		$redudant_baratapr=0;
	}

	$sqlredbaratmei = "SELECT sum(int_errortime) as sumredbaratmei FROM redudant_barat WHERE MONTH(down_time)=05 and Year(down_time) = '$year'";
	$queryredbaratmei = mysqli_query($db, $sqlredbaratmei);
	$redudant_baratmei = mysqli_fetch_array($queryredbaratmei);
	$redudant_baratmei = ($redudant_baratmei['sumredbaratmei']);
	if ($redudant_baratmei==NULL){
		$redudant_baratmei=0;
	}

	$sqlredbaratjun = "SELECT sum(int_errortime) as sumredbaratjun FROM redudant_barat WHERE MONTH(down_time)=06 and Year(down_time) = '$year'";
	$queryredbaratjun = mysqli_query($db, $sqlredbaratjun);
	$redudant_baratjun = mysqli_fetch_array($queryredbaratjun);
	$redudant_baratjun = ($redudant_baratjun['sumredbaratjun']);
	if ($redudant_baratjun==NULL){
		$redudant_baratjun=0;
	}

	$sqlredbaratjul = "SELECT sum(int_errortime) as sumredbaratjul FROM redudant_barat WHERE MONTH(down_time)=07 and Year(down_time) = '$year'";
	$queryredbaratjul = mysqli_query($db, $sqlredbaratjul);
	$redudant_baratjul = mysqli_fetch_array($queryredbaratjul);
	$redudant_baratjul = ($redudant_baratjul['sumredbaratjul']);
	if ($redudant_baratjul==NULL){
		$redudant_baratjul=0; 
	}

	$sqlredbaratagu = "SELECT sum(int_errortime) as sumredbaratagu FROM redudant_barat WHERE MONTH(down_time)=08 and Year(down_time) = '$year'";
	$queryredbaratagu = mysqli_query($db, $sqlredbaratagu);
	$redudant_baratagu = mysqli_fetch_array($queryredbaratagu);
	$redudant_baratagu = ($redudant_baratagu['sumredbaratagu']);
	if ($redudant_baratagu==NULL){
		$redudant_baratagu=0; 
	}

	$sqlredbaratsep = "SELECT sum(int_errortime) as sumredbaratsep FROM redudant_barat WHERE MONTH(down_time)=09 and Year(down_time) = '$year'";
	$queryredbaratsep = mysqli_query($db, $sqlredbaratsep);
	$redudant_baratsep = mysqli_fetch_array($queryredbaratsep);
	$redudant_baratsep = ($redudant_baratsep['sumredbaratsep']);
	if ($redudant_baratsep==NULL){
		$redudant_baratsep=0; 
	}

	$sqlredbaratokt = "SELECT sum(int_errortime) as sumredbaratokt FROM redudant_barat WHERE MONTH(down_time)=10 and Year(down_time) = '$year'";
	$queryredbaratokt = mysqli_query($db, $sqlredbaratokt);
	$redudant_baratokt = mysqli_fetch_array($queryredbaratokt);
	$redudant_baratokt = ($redudant_baratokt['sumredbaratokt']);
	if ($redudant_baratokt==NULL){
		$redudant_baratokt=0; 
	}

	$sqlredbaratnov = "SELECT sum(int_errortime) as sumredbaratnov FROM redudant_barat WHERE MONTH(down_time)=11 and Year(down_time) = '$year'";
	$queryredbaratnov = mysqli_query($db, $sqlredbaratnov);
	$redudant_baratnov = mysqli_fetch_array($queryredbaratnov);
	$redudant_baratnov = ($redudant_baratnov['sumredbaratnov']);
	if ($redudant_baratnov==NULL){
		$redudant_baratnov=0; 
	}

	$sqlredbaratdes = "SELECT sum(int_errortime) as sumredbaratdes FROM redudant_barat WHERE MONTH(down_time)=12 and Year(down_time) = '$year'";
	$queryredbaratdes = mysqli_query($db, $sqlredbaratdes);
	$redudant_baratdes = mysqli_fetch_array($queryredbaratdes);
	$redudant_baratdes = ($redudant_baratdes['sumredbaratdes']);
	if ($redudant_baratdes==NULL){
		$redudant_baratdes=0; 
	}

	//standalone
	$sqlsabaratjan = "SELECT sum(int_errortime) as sumsabaratjan FROM standalone_barat WHERE MONTH(down_time)=01 and Year(down_time) = '$year'";
	$querysabaratjan = mysqli_query($db, $sqlsabaratjan);
	$standalone_baratjan = mysqli_fetch_array($querysabaratjan);
	$standalone_baratjan = ($standalone_baratjan['sumsabaratjan']);
	if ($standalone_baratjan==NULL){
		$standalone_baratjan=0;
		
	}

	$sqlsabaratfeb = "SELECT sum(int_errortime) as sumsabaratfeb FROM standalone_barat WHERE MONTH(down_time)=02 and Year(down_time) = '$year'";
	$querysabaratfeb = mysqli_query($db, $sqlsabaratfeb);
	$standalone_baratfeb = mysqli_fetch_array($querysabaratfeb);
	$standalone_baratfeb = ($standalone_baratfeb['sumsabaratfeb']);
	if ($standalone_baratfeb==NULL){
		$standalone_baratfeb=0;	
	}

	$sqlsabaratmar = "SELECT sum(int_errortime) as sumsabaratmar FROM standalone_barat WHERE MONTH(down_time)=03 and Year(down_time) = '$year'";
	$querysabaratmar = mysqli_query($db, $sqlsabaratmar);
	$standalone_baratmar = mysqli_fetch_array($querysabaratmar);
	$standalone_baratmar = ($standalone_baratmar['sumsabaratmar']);
	if ($standalone_baratmar==NULL){
		$standalone_baratmar=0;
	}

	$sqlsabaratapr = "SELECT sum(int_errortime) as sumsabaratapr FROM standalone_barat WHERE MONTH(down_time)=04 and Year(down_time) = '$year'";
	$querysabaratapr = mysqli_query($db, $sqlsabaratapr);
	$standalone_baratapr = mysqli_fetch_array($querysabaratapr);
	$standalone_baratapr = ($standalone_baratapr['sumsabaratapr']);
	if ($standalone_baratapr==NULL){
		$standalone_baratapr=0;
	}

	$sqlsabaratmei = "SELECT sum(int_errortime) as sumsabaratmei FROM standalone_barat WHERE MONTH(down_time)=05 and Year(down_time) = '$year'";
	$querysabaratmei = mysqli_query($db, $sqlsabaratmei);
	$standalone_baratmei = mysqli_fetch_array($querysabaratmei);
	$standalone_baratmei = ($standalone_baratmei['sumsabaratmei']);
	if ($standalone_baratmei==NULL){
		$standalone_baratmei=0;
	}

	$sqlsabaratjun = "SELECT sum(int_errortime) as sumsabaratjun FROM standalone_barat WHERE MONTH(down_time)=06 and Year(down_time) = '$year'";
	$querysabaratjun = mysqli_query($db, $sqlsabaratjun);
	$standalone_baratjun = mysqli_fetch_array($querysabaratjun);
	$standalone_baratjun = ($standalone_baratjun['sumsabaratjun']);
	if ($standalone_baratjun==NULL){
		$standalone_baratjun=0;
	}

	$sqlsabaratjul = "SELECT sum(int_errortime) as sumsabaratjul FROM standalone_barat WHERE MONTH(down_time)=07 and Year(down_time) = '$year'";
	$querysabaratjul = mysqli_query($db, $sqlsabaratjul);
	$standalone_baratjul = mysqli_fetch_array($querysabaratjul);
	$standalone_baratjul = ($standalone_baratjul['sumsabaratjul']);
	if ($standalone_baratjul==NULL){
		$standalone_baratjul=0; 
	}

	$sqlsabaratagu = "SELECT sum(int_errortime) as sumsabaratagu FROM standalone_barat WHERE MONTH(down_time)=08 and Year(down_time) = '$year'";
	$querysabaratagu = mysqli_query($db, $sqlsabaratagu);
	$standalone_baratagu = mysqli_fetch_array($querysabaratagu);
	$standalone_baratagu = ($standalone_baratagu['sumsabaratagu']);
	if ($standalone_baratagu==NULL){
		$standalone_baratagu=0; 
	}

	$sqlsabaratsep = "SELECT sum(int_errortime) as sumsabaratsep FROM standalone_barat WHERE MONTH(down_time)=09 and Year(down_time) = '$year'";
	$querysabaratsep = mysqli_query($db, $sqlsabaratsep);
	$standalone_baratsep = mysqli_fetch_array($querysabaratsep);
	$standalone_baratsep = ($standalone_baratsep['sumsabaratsep']);
	if ($standalone_baratsep==NULL){
		$standalone_baratsep=0; 
	}

	$sqlsabaratokt = "SELECT sum(int_errortime) as sumsabaratokt FROM standalone_barat WHERE MONTH(down_time)=10 and Year(down_time) = '$year'";
	$querysabaratokt = mysqli_query($db, $sqlsabaratokt);
	$standalone_baratokt = mysqli_fetch_array($querysabaratokt);
	$standalone_baratokt = ($standalone_baratokt['sumsabaratokt']);
	if ($standalone_baratokt==NULL){
		$standalone_baratokt=0; 
	}

	$sqlsabaratnov = "SELECT sum(int_errortime) as sumsabaratnov FROM standalone_barat WHERE MONTH(down_time)=11 and Year(down_time) = '$year'";
	$querysabaratnov = mysqli_query($db, $sqlsabaratnov);
	$standalone_baratnov = mysqli_fetch_array($querysabaratnov);
	$standalone_baratnov = ($standalone_baratnov['sumsabaratnov']);
	if ($standalone_baratnov==NULL){
		$standalone_baratnov=0; 
	}

	$sqlsabaratdes = "SELECT sum(int_errortime) as sumsabaratdes FROM standalone_barat WHERE MONTH(down_time)=12 and Year(down_time) = '$year'";
	$querysabaratdes = mysqli_query($db, $sqlsabaratdes);
	$standalone_baratdes = mysqli_fetch_array($querysabaratdes);
	$standalone_baratdes = ($standalone_baratdes['sumsabaratdes']);
	if ($standalone_baratdes==NULL){
		$standalone_baratdes=0; 
	}

	$sqlperbaratjan = "SELECT sum(int_errortime) as sumperbaratjan FROM peripheral_barat WHERE MONTH(down_time)=01 and Year(down_time) = '$year'";
	$queryperbaratjan = mysqli_query($db, $sqlperbaratjan);
	$peripheral_baratjan = mysqli_fetch_array($queryperbaratjan);
	$peripheral_baratjan = ($peripheral_baratjan['sumperbaratjan']);
	if ($peripheral_baratjan==NULL){
		$peripheral_baratjan=0;
		
	}

	$sqlperbaratfeb = "SELECT sum(int_errortime) as sumperbaratfeb FROM peripheral_barat WHERE MONTH(down_time)=02 and Year(down_time) = '$year'";
	$queryperbaratfeb = mysqli_query($db, $sqlperbaratfeb);
	$peripheral_baratfeb = mysqli_fetch_array($queryperbaratfeb);
	$peripheral_baratfeb = ($peripheral_baratfeb['sumperbaratfeb']);
	if ($peripheral_baratfeb==NULL){
		$peripheral_baratfeb=0;	
	}

	$sqlperbaratmar = "SELECT sum(int_errortime) as sumperbaratmar FROM peripheral_barat WHERE MONTH(down_time)=03 and Year(down_time) = '$year'";
	$queryperbaratmar = mysqli_query($db, $sqlperbaratmar);
	$peripheral_baratmar = mysqli_fetch_array($queryperbaratmar);
	$peripheral_baratmar = ($peripheral_baratmar['sumperbaratmar']);
	if ($peripheral_baratmar==NULL){
		$peripheral_baratmar=0;
	}

	$sqlperbaratapr = "SELECT sum(int_errortime) as sumperbaratapr FROM peripheral_barat WHERE MONTH(down_time)=04 and Year(down_time) = '$year'";
	$queryperbaratapr = mysqli_query($db, $sqlperbaratapr);
	$peripheral_baratapr = mysqli_fetch_array($queryperbaratapr);
	$peripheral_baratapr = ($peripheral_baratapr['sumperbaratapr']);
	if ($peripheral_baratapr==NULL){
		$peripheral_baratapr=0;
	}

	$sqlperbaratmei = "SELECT sum(int_errortime) as sumperbaratmei FROM peripheral_barat WHERE MONTH(down_time)=05 and Year(down_time) = '$year'";
	$queryperbaratmei = mysqli_query($db, $sqlperbaratmei);
	$peripheral_baratmei = mysqli_fetch_array($queryperbaratmei);
	$peripheral_baratmei = ($peripheral_baratmei['sumperbaratmei']);
	if ($peripheral_baratmei==NULL){
		$peripheral_baratmei=0;
	}

	$sqlperbaratjun = "SELECT sum(int_errortime) as sumperbaratjun FROM peripheral_barat WHERE MONTH(down_time)=06 and Year(down_time) = '$year'";
	$queryperbaratjun = mysqli_query($db, $sqlperbaratjun);
	$peripheral_baratjun = mysqli_fetch_array($queryperbaratjun);
	$peripheral_baratjun = ($peripheral_baratjun['sumperbaratjun']);
	if ($peripheral_baratjun==NULL){
		$peripheral_baratjun=0;
	}

	$sqlperbaratjul = "SELECT sum(int_errortime) as sumperbaratjul FROM peripheral_barat WHERE MONTH(down_time)=07 and Year(down_time) = '$year'";
	$queryperbaratjul = mysqli_query($db, $sqlperbaratjul);
	$peripheral_baratjul = mysqli_fetch_array($queryperbaratjul);
	$peripheral_baratjul = ($peripheral_baratjul['sumperbaratjul']);
	if ($peripheral_baratjul==NULL){
		$peripheral_baratjul=0; 
	}

	$sqlperbaratagu = "SELECT sum(int_errortime) as sumperbaratagu FROM peripheral_barat WHERE MONTH(down_time)=08 and Year(down_time) = '$year'";
	$queryperbaratagu = mysqli_query($db, $sqlperbaratagu);
	$peripheral_baratagu = mysqli_fetch_array($queryperbaratagu);
	$peripheral_baratagu = ($peripheral_baratagu['sumperbaratagu']);
	if ($peripheral_baratagu==NULL){
		$peripheral_baratagu=0; 
	}

	$sqlperbaratsep = "SELECT sum(int_errortime) as sumperbaratsep FROM peripheral_barat WHERE MONTH(down_time)=09 and Year(down_time) = '$year'";
	$queryperbaratsep = mysqli_query($db, $sqlperbaratsep);
	$peripheral_baratsep = mysqli_fetch_array($queryperbaratsep);
	$peripheral_baratsep = ($peripheral_baratsep['sumperbaratsep']);
	if ($peripheral_baratsep==NULL){
		$peripheral_baratsep=0; 
	}

	$sqlperbaratokt = "SELECT sum(int_errortime) as sumperbaratokt FROM peripheral_barat WHERE MONTH(down_time)=10 and Year(down_time) = '$year'";
	$queryperbaratokt = mysqli_query($db, $sqlperbaratokt);
	$peripheral_baratokt = mysqli_fetch_array($queryperbaratokt);
	$peripheral_baratokt = ($peripheral_baratokt['sumperbaratokt']);
	if ($peripheral_baratokt==NULL){
		$peripheral_baratokt=0; 
	}

	$sqlperbaratnov = "SELECT sum(int_errortime) as sumperbaratnov FROM peripheral_barat WHERE MONTH(down_time)=11 and Year(down_time) = '$year'";
	$queryperbaratnov = mysqli_query($db, $sqlperbaratnov);
	$peripheral_baratnov = mysqli_fetch_array($queryperbaratnov);
	$peripheral_baratnov = ($peripheral_baratnov['sumperbaratnov']);
	if ($peripheral_baratnov==NULL){
		$peripheral_baratnov=0; 
	}

	$sqlperbaratdes = "SELECT sum(int_errortime) as sumperbaratdes FROM peripheral_barat WHERE MONTH(down_time)=12 and Year(down_time) = '$year'";
	$queryperbaratdes = mysqli_query($db, $sqlperbaratdes);
	$peripheral_baratdes = mysqli_fetch_array($queryperbaratdes);
	$peripheral_baratdes = ($peripheral_baratdes['sumperbaratdes']);
	if ($peripheral_baratdes==NULL){
		$peripheral_baratdes=0; 
	}

//JUMLAH GANGGUAN PERBULAN BARAT
$gangguanbarat_jan = $redudant_baratjan + $standalone_baratjan + $peripheral_baratjan;
setcookie("gangguanbarat_jan", $gangguanbarat_jan);
$gangguanbarat_feb = $redudant_baratfeb + $standalone_baratfeb + $peripheral_baratfeb;
setcookie("gangguanbarat_feb", $gangguanbarat_feb);
$gangguanbarat_mar = $redudant_baratmar + $standalone_baratmar + $peripheral_baratmar;
setcookie("gangguanbarat_mar", $gangguanbarat_mar);
$gangguanbarat_apr = $redudant_baratapr + $standalone_baratapr + $peripheral_baratapr;
setcookie("gangguanbarat_apr", $gangguanbarat_apr);
$gangguanbarat_mei = $redudant_baratmei + $standalone_baratmei + $peripheral_baratmei;
setcookie("gangguanbarat_mei", $gangguanbarat_mei);
$gangguanbarat_jun = $redudant_baratjun + $standalone_baratjun + $peripheral_baratjun;
setcookie("gangguanbarat_jun", $gangguanbarat_jun);
$gangguanbarat_jul = $redudant_baratjul + $standalone_baratjul + $peripheral_baratjul;
setcookie("gangguanbarat_jul", $gangguanbarat_jul);
$gangguanbarat_agu = $redudant_baratagu + $standalone_baratagu + $peripheral_baratagu;
setcookie("gangguanbarat_agu", $gangguanbarat_agu);
$gangguanbarat_sep = $redudant_baratsep + $standalone_baratsep + $peripheral_baratsep;
setcookie("gangguanbarat_sep", $gangguanbarat_sep);
$gangguanbarat_okt = $redudant_baratokt + $standalone_baratokt + $peripheral_baratokt;
setcookie("gangguanbarat_okt", $gangguanbarat_okt);
$gangguanbarat_nov = $redudant_baratnov + $standalone_baratnov + $peripheral_baratnov;
setcookie("gangguanbarat_nov", $gangguanbarat_nov);
$gangguanbarat_des = $redudant_baratdes + $standalone_baratdes + $peripheral_baratdes;
setcookie("gangguanbarat_des", $gangguanbarat_des);

//JUMLAH LAMA GANGGUAN TIMUR

$sqlredtimur = "SELECT sum(int_errortime) as sumredtimur FROM redudant_timur WHERE Year(down_time) = '$year'"; 
$queryredtimur = mysqli_query($db, $sqlredtimur);
$redudant_timur = mysqli_fetch_array($queryredtimur);
$redudant_timur = ($redudant_timur['sumredtimur']);

$sqlsatimur = "SELECT sum(int_errortime) as sumsatimur FROM standalone_timur WHERE Year(down_time) = '$year'"; 
$querysatimur = mysqli_query($db, $sqlsatimur);
$standalone_timur = mysqli_fetch_array($querysatimur);
$standalone_timur = ($standalone_timur['sumsatimur']);

$sqlpertimur = "SELECT sum(int_errortime) as sumpertimur FROM peripheral_timur WHERE Year(down_time) = '$year'"; 
$querypertimur = mysqli_query($db, $sqlpertimur);
$peripheral_timur = mysqli_fetch_array($querypertimur);
$peripheral_timur = ($peripheral_timur['sumpertimur']);

$summerrortime_timur = $redudant_timur + $standalone_timur +$peripheral_timur;
$summerrortime_timur_per = $summerrortime_timur/10;
setcookie("summerrortime_timur", $summerrortime_timur);

//BANYAK GANGGUAN TIMUR

$sqlcountredtimur = "SELECT count(id) as countredtimur FROM redudant_timur WHERE Year(down_time) = '$year'"; 
$querycountredtimur = mysqli_query($db, $sqlcountredtimur);
$countredudant_timur = mysqli_fetch_array($querycountredtimur);
$countredudant_timur = ($countredudant_timur['countredtimur']);

$sqlcountsatimur = "SELECT count(id) as countsatimur FROM standalone_timur WHERE Year(down_time) = '$year'"; 
$querycountsatimur = mysqli_query($db, $sqlcountsatimur);
$countstandalone_timur = mysqli_fetch_array($querycountsatimur);
$countstandalone_timur = ($countstandalone_timur['countsatimur']);

$sqlcountpertimur = "SELECT count(id) as countpertimur FROM peripheral_timur WHERE Year(down_time) = '$year'"; 
$querycountpertimur = mysqli_query($db, $sqlcountpertimur);
$countperipheral_timur = mysqli_fetch_array($querycountpertimur);
$countperipheral_timur = ($countperipheral_timur['countpertimur']);

$counttimur = $countredudant_timur + $countstandalone_timur + $countperipheral_timur;
setcookie("counttimur", $counttimur);

//Lama Gangguan Per Bulan
//Redudant

$sqlredtimurjan = "SELECT sum(int_errortime) as sumredtimurjan FROM redudant_timur WHERE MONTH(down_time)=01 and Year(down_time) = '$year'";
	$queryredtimurjan = mysqli_query($db, $sqlredtimurjan);
	$redudant_timurjan = mysqli_fetch_array($queryredtimurjan);
	$redudant_timurjan = ($redudant_timurjan['sumredtimurjan']);
	if ($redudant_timurjan==NULL){
		$redudant_timurjan=0;
		
	}

	$sqlredtimurfeb = "SELECT sum(int_errortime) as sumredtimurfeb FROM redudant_timur WHERE MONTH(down_time)=02 and Year(down_time) = '$year'";
	$queryredtimurfeb = mysqli_query($db, $sqlredtimurfeb);
	$redudant_timurfeb = mysqli_fetch_array($queryredtimurfeb);
	$redudant_timurfeb = ($redudant_timurfeb['sumredtimurfeb']);
	if ($redudant_timurfeb==NULL){
		$redudant_timurfeb=0;	
	}

	$sqlredtimurmar = "SELECT sum(int_errortime) as sumredtimurmar FROM redudant_timur WHERE MONTH(down_time)=03 and Year(down_time) = '$year'";
	$queryredtimurmar = mysqli_query($db, $sqlredtimurmar);
	$redudant_timurmar = mysqli_fetch_array($queryredtimurmar);
	$redudant_timurmar = ($redudant_timurmar['sumredtimurmar']);
	if ($redudant_timurmar==NULL){
		$redudant_timurmar=0;
	}

	$sqlredtimurapr = "SELECT sum(int_errortime) as sumredtimurapr FROM redudant_timur WHERE MONTH(down_time)=04 and Year(down_time) = '$year'";
	$queryredtimurapr = mysqli_query($db, $sqlredtimurapr);
	$redudant_timurapr = mysqli_fetch_array($queryredtimurapr);
	$redudant_timurapr = ($redudant_timurapr['sumredtimurapr']);
	if ($redudant_timurapr==NULL){
		$redudant_timurapr=0;
	}

	$sqlredtimurmei = "SELECT sum(int_errortime) as sumredtimurmei FROM redudant_timur WHERE MONTH(down_time)=05 and Year(down_time) = '$year'";
	$queryredtimurmei = mysqli_query($db, $sqlredtimurmei);
	$redudant_timurmei = mysqli_fetch_array($queryredtimurmei);
	$redudant_timurmei = ($redudant_timurmei['sumredtimurmei']);
	if ($redudant_timurmei==NULL){
		$redudant_timurmei=0;
	}

	$sqlredtimurjun = "SELECT sum(int_errortime) as sumredtimurjun FROM redudant_timur WHERE MONTH(down_time)=06 and Year(down_time) = '$year'";
	$queryredtimurjun = mysqli_query($db, $sqlredtimurjun);
	$redudant_timurjun = mysqli_fetch_array($queryredtimurjun);
	$redudant_timurjun = ($redudant_timurjun['sumredtimurjun']);
	if ($redudant_timurjun==NULL){
		$redudant_timurjun=0;
	}

	$sqlredtimurjul = "SELECT sum(int_errortime) as sumredtimurjul FROM redudant_timur WHERE MONTH(down_time)=07 and Year(down_time) = '$year'";
	$queryredtimurjul = mysqli_query($db, $sqlredtimurjul);
	$redudant_timurjul = mysqli_fetch_array($queryredtimurjul);
	$redudant_timurjul = ($redudant_timurjul['sumredtimurjul']);
	if ($redudant_timurjul==NULL){
		$redudant_timurjul=0; 
	}

	$sqlredtimuragu = "SELECT sum(int_errortime) as sumredtimuragu FROM redudant_timur WHERE MONTH(down_time)=08 and Year(down_time) = '$year'";
	$queryredtimuragu = mysqli_query($db, $sqlredtimuragu);
	$redudant_timuragu = mysqli_fetch_array($queryredtimuragu);
	$redudant_timuragu = ($redudant_timuragu['sumredtimuragu']);
	if ($redudant_timuragu==NULL){
		$redudant_timuragu=0; 
	}

	$sqlredtimursep = "SELECT sum(int_errortime) as sumredtimursep FROM redudant_timur WHERE MONTH(down_time)=09 and Year(down_time) = '$year'";
	$queryredtimursep = mysqli_query($db, $sqlredtimursep);
	$redudant_timursep = mysqli_fetch_array($queryredtimursep);
	$redudant_timursep = ($redudant_timursep['sumredtimursep']);
	if ($redudant_timursep==NULL){
		$redudant_timursep=0; 
	}

	$sqlredtimurokt = "SELECT sum(int_errortime) as sumredtimurokt FROM redudant_timur WHERE MONTH(down_time)=10 and Year(down_time) = '$year'";
	$queryredtimurokt = mysqli_query($db, $sqlredtimurokt);
	$redudant_timurokt = mysqli_fetch_array($queryredtimurokt);
	$redudant_timurokt = ($redudant_timurokt['sumredtimurokt']);
	if ($redudant_timurokt==NULL){
		$redudant_timurokt=0; 
	}

	$sqlredtimurnov = "SELECT sum(int_errortime) as sumredtimurnov FROM redudant_timur WHERE MONTH(down_time)=11 and Year(down_time) = '$year'";
	$queryredtimurnov = mysqli_query($db, $sqlredtimurnov);
	$redudant_timurnov = mysqli_fetch_array($queryredtimurnov);
	$redudant_timurnov = ($redudant_timurnov['sumredtimurnov']);
	if ($redudant_timurnov==NULL){
		$redudant_timurnov=0; 
	}

	$sqlredtimurdes = "SELECT sum(int_errortime) as sumredtimurdes FROM redudant_timur WHERE MONTH(down_time)=12 and Year(down_time) = '$year'";
	$queryredtimurdes = mysqli_query($db, $sqlredtimurdes);
	$redudant_timurdes = mysqli_fetch_array($queryredtimurdes);
	$redudant_timurdes = ($redudant_timurdes['sumredtimurdes']);
	if ($redudant_timurdes==NULL){
		$redudant_timurdes=0; 
	}

	//standalone
	$sqlsatimurjan = "SELECT sum(int_errortime) as sumsatimurjan FROM standalone_timur WHERE MONTH(down_time)=01 and Year(down_time) = '$year'";
	$querysatimurjan = mysqli_query($db, $sqlsatimurjan);
	$standalone_timurjan = mysqli_fetch_array($querysatimurjan);
	$standalone_timurjan = ($standalone_timurjan['sumsatimurjan']);
	if ($standalone_timurjan==NULL){
		$standalone_timurjan=0;
		
	}

	$sqlsatimurfeb = "SELECT sum(int_errortime) as sumsatimurfeb FROM standalone_timur WHERE MONTH(down_time)=02 and Year(down_time) = '$year'";
	$querysatimurfeb = mysqli_query($db, $sqlsatimurfeb);
	$standalone_timurfeb = mysqli_fetch_array($querysatimurfeb);
	$standalone_timurfeb = ($standalone_timurfeb['sumsatimurfeb']);
	if ($standalone_timurfeb==NULL){
		$standalone_timurfeb=0;	
	}

	$sqlsatimurmar = "SELECT sum(int_errortime) as sumsatimurmar FROM standalone_timur WHERE MONTH(down_time)=03 and Year(down_time) = '$year'";
	$querysatimurmar = mysqli_query($db, $sqlsatimurmar);
	$standalone_timurmar = mysqli_fetch_array($querysatimurmar);
	$standalone_timurmar = ($standalone_timurmar['sumsatimurmar']);
	if ($standalone_timurmar==NULL){
		$standalone_timurmar=0;
	}

	$sqlsatimurapr = "SELECT sum(int_errortime) as sumsatimurapr FROM standalone_timur WHERE MONTH(down_time)=04 and Year(down_time) = '$year'";
	$querysatimurapr = mysqli_query($db, $sqlsatimurapr);
	$standalone_timurapr = mysqli_fetch_array($querysatimurapr);
	$standalone_timurapr = ($standalone_timurapr['sumsatimurapr']);
	if ($standalone_timurapr==NULL){
		$standalone_timurapr=0;
	}

	$sqlsatimurmei = "SELECT sum(int_errortime) as sumsatimurmei FROM standalone_timur WHERE MONTH(down_time)=05 and Year(down_time) = '$year'";
	$querysatimurmei = mysqli_query($db, $sqlsatimurmei);
	$standalone_timurmei = mysqli_fetch_array($querysatimurmei);
	$standalone_timurmei = ($standalone_timurmei['sumsatimurmei']);
	if ($standalone_timurmei==NULL){
		$standalone_timurmei=0;
	}

	$sqlsatimurjun = "SELECT sum(int_errortime) as sumsatimurjun FROM standalone_timur WHERE MONTH(down_time)=06 and Year(down_time) = '$year'";
	$querysatimurjun = mysqli_query($db, $sqlsatimurjun);
	$standalone_timurjun = mysqli_fetch_array($querysatimurjun);
	$standalone_timurjun = ($standalone_timurjun['sumsatimurjun']);
	if ($standalone_timurjun==NULL){
		$standalone_timurjun=0;
	}

	$sqlsatimurjul = "SELECT sum(int_errortime) as sumsatimurjul FROM standalone_timur WHERE MONTH(down_time)=07 and Year(down_time) = '$year'";
	$querysatimurjul = mysqli_query($db, $sqlsatimurjul);
	$standalone_timurjul = mysqli_fetch_array($querysatimurjul);
	$standalone_timurjul = ($standalone_timurjul['sumsatimurjul']);
	if ($standalone_timurjul==NULL){
		$standalone_timurjul=0; 
	}

	$sqlsatimuragu = "SELECT sum(int_errortime) as sumsatimuragu FROM standalone_timur WHERE MONTH(down_time)=08 and Year(down_time) = '$year'";
	$querysatimuragu = mysqli_query($db, $sqlsatimuragu);
	$standalone_timuragu = mysqli_fetch_array($querysatimuragu);
	$standalone_timuragu = ($standalone_timuragu['sumsatimuragu']);
	if ($standalone_timuragu==NULL){
		$standalone_timuragu=0; 
	}

	$sqlsatimursep = "SELECT sum(int_errortime) as sumsatimursep FROM standalone_timur WHERE MONTH(down_time)=09 and Year(down_time) = '$year'";
	$querysatimursep = mysqli_query($db, $sqlsatimursep);
	$standalone_timursep = mysqli_fetch_array($querysatimursep);
	$standalone_timursep = ($standalone_timursep['sumsatimursep']);
	if ($standalone_timursep==NULL){
		$standalone_timursep=0; 
	}

	$sqlsatimurokt = "SELECT sum(int_errortime) as sumsatimurokt FROM standalone_timur WHERE MONTH(down_time)=10 and Year(down_time) = '$year'";
	$querysatimurokt = mysqli_query($db, $sqlsatimurokt);
	$standalone_timurokt = mysqli_fetch_array($querysatimurokt);
	$standalone_timurokt = ($standalone_timurokt['sumsatimurokt']);
	if ($standalone_timurokt==NULL){
		$standalone_timurokt=0; 
	}

	$sqlsatimurnov = "SELECT sum(int_errortime) as sumsatimurnov FROM standalone_timur WHERE MONTH(down_time)=11 and Year(down_time) = '$year'";
	$querysatimurnov = mysqli_query($db, $sqlsatimurnov);
	$standalone_timurnov = mysqli_fetch_array($querysatimurnov);
	$standalone_timurnov = ($standalone_timurnov['sumsatimurnov']);
	if ($standalone_timurnov==NULL){
		$standalone_timurnov=0; 
	}

	$sqlsatimurdes = "SELECT sum(int_errortime) as sumsatimurdes FROM standalone_timur WHERE MONTH(down_time)=12 and Year(down_time) = '$year'";
	$querysatimurdes = mysqli_query($db, $sqlsatimurdes);
	$standalone_timurdes = mysqli_fetch_array($querysatimurdes);
	$standalone_timurdes = ($standalone_timurdes['sumsatimurdes']);
	if ($standalone_timurdes==NULL){
		$standalone_timurdes=0; 
	}

	$sqlpertimurjan = "SELECT sum(int_errortime) as sumpertimurjan FROM peripheral_timur WHERE MONTH(down_time)=01 and Year(down_time) = '$year'";
	$querypertimurjan = mysqli_query($db, $sqlpertimurjan);
	$peripheral_timurjan = mysqli_fetch_array($querypertimurjan);
	$peripheral_timurjan = ($peripheral_timurjan['sumpertimurjan']);
	if ($peripheral_timurjan==NULL){
		$peripheral_timurjan=0;
		
	}

	$sqlpertimurfeb = "SELECT sum(int_errortime) as sumpertimurfeb FROM peripheral_timur WHERE MONTH(down_time)=02 and Year(down_time) = '$year'";
	$querypertimurfeb = mysqli_query($db, $sqlpertimurfeb);
	$peripheral_timurfeb = mysqli_fetch_array($querypertimurfeb);
	$peripheral_timurfeb = ($peripheral_timurfeb['sumpertimurfeb']);
	if ($peripheral_timurfeb==NULL){
		$peripheral_timurfeb=0;	
	}

	$sqlpertimurmar = "SELECT sum(int_errortime) as sumpertimurmar FROM peripheral_timur WHERE MONTH(down_time)=03 and Year(down_time) = '$year'";
	$querypertimurmar = mysqli_query($db, $sqlpertimurmar);
	$peripheral_timurmar = mysqli_fetch_array($querypertimurmar);
	$peripheral_timurmar = ($peripheral_timurmar['sumpertimurmar']);
	if ($peripheral_timurmar==NULL){
		$peripheral_timurmar=0;
	}

	$sqlpertimurapr = "SELECT sum(int_errortime) as sumpertimurapr FROM peripheral_timur WHERE MONTH(down_time)=04 and Year(down_time) = '$year'";
	$querypertimurapr = mysqli_query($db, $sqlpertimurapr);
	$peripheral_timurapr = mysqli_fetch_array($querypertimurapr);
	$peripheral_timurapr = ($peripheral_timurapr['sumpertimurapr']);
	if ($peripheral_timurapr==NULL){
		$peripheral_timurapr=0;
	}

	$sqlpertimurmei = "SELECT sum(int_errortime) as sumpertimurmei FROM peripheral_timur WHERE MONTH(down_time)=05 and Year(down_time) = '$year'";
	$querypertimurmei = mysqli_query($db, $sqlpertimurmei);
	$peripheral_timurmei = mysqli_fetch_array($querypertimurmei);
	$peripheral_timurmei = ($peripheral_timurmei['sumpertimurmei']);
	if ($peripheral_timurmei==NULL){
		$peripheral_timurmei=0;
	}

	$sqlpertimurjun = "SELECT sum(int_errortime) as sumpertimurjun FROM peripheral_timur WHERE MONTH(down_time)=06 and Year(down_time) = '$year'";
	$querypertimurjun = mysqli_query($db, $sqlpertimurjun);
	$peripheral_timurjun = mysqli_fetch_array($querypertimurjun);
	$peripheral_timurjun = ($peripheral_timurjun['sumpertimurjun']);
	if ($peripheral_timurjun==NULL){
		$peripheral_timurjun=0;
	}

	$sqlpertimurjul = "SELECT sum(int_errortime) as sumpertimurjul FROM peripheral_timur WHERE MONTH(down_time)=07 and Year(down_time) = '$year'";
	$querypertimurjul = mysqli_query($db, $sqlpertimurjul);
	$peripheral_timurjul = mysqli_fetch_array($querypertimurjul);
	$peripheral_timurjul = ($peripheral_timurjul['sumpertimurjul']);
	if ($peripheral_timurjul==NULL){
		$peripheral_timurjul=0; 
	}

	$sqlpertimuragu = "SELECT sum(int_errortime) as sumpertimuragu FROM peripheral_timur WHERE MONTH(down_time)=08 and Year(down_time) = '$year'";
	$querypertimuragu = mysqli_query($db, $sqlpertimuragu);
	$peripheral_timuragu = mysqli_fetch_array($querypertimuragu);
	$peripheral_timuragu = ($peripheral_timuragu['sumpertimuragu']);
	if ($peripheral_timuragu==NULL){
		$peripheral_timuragu=0; 
	}

	$sqlpertimursep = "SELECT sum(int_errortime) as sumpertimursep FROM peripheral_timur WHERE MONTH(down_time)=09 and Year(down_time) = '$year'";
	$querypertimursep = mysqli_query($db, $sqlpertimursep);
	$peripheral_timursep = mysqli_fetch_array($querypertimursep);
	$peripheral_timursep = ($peripheral_timursep['sumpertimursep']);
	if ($peripheral_timursep==NULL){
		$peripheral_timursep=0; 
	}

	$sqlpertimurokt = "SELECT sum(int_errortime) as sumpertimurokt FROM peripheral_timur WHERE MONTH(down_time)=10 and Year(down_time) = '$year'";
	$querypertimurokt = mysqli_query($db, $sqlpertimurokt);
	$peripheral_timurokt = mysqli_fetch_array($querypertimurokt);
	$peripheral_timurokt = ($peripheral_timurokt['sumpertimurokt']);
	if ($peripheral_timurokt==NULL){
		$peripheral_timurokt=0; 
	}

	$sqlpertimurnov = "SELECT sum(int_errortime) as sumpertimurnov FROM peripheral_timur WHERE MONTH(down_time)=11 and Year(down_time) = '$year'";
	$querypertimurnov = mysqli_query($db, $sqlpertimurnov);
	$peripheral_timurnov = mysqli_fetch_array($querypertimurnov);
	$peripheral_timurnov = ($peripheral_timurnov['sumpertimurnov']);
	if ($peripheral_timurnov==NULL){
		$peripheral_timurnov=0; 
	}

	$sqlpertimurdes = "SELECT sum(int_errortime) as sumpertimurdes FROM peripheral_timur WHERE MONTH(down_time)=12 and Year(down_time) = '$year'";
	$querypertimurdes = mysqli_query($db, $sqlpertimurdes);
	$peripheral_timurdes = mysqli_fetch_array($querypertimurdes);
	$peripheral_timurdes = ($peripheral_timurdes['sumpertimurdes']);
	if ($peripheral_timurdes==NULL){
		$peripheral_timurdes=0; 
	}

	//JUMLAH GANGGUAN PERBULAN timur
	$gangguantimur_jan = $redudant_timurjan + $standalone_timurjan + $peripheral_timurjan;
	$gangguantimur_feb = $redudant_timurfeb + $standalone_timurfeb + $peripheral_timurfeb;
	$gangguantimur_mar = $redudant_timurmar + $standalone_timurmar + $peripheral_timurmar;
	$gangguantimur_apr = $redudant_timurapr + $standalone_timurapr + $peripheral_timurapr;
	$gangguantimur_mei = $redudant_timurmei + $standalone_timurmei + $peripheral_timurmei;
	$gangguantimur_jun = $redudant_timurjun + $standalone_timurjun + $peripheral_timurjun;
	$gangguantimur_jul = $redudant_timurjul + $standalone_timurjul + $peripheral_timurjul;
	$gangguantimur_agu = $redudant_timuragu + $standalone_timuragu + $peripheral_timuragu;
	$gangguantimur_sep = $redudant_timursep + $standalone_timursep + $peripheral_timursep;
	$gangguantimur_okt = $redudant_timurokt + $standalone_timurokt + $peripheral_timurokt;
	$gangguantimur_nov = $redudant_timurnov + $standalone_timurnov + $peripheral_timurnov;
	$gangguantimur_des = $redudant_timurdes + $standalone_timurdes + $peripheral_timurdes;

	setcookie("gangguantimur_jan", $gangguantimur_jan);
	setcookie("gangguantimur_feb", $gangguantimur_feb);
	setcookie("gangguantimur_mar", $gangguantimur_mar);
	setcookie("gangguantimur_apr", $gangguantimur_apr);
	setcookie("gangguantimur_mei", $gangguantimur_mei);
	setcookie("gangguantimur_jun", $gangguantimur_jun);
	setcookie("gangguantimur_jul", $gangguantimur_jul);
	setcookie("gangguantimur_agu", $gangguantimur_agu);
	setcookie("gangguantimur_sep", $gangguantimur_sep);
	setcookie("gangguantimur_okt", $gangguantimur_okt);
	setcookie("gangguantimur_nov", $gangguantimur_nov);
	setcookie("gangguantimur_des", $gangguantimur_des);

	//===============================================================================================================//
        //==============================================REDUDANT========================================================//
        
        //tdss1
        $sqltdss1 = "SELECT sum(int_errortime) as sumtdss1 FROM redudant_barat WHERE peralatan='Server 1' and Year(down_time) = '$year'"; 
        $querytdss1 = mysqli_query($db, $sqltdss1);
        $tdss1 = mysqli_fetch_array($querytdss1);
        $tdss1 = ($tdss1['sumtdss1'] *4);

        //tdhis1
        $sqltdhis1 = "SELECT sum(int_errortime) as sumtdhis1 FROM redudant_barat WHERE peralatan='Historical 1' and Year(down_time) = '$year'";
        $querytdhis1 = mysqli_query($db, $sqltdhis1);
        $tdhis1 = mysqli_fetch_array($querytdhis1);
        $tdhis1 = ($tdhis1['sumtdhis1'] *4);
        
        //avms1
        $avms1 = (1- (($tdss1 + $tdhis1)/(2 * $THIM)));
        $avms1 = $avms1 * 100;
        
        //tdss2
        $sqltdss2 = "SELECT sum(int_errortime) as sumtdss2 FROM redudant_barat WHERE peralatan='Server 2' and Year(down_time) = '$year'"; 
        $querytdss2 = mysqli_query($db, $sqltdss2);
        $tdss2 = mysqli_fetch_array($querytdss2); 
        $tdss2 = ($tdss2['sumtdss2'] *4);
        
        //tdhis2
        $sqltdhis2 = "SELECT sum(int_errortime) as sumtdhis2 FROM redudant_barat WHERE peralatan='Historical 2' and Year(down_time) = '$year'";
        $querytdhis2 = mysqli_query($db, $sqltdhis2);
        $tdhis2= mysqli_fetch_array($querytdhis2);
        $tdhis2 = ($tdhis2['sumtdhis2'] *4);    
        
        //avms2
        $avms2 = (1-(($tdss2 + $tdhis2)/(2 * $THIM)));
        $avms2 = $avms2 *100;
        
        //av redudant
        $avredudant = ( 1- (1-($avms1/100)) * (1-($avms2/100)) );
        $avredudant = $avredudant *100;
        $avredudant_barat= $avredudant;
        setcookie("avredudant_baratbulan",$avredudant_barat);
        
        //===============================================================================================================//
        //==============================================STAND ALONE======================================================//
        //tdol
        $sqltdol =  "SELECT sum(int_errortime) as sumtdol FROM standalone_barat WHERE peralatan='Offline DB' and Year(down_time) = '$year'"; 
        $querytdol = mysqli_query($db, $sqltdol);
        $tdol = mysqli_fetch_array($querytdol);
        $tdol = ($tdol['sumtdol'] *4);
        
        //tdwsm1
        $sqltdwsm1 =  "SELECT sum(int_errortime) as sumtdwsm1 FROM standalone_barat WHERE peralatan='WorkStation Metro 1' and Year(down_time) = '$year'";
        $querytdwsm1 = mysqli_query($db, $sqltdwsm1);
        $tdwsm1 = mysqli_fetch_array($querytdwsm1);
        $tdwsm1 = ($tdwsm1['sumtdwsm1'] *1.5);
        
        //tdwsm2
        $sqltdwsm2 = "SELECT sum(int_errortime) as sumtdwsm2 FROM standalone_barat WHERE peralatan='WorkStation Metro 2' and Year(down_time) = '$year'";
        $querytdwsm2 = mysqli_query($db, $sqltdwsm2);
        $tdwsm2 = mysqli_fetch_array($querytdwsm2);
        $tdwsm2 = ($tdwsm2['sumtdwsm2'] *1.5);
        
        //tdwsm3
        $sqltdwsm3 = "SELECT sum(int_errortime) as sumtdwsm3 FROM standalone_barat WHERE peralatan='WorkStation Metro 3' and Year(down_time) = '$year'";
        $querytdwsm3 = mysqli_query($db, $sqltdwsm3);
        $tdwsm3 = mysqli_fetch_array($querytdwsm3);
        $tdwsm3 = ($tdwsm3['sumtdwsm3'] *1.5);
        
        //tdwsb1
        $sqltdwsb1 = "SELECT sum(int_errortime) as sumtdwsb1 FROM standalone_barat WHERE peralatan='WorkStation Barat 1' and Year(down_time) = '$year'";
        $querytdwsb1 = mysqli_query($db, $sqltdwsb1);
        $tdwsb1 = mysqli_fetch_array($querytdwsb1);
        $tdwsb1 = ($tdwsb1['sumtdwsb1'] *1.5);
        
        //tdwsb2
        $sqltdwsb2 = "SELECT sum(int_errortime) as sumtdwsb2 FROM standalone_barat WHERE peralatan='WorkStation Barat 2' and Year(down_time) = '$year'";
        $querytdwsb2 = mysqli_query($db, $sqltdwsb2);
        $tdwsb2 = mysqli_fetch_array($querytdwsb2);
        $tdwsb2 = ($tdwsb2['sumtdwsb2'] *1.5);
        
        //tdwsb3
        $sqltdwsb3 = "SELECT sum(int_errortime) as sumtdwsb3 FROM standalone_barat WHERE peralatan='WorkStation Barat 3' and Year(down_time) = '$year'";
        $querytdwsb3 = mysqli_query($db, $sqltdwsb3);
        $tdwsb3 = mysqli_fetch_array($querytdwsb3);
        $tdwsb3 = ($tdwsb3['sumtdwsb3'] *1.5);
        
        //tdeng1
        $sqltdeng1 = "SELECT sum(int_errortime) as sumtdeng1 FROM standalone_barat WHERE peralatan='Engineering 1' and Year(down_time) = '$year'";
        $querytdeng1 = mysqli_query($db, $sqltdeng1);
        $tdeng1 = mysqli_fetch_array($querytdeng1);
        $tdeng1 = ($tdeng1['sumtdeng1'] *1.5);
        
        //tdeng2
        $sqltdeng2 = "SELECT sum(int_errortime) as sumtdeng2 FROM standalone_barat WHERE peralatan='Engineering 2' and Year(down_time) = '$year'";
        $querytdeng2 = mysqli_query($db, $sqltdeng2);
        $tdeng2 = mysqli_fetch_array($querytdeng2);
        $tdeng2 = ($tdeng2['sumtdeng2'] *1.5);

        //av stand alone
        $avsa = (1 - (($tdol + $tdwsm1 + $tdwsm2 + $tdwsm3 + $tdwsb1 + $tdwsb2 + $tdwsb3 +$tdeng1 + $tdeng2)/ (9* $THIM)));
        $avsa = $avsa *100;
        $avsa_barat = $avsa;
        setcookie('avsa_baratbulan',$avsa_barat);
        
        //===============================================================================================================//
        //==============================================PERIPHERAL======================================================//
        
        //tdswm1
        $sqltdswm1 = "SELECT sum(int_errortime) as sumtdswm1 FROM peripheral_barat WHERE peralatan='Switch Metro 1' and Year(down_time) = '$year'";
        $querytdswm1 = mysqli_query($db, $sqltdswm1);
        $tdswm1 = mysqli_fetch_array($querytdswm1);
        $tdswm1 = ($tdswm1['sumtdswm1'] *2);
        
        //tdswm2
        $sqltdswm2 = "SELECT sum(int_errortime) as sumtdswm2 FROM peripheral_barat WHERE peralatan='Switch Metro 2' and Year(down_time) = '$year'";
        $querytdswm2 = mysqli_query($db, $sqltdswm2);
        $tdswm2 = mysqli_fetch_array($querytdswm2);
        $tdswm2 = ($tdswm2['sumtdswm2'] *2);
        
        //tdtsm1
        $sqltdtsm1 = "SELECT sum(int_errortime) as sumtdtsm1 FROM peripheral_barat WHERE peralatan='Terminal Server Metro 1' and Year(down_time) = '$year'";
        $querytdtsm1 = mysqli_query($db, $sqltdtsm1);
        $tdtsm1 = mysqli_fetch_array($querytdtsm1);
        $tdtsm1 = ($tdtsm1['sumtdtsm1'] *0.5);
        
        //tdtsm2
        $sqltdtsm2 = "SELECT sum(int_errortime) as sumtdtsm2 FROM peripheral_barat WHERE peralatan='Terminal Server Metro 2' and Year(down_time) = '$year'";
        $querytdtsm2 = mysqli_query($db, $sqltdtsm2);
        $tdtsm2 = mysqli_fetch_array($querytdtsm2);
        $tdtsm2 = ($tdtsm2['sumtdtsm2'] *0.5);
        
        //tdswb1
        $sqltdswb1 = "SELECT sum(int_errortime) as sumtdswb1 FROM peripheral_barat WHERE peralatan='Switch Barat 1' and Year(down_time) = '$year'";
        $querytdswb1 = mysqli_query($db, $sqltdswb1);
        $tdswb1 = mysqli_fetch_array($querytdswb1);
        $tdswb1 = ($tdswb1 ['sumtdswb1'] *2);
        
        //tdswb2
        $sqltdswb2 = "SELECT sum(int_errortime) as sumtdswb2 FROM peripheral_barat WHERE peralatan='Switch Barat 2' and Year(down_time) = '$year'";
        $querytdswb2 = mysqli_query($db, $sqltdswb2);
        $tdswb2 = mysqli_fetch_array($querytdswb2);
        $tdswb2 = ($tdswb2 ['sumtdswb2'] *2);
        
        //tdtsb1
        $sqltdtsb1 = "SELECT sum(int_errortime) as sumtdtsb1 FROM peripheral_barat WHERE peralatan='Terminal Server Barat 1' and Year(down_time) = '$year'";
        $querytdtsb1 = mysqli_query($db, $sqltdtsb1);
        $tdtsb1 = mysqli_fetch_array($querytdtsb1);
        $tdtsb1 = ($tdtsb1['sumtdtsb1'] *0.5);
        
        //tdtsb2
        $sqltdtsb2 = "SELECT sum(int_errortime) as sumtdtsb2 FROM peripheral_barat WHERE peralatan='Terminal Server Barat 2' and Year(down_time) = '$year'";
        $querytdtsb2 = mysqli_query($db, $sqltdtsb2);
        $tdtsb2 = mysqli_fetch_array($querytdtsb2);
        $tdtsb2 = ($tdtsb2['sumtdtsb2'] *0.5);
        
        //tdgps
        $sqltdgps = "SELECT sum(int_errortime) as sumtdgps FROM peripheral_barat WHERE peralatan='Global Positioning Sys' and Year(down_time) = '$year'";
        $querytdgps =  mysqli_query($db, $sqltdgps);
        $tdgps = mysqli_fetch_array($querytdgps);
        $tdgps = ($tdgps['sumtdgps'] *0.5);
        
        //av PERIPHERAL
        $avper = (1 -(($tdswm1 + $tdswm2 + $tdtsm1 + $tdtsm2 + $tdswb1 + $tdswb2 + $tdtsb1 + $tdtsb2 + $tdgps)/(9 *$THIM)) );
        $avper = ($avper * 100);
        $avper_barat = $avper;
        setcookie('avper_baratbulan', $avper_barat);  

        //===============================================================================================================//
        //==============================================AV MASTER STATION BARAT======================================================//
        $avms_barat = (($avredudant + $avsa + $avper)/3);
        setcookie('avms_barat', $avms_barat);


        //TIMUR
        //===============================================================================================================//
        //==============================================REDUDANT========================================================//
        
        //tdss1
        $sqltdss1 = "SELECT sum(int_errortime) as sumtdss1 FROM redudant_timur WHERE peralatan='Server 1' and Year(down_time) = '$year'"; 
        $querytdss1 = mysqli_query($db, $sqltdss1);
        $tdss1 = mysqli_fetch_array($querytdss1);
        $tdss1 = ($tdss1['sumtdss1'] *4);
        
        //tdhis1
        $sqltdhis1 = "SELECT sum(int_errortime) as sumtdhis1 FROM redudant_timur WHERE peralatan='Historical 1' and Year(down_time) = '$year'";
        $querytdhis1 = mysqli_query($db, $sqltdhis1);
        $tdhis1 = mysqli_fetch_array($querytdhis1);
        $tdhis1 = ($tdhis1['sumtdhis1'] *4);
        
        //avms1
        $avms1 = (1- (($tdss1 + $tdhis1)/(2 * $THIM)));
        $avms1 = $avms1 * 100;
        
        //tdss2
        $sqltdss2 = "SELECT sum(int_errortime) as sumtdss2 FROM redudant_timur WHERE peralatan='Server 2' and Year(down_time) = '$year'"; 
        $querytdss2 = mysqli_query($db, $sqltdss2);
        $tdss2 = mysqli_fetch_array($querytdss2); 
        $tdss2 = ($tdss2['sumtdss2'] *4);
        
        //tdhis2
        $sqltdhis2 = "SELECT sum(int_errortime) as sumtdhis2 FROM redudant_timur WHERE peralatan='Historical 2' and Year(down_time) = '$year'";
        $querytdhis2 = mysqli_query($db, $sqltdhis2);
        $tdhis2= mysqli_fetch_array($querytdhis2);
        $tdhis2 = ($tdhis2['sumtdhis2'] *4);
        
        //avms2
        $avms2 = (1-(($tdss2 + $tdhis2)/(2 * $THIM)));
        $avms2 = $avms2 *100;
        
        //av redudant
        $avredudant = ( 1- (1-($avms1/100)) * (1-($avms2/100)) );
        $avredudant = $avredudant *100;
        $avredudant_timur = $avredudant;
        setcookie('avredudant_timurbulan', $avredudant_timur);
        
        //===============================================================================================================//
        //==============================================STAND ALONE======================================================//
        //tdol
        $sqltdol =  "SELECT sum(int_errortime) as sumtdol FROM standalone_timur WHERE peralatan='Offline DB' and Year(down_time) = '$year'"; 
        $querytdol = mysqli_query($db, $sqltdol);
        $tdol = mysqli_fetch_array($querytdol);
        $tdol = ($tdol['sumtdol'] *4);
        
        //tdwst1
        $sqltdwst1 =  "SELECT sum(int_errortime) as sumtdwst1 FROM standalone_timur WHERE peralatan='WorkStation Timur 1' and Year(down_time) = '$year'";
        $querytdwst1 = mysqli_query($db, $sqltdwst1);
        $tdwst1 = mysqli_fetch_array($querytdwst1);
        $tdwst1 = ($tdwst1['sumtdwst1'] *1.5);
        
        //tdwst2
        $sqltdwst2 =  "SELECT sum(int_errortime) as sumtdwst2 FROM standalone_timur WHERE peralatan='WorkStation Timur 2' and Year(down_time) = '$year'";
        $querytdwst2 = mysqli_query($db, $sqltdwst2);
        $tdwst2 = mysqli_fetch_array($querytdwst2);
        $tdwst2 = ($tdwst2['sumtdwst2'] *1.5);
        
        //tdwst3
        $sqltdwst3 =  "SELECT sum(int_errortime) as sumtdwst3 FROM standalone_timur WHERE peralatan='WorkStation Timur 3' and Year(down_time) = '$year'";
        $querytdwst3 = mysqli_query($db, $sqltdwst3);
        $tdwst3 = mysqli_fetch_array($querytdwst3);
        $tdwst3 = ($tdwst3['sumtdwst3'] *1.5);
        
        //tdeng1
        $sqltdeng1 = "SELECT sum(int_errortime) as sumtdeng1 FROM standalone_timur WHERE peralatan='Engineering 1' and Year(down_time) = '$year'";
        $querytdeng1 = mysqli_query($db, $sqltdeng1);
        $tdeng1 = mysqli_fetch_array($querytdeng1);
        $tdeng1 = ($tdeng1['sumtdeng1'] *1.5);
        
        //av stand alone
        $avsa = (1 - (($tdol + $tdwst1 + $tdwst2 + $tdwst3 + $tdeng1)/(5 *$THIM)));
        $avsa = $avsa *100;
        $avsa_timur = $avsa;
        setcookie('avsa_timurbulan', $avsa_timur);
        
        //===============================================================================================================//
        //==============================================PERIPHERAL======================================================//
        
        //tdswt1
        $sqltdswt1 = "SELECT sum(int_errortime) as sumtdswt1 FROM peripheral_timur WHERE peralatan='Switch Timur 1' and Year(down_time) = '$year'";
        $querytdswt1 = mysqli_query($db, $sqltdswt1);
        $tdswt1 = mysqli_fetch_array($querytdswt1);
        $tdswt1 = ($tdswt1['sumtdswt1'] *2);
        
        //tdswt2
        $sqltdswt2 = "SELECT sum(int_errortime) as sumtdswt2 FROM peripheral_timur WHERE peralatan='Switch Timur 2' and Year(down_time) = '$year'";
        $querytdswt2 = mysqli_query($db, $sqltdswt2);
        $tdswt2 = mysqli_fetch_array($querytdswt2);
        $tdswt2 = ($tdswt2['sumtdswt2'] *2);
        
        //tdtst1
        $sqltdtst1 = "SELECT sum(int_errortime) as sumtdtst1 FROM peripheral_timur WHERE peralatan='Terminal Server Timur 1' and Year(down_time) = '$year'";
        $querytdtst1 = mysqli_query($db, $sqltdtst1);
        $tdtst1 =  mysqli_fetch_array($querytdtst1);
        $tdtst1 = ($tdtst1['sumtdtst1'] *0.5);
        
        //tdtst2
        $sqltdtst2 = "SELECT sum(int_errortime) as sumtdtst2 FROM peripheral_timur WHERE peralatan='Terminal Server Timur 2' and Year(down_time) = '$year'";
        $querytdtst2 = mysqli_query($db, $sqltdtst2);
        $tdtst2 =  mysqli_fetch_array($querytdtst2);
        $tdtst2 = ($tdtst2['sumtdtst2'] *0.5);
        
        //tdgps
        $sqltdgps = "SELECT sum(int_errortime) as sumtdgps FROM peripheral_timur WHERE peralatan='Global Positioning Sys' and Year(down_time) = '$year'";
        $querytdgps = mysqli_query($db, $sqltdgps);
        $tdgps = mysqli_fetch_array($querytdgps);
        $tdgps = ($tdgps['sumtdgps'] *0.5);
        
        //av peripheral
        $avper = (1 - (($tdswt1 + $tdwst2 +$tdtst1 + $tdtst2 +$tdgps)/(5 *$THIM)));
        $avper = $avper *100;
        setcookie('avper_timur', $avper);
        
        //av master station timur
        $avms_timur = (($avredudant + $avsa + $avper)/3);
        setcookie('avms_timurbulan', $avms_timur);

        //echo $_COOKIE['avms_barat'];
        //echo $_COOKIE['avms_timur'];

        $averagepeforma = ($avms_barat + $avms_timur)/2;
        setcookie('averagepeformabulan', $averagepeforma);
}
?>