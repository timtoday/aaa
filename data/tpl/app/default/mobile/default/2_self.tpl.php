<?php defined('IN_IA') or exit('Access Denied');?><!-- 
 * 个人中心
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
<link href="<?php echo MODULE_URL;?>template/mobile/<?php  echo $template;?>/style/cssv2/self.css?v=<?php  echo $versions;?>" rel="stylesheet" />

<div class="mine_head" style="background-image:url(<?php  echo $ucenter_bg;?>);">
	<?php  if(in_array('setting',$self_item)) { ?>
	<a class="aui-member-setting" href="<?php  echo url('mc/profile')?>">
		<img src="<?php echo MODULE_URL;?>template/mobile/<?php  echo $template;?>/images/self-icon-setting.png?v=2">
	</a>
	<?php  } ?>
	<div class="mine_head_body">
		<div class="tx">
			<img src="<?php  echo $avatar;?>" id="btn-avatar" alt="会员头像" />
		</div>
		<div class="nickname"><?php echo $memberinfo['nickname'] ? $memberinfo['nickname'] : '未设置';?></div>
		<div class="idno"><?php echo $common['self_page']['studentno'] ? $common['self_page']['studentno'] : '学号';?>：<?php  echo $memberid;?></div>
	</div>
	<?php  if(in_array('signin',$self_item)) { ?>
	<div class="signin-button">
		<a href="<?php  echo $this->createMobileUrl('signin');?>"><i class="icon icon-pic"></i><?php echo $signin_log ? '已签到' : '签到';?></a>
	</div>
	<?php  } ?>
</div>

<?php  if(in_array('credit',$self_item)) { ?>
<div class="mine_info_grid flex0 ios-system">
	<a href="<?php  echo $this->createMobileUrl('credit', array('type'=>1))?>" id="go-credit1" class="mine_info flex-al1">
		<div class="num"><?php  echo $memberinfo['credit1'];?></div>
		<span><?php echo $common['self_page']['credit1'] ? $common['self_page']['credit1'] : '会员积分';?></span>
	</a>
	<a href="<?php  echo $this->createMobileUrl('credit', array('type'=>2))?>" id="go-credit2" class="mine_info flex-al1">
		<div class="num"><?php  echo $memberinfo['credit2'];?></div>
		<span><?php echo $common['self_page']['credit2'] ? $common['self_page']['credit2'] : '会员余额';?></span>
	</a>
	<?php  if(in_array('coupon',$self_item)) { ?>
	<a href="<?php  echo $this->createMobileUrl('coupon');?>" class="mine_info flex-al1">
		<div class="num"><?php  echo $coupon_count;?></div>
		<span><?php echo $common['self_page']['coupon'] ? $common['self_page']['coupon'] : '优惠券';?></span>
	</a>
	<?php  } ?>
</div>
<?php  } ?>

<?php  if(in_array('all_order',$self_item)) { ?>
<div class="mine_unit">
	<a href="<?php  echo $this->createMobileUrl('mylesson');?>" class="line-grid icon_right flex1" style="border-bottom: 1px solid #e4e5ea;">
		<div class="boldtext flex-al1">全部订单</div>
		<div class="more">查看全部订单</div>
	</a>
</div>
<div class="mine_menu_grid li4 ios-system">
	<a href="<?php  echo $this->createMobileUrl('mylesson',array('status'=>'nopay'))?>" class="mine_menu">
		<div class="img">
			<img src="<?php echo MODULE_URL;?>template/mobile/<?php  echo $template;?>/images/self-icon-nopay.png" />
		</div>
		<div>待付款</div>
	</a>
	<a href="<?php  echo $this->createMobileUrl('mylesson',array('status'=>'payed'))?>" class="mine_menu">
		<div class="img">
			<img src="<?php echo MODULE_URL;?>template/mobile/<?php  echo $template;?>/images/self-icon-pay.png" />
		</div>
		<div>已付款</div>
	</a>
		<a href="<?php  echo $this->createMobileUrl('mylesson',array('status'=>'allow_verify'))?>" class="mine_menu">
			<div class="img">
			<img src="<?php echo MODULE_URL;?>template/mobile/<?php  echo $template;?>/images/self-icon-noverify.png" />
		</div>
		<div>可核销</div>
	</a>
	<a href="<?php  echo $this->createMobileUrl('mylesson',array('status'=>'no_evaluate'))?>" class="mine_menu">
		<div class="img">
			<img src="<?php echo MODULE_URL;?>template/mobile/<?php  echo $template;?>/images/self-icon-evaluate.png" />
		</div>
		<div>待评价</div>
	</a>
</div>
<?php  } ?>

<div class="mine_unit">
	<a class="line-grid flex1" href="javascript:;" id="subscribe-btn">
		<div class="img flex0">
			<img class="flex_g0" src="<?php echo MODULE_URL;?>template/mobile/<?php  echo $template;?>/images/self-icon-subscribe.png?v=8" style="width: 16px;" />
		</div>
		<div class="flex-al1">订阅消息</div>
		<i class="fa <?php echo $is_subscribe ? 'fa-toggle-on' : 'fa-toggle-off'?>" id="subscribe-status" data-subscribe="<?php  echo $is_subscribe;?>"></i>
	</a>
	<?php  if($memberVipCount || in_array('vip',$self_item)) { ?>
	<a href="<?php  echo $this->createMobileUrl('vip');?>" class="line-grid icon_right flex1">
		<div class="img flex0">
			<img class="flex_g0" src="<?php echo MODULE_URL;?>template/mobile/<?php  echo $template;?>/images/self-icon-vip-service.png?v=8" style="width: 16px;" />
		</div>
		<div class="flex-al1"><?php echo $common['self_page']['vip'] ? $common['self_page']['vip'] : 'VIP服务';?></div>
	</a>
	<?php  } ?>
	<?php  if(in_array('myteacher',$self_item)) { ?>
	<a href="<?php  echo $this->createMobileUrl('myteacher');?>" class="line-grid icon_right flex1">
		<div class="img flex0">
			<img class="flex_g0" src="<?php echo MODULE_URL;?>template/mobile/<?php  echo $template;?>/images/self-icon-teacher-buy.png?v=8" style="width: 16px;" />
		</div>
		<div class="flex-al1"><?php echo $common['self_page']['myteacher'] ? $common['self_page']['myteacher'] : '讲师服务';?></div>
	</a>
	<?php  } ?>
	<?php  if(in_array('reclesson',$self_item)) { ?>
	<a href="<?php  echo $this->createMobileUrl('reclesson');?>" class="line-grid icon_right flex1">
		<div class="img flex0">
			<img class="flex_g0" src="<?php echo MODULE_URL;?>template/mobile/<?php  echo $template;?>/images/self-icon-lesson-invite.png?v=8" style="width: 16px;" />
		</div>
		<div class="flex-al1"><?php echo $common['self_page']['reclesson'] ? $common['self_page']['reclesson'] : '课程邀请';?></div>
	</a>
	<?php  } ?>
	<?php  if(in_array('history',$self_item)) { ?>
	<a href="<?php  echo $this->createMobileUrl('history');?>" class="line-grid icon_right flex1">
		<div class="img flex0">
			<img class="flex_g0" src="<?php echo MODULE_URL;?>template/mobile/<?php  echo $template;?>/images/self-icon-history.png?v=6" style="width: 16px;" />
		</div>
		<div class="flex-al1"><?php echo $common['self_page']['history'] ? $common['self_page']['history'] : '我的足迹';?></div>
	</a>
	<?php  } ?>
	<?php  if(in_array('lesson',$self_item)) { ?>
	<a href="<?php  echo $this->createMobileUrl('collect', array('ctype'=>1));?>" class="line-grid icon_right flex1">
		<div class="img flex0">
			<img class="flex_g0" src="<?php echo MODULE_URL;?>template/mobile/<?php  echo $template;?>/images/self-icon-collect-lesson.png?v=6" style="width: 16px;" />
		</div>
		<div class="flex-al1"><?php echo $common['self_page']['collectLesson'] ? $common['self_page']['collectLesson'] : '收藏课程';?></div>
	</a>
	<?php  } ?>
	<?php  if(in_array('teacher',$self_item)) { ?>
	<a href="<?php  echo $this->createMobileUrl('collect', array('ctype'=>2));?>" class="line-grid icon_right flex1">
		<div class="img flex0">
			<img class="flex_g0" src="<?php echo MODULE_URL;?>template/mobile/<?php  echo $template;?>/images/self-icon-collect-teacher.png?v=8" style="width: 16px;" />
		</div>
		<div class="flex-al1"><?php echo $common['self_page']['collectTeacher'] ? $common['self_page']['collectTeacher'] : '收藏讲师';?></div>
	</a>
	<?php  } ?>
</div>

<div class="mine_unit">
	<?php  if(in_array('teachercenter',$self_item) || !empty($teacher)) { ?>
	<a href="<?php  echo $this->createMobileUrl('teachercenter');?>" class="line-grid icon_right flex1">
		<div class="img flex0">
			<img class="flex_g0" src="<?php echo MODULE_URL;?>template/mobile/<?php  echo $template;?>/images/self-icon-collect-teachercenter.png?v=8" style="width: 16px;" />
		</div>
		<div class="flex-al1"><?php echo $common['self_page']['teacherCenter'] ? $common['self_page']['teacherCenter'] : '讲师中心';?></div>
	</a>
	<?php  } ?>
	<?php  if(in_array('sale',$self_item) || ($comsetting['is_sale']==1 && (($comsetting['sale_rank']==1) || ($comsetting['sale_rank']==2 && $memberVipCount)))) { ?>
	<a href="<?php  echo $this->createMobileUrl('commission');?>" class="line-grid icon_right flex1">
		<div class="img flex0">
			<img class="flex_g0" src="<?php echo MODULE_URL;?>template/mobile/<?php  echo $template;?>/images/self-icon-commission.png?v=6" style="width: 16px;" />
		</div>
		<div class="flex-al1"><?php echo $font['sale_center'] ? $font['sale_center']:'分销中心';?></div>
	</a>
	<?php  } ?>
	<?php  if(in_array('studyDuration',$self_item)) { ?>
	<a href="<?php  echo $this->createMobileUrl('studyduration');?>" class="line-grid icon_right flex1">
		<div class="img flex0">
			<img class="flex_g0" src="<?php echo MODULE_URL;?>template/mobile/<?php  echo $template;?>/images/self-icon-study-duration.png?v=8" style="width: 16px;" />
		</div>
		<div class="flex-al1"><?php echo $common['self_page']['studyDuration'] ? $common['self_page']['studyDuration'] : '学习时长';?></div>
	</a>
	<?php  } ?>
	<?php  if(in_array('coupon',$self_item)) { ?>
	<a href="<?php  echo $this->createMobileUrl('coupon');?>" class="line-grid icon_right flex1 ios-system">
		<div class="img flex0">
			<img class="flex_g0" src="<?php echo MODULE_URL;?>template/mobile/<?php  echo $template;?>/images/self-icon-coupon.png?v=6" style="width: 16px;" />
		</div>
		<div class="flex-al1"><?php echo $common['self_page']['coupon'] ? $common['self_page']['coupon'] : '优惠券';?></div>
	</a>
	<?php  } ?>
	<?php  if($company_teachers) { ?>
	<a href="<?php  echo $this->createMobileUrl('company');?>" class="line-grid icon_right flex1">
		<div class="img flex0">
			<img class="flex_g0" src="<?php echo MODULE_URL;?>template/mobile/<?php  echo $template;?>/images/self-icon-company.png?v=2" style="width: 16px;" />
		</div>
		<div class="flex-al1">机构中心</div>
	</a>
	<?php  } ?>
</div>

<div class="mine_unit">
	<?php  if(in_array('mobile',$self_item)) { ?>
	<a href="<?php  echo $this->createMobileUrl('writemsg', array('op'=>'modifyMobile'));?>" class="line-grid icon_right flex1">
		<div class="img flex0">
			<img class="flex_g0" src="<?php echo MODULE_URL;?>template/mobile/<?php  echo $template;?>/images/self-icon-modify-mobile.png?v=8" style="width: 16px;" />
		</div>
		<div class="flex-al1"><?php echo $memberinfo['mobile'] ? '修改':'绑定';?>手机</div>
	</a>
	<?php  } ?>
</div>

<?php  if(!empty($self_diy)) { ?>
<div class="mine_unit">
	<?php  if(is_array($self_diy)) { foreach($self_diy as $item) { ?>
	<a href="<?php  echo $item['diy_link'];?>" class="line-grid icon_right flex1">
		<div class="img flex0">
			<?php  if($item['diy_image']) { ?>
				<img src="<?php  echo $_W['attachurl'];?><?php  echo $item['diy_image'];?>" style="width: 16px;" />
			<?php  } else { ?>
				<img src="<?php echo MODULE_URL;?>template/mobile/<?php  echo $template;?>/images/self-icon-diy.png?v=5" style="width: 16px;" />
			<?php  } ?>
		</div>
		<div class="flex-al1"><?php  echo $item['diy_name'];?></div>
	</a>
	<?php  } } ?>
</div>
<?php  } ?>

<?php  if(!$agent) { ?>
<div class="logout">
	<a href="<?php  echo url('mc/home/login_out');?>">退出登录</a>
</div>
<?php  } ?>

<script type="text/javascript">
$("#btn-avatar").click(function(){
	var agent = <?php  echo intval($agent); ?>;
	if(!agent){
		return;
	}
	var sureUrl = "<?php  echo $this->createMobileUrl('self', array('updateInfo'=>1));?>";
	$(this).openWindow('系统提示','更新头像信息?','["取消","确定"]','javascript:;', sureUrl);
});

$("#subscribe-btn").click(function(){
	var subscribe = $("#subscribe-status").data("subscribe");
	var new_subscribe = subscribe ? 0 : 1;
	
	$.ajax({
		url: "<?php  echo $this->createMobileUrl('subscribemsg')?>",
		type: "POST",
		data:{
			subscribe: new_subscribe,
		},
		dataType: "json",
		success: function(res){
			if(res.code==0){
				$("#subscribe-status").data("subscribe", new_subscribe);
				if(new_subscribe){
					document.getElementById("subscribe-status").className = "fa fa-toggle-on";
				}else{
					document.getElementById("subscribe-status").className = "fa fa-toggle-off";
				}
			}
			$(this).openWindow('系统提示',res.msg,'["确定"]','javascript:;','javascript:;');
			return false;
		},
		error:function(err){
			$(this).openWindow('系统提示','网络请求出错，请稍候重试','["确定"]','javascript:;','javascript:;');
			console.log(err);
			return false;
		}
	});
});

document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
	var miniprogram_environment = false;
	wx.miniProgram.getEnv(function(res) {
		if(res.miniprogram) {
			miniprogram_environment = true;
		}
	})
	if(window.__wxjs_environment === 'miniprogram' || miniprogram_environment) {
		wx.miniProgram.postMessage({ 
			data: {
				'title': "<?php  echo $title;?>",
				'images': "<?php  echo $ucenter_bg;?>",
			}
		})
		$("#mc-profile").hide();
		$("#go-credit1").attr("href","javascript:;");
		$("#go-credit2").attr("href","javascript:;");
	}
});
</script>

<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template($template.'/_footerv2', TEMPLATE_INCLUDEPATH)) : (include template($template.'/_footerv2', TEMPLATE_INCLUDEPATH));?>