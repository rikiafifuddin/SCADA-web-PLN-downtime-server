<?php

include("connection.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $garduinduk = $_POST['gardu_induk'];
    $downdatetime = date('Y-m-d H:i:s', strtotime($_POST['downdatetime']));
    $updatetime = date('Y-m-d H:i:s', strtotime($_POST['updatetime']));
    $keterangan = $_POST['keterangan'];
	
	$date1 = new DateTime(date('Y-m-d H:i:s', strtotime($_POST['downdatetime'])));
	$date2 = new DateTime(date('Y-m-d H:i:s', strtotime($_POST['updatetime'])));
	
	$alldiff = $date1->diff($date2);
	$difft = $alldiff->format("%a:%H:%i");

   $interrortime = $alldiff->h;
   $interrortime = $interrortime + ($alldiff->days*24);

	
    $sql = "INSERT INTO rekap_icon (gardu_induk, down_time, up_time, errortime, int_errortime, keterangan) VALUES ('$garduinduk', '$downdatetime', '$updatetime', '$difft', '$interrortime', '$keterangan')";
    $query = mysqli_query($db, $sql);

   header("location:index.php");

}
else if(isset($_POST['simpanedit'])){

        $id = $_POST['id'];
        $garduinduk = $_POST['gardu_induk'];
        $downdatetime = date('Y-m-d H:i:s', strtotime($_POST['downdatetime']));
        $updatetime = date('Y-m-d H:i:s', strtotime($_POST['updatetime']));
        $keterangan = $_POST['keterangan'];
        
        $date1 = new DateTime(date('Y-m-d H:i:s', strtotime($_POST['downdatetime'])));
        $date2 = new DateTime(date('Y-m-d H:i:s', strtotime($_POST['updatetime'])));
        
        $alldiff = $date1->diff($date2);
        $difft = $alldiff->format("%a:%H:%i");

        $interrortime = $alldiff->h;
        $interrortime = $interrortime + ($alldiff->days*24);
        
    
        $sqlupdate = "UPDATE rekap_icon SET gardu_induk='$garduinduk', down_time='$downdatetime', up_time='$updatetime', errortime='$difft', int_errortime='$interrortime', keterangan='$keterangan' WHERE id=$id";
        $queryupdate = mysqli_query($db, $sqlupdate);

        header("location:listicon.php");


}


?>
