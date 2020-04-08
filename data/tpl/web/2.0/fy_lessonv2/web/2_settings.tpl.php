<?php defined('IN_IA') or exit('Access Denied');?><!--
 * 参数设置
 * ============================================================================
 * 版权所有 2015-2018 微课堂团队，并保留所有权利。
 * 网站地址: https://www.fylesson.com
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件，未购买授权用户无论是否用于商业行为都是侵权行为！
 * 允许已购买用户对程序代码进行修改并在授权域名下使用，但是不允许对程序代码以
 * 任何形式任何目的进行二次发售，作者将依法保留追究法律责任的权力和最终解释权。
 * ============================================================================
-->

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<style type="text/css">
.red{color:red;}
</style>
<div class="main">
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
        <div class="panel panel-default">
            <div class="panel-heading">参数设置  <span class="red">[以下所有参数不修改的选项请留空]</span></div>
            <div class="panel-body">
				<div class="form-group">
					<label class="col-sm-2 control-label">[立即购买]</label>
					<div class="col-sm-9">
						<div class="input-group">
							<span class="input-group-addon">自定义名称</span>
							<input type="text" name="buynow_name" value="<?php  echo $settings['buynow_name'];?>" class="form-control">
							<span class="input-group-addon">网页链接</span>
							<input type="text" name="buynow_link" value="<?php  echo $settings['buynow_link'];?>" class="form-control">
						</div>
						<span class="help-block">默认请留空，课程详情页右下角“立即购买”自定义名称，网页链接应包含http://或https://</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">[开通VIP]</label>
					<div class="col-sm-9">
						<div class="input-group">
							<span class="input-group-addon">自定义名称</span>
							<input type="text" name="buy_vip_name" value="<?php  echo $settings['buy_vip_name'];?>" class="form-control">
						</div>
						<span class="help-block">默认留空，课程支持vip免费学习情况下，在“基本设置~手机端显示~课程详情页购买入口”选显示VIP时，课程详情页底部将显示该自定义名称</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">[开始学习]</label>
					<div class="col-sm-9">
						<div class="input-group">
							<span class="input-group-addon">自定义名称</span>
							<input type="text" name="study_name" value="<?php  echo $settings['study_name'];?>" class="form-control">
							<span class="input-group-addon">网页链接</span>
							<input type="text" name="study_link" value="<?php  echo $settings['study_link'];?>" class="form-control">
						</div>
						<span class="help-block">默认请留空，课程详情页右下角“开始学习”自定义名称，网页链接应包含http://或https://</span>
					</div>
				</div>
				<div class="form-group">
                    <label class="col-sm-2 control-label">客服系统链接</label>
                    <div class="col-sm-9">
						<input type="text" name="service_url" value="<?php  echo $settings['service_url'];?>" class="form-control">
						<span class="help-block">第三方客服系统链接请以http://或https://开头，<strong>设置该客服系统链接后，将覆盖讲师QQ、QQ群和微信等咨询方式。</strong></span>
                    </div>
                </div>
				<div class="form-group">
					<label class="col-sm-2 control-label">课程咨询方式</label>
					<div class="col-sm-9">
						<div class="input-group">
							<span class="input-group-addon">客服电话</span>
							<input type="text" name="tel" value="<?php  echo $settings['tel'];?>" class="form-control">
							<span class="input-group-addon">讲师QQ</span>
							<input type="text" name="teacher_qq" value="<?php  echo $settings['teacher_qq'];?>" class="form-control">
							<span class="input-group-addon">QQ群</span>
							<input type="text" name="teacher_qqgroup" value="<?php  echo $settings['teacher_qqgroup'];?>" class="form-control">
							<span class="input-group-addon">QQ群链接</span>
							<input type="text" name="teacher_qqlink" value="<?php  echo $settings['teacher_qqlink'];?>" placeholder="含http://或https://" class="form-control">
						</div>
						<span class="help-block">设置统一的课程咨询方式，将覆盖讲师个人的咨询方式</span>
					</div>
				</div>
				<div class="form-group">
                    <label class="col-sm-2 control-label">微信客服二维码</label>
                    <div class="col-sm-9">
						<?php  echo tpl_form_field_image('teacher_qrcode', $settings['teacher_qrcode']);?>
						<span class="help-block">微信客服二维码，设置该二维码将覆盖讲师个人的咨询二维码</span>
                    </div>
                </div>

				<div class="form-group hide">
                    <label class="col-sm-2 control-label">我的课程背景图</label>
                    <div class="col-sm-9">
						<?php  echo tpl_form_field_image('mylesson_bg', $settings['mylesson_bg']);?>
						<span class="help-block">手机端尺寸 750px * 390px</span>
                    </div>
                </div>
				<div class="form-group hide">
                    <label class="col-sm-2 control-label">个人中心背景图</label>
                    <div class="col-sm-9">
						<?php  echo tpl_form_field_image('ucenter_bg', $settings['ucenter_bg']);?>
						<span class="help-block">手机端尺寸 750px * 375px</span>
                    </div>
                </div>
				<div class="form-group hide">
                    <label class="col-sm-2 control-label">VIP服务背景图</label>
                    <div class="col-sm-9">
						<div class="input-group">
							<span class="input-group-addon">手机端图片</span>
							<?php  echo tpl_form_field_image('vip_bg', $settings['vip_bg']);?>
							<span class="input-group-addon">PC端图片</span>
							<?php  echo tpl_form_field_image('vip_bg_pc', $settings['vip_bg_pc']);?>
						</div>
						<span class="help-block">手机端尺寸 750px * 500px；PC端尺寸1920px * 400px；</span>
                    </div>
                </div>
				<div class="form-group hide">
                    <label class="col-sm-2 control-label">讲师服务背景图</label>
                    <div class="col-sm-9">
						<?php  echo tpl_form_field_image('myteacher_bg', $settings['myteacher_bg']);?>
						<span class="help-block">手机端尺寸 750px * 500px</span>
                    </div>
                </div>
				<div class="form-group hide">
                    <label class="col-sm-2 control-label">讲师主页</label>
                    <div class="col-sm-9">
						<div class="input-group">
							<span class="input-group-addon">手机端图片</span>
							<?php  echo tpl_form_field_image('teacher_bg', $settings['teacher_bg']);?>
							<span class="input-group-addon">PC端图片</span>
							<?php  echo tpl_form_field_image('teacher_bg_pc', $settings['teacher_bg_pc']);?>
						</div>
						<span class="help-block">手机端尺寸750px * 300px，PC端尺寸1200px * 300px</span>
                    </div>
                </div>

				<div class="form-group">
                    <label class="col-sm-2 control-label">手机端首页底部标语</label>
                    <div class="col-sm-9">
						<?php  echo tpl_form_field_image('index_slogan', $settings['index_slogan']);?>
						<span class="help-block">建议尺寸 750px * 26px，PNG格式</span>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-sm-2 control-label">统计代码</label>
                    <div class="col-sm-9">
						<textarea class="form-control" name="statis_code" style="height:90px;"><?php  echo $settings['statis_code'];?></textarea>
						<span class="help-block">例如CNZZ站点统计的js代码</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group col-sm-12">
            <input type="submit" name="submit" value="保存设置" class="btn btn-primary col-lg-1" />
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
        </div>
	</form>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>