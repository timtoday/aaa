<?php defined('IN_IA') or exit('Access Denied');?><style type="text/css">
.form-controls{display: inline-block; width:70px;}
.cblock{display:block !important;}
.cnone{display:none !important;}
</style>
<link rel="stylesheet" type="text/css" href="<?php echo MODULE_URL;?>template/web/style/category.css">
<div class="main">
	<div class="alert alert-info">
		1、如课程分类设置了“语文>一年级”后，还存在(版本)“人教版、苏教版...”和(上下册)“上册、下册”时，此时可以通过课程属性来解决，最多可添加两个课程属性。<br/>
		2、属性名称为空时，该属性不显示。
	</div>
    <div class="category">
        <form action="" method="post">
            <div class="panel panel-default">
                <div class="panel-body table-responsive">
					<div class="dd" id="div_nestable">
						<ol class="dd-list" style="margin-bottom:15px;">
							<li class="dd-item">
								<button data-action="collapse" id="collapse1" type="button" style="display:none;" onclick="collapse(1);">Collapse</button>
								<?php  if(!empty($attribute1)) { ?>
								<button data-action="expand" id="expand1" type="button" style="display:block;" onclick="expand(1);">Expand</button>
								<?php  } else { ?>
								<button data-action="collapse" type="button" style="display: block;">collapse</button>
								<?php  } ?>
								<div class="dd-handle" style="width:500px;background:#eff5e9;">
									<input type="text" class="form-control" name="lesson_attribute[attribute1]" value="<?php  echo $lesson_attribute['attribute1'];?>" style="width:100px;display:inline-block;" placeholder="属性名称">
									<span class="pull-right">
										<a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('lesson', array('op'=>'addAttribute','type'=>'attribute1'))?>" title="添加属性值"><i class="fa fa-plus"></i></a>
										<a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('lesson', array('op'=>'delAttribute','type'=>'attribute1'))?>" title="删除" onclick="return confirm('确定删除该属性下的所有属性值?');return false;"><i class="fa fa-remove"></i></a>
									</span>
								</div>
								<?php  if(is_array($attribute1)) { foreach($attribute1 as $item) { ?>
								<ol class="dd-list attribute1" style="display:none;width:500px;">
									<li class="dd-item">
										<div class="dd-handle">
											<input type="text" class="form-control" name="displayorder[<?php  echo $item['id'];?>]" value="<?php  echo $item['displayorder'];?>" style="width: 70px;display:inline-block;" placeholder="排序"> <?php  echo $item['name'];?>
											<span class="pull-right" style="margin-top:-5px;">
												<a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('lesson', array('op'=>'addAttribute', 'type'=>'attribute1', 'id'=>$item['id']))?>" title="修改"><i class="fa fa-edit"></i></a>
												<a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('lesson', array('op'=>'delAttribute', 'id'=>$item['id']))?>" title="删除属性值" onclick="return confirm('该操作不可恢复，确定删除？');return false;"><i class="fa fa-remove"></i></a>
											</span>
										</div>
									</li>
								</ol>
								<?php  } } ?>
							</li>
						</ol>

						<ol class="dd-list" style="margin-bottom:15px;">
							<li class="dd-item">
								<button data-action="collapse" id="collapse2" type="button" style="display:none;" onclick="collapse(2);">Collapse</button>
								<?php  if(!empty($attribute2)) { ?>
								<button data-action="expand" id="expand2" type="button" style="display:block;" onclick="expand(2);">Expand</button>
								<?php  } else { ?>
								<button data-action="collapse" type="button" style="display: block;">collapse</button>
								<?php  } ?>
								<div class="dd-handle" style="width:500px;background:#eff5e9;">
									<input type="text" class="form-control" name="lesson_attribute[attribute2]" value="<?php  echo $lesson_attribute['attribute2'];?>" style="width:100px;display:inline-block;" placeholder="属性名称">
									<span class="pull-right">
										<a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('lesson', array('op'=>'addAttribute','type'=>'attribute2'))?>" title="添加属性值"><i class="fa fa-plus"></i></a>
										<a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('lesson', array('op'=>'delAttribute','type'=>'attribute2'))?>" title="删除" onclick="return confirm('确定删除该属性下的所有属性值?');return false;"><i class="fa fa-remove"></i></a>
									</span>
								</div>
								<?php  if(is_array($attribute2)) { foreach($attribute2 as $item) { ?>
								<ol class="dd-list attribute2" style="display:none;width:500px;">
									<li class="dd-item">
										<div class="dd-handle">
											<input type="text" class="form-control" name="displayorder[<?php  echo $item['id'];?>]" value="<?php  echo $item['displayorder'];?>" style="width: 70px;display:inline-block;" placeholder="排序"> <?php  echo $item['name'];?>
											<span class="pull-right" style="margin-top:-5px;">
												<a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('lesson', array('op'=>'addAttribute', 'type'=>'attribute2', 'id'=>$item['id']))?>" title="修改"><i class="fa fa-edit"></i></a>
												<a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('lesson', array('op'=>'delAttribute', 'id'=>$item['id']))?>" title="删除属性值" onclick="return confirm('该操作不可恢复，确定删除？');return false;"><i class="fa fa-remove"></i></a>
											</span>
										</div>
									</li>
								</ol>
								<?php  } } ?>
							</li>
						</ol>

						<table class="table">
							 <tbody>
								 <tr>
									 <td>
										 <input name="submit" type="submit" class="btn btn-success" value="批量保存">
										 <input type="hidden" name="token" value="<?php  echo $_W['token'];?>">
									 </td>
								 </tr>
							 </tbody>
						</table>
					</div>
					<?php  echo $pager;?>
				</div>
			</div>
		</form>
	</div>
</div>
<script type="text/javascript">
function collapse(obj){
	$("#collapse"+obj).hide();
	$("#expand"+obj).show();
	$(".attribute"+obj).hide();
}
function expand(obj){
	$("#expand"+obj).hide();
	$("#collapse"+obj).show();
	$(".attribute"+obj).show();
}
</script>