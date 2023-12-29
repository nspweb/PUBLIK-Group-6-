<?php

// Include file untuk koneksi database
include 'konek.php';

// Polimorfisme memungkinkan objek dari kelas yang berbeda untuk dianggap sebagai objek dari tipe yang sama saat digunakan melalui interface yang sama

// Fungsi yang mana kelas-kelas harus mengimplementasikannya.
interface Registrasi {
    public function cekDaftar($nik, $namalengkap, $email, $no_telepon, $password);
    public function cekLogin($nik);
}

// Kelas userDaftar yang meng-extend Database dan meng-implement Registrasi
class userDaftar extends Database implements Registrasi
{
    public function __construct()
    {
        parent::__construct();
    }

    // Implementasi method cekDaftar dari interface Registrasi
    public function cekDaftar($nik, $namalengkap, $email, $no_telepon, $password)
    {
        $konek = $this->getKonek();
        $query = mysqli_query($konek, "INSERT INTO tb_user VALUES('$nik','$namalengkap','$email','$no_telepon', '$password')");
        return $query;
    }
    public function cekLogin($nik)
    {
        $konek = $this->getKonek();
        $query = mysqli_query($konek, "SELECT * FROM tb_user WHERE nik='$nik'");
        return $query;
    }
}
class userLogin extends Database implements Registrasi
{
    public function __construct()
    {
        parent::__construct();
    }
    public function cekDaftar($nik, $namalengkap, $email, $no_telepon, $password)
    {
        $konek = $this->getKonek();
        $query = mysqli_query($konek, "INSERT INTO tb_user VALUES('$nik','$namalengkap','$email','$no_telepon', '$password')");
        return $query;
    }
    public function cekLogin($nik)
    {
        $konek = $this->getKonek();
        $query = mysqli_query($konek, "SELECT * FROM tb_user WHERE nik='$nik'");
        return $query;
    }
}

// Objek
$daftar = new userDaftar();
$login = new userLogin();

// Polimorfisme: Keduanya bisa dianggap sebagai objek Registrasi
$daftarResult = $daftar->cekDaftar($nik, $namalengkap, $email, $no_telepon, $password);
$loginResult = $login->cekLogin($nik);

// Proses registrasi saat tombol btnDaftar diklik
if (isset($_POST['btnDaftar'])) {
    // Ambil data dari form
    $nik = $_POST['nik'];
    $namalengkap = $_POST['namalengkap'];
    $email = $_POST['email'];
    $no_telepon = $_POST['no_telepon'];
    $password = $_POST['password'];

    // Panggil method cekDaftar untuk melakukan registrasi
    $sql = $daftar->cekDaftar($nik, $namalengkap, $email, $no_telepon, $password);

    // Cek apakah registrasi berhasil
    if ($sql) {
        // Registrasi sukses
        echo "
        <script>
        alert('User registration successful!');
        window.location.href='login.php';
        </script>";
    } else {
        // Registrasi gagal
        echo "Registration failed. Please try again.";
    }
}

//  konsep polimorfisme terlihat dari kemampuan untuk menggunakan objek dari kelas yang berbeda (dalam contoh proyek ini adalah kelas userDaftar) melalui interface (Registrasi). Ini memungkinkan pemanggilan metode dengan nama yang sama (cekDaftar) pada objek berbagai kelas yang mengimplementasikan interface tersebut.
?>