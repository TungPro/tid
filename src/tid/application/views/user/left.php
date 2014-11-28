   <div id="col_left_170">
        <div id="pagalet-mystatus">
    
    
    <a href="<?php echo base_url('/thong-tin-tai-khoan');?>">
        <img id="avatar50" height="50" width="50" src="<?php echo (isset($session['user']['avatar']) && $session['user']['avatar'] != "") ?  assets_url('/avatars/'.$session['user']['avatar']) : assets_url('images/graphics/avatar_50x50.jpg');?>" alt="" title="">
    </a>
    
    <p>
        <span class="item-profile item-profile-name">
            <i></i><?php echo $session['user']['firstname']?></span>
        <span class="item-profile item-profile-gt">
            <i></i><?php echo ($session['user']['gender'] == 1)? "Nam" : "Nữ";?></span>
        <span class="item-profile item-profile-birth">
            <i></i><?php echo date("d-m-Y",strtotime($session['user']['birthday']))?></span>
	
	</p>
    
    <div class="clear"></div>

</div>

<div class="section02">
  <span class="information-acc">
        <a href="<?php echo base_url('/thong-tin-tai-khoan');?>" style="color: #999">Thông tin Tài khoản</a>
    </span> 
    <a href="<?php echo base_url('/cap-nhat-thong-tin');?>" class="item-information <?php if(isset($position) && $position == 'info'):?>info-active<?php endif;?>">
        <i></i>Cập nhật thông tin
    </a>
    <a href="<?php echo base_url('/cap-nhat-avatar');?>" class="item-information <?php if(isset($position) && $position == 'avatar'):?>info-active<?php endif;?>">
        <i></i>Cập nhật avatar
    </a>
	<a href="<?php echo base_url('/cap-nhat-mat-khau');?>" class="item-information <?php if(isset($position) && $position == 'password'):?>info-active<?php endif;?>">
        <i></i>Thay đổi mật khẩu
    </a>
	<a href="<?php echo base_url('/quan-ly-ket-noi');?>" class="item-information <?php if(isset($position) && $position == 'connect'):?>info-active<?php endif;?>">
        <i></i>Quản lý kết nối
    </a>
    <a href="<?php echo base_url('/thoat');?>" class="item-information" onclick="return confirm('Bạn có chắc là muốn thoát?');">
        <i></i><b>Thoát</b>
    </a>
    
    <?php if($session['user']['isadmin']):?>
    	 <span class="information-acc">
	        <a href="javascript:void(0);" style="color: #999">Quản trị hệ thống</a>
	    </span> 
	    <a href="<?php echo base_url('/quan-ly-dich-vu');?>" class="item-information <?php if(isset($position) && $position == 'admin_clients'):?>info-active<?php endif;?>">
	        <i></i>Quản lý dịch vụ kết nối
	    </a>
	    <a href="<?php echo base_url('/quan-ly-thanh-vien');?>" class="item-information <?php if(isset($position) && $position == 'admin_users'):?>info-active<?php endif;?>">
	        <i></i>Quản lý thành viên
	    </a>
	    
    <?php endif;?>
</div>    
    </div>