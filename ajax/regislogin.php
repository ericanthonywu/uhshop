<?php
require_once ('../class/connection.php');
session_start();
if(isset($_POST['daftar'])){
    $query_kode=mysqli_query($uh_shop,"SELECT customer_code FROM customer ORDER BY customer_code DESC LIMIT 1");
    $num_urut_kode = mysqli_num_rows($query_kode);
    $data_urut_kode = mysqli_fetch_array($query_kode);

    $awal_kode = substr($data_urut_kode['customer_code'],0-4);
    $next_kode = (int)$awal_kode+(int)1;
    $jnim_kode = strlen($next_kode);
    if (!$data_urut_kode['customer_code']){
        $no_kode = "0001";
    }
    elseif($jnim_kode == 1){
        $no_kode = "000";
    }
    elseif($jnim_kode == 2){
        $no_kode = "00";
    }
    elseif($jnim_kode == 3){
        $no_kode = "0";
    }
    if ($num_urut_kode == 0){
        $kode = "PELANGGAN-".$no_kode;
    }
    else{
        $kode = "PELANGGAN-".$no_kode.$next_kode;
    }
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $nohp = $_POST['hp'];
    $date = date('Y-m-d');
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $file = $_FILES['foto']['name'];
    $target_dir = "../assets/user/";
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $extensions_arr = array("jpg", "jpeg", "png", "gif");
    if($password ==  $repassword) {
        $passwordencrypt = encrypt_decrypt("encrypt",$password);
        if (in_array($imageFileType, $extensions_arr)) {
            move_uploaded_file($_FILES['foto']['tmp_name'], $target_dir . $file);
            mysqli_query($uh_shop,"
            insert into
                customer
            set 
                customer_code = '$kode',
                customer_username = '$username',
                customer_email = '$email',
                customer_password = '$passwordencrypt',
                customer_name = '$nama',
                customer_phone = '$nohp',
                customer_verify = '1',
                customer_image = '$file',
                created_date = '$date'
            ") or die(mysqli_error($uh_shop));
        } else {
            echo "Hanya menerima ekstensi ".implode(",",$extensions_arr)." ekstensi anda : ".$imageFileType;
        }
    }else{
        echo "password berbeda dengan konfirmasi";
    }
}else if(isset($_POST['masuk'])){
    $username = $_POST['user'];
    $password = $_POST['password'];
    $passwordencrypt = encrypt_decrypt("encrypt",$password);
    $sql = mysqli_query($uh_shop,"select * from customer where (customer_username = '$username' OR customer_email = '$username') and customer_password = '$passwordencrypt'");
    switch (mysqli_num_rows($sql)) {
        case 1:
            $sqlid = mysqli_query($uh_shop,"select * from customer order by customer_id desc limit 1");
            $reid = mysqli_fetch_array($sqlid)['customer_code'];
            $_SESSION['token_pelanggan'] = $reid;
            break;
        case 0:
            echo "Username / password salah";
            break;
        default:
            session_destroy();
            echo "Terjadi Error";
            break;
    }
}