<?php

include("connection.php");

if( isset($_GET['id']) ){

    $nodin = $_GET['id'];
    $sql = "DELETE FROM rekap_nodin WHERE id=$nodin";
    $query = mysqli_query($db, $sql);

    header("location:listnodin.php");
    echo $query;
    
} else {
    die("Fail Access Database");
}

?>