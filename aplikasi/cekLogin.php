<?php

class UserLogin {
    private $konek;

    public function __construct($databaseConnection) {
        $this->konek = $databaseConnection;
    }

    public function authenticateUser($nik, $password) {
        $query = mysqli_query($this->konek, "SELECT * FROM tb_user WHERE nik='$nik'");
        $data = mysqli_fetch_array($query);

        if (mysqli_num_rows($query) >= 1) {
            if ($data['password'] == $password) {
                // Login is valid
                $this->startSession($data['nik']);
                header('location:index.php');
            } else {
                // Incorrect password
                header('location:login.php?pesan=Password Salah');
            }
        } else {
            // Incorrect NIK
            header('location:login.php?pesan=NIK Salah');
        }
    }

    private function startSession($nik) {
        session_start();
        $_SESSION['nik'] = $nik;
    }
}

// Example usage:
include 'konek.php';

if (isset($_POST['btnLogin'])) {
    $nik = $_POST['nik'];
    $password = $_POST['password'];

    $userLogin = new UserLogin($konek);
    $userLogin->authenticateUser($nik, $password);
}
?>
