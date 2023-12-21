<?php

include 'konek.php';

if (isset($_POST['btnLogin'])) {
    $nik = $_POST['nik'];
    $password = $_POST['password'];

    // Authenticate user
    $query = mysqli_query($konek, "SELECT * FROM tb_user WHERE nik='$nik'");
    $data = mysqli_fetch_array($query);

    if (mysqli_num_rows($query) >= 1) {
        if ($data['password'] == $password) {
            // Login is valid
            session_start();
            $_SESSION['nik'] = $nik;
            echo "
            <script>
            alert('User login successful!');
            window.location.href='index.php';
            </script>";
        } else {
            // Incorrect password
            header('location:login.php?pesan=Password Salah');
        }
    } else {
        // Incorrect NIK
        header('location:login.php?pesan=NIK Salah');
    }
}

?>
