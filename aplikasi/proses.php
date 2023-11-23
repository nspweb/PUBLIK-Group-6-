<?php

class PengaduanManager {
    private $konek;

    public function __construct($databaseConnection) {
        $this->konek = $databaseConnection;
    }

    public function tambahPengaduan($judul, $isi, $tanggal, $lokasi, $instansi, $kategori, $lampiran) {
        $lampiranFileName = $this->uploadLampiran($lampiran);

        $query = "INSERT INTO tb_pengaduan VALUES ('', '$judul', '$isi', '$tanggal', '$lokasi', '$instansi', '$kategori', '$lampiranFileName')";
        $sql = mysqli_query($this->konek, $query);

        if ($sql) {
            header('location:index.php');
        }
    }

    private function uploadLampiran($lampiran) {
        $lampiranFileName = $lampiran['name'];
        $dir = "gambar/";
        $dirFiles = $lampiran['tmp_name'];
        move_uploaded_file($dirFiles, $dir.$lampiranFileName);

        return $lampiranFileName;
    }
}

// Contoh penggunaan:
include 'konek.php';

if (isset($_POST['btnProses'])) {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $tanggal = $_POST['tanggal'];
    $lokasi = $_POST['lokasi'];
    $instansi = $_POST['instansi'];
    $kategori = $_POST['kategori'];

    $pengaduanManager = new PengaduanManager($konek);

    if ($_POST['btnProses'] == "tambah") {
        $lampiran = $_FILES['lampiran'];
        $pengaduanManager->tambahPengaduan($judul, $isi, $tanggal, $lokasi, $instansi, $kategori, $lampiran);
    }
}

?>
