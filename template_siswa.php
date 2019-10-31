<?php session_start(); ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boostrap Navbar</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top">
      <a href="#">
        <!-- <img src="logo1.png" width="150"alt=""> -->
        <h3>TELKOM's LIBRARY</h3>
      </a>

      <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav">

          <li class="nav-item"> <a href="template_siswa.php?page=list_buku" class="nav-link">Buku</a></li>
          <li class="nav-item"> <a href="proses_login_siswa.php?logout=true" class="nav-link">logout</a></li>

        </ul>
      </div>
      <a href="template_siswa.php?page=list_pinjam">
        <b class="text-white">Pinjam: <?php echo count($_SESSION["session_pinjam"]); ?></b>
      </a>
    </nav>
    <div class="container my-2">
      <?php if (isset($_GET["page"])): ?>
        <?php if ((@include $_GET["page"].".php") === true): ?>
          <?php include $_GET["page"].".php"; ?>
        <?php endif; ?>
      <?php endif; ?>
    </div>
  </body>
</html>
