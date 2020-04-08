<?php defined('IN_IA') or exit('Access Denied');?><div class="main">
	<div class="alert alert-info">
	    模版消息所在行业：IT科技/互联网|电子商务。如果模版消息因微信下架了导致找不到，请留空
	</div>
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
		<div class="panel panel-default">
			<div class="panel-heading">
				模版消息通知
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">购买成功通知</label>
					<div class="col-sm-9">
						<div class="input-group">
							<input type="text" name="buysucc" value="<?php  echo $tplmessage['buysucc'];?>" class="form-control" />
							<a href="<?php  echo $this->createWebUrl('setting', array('op'=>'templateformat', 'tpl_code'=>'buysucc'));?>" class="input-group-addon">点击配置模版</a>
						</div>
						<span class="help-block">用户支付成功后模版消息通知，选择编号TM00976(购买成功通知)</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">结算成功通知</label>
					<div class="col-sm-9">
						<div class="input-group">
							<input type="text" name="cnotice" value="<?php  echo $tplmessage['cnotice'];?>" class="form-control" />
							<a href="<?php  echo $this->createWebUrl('setting', array('op'=>'templateformat', 'tpl_code'=>'cnotice'));?>" class="input-group-addon">点击配置模版</a>
						</div>
						<span class="help-block">下级购买课程时，上级获得佣金提醒，选择编号OPENTM409909643(结算成功通知)</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">成员加入提醒</label>
					<div class="col-sm-9">
						<div class="input-group">
							<input type="text" name="newjoin" value="<?php  echo $tplmessage['newjoin'];?>" class="form-control" />
							<a href="<?php  echo $this->createWebUrl('setting', array('op'=>'templateformat', 'tpl_code'=>'newjoin'));?>" class="input-group-addon">点击配置模版</a>
						</div>
						<span class="help-block">成功推荐下级加入时，给推荐上级提醒，选择编号OPENTM207685059(成员加入提醒)</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">新订单通知(管理员)</label>
					<div class="col-sm-9">
						<div class="input-group">
							<input type="text" name="neworder" value="<?php  echo $tplmessage['neworder'];?>" class="form-control" />
							<a href="<?php  echo $this->createWebUrl('setting', array('op'=>'templateformat', 'tpl_code'=>'neworder'));?>" class="input-group-addon">点击配置模版</a>
						</div>
						<span class="help-block">用户下新订单后通知管理员，选择编号OPENTM417875155(新订单通知)</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">提现申请通知(管理员)</label>
					<div class="col-sm-9">
						<div class="input-group">
							<input type="text" name="newcash" value="<?php  echo $tplmessage['newcash'];?>" class="form-control" />
							<a href="<?php  echo $this->createWebUrl('setting', array('op'=>'templateformat', 'tpl_code'=>'newcash'));?>" class="input-group-addon">点击配置模版</a>
						</div>
						<span class="help-block">用户申请提现到微信钱包且提现为人工审核时通知管理员，选择编号OPENTM405485000(提现申请通知)</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">讲师申请通知(管理员)</label>
					<div class="col-sm-9">
						<div class="input-group">
							<input type="text" name="apply_teacher" value="<?php  echo $tplmessage['apply_teacher'];?>" class="form-control" />
							<a href="<?php  echo $this->createWebUrl('setting', array('op'=>'templateformat', 'tpl_code'=>'apply_teacher'));?>" class="input-group-addon">点击配置模版</a>
						</div>
						<span class="help-block">用户申请讲师入驻时通知管理员审核，选择编号OPENTM408471635(等待审核通知)</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">申请讲师结果通知</label>
					<div class="col-sm-9">
						<div class="input-group">
							<input type="text" name="teacher_notice" value="<?php  echo $tplmessage['teacher_notice'];?>" class="form-control" />
							<a href="<?php  echo $this->createWebUrl('setting', array('op'=>'templateformat', 'tpl_code'=>'teacher_notice'));?>" class="input-group-addon">点击配置模版</a>
						</div>
						<span class="help-block">管理员审核讲师申请结果通知讲师，选择编号OPENTM408894858(审核结果通知)</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">优惠券入账通知</label>
					<div class="col-sm-9">
						<div class="input-group">
							<input type="text" name="receive_coupon" value="<?php  echo $tplmessage['receive_coupon'];?>" class="form-control" />
							<a href="<?php  echo $this->createWebUrl('setting', array('op'=>'templateformat', 'tpl_code'=>'receive_coupon'));?>" class="input-group-addon">点击配置模版</a>
						</div>
						<span class="help-block">已添加的老用户可自行决定是否保留，新用户请留空。</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">课程通知</label>
					<div class="col-sm-9">
						<input type="text" name="newlesson" value="<?php  echo $tplmessage['newlesson'];?>" class="form-control" />
						<div class="help-block">
							选择编号OPENTM400221044(课程通知)
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">邀请注册成功通知</label>
					<div class="col-sm-9">
						<input type="text" name="recommend_junior" value="<?php  echo $tplmessage['recommend_junior'];?>" class="form-control" />
						<span class="help-block">转发课程链接或课程海报成功邀请指定数量的下级，以便获得免费学习该课程资格。选择编号OPENTM401095581(邀请注册成功通知)</span>
					</div>
				</div>
			</div>
		</div>

		<div class="form-group col-sm-12">
			<input type="hidden" name="id" value="<?php  echo $tplmessage['id'];?>" />
			<input type="submit" name="submit" value="保存设置" class="btn btn-primary col-lg-1" />
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
		</div>
	</form>
</div>