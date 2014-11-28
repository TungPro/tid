<form method="post" action="">
   <div class="mc borApad">
        <div class="bor">
            <div class="pageInfo">
                <div class="mbt logo">
                    <a href="">
                        <img src="<?php echo assets_url('clients/'.$client['logo_url']);?>" width="50" height="50" class="fl pagePic" />
                        <span class="pageTitle"><?php echo $client['name'];?></span> </a>
                        <?php echo $client['description'];?>
                    <div class="clr">
                    </div>
                </div>
                <div class="requestList">
                    <ul class="fl ul">
                        <li class="btitle">muốn truy cập một số thông tin của bạn:</li>
                       	<li>Thông tin cá nhân</li>
                    </ul>
                    <div class="fr">
                        <div class="lock">
                            <div class="ico">
                            </div>
                            <div class="txt">T-ID<br/>Cổng tài khoản dịch vụ trực tuyến</div>
                        </div>
                    </div>
                    <div class="clr">
                    </div>
                </div>
            </div>
        </div>
        <div class="loginBtn">
        	<input type="hidden" name="approve" value="false" />
            <span class="fr uiBtn" style="width: 50px">
                <input type="submit" name="submit" value="Không" onclick="document.getElementsByName('approve')[0].value = 'false'; return true;" />
            </span>
            <span class="fr uiBtn confirm" style="width: 60px; margin-right: 5px">
                <input type="submit" name="submit"  value="Đồng ý" onclick="document.getElementsByName('approve')[0].value = 'true'; return true;"/>
            </span>
            <div class="clr">
            </div>
        </div>
    </div>
    </form>