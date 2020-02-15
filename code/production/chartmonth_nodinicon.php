<?php
    include("connection.php");    
    if(isset($_POST['Monthpick'])){
        $hari=1;
        $bulan = $_POST['bulan'];
        while ($hari <32){
            //NODIN
            $sqlnodin = "SELECT sum(errortime) as sumnodin FROM rekap_nodin WHERE Day(tanggal_awal)=$hari and Month(tanggal_awal)=Month('$bulan') and Year(tanggal_awal) = Year('$bulan')";
            $querynodin = mysqli_query($db, $sqlnodin);
            $resultnodin = mysqli_fetch_array($querynodin);
			$nodin = $resultnodin['sumnodin'];
			if ($nodin == NULL){
				$nodin = 0;
			}
			setcookie("day".$hari, $nodin);	
			$hari = $hari+1;
		}
		
		//Banyak NODIN
		$sqlcountnodin = "SELECT count(id) as countnodin FROM rekap_nodin WHERE Month(tanggal_awal)=Month('$bulan') and Year(tanggal_awal)=Year('$bulan')";
		$querycountnodin = mysqli_query($db, $sqlcountnodin);
		$resultcounticon = mysqli_fetch_array($querycountnodin);
		$countnodin = $resultcounticon['countnodin'];
		setcookie("countnodin", $countnodin);
		
		//Rentang Waktu
		$sqlsumnodin = "SELECT sum(errortime) as sum_nodin FROM rekap_nodin WHERE Month(tanggal_awal)=Month('$bulan') and Year(tanggal_awal)=Year('$bulan')";
		$querysumnodin = mysqli_query($db, $sqlsumnodin);
		$resultsumnodin = mysqli_fetch_array($querysumnodin);
		$sumnodin = $resultsumnodin['sum_nodin'];
		if ($sumnodin == NULL){
			$sumnodin=0;
		}
		setcookie("sumnodin", $sumnodin);

		header("location:index2.php");
    }
	
	else if(isset($_POST['Monthpickicon'])){
        $hari=1;
        $bulan = $_POST['bulan'];
        while ($hari <32){
			//ICON
			$sqlicon = "SELECT sum(int_errortime) as sumicon FROM rekap_icon WHERE Day(down_time)=$hari and Month(down_time)=Month('$bulan') and Year(down_time) = Year('$bulan')";
            $queryicon = mysqli_query($db, $sqlicon);
            $resulticon = mysqli_fetch_array($queryicon);
			$icon = $resulticon['sumicon'];
			if ($icon == NULL){
				$icon = 0;
			}
			setcookie("hari".$hari, $icon);	
			$hari = $hari+1;
		}

		//Banyak ICON
		$sqlcounticon = "SELECT count(id) as counticon FROM rekap_icon WHERE Month(down_time)=Month('$bulan') and Year(down_time)=Year('$bulan')";
		$querycounticon = mysqli_query($db, $sqlcounticon);
		$resultcounticon = mysqli_fetch_array($querycounticon);
		$counticon = $resultcounticon['counticon'];
		setcookie("counticon", $counticon); 

		//Rentang Waktu
		$sqlsumicon = "SELECT sum(int_errortime) as sum_icon FROM rekap_icon WHERE Month(down_time)=Month('$bulan') and Year(down_time)=Year('$bulan')";
		$querysumicon = mysqli_query($db, $sqlsumicon);
		$resultsumicon = mysqli_fetch_array($querysumicon);
		$sumicon = $resultsumicon['sum_icon'];
		if ($sumicon == NULL){
			$sumicon = 0;
		}
		setcookie("sum_icon", $sumicon);

		header("location:index4.php");
	}

		
				    
?>