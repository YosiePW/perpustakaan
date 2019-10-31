<?php
session_start();
if (isset($_GET["pinjam"])) {
  $koneksi = mysqli_connect("localhost", "root", "", "perpustakaan");
  $kode_buku = $_GET["kode_buku"];
  $sql = "select * from buku where kode_buku = '$kode_buku'";
  $result = mysqli_query($koneksi, $sql);
  $hasil = mysqli_fetch_array($result);
  // masukkan ke keranjang
  array_push($_SESSION["session_pinjam"], $hasil);
  // $_SESSION["session_pinjam"] adalah keranjangnya
  header("location:template_siswa.php?page=list_buku");

}
if (isset($_GET["checkout"])) {
  $koneksi = mysqli_connect("localhost", "root", "", "perpustakaan");
  // siapkan data untuk tabel pinjam
  $id_pinjam = rand(1,1000)."-".rand(1,1000);
  $nisn = $_SESSION["session_siswa"]["nisn"];
  $tgl_pinjam = date("Y-m-d");
  $sql = "insert into pinjam values('$id_pinjam', '$nisn', '$tgl_pinjam')";
  mysqli_query($koneksi, $sql);

  // insert ke tabel detail_pinjam
  foreach ($_SESSION["session_pinjam"] as $hasil) {
    $sql2 = "insert into detail_pinjam values ('$id_pinjam', '".$hasil["kode_buku"]."')";
    mysqli_query($koneksi, $sql2);
  }
  $_SESSION["session_pinjam"] = array();
  header("location:template_siswa.php?page=list_buku");
}
 ?>
