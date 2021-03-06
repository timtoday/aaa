<?php defined('IN_IA') or exit('Access Denied');?><div class="main">
    <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" onkeydown="if(event.keyCode==13){return false;}">
        <div class="panel panel-default">
            <div class="panel-heading">创建会员服务</div>
            <div class="panel-body">
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">会员UID</label>
                    <div class="col-sm-9">
                        <input type="text" name="uid" value="<?php  echo $_GPC['uid'];?>" class="form-control" />
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">VIP等级</label>
                    <div class="col-sm-9">
                        <select name="level_id" class="form-control">
                        	<option>请选择...</option>
                        	<?php  if(is_array($level_list)) { foreach($level_list as $level) { ?>
                        	<option value="<?php  echo $level['id'];?>"><?php  echo $level['level_name'];?></option>
                        	<?php  } } ?>
                        </select>
                        <div class="help-block">
                        	选择指定VIP等级的VIP服务卡
                        </div>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">有效期</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_date('validity', time()+31*86400, true);?>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group col-sm-12">
            <input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1"/>
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
        </div>
    </form>
</div>