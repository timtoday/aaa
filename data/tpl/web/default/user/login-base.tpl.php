<?php defined('IN_IA') or exit('Access Denied');?>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header-base', TEMPLATE_INCLUDEPATH)) : (include template('common/header-base', TEMPLATE_INCLUDEPATH));?>

<head>
    	<link rel="stylesheet" type="text/css" href="./resource/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="./resource/css/animate.css">
	<link rel="stylesheet" type="text/css" href="./resource/css/util.css">
	<link rel="stylesheet" type="text/css" href="./resource/css/main.css">
	<link rel="stylesheet" type="text/css" href="./resource/css/overlay.css">
</head>
<!--<div class="system-login">-->
<!--	<?php  if(!empty($_W['setting']['copyright']['background_img'])) { ?>-->
<!--		<img src="<?php  echo to_global_media($_W['setting']['copyright']['background_img']);?>" class="bg-img" width="100%"/>-->
<!--	<?php  } else { ?>-->
<!--		<img src="./resource/images/bg-login.png" class="bg-img"/ style="width: 100%;min-width: 1300px;">-->
<!--	<?php  } ?>-->

<!--	<div class="head">-->
<!--		<a href="/" class="logo-version">-->
<!--			<img src="<?php  if(!empty($_W['setting']['copyright']['flogo'])) { ?><?php  echo to_global_media($_W['setting']['copyright']['flogo'])?><?php  } else { ?>./resource/images/logo/login-logo.png<?php  } ?>" class="logo">-->
<!--			<span class="version hidden"><?php echo IMS_VERSION;?></span>-->
<!--		</a>-->
<!--		<?php  if(!empty($_W['setting']['copyright']['showhomepage'])) { ?>-->
<!--		<a href="<?php  echo url('account/welcome')?>" class="pull-right">首页</a>-->
<!--		<?php  } ?>-->
<!--	</div>-->
<!--	<div class="login-panel">-->
<!--		<div class="title">-->
<!--			<a href="javascript:void(0);">账号/手机登录</a>-->
<!--		</div>-->
<!--		<form action="" method="post" role="form" id="form1" onsubmit="return formcheck();" class="we7-form">-->

<!--			<div class="input-group-vertical">-->
<!--				<input name="login_type" type="hidden" class="form-control " value="system">-->
<!--				<input name="referer" type="hidden" value="<?php  echo $_GPC['referer'];?>">-->
<!--				<input name="username" type="text" class="form-control " placeholder="请输入用户名/手机登录">-->
<!--				<input name="password" id="password" type="password" class="form-control password" placeholder="请输入登录密码">-->
<!--				<span style="display:none;color:red;">大写锁定已打开</span>-->
<!--				<?php  if(!empty($_W['setting']['copyright']['verifycode'])) { ?>-->
<!--				<div class="input-group">-->
<!--					<input name="verify" type="text" class="form-control" placeholder="请输入验证码">-->
<!--					<a href="javascript:;" id="toggle" class="input-group-btn imgverify"><img id="imgverify" src="<?php  echo url('utility/code')?>" title="点击图片更换验证码" /></a>-->
<!--				</div>-->
<!--				<?php  } ?>-->
<!--			</div>-->
<!--			<div class="form-inline" style="margin-bottom: 15px;">-->
<!--				<div class="pull-right">-->
<!--					<a href="<?php  echo url('user/find-password');?>" target="_blank" class="color-default"></a>-->
<!--				</div>-->
<!--				<div class="checkbox">-->
<!--					<input type="checkbox" value="true" id="rember" name="rember">-->
<!--					<label for="rember">记住用户名</label>-->
<!--				</div>-->
<!--			</div>-->
<!--			<div class="login-submit text-center">-->
<!--				<input type="submit" id="submit" name="submit" value="登录" class="btn btn-primary btn-block" />-->
<!--				<div class="text-right">-->
<!--					<?php  if(!$_W['siteclose'] && $setting['register']['open']) { ?>-->
<!--						<?php  if(empty($_GPC['login_type']) || $_GPC['login_type'] == 'system') { ?>-->
<!--						<a href="<?php  echo url('user/register');?>" class="color-default">立即注册</a>-->
<!--						<?php  } ?>-->
<!--					<?php  } ?>-->

<!--					<?php  if(!$_W['siteclose'] && !empty($_W['setting']['copyright']['mobile_status'])) { ?>-->
<!--						<?php  if($_GPC['login_type'] == 'mobile') { ?>-->
<!--						<a href="<?php  echo url('user/register', array('register_type' => 'mobile'))?>" class="color-default">立即注册</a>-->
<!--						<?php  } ?>-->
<!--					<?php  } ?>-->

<!--				</div>-->
<!--				<input name="token" value="<?php  echo $_W['token'];?>" type="hidden" />-->
<!--			</div>-->
<!--			<?php  if(!empty($setting['thirdlogin']['qq']['authstate']) || !empty($setting['thirdlogin']['wechat']['authstate'])) { ?>-->
<!--			<div class="text-center">-->
<!--				<span class="color-gray">使用第三方账号登录</span>-->
<!--				<div class="form-control-static">-->
<!--					<?php  if(!empty($setting['thirdlogin']['qq']['authstate'])) { ?><a href="<?php  echo $login_urls['qq'];?>"><img src="./resource/images/qqlogin.png" width="35px"></a>&nbsp;&nbsp;<?php  } ?>-->
<!--					<?php  if(!empty($setting['thirdlogin']['wechat']['authstate'])) { ?><a href="<?php  echo $login_urls['wechat'];?>"><img src="./resource/images/wxlogin.png" width="35px"></a><?php  } ?>-->
<!--				</div>-->
<!--			</div>-->
<!--			<?php  } ?>-->
<!--		</form>-->
<!--	</div>-->
<!--</div>-->


<script>
	function detectCapsLock(event) {
		var e = event || window.event;
		var o = e.target || e.srcElement;
		var oTip = o.nextElementSibling;
		var keyCode = e.keyCode || e.switch;
		var isShift = e.shiftKey || (keyCode == 16) || false;
		if (((keyCode >= 65 && keyCode <= 90) && !isShift) || ((keyCode >= 97 && keyCode <= 122) && isShift)) {
			oTip.style.display = '';
		} else {
			oTip.style.display = 'none';
		}
	}
	var loginAction = function(e) {
		<?php  if(!empty($_W['setting']['copyright']['verifycode'])) { ?>
			var verify = $(':text[name="verify"]').val();
			if (verify == '') {
				alert('请填写验证码');
				return false;
			}
		<?php  } ?>
		e.preventDefault();
		var postData = $("input").serializeArray();
		var postInit = {}
		for(var key in postData) {
			var data = postData[key]
			postInit[data.name] = data.value
		}
		if(postInit['rember']) {
			util.cookie.set('remember-username', postInit['username']);
		} else {
			util.cookie.del('remember-username');
		}
		if($('input[name="smscode"]').val()) {
			postInit.smscode = $('input[name="smscode"]').val()
		}
		$.post('', postInit, function(data) {
			if(!data || !data.message) {
				return false
			}
			if(data.message.errno === 0) {
				if (data.message.message.status == -1) {
					$('#user-expired').find('.content').html(data.message.message.message);
					$('#user-expired').modal('show')
					return;
				}
				util.message(data.message.message, data.redirect, 'success')
			} else if(data.message.errno === -3){
				$('#mobile')[0].innerText = data.message.message.mobile
				$('#show-code').modal('show')
			} else {
				util.message(data.message.message)
			}
		}, 'json')
	}
	$('#login-form').on('submit', loginAction)
	$('.js-login').click(loginAction)
	$('.js-send-code').click(function() {
		$.post('./index.php?c=utility&a=verifycode&do=send_code', function(data) {
			if(data.message && data.message.errno === 0) {
				util.message(data.message.message, '', 'success')
				window.expire = 120
				var time = setInterval(function () {
					$('.js-send-code').attr("disabled",true);
					$('.js-send-code').val(window.expire + '秒后重新获取');
					window.expire--;
					if(window.expire <= 0) {
						$('.js-send-code').attr("disabled", false);
						$('.js-send-code').val('重新获取验证码');
						clearInterval(time)
					}
				}, 1000);
			} else {
				util.message(data.message ? data.message.message : '发送失败', '')
			}
		}, 'json')
	})
	$('#show-code').on('hide.bs.modal', function (e) {
		$('input[name="smscode"]').val('')
	})
	document.getElementById('password').onkeypress = detectCapsLock;

	function formcheck() {
		if($('#remember:checked').length == 1) {
			cookie.set('remember-username', $(':text[name="username"]').val());
		} else {
			cookie.del('remember-username');
		}
		return true;
	}
	var h = document.documentElement.clientHeight;
	if($('.footer').length) {
		h = h - $('.footer').outerHeight();
	}
	$('#toggle').click(function() {
		$('#imgverify').prop('src', '<?php  echo url('utility/code')?>r='+Math.round(new Date().getTime()));
		return false;
	});
	<?php  if(!empty($_W['setting']['copyright']['verifycode'])) { ?>
		$('#form1').submit(function() {
			var verify = $(':text[name="verify"]').val();
			if (verify == '') {
				alert('请填写验证码');
				return false;
			}
		});
	<?php  } ?>
</script>

<div class="limiter">
		<div class="container-login100">
			<div style="padding-top: 60px;position:relative;" class="wrap-login100">

				<div class="login100-pic js-tilt animate-1" data-tilt="" style="perspective: 1000px;">
					<img src="./resource/images/img-01.png" alt="IMG" style="transform: translate(0px, 0px) rotateX(0deg) rotateY(0deg);">
				</div>

				<form   id="login-form" class=" validate-form form-inline" action="" method="post">
					<span class="login100-form-title">
						用户管理控制台
<b><hr></b>
	<input name="login_type" type="hidden" class="form-control " value="system">
				<input name="referer" type="hidden" value="<?php  echo $_GPC['referer'];?>">
					<input name="token" value="<?php  echo $_W['token'];?>" type="hidden" />
                    	<input name="submit" value="登录" type="hidden" />
					<div class="wrap-input100 validate-input" data-validate="请输入登录账号">
						<input class="input100" type="text" name="username" placeholder="请输入登录账号">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="请输入登录密码">
						<input class="input100" id="password" type="password" name="password" placeholder="请输入登录密码">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
                    		<div  class="container-login100-form-btn">
                                    <!--<button type="button" name="submit" class="login100-form-btn">登 录</button>-->
                                  	<div style="width:100%" class="login-submit text-center">
                        				<input style="border-radius: 25px;background: #57b846;" type="submit" class="login100-form-btn " value="登录" />
                        				
                        			
                        		
                        
                        <div style="width:100%">
            			  <div class="pull-left">
                    		   
                    		
            			    </div>
            			    <div class="pull-right">
            					<a href="<?php  echo url('user/find-password');?>" target="_blank" class="color-default">忘记密码？</a>
            				</div>
            			</div>
                      
                    </div>
                    <div class="text-center p-t-10 clearfix" style="width: 100%; padding: 5px 20px;">
                                                					</div>
                    				
			</span></form></div>
			
		
            <div style="display: block;width: 100%;position:absolute;bottom: 10px;left: 0;">
                <div style="display: block;margin: 0 auto;color: #fff;text-align: center" class="copyright"></div>
            </div>
		</div>
	</div>
	<script type="text/javascript" src="./resource/js/lib/jquery-1.11.1.min.js"></script>
	<script src="./resource/js/jquery-3.2.1.min.js"></script>
    <script async="" src="./resource/js/3d.js"></script>
	<script src="./resource/js/main.js"></script>
    <script>
        //iosOverlay
        var iosOverlay=function(params){var overlayDOM;var overlayBg;var noop=function(){};var defaults={onbeforeshow:noop,onshow:noop,onbeforehide:noop,onhide:noop,text:"",icon:null,spinner:null,duration:null,id:null,parentEl:null};var merge=function(obj1,obj2){var obj3={};for(var attrOne in obj1){obj3[attrOne]=obj1[attrOne]}for(var attrTwo in obj2){obj3[attrTwo]=obj2[attrTwo]}return obj3};var doesTransitions=(function(){var b=document.body||document.documentElement;var s=b.style;var p='transition';if(typeof s[p]==='string'){return true}var v=['Moz','Webkit','Khtml','O','ms'];p=p.charAt(0).toUpperCase()+p.substr(1);for(var i=0;i<v.length;i++){if(typeof s[v[i]+p]==='string'){return true}}return false}());var settings=merge(defaults,params);var handleAnim=function(anim){if(anim.animationName==="ios-overlay-show"){settings.onshow()}if(anim.animationName==="ios-overlay-hide"){destroy();settings.onhide()}};var create=(function(){overlayBg=document.createElement("div");overlayBg.className="ui-ios-bg";overlayDOM=document.createElement("div");overlayDOM.className="ui-ios-overlay";overlayDOM.innerHTML+='<span class="title">'+settings.text+'</span';if(params.icon){overlayDOM.innerHTML+='<img src="'+params.icon+'">'}else if(params.spinner){overlayDOM.appendChild(params.spinner.el)}if(doesTransitions){overlayBg.addEventListener("webkitAnimationEnd",handleAnim,false);overlayBg.addEventListener("msAnimationEnd",handleAnim,false);overlayBg.addEventListener("oAnimationEnd",handleAnim,false);overlayBg.addEventListener("animationend",handleAnim,false)}if(params.parentEl){document.getElementById(params.parentEl).appendChild(overlayDOM)}else{overlayBg.appendChild(overlayDOM);overlayBg.style.height=Math.max(document.body.scrollHeight,document.documentElement.scrollHeight)+'px';document.body.appendChild(overlayBg)}settings.onbeforeshow();if(doesTransitions){overlayBg.className+=" ios-overlay-show"}else if(typeof $==="function"){$(overlayBg).fadeIn({duration:200},function(){settings.onshow()})}if(settings.duration){window.setTimeout(function(){hide()},settings.duration)}}());var hide=function(){settings.onbeforehide();if(doesTransitions){overlayBg.className=overlayBg.className.replace("show","hide")}else if(typeof $==="function"){$(overlayDOM).fadeOut({duration:200},function(){destroy();settings.onhide()})}};var destroy=function(){if(params.parentEl){document.getElementById(params.parentEl).removeChild(overlayDOM)}else{document.body.removeChild(overlayBg)}};var update=function(params){if(params.text){overlayDOM.getElementsByTagName("span")[0].innerHTML=params.text}if(params.icon){if(settings.spinner){settings.spinner.el.parentNode.removeChild(settings.spinner.el);settings.spinner=null}overlayDOM.innerHTML+='<img src="'+params.icon+'">'}};return{hide:hide,destroy:destroy,update:update}};

        //fgnass.github.com/spin.js#v1.2.7
        !function(e,t,n){function o(e,n){var r=t.createElement(e||"div"),i;for(i in n)r[i]=n[i];return r}function u(e){for(var t=1,n=arguments.length;t<n;t++)e.appendChild(arguments[t]);return e}function f(e,t,n,r){var o=["opacity",t,~~(e*100),n,r].join("-"),u=.01+n/r*100,f=Math.max(1-(1-e)/t*(100-u),e),l=s.substring(0,s.indexOf("Animation")).toLowerCase(),c=l&&"-"+l+"-"||"";return i[o]||(a.insertRule("@"+c+"keyframes "+o+"{"+"0%{opacity:"+f+"}"+u+"%{opacity:"+e+"}"+(u+.01)+"%{opacity:1}"+(u+t)%100+"%{opacity:"+e+"}"+"100%{opacity:"+f+"}"+"}",a.cssRules.length),i[o]=1),o}function l(e,t){var i=e.style,s,o;if(i[t]!==n)return t;t=t.charAt(0).toUpperCase()+t.slice(1);for(o=0;o<r.length;o++){s=r[o]+t;if(i[s]!==n)return s}}function c(e,t){for(var n in t)e.style[l(e,n)||n]=t[n];return e}function h(e){for(var t=1;t<arguments.length;t++){var r=arguments[t];for(var i in r)e[i]===n&&(e[i]=r[i])}return e}function p(e){var t={x:e.offsetLeft,y:e.offsetTop};while(e=e.offsetParent)t.x+=e.offsetLeft,t.y+=e.offsetTop;return t}var r=["webkit","Moz","ms","O"],i={},s,a=function(){var e=o("style",{type:"text/css"});return u(t.getElementsByTagName("head")[0],e),e.sheet||e.styleSheet}(),d={lines:12,length:7,width:5,radius:10,rotate:0,corners:1,color:"#fff",speed:1,trail:100,opacity:.25,fps:20,zIndex:2e9,className:"spinner",top:"auto",left:"auto",position:"relative"},v=function m(e){if(!this.spin)return new m(e);this.opts=h(e||{},m.defaults,d)};v.defaults={},h(v.prototype,{spin:function(e){this.stop();var t=this,n=t.opts,r=t.el=c(o(0,{className:n.className}),{position:n.position,width:0,zIndex:n.zIndex}),i=n.radius+n.length+n.width,u,a;e&&(e.insertBefore(r,e.firstChild||null),a=p(e),u=p(r),c(r,{left:(n.left=="auto"?a.x-u.x+(e.offsetWidth>>1):parseInt(n.left,10)+i)+"px",top:(n.top=="auto"?a.y-u.y+(e.offsetHeight>>1):parseInt(n.top,10)+i)+"px"})),r.setAttribute("aria-role","progressbar"),t.lines(r,t.opts);if(!s){var f=0,l=n.fps,h=l/n.speed,d=(1-n.opacity)/(h*n.trail/100),v=h/n.lines;(function m(){f++;for(var e=n.lines;e;e--){var i=Math.max(1-(f+e*v)%h*d,n.opacity);t.opacity(r,n.lines-e,i,n)}t.timeout=t.el&&setTimeout(m,~~(1e3/l))})()}return t},stop:function(){var e=this.el;return e&&(clearTimeout(this.timeout),e.parentNode&&e.parentNode.removeChild(e),this.el=n),this},lines:function(e,t){function i(e,r){return c(o(),{position:"absolute",width:t.length+t.width+"px",height:t.width+"px",background:e,boxShadow:r,transformOrigin:"left",transform:"rotate("+~~(360/t.lines*n+t.rotate)+"deg) translate("+t.radius+"px"+",0)",borderRadius:(t.corners*t.width>>1)+"px"})}var n=0,r;for(;n<t.lines;n++)r=c(o(),{position:"absolute",top:1+~(t.width/2)+"px",transform:t.hwaccel?"translate3d(0,0,0)":"",opacity:t.opacity,animation:s&&f(t.opacity,t.trail,n,t.lines)+" "+1/t.speed+"s linear infinite"}),t.shadow&&u(r,c(i("#000","0 0 4px #000"),{top:"2px"})),u(e,u(r,i(t.color,"0 0 1px rgba(0,0,0,.1)")));return e},opacity:function(e,t,n){t<e.childNodes.length&&(e.childNodes[t].style.opacity=n)}}),function(){function e(e,t){return o("<"+e+' xmlns="urn:schemas-microsoft.com:vml" class="spin-vml">',t)}var t=c(o("group"),{behavior:"url(#default#VML)"});!l(t,"transform")&&t.adj?(a.addRule(".spin-vml","behavior:url(#default#VML)"),v.prototype.lines=function(t,n){function s(){return c(e("group",{coordsize:i+" "+i,coordorigin:-r+" "+ -r}),{width:i,height:i})}function l(t,i,o){u(a,u(c(s(),{rotation:360/n.lines*t+"deg",left:~~i}),u(c(e("roundrect",{arcsize:n.corners}),{width:r,height:n.width,left:n.radius,top:-n.width>>1,filter:o}),e("fill",{color:n.color,opacity:n.opacity}),e("stroke",{opacity:0}))))}var r=n.length+n.width,i=2*r,o=-(n.width+n.length)*2+"px",a=c(s(),{position:"absolute",top:o,left:o}),f;if(n.shadow)for(f=1;f<=n.lines;f++)l(f,-2,"progid:DXImageTransform.Microsoft.Blur(pixelradius=2,makeshadow=1,shadowopacity=.3)");for(f=1;f<=n.lines;f++)l(f);return u(t,a)},v.prototype.opacity=function(e,t,n,r){var i=e.firstChild;r=r.shadow&&r.lines||0,i&&t+r<i.childNodes.length&&(i=i.childNodes[t+r],i=i&&i.firstChild,i=i&&i.firstChild,i&&(i.opacity=n))}):s=l(t,"animation")}(),e.Spinner=v}(window,document);
        setTimeout(function(){
            $('video').css('position', 'fixed').fadeIn();
        }, 300);
        $.extend({
            alert: function (text = '') {
                $('.modal-body').html(text);
                var modal = $('.modal');
                modal.modal('toggle');
            },
            toast: function (text = '', icon = '', duration = 2000, extraClass = 'ui-toast') {
                var opt = {
                    text: text,
                    duration: duration,
                };
                if (icon == 'success') {
                    opt.icon = 'http://denglu.vokj.net/addons/superman_home/template/apple/check.png';
                } else if (icon == 'fail' || icon == 'error') {
                    opt.icon = 'http://denglu.vokj.net/addons/superman_home/template/apple/cross.png';
                }
                setTimeout(function () {
                    iosOverlay(opt);
                    $('.ui-ios-bg').addClass(extraClass);
                    $('.ui-ios-overlay').css({
                        'margin-left': -$('.ui-ios-overlay').width()/2,
                        'margin-top': -$('.ui-ios-overlay').height()/2,
                    });
                }, 10);
            },
            showLoading: function (text = '加载中...') {
                if ($('.ios-overlay-show')[0]) return;
                var opt = {
                    text: text,
                    spinner: new Spinner().spin(document.createElement('div'))
                };
                iosOverlay(opt);
            },
            hideLoading: function () {
                $('.ios-overlay-show').remove();
            }
        });
      
    </script>


