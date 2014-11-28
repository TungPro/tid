<?php
require_once('AppInfo.php');
require_once('utils.php');

class TIDOAuth2 {

	public static function getUserInfo($token) {
		return self::curl('http://tid.com/api/info?access_token='.$token);
	}
  
  public static function curl($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    return json_decode(curl_exec($ch), true);
  }

  public static function login() {
    $client_id = AppInfo::clientID();
    $client_secret = AppInfo::clientSecret();
    $url = AppInfo::callbackUrl();
    
    $scope = 'userinfo';
  
    $code = $_REQUEST["code"];
    
    if (empty($code)) {        
      $authorize_url = "http://tid.com/oauth/authorize?client_id=$client_id&redirect_uri=$url&scope=$scope&grant_type=authorization_code&response_type=code";
      //die($authorize_url."xxx");
      die("<script>location.href='" . $authorize_url . "'</script>");
      return false;
    } else{
      $ch = curl_init("http://tid.com/oauth/token");
      curl_setopt($ch, CURLOPT_POSTFIELDS, "client_id=$client_id&redirect_uri=$url&client_secret=$client_secret&code=$code&scope=$scope&grant_type=authorization_code");
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      
      $response = json_decode(curl_exec($ch), true); 
      $token = idx($response, 'access_token');
      return $token;
    }
  }
}
