<?php
#E1E122008_DEVY NATALIA NURTIANI
class Database // Class Database untuk kelola koneksi ke database
{
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $database = "db_publik";
    protected $conn;

    public function __construct() //Konstruktor untuk membuat koneksi ke database
    {
        $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->database);

        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }
    }

    public function getKonek()
    {
        return $this->conn;
    }

    public function closeConn()
    {
        $this->conn->close();
    }
}

// Class pengaduan bagian turunan dari database
class Pengaduan extends Database
{
    public function tambahPengaduan($judul, $isi, $tanggal, $lokasi, $instansi, $kategori, $lampiranFileName)
    {
        $query = "INSERT INTO tb_pengaduan VALUES (NULL, '$judul', '$isi', '$tanggal', '$lokasi', '$instansi', '$kategori', '$lampiranFileName')";
        $result = $this->getKonek()->query($query);

        if ($result) {
            echo "
                <script>
                alert('Tambah Data Berhasil!');
                window.location.href='index.php';
                </script>";
        } else {
            echo "
                <script>
                alert('Tambah Data Gagal!');
                window.location.href='index.php';
                </script>";
        }
    }
}

// Membuat objek untuk kelas Pengaduan
$pengaduan = new Pengaduan();

if (isset($_POST['btnProses']) && $_POST['btnProses'] == "tambah") {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $tanggal = $_POST['tanggal'];
    $lokasi = $_POST['lokasi'];
    $instansi = $_POST['instansi'];
    $kategori = $_POST['kategori'];
    $lampiran = $_FILES['lampiran'];

    // Panggil metode tambahPengaduan dari objek Pengaduan
    $pengaduan->tambahPengaduan($judul, $isi, $tanggal, $lokasi, $instansi, $kategori, $lampiranFileName);
    
    // Tutup koneksi setelah digunakan
    $pengaduan->closeConn();
}
?>
