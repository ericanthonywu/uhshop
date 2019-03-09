<?
session_start();
require_once('../class/connection.php');

if(isset($_POST['btn-masuk'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$pass = encrypt_decrypt("encrypt",$password);
	$query_cek = mysqli_query($inventory,"SELECT * FROM session WHERE session_username = '$username'")or die(mysqli_error($inventory));
	$data_cek = mysqli_num_rows($query_cek);
	$data_session = mysqli_fetch_array($query_cek);
	$token = $data_session['session_id'];
	$passwordnya = $data_session['session_password'];
	$role = $data_session['session_role'];
	if($data_cek>0){
		if($passwordnya == $pass){
			if($role == 1){
				$_SESSION['token_inventory'] = $token;
				echo "ceo";
			}elseif($role != 1){
				$_SESSION['token_inventory'] = $token;
				echo "pegawai";
			}
		}else{
			echo "password";
		}
	}else{
		echo "unregistered";
	}
}
?>
