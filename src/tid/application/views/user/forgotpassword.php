<div id="main_content">
<?php echo $this->view('left_main',array('register'=>1));?>
<div class="content_right right">
	<div class="sidebox">
		<div class="box_login">
			<div class="box_login_content">
				<div class="title_box_login">
					<p class="txt_title">Khôi phục mật khẩu</p>
				</div>
					<div class="title_box_login">
						<p class="txt_13">Vui lòng cung cấp thông tin dưới đây để nhận lại
							mật khẩu của bạn.</p>
					</div>
					<?php echo form_open('khoi-phuc-mat-khau', array('id' => 'frmforgotpw', 'name' => 'frmforgotpw', 'autocomplete' => 'off')); ?>
					
					<ul class="list04">
						<?php if(validation_errors()): ?>
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
									<strong>Email đăng ký:</strong>
								</div>
								<div class="control01 w290">
									<div class="control01-main">
										<ul>
											<li><input type="text" name="email" id="email"
												class=" style02 w225" value="<?php echo set_value('email'); ?>" tabindex="1" />
											</li>
										</ul>
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
												value="Lấy lại mật khẩu" class="btn_blue_02_right" tabindex="4" />
										</span></li>
									</ul>
								</div>
								<div class="clr"></div>
							</div>
						</li>
					</ul>
				<?php echo form_close();?>
				
			</div>
		</div>
	</div>
</div>
</div>
