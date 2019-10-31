<?php
$koneksi = mysqli_connect("localhost", "root", "", "perpustakaan");

if (mysqli_connect_errno()) {
  // code...
  echo mysqli_connect_error();
}

if (isset($_POST["action"])) {
  // code...
  $kode_buku = $_POST["kode_buku"];
  $judul = $_POST["judul"];
  $penulis = $_POST["penulis"];
  $kategori = $_POST["kategori"];
  $stok = $_POST["stok"];


  if ($_POST["action"] == "insert") {
    // tampung data file
    if (isset($_FILES["image"])) {
      // tampung informasi data file
      $path = pathinfo($_FILES["image"]["name"]);
      $ekstensi = $path["extension"];
      // kita rangkai untuk penamaan file yang akan disimpan
      $filename = $kode_buku."-".rand(1,1000).".".$ekstensi;
      // rand digunakan untuk mengambil nilai random antara 1-1000
      move_uploaded_file($_FILES["image"]["tmp_name"], "image_buku/".$filename);

    }
    $sql = "insert into buku values ('$kode_buku', '$judul', '$penulis', '$kategori', '$stok', '$filename')";
  }elseif ($_POST["action"] == "update") {
    // ambil data dari database
    $sql = "select * from buku where kode_buku='$kode_buku'";
    // eksekusi query
    $result = mysqli_query($koneksi, $sql);
    // tampung hasil query kedalam array
    $hasil = mysqli_fetch_array($result);
    if (isset($_FILES['image'])) {
      if (file_exists("image_buku/".$hasil["image"])) {
      unlink("image_buku/".$hasil["image"]);
      // menghapus file gambar
      }
      $path = pathinfo($_FILES["image"]["name"]);
      $ekstensi = $path["extension"];
      // kita rangkai untuk penamaan file yang akan disimpan
      $filename = $kode_buku."-".rand(1,1000).".".$ekstensi;
      // rand digunakan untuk mengambil nilai random antara 1-1000
      move_uploaded_file($_FILES["image"]["tmp_name"], "image_buku/".$filename);
      $sql = "update buku set judul = '$judul', penulis='$penulis', kategori = '$kategori',stok='$stok', image='$filename' where kode_buku= '$kode_buku'";

    } else {
      $sql = "update buku set judul = '$judul', penulis='$penulis', kategori = '$kategori',stok='$stok' where kode_buku= '$kode_buku'";
    }


  }
  mysqli_query($koneksi, $sql); //eksekusi sintak sql
  header("location: template.php?page=buku");
}

if (isset($_GET["hapus"])) {
  // tampung dulu variabel GET yang berisi nilai NISN
  $kode_buku = $_GET["kode_buku"];
  $sql = "select * from buku where kode_buku='$kode_buku'";
  $result = mysqli_query($koneksi, $sql);
  $hasil = mysqli_fetch_array($result);
  if (file_exists("image_buku/".$hasil["image"])) {
    // mengecek keberadaan file
    unlink("image_buku/".$hasil["image"]);
    // menghapus file
  }
    $sql = "delete from buku where kode_buku ='$kode_buku'";
    mysqli_query($koneksi, $sql);
    header("location:template.php?page=buku");

}


 ?>
