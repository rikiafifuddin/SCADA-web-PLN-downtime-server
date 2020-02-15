<?php
	include("connection.php");
	
	//Total Hours in Month
	$hari=date('t');
	$tahun=date('Y');
	$THIM = 24 * $hari;
if (isset($_POST['Monthpick'])){
	$datepick = new DateTime(date('Y-m-d H:i:s', strtotime($_POST['bulan'])));
	$datepick = $datepick->format('Y');
	$tahun = $datepick;
	//header("location:index.php");
}	
	//===============================================================================================================//
	//==============================================REDUDANT========================================================//	
	//tdss1
	$sqltdss1 = "SELECT sum(int_errortime) as sumtdss1 FROM redudant_barat WHERE peralatan='Server 1' and Year(down_time)= '$tahun'"; 
	$querytdss1 = mysqli_query($db, $sqltdss1);
	$tdss1 = mysqli_fetch_array($querytdss1);
	$tdss1 = ($tdss1['sumtdss1'] *4);

	//tdhis1
	$sqltdhis1 = "SELECT sum(int_errortime) as sumtdhis1 FROM redudant_barat WHERE peralatan='Historical 1' and Year(down_time)= '$tahun'";
	$querytdhis1 = mysqli_query($db, $sqltdhis1);
	$tdhis1 = mysqli_fetch_array($querytdhis1);
	$tdhis1 = ($tdhis1['sumtdhis1'] *4);
	
	//avms1
	$avms1 = (1- (($tdss1 + $tdhis1)/(2 * $THIM)));
	$avms1 = $avms1 * 100;
	
	//tdss2
	$sqltdss2 = "SELECT sum(int_errortime) as sumtdss2 FROM redudant_barat WHERE peralatan='Server 2' and Year(down_time)= '$tahun'"; 
	$querytdss2 = mysqli_query($db, $sqltdss2);
	$tdss2 = mysqli_fetch_array($querytdss2); 
	$tdss2 = ($tdss2['sumtdss2'] *4);
	
	//tdhis2
	$sqltdhis2 = "SELECT sum(int_errortime) as sumtdhis2 FROM redudant_barat WHERE peralatan='Historical 2' and Year(down_time)= '$tahun'";
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
	setcookie("avredudant_barat", $avredudant_barat);
	
	//===============================================================================================================//
	//==============================================STAND ALONE======================================================//
	//tdol
	$sqltdol =  "SELECT sum(int_errortime) as sumtdol FROM standalone_barat WHERE peralatan='Offline DB' and Year(down_time)= '$tahun'"; 
	$querytdol = mysqli_query($db, $sqltdol);
	$tdol = mysqli_fetch_array($querytdol);
	$tdol = ($tdol['sumtdol'] *4);
	
	//tdwsm1
	$sqltdwsm1 =  "SELECT sum(int_errortime) as sumtdwsm1 FROM standalone_barat WHERE peralatan='WorkStation Metro 1' and Year(down_time)= '$tahun'";
	$querytdwsm1 = mysqli_query($db, $sqltdwsm1);
	$tdwsm1 = mysqli_fetch_array($querytdwsm1);
	$tdwsm1 = ($tdwsm1['sumtdwsm1'] *1.5);
	
	//tdwsm2
	$sqltdwsm2 = "SELECT sum(int_errortime) as sumtdwsm2 FROM standalone_barat WHERE peralatan='WorkStation Metro 2' and Year(down_time)= '$tahun'";
	$querytdwsm2 = mysqli_query($db, $sqltdwsm2);
	$tdwsm2 = mysqli_fetch_array($querytdwsm2);
	$tdwsm2 = ($tdwsm2['sumtdwsm2'] *1.5);
	
	//tdwsm3
	$sqltdwsm3 = "SELECT sum(int_errortime) as sumtdwsm3 FROM standalone_barat WHERE peralatan='WorkStation Metro 3' and Year(down_time)= '$tahun'";
	$querytdwsm3 = mysqli_query($db, $sqltdwsm3);
	$tdwsm3 = mysqli_fetch_array($querytdwsm3);
	$tdwsm3 = ($tdwsm3['sumtdwsm3'] *1.5);
	
	//tdwsb1
	$sqltdwsb1 = "SELECT sum(int_errortime) as sumtdwsb1 FROM standalone_barat WHERE peralatan='WorkStation Barat 1' and Year(down_time)= '$tahun'";
	$querytdwsb1 = mysqli_query($db, $sqltdwsb1);
	$tdwsb1 = mysqli_fetch_array($querytdwsb1);
	$tdwsb1 = ($tdwsb1['sumtdwsb1'] *1.5);
	
	//tdwsb2
	$sqltdwsb2 = "SELECT sum(int_errortime) as sumtdwsb2 FROM standalone_barat WHERE peralatan='WorkStation Barat 2' and Year(down_time)= '$tahun'";
	$querytdwsb2 = mysqli_query($db, $sqltdwsb2);
	$tdwsb2 = mysqli_fetch_array($querytdwsb2);
	$tdwsb2 = ($tdwsb2['sumtdwsb2'] *1.5);
	
	//tdwsb3
	$sqltdwsb3 = "SELECT sum(int_errortime) as sumtdwsb3 FROM standalone_barat WHERE peralatan='WorkStation Barat 3' and Year(down_time)= '$tahun'";
	$querytdwsb3 = mysqli_query($db, $sqltdwsb3);
	$tdwsb3 = mysqli_fetch_array($querytdwsb3);
	$tdwsb3 = ($tdwsb3['sumtdwsb3'] *1.5);
	
	//tdeng1
	$sqltdeng1 = "SELECT sum(int_errortime) as sumtdeng1 FROM standalone_barat WHERE peralatan='Engineering 1' and Year(down_time)= '$tahun'";
	$querytdeng1 = mysqli_query($db, $sqltdeng1);
	$tdeng1 = mysqli_fetch_array($querytdeng1);
	$tdeng1 = ($tdeng1['sumtdeng1'] *1.5);
	
	//tdeng2
	$sqltdeng2 = "SELECT sum(int_errortime) as sumtdeng2 FROM standalone_barat WHERE peralatan='Engineering 2' and Year(down_time)= '$tahun'";
	$querytdeng2 = mysqli_query($db, $sqltdeng2);
	$tdeng2 = mysqli_fetch_array($querytdeng2);
	$tdeng2 = ($tdeng2['sumtdeng2'] *1.5);

	//av stand alone
	$avsa = (1 - (($tdol + $tdwsm1 + $tdwsm2 + $tdwsm3 + $tdwsb1 + $tdwsb2 + $tdwsb3 +$tdeng1 + $tdeng2)/ (9* $THIM)));
	$avsa = $avsa *100;
	$avsa_barat = $avsa;
	//setcookie("avsa_barat", $avsa_barat);
	//===============================================================================================================//
	//==============================================PERIPHERAL======================================================//
	
	//tdswm1
	$sqltdswm1 = "SELECT sum(int_errortime) as sumtdswm1 FROM peripheral_barat WHERE peralatan='Switch Metro 1' and Year(down_time)= '$tahun'";
	$querytdswm1 = mysqli_query($db, $sqltdswm1);
	$tdswm1 = mysqli_fetch_array($querytdswm1);
	$tdswm1 = ($tdswm1['sumtdswm1'] *2);
	
	//tdswm2
	$sqltdswm2 = "SELECT sum(int_errortime) as sumtdswm2 FROM peripheral_barat WHERE peralatan='Switch Metro 2' and Year(down_time)= '$tahun'";
	$querytdswm2 = mysqli_query($db, $sqltdswm2);
	$tdswm2 = mysqli_fetch_array($querytdswm2);
	$tdswm2 = ($tdswm2['sumtdswm2'] *2);
	
	//tdtsm1
	$sqltdtsm1 = "SELECT sum(int_errortime) as sumtdtsm1 FROM peripheral_barat WHERE peralatan='Terminal Server Metro 1' and Year(down_time)= '$tahun'";
	$querytdtsm1 = mysqli_query($db, $sqltdtsm1);
	$tdtsm1 = mysqli_fetch_array($querytdtsm1);
	$tdtsm1 = ($tdtsm1['sumtdtsm1'] *0.5);
	
	//tdtsm2
	$sqltdtsm2 = "SELECT sum(int_errortime) as sumtdtsm2 FROM peripheral_barat WHERE peralatan='Terminal Server Metro 2' and Year(down_time)= '$tahun'";
	$querytdtsm2 = mysqli_query($db, $sqltdtsm2);
	$tdtsm2 = mysqli_fetch_array($querytdtsm2);
	$tdtsm2 = ($tdtsm2['sumtdtsm2'] *0.5);
	
	//tdswb1
	$sqltdswb1 = "SELECT sum(int_errortime) as sumtdswb1 FROM peripheral_barat WHERE peralatan='Switch Barat 1' and Year(down_time)= '$tahun'";
	$querytdswb1 = mysqli_query($db, $sqltdswb1);
	$tdswb1 = mysqli_fetch_array($querytdswb1);
	$tdswb1 = ($tdswb1 ['sumtdswb1'] *2);
	
	//tdswb2
	$sqltdswb2 = "SELECT sum(int_errortime) as sumtdswb2 FROM peripheral_barat WHERE peralatan='Switch Barat 2' and Year(down_time)= '$tahun'";
	$querytdswb2 = mysqli_query($db, $sqltdswb2);
	$tdswb2 = mysqli_fetch_array($querytdswb2);
	$tdswb2 = ($tdswb2 ['sumtdswb2'] *2);
	
	//tdtsb1
	$sqltdtsb1 = "SELECT sum(int_errortime) as sumtdtsb1 FROM peripheral_barat WHERE peralatan='Terminal Server Barat 1' and Year(down_time)= '$tahun'";
	$querytdtsb1 = mysqli_query($db, $sqltdtsb1);
	$tdtsb1 = mysqli_fetch_array($querytdtsb1);
	$tdtsb1 = ($tdtsb1['sumtdtsb1'] *0.5);
	
	//tdtsb2
	$sqltdtsb2 = "SELECT sum(int_errortime) as sumtdtsb2 FROM peripheral_barat WHERE peralatan='Terminal Server Barat 2' and Year(down_time)= '$tahun'";
	$querytdtsb2 = mysqli_query($db, $sqltdtsb2);
	$tdtsb2 = mysqli_fetch_array($querytdtsb2);
	$tdtsb2 = ($tdtsb2['sumtdtsb2'] *0.5);
	
	//tdgps
	$sqltdgps = "SELECT sum(int_errortime) as sumtdgps FROM peripheral_barat WHERE peralatan='Global Positioning Sys' and Year(down_time)= '$tahun'";
	$querytdgps =  mysqli_query($db, $sqltdgps);
	$tdgps = mysqli_fetch_array($querytdgps);
	$tdgps = ($tdgps['sumtdgps'] *0.5);
	
	//av PERIPHERAL
	$avper = (1 -(($tdswm1 + $tdswm2 + $tdtsm1 + $tdtsm2 + $tdswb1 + $tdswb2 + $tdtsb1 + $tdtsb2 + $tdgps)/(9 *$THIM)) );
	$avper = ($avper * 100);
	$avper_barat = $avper;	
	//setcookie("avper_barat", $avper_barat);
	//===============================================================================================================//
	//==============================================AV MASTER STATION BARAT======================================================//
	
	$avms_barat = (($avredudant + $avsa + $avper)/3);
	//setcookie("avms_barat", $avms_barat);
?>