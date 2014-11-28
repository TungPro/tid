<div id="main_content">
<?php echo $this->view('left_main');?>
<div class="content_right right">
	<div class="sidebox">
		<div class="box_login">
			<div class="box_login_content">
				<div class="title_box_login">
					<p class="txt_title">Đăng nhập</p>
				</div>
					<?php echo form_open(base_url('dang-nhap'), array('id' => 'frmlogin', 'name' => 'frmlogin')); ?>
					
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
									<strong>T ID:</strong>
								</div>
								<div class="control01 w290">
									<div class="control01-main">
										<ul>
											<li><input type="text" name="email" id="email"
												class=" style02 w225" value="<?php echo set_value('email'); ?>" tabindex="1" />
											</li>
											<li><span class="txt_gray">(Đăng nhập bằng email)</span>
											</li>
										</ul>
										<div class="clr"></div>
									</div>
								</div>
								<div class="clr"></div>
							</div>
						</li>


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
								<div class="label03 w120">&nbsp;</div>
								<div class="control01 w290">
									<div class="control01-main">
										<a href="<?php echo base_url('khoi-phuc-mat-khau');?>">Quên mật khẩu?</a>
										<div class="clr"></div>
									</div>
								</div>
								<div class="clr"></div>
							</div>
						</li>


						<li>
							<div class="form-main">
								<div class="label03 w120">&nbsp;</div>
								<div class="control01 w290">
									<div class="control01-main">
										<ul>
											<li><input type="checkbox" class="checkbox" value="1"
												name="remember" id="remember" tabindex="4" <?php echo set_checkbox('remember', '1');?>/> <label
												class="lable-checkbox" for="ghinho">Ghi nhớ trạng thái đăng
													nhập</label>
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
												value="Đăng nhập" class="btn_blue_02_right" tabindex="4" />
										</span></li>
									</ul>
								</div>
								<div class="clr"></div>
							</div>
						</li>
					</ul>
				<?php echo form_close();?>
				<!-- 
				<div class="txt_bottom_box_login">
					<p>Hoặc đăng nhập bằng</p>
					<center>
						<p class="openid">
							<a href="javascript:void(0);"
								title="Đăng nhập bằng tài khoản Facebook"><img
								src="images/facebook.png"
								alt="Đăng nhập bằng tài khoản Facebook" width="45" height="45"
								border="0"> </a> <a href="javascript:void(0);"
								title="Đăng nhập bằng tài khoản Twitter"><img
								src="images/twitter.png" alt="Đăng nhập bằng tài khoản Twitter"
								width="45" height="45" border="0"> </a> <a
								href="javascript:void(0);"
								title="Đăng nhập bằng tài khoản Google"><img
								src="images/google.png" alt="Đăng nhập bằng tài khoản Google"
								width="45" height="45" border="0"> </a>
						</p>
					</center>
				</div>
				 -->
			</div>
		</div>
	</div>
</div>
</div>
