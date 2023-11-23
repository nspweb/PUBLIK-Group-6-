<?php
$konek=mysqli_connect("localhost", "root", "");
$db=mysqli_select_db($konek, "db_publik");
$db1 = mysqli_connect('localhost', 'root', '', 'db_publik');

?>