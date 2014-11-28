<link href="<?php echo assets_url('styles/control_id.css');?>"
	media="screen" rel="stylesheet" type="text/css">
<link href="<?php echo assets_url('styles/tables.css');?>"
	media="screen" rel="stylesheet" type="text/css">
<div id="main_content">
	<div id="control_id">
		<?php echo $this->load->view('/user/left', array('position' => 'admin_clients'));?>

		<div id="col_right_810">

			<div id="box_edit_avata" class="box_810">
				<div class="title_box">
					<span class="inline-block">&nbsp;</span>Danh sách dịch vụ kết nối
				</div>
				<div class="content_box">
					<div class="main_edit_account">
					<?php if(!isset($clients)):?>
						<div class="txt_gray">Hiện tại chưa có dịch vụ nào được kết nối.</div>
					<?php else:?>
					<ul class="list-button">
							<li><span class="btn_blue_04_left"> <input type="submit"
									value="Thêm mới" class="btn_blue_04_right" tabindex="39" onclick="javascript:location.href='<?php echo base_url('/them-moi-dich-vu');?>';">
							</span></li>
						</ul>
						<br/><br/>
						<table class="gridtable" width="100%">
							<tbody>
								<tr>
									<th width="15%">Mã dịch vụ</th>
									<th width="8%">Logo</th>
									<th width="25%">Tên dịch vụ</th>
									<th width="25%">Đường dẫn</th>
									<th width="13%">Trạng thái</th>
									<th width="15%"></th>
								</tr>
								
								<?php foreach($clients as $client):?>
								<tr>
									<td align="left"><?php echo $client['client_id'];?></td>
									<td align="left"><img src="<?php echo assets_url('/clients/'.$client['logo_url']);?>"></td>
									<td align="left"><?php echo $client['name'];?></td>
									<td align="left"><?php echo $client['redirect_uri'];?></td>
									<td align="center"><?php if($client['status'] == "1"):?><font color="green">Đang mở</font><?php else:?><font color="red">Đang đóng</font><?php endif;?></td>
									<td align="center"><?php if($client['status'] == "1"):?><a href="<?php echo base_url('/admin/lockclient/'.$client['client_id']);?>">Đóng </a><?php else:?><a href="<?php echo base_url('/admin/unlockclient/'.$client['client_id']);?>">Mở</a><?php endif;?> <a
										href="<?php echo base_url('/admin/editclient/'.$client['client_id']);?>">Sửa</a> <a href="<?php echo base_url('/admin/deleteclient/'.$client['client_id']);?>" onclick="return confirm('Bạn có chắc là muốn xoá?');">Xóa</a>
									</td>
								</tr>
								<?php endforeach;?>
								
							</tbody>

						</table>
						<div class="clear"></div>
					<?php endif;?>
					</div>
				</div>
			</div>



		</div>

	</div>
</div>
