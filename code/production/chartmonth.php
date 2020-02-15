<?php
    include("connection.php");  
        
    if(isset($_POST['Monthpick'])){
        $bulan = $_POST['bulan'];
        $datepick = new DateTime(date('Y-m-d H:i:s', strtotime($_POST['bulan'])));
        $tahunJ = $datepick->format('Y');
        $bulanJ= $datepick->format('m');
        $Jhari =cal_days_in_month(CAL_GREGORIAN, $bulanJ , $tahunJ);
        $THIM = 24 * $Jhari;
        $hari=01;
        while ($hari <32){
            //BARAT
            $sqlred_barat = "SELECT sum(int_errortime) as sumred_barat FROM redudant_barat WHERE Day(down_time)=$hari and Month(down_time)=Month('$bulan') and Year(down_time) = Year('$bulan')";
            $queryred_barat = mysqli_query($db, $sqlred_barat);
            $resultred_barat = mysqli_fetch_array($queryred_barat);
            if ($resultred_barat ['sumred_barat']==NULL){
                $resultred_barat ['sumred_barat']=0;
            }
            $sqlsa_barat ="SELECT sum(int_errortime) as sumsa_barat FROM standalone_barat WHERE Day(down_time)=$hari and Month(down_time)=Month('$bulan') and Year(down_time) = Year('$bulan')";
            $querysa_barat = mysqli_query($db, $sqlsa_barat);
            $resultsa_barat = mysqli_fetch_array($querysa_barat);
            if ($resultsa_barat ['sumsa_barat']==NULL){
                $resultsa_barat ['sumsa_barat']=0;
            }
            $sqlper_barat ="SELECT sum(int_errortime) as sumper_barat FROM peripheral_barat WHERE Day(down_time)=$hari and Month(down_time)=Month('$bulan') and Year(down_time) = Year('$bulan')";
            $queryper_barat = mysqli_query($db, $sqlper_barat);
            $resultper_barat = mysqli_fetch_array($queryper_barat);
            if ($resultper_barat ['sumper_barat']==NULL){
                $resultper_barat ['sumper_barat']=0;
            }
            $tdbarat = $resultred_barat['sumred_barat'] + $resultsa_barat['sumsa_barat'] + $resultper_barat['sumper_barat'];
            setcookie("hari".$hari, $tdbarat);

            //TIMUR
            $sqlred_timur = "SELECT sum(int_errortime) as sumred_timur FROM redudant_timur WHERE Day(down_time)=$hari and Month(down_time)=Month('$bulan') and Year(down_time) = Year('$bulan')";
            $queryred_timur = mysqli_query($db, $sqlred_timur);
            $resultred_timur = mysqli_fetch_array($queryred_timur);
            if ($resultred_timur ['sumred_timur']==NULL){
                $resultred_timur ['sumred_timur']=0;
            }
            $sqlsa_timur ="SELECT sum(int_errortime) as sumsa_timur FROM standalone_timur WHERE Day(down_time)=$hari and Month(down_time)=Month('$bulan') and Year(down_time) = Year('$bulan')";
            $querysa_timur = mysqli_query($db, $sqlsa_timur);
            $resultsa_timur = mysqli_fetch_array($querysa_timur);
            if ($resultsa_timur ['sumsa_timur']==NULL){
                $resultsa_timur ['sumsa_timur']=0;
            }
            $sqlper_timur ="SELECT sum(int_errortime) as sumper_timur FROM peripheral_timur WHERE Day(down_time)=$hari and Month(down_time)=Month('$bulan') and Year(down_time) = Year('$bulan')";
            $queryper_timur = mysqli_query($db, $sqlper_timur);
            $resultper_timur = mysqli_fetch_array($queryper_timur);
            if ($resultper_timur ['sumper_timur']==NULL){
                $resultper_timur ['sumper_timur']=0;
            }
            $tdtimur = $resultred_timur['sumred_timur'] + $resultsa_timur['sumsa_timur'] + $resultper_timur ['sumper_timur'];
            setcookie("day".$hari, $tdtimur);


            $hari = $hari+1;
        }

        // LAMA GANGGUAN PER BULAN BARAT
        $sqlredudant_barat = "SELECT sum(int_errortime) as sumredudant_barat FROM redudant_barat WHERE Month(down_time) = Month('$bulan') and Year(down_time)= Year('$bulan')";
        $queryredudant_barat = mysqli_query($db, $sqlredudant_barat);
        $resultredudant_barat = mysqli_fetch_array($queryredudant_barat);
            if ($resultredudant_barat ['sumredudant_barat']==NULL){
                $resultredudant_barat ['sumredudant_barat']=0;
            }
        $resultredudant_barat = ($resultredudant_barat['sumredudant_barat']);

        $sqlstandalone_barat = "SELECT sum(int_errortime) as sumstandalone_barat FROM standalone_barat WHERE Month(down_time) = Month('$bulan') and Year(down_time)= Year('$bulan')";
        $querystandalone_barat = mysqli_query($db, $sqlstandalone_barat);
        $resultstandalone_barat = mysqli_fetch_array($querystandalone_barat);
            if ($resultstandalone_barat ['sumstandalone_barat']==NULL){
                $resultstandalone_barat ['sumstandalone_barat']=0;
            }
        $resultstandalone_barat = ($resultstandalone_barat['sumstandalone_barat']);

        $sqlperipheral_barat = "SELECT sum(int_errortime) as sumperipheral_barat FROM peripheral_barat WHERE Month(down_time) = Month('$bulan') and Year(down_time)= Year('$bulan')";
        $queryperipheral_barat = mysqli_query($db, $sqlperipheral_barat);
        $resultperipheral_barat = mysqli_fetch_array($queryperipheral_barat);
            if ($resultperipheral_barat ['sumperipheral_barat']==NULL){
                $resultperipheral_barat ['sumperipheral_barat']=0;
            }
        $resultperipheral_barat = ($resultperipheral_barat['sumperipheral_barat']);
        $lamagangguan_barat_per = ($resultredudant_barat + $resultperipheral_barat +$resultstandalone_barat)/10;
        setcookie('lamagangguan_barat' ,$lamagangguan_barat_per);

        // LAMA GANGGUAN PER BULAN TIMUR
        $sqlredudant_timur = "SELECT sum(int_errortime) as sumredudant_timur FROM redudant_timur WHERE Month(down_time) = Month('$bulan') and Year(down_time)= Year('$bulan')";
        $queryredudant_timur = mysqli_query($db, $sqlredudant_timur);
        $resultredudant_timur = mysqli_fetch_array($queryredudant_timur);
            if ($resultredudant_timur ['sumredudant_timur']==NULL){
                $resultredudant_timur ['sumredudant_timur']=0;
            }
        $resultredudant_timur = ($resultredudant_timur['sumredudant_timur']);

        $sqlstandalone_timur = "SELECT sum(int_errortime) as sumstandalone_timur FROM standalone_timur WHERE Month(down_time) = Month('$bulan') and Year(down_time)= Year('$bulan')";
        $querystandalone_timur = mysqli_query($db, $sqlstandalone_timur);
        $resultstandalone_timur = mysqli_fetch_array($querystandalone_timur);
            if ($resultstandalone_timur ['sumstandalone_timur']==NULL){
                $resultstandalone_timur ['sumstandalone_timur']=0;
            }
        $resultstandalone_timur = ($resultstandalone_timur['sumstandalone_timur']);

        $sqlperipheral_timur = "SELECT sum(int_errortime) as sumperipheral_timur FROM peripheral_timur WHERE Month(down_time) = Month('$bulan') and Year(down_time)= Year('$bulan')";
        $queryperipheral_timur = mysqli_query($db, $sqlperipheral_timur);
        $resultperipheral_timur = mysqli_fetch_array($queryperipheral_timur);
            if ($resultperipheral_timur ['sumperipheral_timur']==NULL){
                $resultperipheral_timur ['sumperipheral_timur']=0;
            }
        $resultperipheral_timur = ($resultperipheral_timur['sumperipheral_timur']);
        $lamagangguan_timur_per = ($resultredudant_timur + $resultstandalone_timur + $resultperipheral_timur)/10;
        setcookie('lamagangguan_timur' ,$lamagangguan_timur_per);

        // BANYAK GANGGUAN PERBULAN BARAT
        $sqlcountredudant_barat = "SELECT count(int_errortime) as countredudant_barat FROM redudant_barat WHERE Month(down_time) = Month('$bulan') and Year(down_time)= Year('$bulan')";
        $querycountredudant_barat = mysqli_query($db, $sqlcountredudant_barat);
        $resultcountredudant_barat = mysqli_fetch_array($querycountredudant_barat);
            if ($resultcountredudant_barat ['countredudant_barat']==NULL){
                $resultcountredudant_barat ['countredudant_barat']=0;
            }
        $resultcountredudant_barat = ($resultcountredudant_barat['countredudant_barat']);

        $sqlcountstandalone_barat = "SELECT count(int_errortime) as countstandalone_barat FROM standalone_barat WHERE Month(down_time) = Month('$bulan') and Year(down_time)= Year('$bulan')";
        $querycountstandalone_barat = mysqli_query($db, $sqlcountstandalone_barat);
        $resultcountstandalone_barat = mysqli_fetch_array($querycountstandalone_barat);
            if ($resultcountstandalone_barat ['countstandalone_barat']==NULL){
                $resultcountstandalone_barat ['countstandalone_barat']=0;
            }
        $resultcountstandalone_barat = ($resultcountstandalone_barat['countstandalone_barat']);

        $sqlcountperipheral_barat = "SELECT count(int_errortime) as countperipheral_barat FROM peripheral_barat WHERE Month(down_time) = Month('$bulan') and Year(down_time)= Year('$bulan')";
        $querycountperipheral_barat = mysqli_query($db, $sqlcountperipheral_barat);
        $resultcountperipheral_barat = mysqli_fetch_array($querycountperipheral_barat);
            if ($resultcountperipheral_barat ['countperipheral_barat']==NULL){
                $resultcountperipheral_barat ['countperipheral_barat']=0;
            }
        $resultcountperipheral_barat = ($resultcountperipheral_barat['countperipheral_barat']);
        $banyakgangguan_barat_per = ($resultcountredudant_barat + $resultcountstandalone_barat + $resultcountperipheral_barat)/10;
        setcookie('banyakgangguanbarat' ,$banyakgangguan_barat_per);

        // BANYAK GANGGUAN PERBULAN timur
        $sqlcountredudant_timur = "SELECT count(int_errortime) as countredudant_timur FROM redudant_timur WHERE Month(down_time) = Month('$bulan') and Year(down_time)= Year('$bulan')";
        $querycountredudant_timur = mysqli_query($db, $sqlcountredudant_timur);
        $resultcountredudant_timur = mysqli_fetch_array($querycountredudant_timur);
            if ($resultcountredudant_timur ['countredudant_timur']==NULL){
                $resultcountredudant_timur ['countredudant_timur']=0;
            }
        $resultcountredudant_timur = ($resultcountredudant_timur['countredudant_timur']);

        $sqlcountstandalone_timur = "SELECT count(int_errortime) as countstandalone_timur FROM standalone_timur WHERE Month(down_time) = Month('$bulan') and Year(down_time)= Year('$bulan')";
        $querycountstandalone_timur = mysqli_query($db, $sqlcountstandalone_timur);
        $resultcountstandalone_timur = mysqli_fetch_array($querycountstandalone_timur);
            if ($resultcountstandalone_timur ['countstandalone_timur']==NULL){
                $resultcountstandalone_timur ['countstandalone_timur']=0;
            }
        $resultcountstandalone_timur = ($resultcountstandalone_timur['countstandalone_timur']);

        $sqlcountperipheral_timur = "SELECT count(int_errortime) as countperipheral_timur FROM peripheral_timur WHERE Month(down_time) = Month('$bulan') and Year(down_time)= Year('$bulan')";
        $querycountperipheral_timur = mysqli_query($db, $sqlcountperipheral_timur);
        $resultcountperipheral_timur = mysqli_fetch_array($querycountperipheral_timur);
            if ($resultcountperipheral_timur ['countperipheral_timur']==NULL){
                $resultcountperipheral_timur ['countperipheral_timur']=0;
            }
        $resultcountperipheral_timur = ($resultcountperipheral_timur['countperipheral_timur']);
        $banyakgangguan_timur_per = ($resultcountredudant_timur + $resultcountstandalone_timur + $resultcountperipheral_timur)/10;
        setcookie('banyakgangguantimur' ,$banyakgangguan_timur_per);

        //===============================================================================================================//
        //==============================================REDUDANT========================================================//
        
        //tdss1
        $sqltdss1 = "SELECT sum(int_errortime) as sumtdss1 FROM redudant_barat WHERE peralatan='Server 1' and Month(down_time)=Month('$bulan') and Year(down_time)= Year('$bulan')"; 
        $querytdss1 = mysqli_query($db, $sqltdss1);
        $tdss1 = mysqli_fetch_array($querytdss1);
        $tdss1 = ($tdss1['sumtdss1'] *4);

        //tdhis1
        $sqltdhis1 = "SELECT sum(int_errortime) as sumtdhis1 FROM redudant_barat WHERE peralatan='Historical 1' and Month(down_time)=Month('$bulan') and Year(down_time)= Year('$bulan')";
        $querytdhis1 = mysqli_query($db, $sqltdhis1);
        $tdhis1 = mysqli_fetch_array($querytdhis1);
        $tdhis1 = ($tdhis1['sumtdhis1'] *4);
        
        //avms1
        $avms1 = (1- (($tdss1 + $tdhis1)/(2 * $THIM)));
        $avms1 = $avms1 * 100;
        
        //tdss2
        $sqltdss2 = "SELECT sum(int_errortime) as sumtdss2 FROM redudant_barat WHERE peralatan='Server 2' and Month(down_time)=Month('$bulan') and Year(down_time)= Year('$bulan')"; 
        $querytdss2 = mysqli_query($db, $sqltdss2);
        $tdss2 = mysqli_fetch_array($querytdss2); 
        $tdss2 = ($tdss2['sumtdss2'] *4);
        
        //tdhis2
        $sqltdhis2 = "SELECT sum(int_errortime) as sumtdhis2 FROM redudant_barat WHERE peralatan='Historical 2' and Month(down_time)=Month('$bulan') and Year(down_time)= Year('$bulan')";
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
        setcookie("avredudant_barat",$avredudant_barat);
        
        
        
        //===============================================================================================================//
        //==============================================STAND ALONE======================================================//
        //tdol
        $sqltdol =  "SELECT sum(int_errortime) as sumtdol FROM standalone_barat WHERE peralatan='Offline DB' and Month(down_time)=Month('$bulan') and Year(down_time)= Year('$bulan')"; 
        $querytdol = mysqli_query($db, $sqltdol);
        $tdol = mysqli_fetch_array($querytdol);
        $tdol = ($tdol['sumtdol'] *4);
        
        //tdwsm1
        $sqltdwsm1 =  "SELECT sum(int_errortime) as sumtdwsm1 FROM standalone_barat WHERE peralatan='WorkStation Metro 1' and Month(down_time)=Month('$bulan') and Year(down_time)= Year('$bulan')";
        $querytdwsm1 = mysqli_query($db, $sqltdwsm1);
        $tdwsm1 = mysqli_fetch_array($querytdwsm1);
        $tdwsm1 = ($tdwsm1['sumtdwsm1'] *1.5);
        
        //tdwsm2
        $sqltdwsm2 = "SELECT sum(int_errortime) as sumtdwsm2 FROM standalone_barat WHERE peralatan='WorkStation Metro 2' and Month(down_time)=Month('$bulan') and Year(down_time)= Year('$bulan')";
        $querytdwsm2 = mysqli_query($db, $sqltdwsm2);
        $tdwsm2 = mysqli_fetch_array($querytdwsm2);
        $tdwsm2 = ($tdwsm2['sumtdwsm2'] *1.5);
        
        //tdwsm3
        $sqltdwsm3 = "SELECT sum(int_errortime) as sumtdwsm3 FROM standalone_barat WHERE peralatan='WorkStation Metro 3' and Month(down_time)=Month('$bulan') and Year(down_time)= Year('$bulan')";
        $querytdwsm3 = mysqli_query($db, $sqltdwsm3);
        $tdwsm3 = mysqli_fetch_array($querytdwsm3);
        $tdwsm3 = ($tdwsm3['sumtdwsm3'] *1.5);
        
        //tdwsb1
        $sqltdwsb1 = "SELECT sum(int_errortime) as sumtdwsb1 FROM standalone_barat WHERE peralatan='WorkStation Barat 1' and Month(down_time)=Month('$bulan') and Year(down_time)= Year('$bulan')";
        $querytdwsb1 = mysqli_query($db, $sqltdwsb1);
        $tdwsb1 = mysqli_fetch_array($querytdwsb1);
        $tdwsb1 = ($tdwsb1['sumtdwsb1'] *1.5);
        
        //tdwsb2
        $sqltdwsb2 = "SELECT sum(int_errortime) as sumtdwsb2 FROM standalone_barat WHERE peralatan='WorkStation Barat 2' and Month(down_time)=Month('$bulan') and Year(down_time)= Year('$bulan')";
        $querytdwsb2 = mysqli_query($db, $sqltdwsb2);
        $tdwsb2 = mysqli_fetch_array($querytdwsb2);
        $tdwsb2 = ($tdwsb2['sumtdwsb2'] *1.5);
        
        //tdwsb3
        $sqltdwsb3 = "SELECT sum(int_errortime) as sumtdwsb3 FROM standalone_barat WHERE peralatan='WorkStation Barat 3' and Month(down_time)=Month('$bulan') and Year(down_time)= Year('$bulan')";
        $querytdwsb3 = mysqli_query($db, $sqltdwsb3);
        $tdwsb3 = mysqli_fetch_array($querytdwsb3);
        $tdwsb3 = ($tdwsb3['sumtdwsb3'] *1.5);
        
        //tdeng1
        $sqltdeng1 = "SELECT sum(int_errortime) as sumtdeng1 FROM standalone_barat WHERE peralatan='Engineering 1' and Month(down_time)=Month('$bulan') and Year(down_time)= Year('$bulan')";
        $querytdeng1 = mysqli_query($db, $sqltdeng1);
        $tdeng1 = mysqli_fetch_array($querytdeng1);
        $tdeng1 = ($tdeng1['sumtdeng1'] *1.5);
        
        //tdeng2
        $sqltdeng2 = "SELECT sum(int_errortime) as sumtdeng2 FROM standalone_barat WHERE peralatan='Engineering 2' and Month(down_time)=Month('$bulan') and Year(down_time)= Year('$bulan')";
        $querytdeng2 = mysqli_query($db, $sqltdeng2);
        $tdeng2 = mysqli_fetch_array($querytdeng2);
        $tdeng2 = ($tdeng2['sumtdeng2'] *1.5);

        //av stand alone
        $avsa = (1 - (($tdol + $tdwsm1 + $tdwsm2 + $tdwsm3 + $tdwsb1 + $tdwsb2 + $tdwsb3 +$tdeng1 + $tdeng2)/ (9* $THIM)));
        $avsa = $avsa *100;
        $avsa_barat = $avsa;
        setcookie('avsa_barat',$avsa_barat);
        
        //===============================================================================================================//
        //==============================================PERIPHERAL======================================================//
        
        //tdswm1
        $sqltdswm1 = "SELECT sum(int_errortime) as sumtdswm1 FROM peripheral_barat WHERE peralatan='Switch Metro 1' and Month(down_time)=Month('$bulan') and Year(down_time)= Year('$bulan')";
        $querytdswm1 = mysqli_query($db, $sqltdswm1);
        $tdswm1 = mysqli_fetch_array($querytdswm1);
        $tdswm1 = ($tdswm1['sumtdswm1'] *2);
        
        //tdswm2
        $sqltdswm2 = "SELECT sum(int_errortime) as sumtdswm2 FROM peripheral_barat WHERE peralatan='Switch Metro 2' and Month(down_time)=Month('$bulan') and Year(down_time)= Year('$bulan')";
        $querytdswm2 = mysqli_query($db, $sqltdswm2);
        $tdswm2 = mysqli_fetch_array($querytdswm2);
        $tdswm2 = ($tdswm2['sumtdswm2'] *2);
        
        //tdtsm1
        $sqltdtsm1 = "SELECT sum(int_errortime) as sumtdtsm1 FROM peripheral_barat WHERE peralatan='Terminal Server Metro 1' and Month(down_time)=Month('$bulan') and Year(down_time)= Year('$bulan')";
        $querytdtsm1 = mysqli_query($db, $sqltdtsm1);
        $tdtsm1 = mysqli_fetch_array($querytdtsm1);
        $tdtsm1 = ($tdtsm1['sumtdtsm1'] *0.5);
        
        //tdtsm2
        $sqltdtsm2 = "SELECT sum(int_errortime) as sumtdtsm2 FROM peripheral_barat WHERE peralatan='Terminal Server Metro 2' and Month(down_time)=Month('$bulan') and Year(down_time)= Year('$bulan')";
        $querytdtsm2 = mysqli_query($db, $sqltdtsm2);
        $tdtsm2 = mysqli_fetch_array($querytdtsm2);
        $tdtsm2 = ($tdtsm2['sumtdtsm2'] *0.5);
        
        //tdswb1
        $sqltdswb1 = "SELECT sum(int_errortime) as sumtdswb1 FROM peripheral_barat WHERE peralatan='Switch Barat 1' and Month(down_time)=Month('$bulan') and Year(down_time)= Year('$bulan')";
        $querytdswb1 = mysqli_query($db, $sqltdswb1);
        $tdswb1 = mysqli_fetch_array($querytdswb1);
        $tdswb1 = ($tdswb1 ['sumtdswb1'] *2);
        
        //tdswb2
        $sqltdswb2 = "SELECT sum(int_errortime) as sumtdswb2 FROM peripheral_barat WHERE peralatan='Switch Barat 2' and Month(down_time)=Month('$bulan') and Year(down_time)= Year('$bulan')";
        $querytdswb2 = mysqli_query($db, $sqltdswb2);
        $tdswb2 = mysqli_fetch_array($querytdswb2);
        $tdswb2 = ($tdswb2 ['sumtdswb2'] *2);
        
        //tdtsb1
        $sqltdtsb1 = "SELECT sum(int_errortime) as sumtdtsb1 FROM peripheral_barat WHERE peralatan='Terminal Server Barat 1' and Month(down_time)=Month('$bulan') and Year(down_time)= Year('$bulan')";
        $querytdtsb1 = mysqli_query($db, $sqltdtsb1);
        $tdtsb1 = mysqli_fetch_array($querytdtsb1);
        $tdtsb1 = ($tdtsb1['sumtdtsb1'] *0.5);
        
        //tdtsb2
        $sqltdtsb2 = "SELECT sum(int_errortime) as sumtdtsb2 FROM peripheral_barat WHERE peralatan='Terminal Server Barat 2' and Month(down_time)=Month('$bulan') and Year(down_time)= Year('$bulan')";
        $querytdtsb2 = mysqli_query($db, $sqltdtsb2);
        $tdtsb2 = mysqli_fetch_array($querytdtsb2);
        $tdtsb2 = ($tdtsb2['sumtdtsb2'] *0.5);
        
        //tdgps
        $sqltdgps = "SELECT sum(int_errortime) as sumtdgps FROM peripheral_barat WHERE peralatan='Global Positioning Sys' and Month(down_time)=Month('$bulan') and Year(down_time)= Year('$bulan')";
        $querytdgps =  mysqli_query($db, $sqltdgps);
        $tdgps = mysqli_fetch_array($querytdgps);
        $tdgps = ($tdgps['sumtdgps'] *0.5);
        
        //av PERIPHERAL
        $avper = (1 -(($tdswm1 + $tdswm2 + $tdtsm1 + $tdtsm2 + $tdswb1 + $tdswb2 + $tdtsb1 + $tdtsb2 + $tdgps)/(9 *$THIM)) );
        $avper = ($avper * 100);
        $avper_barat = $avper;
        setcookie('avper_barat', $avper_barat);  

        //===============================================================================================================//
        //==============================================AV MASTER STATION BARAT======================================================//
        $avms_barat = (($avredudant + $avsa + $avper)/3);
        setcookie('avms_barat', $avms_barat);


        //TIMUR
        //===============================================================================================================//
        //==============================================REDUDANT========================================================//
        
        //tdss1
        $sqltdss1 = "SELECT sum(int_errortime) as sumtdss1 FROM redudant_timur WHERE peralatan='Server 1' and Month(down_time)=Month('$bulan') and Year(down_time)= Year('$bulan')"; 
        $querytdss1 = mysqli_query($db, $sqltdss1);
        $tdss1 = mysqli_fetch_array($querytdss1);
        $tdss1 = ($tdss1['sumtdss1'] *4);
        
        //tdhis1
        $sqltdhis1 = "SELECT sum(int_errortime) as sumtdhis1 FROM redudant_timur WHERE peralatan='Historical 1' and Month(down_time)=Month('$bulan') and Year(down_time)= Year('$bulan')";
        $querytdhis1 = mysqli_query($db, $sqltdhis1);
        $tdhis1 = mysqli_fetch_array($querytdhis1);
        $tdhis1 = ($tdhis1['sumtdhis1'] *4);
        
        //avms1
        $avms1 = (1- (($tdss1 + $tdhis1)/(2 * $THIM)));
        $avms1 = $avms1 * 100;
        
        //tdss2
        $sqltdss2 = "SELECT sum(int_errortime) as sumtdss2 FROM redudant_timur WHERE peralatan='Server 2' and Month(down_time)=Month('$bulan') and Year(down_time)= Year('$bulan')"; 
        $querytdss2 = mysqli_query($db, $sqltdss2);
        $tdss2 = mysqli_fetch_array($querytdss2); 
        $tdss2 = ($tdss2['sumtdss2'] *4);
        
        //tdhis2
        $sqltdhis2 = "SELECT sum(int_errortime) as sumtdhis2 FROM redudant_timur WHERE peralatan='Historical 2' and Month(down_time)=Month('$bulan') and Year(down_time)= Year('$bulan')";
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
        setcookie('avredudant_timur', $avredudant_timur);
        
        //===============================================================================================================//
        //==============================================STAND ALONE======================================================//
        //tdol
        $sqltdol =  "SELECT sum(int_errortime) as sumtdol FROM standalone_timur WHERE peralatan='Offline DB' and Month(down_time)=Month('$bulan') and Year(down_time)= Year('$bulan')"; 
        $querytdol = mysqli_query($db, $sqltdol);
        $tdol = mysqli_fetch_array($querytdol);
        $tdol = ($tdol['sumtdol'] *4);
        
        //tdwst1
        $sqltdwst1 =  "SELECT sum(int_errortime) as sumtdwst1 FROM standalone_timur WHERE peralatan='WorkStation Timur 1' and Month(down_time)=Month('$bulan') and Year(down_time)= Year('$bulan')";
        $querytdwst1 = mysqli_query($db, $sqltdwst1);
        $tdwst1 = mysqli_fetch_array($querytdwst1);
        $tdwst1 = ($tdwst1['sumtdwst1'] *1.5);
        
        //tdwst2
        $sqltdwst2 =  "SELECT sum(int_errortime) as sumtdwst2 FROM standalone_timur WHERE peralatan='WorkStation Timur 2' and Month(down_time)=Month('$bulan') and Year(down_time)= Year('$bulan')";
        $querytdwst2 = mysqli_query($db, $sqltdwst2);
        $tdwst2 = mysqli_fetch_array($querytdwst2);
        $tdwst2 = ($tdwst2['sumtdwst2'] *1.5);
        
        //tdwst3
        $sqltdwst3 =  "SELECT sum(int_errortime) as sumtdwst3 FROM standalone_timur WHERE peralatan='WorkStation Timur 3' and Month(down_time)=Month('$bulan') and Year(down_time)= Year('$bulan')";
        $querytdwst3 = mysqli_query($db, $sqltdwst3);
        $tdwst3 = mysqli_fetch_array($querytdwst3);
        $tdwst3 = ($tdwst3['sumtdwst3'] *1.5);
        
        //tdeng1
        $sqltdeng1 = "SELECT sum(int_errortime) as sumtdeng1 FROM standalone_timur WHERE peralatan='Engineering 1' and Month(down_time)=Month('$bulan') and Year(down_time)= Year('$bulan')";
        $querytdeng1 = mysqli_query($db, $sqltdeng1);
        $tdeng1 = mysqli_fetch_array($querytdeng1);
        $tdeng1 = ($tdeng1['sumtdeng1'] *1.5);
        
        //av stand alone
        $avsa = (1 - (($tdol + $tdwst1 + $tdwst2 + $tdwst3 + $tdeng1)/(5 *$THIM)));
        $avsa = $avsa *100;
        $avsa_timur = $avsa;
        setcookie('avsa_timur', $avsa_timur);
        
        //===============================================================================================================//
        //==============================================PERIPHERAL======================================================//
        
        //tdswt1
        $sqltdswt1 = "SELECT sum(int_errortime) as sumtdswt1 FROM peripheral_timur WHERE peralatan='Switch Timur 1' and Month(down_time)=Month('$bulan') and Year(down_time)= Year('$bulan')";
        $querytdswt1 = mysqli_query($db, $sqltdswt1);
        $tdswt1 = mysqli_fetch_array($querytdswt1);
        $tdswt1 = ($tdswt1['sumtdswt1'] *2);
        
        //tdswt2
        $sqltdswt2 = "SELECT sum(int_errortime) as sumtdswt2 FROM peripheral_timur WHERE peralatan='Switch Timur 2' and Month(down_time)=Month('$bulan') and Year(down_time)= Year('$bulan')";
        $querytdswt2 = mysqli_query($db, $sqltdswt2);
        $tdswt2 = mysqli_fetch_array($querytdswt2);
        $tdswt2 = ($tdswt2['sumtdswt2'] *2);
        
        //tdtst1
        $sqltdtst1 = "SELECT sum(int_errortime) as sumtdtst1 FROM peripheral_timur WHERE peralatan='Terminal Server Timur 1' and Month(down_time)=Month('$bulan') and Year(down_time)= Year('$bulan')";
        $querytdtst1 = mysqli_query($db, $sqltdtst1);
        $tdtst1 =  mysqli_fetch_array($querytdtst1);
        $tdtst1 = ($tdtst1['sumtdtst1'] *0.5);
        
        //tdtst2
        $sqltdtst2 = "SELECT sum(int_errortime) as sumtdtst2 FROM peripheral_timur WHERE peralatan='Terminal Server Timur 2' and Month(down_time)=Month('$bulan') and Year(down_time)= Year('$bulan')";
        $querytdtst2 = mysqli_query($db, $sqltdtst2);
        $tdtst2 =  mysqli_fetch_array($querytdtst2);
        $tdtst2 = ($tdtst2['sumtdtst2'] *0.5);
        
        //tdgps
        $sqltdgps = "SELECT sum(int_errortime) as sumtdgps FROM peripheral_timur WHERE peralatan='Global Positioning Sys' and Month(down_time)=Month('$bulan') and Year(down_time)= Year('$bulan')";
        $querytdgps = mysqli_query($db, $sqltdgps);
        $tdgps = mysqli_fetch_array($querytdgps);
        $tdgps = ($tdgps['sumtdgps'] *0.5);
        
        //av peripheral
        $avper = (1 - (($tdswt1 + $tdwst2 +$tdtst1 + $tdtst2 +$tdgps)/(5 *$THIM)));
        $avper = $avper *100;
        setcookie('avper_timur', $avper);
        
        //av master station timur
        $avms_timur = (($avredudant + $avsa + $avper)/3);
        setcookie('avms_timur', $avms_timur);

        //echo $_COOKIE['avms_barat'];
        //echo $_COOKIE['avms_timur'];

        $averagepeforma = ($avms_barat + $avms_timur)/2;
        setcookie('averagepeforma', $averagepeforma);
        header("location:index3.php");
    }

    
    
?>