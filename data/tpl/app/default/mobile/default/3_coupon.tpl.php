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
<link href="<?php echo MODULE_URL;?>template/mobile/<?php  echo $template;?>/style/cssv2/coupon.css?v=<?php  echo $versions;?>" rel="stylesheet"/>
<style type="text/css">
.tabbar_wrap {
	-webkit-overflow-scrolling: unset;
}
</style>
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
<!-- 顶部导航  -->
<ul class="tab_wrap">
	<li class="tab_item <?php  if($_GPC['status']=='0' || $_GPC['status']=='') { ?>tab_item_on<?php  } ?>">
		<a href="<?php  echo $this->createMobileUrl('coupon', array('status'=>'0'));?>">未使用</a>
	</li>
	<li class="tab_item <?php  if($_GPC['status']=='1') { ?>tab_item_on<?php  } ?>">
		<a href="<?php  echo $this->createMobileUrl('coupon', array('status'=>1));?>">已使用</a>
	</li>
	<li class="tab_item <?php  if($_GPC['status']=='-1') { ?>tab_item_on<?php  } ?>">
		<a href="<?php  echo $this->createMobileUrl('coupon', array('status'=>-1));?>">已过期</a>
	</li>
</ul>
<!-- /顶部导航  -->

<?php  if(!$status) { ?>
<div class="aui-tab-search-box">
	<form method="post" action="<?php  echo $this->createMobileUrl('coupon', array('op'=>'addCoupon'));?>" onsubmit="return checknum();">
		<div class="aui-tab-search-bg">
			<input type="text" name="card_password" id="card_password" class="cart-input" placeholder="请输入课程优惠码">
			<input type="submit" name="submit" class="submit-btn" value="转换">
		</div>
	</form>
</div>
<?php  } ?>

<?php  if(!empty($list)) { ?>
<div>
	<div class="pepper-con">
		<div class="pepper-w">
		</div>
	</div>
</div>
<?php  } else { ?>
<div class="my_empty">
	<div class="empty_bd  my_course_empty">
		<h3>没有找到任何优惠券~</h3>
	</div>
</div>
<?php  } ?>
<div class="more-pepper"><a href="<?php  echo $this->createMobileUrl('getcoupon');?>">更多好券，去兑换中心看看 <i class="fa fa-long-arrow-right"></i></a></div>

<div id="loading_div" class="loading_div">
	<a href="javascript:void(0);" id="btn_Page"><i class="fa fa-arrow-circle-down"></i> 加载更多</a>
</div>

<script type="text/javascript">
function GetQueryString(name) {
	var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
	var r = window.location.search.substr(1).match(reg);
	if(r != null) return unescape(r[2]);
	return null;
}

var status = GetQueryString('status');
var ajaxurl   = "<?php  echo $this->createMobileUrl('coupon');?>";
var loadingToast = document.getElementById("loadingToast");
var get_status = true; //允许获取状态

$(function () {
    var nowPage = 1;
    function getData(page) {
		if(get_status){
			nowPage++;  
			$.get(ajaxurl, {page: page, status:status}, function (data) {  
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
    //初始化加载第一页数据  
    getData(1);

    //生成数据html,append到div中  
    function insertDiv(result) {  
        var mainDiv =$(".pepper-w");
        var chtml = '';  
        for (var j = 0; j < result.length; j++) {  
            chtml += '<div class="pepper '+ result[j].classname +'">';  
            chtml += '	 <div class="pepper-l">'; 
			chtml += '		<p class="pepper-l-num">';
			chtml += '			<span> ¥'+ result[j].amount +'</span>';
			chtml += '		</p>';
			chtml += '		<p class="pepper-l-con">使用条件：课程金额满'+ result[j].conditions +'元，' +result[j].category_name+ '可使用</p>';
			chtml += '	</div>';
			chtml += '	<div class="pepper-r">';
			if(result[j].status==0){
				chtml += '		<span>课程券</span>';
				chtml += '		<a href=" ' + result[j].url + '" class="use-now">立即使用</a>';
				chtml += '		<div>有效期至<br/>'+ result[j].endDate +' '+ result[j].endTime +'</div>';
			}else if(result[j].status==1){
				chtml += '<div class="coupon-used"></div>';
			}else if(result[j].status==-1){
				chtml += '<div class="coupon-past"></div>';
			}
			chtml += '	</div>';
			chtml += '</div>';
			if(result[j].classname=='pepper-red'){
				chtml += '<div class="pepper-b">';
				chtml += '	<div class="pb-con">获取途径：' +result[j].source_name+ '</div>';
				chtml += '	<div class="pb-border"></div>';
				chtml += '</div>';
			}else{
				chtml += '<div class="pepper-b">';
				chtml += '	<div class="pb-con" style="background:#cccccc;">获取途径：' +result[j].source_name+ '</div>';
				chtml += '</div>';
			}
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
</script>

<script type="text/javascript">
function checknum(){
	var card_password = $("#card_password").val();
	if(card_password==''){
		alert("请输入课程优惠码");
		return false;
	}
	loading.style.display = 'block';
}
</script>

<?php  } ?>

<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template($template.'/_footerv2', TEMPLATE_INCLUDEPATH)) : (include template($template.'/_footerv2', TEMPLATE_INCLUDEPATH));?>