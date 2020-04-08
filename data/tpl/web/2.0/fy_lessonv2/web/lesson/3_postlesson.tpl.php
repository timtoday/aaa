<?php defined('IN_IA') or exit('Access Denied');?><script type="text/javascript" src="<?php echo MODULE_URL;?>template/web/style/lessonTab/prefixfree.min.js?v=<?php  echo $versions;?>"></script>
<link href="<?php echo MODULE_URL;?>template/web/style/lessonTab/lesson-tab.css?v=<?php  echo $versions;?>" rel="stylesheet">

<script type="text/javascript" src="<?php echo MODULE_URL;?>template/web/style/poster/designer.js?v=<?php  echo $versions;?>"></script>
<script type="text/javascript" src="<?php echo MODULE_URL;?>template/web/style/poster/jquery.contextMenu.js?v=<?php  echo $versions;?>"></script>
<link href="<?php echo MODULE_URL;?>template/web/style/poster/jquery.contextMenu.css?v=<?php  echo $versions;?>" rel="stylesheet">
<link href="<?php echo MODULE_URL;?>template/web/style/poster/poster.css?v=<?php  echo $versions;?>" rel="stylesheet">

<div class="main">
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" onsubmit="return checkSubmit();">
		<div class="tab-group">
			<section id="tab1" title="基本信息" class="lesson-tab-section">
				<div class="panel-body">
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red;font-weight:bolder;">*</span>课程类型</label>
						<div class="col-sm-9">
							<?php  if(is_array($lessonTypeList)) { foreach($lessonTypeList as $key => $item) { ?>
								<?php  if($key!=3) { ?>
								<label class="radio-inline"><input type="radio" name="lesson_type" value="<?php  echo $key;?>" <?php  if((empty($lesson) && $key==0) || $lesson['lesson_type'] == $key) { ?>checked="true"<?php  } ?>/> <?php  echo $item;?></label>&nbsp;&nbsp;
								<?php  } ?>
							<?php  } } ?>
							<span class="help-block">
								普通课程为音频、视频以及图文等录播课程；报名课程下单时需要一起提交相关信息，线上支付后获得二维码，凭借二维码到线下核销听课；小程序课程仅作为演示使用。
							</span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red;font-weight:bolder;">*</span>课程名称</label>
						<div class="col-sm-9">
							<input type="text" name="bookname" class="form-control" value="<?php  echo $lesson['bookname'];?>" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red;font-weight:bolder;">*</span>课程分类</label>
						<div class="col-sm-8 col-xs-12">
							<div class="row row-fix tpl-category-container">
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
									<select class="form-control" id="category_parent" name="pid" onchange="renderCategory(this.value)">
										<option value="0">请选择一级分类</option>
										<?php  if(is_array($category)) { foreach($category as $item) { ?>
										<option value="<?php  echo $item['id'];?>"><?php  echo $item['name'];?></option>
										<?php  } } ?>
									</select>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
									<select class="form-control" id="category_child" name="cid">
										<option value="0">请选择二级分类</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<?php  if($lesson_attribute['attribute1'] && $attribute1) { ?>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"><?php  echo $lesson_attribute['attribute1'];?></label>
						<div class="col-sm-8 col-xs-12">
							<div class="row row-fix tpl-category-container">
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
									<select class="form-control" name="attribute1">
										<option value="0">请选择</option>
										<?php  if(is_array($attribute1)) { foreach($attribute1 as $item) { ?>
										<option value="<?php  echo $item['id'];?>" <?php  if($lesson['attribute1']==$item['id']) { ?>selected<?php  } ?>><?php  echo $item['name'];?></option>
										<?php  } } ?>
									</select>
								</div>
							</div>
						</div>
					</div>
					<?php  } ?>
					<?php  if($lesson_attribute['attribute2'] && $attribute2) { ?>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"><?php  echo $lesson_attribute['attribute2'];?></label>
						<div class="col-sm-8 col-xs-12">
							<div class="row row-fix tpl-category-container">
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
									<select class="form-control" name="attribute2">
										<option value="0">请选择</option>
										<?php  if(is_array($attribute2)) { foreach($attribute2 as $item) { ?>
										<option value="<?php  echo $item['id'];?>" <?php  if($lesson['attribute2']==$item['id']) { ?>selected<?php  } ?>><?php  echo $item['name'];?></option>
										<?php  } } ?>
									</select>
								</div>
							</div>
						</div>
					</div>
					<?php  } ?>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red;font-weight:bolder;">*</span>讲师名称</label>
						<div class="col-sm-3">
							<select name="teacherid" class="form-control">
								<option value="">请选择...</option>
								<?php  if(is_array($teacher_list)) { foreach($teacher_list as $teacher) { ?>
								<option value="<?php  echo $teacher['id'];?>" <?php  if($teacher['id']==$lesson['teacherid']) { ?>selected<?php  } ?>><?php  echo $teacher['first_letter'];?>-<?php  echo $teacher['teacher'];?></option>
								<?php  } } ?>
							</select>
						</div>
					</div>
					<?php  if($setting['show_teacher_income']) { ?>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red;font-weight:bolder;">*</span>讲师分成</label>
						<div class="col-sm-9">
							<div class="input-group">
								<input type="text" name="teacher_income" class="form-control" value="<?php  echo $lesson['teacher_income'];?>" />
								<span class="input-group-addon">%</span>
							</div>
							<div class="help-block">讲师分成 = 课程售价 x 讲师分成百分比</div>
						</div>
					</div>
					<?php  } ?>
					<?php  if($setting['company_income']) { ?>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red;font-weight:bolder;">*</span>机构分成</label>
						<div class="col-sm-9">
							<div class="input-group">
								<input type="text" name="company_income" class="form-control" value="<?php  echo $lesson['company_income'];?>" />
								<span class="input-group-addon">%</span>
							</div>
							<div class="help-block">机构分成 = 课程售价 x 机构分成百分比</div>
						</div>
					</div>
					<?php  } ?>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red;font-weight:bolder;">*</span>课程封面</label>
						<div class="col-sm-9">
							<?php  echo tpl_form_field_image('images', $lesson['images'])?>
							<span class="help-block">建议尺寸 600 * 365px，也可根据自己的实际情况做图片尺寸</span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">免费学习等级</label>
						<div class="col-xs-9 col-sm-9" style="margin-top: 7px;">
						   <?php  if(is_array($level_list)) { foreach($level_list as $key => $level) { ?>
								<label><input type="checkbox" name="vipview[]" value="<?php  echo $level['id'];?>" <?php  if(in_array($level['id'],$vipview)) { ?>checked<?php  } ?>><?php  echo $level['level_name'];?></label>&nbsp;&nbsp;
								<?php  if(($key+1)%4==0) { ?><br/><?php  } ?>
						   <?php  } } ?>
						   <span class="help-block">选中的VIP等级级别会员可免费学习该课程</span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">课程难度</label>
						<div class="col-sm-9">
							<input type="text" name="difficulty" class="form-control" value="<?php  echo $lesson['difficulty'];?>" />
							<div class="help-block">例如：入门篇、进阶篇、高级篇</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">排序</label>
						<div class="col-sm-9">
							<input type="text" name="displayorder" class="form-control" value="<?php  echo $lesson['displayorder'];?>" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">开始学习</label>
						<div class="col-sm-9">
							<div class="input-group">
								<span class="input-group-addon">自定义名称</span>
								<input type="text" name="buynow_info[study_name]" value="<?php  echo $buynow_info['study_name'];?>" class="form-control">
								<span class="input-group-addon">网页链接</span>
								<input type="text" name="buynow_info[study_link]" value="<?php  echo $buynow_info['study_link'];?>" class="form-control" placeholder="含http://或https://">
							</div>
							<span class="help-block">默认请留空，课程详情页右下角“开始学习”自定义名称，显示优先级：此处设置名称 > 参数设置里[开始学习] > 默认名称[开始学习]</span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">立即购买</label>
						<div class="col-sm-9">
							<div class="input-group">
								<span class="input-group-addon">自定义名称</span>
								<input type="text" name="buynow_info[buynow_name]" value="<?php  echo $buynow_info['buynow_name'];?>" class="form-control">
								<span class="input-group-addon">网页链接</span>
								<input type="text" name="buynow_info[buynow_link]" value="<?php  echo $buynow_info['buynow_link'];?>" class="form-control" placeholder="含http://或https://">
							</div>
							<span class="help-block">默认请留空，课程详情页右下角“立即购买”名称，显示优先级：此处设置名称 > 参数设置里[立即购买]。如果参数设置里设置了立即购买跳转链接，本课程想保留默认购买方式，网页链接请填写#</span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">默认显示</label>
						<div class="col-sm-9">
							<label class="radio-inline"><input type="radio" name="lesson_show" value="0" <?php  if($lesson['lesson_show']==0) { ?>checked<?php  } ?>> 系统默认</label>&nbsp;
							<label class="radio-inline"><input type="radio" name="lesson_show" value="1" <?php  if($lesson['lesson_show']==1) { ?>checked<?php  } ?>> 课程详情</label>&nbsp;
							<label class="radio-inline"><input type="radio" name="lesson_show" value="2" <?php  if($lesson['lesson_show']==2) { ?>checked<?php  } ?>> 课程目录</label>
							<span class="help-block">用户进入课程详情页时默认显示的页面，该优先级大于“基本设置~手机端显示”里的“课程详情页默认显示”优先级</span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red;font-weight:bolder;">*</span>课程状态</label>
						<div class="col-sm-9">
							<?php  if(is_array($lessonStatusList)) { foreach($lessonStatusList as $key => $item) { ?>
								<label class="radio-inline">
									<input type="radio" name="status" value="<?php  echo $key;?>" <?php  if($lesson['status'] == "$key") { ?>checked="true"<?php  } ?> /> <?php  echo $item;?>
								</label>
							<?php  } } ?>
							<span class="help-block">【上架】课程正常销售；【下架】【审核中】课程将不能再进行访问或购买；【隐藏】的课程不显示在手机端，但是可以通过链接访问；【暂停销售】已购买课程用户可正常访问，未购买用户不能访问。</span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red;font-weight:bolder;">*</span>连载状态</label>
						<div class="col-sm-9">
							<label class="radio-inline">
								<input type="radio" name="section_status" value="1" <?php  if(empty($lesson) || $lesson['section_status'] == 1) { ?>checked="true"<?php  } ?> /><span class="label label-success">更新中</span>
							</label>
							&nbsp;&nbsp;
							<label class="radio-inline">
								<input type="radio" name="section_status" value="0" <?php  if(!empty($lesson) && $lesson['section_status'] == 0) { ?>checked="true"<?php  } ?> /><span class="label label-default">已完结</span>
							</label>
						</div>
					</div>
					<?php  if($lesson['id']) { ?>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">课程链接(手机端)</label>
						<div class="col-sm-9">
							<div style="padding-top:8px;font-size: 14px;"><a href="javascript:;" id="copy-btn"><?php  echo $_W['siteroot'];?>app/<?php  echo str_replace("./", "", $this->createMobileUrl('lesson', array('id'=>$lesson['id'])));?></a></div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">课程链接(PC端)</label>
						<div class="col-sm-9">
							<a href="javascript:;" id="copy-pc-btn" style="line-height:33px;"><?php  echo $setting_pc['site_root'];?><?php  echo $uniacid;?>/lesson.html?id=<?php  echo $lesson['id'];?></a>
						</div>
					</div>
					<?php  } ?>
				</div>
			</section>
			<section id="tab2" title="价格信息" class="lesson-tab-section">
				<div class="panel-body">
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">课程价格</label>
						<div class="col-sm-9">
							<div class="input-group">
								<input type="text" name="price" class="form-control" value="<?php  echo $lesson['price'];?>" readonly="readonly"/>
								<span class="input-group-addon">元</span>
							</div>
							<div class="help-block">该选项无需填写，请添加“课程规格”即可，系统自动获取规格最低价格，0为免费课程</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">课程总库存</label>
						<div class="col-sm-9">
							<div class="input-group">
								<input type="text" name="stock" class="form-control" value="<?php  echo $lesson['stock'];?>" readonly="readonly"/>
								<span class="input-group-addon">元</span>
							</div>
							<div class="help-block">该选项无需填写，请添加“课程规格”即可，系统自动获取所有课程规格的总库存</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">课程规格</label>
						<div class="col-sm-9">
							<div class="form-group item">
								<div class="col-sm-12">
									<?php  if(is_array($spec_list)) { foreach($spec_list as $item) { ?>
									<div class="input-group">
										<span class="input-group-addon">有效期</span>
										<input type="text" name="spec_time[]" value="<?php  echo $item['spec_day'];?>" class="form-control">
										<span class="input-group-addon">天</span>
										<span class="input-group-addon">需</span>
										<input type="text" name="spec_price[]" value="<?php  echo $item['spec_price'];?>" class="form-control">
										<span class="input-group-addon">元</span>
										<span class="input-group-addon">库存</span>
										<input type="text" name="spec_stock[]" value="<?php  echo $item['spec_stock'];?>" class="form-control">
										<span class="input-group-addon">报名课程规格</span>
										<input type="text" name="spec_name[]" value="<?php  echo $item['spec_name'];?>" class="form-control">
										<span class="input-group-addon">排序</span>
										<input type="text" name="spec_sort[]" value="<?php  echo $item['spec_sort'];?>" class="form-control">
										<input type="hidden" name="spec_id[]" value="<?php  echo $item['spec_id'];?>" >
									</div>
									<?php  } } ?>
									<div id="specdiv"></div>
								</div>
							</div>
							<a href="javascript:;" id="spec-add" style="color:#0e9e53;"><i class="fa fa-plus-circle"></i> 点击添加新规格</a>
							<span class="help-block">
								1、有效期为-1表示永久有效，保存时，“有效期”为空的规格将自动删除<br/>
								2、报名课程有效期可任意填写，报名课程规格仅显示在报名课程里，序号越大，排序越靠前<br/>
								3、如需开启库存，请先在“基本设置—>全局设置”里开启课程库存
							</span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">VIP会员课程折扣</label>
						<div class="col-sm-9">
							<label class="radio-inline">
								<input type="radio" name="isdiscount" value="1" <?php  if($lesson['isdiscount']==1) { ?>checked<?php  } ?>>开启
							</label>
							<label class="radio-inline">
								<input type="radio" name="isdiscount" value="0" <?php  if($lesson['isdiscount']==0) { ?>checked<?php  } ?>>关闭
							</label>
							<span class="help-block">开启VIP会员课程折扣后，VIP会员购买课程将享受优惠</span>
						</div>
					</div>
					<div class="form-group vip-discount" <?php  if($lesson['isdiscount']==0) { ?>style="display: none;"<?php  } ?>>
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">会员折扣</label>
						<div class="col-sm-9">
							<div class="input-group">
								<span class="input-group-addon">优惠折扣</span>
								<input type="text" name="vipdiscount" class="form-control" value="<?php  echo $lesson['vipdiscount'];?>" />
								<span class="input-group-addon">%</span>
								<span class="input-group-addon">（或）优惠固定金额</span>
								<input type="text" name="vipdiscount_money" value="<?php  echo $lesson['vipdiscount_money'];?>" class="form-control">
								<span class="input-group-addon">元</span>
							</div>
							<span class="help-block">
								1、开启VIP会员课程折扣后，以上选项只能二选一，两者都选以优惠折扣(%)为准。以上两项都留空或为0表示使用当前会员对应的VIP会员等级最低折扣；<br/>
								2、课程最终价格 = 课程售价 * 优惠折扣(%); 【或】 课程最终价格 = 课程售价 - 优惠固定金额;
							</span>
						</div>
					</div>
				</div>
			</section>
			<section id="tab3" title="课程介绍" class="lesson-tab-section">
				<div class="panel-body">
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">课程介绍</label>
						<div class="col-sm-9">
							<?php  echo tpl_ueditor('descript', $lesson['descript']);?>
							<div class="help-block"></div>
						</div>
					</div>
				</div>
			</section>
			<section id="tab4" title="营销信息" class="lesson-tab-section">
				<div class="panel-body">
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">赠送固定积分</label>
						<div class="col-sm-9">
							<div class="input-group">
								<input type="text" name="integral" class="form-control" value="<?php  echo $lesson['integral'];?>" />
								<span class="input-group-addon">积分</span>
							</div>
							<div class="help-block">购买该课程赠送固定的积分数，0为关闭</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">赠送比例积分</label>
						<div class="col-sm-9">
							<div class="input-group">
								<input type="text" name="integral_rate" class="form-control" value="<?php  echo $lesson['integral_rate'];?>" />
								<span class="input-group-addon"></span>
							</div>
							<div class="help-block"><strong style="color:#777;">启用该选项后会自动覆盖赠送固定积分选项，</strong>购买该课程赠送支付金额一定比例的积分，0为关闭。例如设置1.5，用户购买课程实际支付50元，则获赠1.5x50=75积分</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">购买最多抵扣积分</label>
						<div class="col-sm-9">
							<div class="input-group">
								<input type="text" name="deduct_integral" class="form-control" value="<?php  echo $lesson['deduct_integral'];?>" />
								<span class="input-group-addon">积分</span>
							</div>
							<div class="help-block">用户购买课程时最多可用积分抵扣的数量，<strong style="color:#777;">请先在“营销管理—>抵扣设置”里设置积分抵扣</strong></div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">虚拟购买人数</label>
						<div class="col-sm-9">
							<div class="input-group">
								<input type="text" name="virtual_buynum" class="form-control" value="<?php  echo $lesson['virtual_buynum'];?>" />
								<span class="input-group-addon">人</span>
							</div>
							<div class="help-block">
								【免费课程】学习人数 = 虚拟购买人数 + 真实购买人数 + vip访问量 + 购买讲师服务访问量 + 总访问量<br/>
								【付费课程】学习人数 = 虚拟购买人数 + 真实购买人数 + vip访问量 + 购买讲师服务访问量
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">推荐到板块</label>
						<div class="col-xs-9 col-sm-9" style="margin-top: 7px;">
						   <?php  if(is_array($rec_list)) { foreach($rec_list as $key => $rec) { ?>
								<input type="checkbox" name="recid[]" value="<?php  echo $rec['id'];?>" <?php  if(in_array($rec['id'],$recidarr)) { ?>checked<?php  } ?>><?php  echo $rec['rec_name'];?>&nbsp;&nbsp;
								<?php  if(($key+1)%4==0) { ?><br/><?php  } ?>
						   <?php  } } ?>
					   </div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">优惠券抵扣</label>
						<div class="col-sm-9">
							<label class="radio-inline"><input type="radio" name="support_coupon" value="1" <?php  if(empty($lesson) || $lesson['support_coupon'] == 1) { ?>checked="true"<?php  } ?> /> 支持</label>
							&nbsp;&nbsp;
							<label class="radio-inline"><input type="radio" name="support_coupon" value="0" <?php  if(!empty($lesson) && $lesson['support_coupon'] == 0) { ?>checked="true"<?php  } ?> /> 不支持</label>
							<span class="help-block">不支持优惠券抵扣的课程将无法使用优惠券抵扣支付金额</span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">课程小标识</label>
						<div class="col-sm-9">
							<label class="radio-inline"><input type="radio" name="ico_name" value="ico-new" <?php  if($lesson['ico_name'] == 'ico-new') { ?>checked="true"<?php  } ?> /> New新课程</label>
							&nbsp;
							<label class="radio-inline"><input type="radio" name="ico_name" value="ico-hot" <?php  if($lesson['ico_name'] == 'ico-hot') { ?>checked="true"<?php  } ?> /> Hot人气</label>
							&nbsp;
							<label class="radio-inline"><input type="radio" name="ico_name" value="ico-vip" <?php  if($lesson['ico_name'] == 'ico-vip') { ?>checked="true"<?php  } ?> /> VIP免费</label>
							&nbsp;
							<label class="radio-inline"><input type="radio" name="ico_name" value="" <?php  if($lesson['ico_name'] == '') { ?>checked="true"<?php  } ?> /> 无</label>
							<span class="help-block">选择的小标识将显示在课程的右上角，当课程小标识选择“VIP免费”时，只有VIP免费课程右上角会出现“VIP免费”标识。</span>
						</div>
					</div>
				</div>
			</section>
			<section id="tab5" title="分销分享" class="lesson-tab-section">
				<div class="panel-body">
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">佣金类型</label>
						<div class="col-sm-9">
							<label class="radio-inline">
								<input type="radio" name="commission_type" value="0" <?php  if($commission['commission_type']==0) { ?>checked<?php  } ?>>按佣金比例
							</label>
							<label class="radio-inline">
								<input type="radio" name="commission_type" value="1" <?php  if($commission['commission_type']==1) { ?>checked<?php  } ?>>按固定金额
							</label>
						</div>
					</div>
					<div class="form-group item">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">一级佣金</label>
						<div class="col-sm-4">
							<div class="input-group">
								<input type="text" name="commission1" value="<?php  echo $commission['commission1'];?>" class="form-control">
								<span class="input-group-addon commission_type_name"><?php echo $commission['commission_type'] ? '元' : '%'?></span>
							</div>
							<span class="help-block">
								1、留空或为0表示使用系统全局佣金比例；<br/>
								2、根据国家相关法规，各级分销佣金比例总和不得超过50%。
							</span>
						</div>
					</div>
					<div class="form-group item <?php  if(in_array($comsetting['level'],array('1'))) { ?>hide<?php  } ?>">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">二级佣金</label>
						<div class="col-sm-4">
							<div class="input-group">
								<input type="text" name="commission2" value="<?php  echo $commission['commission2'];?>" class="form-control">
								<span class="input-group-addon commission_type_name"><?php echo $commission['commission_type'] ? '元' : '%'?></span>
							</div>
							<span class="help-block">留空或为0表示使用系统全局佣金比例</span>
						</div>
					</div>
					<div class="form-group item <?php  if(in_array($comsetting['level'],array('1','2'))) { ?>hide<?php  } ?>">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">三级佣金</label>
						<div class="col-sm-4">
							<div class="input-group">
								<input type="text" name="commission3" value="<?php  echo $commission['commission3'];?>" class="form-control">
								<span class="input-group-addon commission_type_name"><?php echo $commission['commission_type'] ? '元' : '%'?></span>
							</div>
							<span class="help-block">留空或为0表示使用系统全局佣金比例</span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">微信分享标题</label>
						<div class="col-sm-9">
							<input type="text" name="share[title]" class="form-control" value="<?php  echo $share['title'];?>" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">微信分享图标</label>
						<div class="col-sm-9">
							<?php  echo tpl_form_field_image("share[images]", $share['images'])?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">微信分享描述</label>
						<div class="col-sm-9">
							<textarea style="height:70px;" class="form-control" name="share[descript]"><?php  echo $share['descript'];?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">免费推广学习</label>
						<div class="col-sm-9">
							<div class="input-group">
								<span class="input-group-addon">在</span>
								<input type="text" name="recommend_free_limit" class="form-control" value="<?php  echo $lesson['recommend_free_limit'];?>" />
								<span class="input-group-addon">天期限内</span>
								<span class="input-group-addon">直接推荐</span>
								<input type="text" name="recommend_free_num" class="form-control" value="<?php  echo $lesson['recommend_free_num'];?>" />
								<span class="input-group-addon">人后</span>
								<span class="input-group-addon">免费学习</span>
								<input type="text" name="recommend_free_day" class="form-control" value="<?php  echo $lesson['recommend_free_day'];?>" />
								<span class="input-group-addon">天</span>
							</div>
							<div class="help-block">
								<strong>该功能属于诱导分享边缘，请谨慎使用。直接推荐人为0表示关闭该功能。成功获得该课程的免费推广学习后，再通过该课程海报推广将不会重复获得免费学习机会</strong><br/>
								如：在7天期限内直接推荐5人后免费学习30天，即用户从参加该活动起，7天内通过该课程推广海报或者转发课程链接直接发展5个好友下级后，即可免费获得该课程的30天的学习时长；超过7天没推荐到5个好友，任务失败。
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 海报设计</label>
						<div class="col-sm-9 col-xs-12">
							<table style='width:100%;'>
								<tr>
									<td style="width:320px;padding:10px;" valign="top">
										<div id='poster'>
											<?php  if(!empty($lesson['poster_bg'])) { ?>
											<img src="<?php  echo tomedia($lesson['poster_bg'])?>" class="bg" />
											<?php  } ?>
											<?php  if(!empty($poster_setting)) { ?>
												<?php  if(is_array($poster_setting)) { foreach($poster_setting as $key => $d) { ?>
												<div class="drag" type="<?php  echo $d['type'];?>" index="<?php  echo $key+1?>" style="zindex:<?php  echo $key+1?>;left:<?php  echo $d['left'];?>;top:<?php  echo $d['top'];?>;
												width:<?php  echo $d['width'];?>;height:<?php  echo $d['height'];?>" 
												src="<?php  echo $d['src'];?>" size="<?php  echo $d['size'];?>" color="<?php  echo $d['color'];?>"
												> 
												<?php  if($d['type']=='qr') { ?>
												<img src="<?php echo MODULE_URL;?>template/web/style/poster/images/qr.jpg" />
												<?php  } else if($d['type']=='head') { ?>
												<img src="<?php echo MODULE_URL;?>template/web/style/poster/images/head.jpg" />
												<?php  } else if($d['type']=='nickname') { ?>
												<div class=text style="font-size:<?php  echo $d['size'];?>;color:<?php  echo $d['color'];?>">昵称</div> 
												<?php  } ?>
												<div class="rRightDown"> </div><div class="rLeftDown"> </div><div class="rRightUp"> </div><div class="rLeftUp"> </div><div class="rRight"> </div><div class="rLeft"> </div><div class="rUp"> </div><div class="rDown"></div>
												</div>
												<?php  } } ?> 
											<?php  } ?>
										</div>
									</td>
									<td valign="top" style="padding:10px;">
										<div class="panel panel-default">
											<div class="panel-body">
												<div class="form-group" id="bgset">
													<label class="col-xs-12 col-sm-3 col-md-2 control-label">背景图片</label>
													<div class="col-sm-9 col-xs-12">
														<?php  echo tpl_form_field_image('poster_bg',$lesson['poster_bg'])?>
														<span class="help-block">背景图片尺寸: 640 * 960px，格式为jpg或png格式</span>
													</div>
												</div>
												<div class="form-group">
													<label class="col-xs-12 col-sm-3 col-md-2 control-label">海报元素</label>
													<div class="col-sm-9 col-xs-12">
														<button class="btn btn-default btn-com" type="button" data-type="head">头像</button>
														<button class="btn btn-default btn-com" type="button" data-type="nickname">昵称</button>
														<button class="btn btn-default btn-com" type="button" data-type="qr">二维码</button>
													</div>
												</div>
												<div id="qrset" style="display:none">
													<div class="form-group">
														<label class="col-xs-12 col-sm-3 col-md-2 control-label">二维码尺寸</label>
														<div class="col-sm-9 col-xs-12">
															<select id="qrsize" class="form-control">
																<option value="1">1</option>
																<option value="2">2</option>
																<option value="3">3</option>
																<option value="4">4</option>
																<option value="5">5</option>
																<option value="6">6</option>
															</select>
														</div>
													</div>
												</div>
												<div id="nameset" style="display:none">
													<div class="form-group">
														<label class="col-xs-12 col-sm-3 col-md-2 control-label">昵称颜色</label>
														<div class="col-sm-9 col-xs-12">
															<?php  echo tpl_form_field_color('color')?>
														</div>
													</div>
													<div class="form-group">
														<label class="col-xs-12 col-sm-3 col-md-2 control-label">昵称大小</label>
														<div class="col-sm-4">
															<div class="input-group">
																<input type="text" id="namesize" class="form-control namesize" placeholder="例如: 14,16" />
																<div class="input-group-addon">px</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</section>
			<section id="tab6" title="报名课程专用" class="lesson-tab-section">
				<div class="panel-body">
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">报名课程填写信息</label>
						<div class="col-sm-9">
							<div class="form-group item">
								<div class="col-sm-6">
									<?php  if(is_array($appoint_info)) { foreach($appoint_info as $item) { ?>
									<div class="input-group">
										<span class="input-group-addon">字段名称</span>
										<input type="text" name="appoint_info[]" value="<?php  echo $item;?>" class="form-control" placeholder="请勿填写任何标点符号" />
									</div>
									<?php  } } ?>
									<div id="appointdiv"></div>
								</div>
							</div>
							<a href="javascript:;" id="appoint-add" style="color:#0e9e53;"><i class="fa fa-plus-circle"></i> 点击添加新表单</a>
							<span class="help-block">该项仅对报名课程生效，用户下单时需要填写该信息。保存时，留空的字段名称将自动删除</span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red;font-weight:bolder;">*</span> 可核销总次数</label>
						<div class="col-sm-4">
							<div class="input-group">
								<input type="text" name="verify_number" class="form-control" value="<?php  echo $lesson['verify_number'];?>" />
								<span class="input-group-addon">次</span>
							</div>
							<div class="help-block">
								购买该报名课程后，可线下核销总次数
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">线下核销人员</label>
						<div class="col-sm-9">
							<div class="input-group-btn">
                                <button class="btn btn-default" type="button" onclick="popwin = $('#modal-module-member').modal();">添加核销人员</button>
                            </div>
							<span class="help-block">添加核销人员后，该核销人员可线下进行扫码核销报名课程</span>
							<div class="input-group multi-img-details" id="saler_container">
								<?php  if(is_array($saler_info)) { foreach($saler_info as $saler) { ?>
								<div class="multi-item saler-item" uid="<?php  echo $saler['uid'];?>">
									 <img class="img-responsive img-thumbnail" src="<?php  echo $saler['avatar'];?>" onerror="this.src='../addons/fy_lessonv2/template/mobile/<?php  echo $template;?>/images/nopic.jpg'; this.title='头像未找到.'">
									 <div class='img-nickname'><?php  echo $saler['nickname'];?></div>
									<input type="hidden" value="<?php  echo $saler['uid'];?>" name="saler_uids[]">
									<em onclick="remove_member(this)"  class="close">×</em>
								</div>
								<?php  } } ?>
							</div>
							<div id="modal-module-member"  class="modal fade" tabindex="-1">
								<div class="modal-dialog" style="width: 920px;">
									<div class="modal-content">
										<div class="modal-header"><button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button><h3>添加核销人员</h3></div>
										<div class="modal-body" >
											<div class="row">
												<div class="input-group" style="width:860px;margin:0 auto;">
													<input type="text" class="form-control" name="kmember" value="" id="search-km" placeholder="请输入用户昵称/姓名/手机号" />
													<span class="input-group-btn"><button type="button" class="btn btn-default" onclick="search_member();">搜索</button></span>
												</div>
											</div>
											<div id="module-member" style="padding-top:5px;"></div>
										</div>
										<div class="modal-footer" style="padding-top:0;"><a href="javascript:;" class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section id="tab7" title="加群客服" class="lesson-tab-section">
				<div class="panel-body">
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">客服信息</label>
						<div class="col-sm-10">
							<div class="input-group">
								<span class="input-group-addon">客服昵称</span>
								<input type="text" name="service[0][nickname]" value="<?php  echo $service[0]['nickname'];?>" class="form-control">
								<span class="input-group-addon">客服头像</span>
								<?php  echo tpl_form_field_image('service[0][avatar]', $service[0]['avatar']);?>
								<span class="input-group-addon">二维码</span>
								<?php  echo tpl_form_field_image('service[0][qrcode]', $service[0]['qrcode']);?>
							</div>
							<span class="help-block">用户购买课程成功后，会弹出您设置的二维码让用户扫码添加，这里设置后会覆盖“基本设置”的“加群客服”</span>
						</div>
					</div>
				</div>
			</section>
		</div>
		<div class="form-group col-sm-12">
            <input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" />
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
			<input type="hidden" name="id" value="<?php  echo $lesson['id'];?>" />
			<input type="hidden" name="poster_setting" value="" />
        </div>
	 </form>
</div>
<script type="text/javascript" src="<?php echo MODULE_URL;?>template/web/style/lessonTab/jquery-tab.js?v=<?php  echo $versions;?>"></script>
<script type="text/javascript">
require(['jquery', 'util'], function($, util){
	$(function(){
		util.clip($("#copy-btn")[0], $("#copy-btn").text());
		util.clip($("#copy-pc-btn")[0], $("#copy-pc-btn").text());
	});
});

$(function () {
	$(':radio[name="isdiscount"]').click(function () {
	   if ($(this).val()=='0') {
			$('.vip-discount').hide();
		} else {

			$('.vip-discount').show();
		}
	});

	$(':radio[name="commission_type"]').click(function () {
	   if ($(this).val()=='0') {
			$('.commission_type_name').html('%') ;
		} else {
			$('.commission_type_name').html('元') ;
		}
	});

	$('.tab-group').tabify();

	//报名课程显示报名专用选项卡
	$(':radio[name="lesson_type"]').click(function() {
		var index = $(this).val();
		if(index=='1'){
			$(".tab-group>.lesson-tab-nav>li:eq(5)").show();
		}else{
			$(".tab-group>.lesson-tab-nav>li:eq(5)").hide();
		}
	});

	<?php  if($lesson['lesson_type']!=1){ ?>
		$(".tab-group>.lesson-tab-nav>li:eq(5)").hide();
	<?php  } ?>
});


//添加报名课程信息
$("#appoint-add").click(function () {
    var appoint_html = '';
    appoint_html += '<div class="input-group">';
    appoint_html += '	<span class="input-group-addon">字段名称</span>';
    appoint_html += '	<input type="text" name="appoint_info[]" class="form-control" placeholder="请勿填写任何标点符号" />';
    appoint_html += '</div>';

    $("#appointdiv").append(appoint_html);
});

//添加规格按钮
$("#spec-add").click(function () {
    var spec_html = '';
    spec_html += '		<div class="input-group">';
    spec_html += '			<span class="input-group-addon">有效期</span>';
    spec_html += '			<input type="text" name="spec_time[]" class="form-control">';
    spec_html += '			<span class="input-group-addon">天</span>';
    spec_html += '			<span class="input-group-addon">需</span>';
    spec_html += '			<input type="text" name="spec_price[]" class="form-control">';
	spec_html += '			<span class="input-group-addon">元</span>';
	spec_html += '			<span class="input-group-addon">库存</span>';
    spec_html += '			<input type="text" name="spec_stock[]" class="form-control">';
	spec_html += '			<span class="input-group-addon">报名课程规格</span>';
	spec_html += '			<input type="text" name="spec_name[]" class="form-control">';
	spec_html += '			<span class="input-group-addon">排序</span>';
	spec_html += '			<input type="text" name="spec_sort[]" class="form-control">';
    spec_html += '		</div>';

    $("#specdiv").append(spec_html);
});

//添加核销人员
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
	if ($('.multi-item[uid="' + obj.uid + '"]').length > 0) {
		return;
	}
	var html = '<div class="multi-item" uid="' + obj.uid + '">';
	html += '<img class="img-responsive img-thumbnail" src="' + obj.avatar + '" onerror="this.src=\'../addons/fy_lessonv2/template/mobile/images/nopic.jpg\'; this.title=\'头像未找到.\'">';
	html += '<div class="img-nickname">' + obj.nickname + '</div>';
	html += '<input type="hidden" value="' + obj.uid + '" name="saler_uids[]">';
	html += '<em onclick="remove_member(this)"  class="close">×</em>';
	html += '</div>';
	$("#saler_container").append(html);
}
function remove_member(obj) {
	$(obj).parent().remove();
}
</script>

<script type="text/javascript">
var category = <?php  echo json_encode($category);?>;
var pid = <?php echo $lesson['pid']?$lesson['pid']:0?>;
var html = '<option value="0">请选择一级分类</option>';
$(function(){
	$("#category_parent").find("option[value='"+pid+"']").attr("selected",true);
	document.getElementById("category_parent").onchange();
});

function renderCategory(id){
	var chtml = '<option value="0">请选择二级分类</option>';
	var cid = <?php echo $lesson['cid'] ? $lesson['cid'] : 0?>;

	if(id>0){
		for(var i in category){
			if(category[i].id==id){
				var child = category[i].child;
				for(var j in child){
					if(child[j].id==cid){
						chtml += '<option value="' + child[j].id+'" selected>' + child[j].name + '</option>';
					}else{
						chtml += '<option value="' + child[j].id+'">' + child[j].name + '</option>';
					}
				}
				$("#category_child").html(chtml);
			}
		}
	}else{
		$("#category_child").html(chtml);
	}
}

function checkSubmit(){
	var lesson_type = $("input[name='lesson_type']:checked").val();
	var verify_number = parseInt($("input[name='verify_number']").val());

	if(lesson_type==1 && verify_number<1){
		alert("请在【报名课程专用】里填写可核销总次数");
		return false;
	}
}
</script>


<script language='javascript'>
$('form').submit(function() {
	var data = [];
	$('.drag').each(function() {
		var obj = $(this);
		var type = obj.attr('type');
		var left = obj.css('left'),
		top = obj.css('top');
		var d = {
			left: left,
			top: top,
			type: obj.attr('type'),
			width: obj.css('width'),
			height: obj.css('height')
		};
		if (type == 'nickname') {
			d.size = obj.attr('size');
			d.color = obj.attr('color');
		} else if (type == 'qr') {
			d.size = obj.attr('size');
		} else if (type == 'img') {
			d.src = obj.attr('src');
		}
		data.push(d);
	});
	$(':input[name=poster_setting]').val(JSON.stringify(data));

	return true;
});

function bindEvents(obj) {
    var index = obj.attr('index');
    var rs = new Resize(obj, {
		Max: true,
		mxContainer: "#poster"
    });
    rs.Set($(".rRightDown", obj), "right-down");
    rs.Set($(".rLeftDown", obj), "left-down");
    rs.Set($(".rRightUp", obj), "right-up");
    rs.Set($(".rLeftUp", obj), "left-up");
    rs.Set($(".rRight", obj), "right");
    rs.Set($(".rLeft", obj), "left");
    rs.Set($(".rUp", obj), "up");
    rs.Set($(".rDown", obj), "down");
    rs.Scale = true;
    var type = obj.attr('type');
    if (type == 'nickname') {
		rs.Scale = false;
    }
    new Drag(obj, {
		Limit: true,
		mxContainer: "#poster"
    });
    $('.drag .remove').unbind('click').click(function() {
		$(this).parent().remove();
    })

	$.contextMenu({
		selector: '.drag[index=' + index + ']',
		callback: function(key, options) {
			var index = parseInt($(this).attr('zindex'));

			if (key == 'next') {
				var nextdiv = $(this).next('.drag');
				if (nextdiv.length > 0) {
					nextdiv.insertBefore($(this));
				}
			} else if (key == 'prev') {
				var prevdiv = $(this).prev('.drag');
				if (prevdiv.length > 0) {
					$(this).insertBefore(prevdiv);
				}
			} else if (key == 'last') {
				var len = $('.drag').length;
				if (index >= len - 1) {
					return;
				}
				var last = $('#poster .drag:last');
					if (last.length > 0) {
					$(this).insertAfter(last);
				}
			} else if (key == 'first') {
				var index = $(this).index();
				if (index <= 1) {
					return;
				}
				var first = $('#poster .drag:first');
				if (first.length > 0) {
					$(this).insertBefore(first);
				}
			} else if (key == 'delete') {
				$(this).remove();
			}
			var n = 1;
			$('.drag').each(function() {
				$(this).css("z-index", n);
				n++;
			})
		},
		items: {
			"next": {
				name: "调整到上层"
			},
			"prev": {
				name: "调整到下层"
			},
			"last": {
				name: "调整到最顶层"
			},
			"first": {
				name: "调整到最低层"
			},
			"delete": {
				name: "删除元素"
			}
		}
	});
	obj.unbind('click').click(function() {
		bind($(this));
	})
}

var imgsettimer = 0;
var nametimer = 0;
var bgtimer = 0;
function clearTimers() {
	clearInterval(imgsettimer);
	clearInterval(nametimer);
	clearInterval(bgtimer);

}
function getImgUrl(val) {
	if (val.indexOf('http://') == -1) {
		val = "<?php  echo $imgroot;?>" + val;
	}
	return val;
}
function bind(obj) {
	var imgset = $('#imgset'),
	nameset = $("#nameset"),
	qrset = $('#qrset');
	imgset.hide(),
	nameset.hide(),
	qrset.hide();
	clearTimers();
	var type = obj.attr('type');
	if (type == 'img') {
		imgset.show();
		var src = obj.attr('src');
		var input = imgset.find('input');
		var img = imgset.find('img');
		if (typeof(src) != 'undefined' && src != '') {
			input.val(src);
			img.attr('src', getImgUrl(src));
		}

		imgsettimer = setInterval(function() {
			if (input.val() != src && input.val() != '') {
				var url = getImgUrl(input.val());

				obj.attr('src', input.val()).find('img').attr('src', url);
			}
		}, 10);

	} else if (type == 'nickname') {
		nameset.show();
		var color = obj.attr('color') || "#ffffff";
		var size = obj.attr('size') || "22";
		var input = nameset.find('input:first');
		var namesize = nameset.find('#namesize');
		var picker = nameset.find('.sp-preview-inner');
		input.val(color);
		namesize.val(size.replace("px", ""));
		picker.css({
			'background-color': color,
			'font-size': size
		});

		nametimer = setInterval(function() {
		obj.attr('color', input.val()).find('.text').css('color', input.val());
		obj.attr('size', namesize.val() + "px").find('.text').css('font-size', namesize.val() + "px");
		}, 10);

	} else if (type == 'qr') {
		qrset.show();
		var size = obj.attr('size') || "3";
		var sel = qrset.find('#qrsize');
		sel.val(size);
		sel.unbind('change').change(function() {
			obj.attr('size', sel.val())
		});

	}
}

$(function() {

	<?php  if($poster_setting) { ?> 
	$('.drag').each(function(){
		bindEvents($(this));
	})
	<?php  } ?>
            
	$(':radio[name=type]').click(function(){
		var type = $(this).val();
		bindType(type);
	})
	//改变背景
	$('#bgset').find('button:first').click(function() {
		var oldbg = $(':input[name=poster_bg]').val();
		bgtimer = setInterval(function() {
		var bg = $(':input[name=poster_bg]').val();
		if (oldbg != bg) {
			bg = getImgUrl(bg);
			$('#poster .bg').remove();
			var bgh = $("<img src='<?php  echo $_W['attachurl'];?>" + bg + "' class='bg' />");
			var first = $('#poster .drag:first');
			if (first.length > 0) {
				bgh.insertBefore(first);
			} else {
				$('#poster').append(bgh);
			}
				oldbg = bg;
			}
		},10);
	})

	$('.btn-com').click(function() {
		var imgset = $('#imgset'),
		nameset = $("#nameset"),
		qrset = $('#qrset');
		imgset.hide(),
		nameset.hide(),
		qrset.hide();
		clearTimers();

		var type = $(this).data('type');
		var img = "";
		if (type == 'qr') {
			img = '<img src="<?php echo MODULE_URL;?>template/web/style/poster/images/qr.jpg" />';
		} else if (type == 'head') {
			img = '<img src="<?php echo MODULE_URL;?>template/web/style/poster/images/head.jpg" />';
		} else if (type == 'nickname') {
			img = '<div class=text>昵称</div>';
		}
		var index = $('#poster .drag').length + 1;
		var obj = $('<div class="drag" type="' + type + '" index="' + index + '" style="z-index:' + index + '">' + img + '<div class="rRightDown"> </div><div class="rLeftDown"> </div><div class="rRightUp"> </div><div class="rLeftUp"> </div><div class="rRight"> </div><div class="rLeft"> </div><div class="rUp"> </div><div class="rDown"></div></div>');

		$('#poster').append(obj);
		bindEvents(obj);
	});

    $('.drag').click(function() {
		bind($(this));
    })
})
</script>