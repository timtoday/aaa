<?php defined('IN_IA') or exit('Access Denied');?><div class="main">
    <div class="panel panel-info">
        <div class="panel-heading">筛选</div>
        <div class="panel-body">
            <form action="./index.php" method="get" class="form-horizontal" role="form">
                <input type="hidden" name="c" value="site" />
                <input type="hidden" name="a" value="entry" />
                <input type="hidden" name="m" value="fy_lessonv2" />
                <input type="hidden" name="do" value="teacher" />
                <input type="hidden" name="op" value="order" />
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width:100px;">订单编号</label>
                    <div class="col-sm-2 col-lg-3">
                        <input class="form-control" name="ordersn" type="text" value="<?php  echo $_GPC['ordersn'];?>">
                    </div>
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">用户昵称</label>
                    <div class="col-sm-2 col-lg-3">
                        <input class="form-control" name="nickname" id="" type="text" value="<?php  echo $_GPC['nickname'];?>">
                    </div>
                </div>
                <div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width:100px;">订单状态</label>
                    <div class="col-sm-8 col-lg-3 col-xs-12">
                        <select name="status" class="form-control">
                            <option value="">不限</option>
							<option value="0" <?php  if(in_array($_GPC['status'],array('0'))) { ?> selected="selected" <?php  } ?>>待付款</option>
							<option value="1" <?php  if($_GPC['status'] == 1) { ?> selected="selected" <?php  } ?>>已付款</option>
                        </select>
                    </div>
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">支付方式</label>
                    <div class="col-sm-8 col-lg-3 col-xs-12">
                        <select name="paytype" class="form-control">
                            <option value="">不限</option>
							<?php  if(is_array($orderPayType)) { foreach($orderPayType as $key => $item) { ?>
							<option value="<?php  echo $key;?>" <?php  if($_GPC['paytype'] == "$key") { ?> selected="selected" <?php  } ?>><?php  echo $item;?></option>
							<?php  } } ?>
                        </select>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width: 100px;">下单时间</label>
                    <div class="col-sm-8 col-lg-3 col-xs-12">
                        <?php echo tpl_form_field_daterange('time', array('starttime'=>($starttime ? date('Y-m-d', $starttime) : false),'endtime'=> ($endtime ? date('Y-m-d', $endtime) : false)));?>
                    </div>
                    <div class="col-sm-3 col-lg-3">
                        <button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>&nbsp;&nbsp;&nbsp;&nbsp;
						<button type="submit" name="export" value="1" class="btn btn-success">导出Excel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <div class="panel panel-default">
		<div class="panel-heading">总数：<?php  echo $total;?></div>
        <div class="table-responsive panel-body">
            <table class="table table-hover">
                <thead class="navbar-inner">
                <tr>
					<th style="width:60px;">全选</th>
                    <th style="width:15%;">订单编号</th>
                    <th style="width:10%;">用户昵称</th>
                    <th style="width:12%;">购买服务</th>
                    <th style="width:9%;">价格</th>
					<th style="width:14%;">一二三级佣金</th>
                    <th style="width:9%;">支付方式</th>
                    <th style="width:9%;">订单状态</th>
                    <th style="width:10%;">下单时间</th>
                    <th style="text-align:right;">操作</th>
                </tr>
                </thead>
                <tbody style="font-size: 13px;">
                <?php  if(is_array($list)) { foreach($list as $item) { ?>
                <tr>
					<td><input type="checkbox" name="ids[]" value="<?php  echo $item['id'];?>"></td>
                    <td><?php  if($item['paytype']=='vipcard') { ?><a href="<?php  echo $this->createWebUrl('viporder', array('op'=>'vipcard','ordersn'=>$item['ordersn']));?>"><?php  echo $item['ordersn'];?></a><?php  } else { ?><?php  echo $item['ordersn'];?><?php  } ?></td>
                    <td><?php  echo $item['nickname'];?><br/><?php  echo $item['mobile'];?></td>
                    <td>[<?php  echo $item['teacher_name'];?>]讲师-<?php  echo $item['ordertime'];?>天</td>
                    <td><?php  echo $item['price'];?> 元</td>
					<td><?php  echo $item['commission1'];?> / <?php  echo $item['commission2'];?> / <?php  echo $item['commission3'];?></td>
                    <td>
						<span class="label label-info">
						<?php  if($item['paytype']) { ?>
							<?php  echo $orderPayType[$item['paytype']];?>
						<?php  } else { ?>
							无
						<?php  } ?>
						</span>
                    </td>
                    <td>
                        <?php  if($item['status'] == 0) { ?><span class="label label-danger">待付款</span><?php  } ?>
						<?php  if($item['status'] == 1) { ?><span class="label label-success">已付款</span><?php  } ?>
                    </td>
                    <td><?php  echo date('Y-m-d H:i:s', $item['addtime'])?></td>
                    <td style="text-align:right;">
						<a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('teacher', array('op'=>'orderDetail', 'id'=>$item['id']))?>" title="查看订单"><i class="fa fa-pencil"></i></a>
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
							<input type="button" class="btn btn-danger" id="delAll" value="批量删除">
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

		if(!confirm('确定批量删除订单?')){
			return;
		}
		
		$.ajax({
			type: 'post',
			url: "<?php  echo $this->createWebUrl('teacher', array('op'=>'delAllOrder'))?>",
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