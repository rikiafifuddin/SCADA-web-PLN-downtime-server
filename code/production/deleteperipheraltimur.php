<?php

include("connection.php");

if( isset($_GET['id']) ){

    $icon = $_GET['id'];
    $sql = "DELETE FROM peripheral_timur WHERE id=$icon";
    $query = mysqli_query($db, $sql);

    header("location:listtimur.php");
    
} else {
    die("Fail Access Database");
}

?>