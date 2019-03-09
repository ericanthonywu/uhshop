<?php
require_once ('../class/connection.php');
session_start();
$nama = $_POST['nama'];
$nohp = $_POST['nohp'];
$email = $_POST['email'];
$pesan = $_POST['pesan'];
$date = date('Y-m-d');
mysqli_query($uh_shop,"
insert into
    contact
set 
    nama = '$nama',
    email = '$email',
    no_hp = $nohp,
    pesan = '$pesan',
    created_date = '$date'
")or die(mysqli_error($uh_shop));