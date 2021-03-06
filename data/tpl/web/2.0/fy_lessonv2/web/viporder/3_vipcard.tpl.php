<?php defined('IN_IA') or exit('Access Denied');?><div class="mloading-bar" style="margin-top: -31px; margin-left: -140px;"><img src="<?php echo MODULE_URL;?>template/mobile/<?php  echo $template;?>/images/download.gif"><span class="mloading-text">上传处理中，请稍候...</span></div>
<div id="overlay"></div>
<script type="text/javascript">
/* 显示遮罩层 */
function showOverlay() {
    $("#overlay").height("100%");
    $("#overlay").width("100%");
    $("#overlay").fadeTo(200, 0);
	$(".mloading-bar").show();
}
</script>
<div class="main">
    <div class="panel panel-info">
        <div class="panel-heading">添加VIP服务卡</div>
        <div class="panel-body">
            <a href="<?php  echo $this->createWebUrl('viporder', array('op'=>'addVipCode'));?>" class="btn btn-primary" style="margin-right:10px;"><i class="fa fa-plus"></i> 在线生成</a>
        </div>
    </div>

	<div class="panel panel-info">
        <div class="panel-heading">筛选</div>
        <div class="panel-body">
            <form action="./index.php" method="get" class="form-horizontal" role="form">
                <input type="hidden" name="c" value="site" />
                <input type="hidden" name="a" value="entry" />
                <input type="hidden" name="m" value="fy_lessonv2" />
                <input type="hidden" name="do" value="viporder" />
                <input type="hidden" name="op" value="vipcard" />
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width:100px;">订单编号</label>
                    <div class="col-sm-2 col-lg-3">
                        <input class="form-control" name="ordersn" type="text" value="<?php  echo $_GPC['ordersn'];?>">
                    </div>
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">拥有者uid</label>
                    <div class="col-sm-2 col-lg-3">
                        <input class="form-control" name="own_uid" type="text" value="<?php  echo $_GPC['own_uid'];?>" placeholder="用户uid">
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width:100px;">服务卡号</label>
                    <div class="col-sm-2 col-lg-3">
                        <input class="form-control" name="id1" type="text" value="<?php  echo $_GPC['id1'];?>" style="display:inline-block;width:44%;"> 至 <input class="form-control" name="id2" type="text" value="<?php  echo $_GPC['id2'];?>" style="display:inline-block;width:44%;">
                    </div>
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">服务卡密</label>
                    <div class="col-sm-2 col-lg-3">
                        <input class="form-control" name="password" type="text" value="<?php  echo $_GPC['password'];?>">
                    </div>
                </div>
                <div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width:100px;">服务卡状态</label>
                    <div class="col-sm-8 col-lg-3 col-xs-12">
                        <select name="is_use" class="form-control">
                            <option value="">全部状态</option>
							<option value="0" <?php  if(in_array($_GPC['is_use'],array('0'))) { ?> selected="selected" <?php  } ?>>未使用</option>
							<option value="1" <?php  if($_GPC['is_use'] == 1) { ?> selected="selected" <?php  } ?>>已使用</option>
							<option value="-1" <?php  if($_GPC['is_use'] == -1) { ?> selected="selected" <?php  } ?>>已过期</option>
                        </select>
                    </div>
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width:100px;">VIP等级</label>
                    <div class="col-sm-8 col-lg-3 col-xs-12">
                        <select name="level_id" class="form-control">
                            <option value="">全部等级</option>
                            <?php  if(is_array($level_list)) { foreach($level_list as $level) { ?>
                            <option value="<?php  echo $level['id'];?>" <?php  if($_GPC['level_id']==$level['id']) { ?>selected<?php  } ?>><?php  echo $level['level_name'];?></option>
                            <?php  } } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width: 100px;">使用时间</label>
                    <div class="col-sm-8 col-lg-3 col-xs-12">
					<?php echo tpl_form_field_daterange('time', array('starttime'=>($starttime ? date('Y-m-d', $starttime) : false),'endtime'=> ($endtime ? date('Y-m-d', $endtime) : false)));?>
                    </div>
                    <div class="col-sm-3 col-lg-3">
                        <button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>&nbsp;&nbsp;
						<button type="submit" name="export" value="1" class="btn btn-success">导出 Excel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <div class="panel panel-default">
		<div class="panel-heading">总数：<?php  echo $total;?></div>
        <form action="<?php  echo $this->createWebUrl('viporder', array('op'=>'delAllCard'));?>" method="post" class="form-horizontal form">
			<div class="table-responsive panel-body">
				<table class="table table-hover">
					<thead class="navbar-inner">
					<tr>
						<th style="width:4%;">全选</th>
						<th style="width:12%;">服务卡号</th>
						<th style="width:18%;">卡密</th>
						<th style="width:8%;">卡时长</th>
						<th style="width:12%;">有效期</th>
						<th style="width:10%;">卡状态</th>
						<th style="width:10%;">VIP等级</th>
						<th style="width:10%;">拥有者</th>
						<th style="width:16%;">使用订单号</th>
					</tr>
					</thead>
					<tbody style="font-size:13px;">
					<?php  if(is_array($list)) { foreach($list as $item) { ?>
					<tr>
						<td><input type="checkbox" name="ids[]" value="<?php  echo $item['id'];?>"></td>
						<td><?php  echo $item['id'];?></td>
						<td><?php  echo $item['password'];?></td>
						<td><?php  echo $item['viptime'];?> 天</td>
						<td><?php  echo date('Y-m-d H:i',$item['validity'])?></td>
						<td>
							<?php  if($item['is_use'] == 0 && time() > $item['validity']) { ?><span class="label label-default">已过期</span><?php  } ?>
							<?php  if($item['is_use'] == 0 && time() <= $item['validity']) { ?><span class="label label-success">未使用</span><?php  } ?>
							<?php  if($item['is_use'] == 1) { ?><span class="label label-warning">已使用</span><?php  } ?>
						</td>
						<td><?php  echo $item['level']['level_name'];?></td>
						<td>
							<?php  echo $item['own_nickname'];?>
							<?php  if($item['own_uid']) { ?>
								<br/>(uid: <?php  echo $item['own_uid'];?>)
							<?php  } ?>
						</td>
						<td><a href="<?php  echo $this->createWebUrl('viporder', array('ordersn'=>$item['ordersn']));?>"><?php  echo $item['ordersn'];?></a></td>
					</tr>
					<?php  } } ?>
					</tbody>
					<tfoot>
						<tr>
							<td colspan="9">
								<input type="checkbox" class="checkItems">
								<a href="javascript:;" id="allocation-vipcard" class="btn btn-success" style="margin-left:13px;">分配给用户</a>
								<a href="javascript:;" id="cancel-vipcard" class="btn btn-danger" style="margin-left:13px;">取消分配</a>
								<input name="submit" type="submit" class="btn btn-primary" value="批量删除" onclick="return delAll()" style="margin-left:13px;">
							</td>
						</tr>
					</tfoot>
				</table>
				<?php  echo $pager;?>
			</div>
		</div>
		<div id="modal-module-member"  class="modal fade" tabindex="-1">
			<div class="modal-dialog" style='width: 920px;'>
				<div class="modal-content">
					<div class="modal-header"><button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button><h3>选择用户</h3></div>
					<div class="modal-body" >
						<div class="row">
							<div class="input-group">
								<input type="text" class="form-control" name="kmember" value="" id="search-km" placeholder="请输入用户昵称/姓名/手机号" />
								<span class='input-group-btn'><button type="button" class="btn btn-default" onclick="search_member();">搜索</button></span>
							</div>
						</div>
						<div id="module-member" style="padding-top:5px;"></div>
					</div>
					<div class="modal-footer"><a href="javascript:;" class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</a></div>
				</div>
			</div>
		</div>
    </form>
</div>
<script type="text/javascript">
	var ids = document.getElementsByName('ids[]');
	var selectAll = false;
	$(".checkItems").click(function(){
		selectAll = !selectAll;
		for(var i=0; i<ids.length; i++){
			ids[i].checked = selectAll;
		}
	});
	function checkStatus(){
		var checkids = "";
		for(var i=0; i<ids.length; i++){
			if(ids[i].checked){
				checkids += (checkids === '' ? ids[i].value : ',' + ids[i].value);
			}
		}
		if(checkids===''){
			alert('未选中任何选项');
			return false;
		}else{
			return checkids;
		}
	}

	//批量删除
	function delAll(){
		var flag = checkStatus();
		if(!flag){  
			return false ;
		}
		if(!confirm('该操作无法恢复，确定删除?')){
			return false;
		}

		return true;
	}

	//批量分配
	$("#allocation-vipcard").click(function(){
		var cardids = checkStatus();
		
		if(!cardids){  
			return false ;
		}

		$('#modal-module-member').modal();
	})

	function search_member() {
		var uniacid = <?php  echo $uniacid?>;
		if ($.trim($('#search-km').val()) == '') {
			document.getElementById('search-km').focus();
			return;
		}
		$("#module-member").html("正在搜索....");
		$.get("<?php  echo $this->createWebUrl('getlessonormember', array('op'=>'getMember'))?>", { 
			uniacid:uniacid,keyword: $.trim($('#search-km').val())
		}, function (dat) {
			$('#module-member').html(dat);
		});
	}
	function select_member(obj) {
		if(!obj.uid){
			alert("获取用户信息失败，请刷新页面重试");
			return false;
		}

		var cardids = checkStatus();
		if(cardids && confirm('确认批量操作?')){
			$.ajax({
				type: "POST",
				url: "<?php  echo $this->createWebUrl('viporder', array('op'=>'updateCard','type'=>'set'));?>",
				data: {cardids:cardids, own_uid:obj.uid},
				dataType:"json",
				success: function(res){
					if(res.code===0){
						alert(res.msg);
						location.reload();
					}else{
						alert(res.msg);
						return false;
					}
				},
				error: function(error){
					alert('网络请求超时，请稍后重试!');
				}
			});
		}
	}

	//取消分配
	$("#cancel-vipcard").click(function(){
		var cardids = checkStatus();
		
		if(!cardids){  
			return false ;
		}
		if(cardids && confirm('确认批量取消分配?')){
			$.ajax({
				type: "POST",
				url: "<?php  echo $this->createWebUrl('viporder', array('op'=>'updateCard','type'=>'cancel'));?>",
				data: {cardids:cardids},
				dataType:"json",
				success: function(res){
					if(res.code===0){
						alert(res.msg);
						location.reload();
					}else{
						alert(res.msg);
						return false;
					}
				},
				error: function(error){
					alert('网络请求超时，请稍后重试!');
				}
			});
		}
	})

	
	$("input[name=kmember]").bind('keypress', function(e) {
		var ev = (typeof event!= 'undefined') ? window.event : e;
		if(ev.keyCode == 13) {
			search_member();
			return false;
		}
	});
</script>
