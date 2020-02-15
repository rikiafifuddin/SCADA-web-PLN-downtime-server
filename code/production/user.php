<?php
@session_start();
include("connection.php");
if (isset($_POST['submit'])){

  $username = $_POST['username'];
  $password = $_POST['password'];
  $nama = $_POST['nama'];
  $notelfon = $_POST['notelfon'];

  $sql = "INSERT INTO member(username, password, nama, notelfon) VALUES ('$username', '$password', '$nama', '$notelfon')";
  $query = mysqli_query($db, $sql);

	header("location:login.php");
}
else if(isset($_POST['submitlogin'])){

  $username = $_POST['username'];
  $password = $_POST['password'];
  if ($username =="" or $password ==""){
    echo "Username or Password is Empety";
  }
  else{
    $sql ="SELECT * FROM member WHERE username='$username' and password='$password'";
    $query = mysqli_query($db, $sql);
    $data = mysqli_fetch_array($query);
    $cek = $query->num_rows;
    if($cek == 1){
      $_SESSION['login'] = TRUE;
      $_SESSION['username'] = $data['username'];
      $_SESSION['nama'] = $data['nama'];
      $_SESSION['notelfon'] =$data['notelfon'];
      header("location:index.php");
    }
    else{
      header("location:login.php");
    }

  }
}
?>