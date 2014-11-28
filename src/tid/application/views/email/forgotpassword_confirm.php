<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content=" " />
<meta name="keywords" content=" " />
<meta name="author" content=" " />
<meta name="copyright" content=" " />
<meta name="company" content=" " />
<style type="text/css">
/***Mail Template***/
            a:link, a:visited, a:active {
	text-decoration:none;
	outline:none;
	color:#0088cc;
}
a:hover {
	text-decoration:underline;
}
a img {
	border:none; 
}
</style>
<title>T-ID</title>
</head>
<body style="background-color:#fff; margin:0px; padding:0px;">
<table border="0" cellspacing="0" cellpadding="0" style=" width:700px; margin:0px auto; padding-top:10px; padding-left:10px; padding-right:10px; padding-bottom:10px; font-family:'Tahoma'; font-size:12px; line-height:18px; color:#333; border:1px solid #d7d7d7; background-color:#fefefe">
  <tr>
    <td><a href="<?php echo base_url('');?>"><img src="<?php echo assets_url('images/logo.png')?>" /></a></td>
  </tr>
  <tr>
    <td style="padding-top:20px;"> Chào bạn <strong><?php echo $name?></strong>, </td>
  </tr>
  <tr>
    <td style="padding-top:20px;"> Chúng tôi vừa nhận được yêu cầu khôi phục mật khẩu từ phía bạn. Vui lòng nhấn vào đường link sau để khôi phục: 
    <a href="<?php echo $url?>" target="_blank"><?php echo $url?></a>
    </td>
  </tr>
  <tr>
    <td style="padding-top:20px;"> Hoặc sao chép đường đẫn sau và dán vào trình duyệt web: <strong><?php echo $url?></strong></td>
  </tr>
  <tr>
      <td style="padding-top:20px;"> Sau ngày <?php echo $expire;?>, nếu bạn không kích hoạt link này thì mật khẩu vẫn sử dụng như cũ. </td>
  </tr>
  <tr>
    <td style="padding-top:20px;"> Để bảo mật, bạn vui lòng thay đổi mật khẩu sau khi đăng nhập và không giao lại thông tin này cho bất kỳ cá nhân nào. </td>
  </tr>
  <tr>
    <td style="padding-top:20px;"> Trân trọng,<br />
      Nhóm phát triển sản phẩm. </td>
  </tr>
  <tr>
    <td style="padding-top:5px;"><span style="color:#999999">Đây là email tự động được gửi từ hệ thống, vui lòng không trả lời email này. Xin cảm ơn.</span></td>
  </tr>
</table>
</body>
</html>
