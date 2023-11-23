<?php

class Database {
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'db_publik';
    protected $connection;

    public function __construct() {
        $this->connect();
    }

    protected function connect() {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->connection->connect_error) {
            die('Koneksi database gagal: ' . $this->connection->connect_error);
        }
    }

    public function closeConnection() {
        if ($this->connection) {
            $this->connection->close();
        }
    }
}

class UserLogin extends Database {
    public function authenticateUser($nik, $password) {
        $nik = mysqli_real_escape_string($this->connection, $nik);
        $password = mysqli_real_escape_string($this->connection, $password);

        $query = mysqli_query($this->connection, "SELECT * FROM tb_user WHERE nik='$nik' AND password='$password'");

        if ($query) {
            $data = mysqli_fetch_array($query);

            if ($data) {
                $this->startSession($data['nik']);
                header('location:index.php');
            } else {
                // Incorrect NIK or Password
                header('location:login.php?pesan=NIK atau Password Salah');
            }
        } else {
            // Query execution failed
            echo "Query execution failed: " . mysqli_error($this->connection);
        }
    }

    private function startSession($nik) {
        session_start();
        $_SESSION['nik'] = $nik;
    }
}

if (isset($_POST['btnLogin'])) {
    $nik = $_POST['nik'];
    $password = $_POST['password'];

    $userLogin = new UserLogin();
    $userLogin->authenticateUser($nik, $password);

    $userLogin->closeConnection();
}

?>
