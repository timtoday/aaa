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
<link href="<?php echo MODULE_URL;?>template/mobile/<?php  echo $template;?>/style/cssv2/vip.css?v=<?php  echo $versions;?>" rel="stylesheet" />

<div class="header-2 cbox">
	<a href="javascript:history.go(-1);" class="ico go-back"></a>
	<div class="flex title"><?php  echo $title;?></div>
</div>

<div id="loadingToast" style="display: none;">
	<div class="weui-mask_transparent"></div>
	<div class="weui-toast">
		<i class="weui-loading weui-icon_toast"></i>
		<p class="weui-toast__content">加载数据中</p>
	</div>
</div>

<?php  if($op=='display') { ?>
<link href="<?php echo MODULE_URL;?>template/mobile/<?php  echo $template;?>/style/cssv2/qunService.css?v=<?php  echo $versions;?>" rel="stylesheet" />
<div>
	<div class="myvip-bg cbox disabled">
		<div class="vip-back"><img src="<?php  echo $vip_bg;?>"></div>
	</div>
	<div class="vip-menu mb_10">
		<ul class="am-avg-sm-5 vip-title-table">
			<li class="w-col-5 active">我的VIP</li>
			<li class="w-col-5">订单记录</li>
			<li class="w-col-5">VIP服务卡</li>
			<div class="clear"></div>
		</ul>
	</div>
	
	<!-- 我的VIP -->
	<div class="content-tab my-vip-info">
		<!-- VIP状态 -->
		<div class="vip-prompt">
			<?php  if(!empty($memberVip_list)) { ?>
			<span class="green">我的VIP:已开通</span>
			<?php  } else { ?>
			<span class="red">您还不是VIP会员</span>
			<?php  } ?>
		</div>
		<!-- 已开通VIP -->
		<?php  if(!empty($memberVip_list)) { ?>
		<div class="vip-list buy-vip-list">
			<ul class="myvip-list" style="height: 30px;">
				<li class="align" style="width:32%;">等级名称</li>
				<li class="align" style="width:28%;">购买课程折扣</li>
				<li class="align" style="width:40%;">有效期</li>
				<div class="clear"></div>
			</ul>
			<?php  if(is_array($memberVip_list)) { foreach($memberVip_list as $item) { ?>
			<ul class="myvip-list">
				<li class="align" style="width:32%;"><?php  echo $item['level']['level_name'];?></li>
				<li class="align" style="width:28%;"><?php echo $item['discount']>0 && $item['discount']!=100 ? $item['discount'].'%' : '无';?></li>
				<li class="align" style="width:40%;">
					<?php  echo date('Y-m-d',$item['validity']);?><br/>
					<a href="<?php  echo $this->createMobileUrl('viplesson', array('level_id'=>$item['level_id']))?>" class="start-study">去学习</a>
				</li>
				<div class="clear"></div>
			</ul>
			<?php  } } ?>
		</div>
		<?php  } ?>
		<!-- VIP列表 -->
		<div class="buyvip">
			<?php  if(!empty($level_list)) { ?>
			<ul class="ios-system">
				<?php  if(is_array($level_list)) { foreach($level_list as $vip) { ?>
				<li>
					<div class="vip-icon"><img src="<?php echo $vip['level_icon'] ? $_W['attachurl'].$vip['level_icon'] : MODULE_URL.'template/mobile/'.$template.'/images/vip-buyicon.png'?>"></div>
					<div class="notice_active">
						<div>￥<span class="price"> <?php  echo $vip['level_price'];?></span> <?php  if($vip['market_price']) { ?><span class="market-price">￥<?php  echo $vip['market_price'];?></span><?php  } ?></div>
						<div class="vip-name"><?php  echo $vip['level_name'];?></div>
						<div class="vip-time">有效期限：<?php  echo $vip['level_validity'];?>天</div>
						<?php  if($vip['market_price']) { ?>
						<div class="discount-desc"><i class="fa fa-info-circle"></i> 现在续费，还可享受<?php  echo $vip['renew_discount'];?>折优惠</div>
						<?php  } ?>
					</div>
					<div class="buybtn">
						<a href="javaScript:;" onclick="buyvip(<?php  echo $vip['id'];?>);"><?php echo $vip['renew'] ? '续费' : '开通';?></a>
					</div>
				</li>
				<?php  } } ?>
				<div class="clear"></div>
			</ul>
			<?php  } else { ?>
				<div class="no-content">
					<div>没找到任何会员服务价格表哦~</div>
				</div>
			<?php  } ?>
			<?php  if($comsetting['vipcard_show']) { ?>
			<div class="vip-card">	
				<a class="vip-gallery" href="<?php  echo $this->createMobileUrl('vip', array('op'=>'vipcard'));?>">VIP服务卡密开通入口</a>
			</div>
			<?php  } ?>
		</div>
		<div class="vipdesc ios-system">
			<div class="content"><?php  echo $comsetting['vipdesc'];?></div>
		</div>
	</div>

	<!-- 订单记录 -->	
	<div class="content-tab vip-order-list" style="display:none;">
		<div id="orderList" class="mar10-top">
			<?php  if(!$order_total) { ?>
			<div style="padding:50px 0; text-align:center; background:#fff;">没有找到任何订单</div>
			<?php  } ?>
		</div>
		
		<div id="loading_order" class="loading_div">
			<?php  if($order_total) { ?>
			<a href="javascript:void(0);" id="btn_order_page"><i class="fa fa-arrow-circle-down"></i> 加载更多</a>
			<?php  } ?>
		</div>
	</div>

	<!-- VIP服务卡 -->
	<div class="content-tab vip-order-list" style="display:none;">
		<div class="card-list-status">
			<label class="f-radio" data-id="0"><i class="icon-radio"></i><span class="f-rc-text">未使用(<span id="nouse_total"><?php  echo $nouse_total;?></span>)</span></label>
			<label class="f-radio" data-id="1"><i class="icon-radio"></i><span class="f-rc-text">已使用(<span id="used_total"><?php  echo $used_total;?></span>)</span></label>
			<label class="f-radio" data-id="2"><i class="icon-radio"></i><span class="f-rc-text">已过期(<span id="pass_total"><?php  echo $pass_total;?></span>)</span></label>
		</div>
		<div id="cardList" class="mar10-top">
			<div style="padding:50px 0; text-align:center; background:#fff;<?php  if($card_total) { ?>display:none;<?php  } ?>">没有找到任何VIP服务卡</div>
		</div>
		
		<div id="loading_card" class="loading_div">
			<?php  if($card_total) { ?>
			<a href="javascript:void(0);" id="btn_card_page"><i class="fa fa-arrow-circle-down"></i> 加载更多</a>
			<?php  } ?>
		</div>
	</div>
</div>
<input type="hidden" id="nowPage" />
<input type="hidden" id="card_status" />

<?php  if(!empty($now_service)) { ?>
<div class="aui-dialog">
	<div class="listInformation  background_default " style="background: rgb(245, 245, 245);"><span class="listInformationImg listInformationImg2"><img src="<?php  echo $_W['attachurl'];?><?php  echo $now_service['avatar'];?>"></span>
		<div class="listInformationWord">
			<p class="t2 c8" style="width: 100%; text-align: left;">HI，我是 <?php  echo $now_service['nickname'];?></p>
			<p class="t1 c2" style="width: 100%; text-align: left;">邀请你加入 用户售后服务群</p>
		</div>
	</div>
	<div class="textCenter" style="padding-top: 15px;">
		<p style="padding-top: 10px;"><img src="<?php  echo $_W['attachurl'];?><?php  echo $now_service['qrcode'];?>" class="erweima"></p>
		<p class="t3 c3 padding3" style="line-height: 1.5;">
			长按识别二维码<br>加我为微信好友，拉您入群
		</p>
	</div>
	<div class="listInformationBtn t2 c3 flagDiv"><span onclick="gohome()" class="listInformationBtnChild">已入群，不再提示</span> <span onclick="closeTip()" class="listInformationBtnChild c5">残忍拒绝</span></div>
</div>
<div class="aui-mask"></div>
<script type="text/javascript">
function closeTip(){
	$(".aui-dialog").hide();
	$(".aui-mask").hide();
}
function gohome(){
	$.ajax({
		url:"<?php  echo $this->createMobileUrl('vip', array('op'=>'gohome'));?>",
		type:"post",
		data:{},
		success:function(data){
			if(data==0){
				alert("网络请求失败，请稍后再试!");
			}
			closeTip();
		},
		error:function(e){
			alert("网络错误，请稍后重试!");
			closeTip();
		}
	}); 
}
</script>
<?php  } ?>

<script type="text/javascript">
var loadingToast = document.getElementById("loadingToast");
var get_order_status = get_card_status = true; //允许获取订单状态
var nowOrderPage = nowCardPage = 1;

$(function () {
	//获取订单数据
	getOrderData(1);
	$("#btn_order_page").click(function () {
		loadingToast.style.display = 'block';
		nowOrderPage++;
        getOrderData(nowOrderPage);
    });
    function getOrderData(nowOrderPage) {
		if(get_order_status){
			$.get("<?php  echo $this->createMobileUrl('vip', array('op'=>'ajaxgetList'));?>", {page: nowOrderPage}, function (data) {
				loadingToast.style.display = 'none';
				var jsonObj = JSON.parse(data);

				if (jsonObj.length > 0) {
					insertDiv(jsonObj, 1);
				}else{
					get_order_status = false;  //没有数据后，禁止请求获取数据
					document.getElementById("loading_order").innerHTML='<div class="loading_bd">没有了，已经到底了</div>';
				}
			});
		}
    }

	//获取VIP服务卡数据
	getCardData();
	$('#loading_card').on('click','a',function(){
		loadingToast.style.display = 'block';
		nowCardPage++;
        getCardData(nowCardPage);
    });
    function getCardData(nowCardPage) {
		var card_status = $("#card_status").val();
		if(get_card_status){
			$.get("<?php  echo $this->createMobileUrl('vip', array('op'=>'ajaxgetCard'));?>", {page: nowCardPage, card_status:card_status}, function (data) {
				loadingToast.style.display = 'none';
				var jsonObj = JSON.parse(data);
				$("#nouse_total").html(jsonObj.nouse_total);
				$("#used_total").html(jsonObj.used_total);
				$("#pass_total").html(jsonObj.pass_total);

				if (jsonObj.card_list.length > 0) {
					insertDiv(jsonObj.card_list, 2);
				}else{
					get_card_status = false;  //没有数据后，禁止请求获取数据
					document.getElementById("loading_card").innerHTML='<div class="loading_bd">没有了，已经到底了</div>';
				}
			});
		}
    }

    //生成数据html,append到div中  
    function insertDiv(result, type) {  
        var chtml = '';
		if(type==1){
			var mainDiv =$("#orderList");
			for (var j = 0; j < result.length; j++) { 
				chtml += '<div class="aui-order-box">';
				chtml += '	<a href="javascript:void(0);" class="aui-well-item">';
				chtml += '		<div class="aui-well-item-bd">';
				chtml += '			<h3>订单编号：' + result[j].ordersn + '</h3>';
				chtml += '		</div>';
				chtml += '	</a>';
				chtml += '	<p class="aui-order-fl aui-order-address">购买详情：购买[' + result[j].level_name + ']-'+ result[j].viptime +'天</p>';
				chtml += '	<p class="aui-order-fl aui-order-address">支付方式：' + result[j].paytype + '</p>';
				chtml += '	<p class="aui-order-fl aui-order-time">下单时间：' + result[j].addtime + '</p>';
				chtml += '	<p class="aui-order-fl aui-order-time">付款时间：' + result[j].paytime + '</p>';
				chtml += '	<p class="aui-order-fl aui-order-door">优惠金额：' + result[j].discount_money + ' 元</p>';
				chtml += '	<p class="aui-order-fl aui-order-door">实付金额：<em class="income_amount">' + result[j].vipmoney + '</em> 元</p>';
				chtml += '</div>';
			}
		}else if(type==2){
			var mainDiv =$("#cardList");
			for (var j = 0; j < result.length; j++) { 
				chtml += '<div class="aui-order-box">';
				chtml += '	<a class="aui-well-item">';
				chtml += '		<div class="aui-well-item-bd">';
				chtml += '			<h3>服务卡密钥：' + result[j].password + '</h3>';
				chtml += '		</div>';
				chtml += '	</a>';

				if(result[j].status==0){
					chtml += '	<p class="aui-order-fl aui-order-address">状态：'+ result[j].is_use_status +'</p>';
					chtml += '	<p class="aui-order-fl aui-order-address">有效期：需在'+ result[j].validity_date +'前使用</p>';
				}else if(result[j].status==1){
					chtml += '	<p class="aui-order-fl aui-order-door">状态：'+ result[j].is_use_status +'</p>';
					chtml += '	<p class="aui-order-fl aui-order-time">使用时间：' + result[j].use_time_date + '</p>';
					chtml += '	<p class="aui-order-fl aui-order-door">使用用户：uid: ' + result[j].uid + '</p>';
					chtml += '	<p class="aui-order-fl aui-order-door">使用订单号：' + result[j].ordersn + '</p>';
				}else if(result[j].status==2){
					chtml += '	<p class="aui-order-fl aui-order-door">状态：'+ result[j].is_use_status +'</p>';
					chtml += '	<p class="aui-order-fl aui-order-address">有效期：需在'+ result[j].validity_date +'前使用</p>';
				}
				chtml += '	<p class="aui-order-fl aui-order-address">VIP等级：' + result[j].level_name + '</p>';
				chtml += '	<p class="aui-order-fl aui-order-time">服务卡时长：' + result[j].viptime + ' 天</p>';
				chtml += '</div>';
			}
		}
        
		mainDiv.append(chtml);
    }

	$('.card-list-status>label').click(function() {
		var index = $(this).data('id');
		$(this).addClass('checked').siblings().removeClass('checked');
		$("#card_status").val(index);
		$("#cardList").html('');
		get_card_status = true;
		nowCardPage = 1;
		getCardData(nowCardPage);
		document.getElementById("loading_card").innerHTML = '<a href="javascript:void(0);" id="btn_card_page"><i class="fa fa-arrow-circle-down"></i> 加载更多</a>';
	});
});

function buyvip(id){
	var setTitle = '系统提示';
	var setContents = '确定提交订单?';
	var setButton = '["取消","确定"]';
	var setCancelUrl = 'javascript:;';
	var setConfirmUrl = "<?php  echo $this->createMobileUrl('vip', array('op'=>'buyvip'));?>&level_id="+id;
	$(this).openWindow(setTitle,setContents,setButton,setCancelUrl,setConfirmUrl);
}

$(".vip-title-table").on("click", 'li', function() {
	var $currItem = $(this),
	index = $currItem.index();
	$("#nowPage").val(index);

	$currItem.addClass('active').siblings().removeClass('active');
	$(".content-tab").hide().eq(index).show();

});
</script>

<?php  } else if($op=='vipcard') { ?>

<div class="login_wrap">
	<form method="post" onsubmit="return checknum();">
		<div class="weui-cells">
			<div class="weui-cell">
				<div class="weui-cell__hd"><label class="weui-label">服务卡密</label></div>
				<div class="weui-cell__bd">
					<input type="text" class="weui-input" id="card_password" name="card_password" placeholder="请输入VIP服务卡密">
				</div>
			</div>
		</div>
		<div class="weui-btn-area">
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
			<input type="submit" name="submit" class="weui-btn weui-btn_primary w90-per" value="立即开通">
		</div>
	</form>
</div>

<script type="text/javascript">
document.getElementById("loadingToast").style.display = 'none';

function checknum(){
	var card_password = $("#card_password").val();
	if(card_password==''){
		alert("请输入VIP服务卡密");
		return false;
	}
	document.getElementById("loadingToast").style.display = 'block';
}
</script>
<?php  } ?>

<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template($template.'/_footerv2', TEMPLATE_INCLUDEPATH)) : (include template($template.'/_footerv2', TEMPLATE_INCLUDEPATH));?>