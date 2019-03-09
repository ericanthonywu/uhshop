<?
session_start();
require_once('../class/connection.php');
// require_once('../class/password.php');

if(isset($_POST['btn-masuk'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$pass = encrypt_decrypt("encrypt",$password);
	$query_cek = mysqli_query($simarum_perum,"SELECT * FROM auth WHERE username = '$username'")or die(mysqli_error($simarum_perum));
	$data_cek = mysqli_num_rows($query_cek);
	$data_email = mysqli_fetch_array($query_cek);
	$token = $data_email['id'];
	$passwordnya = $data_email['password'];
	$status = $data_email['st'];
	if($data_cek>0){	
		if($passwordnya == $pass){
			if($status == 1){
				$_SESSION['token_perum'] = $token;
				$_SESSION['token_status'] = $status;
				echo "validation";
			}elseif($status == 2){
				$_SESSION['token_perum'] = $token;
				echo "ok";
			}
		}else{
			echo "password";
		}
	}else{
		echo "unregistered";
	}
}
?>
