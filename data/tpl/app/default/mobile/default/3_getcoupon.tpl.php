<?php defined('IN_IA') or exit('Access Denied');?><!-- 
 * 优惠券管理
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
<link href="<?php echo MODULE_URL;?>template/mobile/<?php  echo $template;?>/style/cssv2/getcoupon.css?v=<?php  echo $versions;?>" rel="stylesheet"/> 

<div class="header-2 cbox">
	<a href="javascript:history.go(-1);" class="ico go-back"></a>
	<div class="flex title"><?php  echo $title;?></div>
</div>

<?php  if(!empty($list)) { ?>
	<div class="tab-panel">
		<div class="tab-panel-item tab-active">
			<div class="tab-item" id="couponList">
			</div>
		</div>
	</div>

	<?php  if(!empty($coupon_desc)) { ?>
	<div class="info">
		<div class="title">
			<div class="ico"><i class="fa fa-cubes"></i></div>
			<div class="text"><?php  echo $coupon_desc['0'];?></div>
		</div>
		<div class="con">
			<?php  if(is_array($coupon_desc)) { foreach($coupon_desc as $key => $item) { ?>
			<?php  if($key>0) { ?>
			<div class="line">
				<div class="t2">
					<div class="t3"><?php  echo $item;?></div>
				</div>
			</div>
			<?php  } ?>
			<?php  } } ?>
		</div>
	</div>
	<?php  } ?>

	<div id="loading_div" class="loading_div">
		<a href="javascript:void(0);" id="btn_Page"><i class="fa fa-arrow-circle-down"></i> 加载更多</a>
	</div>
<?php  } else { ?>
	<div class="my_empty">
		<div class="empty_bd  my_course_empty">
			<h3>没有任何优惠券可领取~</h3>
		</div>
	</div>
<?php  } ?>

<div id="loadingToast" style="display: none;">
	<div class="weui-mask_transparent"></div>
	<div class="weui-toast">
		<i class="weui-loading weui-icon_toast"></i>
		<p class="weui-toast__content">加载数据中</p>
	</div>
</div>

<script type="text/javascript">
	var ajaxurl = "<?php  echo $this->createMobileUrl('getcoupon');?>";
	var attachurl = "<?php  echo $_W['attachurl'];?>";
	var loadingToast = document.getElementById("loadingToast");
	var get_status = true; //允许获取状态

	$(function() {
		var nowPage = 1;
		function getData(page) {
			if(get_status){
				nowPage++;
				$.get(ajaxurl, {
					page: page,
					status: status
				}, function(data) {
					loadingToast.style.display = 'none';
				
					var jsonObj = JSON.parse(data);
					if (jsonObj.length > 0) {
						insertDiv(jsonObj);
					}else{
						get_status = false;  //没有数据后，禁止请求获取数据
						document.getElementById("loading_div").innerHTML='<div class="loading_bd">没有了，已经到底了</div>';
					}
				});
			}
		}
		
		getData(1);//初始化加载第一页数据

		//生成数据html,append到div中  
		function insertDiv(result) {
			var mainDiv = $("#couponList");
			var chtml = '';
			for(var j = 0; j < result.length; j++) {
				if(result[j].is_end==1){
					chtml += '<a href="javascript:;" class="aui-flex aui-vou-content">';
				}else{
					chtml += '<a href="javascript:;" class="aui-flex aui-vou-content" onclick="exchange('+result[j].id+','+ result[j].exchange_integral +');">';
				}
				chtml += '	<div class="aui-flex-box">';
				chtml += '		<div class="aui-flex">';
				chtml += '			<div class="aui-flex-cp-img">';
				chtml += '				<img src="' +attachurl+result[j].images+ '" alt="' +result[j].name+ '">';
				chtml += '			</div>';
				chtml += '			<div class="aui-flex-box">';
				chtml += '				<h2>[' +result[j].name+ ']<br/>' +result[j].category_name+ '</h2>';
				chtml += '				<p><i>￥</i>' +parseInt(result[j].amount)+ '<em>'+result[j].conditions+'</em></p>';
				chtml += '			</div>';
				chtml += '		</div>';
				chtml += '	</div>';
				chtml += '	<div class="aui-vou-button">';
				chtml += '		<p>已抢'+result[j].already_per+'%</p>';
				chtml += '		<div class="aui-Speed">';
				chtml += '			<div class="aui-Speed-top" style="width:'+result[j].already_per+'%"></div>';
				chtml += '		</div>';
				if(result[j].is_end==1){
					chtml += '		<button class="aui-vou-btn-der aui-vou-btn-gray-one">已抢完</button>';
				}else{
					chtml += '		<button class="aui-vou-btn-der aui-vou-btn-der-one">立即领取</button>';
				}
				chtml += '	</div>';
				chtml += '</a>';
			}
			mainDiv.append(chtml);
		}

		//定义鼠标滚动事件
		var scroll_loading = false;
		$(window).scroll(function(){
		　　var scrollTop = $(this).scrollTop();
		　　var scrollHeight = $(document).height();
		　　var windowHeight = $(this).height();
		　　if(scrollTop + windowHeight >= scrollHeight && !scroll_loading){
				scroll_loading = true;
				getData(nowPage);  
				scroll_loading = false;
		　　}
		});
		$("#btn_Page").click(function () {
			loadingToast.style.display = 'block';
			getData(nowPage);
		});
	});
	function exchange(id, integral){
		var setTitle = '系统提示';
		if(integral > 0){
			var setContents = '确定使用 <span style="color:red;font-weight:bold;">'+ integral +'</span> 积分兑换该优惠券?';
		}else{
			var setContents = '确定免费兑换该优惠券?';
		}
		
		var setButton = '["取消","确定"]';
		var setCancelUrl = 'javascript:;';
		var setConfirmUrl = "<?php  echo $this->createMobileUrl('getcoupon', array('op'=>'getcoupon'));?>&id="+id;
		$(this).openWindow(setTitle,setContents,setButton,setCancelUrl,setConfirmUrl);
	}
</script>

<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template($template.'/_footerv2', TEMPLATE_INCLUDEPATH)) : (include template($template.'/_footerv2', TEMPLATE_INCLUDEPATH));?>