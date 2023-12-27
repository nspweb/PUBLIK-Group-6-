<?php
// E1E122004 ANNISA NURFADILAH
class Database
{
    // Properti dengan visibility diawali sebelum properti untuk menambahkan kejelasan dalam pembacaan kode.
    private $host = "localhost", $username = "root", $password = "", $db = "db_publik", $conn;

    // Konstruktor, merupakan magic method pada PHP, digunakan untuk inisialisasi objek saat objek dibuat.
    public function __construct()
    {
        // Menghubungkan ke database menggunakan properti yang telah ditentukan sebelumnya.
        $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->db);
    }

    // Metode getKonek digunakan untuk mengembalikan nilai dari properti $conn.
    public function getKonek()
    {
        return $this->conn;
    }
}
?>
