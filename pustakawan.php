
      <script type="text/javascript">
        function Tambah(){

          document.getElementById("action").value = "insert";
          document.getElementById("nip").value = "";
          document.getElementById("kontak").value = "";
          document.getElementById("nama").value = "";
          document.getElementById("username").value = "";
          document.getElementById("password").value = "";
        }

        function Edit(index){
          document.getElementById("action").value = "update";
          var table = document.getElementById("table_pustakawan");
          var nip = table.rows[index].cells[0].innerHTML;
          var kontak = table.rows[index].cells[1].innerHTML;
          var nama = table.rows[index].cells[2].innerHTML;
          var username = table.rows[index].cells[3].innerHTML;
          var password = table.rows[index].cells[4].innerHTML;

          document.getElementById("nip").value = nip;
          document.getElementById("kontak").value = kontak;
          document.getElementById("nama").value = nama;
          document.getElementById("username").value = username;
          document.getElementById("password").value = password;

        }

        </script>
      <div class="card col-sm-12">
        <div class="card-header bg-primary text-white">
          <h4>Pustakawan </h4>
        </div>

        <div class="card-body">
          <?php
          $koneksi = mysqli_connect("localhost", "root", "", "perpustakaan");
          if (mysqli_connect_errno()) {
            echo mysqli_connect_error();
          }

          $sql = "select * from pustakawan";
          $result = mysqli_query($koneksi, $sql);
          $count = mysqli_num_rows($result);

           ?>

           <?php if ($count == 0):  ?>
             <div class="alert alert-info">
               Data is empty
             </div>

           <?php else: ?>
             <table class="table" id="table_pustakawan">
               <thead>
                 <tr>
                   <td>nip</td>
                   <td>kontak</td>
                   <td>nama</td>
                   <td>Username</td>
                   <td>Password</td>
                   <td>Image</td>
                 </tr>
               </thead>

               <tbody>
                 <?php foreach ($result as $hasil ) : ?>
                   <tr>
                     <td><?php echo $hasil["nip"] ?></td>
                     <td><?php echo $hasil["kontak"] ?></td>
                     <td><?php echo $hasil["nama"] ?></td>
                     <td><?php echo $hasil["username"] ?></td>
                     <td><?php echo $hasil["password"] ?></td>
                     <td>
                       <img src="<?php echo "image_pustakawan/".$hasil["image"]; ?>" id="<?php echo $hasil["nip"]; ?>" class="img" width="100">

                     </td>
                     <td>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target = "#modal" onclick="Edit(this.parentElement.parentElement.rowIndex)">Edit</button>
                      <a href="database_pustakawan.php?hapus=pustakawan&nip=<?php echo $hasil["nip"];?>"
                        onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                        <button type="button" class="btn btn-danger" >Hapus</button>

                      </a>

                     </td>
                   </tr>
                 <?php endforeach; ?>
               </tbody>
             </table>
           <?php endif; ?>
        </div>

        <div class="card-footer">
          <button type="button" class="btn btn-success" data-toggle = "modal" data-target= "#modal" onclick="Tambah()">Tambah Data</button>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modal">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form enctype="multipart/form-data" action="database_pustakawan.php" method="post">
            <div class="modal-header">
  <h4>Form Pustakawan</h4>
  <span class="close" data-dismiss="modal">&times;</span>
</div>
<div class="modal-body">
  <input type="hidden" name="action" id="action"/>
  <!-- niki damel status edit/insert -->
  Nip
  <input type="text" name="nip" id="nip" class="form-control">
  Kontak
  <input type="text" name="kontak" id="kontak" class="form-control">
  Nama
  <input type="text" name="nama" id="nama" class="form-control">
  Username
  <input type="text" name="username" id="username" class="form-control">
  Password
  <input type="text" name="password" id="password" class="form-control">
  Image
  <input type="file" name="image" id="image" class="form-control">

</div>
<div class="modal-footer">
  <button type="submit" class="btn btn-success">Simpan</button>
</div>
          </form>
        </div>
      </div>
            </div>
