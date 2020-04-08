<?php defined('IN_IA') or exit('Access Denied');?><div class="main">
    <div class="panel panel-info">
        <div class="panel-heading">筛选</div>
        <div class="panel-body">
            <form action="./index.php" method="get" class="form-horizontal" role="form">
                <input type="hidden" name="c" value="site" />
                <input type="hidden" name="a" value="entry" />
                <input type="hidden" name="m" value="fy_lessonv2" />
                <input type="hidden" name="do" value="video" />
                <input type="hidden" name="op" value="qiniu" />
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width:100px;">视频名称</label>
                    <div class="col-sm-2 col-lg-3">
                        <input class="form-control" name="keyword" type="text" value="<?php  echo $_GPC['keyword'];?>">
                    </div>
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width:100px;">讲师编号</label>
                    <div class="col-sm-2 col-lg-3">
                        <input class="form-control" name="teacherid" type="text" value="<?php  echo $_GPC['teacherid'];?>" placeholder="留空将检索后台上传的视频">
                    </div>
                </div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width: 100px;">上传时间</label>
                    <div class="col-sm-8 col-lg-3 col-xs-12">
                        <?php echo tpl_form_field_daterange('time', array('starttime'=>($starttime ? date('Y-m-d', $starttime) : false),'endtime'=> ($endtime ? date('Y-m-d', $endtime) : false)));?>
                    </div>
                    <div class="col-sm-3 col-lg-3">
                        <button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
						&nbsp;&nbsp;
						<a href="<?php  echo $this->createWebUrl('video',array('op'=>'upqiniu'));?>" class="btn btn-success"><i class="fa fa-plus"></i> 上传音视频</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <div class="panel panel-default">
        <form action="" method="post" class="form-horizontal form" >
        <div class="table-responsive panel-body">
            <table class="table table-hover">
                <thead class="navbar-inner">
                <tr>
                    <th style="width:15%;">视频预览</th>
                    <th style="width:15%;">视频名称</th>
                    <th style="width:10%;">视频大小</th>
					<th style="width:14%;">上传时间</th>
                    <th>文件链接</th>
					<th style="text-align:right;width:8%;">操作</th>
                </tr>
                </thead>
                <tbody style="font-size: 13px;">
                <?php  if(is_array($list)) { foreach($list as $key => $item) { ?>
                <tr>
                    <td>
						<a href="<?php  echo $this->createWebUrl('video', array('op'=>'qiniuPreview','id'=>$item['id']));?>"><img src="<?php echo MODULE_URL;?>template/mobile/<?php  echo $template;?>/images/videoCover.png?v=1" width="150"/></a>
					</td>
                    <td style="word-break:break-all;"><?php  echo $item['name'];?></td>
					<td><?php echo round(($item['size']/1024)/1024,2)?round(($item['size']/1024)/1024,2):0.01;?> MB</td>
					<td><?php  echo date('Y-m-d H:i:s', $item['addtime'])?></td>
                    <td>
                        <textarea style="width:300px;height:85px; border-radius:5px;" id="content<?php  echo $key;?>" style="overflow-y:auto;" onclick="selectTxt(this)"><?php  echo $qiniu['url'];?><?php  echo $item['com_name'];?></textarea>
                    </td>
					<td style="text-align:right;">
                        <a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('video', array('op'=>'delQiniu', 'id'=>$item['id']));?>" title="删除" onclick="return confirm('确认删除？');return false;"><i class="fa fa-remove"></i></a>
                    </td>
                </tr>
                <?php  } } ?>
                </tbody>
            </table>
            <?php  echo $pager;?>
        </div>
    </div>
    </form>
</div>
<script type="text/javascript">
function videoContro(obj, type){
	var myvideo = document.getElementById(obj.id);
	if(document.getElementById(obj.id).paused){
		document.getElementById(obj.id).play();
	}else{
		document.getElementById(obj.id).pause();
	}
}
function selectTxt(obj){
	$(obj).select();
}
</script>