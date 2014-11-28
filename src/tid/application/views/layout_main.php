<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="<?php echo assets_url('images/favicon.ico');?>" type="image/x-icon" />
<meta name="description" content="T ID">
<title>Cổng tài khoản dịch vụ trực tuyến - T ID</title>
<!--CSS-->
<link href="<?php echo assets_url('styles/general.css');?>"
	rel="stylesheet" type="text/css" />
<link href="<?php echo assets_url('styles/lightbox.css');?>"
	media="screen" rel="stylesheet" type="text/css">
<script type="text/javascript">
            var HOST_URL = '<?php echo base_url();?>';
            var IMAGE_URL='<?php echo assets_url('images/'); ?>';
        </script>
<script type="text/javascript"
	src="<?php echo assets_url('js/jquery.js');?>"></script>
<script type="text/javascript"
	src="<?php echo assets_url('js/common.js');?>"></script>
</head>
<body>
	<div class="wrapper_body">
		<?php echo $this->view('header');?>
		<div id="wrapper_container">
			<?php echo $content_for_layout ?>
			<?php echo $this->view('footer');?>
		</div>

	</div>

</body>

</html>

