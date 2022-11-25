<?php 

$conn = mysqli_connect("localhost","root","","db_oso");



if(isset($_POST['register'])){
    $user = mysqli_real_escape_string($conn, $_POST['user']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);



    $result_username = mysqli_query($conn, "SELECT user FROM log_admin WHERE user = '$user'");
    
    if(mysqli_fetch_array($result_username)) {
        echo "<script>
                alert('Username sudah terdaftar !!');
                document.location='index.php';
              </script>
        ";
        return false;
        }

        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $regis = mysqli_query($conn, "INSERT INTO log_admin(user,pass) values ('$user','$pass')");

    if($_POST > 0) {
        echo "<script>
                alert('User Admin Berhasil Ditambahkan!!');
                document.location='index.php';
            </script>
        ";
        } 
    }   


?>