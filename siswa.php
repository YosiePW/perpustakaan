
      <script type="text/javascript">
      function Tambah() {
        document.getElementById("action").value = "insert";
        document.getElementById("nisn").value = "";
        document.getElementById("nama").value = "";
        document.getElementById("kelas").value = "";
        document.getElementById("kontak").value = "";
        document.getElementById("username").value = "";
        document.getElementById("password").value = "";

      }

      function Edit(index){
        document.getElementById("action").value = "update";
        var table = document.getElementById("table_siswa");
        var nisn = table.rows[index].cells[0].innerHTML;
        var nama = table.rows[index].cells[1].innerHTML;
        var kelas = table.rows[index].cells[2].innerHTML;
        var kontak = table.rows[index].cells[3].innerHTML;
        var username = table.rows[index].cells[4].innerHTML;
        var password = table.rows[index].cells[5].innerHTML;


        document.getElementById("nisn").value = nisn;
        document.getElementById("nama").value = nama;
        document.getElementById("kelas").value = kelas;
        document.getElementById("kontak").value = kontak;
        document.getElementById("username").value = username;
        document.getElementById("password").value = password;

      }

      </script>
      <div class="card col-sm-12">
        <div class="card-header bg-primary text-white">
          <h4>Daftar Siswa</h4>
        </div>

        <div class="card-body">
          <?php
           $koneksi = mysqli_connect("localhost", "root", "", "perpustakaan");
           if (mysqli_connect_errno()) {
             echo mysqli_connect_error();
           }

           $sql = "select * from siswa";
           $result = mysqli_query($koneksi, $sql);
           $count = mysqli_num_rows($result);

           ?>

           <?php if ($count == 0): ?>
             <div class="alert alert-info">
               Data is empty
             </div>

           <?php else: ?>

             <table class="table" id="table_siswa">
               <thead>
                 <tr>
                   <td>NISN</td>
                   <td>Nama</td>
                   <td>Kelas</td>
                   <td>Kontak</td>
                   <td>Username</td>
                   <td>Password</td>
                   <td>Image</td>
                 </tr>
               </thead>

               <tbody>
                 <?php foreach ($result as $hasil ) : ?>
                   <tr>
                     <td><?php echo $hasil["nisn"] ?></td>
                     <td><?php echo $hasil["nama"] ?></td>
                     <td><?php echo $hasil["kelas"] ?></td>
                     <td><?php echo $hasil["kontak"] ?></td>
                     <td><?php echo $hasil["username"] ?></td>
                     <td><?php echo $hasil["password"] ?></td>
                     <td>
                       <img src="<?php echo "image_siswa/".$hasil["image"]; ?>" id="<?php echo $hasil["nisn"]; ?>" class="img" width="100">

                     </td>
                     <td>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target = "#modal" onclick="Edit(this.parentElement.parentElement.rowIndex)">Edit</button>
                      <a href="database_siswa.php?hapus=siswa&nisn=<?php echo $hasil["nisn"];?>"
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
          <form enctype="multipart/form-data" action="database_siswa.php" method="post">
            <div class="modal-header">
  <h4>Form Siswa</h4>
  <span class="close" data-dismiss="modal">&times;</span>
</div>
<div class="modal-body">
  <input type="hidden" name="action" id="action"/>
  <!-- niki damel status edit/insert -->
  NISN
  <input type="text" name="nisn" id="nisn" class="form-control">
  Nama
  <input type="text" name="nama" id="nama" class="form-control">
  Kelas
  <input type="text" name="kelas" id="kelas" class="form-control">
  Kontak
  <input type="text" name="kontak" id="kontak" class="form-control">
  Username
  <input type="text" name="username" id="username" class="form-control">
  Password
  <input type="pass" name="password" id="password" class="form-control">
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
