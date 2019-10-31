<?php
$koneksi = mysqli_connect("localhost", "root", "", "perpustakaan");

if (mysqli_connect_errno()) {

  echo mysqli_connect_error();
  // code...
}

if (isset($_POST["action"])) {

$nisn = $_POST["nisn"];
$nama = $_POST["nama"];
$kelas = $_POST["kelas"];
$kontak = $_POST["kontak"];
$username = $_POST["username"];
$password = $_POST["password"];

if ($_POST["action"] == "insert") {
  if (isset($_FILES["image"])) {
    $path = pathinfo($_FILES["image"]["name"]);
    $ekstensi = $path["extension"];
    $filename = $nisn."-".rand(1,1000).".".$ekstensi;
    move_uploaded_file($_FILES["image"]["tmp_name"], "image_siswa/".$filename);
  }
  $sql = "insert into siswa values ('$nisn', '$nama', '$kelas', '$kontak', '$username', '$password', '$filename')";
}elseif ($_POST["action"] == "update") {
  $sql = "select * from siswa where nisn ='$nisn'";
  $result = mysqli_query($koneksi, $sql);
  $hasil = mysqli_fetch_array($result);

  if (isset($_FILES['image'])) {
    if (file_exists("image_siswa/".$hasil["image"])) {
    unlink("image_siswa/".$hasil["image"]);
    // menghapus file gambar
    }
    $path = pathinfo($_FILES["image"]["name"]);
    $ekstensi = $path["extension"];
    // kita rangkai untuk penamaan file yang akan disimpan
    $filename = $kode_buku."-".rand(1,1000).".".$ekstensi;
    // rand digunakan untuk mengambil nilai random antara 1-1000
    move_uploaded_file($_FILES["image"]["tmp_name"], "image_siswa/".$filename);
    $sql = "update siswa set nama = '$nama', kelas='$kelas', kontak = '$kontak',username='$username',password='$password', image='$filename' where nisn= '$nisn'";

  } else {
    $sql = "update siswa set nama = '$nama', kelas='$kelas', kontak = '$kontak',username='$username',password='$password' where nisn= '$nisn'";
  }

}
mysqli_query($koneksi, $sql); //eksekusi sintak sql
header("location: template.php?page=siswa");
}
if (isset($_GET["hapus"])) {
  $nisn = $_GET["nisn"];
  $sql = "select * from siswa where nisn='$nisn'";
  $result = mysqli_query($koneksi, $sql);
  $hasil = mysqli_fetch_array($result);
  if (file_exists("image_siswa/".$hasil["image"])) {
    // mengecek keberadaan file
    unlink("image_siswa/".$hasil["image"]);
    // menghapus file
  }
  $sql = "delete from siswa where nisn = '$nisn'";
      mysqli_query($koneksi, $sql);
    header("location:template.php?page=siswa");

}


 ?>
