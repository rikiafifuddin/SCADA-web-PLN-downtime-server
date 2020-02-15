<?php

include("connection.php");

if( isset($_GET['id']) ){

    $icon = $_GET['id'];
    $sql = "DELETE FROM redudant_barat WHERE id=$icon";
    $query = mysqli_query($db, $sql);

    header("location:listbarat.php");
    
} else {
    die("Fail Access Database");
}

?>