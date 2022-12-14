<?php
include 'koneksi.php';
$result = mysqli_query($conn, 'SELECT SUM(total) AS value_sum FROM totaloso');
$row = mysqli_fetch_assoc($result);
$sum = number_format($row['value_sum'], 0, ".", ".");

$result3 = mysqli_query($conn, 'SELECT SUM(total_shuttle) AS total_s FROM tp_shuttle');
$row3 = mysqli_fetch_assoc($result3);
$totals = $row3['total_s'];

$result4 = mysqli_query($conn, 'SELECT SUM(total_kampus) AS total_k FROM tp_kampus');
$row4 = mysqli_fetch_assoc($result4);
$totalk = $row4['total_k'];

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
            display: block;
            text-decoration: none;
            color: white;
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
            a {
                border-radius: 5px;
                width: 100px;
            }

            a:hover {
                display: inline;
                margin: 15px;
            }

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
            a {
                border-radius: 5px;
                width: 100px;
            }

            a:hover {
                display: inline;
                margin: 15px;
            }

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
                <h1 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">
                    <h1 style="color: white;">Navigasi</h1>
                </h1>
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
                <div class="card-header d-flex justify-content-between align-content-center bg-success">
                    <h2 style="color: white;">TOTAL PENDAPATAN</h2>
                    <div class="d-flex align-content-center" style="gap: 5px;">
                        <div style="margin-top: 10px;">
                            <h5 style="background-color:  #CE8AE2; border-radius: 5px; padding: 5px 10px;"><?php echo "Total Rp. " . $sum; ?></h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div style="display:flex; justify-content: space-between; align-items: center;" class="mb-3">
                        <button title="Total Pendapatan Sehari" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <i class="fa-solid fa-money-bill-trend-up" style="color: white"></i>
                        </button>
                        <button title="Kosongkang Tabel Setelah 30 hari" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#truncate">
                            <i class="fa-solid fa-ban"></i>
                        </button>
                    </div>
                    <div style="overflow-x:auto;">
                        <table class="table table-striped table-light table-responsive-md text-center align-middle">
                            <thead>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Shuttle</th>
                                <th>Kampus</th>
                                <th>Seller</th>
                                <th>Lain_lain</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </thead>
                            <?php
                            global $conn;
                            $i = 1;
                            $totso = mysqli_query($conn, "SELECT * FROM totaloso ");
                            while ($toso = mysqli_fetch_array($totso)) :
                            ?>
                                <tbody>
                                    <td><?= $i++ ?></td>
                                    <td><?= $toso["tanggal"] ?></td>
                                    <td><?= "Rp. " . number_format($toso["shuttle"], 0, ".", ".") ?></td>
                                    <td><?= "Rp. " . number_format($toso["kampus"], 0, ".", ".") ?></td>
                                    <td><?= "Rp. " . number_format($toso["seller"], 0, ".", ".") ?></td>
                                    <td><?= "Rp. " . number_format($toso["lain"], 0, ".", ".") ?></td>
                                    <td><?= "Rp. " . number_format($toso["total"], 0, ".", ".") ?></td>
                                    <td>
                                        <button title="Hapus Data" type="button" class="btn mb-3 btn-danger" data-bs-toggle="modal" data-bs-target="#hapus_total<?= $i ?>">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </td>
                                </tbody>

                                <div class="modal fade" id="hapus_total<?= $i ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger text-center">
                                                <h2 class="modal-title text-white" id="staticBackdropLabel">Hapus Data</h2>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="config.php">
                                                    <input type="hidden" name="idt" id="idt" value="<?= $toso['idt'] ?>">
                                                    <h4>Yakin ingin menghapus Data ?</h4>

                                            </div>
                                            <form action="config.php" method="post">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i></button>
                                                    <button type="submit" class="btn btn-danger" name='hapus_total' id='hapus_total'><i class="fa-solid fa-trash"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </table>
                    </div>
                </div>
            </div>
        </form>

        <!-- Modal Tambah-->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color:#CE8AE2; color: white;">
                        <h5 class="modal-title" id="staticBackdropLabel">Total Pendapatan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="config.php" method="POST">
                        <div class="modal-body">
                            <div><h6 style="color: red; background-color: #FFCA2C; padding: 5px 10px; border-radius: 5px; text-align: center;">Setelah Total Harian ditambahkan otomatis total kampus, shuttle, seller dan lain-lain akan dikosongkan</h6></div>
                            <div class="row">
                                <div class="col">
                                    <label for="nama" class="mb-1">Tanggal</label>
                                    <input title="Masukkan tanggal pendapatan" required oninvalid="this.setCustomValidity('Wajib masukkan tanggal')" oninput="this.setCustomValidity('')" class="form-control mb-2" type="date" name="tgl" id="tgl" />
                                </div>
                                <div class="col">
                                    <label for="refresh" class="mb-1">Refresh</label>
                                    <input title="kembalikan ke nilai 0" required oninvalid="this.setCustomValidity('Resfresh untuk merespon total')" oninput="this.setCustomValidity('')" class="form-control mb-2" type="number" name="refresh" id="refresh" max="1" min="0" placeholder="Refresh untuk respon total"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="shuttle" class="mb-1">Shuttle</label>
                                    <input readonly class="form-control mb-2" type="number" name="shuttle" id="shuttle" value="<?= $row3['total_s'] ?>" />
                                </div>
                                <div class="col">
                                    <label for="kampus" class="mb-1">Kampus</label>
                                    <input readonly class="form-control mb-2" type="number" name="kampus" id="kampus" value="<?= $row4['total_k'] ?>" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="seller" class="mb-1">Seller</label>
                                    <input readonly class="form-control mb-2" type="number" name="seller" id="seller" value="0" />
                                </div>
                                <div class="col">
                                    <label for="lain_lain" class="mb-1">Lain-lain</label>
                                    <input readonly class="form-control mb-2" type="number" name="lain_lain" id="lain_lain" value="0" />
                                </div>
                            </div>
                            <label for="total">Total</label>
                            <input readonly type="number" class="form-control mb-2" name="total_oso" id="total_oso">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-solid fa-xmark" style="color: fff;"></i></button>
                            <button type="submit" class="btn btn-success" id="okey" name="okey"><i class="fa-solid fa-floppy-disk" style="color: fff;"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- modal Truncate -->
        <div class="modal fade" id="truncate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="config.php" method="POST">
                        <div class="modal-header" style="background-color: #CE8AE2;">
                            <h2 class="modal-title" id="staticBackdropLabel" style="color: white;">Kosongkan Table</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h4>Pastikan Data Table Mencapai 30 hari lalu Masukkan Pada PDF, Baru Lakukan Pengosongan Table</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Batal</button>
                            <button id="kosongkan" name="kosongkan" type="submit" class="btn btn-danger">Kosongkan</button>
                        </div>
                    </form>
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
            $("#shuttle").keyup(function() {
                var a = parseFloat($("#shuttle").val());
                var b = parseFloat($("#kampus").val());
                var c = parseFloat($("#seller").val());
                var d = parseFloat($("#lain_lain").val());
                var f = parseFloat($("#refresh").val());
                var e = a + b + c + d + f;
                $("#total_oso").val(e);
            });

            $("#kampus").keyup(function() {
                var a = parseFloat($("#shuttle").val());
                var b = parseFloat($("#kampus").val());
                var c = parseFloat($("#seller").val());
                var d = parseFloat($("#lain_lain").val());
                var f = parseFloat($("#refresh").val());
                var e = a + b + c + d + f;
                $("#total_oso").val(e);
            });

            $("#seller").keyup(function() {
                var a = parseFloat($("#shuttle").val());
                var b = parseFloat($("#kampus").val());
                var c = parseFloat($("#seller").val());
                var d = parseFloat($("#lain_lain").val());
                var f = parseFloat($("#refresh").val());
                var e = a + b + c + d + f;
                $("#total_oso").val(e);
            });

            $("#lain_lain").keyup(function() {
                var a = parseFloat($("#shuttle").val());
                var b = parseFloat($("#kampus").val());
                var c = parseFloat($("#seller").val());
                var d = parseFloat($("#lain_lain").val());
                var f = parseFloat($("#refresh").val());
                var e = a + b + c + d + f;
                $("#total_oso").val(e);
            });

            $("#refresh").keyup(function() {
                var a = parseFloat($("#shuttle").val());
                var b = parseFloat($("#kampus").val());
                var c = parseFloat($("#seller").val());
                var d = parseFloat($("#lain_lain").val());
                var f = parseFloat($("#refresh").val());
                var e = a + b + c + d + f;
                $("#total_oso").val(e);
            });
        </script>
</body>

</html>