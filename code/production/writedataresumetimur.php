<?php
include("connection.php");

	//Total Hours in Month
	$hari=date('t');
	$THIM = 24 * $hari;
	//TIMUR
	//===============================================================================================================//
	//==============================================REDUDANT========================================================//
	
	//tdss1
	$sqltdss1 = "SELECT sum(int_errortime) as sumtdss1 FROM redudant_timur WHERE peralatan='Server 1'"; 
	$querytdss1 = mysqli_query($db, $sqltdss1);
	$tdss1 = mysqli_fetch_array($querytdss1);
	$tdss1 = ($tdss1['sumtdss1'] *4);
	
	//tdhis1
	$sqltdhis1 = "SELECT sum(int_errortime) as sumtdhis1 FROM redudant_timur WHERE peralatan='Historical 1'";
	$querytdhis1 = mysqli_query($db, $sqltdhis1);
	$tdhis1 = mysqli_fetch_array($querytdhis1);
	$tdhis1 = ($tdhis1['sumtdhis1'] *4);
	
	//avms1
	$avms1 = (1- (($tdss1 + $tdhis1)/(2 * $THIM)));
	$avms1 = $avms1 * 100;
	
	//tdss2
	$sqltdss2 = "SELECT sum(int_errortime) as sumtdss2 FROM redudant_timur WHERE peralatan='Server 2'"; 
	$querytdss2 = mysqli_query($db, $sqltdss2);
	$tdss2 = mysqli_fetch_array($querytdss2); 
	$tdss2 = ($tdss2['sumtdss2'] *4);
	
	//tdhis2
	$sqltdhis2 = "SELECT sum(int_errortime) as sumtdhis2 FROM redudant_timur WHERE peralatan='Historical 2'";
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
	
	//===============================================================================================================//
	//==============================================STAND ALONE======================================================//
	//tdol
	$sqltdol =  "SELECT sum(int_errortime) as sumtdol FROM standalone_timur WHERE peralatan='Offline DB'"; 
	$querytdol = mysqli_query($db, $sqltdol);
	$tdol = mysqli_fetch_array($querytdol);
	$tdol = ($tdol['sumtdol'] *4);
	
	//tdwst1
	$sqltdwst1 =  "SELECT sum(int_errortime) as sumtdwst1 FROM standalone_timur WHERE peralatan='WorkStation Timur 1'";
	$querytdwst1 = mysqli_query($db, $sqltdwst1);
	$tdwst1 = mysqli_fetch_array($querytdwst1);
	$tdwst1 = ($tdwst1['sumtdwst1'] *1.5);
	
	//tdwst2
	$sqltdwst2 =  "SELECT sum(int_errortime) as sumtdwst2 FROM standalone_timur WHERE peralatan='WorkStation Timur 2'";
	$querytdwst2 = mysqli_query($db, $sqltdwst2);
	$tdwst2 = mysqli_fetch_array($querytdwst2);
	$tdwst2 = ($tdwst2['sumtdwst2'] *1.5);
	
	//tdwst3
	$sqltdwst3 =  "SELECT sum(int_errortime) as sumtdwst3 FROM standalone_timur WHERE peralatan='WorkStation Timur 3'";
	$querytdwst3 = mysqli_query($db, $sqltdwst3);
	$tdwst3 = mysqli_fetch_array($querytdwst3);
	$tdwst3 = ($tdwst3['sumtdwst3'] *1.5);
	
	//tdeng1
	$sqltdeng1 = "SELECT sum(int_errortime) as sumtdeng1 FROM standalone_timur WHERE peralatan='Engineering 1'";
	$querytdeng1 = mysqli_query($db, $sqltdeng1);
	$tdeng1 = mysqli_fetch_array($querytdeng1);
	$tdeng1 = ($tdeng1['sumtdeng1'] *1.5);
	
	//av stand alone
	$avsa = (1 - (($tdol + $tdwst1 + $tdwst2 + $tdwst3 + $tdeng1)/(5 *$THIM)));
	$avsa = $avsa *100;
	$avsa_timur = $avsa;
	
	//===============================================================================================================//
	//==============================================PERIPHERAL======================================================//
	
	//tdswt1
	$sqltdswt1 = "SELECT sum(int_errortime) as sumtdswt1 FROM peripheral_timur WHERE peralatan='Switch Timur 1'";
	$querytdswt1 = mysqli_query($db, $sqltdswt1);
	$tdswt1 = mysqli_fetch_array($querytdswt1);
	$tdswt1 = ($tdswt1['sumtdswt1'] *2);
	
	//tdswt2
	$sqltdswt2 = "SELECT sum(int_errortime) as sumtdswt2 FROM peripheral_timur WHERE peralatan='Switch Timur 2'";
	$querytdswt2 = mysqli_query($db, $sqltdswt2);
	$tdswt2 = mysqli_fetch_array($querytdswt2);
	$tdswt2 = ($tdswt2['sumtdswt2'] *2);
	
	//tdtst1
	$sqltdtst1 = "SELECT sum(int_errortime) as sumtdtst1 FROM peripheral_timur WHERE peralatan='Terminal Server Timur 1'";
	$querytdtst1 = mysqli_query($db, $sqltdtst1);
	$tdtst1 =  mysqli_fetch_array($querytdtst1);
	$tdtst1 = ($tdtst1['sumtdtst1'] *0.5);
	
	//tdtst2
	$sqltdtst2 = "SELECT sum(int_errortime) as sumtdtst2 FROM peripheral_timur WHERE peralatan='Terminal Server Timur 2'";
	$querytdtst2 = mysqli_query($db, $sqltdtst2);
	$tdtst2 =  mysqli_fetch_array($querytdtst2);
	$tdtst2 = ($tdtst2['sumtdtst2'] *0.5);
	
	//tdgps
	$sqltdgps = "SELECT sum(int_errortime) as sumtdgps FROM peripheral_timur WHERE peralatan='Global Positioning Sys'";
	$querytdgps = mysqli_query($db, $sqltdgps);
	$tdgps = mysqli_fetch_array($querytdgps);
	$tdgps = ($tdgps['sumtdgps'] *0.5);
	
	//av peripheral
	$avper = (1 - (($tdswt1 + $tdwst2 +$tdtst1 + $tdtst2 +$tdgps)/(5 *$THIM)));
	$avper = $avper *100;
	
	//av master station timur
	$avms_timur = (($avredudant + $avsa + $avper)/3);
?>