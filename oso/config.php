<?php
// Crud Shuttle

$conn = mysqli_connect("localhost", "root", "", "db_oso");

if (isset($_POST['tambah_kvp'])) {
    global $conn;
    $nama = htmlspecialchars($_POST['ns']);
    $taso = htmlspecialchars($_POST['ts']);
    $gorengan = htmlspecialchars($_POST['gs']);
    $total = htmlspecialchars($_POST['tos']);

    $simpan = mysqli_query($conn, "INSERT INTO tp_shuttle(nama,taso,gorengan,total_shuttle,clear) VALUES ('$nama','$taso','$gorengan', '$total', '1')");

    if ($_POST = 0) {
        echo "<script>
                alert('Data Tidak Boleh Kosong !');
                document.location='shuttle.php';
              </script>";
    } elseif ($simpan) {
        echo "<script>
                alert('Simpan Berhasil Disimpan 💾');
                document.location='shuttle.php';
            </script>";
    }
}

if (isset($_POST['ubah_kvp'])) {
    global $conn;

    $nama_1 = htmlspecialchars($_POST['nsu']);
    $taso_1 = htmlspecialchars($_POST['tsu']);
    $gorengan_1 = htmlspecialchars($_POST['gsu']);
    $total_1 = htmlspecialchars($_POST['tosu']);

    $ubah = mysqli_query($conn, "UPDATE tp_shuttle SET nama = '$nama_1', taso = '$taso_1',gorengan = '$gorengan_1',total_shuttle = '$total_1' WHERE ids = '$_POST[id]'");

    if ($_POST = 0) {
        echo "<script>
                alert('Data Tidak Boleh Kosong !');
                document.location='shuttle.php';
              </script>";
    } elseif ($ubah) {
        echo "<script>
                alert('Data Berhasil DiUbah 📝');
                document.location='shuttle.php';
            </script>";
    }
}


if (isset($_POST['hapus_kvp'])) {
    global $conn;

    $hapus = mysqli_query($conn, "DELETE FROM tp_shuttle WHERE ids = '$_POST[id]'");

    if ($_POST = 0) {
        echo "<script>
                alert('Data Tidak Boleh Kosong !');
                document.location='shuttle.php';
              </script>";
    } elseif ($hapus) {
        echo "<script>
                alert('Data Berhasil DiHapus ❌');
                document.location='shuttle.php';
            </script>";
    }
}

if (isset($_POST['reset'])) {
    global $conn;

    $clear_s = mysqli_query($conn, "UPDATE tp_shuttle SET taso = 0, gorengan = 0, total_shuttle = 0 WHERE clear = 1");

    if ($clear_s) {
        echo "<script>
                alert('Data Table Berhasil DiReset 🔄');
                document.location='shuttle.php';
              </script>";
    } else {
        echo "<script>
                alert('Data Table Tidak Berhasil DiReset 🔄 !');
                document.location='shuttle.php';
            </script>";
    }
}


// CRUD Kampus

if (isset($_POST['tambah_mhs'])) {
    global $conn;
    $nk = htmlspecialchars($_POST['nk']);
    $tk = htmlspecialchars($_POST['tk']);
    $gk = htmlspecialchars($_POST['gk']);
    $tok = htmlspecialchars($_POST['tok']);

    $simpan_mhs = mysqli_query($conn, "INSERT INTO tp_kampus(nama,taso,gorengan,total_kampus,clear) VALUES ('$nk','$tk','$gk', '$tok', '1')");

    if ($_POST = 0) {
        echo "<script>
                alert('Data Tidak Boleh Kosong !');
                document.location='kampus.php';
              </script>";
    } elseif ($simpan_mhs) {
        echo "<script>
                alert('Simpan Berhasil Disimpan 💾');
                document.location='kampus.php';
            </script>";
    }
}

if (isset($_POST['ubah_mhs'])) {
    global $conn;

    $nk_1 = htmlspecialchars($_POST['nku']);
    $tk_1 = htmlspecialchars($_POST['tku']);
    $gk_1 = htmlspecialchars($_POST['gku']);
    $tok_1 = htmlspecialchars($_POST['toku']);

    $ubah = mysqli_query($conn, "UPDATE tp_kampus SET nama = '$nk_1', taso = '$tk_1',gorengan = '$gk_1',total_kampus = '$tok_1' WHERE idk = '$_POST[id]'");

    if ($_POST = 0) {
        echo "<script>
                alert('Data Tidak Boleh Kosong !');
                document.location='kampus.php';
              </script>";
    } elseif ($ubah) {
        echo "<script>
                alert('Data Berhasil DiUbah 📝');
                document.location='kampus.php';
            </script>";
    }
}


if (isset($_POST['hapus_mhs'])) {
    global $conn;

    $hapus = mysqli_query($conn, "DELETE FROM tp_kampus WHERE idk = '$_POST[id]'");

    if ($_POST = 0) {
        echo "<script>
                alert('Data Tidak Boleh Kosong !');
                document.location='kampus.php';
              </script>";
    } elseif ($hapus) {
        echo "<script>
                alert('Data Berhasil DiHapus ❌');
                document.location='kampus.php';
            </script>";
    }
}

if (isset($_POST['clear_mhs'])) {
    global $conn;

    $clear_s = mysqli_query($conn, "UPDATE tp_kampus SET taso = 0, gorengan = 0, total_kampus = 0 WHERE clear = 1");

    if ($clear_s) {
        echo "<script>
                alert('Data Table Berhasil DiHapus');
                document.location='kampus.php';
              </script>";
    } else {
        echo "<script>
                alert('Data Table Tidak Berhasil DiHapus !');
                document.location='kampus.php';
            </script>";
    }
}