<?php
#E1E122020_MUH. FALAH MUBARAQ
class Database //Membuat class Database yang nantinya akan menjadi class parent/kelas induk.
{
    private $host = "localhost", $user = "root", $pass = "", $db = "db_publik", $conn; //tambhakan properti dengan visibility di awal sebelum properti

    public function __construct() //membuat konstruktornya yang merupakan magic metod pada php
    {
        $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->db); //this->untuk menyamakan properti di luar function,karena function 
    }
    public function getKonek()//membuat metod getKonek yang akan mengembalikan nilai $con
    {
        return $this->conn;
    }
}
class userLogin extends Database //membuat child class/kelas anak yaitu userLogin
{
    public function cekLogin($nik, $password)
    {
        $konek = parent::getKonek(); 
        $query = mysqli_query($konek, "SELECT * FROM tb_user WHERE nik='$nik'");
        $data = mysqli_fetch_array($query);
        if (mysqli_num_rows($query) >= 1) {
            if ($data['password'] == $password) {
                // Login is valid
                $this->startSession($nik);
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
    private function startSession($nik)
    {
        session_start();
        $_SESSION['nik'] = $nik;
    }
}
$userLogin = new userLogin(); //kita buat objek untuk user loginnya

if (isset($_POST['btnLogin'])) {
    $nik = $_POST['nik'];
    $password = $_POST['password'];
    $userLogin->cekLogin($nik, $password);


}

?>