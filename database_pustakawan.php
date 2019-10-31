<?php
$koneksi = mysqli_connect("localhost", "root", "", "perpustakaan");

if (mysqli_connect_errno()) {
  // code...
  echo mysqli_connect_error();
}

if (isset($_POST["action"])) {
  // code...
  $nip = $_POST["nip"];
  $kontak = $_POST["kontak"];
  $nama = $_POST["nama"];
  $username = $_POST["username"];
  $password = $_POST["password"];

  if ($_POST["action"] == "insert") {
    if (isset($_FILES["image"])) {
      $path = pathinfo($_FILES["image"]["name"]);
      $ekstensi = $path["extension"];
      $filename = $nisn."-".rand(1,1000).".".$ekstensi;
      move_uploaded_file($_FILES["image"]["tmp_name"], "image_pustakawan/".$filename);
    }
    $sql = "insert into pustakawan values ('$nip', '$kontak', '$nama','$username','$password','$filename')";
  }elseif ($_POST["action"] == "update") {
    $sql = "select * from siswa where nip ='$nip'";
    $result = mysqli_query($koneksi, $sql);
    $hasil = mysqli_fetch_array($result);

    // jika aksinya update
    if (!empty($_FILES['image']['name'])) {
      if (file_exists("image_pustakawan/".$hasil["image"])) {
      unlink("image_pustakawan/".$hasil["image"]);
      // menghapus file gambar
      }
      $path = pathinfo($_FILES["image"]["name"]);
      $ekstensi = $path["extension"];
      // kita rangkai untuk penamaan file yang akan disimpan
      $filename = $nip."-".rand(1,1000).".".$ekstensi;
      // rand digunakan untuk mengambil nilai random antara 1-1000
      move_uploaded_file($_FILES["image"]["tmp_name"], "image_pustakawan/".$filename);
      $sql = "update pustakawan set kontak = '$kontak', nama='$nama', username='$username',password='$password', image='$filename' where nip= '$nip'";

    } else {
      $sql = "update pustakawan set kontak = '$kontak', nama='$nama', username='$username',password='$password' where nip= '$nip'";
    }
  }
  mysqli_query($koneksi, $sql); //eksekusi sintak sql
  header("location:template.php?page=pustakawan");
}

if (isset($_GET["hapus"])) {
  // tampung dulu variabel GET yang berisi nilai NISN
  $nip = $_GET["nip"];
    $sql = "delete from pustakawan where nip ='$nip'";
    $result = mysqli_query($koneksi, $sql);
    $hasil = mysqli_fetch_array($result);
    if (file_exists("image_pustakawan/".$hasil["image"])) {
      // mengecek keberadaan file
      unlink("image_pustakawan/".$hasil["image"]);
      // menghapus file
    }
    $sql = "delete from pustakawan where nip = '$nip'";

    mysqli_query($koneksi, $sql);
    header("location:template.php?page=pustakawan");

}


 ?>
