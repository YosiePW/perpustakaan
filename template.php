<?php session_start(); ?>
<?php if (isset($_SESSION["session_pustakawan"])): ?>


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
    <nav class="navbar navbar-expand-md bg-danger navbar-dark sticky-top">
      <a href="#">
        <!-- <img src="logo1.png" width="150"alt=""> -->
        <h3>TELKOM's LIBRARY</h3>
      </a>
      <button type="button" name="navbar-toggler" data-toggle="collapse" data-target="menu">
       <span class="navbar navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav">
          <li class="nav-item"> <a href="template.php?page=siswa" class="nav-link">Siswa</a></li>
          <li class="nav-item"> <a href="template.php?page=pustakawan" class="nav-link">Pustakawan</a></li>
          <li class="nav-item"> <a href="template.php?page=buku" class="nav-link">Buku</a></li>
          <li class="nav-item"> <a href="proses_login.php?logout=true" class="nav-link">logout</a></li>

        </ul>
        <h4>Hello, <?php echo $_SESSION["session_pustakawan"]["nama"]; ?></h4>
      </div>
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

<?php else: ?>
  <?php echo "Anda Belum Login!" ; ?>
  <br>
  <a href="login.php">Loginnya tuh disini!!</a>
<?php endif; ?>
