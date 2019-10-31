<div class="card col-sm-12">
  <div class="card-header">
    <h3>Daftar Pinjam</h3>
  </div>
  <div class="card-body">
    <table class="table">
      <thead>
        <tr>
          <th>Kode Buku</th>
          <th>Judul</th>
          <th>Penulis</th>
          <th>Image</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($_SESSION["session_pinjam"] as $hasil): ?>
          <tr>
            <td><?php echo $hasil["kode_buku"]; ?></td>
            <td><?php echo $hasil["judul"]; ?></td>
            <td><?php echo $hasil["penulis"]; ?></td>
            <td>
            <img src="image_buku/<?php echo $hasil["image"]; ?>" width="100">
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <a href="db_pinjam.php?checkout=true">
<button type="button" class="btn btn-success">
CHECKOUT
</button>
    </a>
  </div>
</div>
