<link href="<?php echo assets_url('styles/control_id.css');?>"
	media="screen" rel="stylesheet" type="text/css">
<div id="main_content">
	<div id="control_id">
		<?php echo $this->load->view('user/left', array('position' => 'admin_clients'));?>

		<div id="col_right_810">
			<?php echo form_open_multipart('them-moi-dich-vu', array('id' => 'frmAddClient', 'name' => 'frmAddClient')); ?>
					
			<div id="box_edit_avata" class="box_810">
				<div class="title_box">
					<span class="inline-block">&nbsp;</span>Thêm dịch vụ kết nối
				</div>
				<div class="content_box">
					<?php if(isset($success) && $success):?>
					<div class="inform-success">
						<div class="inform-success-main">Thêm dịch vụ thành công.</div>
					</div>
					<?php endif;?>
					<div class="main_edit_account">
						<ul class="list04">
							<li>
								<div class="form-main">
									<div class="label01 w120">Mã dịch vụ:</div>

									<div class="control01 w490">
										<div class="control01-main">
											<ul>
												<li><input type="text" class="w190" name="client_id"
													id="client_id"
													value="<?php echo set_value('client_id'); ?>" tabindex="33">
												</li>
											</ul>
											<div class="clr"></div>
										</div>

										<div class="message-error"><?php echo form_error('client_id'); ?></div>
									</div>
									<div class="clr"></div>
								</div>
							</li>
							<li>
								<div class="form-main">
									<div class="label01 w120">Mã bí mật:</div>

									<div class="control01 w490">
										<div class="control01-main">
											<ul>
												<li><input type="text" class="w190" name="client_secret" id="client_secret"
													value="<?php echo set_value('client_secret'); ?>" tabindex="33"></li>
											</ul>
											<div class="clr"></div>
										</div>

										<div class="message-error"><?php echo form_error('client_secret'); ?></div>
									</div>
									<div class="clr"></div>
								</div>
							</li>
							<li>
								<div class="form-main">
									<div class="label01 w120">Tên dịch vụ:</div>

									<div class="control01 w490">
										<div class="control01-main">
											<ul>
												<li><input type="text" class="w190" name="name" id="name"
													value="<?php echo set_value('name'); ?>" tabindex="33"></li>
											</ul>
											<div class="clr"></div>
										</div>

										<div class="message-error"><?php echo form_error('name'); ?></div>
									</div>
									<div class="clr"></div>
								</div>
							</li>
							
							<li>
								<div class="form-main">
									<div class="label01 w120">Đường dẫn:</div>

									<div class="control01 w490">
										<div class="control01-main">
											<ul>
												<li><input type="text" class="w190" name="redirect_uri" id="redirect_uri"
													value="<?php echo set_value('redirect_uri','http://'); ?>" tabindex="33"></li>
											</ul>
											<div class="clr"></div>
										</div>

										<div class="message-error"><?php echo form_error('redirect_uri'); ?></div>
									</div>
									<div class="clr"></div>
								</div>
							</li>
							<li>
								<div class="form-main">
									<div class="label01 w120">Logo dịch vụ:</div>

									<div class="control01 w490">
										<div class="control01-main">
											<ul>
												<li><input type="file" name="logo" size="20" /><br/>
												<div class="txt_gray">Dung lượng file logo tối đa là 1MB, kích thước 50x50 pixel<br/>Hỗ trợ các định dạng sau: jpg, png, gif</div></li>
											</ul>
											<div class="clr"></div>
										</div>

										<div class="message-error"><?php echo form_error('logo'); ?><?php if(isset($errorupload)) echo $errorupload;?></div>
									</div>
									<div class="clr"></div>
								</div>
							</li>
							<li>
								<div class="form-main">
									<div class="label01 w120">Chú thích:</div>

									<div class="control01 w490">
										<div class="control01-main">
											<ul>
												<li><input type="text" class="w190" name="description"
													id="description"
													value="<?php echo set_value('description'); ?>"
													tabindex="33"></li>
											</ul>
											<div class="clr"></div>
										</div>

										<div class="message-error"><?php echo form_error('description'); ?></div>
									</div>
									<div class="clr"></div>
								</div>
							</li>
							<li>
								<div class="form-main">
									<div class="label01 w120">
										<strong>Trạng thái:</strong>
									</div>
									<div class="control01 w490">
										<div class="control01-main">
											<ul>
												<li><input type="radio" name="status" value="1"
													<?php echo set_radio('status', '1', TRUE); ?> /> Mở <input
													type="radio" name="status" value="0"
													<?php echo set_radio('status', '0'); ?> /> Đóng</li>
											</ul>
											<div class="clr"></div>
										</div>
										<div class="message-error" id="error_gender">
										<?php echo form_error('status'); ?>
										</div>
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
													value="Lưu lại" class="btn_blue_04_right" tabindex="39">
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
