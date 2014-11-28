<div id="main_content">
<?php echo $this->view('left_main',array('register'=>1));?>
<div class="content_right right">
	<div class="sidebox">
		<div class="box_login">
			<div class="box_login_content">
				<div class="title_box_login">
					<p class="txt_title">Xác nhận khôi phục mật khẩu</p>
				</div>
					<form action="" method="post" accept-charset="utf-8" id="frmForgot" name="frmForgot">
					<ul class="list04">
					<?php if(isset($error) || isset($success)):?>
					<li>
                        <div class="form-main">
                            <div class="control01 w500">
                                <div class="control01-main">
                                    <ul>
                                        <li id="dnerr"><div class="message-error"><b>
                                         <?php if(isset($error)):?>
                                         	Mã xác nhận không chính xác hoặc đã hết hạn.
                                         <?php endif;?>
                                         
                                         <?php if(isset($success)):?>
                                         	Đổi mật khẩu thành công. Click vào <a href="<?php echo base_url('/')?>">đây để đăng nhập</a>
                                         <?php endif;?>
                                        </b></div></li>
                                    </ul>
                                    <div class="clr"></div>
                                </div>
                            </div>
                            <div class="clr"></div>
                        </div>
                     </li>
					<?php else: if(validation_errors()): ?>
						<li>
                        <div class="form-main">
                            <div class="control01 w500">
                                <div class="control01-main">
                                    <ul>
                                        <li id="dnerr"><div class="message-error"><b><?php echo validation_errors('','<br/>'); ?></b></div></li>
                                    </ul>
                                    <div class="clr"></div>
                                </div>
                            </div>
                            <div class="clr"></div>
                        </div>
                     </li>
                     <?php endif;?>
                     <li>
							<div class="form-main">
								<div class="label03 w120">
									<strong>Mật khẩu:</strong>
								</div>
								<div class="control01 w290">
									<div class="control01-main">
										<input type="password" name="password" id="password"
											class=" style02 w225" value="" tabindex="2" />
										<div class="clr"></div>
									</div>
								</div>
								<div class="clr"></div>
							</div>
						</li>
						<li>
							<div class="form-main">
								<div class="label03 w120">
									<strong>Xác nhận:</strong>
								</div>
								<div class="control01 w290">
									<div class="control01-main">
										<input type="password" name="confirmpassword" id="confirmpassword"
											class=" style02 w225" value="" tabindex="2" />
										<div class="clr"></div>
									</div>
								</div>
								<div class="clr"></div>
							</div>
						</li>
						<li class="frm-button">
							<div class="form-main">
								<div class="label03 w120">&nbsp;</div>
								<div class="control01 w290">
									<ul class="list-button">
										<li><span class="btn_blue_02_left"> <input type="submit"
												value="Đổi mật khẩu" class="btn_blue_02_right" tabindex="4" />
										</span></li>
									</ul>
								</div>
								<div class="clr"></div>
							</div>
						</li>
						<?php endif;?>
					</ul>
					</form>
				
			</div>
		</div>
	</div>
</div>
</div>
