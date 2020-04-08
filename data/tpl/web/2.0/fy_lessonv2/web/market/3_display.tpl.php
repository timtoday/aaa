<?php defined('IN_IA') or exit('Access Denied');?><div class="main">
	<form action="" method="post" class="form-horizontal form-validate">
		<div class="page-heading">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-sm-9 col-xs-12">
						<h4>购买课程积分抵扣</h4>
						<span> 开启积分抵扣, 课程最多抵扣的数目需要在课程的【营销设置】中单独设置</span>
					</div>
					<div class="col-sm-2 pull-right" style="padding-top:10px;text-align: right">
						<input type="hidden" class="js-switch" name="deduct_switch" value="<?php  echo $market['deduct_switch'];?>">
						<div id="deduct-switchery" class="switchery <?php  if($market['deduct_switch']) { ?>checked<?php  } ?>"><small></small></div>
					</div>
				</div>
				<div class="form-group" id="creditdeduct-switch" <?php  if(!$market['deduct_switch']) { ?>style="display:none"<?php  } ?>>
					<label class="col-sm-2 control-label">积分抵扣比例</label>
					<div class="col-sm-5">
						<div class="input-group">
							<span class="input-group-addon">1个积分 抵扣</span>
							<input type="text" name="deduct_money" value="<?php  echo $market['deduct_money'];?>" class="form-control">
							<span class="input-group-addon">元</span>
						</div>
						<span class="help-block">积分抵扣比例设置</span>
					</div>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-sm-9 col-xs-12">
						<h4>学习时长兑换积分</h4>
						<span> 开启学习时长兑换积分, 用户学习时长将可以兑换积分。学习时长支持记录(非内嵌代码方式)的音频、视频章节和图文章节</span>
					</div>
					<div class="col-sm-2 pull-right" style="padding-top:10px;text-align: right">
						<input type="hidden" class="js-switch" id="duration-switch" name="duration[switch]" value="<?php  echo $duration['switch'];?>">
						<div id="duration-switchery" class="switchery <?php  if($duration['switch']) { ?>checked<?php  } ?>"><small></small></div>
					</div>
				</div>
				<div class="form-group" id="duration-div" <?php  if(!$duration['switch']) { ?>style="display:none"<?php  } ?>>
					<label class="col-sm-2 control-label">积分兑换设置</label>
					<div class="col-sm-8">
						<div class="input-group">
							<span class="input-group-addon">学习1分钟兑换</span>
							<input type="text" name="duration[exchange_credit1]" value="<?php  echo $duration['exchange_credit1'];?>" class="form-control">
							<span class="input-group-addon">积分</span>
							<span class="input-group-addon">每天最多可兑换</span>
							<input type="text" name="duration[max_exchange_minute]" value="<?php  echo $duration['max_exchange_minute'];?>" class="form-control">
							<span class="input-group-addon">分钟</span>
						</div>
						<span class="help-block">积分、分钟必须为正整数</span>
					</div>
				</div>
			</div>
			
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-sm-9 col-xs-12">
						<h4>每日签到奖励积分</h4>
						<span> 开启每天签到奖励积分, 用户每天签到都可获得一定的积分奖励</span>
					</div>
					<div class="col-sm-2 pull-right" style="padding-top:10px;text-align: right">
						<input type="hidden" class="js-switch" id="signin-switch" name="signin[switch]" value="<?php  echo $signin['switch'];?>">
						<div id="signin-switchery" class="switchery <?php  if($signin['switch']) { ?>checked<?php  } ?>"><small></small></div>
					</div>
				</div>
				<div class="form-group" id="signin-div" <?php  if(!$signin['switch']) { ?>style="display:none"<?php  } ?>>
					<label class="col-sm-2 control-label">签到奖励设置</label>
					<div class="col-sm-8">
						<div class="input-group">
							<span class="input-group-addon">周期首次签到奖励</span>
							<input type="text" name="signin[everyday]" value="<?php  echo $signin['everyday'];?>" class="form-control" maxlength="4" onkeyup="value=value.replace(/[^1234567890]+/g,'');">
							<span class="input-group-addon">积分</span>
							<span class="input-group-addon">续签递增奖励</span>
							<input type="text" name="signin[continuity]" value="<?php  echo $signin['continuity'];?>" class="form-control" maxlength="4" onkeyup="value=value.replace(/[^1234567890]+/g,'');">
							<span class="input-group-addon">积分</span>
							<span class="input-group-addon">奖励上限</span>
							<input type="text" name="signin[limitation]" value="<?php  echo $signin['limitation'];?>" class="form-control" maxlength="4" onkeyup="value=value.replace(/[^1234567890]+/g,'');">
							<span class="input-group-addon">积分</span>
						</div>
						<span class="help-block">例如：周期首次签到奖励1积分，续签递增奖励1积分，奖励上限7积分，表示第一天签到奖励1积分，第二天奖励2积分，第3天奖励3积分...第7天奖励7积分，第8天奖励7积分...</span>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-12">
					<input type="hidden" name="token" value="<?php  echo $_W['token'];?>">
					<input type="submit" name="submit" value="保存设置" class="btn btn-primary">
				</div>
			</div>
	</form>
</div>
<script language="javascript">
    $(function () {
        $("#deduct-switchery").click(function () {
            if($("input[name=deduct_switch]").val()==1) {
            	$("input[name=deduct_switch]").val(0);
            	$("#deduct-switchery").removeClass("checked");
                $("#creditdeduct-switch").hide();
            }else {
            	$("input[name=deduct_switch]").val(1);
            	$("#deduct-switchery").addClass("checked");
                $("#creditdeduct-switch").show();
            }
        });

		$("#duration-switchery").click(function () {
            if($("#duration-switch").val()==1) {
            	$("#duration-switch").val(0);
				$("#duration-switchery").removeClass("checked");
				$("#duration-div").hide();
            }else {
            	$("#duration-switch").val(1);
				$("#duration-switchery").addClass("checked");
				$("#duration-div").show();
            }
        });

		$("#signin-switchery").click(function () {
            if($("#signin-switch").val()==1) {
            	$("#signin-switch").val(0);
				$("#signin-switchery").removeClass("checked");
				$("#signin-div").hide();
            }else {
            	$("#signin-switch").val(1);
				$("#signin-switchery").addClass("checked");
				$("#signin-div").show();
            }
        });
    });
</script>