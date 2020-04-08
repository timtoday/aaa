<?php defined('IN_IA') or exit('Access Denied');?><!-- 
 * 微课堂首页
 * ============================================================================
 * 版权所有 2015-2018 微课堂团队，并保留所有权利。
 * 网站地址: https://www.fylesson.com
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件，未购买授权用户无论是否用于商业行为都是侵权行为！
 * 允许已购买用户对程序代码进行修改并在授权域名下使用，但是不允许对程序代码以
 * 任何形式任何目的进行二次发售，作者将依法保留追究法律责任的权力和最终解释权。
 * ============================================================================
-->
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template($template.'/_headerv2', TEMPLATE_INCLUDEPATH)) : (include template($template.'/_headerv2', TEMPLATE_INCLUDEPATH));?>
<link href="<?php echo MODULE_URL;?>template/mobile/<?php  echo $template;?>/style/cssv2/swiper.fylesson.css?v=<?php  echo $versions;?>" rel="stylesheet" />
<script src="<?php echo MODULE_URL;?>template/mobile/<?php  echo $template;?>/style/jsv2/jquery.lazyload.js?v=<?php  echo $versions;?>"></script>

<?php  if($setting['isfollow']>0 && $fans['follow']==0 && $userAgent) { ?>
<div class="follow_topbar">
	<div class="headimg">
		<img src="<?php  echo $_W['attachurl'];?><?php  echo $setting['qrcode'];?>">
	</div>
	<div class="info">
		<div class="i"><?php  echo $_W['account']['name'];?></div>
		<div class="i"><?php  echo $setting['follow_word'];?></div>
	</div>
	<div class="sub">
		<a href="<?php  echo $this->createMobileUrl('follow');?>">立即查看</a>
	</div>
</div>
<div style='height:44px;'>&nbsp;</div>
<?php  } ?>

<!-- 新会员优惠券弹窗 -->
<?php  if($coupon_tip) { ?>
<div id="index-coupon-activity" class="index-coupon-popup">
	<div class="bg" style="background-image:url(<?php  echo $reg_coupon_image;?>);">
		<div class="close-button">
			<img src="<?php echo MODULE_URL;?>template/mobile/<?php  echo $template;?>/images/index-coupon-close.png">
		</div>
		<div class="coupon-div">
			<a href="<?php  echo $this->createMobileUrl('coupon');?>" class="get-coupon">立即查看</a>
		</div>
	</div>
</div>
<script type="text/javascript">
$(".close-button").on("click", function(){
	$("#index-coupon-activity").hide();
});
</script>
<?php  } ?>
<!-- /新会员优惠券弹窗 -->

<div>
	<?php  if($index_html=='index_default') { ?>
		<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template($template.'/index/index_search', TEMPLATE_INCLUDEPATH)) : (include template($template.'/index/index_search', TEMPLATE_INCLUDEPATH));?>
		<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template($template.'/index/index_banner', TEMPLATE_INCLUDEPATH)) : (include template($template.'/index/index_banner', TEMPLATE_INCLUDEPATH));?>
		<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template($template.'/index/index_category', TEMPLATE_INCLUDEPATH)) : (include template($template.'/index/index_category', TEMPLATE_INCLUDEPATH));?>
		<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template($template.'/index/index_article', TEMPLATE_INCLUDEPATH)) : (include template($template.'/index/index_article', TEMPLATE_INCLUDEPATH));?>
		<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template($template.'/index/index_discount', TEMPLATE_INCLUDEPATH)) : (include template($template.'/index/index_discount', TEMPLATE_INCLUDEPATH));?>
		<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template($template.'/index/index_teacher', TEMPLATE_INCLUDEPATH)) : (include template($template.'/index/index_teacher', TEMPLATE_INCLUDEPATH));?>
		<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template($template.'/index/index_newlesson', TEMPLATE_INCLUDEPATH)) : (include template($template.'/index/index_newlesson', TEMPLATE_INCLUDEPATH));?>
		<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template($template.'/index/index_recommend', TEMPLATE_INCLUDEPATH)) : (include template($template.'/index/index_recommend', TEMPLATE_INCLUDEPATH));?>
		<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template($template.'/index/index_slogan', TEMPLATE_INCLUDEPATH)) : (include template($template.'/index/index_slogan', TEMPLATE_INCLUDEPATH));?>
	<?php  } else { ?>
		<?php  if(is_array($index_html)) { foreach($index_html as $html) { ?>
			<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template($template.'/index/index_'.$html['module_ident'], TEMPLATE_INCLUDEPATH)) : (include template($template.'/index/index_'.$html['module_ident'], TEMPLATE_INCLUDEPATH));?>
		<?php  } } ?>
	<?php  } ?>
</div>

<?php  if(!empty($articlelist) && is_array($articlelist)) { ?>
<script type="text/javascript">
$(document).ready(function() {
    var index = 0;
    var autoTimer = 0;
    var clickEndFlag = true;
    var oInner = $(".article-inner");
    var oLi = $(".article-inner li");
    oLi.eq(0).clone(true).appendTo(oInner);
    var liHeight = $(".scroll-txt").height();

    function tab() {
        oInner.stop().animate({
            top: -index * liHeight
        },
        400,
        function() {
            clickEndFlag = true;
            if (index == oLi.length) {
                oInner.css({
                    top: 0
                });
                index = 0;
            }
        })
    }
    function next() {
        index++;
        tab();
    }
    function prev() {
        index--;
        if (index < 0) {
            index = oLi.size() - 1;
            oInner.css("top", -oLi.size() * liHeight);
        }
        tab();
    }
    autoTimer = setInterval(next, 5000);
    $(".article-inner a").hover(function() {
        clearInterval(autoTimer);
    },
    function() {
        autoTimer = setInterval(next, 5000);
    });

});
</script>
<?php  } ?>

<?php  if(($setting['modify_mobile']==2 && $uid>0 && empty($mc_member['mobile']))) { ?>
<!-- 绑定手机号码 -->
<div id="modify_mobile_shade" style="background-color:rgba(0,0,0,0.7); position:fixed; width:100%; height:100%; top:0; z-index:105;"></div>
<div class="login_wrap" id="modify_mobile_div" style="position:absolute; width:90%; height:100%; margin:0 5%; top:80px; z-index:106;">
	<form method="post" onsubmit="return checknum();">
		<div class="weui-cells weui-cells_form" style="border-radius:10px; padding-bottom:20px;">
			<h3 style="padding:15px 0; text-align:center; font-size:18px;">手机号码注册</h3>
			<?php  if(!in_array('verify_mobile', $index_verify)) { ?>
			<a href="javascript:;" onclick="closeBox();" style="width:20px;height:20px;color:#aaa;position:absolute;right:15px;top:17px;"><i class="fa fa-close fa-lg"></i></a>
			<?php  } ?>
			<div class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">手机号码</label></div>
                <div class="weui-cell__bd">
                    <input type="tel" class="weui-input" name="mobile" placeholder="请输入手机号码">
                </div>
            </div>
			<div class="weui-cell weui-cell_vcode">
                <div class="weui-cell__hd">
                    <label class="weui-label">验证码</label>
                </div>
                <div class="weui-cell__bd">
                    <input type="number" class="weui-input" name="verify_code" placeholder="请输入验证码">
                </div>
                <div class="weui-cell__ft">
                    <a href="javascript:;" class="weui-vcode-btn" id="weui_btn_send" onclick="sendcode()">获取验证码</a>
                </div>
            </div>
			<?php  if(in_array('password', $index_verify)) { ?>
			<div class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">登录密码</label></div>
                <div class="weui-cell__bd">
                    <input type="password" class="weui-input" name="pwd1" placeholder="设置登录密码">
                </div>
            </div>
			<div class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">重复密码</label></div>
                <div class="weui-cell__bd">
					<input type="password" class="weui-input" name="pwd2" placeholder="重复登录密码">
                </div>
            </div>
			<?php  } ?>
			<?php  if($setting['privacy_agreement']) { ?>
			<div class="weui-cells weui-cells_checkbox">
				<label class="weui-cell weui-cell_active weui-check__label" for="privacy_agreement">
					<div class="weui-cell__hd" style="padding-right:10px;">
						<input type="checkbox" class="weui-check" id="privacy_agreement" checked>
						<i class="weui-icon-checked privacy_agreement_checked"></i>
					</div>
					<div class="weui-cell__bd agreement_tips">
						<p>我已阅读并同意<a href="javascript:;" id="view_agreement">《用户服务(隐私)协议》</a></p>
					</div>
				</label>
			</div>
			<?php  } ?>
			<div class="weui-btn-area" style="margin-top: 16px;">
				<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
				<input type="submit" name="modify_mobile" class="weui-btn weui-btn_primary" value="提交">
			</div>
		</div>
	</form>
</div>

<div class="privacy_agreement_notice-mask" style="display:none;">
	<div class="privacy_agreement_notice">
		<div class="close">
			<img src="<?php echo MODULE_URL;?>template/mobile/default/images/btn-close.png?v=6" width="32" height="32">
		</div>
		<h3 class="notice-title">用户服务(隐私)协议</h3>
		<ul class="notice-body">
			<?php  echo htmlspecialchars_decode($setting['privacy_agreement'])?><p><br></p>
		</ul>
	</div>
</div>

<script type="text/javascript">
document.getElementById("modify_mobile_div").style.height = document.getElementById("page-container").offsetHeight + "px";

function checknum(){
	var mobile   = $("input[name=mobile]").val();
	var myreg = /^((1)+\d{10})$/;

	if(mobile==''){
		alert("请输入手机号码");
		return false;
	}else if(!myreg.test(mobile)) {
		alert('您输入的手机号码有误');
		return false;
	}

	<?php  if(in_array('password', $index_verify)){ ?>
	if($("input[name=verify_code]").val()==''){
		alert("请输入短信验证码");
		return false;
	}
	if($("input[name=pwd1]").val()==''){
		alert("请输入登录密码");
		return false;
	}
	if($("input[name=pwd1]").val() != $("input[name=pwd2]").val()){
		alert("两次密码不一致");
		return false;
	}
	<?php  } ?>

	<?php  if($setting['privacy_agreement']){ ?>
		if(!$("#privacy_agreement").is(':checked') ){
			alert("请阅读并同意协议");
			return false;
		}
	<?php  } ?>

	$("#loadingToast").show();
}

var countdown = 60;
function sendcode() {
	var result = checkMobile();
	if(!result){
		return;
	}
	if ($('#weui_btn_send').hasClass('has_send')) {
		return false;
	}

	var mobile = $('input[name="mobile"]').val();
	$.ajax({
		type:"post",
		dataType:"json",
		url: "<?php  echo $this->createMobileUrl('sendcode');?>",
		data: {mobile:mobile},
		success: function (data) {
			if(data.code==0){
				settime($("#weui_btn_send"));
			}else{
				alert(data.msg);
			}
		},
		error: function(e){
		}
	});
	
}
function settime(obj) { //发送验证码倒计时
	if(countdown == 0) {
		$('#weui_btn_send').removeClass('has_send').text('重新发送');
		countdown = 60;
		return;
	} else {
		$('#weui_btn_send').addClass('has_send').text('重新获取(' + countdown + ')');
		countdown--;
	}
	setTimeout(function() {
		settime(obj)
	}, 1000)
}
//校验手机号是否合法
function checkMobile() {
	var mobile = $('input[name="mobile"]').val();
	var myreg = /^((1)+\d{10})$/;
	if(!myreg.test(mobile)) {
		alert('请输入有效的手机号码');
		return false;
	} else {
		return true;
	}
}
function closeBox(){
	$("#modify_mobile_shade").hide();
	$("#modify_mobile_div").hide();
}

//查看用户隐私协议
$("#view_agreement").click(function(){
	$('.privacy_agreement_notice-mask').fadeIn(200).unbind('click').click(function(){
		$(this).fadeOut(100);
	})
});
</script>
<!-- /绑定手机号码 -->
<?php  } ?>

<div id="loadingToast" style="display:none;">
	<div class="weui-mask_transparent"></div>
	<div class="weui-toast">
		<i class="weui-loading weui-icon_toast"></i>
		<p class="weui-toast__content">加载数据中</p>
	</div>
</div>

<script type="text/javascript">
/* 搜索 */
$(".search-btn").click(function() {
	var keywords = $.trim($("input[name=keyword]").val());
    if (keywords == '') {
        searchUrl = "<?php  echo $this->createMobileUrl('search');?>";
    } else {
        searchUrl = searchUrl = "<?php  echo $this->createMobileUrl('search');?>&keyword=" + encodeURIComponent(keywords);
    }
    document.location.href = searchUrl;
    return false;
});

wx.ready(function(){
	var shareData = {
		title: "<?php  echo $sharelink['title'];?>",
		desc: "<?php  echo $sharelink['desc'];?>",
		link: "<?php  echo $shareurl;?>",
		imgUrl: "<?php  echo $_W['attachurl'];?><?php  echo $sharelink['images'];?>",
		trigger: function (res) {},
		complete: function (res) {},
		success: function (res) {},
		cancel: function (res) {},
		fail: function (res) {}
	};
	wx.onMenuShareTimeline(shareData);
	wx.onMenuShareAppMessage(shareData);
	wx.onMenuShareQQ(shareData);
	wx.onMenuShareWeibo(shareData);
	wx.onMenuShareQZone(shareData);
});

new Swiper('.item-list', {
	slidesPerView: 'auto',
	spaceBetween: 10,
})

</script>

<script>
	//动画效果
	var mySwiper = new Swiper('.swiper-container', {
		pagination: '.swiper-pagination',
		effect: 'coverflow',
		paginationClickable: true,
		centeredSlides: true,
		autoplay: 5000,
		autoplayDisableOnInteraction: false,
		preloadImages: false,
		lazyLoading: true
	});

	//图片延迟加载
	$(document).ready(function(){ 
		$("img.lazy").lazyload({
			effect:"fadeIn"
		});
	});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template($template.'/_footerv2', TEMPLATE_INCLUDEPATH)) : (include template($template.'/_footerv2', TEMPLATE_INCLUDEPATH));?>