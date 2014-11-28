<?php 
error_reporting(0);
session_start();

require_once('AppInfo.php');
require_once('TIDOAuth2.php');
require_once('utils.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Demo T-ID API</title>
  </head>
  <body>
    <section>
    <?php 
    if(isset($_SESSION["token"]) && !empty($_SESSION["token"])){
	    $token = $_SESSION["token"];
	    
	   // die($token);
	   ?>
	   Thông tin thành viên:
	    <pre>
	    <?php print_r(TIDOAuth2::getUserInfo($token));?>
	    </pre>
	    
	   <h1><a href="logout.php">Thoát</a></h1> 
	    
	    
	 <?php   
	}else{
	?>
      <h1><a href="login.php">Đăng nhập</a></h1>
    <?php }?>
    </section>
  </body>
</html>
