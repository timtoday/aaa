<?php defined('IN_IA') or exit('Access Denied');?><!--
 * 支付信息
 * ============================================================================
 * 版权所有 2015-2018 微课堂团队，并保留所有权利。
 * 网站地址: https://www.fylesson.com
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件，未购买授权用户无论是否用于商业行为都是侵权行为！
 * 允许已购买用户对程序代码进行修改并在授权域名下使用，但是不允许对程序代码以
 * 任何形式任何目的进行二次发售，作者将依法保留追究法律责任的权力和最终解释权。
 * ============================================================================
-->
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template($template.'/_headerv2', TEMPLATE_INCLUDEPATH)) : (include template($template.'/_headerv2', TEMPLATE_INCLUDEPATH));?>

<?php  $this->pay($params);?>

<div class="header-2 cbox">
	<a href="<?php  echo $this->createMobileUrl('mylesson')?>" class="ico go-back"></a>
	<div class="flex title">支付方式</div>
	<a href="<?php  echo $this->createMobileUrl('index', array('t'=>1))?>" class="ico go-index"></a>
</div>