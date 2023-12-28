<?php

include 'konek.php';
// pali_e1e122106
if (isset($_POST['btnDaftar'])) {
    $nik = $_POST['nik'];
    $namalengkap = $_POST['namalengkap'];
    $email = $_POST['email'];
    $no_telepon = $_POST['no_telepon'];
    $password = $_POST['password'];

    // Register user
    $query = mysqli_query($konek, "INSERT INTO tb_user VALUES('$nik','$namalengkap','$email','$no_telepon', '$password')");

    if ($query) {
        // Registration successful
        echo "
        <script>
        alert('User registration successful!');
        window.location.href='login.php';
        </script>";
    } else {
        // Registration failed
        echo "Registration failed. Please try again.";
    }
}

?>
