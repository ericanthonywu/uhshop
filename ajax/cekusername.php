<?php
require_once ("../class/connection.php");
$email = $_POST['username'];

$sql = mysqli_query($uh_shop,"select * from customer where customer_username = '$email'");
if(mysqli_num_rows($sql) > 0){
    echo "Username sudah tersedia";
}
