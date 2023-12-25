<?php
#E1E122071_MUHAMMAD VANNES AL QADRI
class Database
{
    private $host = "localhost", $username = "root", $password = "", $db = "db_publik", $conn; //tambhakan properti dengan visibility di awal sebelum properti

    public function __construct() //membuat konstruktornya yang merupakan magic metod pada php
    {
        $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->db); //this->untuk menyamakan properti di luar function,karena function 
    }
    public function getKonek() //membuat metod getKonek yang akan mengembalikan nilai $con
    {
        return $this->conn;
    }
}

class userDaftar extends Database //membuat child class/kelas anak yaitu userDaftar
{
    public function cekDaftar($nik, $namalengkap, $email, $no_telepon, $password)
    {
        $konek = parent::getKonek();
        if (isset($_POST['btnDaftar'])) {
            $nik = $_POST['nik'];
            $namalengkap = $_POST['namalengkap'];
            $email = $_POST['email'];
            $no_telepon = $_POST['no_telepon'];
            $password = $_POST['password'];

            $query = mysqli_query($konek, "insert into tb_user values('$nik', $namalengkap, $email, $no_telepon,'$password')");

            if ($query) {
                echo "
                <script>
                alert('User Registration successful!');
                window.location.href='login.php';
                </script>
                ";
            } else {
                // Registration failed
                echo "Registration failed. Please try again.";
            }
        }
    }

}
$userDaftar = new userDaftar(); //kita buat objek untuk user daftarnya

if (isset($_POST['btnDaftar'])) {
    $nik = $_POST['nik'];
    $namalengkap = $_POST['namalengkap'];
    $email = $_POST['email'];
    $no_telepon = $_POST['no_telepon'];
    $password = $_POST['password'];
    $userDaftar->cekDaftar($nik,$namalengkap, $email, $no_telepon, $password);
}

?>