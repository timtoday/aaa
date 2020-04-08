<?php defined('IN_IA') or exit('Access Denied');?><style>
.label{
	line-height:2;
}
.page-nav {
	margin: 0;
	width: 100%;
	min-width: 800px;
}

.page-nav > li > a {
	display: block;
}

.page-nav-tabs {
	background: #EEE;
}

.page-nav-tabs > li {
	line-height: 40px;
	float: left;
	list-style: none;
	display: block;
	text-align: -webkit-match-parent;
}

.page-nav-tabs > li > a {
	font-size: 14px;
	color: #666;
	height: 40px;
	line-height: 40px;
	padding: 0 10px;
	margin: 0;
	border: 1px solid transparent;
	border-bottom-width: 0px;
	-webkit-border-radius: 0;
	-moz-border-radius: 0;
	border-radius: 0;
}

.page-nav-tabs > li > a, .page-nav-tabs > li > a:focus {
	border-radius: 0 !important;
	background-color: #f9f9f9;
	color: #999;
	margin-right: -1px;
	position: relative;
	z-index: 11;
	border-color: #c5d0dc;
	text-decoration: none;
}

.page-nav-tabs >li >a:hover {
	background-color: #FFF;
}

.page-nav-tabs > li.active > a, .page-nav-tabs > li.active > a:hover, .page-nav-tabs > li.active > a:focus {
	color: #576373;
	border-color: #c5d0dc;
	border-top: 2px solid #4c8fbd;
	border-bottom-color: transparent;
	background-color: #FFF;
	z-index: 12;
	margin-top: -1px;
	box-shadow: 0 -2px 3px 0 rgba(0, 0, 0, 0.15);
}
.spec-name{
	font-style: normal;
    font-size: 12px;
    color: #999;
}
</style>
<div class="main">
    <div class="panel panel-info">
        <div class="panel-heading">筛选</div>
        <div class="panel-body">
            <form action="./index.php" method="get" class="form-horizontal" role="form">
                <input type="hidden" name="c" value="site" />
                <input type="hidden" name="a" value="entry" />
                <input type="hidden" name="m" value="fy_lessonv2" />
                <input type="hidden" name="do" value="order" />
                <input type="hidden" name="op" value="display" />
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width:100px;">订单信息</label>
                    <div class="col-sm-2 col-lg-3">
                        <input class="form-control" name="keyword" type="text" value="<?php  echo $_GPC['keyword'];?>" placeholder="订单编号/课程名称">
                    </div>
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">用户信息</label>
                    <div class="col-sm-2 col-lg-3">
                        <input class="form-control" name="nickname" type="text" value="<?php  echo $_GPC['nickname'];?>" placeholder="昵称/姓名/手机号码">
                    </div>
                </div>
                <div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">推荐人uid</label>
                    <div class="col-sm-2 col-lg-3">
                        <input class="form-control" name="rec_uid" type="text" value="<?php  echo $_GPC['rec_uid'];?>" placeholder="推荐人uid">
                    </div>
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width:100px;">订单状态</label>
                    <div class="col-sm-8 col-lg-3 col-xs-12">
                        <select name="status" class="form-control">
                            <option value="">不限</option>
							<?php  if(is_array($orderStatusList)) { foreach($orderStatusList as $key => $item) { ?>
								<option value="<?php  echo $key;?>" <?php  if($_GPC['status'] == "$key") { ?> selected="selected" <?php  } ?>><?php  echo $item;?></option>
							<?php  } } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">支付方式</label>
                    <div class="col-sm-8 col-lg-3 col-xs-12">
                        <select name="paytype" class="form-control">
                            <option value="">不限</option>
							<?php  if(is_array($orderPayType)) { foreach($orderPayType as $key => $item) { ?>
							<option value="<?php  echo $key;?>" <?php  if($_GPC['paytype'] == "$key") { ?> selected="selected" <?php  } ?>><?php  echo $item;?></option>
							<?php  } } ?>
                        </select>
                    </div>
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">核销状态</label>
                    <div class="col-sm-8 col-lg-3 col-xs-12">
                        <select name="is_verify" class="form-control">
                            <option value="">不限</option>
							<option value="0" <?php  if($_GPC['is_verify'] == '0') { ?> selected="selected" <?php  } ?>>未核销</option>
							<option value="1" <?php  if($_GPC['is_verify'] == 1) { ?> selected="selected" <?php  } ?>>已核销</option>
							<option value="2" <?php  if($_GPC['is_verify'] == 2) { ?> selected="selected" <?php  } ?>>核销完成</option>
                        </select>
                    </div>
                </div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width:100px;">订单有效期</label>
                    <div class="col-sm-8 col-lg-3 col-xs-12">
                        <select name="validity" class="form-control">
                            <option value="">全部</option>
                            <option value="2" <?php  if($_GPC['validity'] == 2) { ?> selected="selected" <?php  } ?>>已过期</option>
                        </select>
                    </div>
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width: 100px;">下单时间</label>
                    <div class="col-sm-8 col-lg-3 col-xs-12">
                        <?php echo tpl_form_field_daterange('time', array('starttime'=>($starttime ? date('Y-m-d', $starttime) : false),'endtime'=> ($endtime ? date('Y-m-d', $endtime) : false)));?>
                    </div>
                    <div class="col-sm-3 col-lg-3">
                        <button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>&nbsp;&nbsp;&nbsp;
						<button type="submit" name="export" value="1" class="btn btn-success">导出 Excel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
	
    <ul class="page-nav page-nav-tabs" style="background:none;float: left;margin-left: 0px;padding-left: 0px;border-bottom:1px #c5d0dc solid;">
        <li<?php  if($_GPC['status']=='' && !$_GPC['is_delete']) { ?> class="active"<?php  } ?>>
        <a href="<?php  echo $this->createWebUrl('order', array('op' => 'display'))?>">全部订单</a>
        </li>
		<li<?php  if(in_array($_GPC['status'], array('0'))) { ?> class="active"<?php  } ?>>
        <a href="<?php  echo $this->createWebUrl('order', array('op' => 'display', 'status' => 0))?>">待付款订单</a>
        </li>
        <li<?php  if($_GPC['status']==1) { ?> class="active"<?php  } ?>>
        <a href="<?php  echo $this->createWebUrl('order', array('op' => 'display', 'status' => 1))?>">已付款订单</a>
        </li>
        <li<?php  if($_GPC['status']==2) { ?> class="active"<?php  } ?>>
        <a href="<?php  echo $this->createWebUrl('order', array('op' => 'display', 'status' => 2))?>">已评价订单</a>
        </li>
        <li<?php  if($_GPC['status']==-1) { ?> class="active"<?php  } ?>>
        <a href="<?php  echo $this->createWebUrl('order', array('op' => 'display', 'status' => -1))?>">已取消订单</a>
        </li>
        <li<?php  if($_GPC['status']==-2) { ?> class="active"<?php  } ?>>
        <a href="<?php  echo $this->createWebUrl('order', array('op' => 'display', 'status' => -2))?>">已退款订单</a>
        </li>
		<li<?php  if($_GPC['is_delete']==1) { ?> class="active"<?php  } ?>>
        <a href="<?php  echo $this->createWebUrl('order', array('op' => 'display', 'is_delete' => 1))?>">订单回收站</a>
        </li>
		<li style="float:right;">
			<a style="font-weight:bold;color:#d9534f;">总数：<?php  echo $total;?></a>
        </li>
    </ul>
    <div class="panel panel-default">
        <div class="table-responsive panel-body">
            <table class="table table-hover">
                <thead class="navbar-inner">
                <tr>
					<th style="width:60px;">全选</th>
                    <th style="width:15%;">订单遍号</th>
                    <th style="width:18%;">昵称/姓名/手机号码</th>
                    <th style="width:18%;">课程名称</th>
                    <th style="width:8%;">价格</th>
					<th style="width:9%;">会员状态</th>
                    <th style="width:8%;">订单状态</th>
                    <th style="width:10%;">下单时间</th>
                    <th style="width:10%; text-align:right;">操作</th>
                </tr>
                </thead>
                <tbody>
                <?php  if(is_array($list)) { foreach($list as $item) { ?>
                <tr>
					<td><input type="checkbox" name="ids[]" value="<?php  echo $item['id'];?>"></td>
                    <td><?php  echo $item['ordersn'];?></td>
                    <td>
						<a href="<?php  echo $this->createWebUrl('agent', array('op'=>'detail','uid'=>$item['uid']));?>" target="_blank"><?php  echo $item['nickname'];?><br/><?php  echo $item['realname'];?>，<?php  echo $item['mobile'];?></a>
					</td>
                    <td>
						<?php  echo $item['bookname'];?>
						<br/>
						<em class="spec-name">
							规格:
							<?php  if($item['lesson_type']=='0') { ?>
								<?php echo $item['spec_day']>0 ? '有效期'.$item['spec_day'].'天' : '长期有效';?>
							<?php  } else if($item['lesson_type']=='1') { ?>
								<?php  echo $item['spec_name'];?>
							<?php  } ?>
						</em>
						
					</td>
                    <td><?php  echo $item['price'];?> 元</td>
					<td>
						<a href="<?php  echo $this->createWebUrl('viporder', array('op'=>'createOrder', 'uid'=>$item['uid']));?>" target="_blank">
                        <?php  if($item['vip'] == 0) { ?><span class="label label-default">普通</span><?php  } ?>
						<?php  if($item['vip'] == 1) { ?><span class="label label-primary">VIP</span><?php  } ?>
						</a>
                    </td>
                    <td>
                        <?php  if($item['status'] == 0) { ?><span class="label label-danger">待付款</span><?php  } ?>
						<?php  if($item['status'] >0) { ?>
							<span class="label label-success">
								<?php  if($item['paytype']) { ?>
									<?php  echo $orderPayType[$item['paytype']];?>
								<?php  } else { ?>
									已支付
								<?php  } ?>
							</span>
							<br/>
						<?php  } ?>
                        <?php  if($item['status'] == 2) { ?><span class="label label-warning">已评价</span><?php  } ?>
                        <?php  if($item['status'] == -1) { ?><span class="label label-default">已取消</span><?php  } ?>
                        <?php  if($item['status'] == -2) { ?><span class="label label-default">已退款</span><?php  } ?>
                    </td>
                    <td><?php  echo date('Y-m-d H:i', $item['addtime'])?></td>
                    <td style="text-align:right;">
                        <a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('order', array('op' => 'detail', 'id' => $item['id'], 'refurl'=>$_W['siteurl']))?>" data-toggle="tooltip" data-placement="bottom" data-original-title="查看订单"><i class="fa fa-pencil"></i></a>
                    </td>
                </tr>
                <?php  } } ?>
                </tbody>
            </table>
			<table class="table">
				<tbody>
					<tr>
						<td>
							<input type="checkbox" id="selAll" style="margin-right:10px;">
							<?php  if($_GPC['is_delete']) { ?>
								<input type="button" class="btn btn-danger" id="delAll" data-type="1" value="批量永久删除">
							<?php  } else { ?>
								<input type="button" class="btn btn-danger" id="delAll" data-type="0" value="批量加入回收站">
							<?php  } ?>
						</td>
					</tr>
				</tbody>
			</table>
            <?php  echo $pager;?>
        </div>
    </div>
</div>
<script type="text/javascript">
var ids = document.getElementsByName("ids[]");
var selectAll = false;
$("#selAll").click(function(){
	selectAll = !selectAll;
	for(var i=0; i<ids.length; i++){
		ids[i].checked = selectAll;
	}
});
$("#delAll").click(function(){
	var checkids = "";
	for(var i=0; i<ids.length; i++){
		if(ids[i].checked){
			checkids += (checkids === '' ? ids[i].value : ',' + ids[i].value);
		}
	}
	if(checkids===''){
		alert('请选择要操作的订单');
		return;
	}

	var type = $(this).attr("data-type");	
	if(type=='1'){
		if(!confirm('确定永久删除订单?')){
			return;
		}
		var postUrl = "<?php  echo $this->createWebUrl('order', array('op'=>'delAll'))?>";
	}else{
		if(!confirm('确定加入订单回收站?')){
			return;
		}
		var postUrl = "<?php  echo $this->createWebUrl('order', array('op'=>'recycle'))?>";
	}
	
	$.ajax({
		type: 'post',
		url: postUrl,
		data: {ids:checkids},
		dataType:'json',
		success: function(res){
			if(res.code===0){
				alert(res.msg);
				location.reload();
			}else{
				alert('网络请求超时，删除失败');
			}
		},
		error: function(error){
			alert('网络请求超时，请稍后重试!');
		}
	});
});
</script>