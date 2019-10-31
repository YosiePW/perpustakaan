<?php
$koneksi = mysqli_connect("localhost", "root", "", "perpustakaan");
$sql = "select * from buku";
$result = mysqli_query($koneksi, $sql);
 ?>
 <div class="row">
   <?php foreach ($result as $hasil): ?>
     <div class="card col-sm-4">
       <div class="card-body">
         <img src="image_buku/<?php echo $hasil["image"];?>" width="100%" height="350" class="img">

       </div>
       <div class="card-footer">
        <h5 class="text-center"><?php echo $hasil["judul"]; ?></h5>
        <h6 class="text-center"><?php echo $hasil["penulis"]; ?></h6>
        <h6 class="text-center">Stok: <?php echo $hasil["stok"]; ?></h6>
        <a href="db_pinjam.php?pinjam=true&kode_buku=<?php echo $hasil["kode_buku"];?>">
          <button type="button" class="btn btn-block btn-sm btn-success">PINJAM</button>
        </a>
       </div>
     </div>
   <?php endforeach; ?>
 </div>
