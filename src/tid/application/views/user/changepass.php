<link href="<?php echo assets_url('styles/control_id.css');?>"
	media="screen" rel="stylesheet" type="text/css">
<div id="main_content">
	<div id="control_id">
		<?php echo $this->load->view('user/left', array('position' => 'password'));?>

		<div id="col_right_810">

			<div id="box_edit_avata" class="box_810">
				<div class="title_box">
					<span class="inline-block">&nbsp;</span>Thay đổi mật khẩu
				</div>
				<div class="content_box">
				<?php if(isset($success) && $success):?>
					<div class="inform-success"><div class="inform-success-main">Cập nhật thông tin thành công.</div></div>
					<?php endif;?>
					<div class="main_change_password">
				<?php echo form_open('cap-nhat-mat-khau', array('id' => 'frmChangePass', 'name' => 'frmChangePass','autocomplete' => 'off')); ?>
					
                <ul class="list04">
                    <li>
                        <div class="form-main">
                            <div class="label01 w140">Email:</div>

                            <div class="control01 w470">
                                <div class="control01-main">
                                    <ul>
                                        <li>
                                            <input type="text" class="w190" disabled="disabled" value="<?php echo $session['user']['email'];?>">
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
                            <div class="label01 w140">Mật khẩu hiện tại:</div>
                            <div class="control01 w470">

                                <div class="control01-main">
                                    <ul>
                                        <li>
                                            <input type="password" name="password" id="password" class="w190"></li>
                                    </ul>
                                    <div class="clr"></div>
                                </div>
                                <div class="message-error"><?php echo form_error('password'); ?></div>
                            </div>
                            <div class="clr"></div>
                        </div>
                    </li>
                    <li>
                        <div class="form-main">
                            <div class="label01 w140">Mật khẩu mới:</div>

                            <div class="control01 w470">
                                <div class="control01-main">
                                    <ul>
                                        <li>
                                            <input type="password" name="newpassword" id="newpassword" class="w190">
                                        </li>
                                    </ul>
                                    <div class="clr"></div>
                                </div>
                                <div class="message-error"><?php echo form_error('newpassword'); ?></div>
                            </div>
                            <div class="clr"></div>
                        </div>
                    </li>

                    <li>
                        <div class="form-main">
                            <div class="label01 w140">Nhập lại mật khẩu mới:</div>
                            <div class="control01 w470">
                                <div class="control01-main">
                                    <ul>
                                        <li>
                                            <input type="password" name="confirmnewpassword" id="confirmnewpassword" class="w190">

                                        </li>
                                    </ul>
                                    <div class="clr"></div>
                                </div>
                                <div class="message-error"><?php echo form_error('confirmnewpassword'); ?></div>
                            </div>
                            <div class="clr"></div>
                        </div>

                    </li>
                    <li class="frm-button">
                        <div class="form-main">
                            <div class="label01 w140">&nbsp;</div>
                            <div class="control01 w470">
                                <ul class="list-button">
                                    <li><span class="btn_blue_04_left">
                                            <input type="submit" value="Lưu thay đổi" class="btn_blue_04_right" title="Lưu thay đổi mật khẩu">
                                        </span></li>

                                    <li><span class="btn_gray_02_left">
                                            <input type="reset" value="Hủy bỏ" onclick="location.href=''" class="btn_gray_02_right">
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
</div>
