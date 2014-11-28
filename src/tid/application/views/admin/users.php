<link href="<?php echo assets_url('styles/control_id.css');?>"
	media="screen" rel="stylesheet" type="text/css">
<link href="<?php echo assets_url('styles/tables.css');?>"
	media="screen" rel="stylesheet" type="text/css">
<div id="main_content">
	<div id="control_id">
		<?php echo $this->load->view('/user/left', array('position' => 'admin_users'));?>

		<div id="col_right_810">

			<div id="box_edit_avata" class="box_810">
				<div class="title_box">
					<span class="inline-block">&nbsp;</span>Danh sách tài khoản
				</div>
				<div class="content_box">
					<div class="main_edit_account">
					<?php if(!isset($users)):?>
						<div class="txt_gray">Hiện tại chưa có tài khoản nào.</div>
					<?php else:?>
					<!-- 
					<ul class="list-button">
							<li><span class="btn_blue_04_left"> <input type="submit"
									value="Thêm mới" class="btn_blue_04_right" tabindex="39" onclick="javascript:location.href='<?php echo base_url('/them-moi-dich-vu');?>';">
							</span></li>
						</ul>
						<br/><br/> -->
						<table class="gridtable" width="100%">
							<tbody>
								<tr>
									<th width="15%">User ID</th>
									<th width="15%">Avatar</th>
									<th width="8%">Email</th>
									<th width="25%">Tên</th>
									<th width="25%">Ngày sinh</th>
									<th width="13%">Giới tính</th>
								</tr>
								<?php foreach($users as $userdata):?>
								<tr>
									<td align="left"><?php echo $userdata->id;?></td>
									<td align="left"><img src="<?php echo (isset($userdata->avatar) && $userdata->avatar != "") ?  assets_url('/avatars/'.$userdata->avatar) : assets_url('images/graphics/avatar_50x50.jpg');?>"></td>
									<td align="left"><?php echo $userdata->email;?></td>
									<td align="left"><?php echo $userdata->lastname. " ". $userdata->firstname;?></td>
									<td align="center"><?php echo date("d-m-Y",strtotime($userdata->birthday))?></td>
									<td align="center"><?php if($userdata->gender == "1"):?>Nam<?php else:?>Nữ<?php endif;?> </td>
								</tr>
								<?php endforeach;?>
								
							</tbody>

						</table>
						<?php echo $links?>
						<div class="clear"></div>
					<?php endif;?>
					</div>
				</div>
			</div>



		</div>

	</div>
</div>
