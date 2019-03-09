<?
	session_start();
	require_once ("class/connection.php");
	if(isset($_SESSION['token_inventory'])){
		header("location:".$base_url."dashboard");
	}else{
		header("location:".$base_url."auth");
	}
?>