<?php
$conn = mysqli_connect("localhost", "root", "", "db_oso");
$result = mysqli_query($conn, 'SELECT SUM(total_kampus) AS value_sum FROM tp_kampus');
$row = mysqli_fetch_assoc($result);
$sum = number_format($row['value_sum'], 0, ".", ".");
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="style_oso.css">
  <style>
    body {
      display: flex;
      flex-direction: column;
      justify-content: center;
      width: 100%;
    }

    nav {
      display: none;
      visibility: hidden;
    }

    aside {
      position: fixed;
      top: -5px;
      z-index: 999;
      height: 105vh;
      width: 300px;
      background-color: #CE8AE2;
    }

    .box {
      position: relative;
      top: -40px;
      margin: 0 20px 0 320px;
    }

    a {
      color: fff;
      padding: 5px 10px;
      border-radius: 10px 0px 0px 10px;
    }

    a:hover {
      margin-left: 30px;
      color: #CE8AE2;
      background-color: white;
      transition: 1.2s;
    }

    @media (max-width: 600px) {

      .box {
        margin: 0;
      }

      aside {
        display: none;
        visibility: hidden;
      }

      nav {
        display: block;
        visibility: visible;
      }

      img {
        margin-bottom: 30px;
      }
    }

    @media (max-width: 1000px) {

      .box {
        top: 0;
        margin: 0;
      }

      aside {
        display: none;
        visibility: hidden;
      }

      nav {
        display: block;
        visibility: visible;
      }

      img {
        margin-bottom: 30px;
      }
    }
  </style>
  <title>OSO</title>
</head>

<body>

<nav class="navbar sticky-top d-flex justify-content-between p-2" style="background-color: #AD61C8; box-sizing: border-box; display: none; visibility: none;">
    <div>
      
    </div>
    <div>
      <button style="background-color: #C8A2C8;" class="btn mr-4 text-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
        <i class="fa-solid fa-bars"></i>
      </button>
    </div>

    <div style="background-color: #CE8AE2;" class="offcanvas offcanvas-start text-light" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">
          <h5>Navigasi</h5></i>
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body d-flex justify-content-between flex-column">
        <div class="p-2">
          <ul type="none" class="text-light">
            <li>
              <h4> <a href="index.php">Dashboard </a></h4>
            </li>
            <li>
              <h4> <a href="shuttle.php">Shuttle</a></h4>
            </li>
            <li>
              <h4> <a href="kampus.php">Kampus</a></h4>
            </li>
            <li>
              <h4> <a href="total.php">Total</a></h4>
            </li>
          </ul>
        </div>
      </div>
    </div>
    </div>
  </nav>

  <aside>
    <div style="margin: 30px 0px; display: flex; justify-content: center;">
      <h1 style="color: white;">Navigasi</h1>
    </div>
    <div>
      <ul type="none" class="text-light">
        <li>
          <h4> <a href="index.php">Dashboard </a></h4>
        </li>
        <li>
          <h4> <a href="shuttle.php">Shuttle</a></h4>
        </li>
        <li>
          <h4> <a href="kampus.php">Kampus</a></h4>
        </li>
        <li>
          <h4> <a href="total.php">Total</a></h4>
        </li>
      </ul>
    </div>
  </aside>

  <div class="box">
    <form method="post" action="">
      <div class="card">
        <div class="card-header bg-success text-center text-capitalize">
          <h1 style="color: white">KAMPUS</h1>
        </div>
        <div class="card-body">
          <div style="display:flex; justify-content: space-between; align-items: center;" class="mb-3">
            <div>
              <button title="Tambah Pelanggan 💾" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add">
                <i class="fa-solid fa-user-plus"></i>
              </button>
              <button title="Reset Data Penjualan 🔄" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#truncate">
                <i class="fa-solid fa-arrows-rotate"></i>
              </button>
            </div>
            <div style="margin-top: 10px;">
              <h5><?php echo "Total Rp. " . $sum; ?></h5>
            </div>
          </div>
          <div style="overflow-x:auto;">
            <table class="table table-striped table-light table-responsive-md text-center align-middle">
              <thead class="thead-dark">
                <th style="display: none;">No</th>
                <th>Nama</th>
                <th>Bayar</th>
                <th>Taso</th>
                <th>Gorengan</th>
                <th>Total</th>
                <th>Action</th>
              </thead>
              <?php
              global $conn;
              $no = 1;
              $ts = 0;
              $mhs_stikom = mysqli_query($conn, "SELECT * FROM tp_kampus ");
              while ($data = mysqli_fetch_array($mhs_stikom)) :
              ?>
                <tbody>
                  <td style="display: none;"><?= $no++ ?></td>
                  <td class="text-center">
                    <?= $data["nama"] ?>
                  </td>
                  <td style="justify-content: center; align-items: center;">
                    <input type="checkbox" class="form-check-input" id="flexSwitchCheckDefault">
                  </td>
                  <td class="text-center">
                    <?= "Rp " . number_format($data["taso"], 0, ".", ".");
                    echo " <hr> " . $data["taso"] / 2000 . "pcs"; ?>
                  </td>
                  <td class="text-center">
                    <?= "Rp " . number_format($data["gorengan"], 0, ".", ".");
                    echo " <hr> " . $data["gorengan"] / 1500 . "pcs"; ?>
                  </td>
                  <td class="text-center">
                    <?= "Rp " . number_format($data["total_kampus"], 0, ".", ".") ?>
                  </td>
                  <td class="aksi">
                    <button title="Edit Pelanggan 📝" type="button" class="btn mb-3 btn-warning" data-bs-toggle="modal" data-bs-target="#ubah<?= $no ?>">
                      <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    <button title="Hapus Pelanggan 🗑️" type="button" class="btn mb-3 btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?= $no ?>">
                      <i class="fa-solid fa-trash"></i>
                    </button>
                  </td>
                </tbody>

                <!-- modal ubah -->
                <div class="modal fade" id="ubah<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header bg-warning">
                        <h2 class="modal-title text-white" id="staticBackdropLabel">Ubah Data <?= $data['nama'] ?></h2>
                      </div>
                      <form method="POST" action="config.php">
                        <div class="modal-body">
                          <input type="hidden" name="id" id="id" value="<?= $data['idk'] ?>">
                          <label for="nama" class="mb-1">Ubah Nama</label>
                          <input required oninvalid="this.setCustomValidity('Wajib masukkan nama')" oninput="this.setCustomValidity('')" class="form-control mb-2" type="text" name="nku" id="nku<?= $no ?>" value="<?= $data['nama'] ?>" />
                          <label for="taso" class="mb-1">Tahu Bakso</label>
                          <input required oninvalid="this.setCustomValidity('Penambahan tahu bakso / 0 ')" oninput="this.setCustomValidity('')" class="form-control mb-2" type="number" name="tku" id="tku<?= $no ?>" min="0" step="2000" value="<?= $data['taso'] ?>" />
                          <label for="gorengan" class="mb-1">Gorangan lain</label>
                          <input required oninvalid="this.setCustomValidity('Penambahan gorengan lain / 0')" oninput="this.setCustomValidity('')" class="form-control mb-2" type="number" name="gku" id="gku<?= $no ?>" min="0" step="1500" value="<?= $data['gorengan'] ?>" />
                          <label for="total">Total</label>
                          <input readonly type="number" class="form-control mb-2" name="toku" id="toku<?= $no ?>" value="<?= $data['total'] ?>">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i></button>
                          <button type="submit" class="btn btn-success" name="ubah_mhs" id="ubah_mhs"><i class="fa-solid fa-floppy-disk"></i></button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
          </div>
          <script type="text/javascript">
            $("#tku<?= $no ?>").keyup(function() {
              var a = parseFloat($("#tku<?= $no ?>").val());
              var b = parseFloat($("#gku<?= $no ?>").val());
              var c = a + b;
              $("#toku<?= $no ?>").val(c);
            });

            $("#gku<?= $no ?>").keyup(function() {
              var a = parseFloat($("#tku<?= $no ?>").val());
              var b = parseFloat($("#gku<?= $no ?>").val());
              var c = a + b;
              $("#toku<?= $no ?>").val(c);
            });
          </script>


          <!-- Modal hapus-->
          <div class="modal fade" id="hapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header bg-danger text-center">
                  <h2 class="modal-title text-white" id="staticBackdropLabel">Hapus Data <?= $data['nama'] ?></h2>
                </div>
                <div class="modal-body">
                  <form method="post" action="config.php">
                    <input type="hidden" name="id" id="id" value="<?= $data['idk'] ?>">
                    <h4>Yah Ko dihapus sih data <?= $data['nama'] ?> 😢 ?</h4>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-success" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i></button>
                  <button type="submit" class="btn btn-danger" name='hapus_mhs' id='hapus_mhs'><i class="fa-solid fa-trash"></i></button>
                </div>
    </form>
  </div>
  </div>
  </div>
  </div>

<?php
              endwhile; ?>



</table>
</div>
</div>
</div>
</form>

<!-- Modal Tambah-->
<div class="modal fade" id="add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h2 class="modal-title text-white" id="staticBackdropLabel">Data Pelanggan</h2>
      </div>
      <div class="modal-body">
        <form method="post" action="config.php">
          <label for="nama" class="mb-1">Nama Pelanggan</label>
          <input required oninvalid="this.setCustomValidity('Wajib masukkan nama')" oninput="this.setCustomValidity('')" class="form-control mb-2" type="text" name="nk" id="nk" placeholder="Masukkan Nama Pelanggan" />
          <label for="taso" class="mb-1">Tahu Bakso</label>
          <input required oninvalid="this.setCustomValidity('Input pembelian tahu bakso / 0 ')" oninput="this.setCustomValidity('')" class="form-control mb-2" type="number" name="tk" id="tk" min="0" step="2000" placeholder="Harga Tahu 2.000/pcs" />
          <label for="gorengan" class="mb-1">Gorangan lain</label>
          <input required oninvalid="this.setCustomValidity('Input pembelian gorengan lain / 0')" oninput="this.setCustomValidity('')" class="form-control mb-2" type="number" name="gk" id="gk" min="0" step="1500" placeholder="Harga Gorangan 1.500/pcs" />
          <label for="total">Total</label>
          <input readonly type="number" class="form-control mb-2" name="tok" id="tok">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i></button>
        <button type="submit" class="btn btn-success" name="tambah_mhs" id="tambah_mhs"><i class="fa-solid fa-floppy-disk"></i></button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>

<!-- Modal Reset-->
<div class="modal fade" id="truncate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-danger text-center">
        <h2 class="modal-title text-white" id="staticBackdropLabel">Bersihkan Table !!</h2>
      </div>
      <div class="modal-body">
        <form method="post" action="config.php">
          <h4>Yakin ingin Reset table 🗑️ ?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i></button>
        <button type="submit" class="btn btn-danger" name="clear_mhs" id="clear_mhs"><i class="fa-solid fa-trash"></i></button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>

<!-- script Bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/308efbf9d4.js" crossorigin="anonymous"></script>
<!-- script btn increment and decrement -->
<script type="text/javascript">
  $("#tk").keyup(function() {
    var a = parseFloat($("#tk").val());
    var b = parseFloat($("#gk").val());
    var c = a + b;
    $("#tok").val(c);
  });

  $("#gk").keyup(function() {
    var a = parseFloat($("#tk").val());
    var b = parseFloat($("#gk").val());
    var c = a + b;
    $("#tok").val(c);
  });
</script>
</body>

</html>