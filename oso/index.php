<?php
include 'koneksi.php';

$result = mysqli_query($conn, 'SELECT SUM(total_shuttle) AS total_s FROM tp_shuttle');
$row = mysqli_fetch_assoc($result);
$totals = number_format($row['total_s'], 0, ".", ".");

$result1 = mysqli_query($conn, 'SELECT SUM(total_kampus) AS total_k FROM tp_kampus');
$row1 = mysqli_fetch_assoc($result1);
$totalk = number_format($row1['total_k'], 0, ".", ".");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="assets/js/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css" />
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/308efbf9d4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/style.css">
    <title>OSO</title>
    <style>
        section {
            margin: 0;
        }
    </style>

</head>

<body>
    <img src="image/header.png" width="100%" class="bg" />
    <section>
        <div class="logo">
            <img style="background-color: white;" src="image/Logo Toko.png" />
        </div>
        <form action="shuttle.php">
            <div class="d-flex w-100 card-isi justify-content-evenly gap-lg-5">
                <div class="card d-flex flex-column" style="width: 18rem">
                    <div class="d-flex w-100 justify-content-between flex-fill">
                        <img src="image/1.jpg" class="card-img-top" alt="" />
                    </div>
                    <div class="card-body d-flex w-100 justify-content-between align-content-center mt-lg-3 flex-fill">
                        <div class="">
                            <b>Perhari <?= "Rp. " . $totals . ",-" ?></b>
                        </div>
                        <div>
                            <button class="btn btn-success" type="submit">Table</button>
                        </div>
                    </div>
                </div>
        </form>

        <form action="kampus.php">
            <div class="card d-flex flex-column" style="width: 18rem">
                <div class="d-flex w-100 justify-content-between flex-fill">
                    <img src="image/2.jpg" style="background-color: #F5E931;" class="card-img-top" alt="..." />
                </div>
                <div class="card-body d-flex w-100 justify-content-between align-content-center mt-lg-3 flex-fill">
                    <div class="">
                        <b>Perhari <?= "Rp. " . $totalk . ",-" ?></b>
                    </div>
                    <div>
                        <button class="btn btn-success" type="submit">Table</button>
                    </div>
                </div>
            </div>
            </div>
        </form>

        <hr style="display: block;">
        
</body>
<!-- script Bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/308efbf9d4.js" crossorigin="anonymous"></script>

</html>