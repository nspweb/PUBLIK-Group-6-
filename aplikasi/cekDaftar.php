<?php

include 'konek.php';
class userDaftar extends Database
{
    public function __construct()
    {
        parent::__construct();
    }

    public function cekDaftar($nik,$namalengkap, $email,$no_telepon,$password)
    {
        $konek = $this->getKonek();
        $query = mysqli_query($konek, "INSERT INTO tb_user VALUES('$nik','$namalengkap','$email','$no_telepon', '$password')");
        return $query;
    }
}
$daftar = new userDaftar();


if (isset($_POST['btnDaftar'])) {
    $nik = $_POST['nik'];
    $namalengkap = $_POST['namalengkap'];
    $email = $_POST['email'];
    $no_telepon = $_POST['no_telepon'];
    $password = $_POST['password'];

    // Register user
    $sql = $daftar->cekDaftar($nik,$namalengkap, $email,$no_telepon,$password);

    if ($sql) {
        // Registration successful
        echo "
        <script>
        alert('User registration successful!');
        window.location.href='login.php';
        </script>";
    } else {
        // Registration failed
        echo "Registration failed. Please try again.";
    }
}

?>
