<?php
session_start();

if (isset($_POST["username"])) {
  $username =$_POST["username"];
  $password =$_POST["password"];
  $koneksi = mysqli_connect("localhost", "root", "", "perpustakaan");
  $sql = "select * from pustakawan where username='$username' and password='$password'";
  $result = mysqli_query($koneksi, $sql);
  $jumlah = mysqli_num_rows($result);
  if ($jumlah == 0) {
    // login gagal
    header("location : login.php");
  } else {
    // login berasil
    // membuat variabel session
    $_SESSION["session_pustakawan"]=mysqli_fetch_array($result);
    header("location:template.php");
  }

}
if (isset($_GET["logout"])) {
  // hapus session
  session_destroy();
  header("location:login.php");
}
 ?>
