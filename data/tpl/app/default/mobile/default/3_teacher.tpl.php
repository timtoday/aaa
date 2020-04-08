<?php defined('IN_IA') or exit('Access Denied');?><!-- 
 * 讲师课程
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
<link href="<?php echo MODULE_URL;?>template/mobile/<?php  echo $template;?>/style/cssv2/teacher.css?v=<?php  echo $versions;?>" rel="stylesheet" />

<div id="cover" style="display:none;position:fixed;top:0;width:100%;height:100%;background:rgba(0,0,0,0.8);display:none;z-index:99999999;"><img src="<?php echo MODULE_URL;?>template/mobile/<?php  echo $template;?>/images/share_notice.jpg" style="width:100%;"></div>

<div class="content agency">
    <div class="agency-head cbox" style="background-image:url(<?php  echo $teacher_bg;?>);">
        <img src="<?php  echo $_W['attachurl'];?><?php  echo $teacher['teacherphoto'];?>" class="pic">

        <div class="teacher-info">
            <div class="cbox">
                <h3 class="flex title te" style="width:100%; margin-bottom:12px;"><?php  echo $teacher['teacher'];?></h3>
            </div>

            <ul class="data cbox">
                <li class="flex hbox" style="width:66%;">
                    <div class="num">
                        <p><?php  echo $total;?></p><?php echo $teacher_home['lesson_num'] ? $teacher_home['lesson_num'] : '课程数量';?>
                    </div>
                    <span class="line"></span>
                    <div class="per">
                        <p><?php  echo $student_num;?></p><?php echo $teacher_home['study_num'] ? $teacher_home['study_num'] : '学习人数';?>
                    </div>
                </li>
                <li id="btn-collect2" style="width:33%;">
                    <!-- 已收藏 加上类cur -->
                    <a href="javascript:;" class="link"><i id="collect2-icon" class="fa <?php echo $collect ? 'fa-heart' : 'fa-heart-o';?>"></i> <?php echo $teacher_home['collect'] ? $teacher_home['collect'] : '收藏';?></a>
                </li>
            </ul>
        </div>
    </div>
    <ul class="details-tab agency-tab">
        <li class="cur" tab-name="course"><a href="javascript:;"><?php echo $teacher_home['all_lesson'] ? $teacher_home['all_lesson'] : '全部课程';?>(<?php  echo $total;?>)</a></li>
        <li tab-name="js"><a href="javascript:;"><?php echo $teacher_home['teacher_introduce'] ? $teacher_home['teacher_introduce'] : '讲师介绍';?></a></li>
    </ul>

	<div class="agency-con">
		<div id="lesson-list" class="lesson-teacher-content">
			<?php  if(!empty($teacher_price)) { ?>
			<div class="buy-teacher ios-system">
				<div class="vip-icon"><img src="<?php echo MODULE_URL;?>template/mobile/<?php  echo $template;?>/images/teacher-buy-icon.png"></div>
				<div class="notice_active">
					<div>￥<span class="price"> <?php  echo $teacher_price['price'];?></span> </div>
					<div class="vip-time">有效期限：<?php  echo $teacher_price['validity_time'];?>天</div>
					<div class="vip-name">
						<?php  if($teacherself) { ?>
							讲师收益：<?php  echo $teacher_price['teacher_income'];?>%
						<?php  } else { ?>
							开通免费学习该讲师全部课程
						<?php  } ?>
					</div>
				</div>
				<div class="buybtn">
					<a href="javascript:;" id="btn-buy-teacher"><?php echo empty($buy_teacher) ? '开通' : '续费'?></a>
				</div>
			</div>
			<?php  } ?>
		</div>
		<div id="loading_div" class="loading_div">
			<a href="javascript:void(0);" id="btn_Page"><i class="fa fa-arrow-circle-down"></i> 加载更多</a>
		</div>
	</div>

	<div class="agency-con lesson-teacher-content" style="display:none;;">
		<div class="agency-teachers shadow">
			<div class="right-box">
				<?php  echo htmlspecialchars_decode($teacher['teacherdes']);?>
			</div>
		</div>
	</div>
</div>

<div id="loadingToast" style="display: none;">
	<div class="weui-mask_transparent"></div>
	<div class="weui-toast">
		<i class="weui-loading weui-icon_toast"></i>
		<p class="weui-toast__content">加载数据中</p>
	</div>
</div>

<script type="text/javascript">
var ajaxUrl   = "<?php  echo $this->createMobileUrl('teacher', array('op'=>'ajaxgetlesson', 'teacherid'=>$teacherid));?>";
var lessonUrl = "<?php  echo $this->createMobileUrl('lesson');?>";
var attachUrl = "<?php  echo $_W['attachurl'];?>";
var teacherself = "<?php  echo $teacherself;?>";
var get_status = true; //允许获取状态
var loading = document.getElementById("loading");

$(function () {
    var nowPage = 1;
    function getData(page) {
		if(get_status){
			nowPage++;
			$.get(ajaxUrl, {page: page }, function (data) {  
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
        var mainDiv =$("#lesson-list");
		var already_study = "<?php  echo $already_study;?>";
        var chtml = '';  
        for (var j = 0; j < result.length; j++) {
			chtml += '<a href="' + lessonUrl + '&id=' + result[j].id + '" class="normal_grid flex0_1">';
			chtml += '	<div class="normal_grid_a flex_g0">';
			chtml += '		<div class="img-box flex_g0">';
			chtml += '			<div class="img"><img src="' + attachUrl + result[j].images + '"></div>';
			chtml += '			<div class="icon-live ' + result[j].icon_live_status +'"></div>';
			chtml += '			<div class="learned ' + result[j].learned_hide + '">' + result[j].buyTotal + already_study + '</div>';
			chtml += '			<i class="ico_common '+ result[j].ico_name +'"></i>';
			chtml += '		</div>';
			chtml += '	</div>';
			chtml += '	<div class="flex-al1 flex10">';
			chtml += '		<div>';
			chtml += '			<div class="grid_title2">' + result[j].bookname + '</div>';
			chtml += '			<div class="grid_info flex0">';
			if(result[j].price>0){
				chtml += '				<span class="price flex_g0 ios-system">¥' + result[j].price + '</span>';
			}else{
				chtml += '				<span class="free flex_g0 ios-system">免费课程</span>';
			}
			if(result[j].soncount>0){
				chtml += '				<span class="mar5 ios-system">|</span>';
				chtml += '				<span>' + result[j].soncount + '节</span>';
			}
			chtml += '			</div>';
			chtml += '		</div>';
			chtml += '		<div class="grid_bottom2 flex1">';
			if(teacherself==1){
				chtml += '			<span class="eva">讲师收益: ' + result[j].teacher_income + '%</span>';
			}else if(result[j].section_status==0){
				chtml += '			<div class="text">已完结</div>';
			}
			chtml += '		</div>';
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
</script>
<script type="text/javascript">
//切换tab
$(".agency-tab").on("click", 'li', function() {
	var $currItem = $(this),
	index = $currItem.index();

	$currItem.addClass('cur').siblings().removeClass('cur');
	$(".agency-con").hide().eq(index).show();
});

function GetQueryString(name){
	var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
	var r = window.location.search.substr(1).match(reg);
	if(r!=null)return  unescape(r[2]); return null;
}
$("#btn-collect2").click(function(){
	var id = GetQueryString('teacherid');
	var ajaxurl = "<?php  echo $this->createMobileUrl('updatecollect', array('ctype'=>'teacher','uid'=>$uid));?>";
	$.ajax({
        type:'post',
        url:ajaxurl,
        data:{id:id},
        dataType:'json',     
        success:function(data){
            if(data=='1'){
            	$("#collect2-icon").removeClass("fa-heart-o");
				$("#collect2-icon").addClass("fa-heart");
			}else if(data=='2'){
				$("#collect2-icon").addClass("fa-heart-o");
				$("#collect2-icon").removeClass("fa-heart");
			}
        }
    });
});

$("#btn-buy-teacher").click(function(){
	var setTitle = '系统提示';
	var setContents = '确定提交订单?';
	var setButton = '["取消","确定"]';
	var setCancelUrl = 'javascript:;';
	var setConfirmUrl = "<?php  echo $this->createMobileUrl('teacher', array('op'=>'buyteacher','teacherid'=>$teacherid));?>";
	$(this).openWindow(setTitle,setContents,setButton,setCancelUrl,setConfirmUrl);
});

</script>

<script type="text/javascript">
wx.ready(function(){
	var shareData = {
		title: "<?php  echo $teacher['teacher'];?>讲师主页",
		desc: "<?php  echo $shareteacher['title'];?>",
		link: "<?php  echo $shareurl;?>",
		imgUrl: "<?php  echo $_W['attachurl'];?><?php echo $shareteacher['images']?$shareteacher['images']:$teacher['teacherphoto']?>",
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

document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
	var miniprogram_environment = false;
	wx.miniProgram.getEnv(function(res) {
		if(res.miniprogram) {
			miniprogram_environment = true;
		}
	})
	if((window.__wxjs_environment === 'miniprogram' || miniprogram_environment)) {
		wx.miniProgram.getEnv(function(res) {
			wx.miniProgram.postMessage({ 
				data: {
					'title': "<?php  echo $teacher['teacher'];?>讲师主页",
					'images': "<?php  echo $_W['attachurl'];?><?php echo $shareteacher['images']?$shareteacher['images']:$teacher['teacherphoto']?>",
				}
			})
		});
	}
});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template($template.'/_footerv2', TEMPLATE_INCLUDEPATH)) : (include template($template.'/_footerv2', TEMPLATE_INCLUDEPATH));?>

