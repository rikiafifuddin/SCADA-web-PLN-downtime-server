<?php

include("connection.php");

if( isset($_GET['id']) ){

    $icon = $_GET['id'];
    $sql = "DELETE FROM rekap_icon WHERE id=$icon";
    $query = mysqli_query($db, $sql);

    header("location:listicon.php");
    
} else {
    die("Fail Access Database");
}

?>