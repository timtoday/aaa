<?php defined('IN_IA') or exit('Access Denied');?><style type="text/css">
.form-controls{display: inline-block; width:70px;}
.cblock{display:block !important;}
.cnone{display:none !important;}
</style>
<div class="main">
	<div class="panel panel-info">
        <div class="panel-heading">筛选</div>
        <div class="panel-body">
            <form action="./index.php" method="get" class="form-horizontal" role="form">
                <input type="hidden" name="c" value="site">
                <input type="hidden" name="a" value="entry">
                <input type="hidden" name="m" value="fy_lessonv2">
                <input type="hidden" name="do" value="teacher">
                <input type="hidden" name="op" value="display">
                <div class="form-group">
				    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width:100px;">讲师名称</label>
                    <div class="col-sm-2 col-lg-3">
                        <input class="form-control" name="teacher" value="<?php  echo $_GPC['teacher'];?>">
                    </div>
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width: 100px;">首页推荐</label>
					<div class="col-sm-2 col-lg-3">
                        <select name="is_recommend" class="form-control">
                            <option value="">不限</option>
							<option value="1" <?php  if($_GPC['is_recommend']=='1') { ?>selected<?php  } ?>>开启推荐</option>
                            <option value="0" <?php  if($_GPC['is_recommend']=='0') { ?>selected<?php  } ?>>取消推荐</option>
                        </select>
                    </div>
                </div>
				<div class="form-group">
				    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width:100px;">讲师状态</label>
                    <div class="col-sm-2 col-lg-3">
                        <select name="status" class="form-control">
                            <option value="">不限</option>
							<option value="1" <?php  if($_GPC['status']==1) { ?>selected<?php  } ?>>审核通过</option>
                            <option value="2" <?php  if($_GPC['status']==2) { ?>selected<?php  } ?>>待审核</option>
							<option value="3" <?php  if($_GPC['status']==3) { ?>selected<?php  } ?>>隐藏中</option>
							<option value="-1" <?php  if($_GPC['status']==-1) { ?>selected<?php  } ?>>未通过</option>
                        </select>
                    </div>
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width:100px;">讲师类型</label>
                    <div class="col-sm-2 col-lg-3">
                        <select name="teachertype" class="form-control">
                            <option value="">不限</option>
							<option value="1" <?php  if($_GPC['teachertype']==1) { ?>selected<?php  } ?>>后台添加</option>
                            <option value="2" <?php  if($_GPC['teachertype']==2) { ?>selected<?php  } ?>>自行申请</option>
                        </select>
                    </div>
                </div>
				<div class="form-group">
				    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width:100px;">购买讲师分销</label>
                    <div class="col-sm-2 col-lg-3">
                        <select name="is_distribution" class="form-control">
							<option value="">不限</option>
							<option value="1" <?php  if($_GPC['is_distribution']=='1') { ?>selected<?php  } ?>>开启分销</option>
                            <option value="0" <?php  if($_GPC['is_distribution']=='0') { ?>selected<?php  } ?>>关闭分销</option>
                        </select>
                    </div>
                    <button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
					&nbsp;&nbsp;&nbsp;
					<a href="<?php  echo $this->createWebUrl('teacher', array('op'=>'post'));?>" class="btn btn-success"><i class="fa fa-plus"></i> 添加讲师</a>
                </div>
            </form>
        </div>
    </div>
	<div class="panel panel-default">
        <div class="panel-body">
            <table class="table table-hover">
                <thead class="navbar-inner">
                <tr>
                    <th style="width:8%;">讲师编号</th>
                    <th style="width:10%;">讲师名称</th>
					<th style="width:12%;">待提现佣金</br>累计佣金</th>
					<th style="width:10%;">手机号码</th>
					<th style="width:10%;">讲师类型</th>
					<th style="width:9%;">状态</th>
					<th style="width:8%;">排序</th>
                    <th style="width:10%;">申请时间</th>
                    <th style="width:10%; text-align:right;">操作</th>
                </tr>
                </thead>
                <tbody>
					<?php  if(is_array($list)) { foreach($list as $teacher) { ?>
                    <tr>
						<td><?php  echo $teacher['id'];?></td>
						<td><?php  echo $teacher['teacher'];?></td>
						<td>
							<?php echo $teacher['member']['nopay_lesson']?$teacher['member']['nopay_lesson']:0;?>元
							<br/>
							<?php  echo $teacher['member']['nopay_lesson'] + $teacher['member']['pay_lesson'];?>元
						</td>
						<td><?php  echo $teacher['mobile'];?></td>
						<td>
							<?php  if(!empty($teacher['uid'])) { ?>
								<span class="label label-primary">自行申请</span>
							<?php  } else { ?>
								<span class="label label-default">后台添加</span>
							<?php  } ?>
						</td>
						<td>
							<?php  if($teacher['status']==-1) { ?>
								<span class="label label-default">未通过</span>
							<?php  } else if($teacher['status']==1) { ?>
								<span class="label label-success">审核通过</span>
							<?php  } else if($teacher['status']==2) { ?>
								<span class="label label-danger">待审核</span>
							<?php  } else if($teacher['status']==3) { ?>
								<span class="label label-info">隐藏中</span>
							<?php  } ?>
							<br/>
							<?php  if($teacher['is_recommend']==1) { ?>
								<span class="label label-success" style="line-height:30px;">首页推荐</span>
							<?php  } ?>
						</td>
						<td><?php  echo $teacher['displayorder'];?></td>
						<td><?php  echo date('Y-m-d',$teacher['addtime']);?></td>
						<td style="text-align:right;">
							<div class="btn-group btn-group-sm">
								<a class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="javascript:;">功能列表 <span class="caret"></span></a>
								<ul class="dropdown-menu dropdown-menu-left" role="menu" style='z-index: 99999'>
									<li><a href="<?php  echo $this->createWebUrl('teacher', array('op'=>'post', 'id'=>$teacher['id'], 'refurl'=>$_W['siteurl']));?>"><i class="fa fa-pencil"></i> 编辑讲师</a></li>
									<li><a href="<?php  echo $this->createWebUrl('lesson', array('teacherid'=>$teacher['id']));?>"><i class="fa fa-list"></i> 查看课程</a></li>
									<li><a href="<?php  echo $this->createWebUrl('teacher', array('op'=>'teacherMember','teacherid'=>$teacher['id']));?>"><i class="fa fa-user-plus"></i> 查看学员</a></li>
									<li><a href="<?php  echo $this->createWebUrl('teacher', array('op'=>'createOrder','teacherid'=>$teacher['id']));?>"><i class="fa fa-plus-circle"></i> 创建订单</a></li>
									<li><a href="<?php  echo $this->createWebUrl('teacher', array('op'=>'qrcode', 'teacherid'=>$teacher['id']));?>"><i class="fa fa-download"></i> 讲师二维码</a></li>
									<li><a href="<?php  echo $this->createWebUrl('teacher', array('op'=>'delTeacher', 'id'=>$teacher['id']));?>" onclick="return confirm('此操作不可恢复，确认删除？');return false;"><i class="fa fa-times"></i> &nbsp;删除讲师</a></li>
								</ul>
							</div>
						</td>
					</tr>
					<?php  } } ?>
				</tbody>
            </table>
			<?php  echo $pager;?>
		</div>
	</div>
</div>