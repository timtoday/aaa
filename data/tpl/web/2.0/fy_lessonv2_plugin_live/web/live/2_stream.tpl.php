<?php defined('IN_IA') or exit('Access Denied');?><style type="text/css">
.table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td{
	vertical-align: middle;
}
</style>
<div class="main">
    <div class="panel panel-info">
        <div class="panel-heading">筛选</div>
        <div class="panel-body">
            <form action="./index.php" method="get" class="form-horizontal">
                <input type="hidden" name="c" value="site" />
                <input type="hidden" name="a" value="entry" />
                <input type="hidden" name="m" value="fy_lessonv2_plugin_live" />
                <input type="hidden" name="do" value="live" />
                <input type="hidden" name="op" value="stream" />
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width:100px;">流名称</label>
                    <div class="col-sm-2 col-lg-3">
                        <input class="form-control" name="stream_name" type="text" value="<?php  echo $_GPC['stream_name'];?>">
                    </div>
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width:100px;">直播平台</label>
                    <div class="col-sm-8 col-lg-3 col-xs-12">
                        <select name="type" class="form-control">
                            <option value="">不限</option>
							<option value="1" <?php  if($_GPC['type'] == 1) { ?>selected<?php  } ?>>腾讯云直播</option>
							<option value="2" <?php  if($_GPC['type'] == 2) { ?>selected<?php  } ?>>阿里云直播</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width:100px;">流状态</label>
                    <div class="col-sm-8 col-lg-3 col-xs-12">
						<label class="radio-inline"><input type="radio" name="status" value='' <?php  if($_GPC['status']=='') { ?>checked<?php  } ?>>不限</label>
						<label class="radio-inline"><input type="radio" name="status" value="1" <?php  if($_GPC['status']==1) { ?>checked<?php  } ?>>有效</label>
						<label class="radio-inline"><input type="radio" name="status" value="-1" <?php  if($_GPC['status']==-1) { ?>checked<?php  } ?>>过期</label>
					</div>
					<div class="col-sm-3 col-lg-3">
                        <button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
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
                    <th style="width:5%;">ID</th>
                    <th style="width:18%;">流名称</th>
                    <th style="width:13%;">平台类型</th>
                    <th style="width:18%;">有效期</th>
					<th style="width:13%;">状态</th>
					<th style="width:18%;">添加时间</th>
                    <th style="width:13%;text-align:right;">操作</th>
                </tr>
                </thead>
                <tbody>
                <?php  if(is_array($list)) { foreach($list as $item) { ?>
                <tr>
                    <td><?php  echo $item['id'];?></td>
                    <td><?php  echo $item['stream_name'];?></td>
                    <td>
						<?php  if($item['type']==1) { ?>
							<span class="label label-warning">腾讯云直播</span>
						<?php  } else if($item['type']==2) { ?>
							<span class="label label-primary">阿里云直播</span>
						<?php  } ?>
                    </td>
                    <td>
                        <?php  if($item['validity']) { ?>
							<?php  echo date('Y-m-d H:i:s', $item['validity'])?>
						<?php  } ?>
                    </td>
					<td>
                        <?php  if($item['validity']) { ?>
							<?php  if(time() < $item['validity']) { ?>
								<span class="label label-success">有效</span>
							<?php  } else { ?>
								<span class="label label-danger">过期</span>
							<?php  } ?>
						<?php  } ?>
                    </td>
                    <td><?php  echo date('Y-m-d H:i:s', $item['addtime'])?></td>
                    <td style="text-align:right;">
						<a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('live', array('op'=>'streamDetails','id'=>$item['id']))?>" data-toggle="tooltip" data-placement="bottom" data-original-title="查看流"><i class="fa fa-pencil"></i></a>
						<a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('live', array('op'=>'delStream','id'=>$item['id']))?>" onclick="return confirm('该操作无法撤销恢复，确定删除?');" data-toggle="tooltip" data-placement="bottom" data-original-title="删除流"><i class="fa fa-remove"></i></a>
                    </td>
                </tr>
                <?php  } } ?>
                </tbody>
            </table>
            <?php  echo $pager;?>
        </div>
    </div>
</div>