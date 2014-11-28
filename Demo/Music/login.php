<?php
error_reporting(0);
//if ($_SERVER['HTTP_X_FORWARDED_PROTO'] == "http" && $_SERVER['REMOTE_ADDR'] != '127.0.0.1') {
//  header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
//  exit();
//}
session_start();

require_once('AppInfo.php');
require_once('TIDOAuth2.php');
require_once('utils.php');

if(isset($_SESSION["token"]) && !empty($_SESSION["token"])){
	// $token = $_SESSION["token"];
	header("Location: ./index.php");
}else{
	if(isset($_REQUEST["error"]) && !empty($_REQUEST["error"])){
		$error = $_REQUEST["error"];
		echo "Lỗi: ".$error;
	}else{
		$token = TIDOAuth2::login();
		$_SESSION["token"] = $token;
		header("Location: ./index.php");
	}

}
?>
