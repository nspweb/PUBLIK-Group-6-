<?php
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
?>