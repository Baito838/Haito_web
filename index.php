<?php 
 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="assets/js/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"/>
    <link rel="stylesheet" href="assets/login.css">
    <style>
      card {
        height: max-content;
      }
    </style>
    <title>Login</title>
  </head> 
  <body style="width: 100%">

    <div class="card">
      <form action="" method="POST">
        <div class="card-body">
          <div>
            <img src="assets/haito_logo.png" alt="">
          </div>
          <div class="login">
            <h1 class="text-center">🔰 Admin </h1>
            <label class="mb-2" for="user"><b>Username</b></label>
            <input class="form-control mb-2" type="text" id="username" name="username" placeholder="Masukkan Username">
            <label class="mb-2" for="password"><b>Password</b></label>
            <input class="form-control mb-2" type="password" id="password" name="password" placeholder="Masukkan Password">
            <div style="width: 100%; display: flex; justify-content: flex-end; gap: 5px;">
              <form action="config.php" method="post">
                <button title="Registrasi Admin" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add">
                  <i class="fa-solid fa-user-plus"></i>
                </button>
              </form>
              <button title="Silahkan Masuk Kaka 🥰" type="submit" class="btn btn-success" id="submit" name="submit">Login</button>
            </div>
          </div>
        </div>
      </form>
    </div>


    <!-- modal register -->
    <div class="modal fade" id="add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header" style="background-color: #C8A2C8;">
              <h2 class="modal-title text-white" id="staticBackdropLabel">Register 🐱‍💻</h2>
            </div>
            <div class="modal-body">
              <form method="post" action="config.php">
              <label class="form-label" for="">Username</label>
              <input class="form-control" type="text" id="user" name="user" maxlength="10" required oninvalid="this.setCustomValidity('Wajib Diisi 😠')" oninput="this.setCustomValidity('')" placeholder="Maksimal 10 karakter ">
              <label class="form-label" for="">Password</label>
              <input class="form-control" type="password" id="pass" name="pass" maxlength="10" required oninvalid="this.setCustomValidity('ini Juga 😠')" oninput="this.setCustomValidity('')" placeholder="Masukkan Password">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i></button>
              <button type="submit" class="btn btn-success" name="register" id="register">Daftar</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    <!-- script -->
    <!-- script -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
      integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
      integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
      crossorigin="anonymous"
    ></script>
    <script src="https://kit.fontawesome.com/308efbf9d4.js" crossorigin="anonymous"></script>
  </body>
</html>
