<?php
/**
 * 关注二维码
 * ============================================================================
 * 版权所有 2015-2018 微课堂团队，并保留所有权利。
 * 网站地址: https://www.fylesson.com
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件，未购买授权用户无论是否用于商业行为都是侵权行为！
 * 允许已购买用户对程序代码进行修改并在授权域名下使用，但是不允许对程序代码以
 * 任何形式任何目的进行二次发售，作者将依法保留追究法律责任的权力和最终解释权。
 * ============================================================================
 */

$follow_page   = $common['follow_page'];
$title = $follow_page['title'] ? $follow_page['title'] : "公众号二维码";

$wxapp_qrcode = $_W['attachurl']."images/{$uniacid}/fy_lessonv2/wxapp_follow.png";
$wxapp_root = ATTACHMENT_ROOT."images/{$uniacid}/fy_lessonv2/wxapp_follow.png";
$wxapp_exist = is_file($wxapp_root);



include $this->template("../mobile/{$template}/follow");