<link href="<?php echo assets_url('styles/control_id.css');?>"
	media="screen" rel="stylesheet" type="text/css">
<div id="main_content">
	<div id="control_id">
		<?php echo $this->load->view('user/left', array('position' => 'avatar'));?>

		<div id="col_right_810">

			<div id="box_edit_avata" class="box_810">
				<div class="title_box">
					<span class="inline-block">&nbsp;</span>Cập nhật avatar
				</div>
				<div class="content_box">
					<?php if(isset($success) && $success):?>
					<div class="inform-success"><div class="inform-success-main">Cập nhật thông tin thành công.</div></div>
					<?php endif;?>
					<?php if(isset($errorupload)):?>
					<div class="inform-success"><div class="inform-success-main"><font color="red"><?php echo $errorupload;?></font></div></div>
					<?php endif;?>
					<div class="main_edit_avata">

						<div class="photo-section">
							<a href="<?php echo base_url('/thong-tin-tai-khoan');?>"> <img width="200"
								class="photo04" alt=" "
								src="<?php echo (isset($user['avatar']) && $user['avatar'] != "") ?  assets_url('/avatars/'.$user['avatar']) : assets_url('images/graphics/avatar_200x200.jpg');?>"
								id="avatar200">
							</a>

						</div>
						<div class="text-section">
							<div class="col1">
								<div class="title_edit">
									<span class="icon01 ico46 left">&nbsp;</span>Tải ảnh từ máy
									tính
								</div>

								<div class="col1-main">
									<p>Chấp nhận ảnh định dạng: *.jpg, *.jpeg, *.gif và *.png.</p>
									<p>Kích thước 200x200 pixel, dung lượng tối đa 10MB</p>
									<div class="register-form02">
										<?php echo form_open_multipart('/cap-nhat-avatar', array('id' => 'frmAvatar', 'name' => 'frmAvatar')); ?>
											<table cellspacing="0" cellpadding="0" border="0"
												width="100%">

												<tbody>
													<tr>
														<td><input type="file" name="avatar"
															class="general-02 w185"></td>

														<td>&nbsp;</td>
													</tr>
													<tr>
														<td><div class="btn_blue_03_left">
																<input type="submit" class="btn_blue_03_right"
																	value="Tải ảnh" name="uploadedfile">
															</div></td>
														<td>&nbsp;</td>
													</tr>

												</tbody>
											</table>
										</form>
									</div>
								</div>
							</div>
							<div class="clear"></div>
						</div>

						<div class="clear"></div>
					</div>
				</div>
			</div>



		</div>

	</div>
</div>
