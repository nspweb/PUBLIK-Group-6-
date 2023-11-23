<?php

class Database {
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'db_publik';
    protected $connection;

    // Konstruktor untuk membuat koneksi ke database
    public function __construct() {
        $this->connect();
    }

    // Fungsi untuk membuat koneksi ke database
    protected function connect() {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);

        // Periksa apakah koneksi sukses atau tidak
        if ($this->connection->connect_error) {
            die('Koneksi database gagal: ' . $this->connection->connect_error);
        }
    }

    // Fungsi untuk menutup koneksi ke database
    public function closeConnection() {
        if ($this->connection) {
            $this->connection->close();
        }
    }

    // Fungsi lain yang mungkin dibutuhkan dalam aplikasi Anda
    // ...

}

class UserRegistration extends Database {
    public function registerUser($nik, $namalengkap, $email, $no_telepon, $password) {
        $query = mysqli_query($this->connection, "INSERT INTO tb_user VALUES('$nik','$namalengkap','$email','$no_telepon', '$password')");

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
if (isset($_POST['btnDaftar'])) {
    $nik = $_POST['nik'];
    $namalengkap = $_POST['namalengkap'];
    $email = $_POST['email'];
    $no_telepon = $_POST['no_telepon'];
    $password = $_POST['password'];

    $userRegistration = new UserRegistration();
    $userRegistration->registerUser($nik, $namalengkap, $email, $no_telepon, $password);

    // Menutup koneksi setelah selesai menggunakan database
   
}
?>
