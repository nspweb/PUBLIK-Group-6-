<?php

class UserRegistration {
    private $konek;

    public function __construct($databaseConnection) {
        $this->konek = $databaseConnection;
    }

    public function registerUser($nik, $namalengkap, $email, $no_telepon, $password) {
        $query = mysqli_query($this->konek, "INSERT INTO tb_user VALUES('$nik','$namalengkap','$email','$no_telepon', '$password')");

        if ($query) {
            $this->redirectToLogin();
        } else {
            echo "Registration failed. Please try again.";
        }
    }

    private function redirectToLogin() {
        echo "
        <script>
        alert('User registration successful!');
        window.location.href='login.php';
        </script>";
    }
}

// Example usage:
include 'konek.php';

if (isset($_POST['btnDaftar'])) {
    $nik = $_POST['nik'];
    $namalengkap = $_POST['namalengkap'];
    $email = $_POST['email'];
    $no_telepon = $_POST['no_telepon'];
    $password = $_POST['password'];

    $userRegistration = new UserRegistration($konek);
    $userRegistration->registerUser($nik, $namalengkap, $email, $no_telepon, $password);
}
?>