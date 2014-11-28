<link href="<?php echo assets_url('styles/control_id.css');?>"
	media="screen" rel="stylesheet" type="text/css">
<div id="main_content">
	<div id="control_id">
		<?php echo $this->load->view('user/left', array('position' => 'info'));?>

		<div id="col_right_810">
			<?php echo form_open('cap-nhat-thong-tin', array('id' => 'frmUpdateInfo', 'name' => 'frmUpdateInfo')); ?>
					
			<div id="box_edit_avata" class="box_810">
				<div class="title_box">
					<span class="inline-block">&nbsp;</span>Cập nhật thông tin tài khoản
				</div>
				<div class="content_box">
					<?php if(isset($success) && $success):?>
					<div class="inform-success"><div class="inform-success-main">Cập nhật thông tin thành công.</div></div>
					<?php endif;?>
					<div class="main_edit_account">
							<ul class="list04">
								<li>
									<div class="form-main">
										<div class="label01 w120">Email:</div>

										<div class="control01 w490">
											<div class="control01-main">
												<ul>
													<li><input type="text" class="w190" readonly="readonly" email" id="email" value="<?php echo $user->email;?>"
														tabindex="33" style="background-color: #eee">
													</li>
												</ul>
												<div class="clr"></div>
											</div>

											<div class="message-error"></div>
										</div>
										<div class="clr"></div>
									</div>
								</li>

								<li>
									<div class="form-main">
										<div class="label01 w120">Họ và tên :</div>
										<div class="control01 w490">
											<div class="control01-main">
												<ul>

													<li><input type="text" maxlength="50" name="lastname"
														id="lastname" value="<?php echo set_value('lastname',$user->lastname); ?>"
														class="w119 Tooltip" tabindex="31">
													</li>
													<li><input type="text" maxlength="50" name="firstname"
														id="firstname" value="<?php echo set_value('firstname',$user->firstname); ?>"
														class="w53 Tooltip" tabindex="32">
													</li>
												</ul>
												<div class="clr"></div>
											</div>

											<div class="message-error"><?php echo form_error('lastname'); ?><?php echo form_error('firstname'); ?></div>
										</div>
										<div class="clr"></div>
									</div>
								</li>

								<li>
									<div class="form-main">
										<div class="label01 w120">Ngày sinh:</div>

										<div class="control01 w490">
											<div class="control01-main">
												<ul>
													<li><select name="day" id="day" class="w60" tabindex="16">
															<option value=""
															<?php echo set_select('day', '');?>>Ngày</option>
															<?php  for($i=1;$i<=31;$i++){
																echo '<option value="'.$i.'" '.set_select('day', $i, $i ==date("d",strtotime($user->birthday))).'>'.$i.'</option>';
														 }?>
													</select></li>

													<li><select name="month" id="month" class="w68"
														tabindex="17">
															<option value=""
															<?php echo set_select('month', '');?>>Tháng</option>
															<?php  for($i=1;$i<=12;$i++){
																echo '<option value="'.$i.'" '.set_select('month', $i,$i ==date("m",strtotime($user->birthday))).'>'.$i.'</option>';
														 }?>
													</select></li>

													<li><select name="year" id="year" class="w60" tabindex="18">
															<option value=""
															<?php echo set_select('year', '');?>>Năm</option>
															<?php 
															$start_year = date("Y",mktime(0,0,0,date("m"),date("d"),date("Y")-100));
															for ($i=date("Y");$i>=$start_year;--$i) {
															echo '<option value="'.$i.'" '.set_select('year', $i,$i ==date("Y",strtotime($user->birthday))).'>'.$i.'</option>';
														}
														?>

													</select></li>

												</ul>
												<div class="clr"></div>
											</div>
											<div class="message-error"><?php echo form_error('day'); ?><?php echo form_error('month'); ?><?php echo form_error('year'); ?></div>
										</div>
										<div class="clr"></div>
									</div>

								</li>
								<li>
									<div class="form-main">
										<div class="label01 w120">Giới tính:</div>
										<div class="control01 w490">
											<div class="control01-main">
												<ul>
													<li><select name="gender" id="gender" class="w90"
														tabindex="38">
															<option value="" <?php echo set_select('gender', '');?>>Chọn</option>
															<option value="1"
															<?php echo set_select('gender', 1, $user->gender == 1);?>>Nam</option>
															<option value="0"
															<?php echo set_select('gender', 0,  $user->gender == 0);?>>Nữ</option>
													</select>
													</li>
												</ul>

												<div class="clr"></div>
											</div>
											<div class="message-error"><?php echo form_error('gender'); ?></div>
										</div>
										<div class="clr"></div>
									</div>
								</li>


								<li>
									<div class="form-main">
										<div class="label01 w120">Địa chỉ:</div>

										<div class="control01 w490">
											<div class="control01-main">
												<ul>
													<li><input type="text" class="w190" name="address"
														id="address" value="<?php echo set_value('address',$user->address); ?>" tabindex="33">
													</li>
												</ul>
												<div class="clr"></div>
											</div>

											<div class="message-error"></div>
										</div>
										<div class="clr"></div>
									</div>
								</li>
								<li>
									<div class="form-main">
										<div class="label01 w120">Điện thoại:</div>

										<div class="control01 w490">
											<div class="control01-main">
												<ul>
													<li><input type="text" class="w190" name="phone" id="phone"
														value="<?php echo set_value('phone',$user->phone); ?>" tabindex="33">
													</li>
												</ul>
												<div class="clr"></div>
											</div>

											<div class="message-error"><?php echo form_error('phone'); ?></div>
										</div>
										<div class="clr"></div>
									</div>
								</li>
								<li>
									<div class="form-main">
										<div class="label01 w120">Số CMND:</div>

										<div class="control01 w490">
											<div class="control01-main">
												<ul>
													<li><input type="text" class="w190" name="cmnd" id="cmnd"
														value="<?php echo set_value('cmnd',$user->cmnd); ?>" tabindex="33">
													</li>
												</ul>
												<div class="clr"></div>
											</div>

											<div class="message-error"><?php echo form_error('cmnd'); ?></div>
										</div>
										<div class="clr"></div>
									</div>
								</li>
								<li class="frm-button">

									<div class="form-main">
										<div class="label01 w120">&nbsp;</div>
										<div class="control01 w490">
											<ul class="list-button">
												<li><span class="btn_blue_04_left"> <input type="submit"
														value="Lưu thay đổi" class="btn_blue_04_right"
														tabindex="39">
												</span></li>
												<li><span class="btn_gray_02_left"> <input type="reset"
														class="btn_gray_02_right" value="Hủy bỏ">

												</span></li>
											</ul>
										</div>
										<div class="clr"></div>
									</div>
								</li>
							</ul>
						</form>
						<div class="clear"></div>

					</div>
				</div>
			</div>



		</div>

	</div>
</div>
