<div class="content_left left">
	<div id="box_intro_fpt_product">
		<div class="main_content">
			<p class="txt_blue txt_title">T-ID - 1 tài khoản, đa dịch vụ</p>
			<img src="<?php echo assets_url('images/2.png'); ?>" width="470" height="350">
			<p>
				
				<?php if(isset($register) && $register == 1):?>
				<span class="left txt_15">Bạn đã có <strong>T-ID</strong>?
				</span> 
				<a class="btn_blue_02_left" href="<?php echo base_url('/dang-nhap');?>"><span class="btn_blue_02_right">Đăng nhập</span></a>
				<?php else:?>
				<span class="left txt_15">Bạn đã có <strong>T-ID</strong> chưa?
				</span> 
				<a class="btn_green_01_left" href="<?php echo base_url('/dang-ky');?>"><span
					class="btn_green_01_right">Đăng ký T-ID</span> </a>
				<?php endif;?>

			</p>

		</div>
	</div>
</div>
