<link href="<?php echo assets_url('styles/control_id.css');?>"
	media="screen" rel="stylesheet" type="text/css">
<div id="main_content">
	<div id="control_id">
		<?php echo $this->load->view('user/left', array('position' => ''));?>

		<div id="col_right_810">

			<div id="box_edit_avata" class="box_810">
				<div class="title_box">
					<span class="inline-block">&nbsp;</span>Thông tin tài khoản
				</div>
				<div class="content_box">
					<div class="personal_content">
					
						<div class="avata">
							<a href=""> <img
								src="<?php echo (isset($user->avatar) && $user->avatar != "") ?  assets_url('/avatars/'.$user->avatar) : assets_url('images/graphics/avatar_200x200.jpg');?>"
								alt="" width="200">
							<div class="text-caption">
								<a href="<?php echo base_url('/cap-nhat-avatar');?>">Cập nhật
									ảnh đại diện</a>
							</div>
						</div>

						<ul class="list_info">


							<li>
								<div class="form-main">
									<div class="label02 w80">Email:</div>
									<div class="control01 w340"><?php echo $user->email?></div>

									<div class="clr"></div>
								</div>
							</li>
							<li>
								<div class="form-main">
									<div class="label02 w80">Họ và tên:</div>
									<div class="control01 w340"><?php echo $user->lastname . " ".$user->firstname?></div>

									<div class="clr"></div>
								</div>
							</li>
							<li>
								<div class="form-main">
									<div class="label02 w80">Giới tính:</div>
									<div class="control01 w340"><?php echo ($user->gender == 1)? "Nam" : "Nữ";?></div>
									<div class="clr"></div>

								</div>
							</li>
							<li>
								<div class="form-main">
									<div class="label02 w80">Ngày sinh:</div>
									<div class="control01 w340"><?php echo date("d-m-Y",strtotime($user->birthday))?></div>
									<div class="clr"></div>
								</div>
							<li>
								<div class="form-main">
									<div class="label02 w80">Số điện thoại:</div>
									<div class="control01 w340"><?php echo $user->phone?></div>
									<div class="clr"></div>
								</div>
							</li>
							<li>
								<div class="form-main">
									<div class="label02 w80">Địa chỉ:</div>
									<div class="control01 w340"><?php echo $user->address?></div>
									<div class="clr"></div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>



		</div>

	</div>
</div>
