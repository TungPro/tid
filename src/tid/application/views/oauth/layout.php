<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>T-ID</title>
    <link href="<?php echo assets_url('styles/common.css');?>" media="all" type="text/css" rel="stylesheet" />
    <link href="<?php echo assets_url('styles/btn.css');?>" media="all" type="text/css" rel="stylesheet" />
    <link href="<?php echo assets_url('styles/intro.css');?>" media="all" type="text/css" rel="stylesheet" />
    <link href="<?php echo assets_url('styles/pLogin.css');?>" media="all" type="text/css" rel="stylesheet" /> 
</head>

<body>
	<div class="hdr">
		<a href="javascript:void(0);" class="logo"><img src="<?php echo assets_url('images/logo-s.png');?>" alt="" width="94" height="33" class="png" /></a>
		<div class="fr avatar">
			<a href="<?php echo base_url('/thong-tin-tai-khoan');?>" target="_blank">
				<img src="<?php echo (isset($user['avatar']) && $user['avatar'] != "") ?  assets_url('/avatars/'.$user['avatar']) : assets_url('images/graphics/avatar_50x50.jpg');?>" alt="" width="32" height="32" class="fl" />
				<span><?php echo $user['name']?></span>
			</a>
		</div>
		<div class="clr"></div>
	</div>
	
	<?php echo $content_for_layout ?>
 
	<div class="footer" style="position:relative; top:auto; bottom:auto; background:none; border:0">
		<div class="bdw">			
			<div class="info">
				<div class="fl">Bản quyền © 2013 thuộc về T-ID.</div>
			</div>
		</div>
	</div>
</body>
</html>
