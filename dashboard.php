<?php

$conn = mysqli_connect("localhost", "root", "", "db_oso");

$result = mysqli_query($conn, "SELECT COUNT(nama) AS nama FROM tp_shuttle");
$row = mysqli_fetch_assoc($result);
$count = $row['nama'];

if ($count >= 0 || $count <= 25) {
    $emot = "💪";
} elseif ($count >= 26 || $count <= 50) {
    $emot = "🏃‍♂️";
}
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
    <link rel="stylesheet" href="assets/dashboard.css">
    <style>
        a {
            color: white;
            text-decoration: none;
        }

        a:hover {
            color: white;
        }

        .card:hover {
            transform: scale(1.1);
            transition: 2s;
        }
        section {
            margin: 0;
        }
    </style>
    <title>Dashboard</title>
</head>

<body>
    <img src="image/header.png" width="100%" class="bg" />
    <form action="oso/index.php">
        <section>
            <div class="logo">
                <img src="image/Logo Toko.png" />
            </div>
            <div class="d-flex w-100 justify-content-evenly gap-lg-5 card-isi">


                <a href="oso/index.php">
                    <div class="card" style="width: 18rem; height: 300px;">
                        <img src="image/1.png" class="card-img-top" alt="..." />
                    </div>
                </a>

                <div class="card" style="width: 18rem">
                    <img src="image/2.png" class="card-img-top" alt="..." />
                </div>

                <div class="card" style="width: 18rem">
                    <img src="image/3.png" class="card-img-top" alt="..." />
                </div>
            </div>
        </section>
    </form>

    <footer></footer>
</body>

</html>