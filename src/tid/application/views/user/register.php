<div id="main_content">
	<?php echo $this->view('left_main', array('register'=>1));?>

	<div class="content_right right">

		<div class="sidebox">
			<div class="box_login">
				<div class="box_login_content">
					<div class="title_box_login">
						<p class="txt_title">Đăng ký</p>

					</div>
					<?php echo form_open(base_url('register/submit'), array('id' => 'frmRegister', 'name' => 'frmRegister', 'autocomplete' => 'off')); ?>
					<ul class="list04">
						<?php if(isset($error) && $error):?><li>
							<div class="form-main">
								<div class="label01 w90">&nbsp;</div>
								<div class="control01 w300">
									<div class="control01-main">
										<span class="message-error">
										<?php if(isset($errormsg) && $errormsg): 
										echo $errormsg;
										else:
										?>
										Thông tin đăng ký không hợp lệ. Vui lòng kiểm tra lại.
										<?php endif;?>
										</span>
									</div>
									<div class="clr"></div>
								</div>
								<div class="clr"></div>
							</div>
						</li>
						<?php endif;?>
						<li>
							<div class="form-main">
								<div class="label01 w90">
									<strong>T-ID:</strong>
								</div>
								<div class="control01 w300">
									<div class="control01-main">
										<ul>
											<li><input name="email" id="email" type="text"
												class="w201 defaulttext Tooltip" title="example@abc.com"
												value="<?php echo set_value('email'); ?>" tabindex="11" /></li>
											<li id="icon_email"><img class="ico09-img ico-status"
												width="1" height="1"
												src="<?php echo assets_url('images/graphics/blank_img.gif');?>">
											</li>
											<li class="inform" id="t_email" style="display: none">
												<div class="inform-main">
													<div class="box-tooltip w120">
														<div class="tooltip-arrow">&nbsp;</div>
														<div class="box-tooltip-main">Vui lòng nhập email thật để
															chúng tôi có thể liên lạc hay cấp lại mật khẩu (nếu bạn
															quên).</div>
													</div>
												</div>
											</li>
										</ul>
										<div class="clr"></div>
									</div>
									<div class="message-error" id="error_email"></div>
								</div>
								<div class="clr"></div>
							</div>
						</li>

						<li>
							<div class="form-main">
								<div class="label01 w90">
									<strong>Mật khẩu:</strong>
								</div>
								<div class="control01 w300">
									<div class="control01-main">
										<ul>
											<li><input name="password" id="password" type="password"
												class="w201 Tooltip" maxlength="32" tabindex="12" /></li>
											<li>
												<div class="div-password-strength">
													<span id="security_level_text" class="pass-text"></span>&nbsp;<img
														src="<?php echo assets_url('images/graphics/security_level_0.gif');?>"
														alt=" " height="7" width="50" id="security_level_image">
												</div>
											</li>
											<li class="inform" id="t_password" style="display: none">
												<div class="inform-main">
													<div class="box-tooltip w120">
														<div class="tooltip-arrow">&nbsp;</div>
														<div class="box-tooltip-main">Chiều dài từ 6 - 32 ký tự,
															không gõ tiếng việt có dấu. Để an toàn, bạn nên kết hợp
															đồng thời chữ cái, số, HOA, thường và các ký tự đặc biệt
															(*, %,…).</div>
													</div>
												</div>
											</li>
										</ul>
										<div class="clr"></div>
									</div>
									<div class="message-error" id="error_password"></div>
								</div>
								<div class="clr"></div>
							</div>
						</li>
						<li>
							<div class="form-main">
								<div class="label01 w90">
									<strong>Xác nhận:</strong>
								</div>
								<div class="control01 w300">
									<div class="control01-main">
										<ul>
											<li><input name="confirmpassword" id="confirmpassword"
												type="password" class="w201 Tooltip" maxlength="32"
												tabindex="12" /></li>
											<li class="inform" id="t_confirmpassword"
												style="display: none">
												<div class="inform-main">
													<div class="box-tooltip w120">
														<div class="tooltip-arrow">&nbsp;</div>
														<div class="box-tooltip-main">Nhập lại mật khẩu để xác
															nhận.</div>
													</div>
												</div>
											</li>
										</ul>
										<div class="clr"></div>
									</div>
									<div class="message-error" id="error_confirmpassword"></div>
								</div>
								<div class="clr"></div>
							</div>
						</li>
						<li>
							<div class="form-main">
								<div class="label01 w90">
									<strong>Họ và tên:</strong>
								</div>
								<div class="control01 w300">
									<div class="control01-main">
										<ul>
											<li><input name="lastname" id="lastname" type="text"
												class="w119 defaulttext Tooltip" title="Họ và tên đệm"
												value="<?php echo set_value('lastname'); ?>" maxlength="50" tabindex="13" /></li>
											<li><input name="firstname" id="firstname" type="text"
												class="w64 defaulttext Tooltip" title="Tên" value="<?php echo set_value('firstname'); ?>"
												maxlength="50" tabindex="14" /></li>

											<li class="inform" id="t_displayname" style="display: none">
												<div class="inform-main">
													<div class="box-tooltip w120">
														<div class="tooltip-arrow">&nbsp;</div>
														<div class="box-tooltip-main">Vui lòng nhập tên thật.</div>
													</div>
												</div>
											</li>
										</ul>
										<div class="clr"></div>
									</div>
									<div class="message-error" id="error_fullname"></div>
								</div>
								<div class="clr"></div>
							</div>
						</li>


						<li>
							<div class="form-main">
								<div class="label01 w90">
									<strong>Giới tính:</strong>
								</div>
								<div class="control01 w300">
									<div class="control01-main">
										<ul>
											<li><select name="gender" id="gender" class="w60"
												tabindex="15">
													<option value="" <?php echo set_select('gender', '', TRUE);?>>Chọn</option>
													<option value="1" <?php echo set_select('gender', 1);?>>Nam</option>
													<option value="0" <?php echo set_select('gender', 0);?>>Nữ</option>
											</select></li>
										</ul>
										<div class="clr"></div>
									</div>
									<div class="message-error" id="error_gender"></div>
								</div>
								<div class="clr"></div>
							</div>
						</li>

						<li>
							<div class="form-main">
								<div class="label01 w90">
									<strong>Ngày sinh:</strong>
								</div>
								<div class="control01 w300">
									<div class="control01-main">
										<ul>

											<li><select name="day" id="day" class="w60" tabindex="16">
													<option value="" <?php echo set_select('day', '', TRUE);?>>Ngày</option>
													<?php  for($i=1;$i<=31;$i++){
														echo '<option value="'.$i.'" '.set_select('day', $i).'>'.$i.'</option>';
														 }?>
											</select></li>

											<li><select name="month" id="month" class="w73" tabindex="17">
													<option value="" <?php echo set_select('month', '', TRUE);?>>Tháng</option>
													<?php  for($i=1;$i<=12;$i++){
														echo '<option value="'.$i.'" '.set_select('month', $i).'>'.$i.'</option>';
														 }?>
											</select></li>

											<li><select name="year" id="year" class="w60" tabindex="18">
													<option value="" <?php echo set_select('year', '', TRUE);?>>Năm</option>
													<?php 
													$start_year = date("Y",mktime(0,0,0,date("m"),date("d"),date("Y")-100));
													for ($i=date("Y");$i>=$start_year;--$i) {
															echo '<option value="'.$i.'" '.set_select('year', $i).'>'.$i.'</option>';
														}
														?>

											</select></li>

										</ul>
										<div class="clr"></div>
									</div>
									<div class="message-error" id="error_dob"></div>
								</div>
								<div class="clr"></div>
							</div>
						</li>

						<li>
							<div class="form-main">
								<div class="label01 w90">&nbsp;</div>
								<div class="control01 w300">
									<div class="control01-main">
										<ul>
											<li>
												<div id="box_captcha"></div>
											</li>
											<li class="font11 pt2"><a id="change-image"
												onclick="show_captcha();" href="javascript:;" tabindex="24">Chọn
													mã khác</a>
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
								<div class="label01 w90">
									<strong>Mã xác nhận:</strong>
								</div>
								<div class="control01 w300">
									<div class="control01-main">
										<ul>
											<li><input name="captcha" id="captcha" autocomplete="off"
												type="text" class="w125" maxlength="6" tabindex="19" /></li>
										</ul>
										<div class="clr"></div>
									</div>
									<div class="message-error" id="error_captcha"></div>
								</div>
								<div class="clr"></div>
							</div>
						</li>

						<li>
							<div class="form-main">
								<div class="label01 w90">&nbsp;</div>
								<div class="control01 w300">
									<div class="control01-main">
										<ul>
											<li>Nhấn nút "Đăng ký" là bạn đã đồng ý với các <a
												tabindex="21" target="_blank"
												href="<?php echo base_url('/dieu-khoan/'); ?>">điều khoản</a>.
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
								<div class="label01 w90">&nbsp;</div>
								<div class="control01 w300">
									<ul class="list-button">
										<li><span class="btn_green_01_left"> <input id="dangky"
												type="submit" class=" btn_green_01_right" value="Đăng ký"
												tabindex="20" />
										</span>
										</li>
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
<script
	type="text/javascript"
	src="<?php echo assets_url('js/register.min.js');?>"></script>
<script
	type="text/javascript"
	src="<?php echo assets_url('js/jquery.validate.min.js');?>"></script>
<script
	type="text/javascript"
	src="<?php echo assets_url('js/lightbox.password.min.js');?>"></script>
