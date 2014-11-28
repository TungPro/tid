<link href="<?php echo assets_url('styles/control_id.css');?>"
	media="screen" rel="stylesheet" type="text/css">
<div id="main_content">
	<div id="control_id">
		<?php echo $this->load->view('user/left', array('position' => 'connect'));?>

		<div id="col_right_810">

			<div id="box_setting_notify" class="box_810">
				<div class="title_box">
					<span class="inline-block">&nbsp;</span>Quản lý kết nối
				</div>
				<div class="content_box">

					<div class="notify_content">
						<input type="hidden" value="" name="url_referer">
						<ul class="notify_02">
							<?php if(isset($listclients)):?>
							<li class="first"></li>
							<?php foreach($listclients as $client):?>
							<li id="client-<?php echo $client['client_id'];?>">
								<div class="div-col-01">
									<div class="col01">
										<a href=""> <img
											src="<?php echo assets_url('clients/'.$client['logo_url']);?>"
											width="50" height="50"
											style="float: left; margin-right: 10px;"> <span
											style="display: block; font-weight: bold; font-size: 13px; padding-top: 5px;"><?php echo $client['name'];?>
										</span>
										</a>
										<div class="txt_12"><?php echo $client['description'];?> </div>
									</div>
									<div class="col02" id="sendso">
										<span class="btn_green_01_left"> <input type="button"
											value="Gỡ bỏ" class="btn_green_01_right removeclient"
											client="<?php echo $client['client_id'];?>">
										</span>
									</div>

								</div>
							</li>
							<?php endforeach; else:?>
							<div class="txt_gray">Hiện tại bạn chưa có dịch vụ nào được kết
								nối.</div>
							<?php endif;?>
						</ul>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
<script type="text/javascript">
$(function (a) {
	$("input.removeclient" ).live( "click", function() {
		  var remove = true;
		  var clientid = $(this).attr('client');

		  $.ajax({
			  type: "POST",
			  url: "<?php echo base_url('client/remove');?>",
			  data: { client_id: clientid},
			  dataType: 'json',
			  success: function($response){ 
				 if($response.error == 0){
					 $("li#client-"+clientid).hide();
				 }else{
					 alert( "Không thể gỡ bỏ kết nối này. Vui lòng thử lại.");
				 }
			  }
			});
	});
});

</script>
