<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </head>
  <body>
    <div class="container my-5">
      <div class="row justify-content-center align-items-center">
        <div class="card col-sm-6">
          <form class="" action="proses_login_siswa.php" method="post">
            <div class="card-header">
              <h3>Login Form</h3>
            </div>
            <div class="card-body">
              <input type="text" name="username" class="form-control" placeholder="username" required>
              <input type="password" name="password" class="form-control" placeholder="password" required>
              <button type="submit" class="btn btn-success btn-block" name="button">LOGIN</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
