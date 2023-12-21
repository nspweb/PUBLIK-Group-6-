<?php

include 'konek.php';

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
    move_uploaded_file($dirFiles, $dir.$lampiranFileName);

    // Insert data pengaduan
    $query = "INSERT INTO tb_pengaduan VALUES ('', '$judul', '$isi', '$tanggal', '$lokasi', '$instansi', '$kategori', '$lampiranFileName')";
    $sql = mysqli_query($konek, $query);

    if ($sql) {
        echo "
        <script>
        alert('Tambah Data Berhasil!');
        window.location.href='index.php';
        </script>";
    } 
}

?>
