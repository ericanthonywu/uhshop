<?php
require_once ("../class/connection.php");
$email = $_POST['email'];

$sql = mysqli_query($uh_shop,"select * from customer where customer_email = '$email'");
if(mysqli_num_rows($sql) > 0){
    echo "Email sudah tersedia";
}
