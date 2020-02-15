<?php

include("connection.php");

if(isset($_POST['simpan'])){

    $nama = $_POST['nama'];
    $tanggal_awal = date('Y-m-d', strtotime($_POST['tanggal_awal']));
    $tanggal_akhir = date('Y-m-d', strtotime($_POST['tanggal_akhir']));
    $keterangan = $_POST['keterangan'];

    $date1= date_create (date('Y-m-d', strtotime($_POST['tanggal_awal'])));
    $date2= date_create (date('Y-m-d', strtotime($_POST['tanggal_akhir'])));
    $diff= date_diff($date1,$date2);
    $errortime = $diff->format('%a'); 

    $sql = "INSERT INTO rekap_nodin (nama, tanggal_awal, tanggal_akhir, errortime, keterangan) VALUE ('$nama', '$tanggal_awal', '$tanggal_akhir', '$errortime', '$keterangan')";
    $query = mysqli_query($db, $sql);

    header("location:listnodin.php");

    }
else if(isset($_POST['simpanedit'])){

        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $tanggal_awal = date('Y-m-d', strtotime($_POST['tanggal_awal']));
        $tanggal_akhir = date('Y-m-d', strtotime($_POST['tanggal_akhir']));
        $keterangan = $_POST['keterangan'];
    
        $date1= date_create (date('Y-m-d', strtotime($_POST['tanggal_awal'])));
        $date2= date_create (date('Y-m-d', strtotime($_POST['tanggal_akhir'])));
        $diff= date_diff($date1,$date2);
        $errortime = $diff->format('%a'); 
    
        $sqlupdate = "UPDATE rekap_nodin SET nama='$nama', tanggal_awal='$tanggal_awal', tanggal_akhir='$tanggal_akhir', errortime='$errortime', keterangan='$keterangan' WHERE id=$id";
        $queryupdate = mysqli_query($db, $sqlupdate);

        header("location:listnodin.php");
}

?>
