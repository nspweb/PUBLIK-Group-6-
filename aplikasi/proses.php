<?php
#AULIYA AFIFAH ADNAN HAKIM_E1E122046
include 'konek.php';
class Proses extends Database
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getProses($judul, $isi, $tanggal, $lokasi, $instansi, $kategori, $lampiranFileName)
    {
        $konek = $this->getKonek();
        $query = mysqli_query($konek, "INSERT INTO tb_pengaduan VALUES ('', '$judul', '$isi', '$tanggal', '$lokasi', '$instansi', '$kategori', '$lampiranFileName')");

        return $query;
    }
}

$proses = new Proses();



if (isset($_POST['btnProses']) && $_POST['btnProses'] == "tambah") {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $tanggal = $_POST['tanggal'];
    $lokasi = $_POST['lokasi'];
    $instansi = $_POST['instansi'];
    $kategori = $_POST['kategori'];

    $lampiran = $_FILES['lampiran'];

    // Upload lampiran
    $lampiranFileName = $lampiran['name'];
    $dir = "gambar/";
    $dirFiles = $lampiran['tmp_name'];
    move_uploaded_file($dirFiles, $dir . $lampiranFileName);

    // Insert data pengaduan
    $sql = $proses->getProses($judul, $isi, $tanggal, $lokasi, $instansi, $kategori, $lampiranFileName);


    if ($sql) {
        echo "
        <script>
        alert('Tambah Data Berhasil!');
        window.location.href='index.php';
        </script>";
    }
}

?>