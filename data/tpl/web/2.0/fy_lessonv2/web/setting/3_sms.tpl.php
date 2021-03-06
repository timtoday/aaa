<?php defined('IN_IA') or exit('Access Denied');?><div class="main">
	<form method="post" class="form-horizontal form" enctype="multipart/form-data">
        <div class="panel panel-default">
            <div class="panel-heading">
                短信配置
            </div>
            <div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">短信接口</label>
					<div class="col-sm-9">
						<label class="radio-inline"><input type="radio" name="sms[type]" value="1" <?php  if($sms['type']==1) { ?>checked<?php  } ?> /> 阿里云短信</label>
						<label class="radio-inline"><input type="radio" name="sms[type]" value="2" <?php  if($sms['type']==2) { ?>checked<?php  } ?> /> 腾讯云短信</label>
					</div>
				</div>

				<!-- 阿里云短信 -->
				<div class="aliyun-sms" <?php  if($sms['type']!=1) { ?>style="display:none;"<?php  } ?>>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">AccessKey ID</label>
						<div class="col-sm-9">
							<input type="text" name="sms[aliyun][access_key]" class="form-control" value="<?php  echo $sms['aliyun']['access_key'];?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">AccessKey Secret</label>
						<div class="col-sm-9">
							<input type="text" name="sms[aliyun][access_secret]" class="form-control" value="<?php  echo $sms['aliyun']['access_secret'];?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">短信签名</label>
						<div class="col-sm-9">
							<input type="text" name="sms[aliyun][sign]" class="form-control" value="<?php  echo $sms['aliyun']['sign'];?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">短信验证码模版CODE</label>
						<div class="col-sm-9">
							<input type="text" name="sms[aliyun][template_id]" class="form-control" value="<?php  echo $sms['aliyun']['template_id'];?>">
							<span class="help-block">如果您不希望验证手机号码，请不要输入短信验证码模版CODE。<br/>短信模版申请示例：您的短信验证码是:${code}，请不要告诉任何人。</span>
						</div>
					</div>	
				</div>

				<!-- 腾讯短信 -->
				<div class="qcloud-sms" <?php  if($sms['type']!=2) { ?>style="display:none;"<?php  } ?>>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">AppID</label>
						<div class="col-sm-9">
							<input type="text" name="sms[qcloud][appid]" class="form-control" value="<?php  echo $sms['qcloud']['appid'];?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">App Key</label>
						<div class="col-sm-9">
							<input type="text" name="sms[qcloud][appkey]" class="form-control" value="<?php  echo $sms['qcloud']['appkey'];?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">短信签名</label>
						<div class="col-sm-9">
							<input type="text" name="sms[qcloud][sign]" class="form-control" value="<?php  echo $sms['qcloud']['sign'];?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">短信验证码模版ID</label>
						<div class="col-sm-9">
							<input type="text" name="sms[qcloud][template_id]" class="form-control" value="<?php  echo $sms['qcloud']['template_id'];?>">
							<span class="help-block">如果您不希望验证手机号码，请不要输入模版ID。<br/>短信模版申请示例：您的短信验证码是:{1}，请不要告诉任何人。</span>
						</div>
					</div>	
				</div>
            </div>
        </div>
        <div class="form-group col-sm-12">
            <input type="hidden" name="id" value="<?php  echo $setting['id'];?>" />
            <input type="submit" name="submit" value="保存设置" class="btn btn-primary col-lg-1" />
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
        </div>
	</form>
</div>

<script type="text/javascript">
$(function() {
	$(':radio[name="sms[type]"]').click(function() {
		if($(this).val() == '1') {
			$(".aliyun-sms").show();
			$(".qcloud-sms").hide();
		}else if($(this).val() == '2') {
			$(".aliyun-sms").hide();
			$(".qcloud-sms").show();
		}
	});
});
</script>