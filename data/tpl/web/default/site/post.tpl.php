<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ol class="breadcrumb we7-breadcrumb">
	<a href="<?php  echo url('site/multi')?>"><i class="wi wi-back-circle"></i> </a>
	<li>
		<a href="<?php  echo url('site/multi')?>">微官网列表</a>
	</li>
	<li>
		编辑
	</li>
</ol>
<form action="" method="post" class="panel panel-cut" id="js-wesite-post" ng-controller="WesitePost" ng-cloak>
	<input type="hidden" name="multiid" value="<?php  echo $_GPC['multiid'];?>">
	<div class="wesite-post">
		

		<div class="site-view">
			<div class="we7-iphone-view">
				<div class="template-name" ng-bind="multi.style && multi.style.name">模板名称</div>	
				<div ng-style="">
					<iframe ng-src="{{siteEntrance}}" frameborder="0" width="300" height="553" scrolling="no" id="preview-iframe"></iframe>
					<span class="btn btn-primary" ng-style="{'margin-left': '36%'}" onclick="document.getElementById('preview-iframe').contentWindow.location.reload(true);">预览刷新</span> <a href="javascript:;" data-toggle="tooltip" data-placement="bottom" title="预览刷新功能只支持幻灯片、导航菜单、底部菜单功能。其他请点击完成按钮再行查看！"><i class="wi wi-info" ></i></a> 
					<!-- <div class="help-block">
						<span class="color-red">温馨提示：</span>
						预览刷新功能只支持幻灯片、导航菜单、底部菜单功能。其他请点击完成按钮再行查看！
					</div> -->
				</div>
				<div class="nav-menu" ng-hide="1">
					<div class="js-quickmenu nav-menu-wx clearfix" ng-class="{0 : 'has-nav-0', 1 : 'has-nav-1', 2: 'has-nav-2', 3: 'has-nav-3', 4 : 'has-nav-3'}[activeItem.menus.length]" ng-if="activeItem.navStyle == 1">
						<div class="nav-home text-center">
							<a href="<?php  echo $_W['siteroot'];?>app/index.php?i=<?php  echo $_W['uniacid'];?>&j=<?php  echo $_W['acid'];?>"><i class="fa fa-home"></i></a>
						</div>
						<ul class="nav-group">
							<li class="nav-group-item" ng-if="$index < 3" ng-repeat="menu in activeItem.menus">
								<a ng-if="!menu.submenus || menu.submenus.length == 0" href="{{menu.url}}">
									{{menu.title}}
								</a>
								<a ng-if="menu.submenus.length > 0" href="javascript:;" data-toggle="dropdown">
									<i class="fa fa-minus-circle"></i>
									{{menu.title}}
								</a>
								<dl ng-if="menu.submenus.length > 0">
									<dd>
										<a href="{{submenu.url}}" ng-repeat="submenu in menu.submenus">{{submenu.title}}</a>
									</dd>
								</dl>
							</li>
						</ul>
					</div>
					<div class="js-quickmenu nav-menu-app has-nav-0" ng-if="activeItem.navStyle == 2" ng-class="{0 : 'has-nav-0', 1 : 'has-nav-1', 2: 'has-nav-2', 3: 'has-nav-3', 4: 'has-nav-4', 5: 'has-nav-5'}[activeItem.menus.length]" ng-style="{'background-color' : activeItem.bgColor}">
						<ul class="nav-group clearfix">
							<li class="nav-group-item" ng-repeat="menu in activeItem.menus">
								<a href="{{menu.url}}" style="background-position: center 2px" ng-style="{'background-image': menu.image ? 'url('+menu.image+')' : ''}">
									<i ng-hide="menu.image" class="fa" ng-style="{'color' : menu.icon.color}" js-onclass-name="{{menu.hovericon.name}}" js-onclass-color="{{menu.hovericon.color}}" ng-class="menu.icon.name"></i>
									<span ng-style="{'color' : menu.icon.color}" js-onclass-color="{{menu.hovericon.color}}">{{menu.title}}</span>
								</a>
							</li>
						</ul>
					</div>
					<div class="js-quickmenu nav-menu-cart" ng-if="activeItem.navStyle == 3" ng-class="{0 : 'has-nav-0', 1 : 'has-nav-1', 2: 'has-nav-2', 3: 'has-nav-3', 4: 'has-nav-4'}[activeItem.menus.length]" ng-style="{'background-color' : activeItem.bgColor}">
						<ul class="nav-group clearfix">
							<li class="nav-group-item">
								<a href="{{activeItem.menus[0].url}}" ng-style="{'background-image': activeItem.menus[0].image ? 'url('+activeItem.menus[0].image+')' : ''}">
									<i ng-hide="activeItem.menus[0].image" class="fa" ng-style="{'color' : activeItem.menus[0].icon.color}"
									ng-class="activeItem.menus[0].icon.name">
									</i>
								</a>
							</li>
							<li ng-if="activeItem.menus[2]" class="nav-group-item">
								<a href="{{activeItem.menus[1].url}}" ng-style="{'background-image': activeItem.menus[1].image ? 'url('+activeItem.menus[1].image+')' : ''}">
									<i ng-hide="activeItem.menus[1].image" class="fa" ng-style="{'color' : activeItem.menus[1].icon.color}" ng-class="activeItem.menus[1].icon.name"></i>
								</a>
							</li>
							<li class="nav-home nav-group-item">
								<a href="{{activeItem.extend[0].url}}" ng-style="{'background-image': activeItem.extend[0].image ? 'url('+activeItem.extend[0].image+')' : ''}">
									<i ng-hide="activeItem.extend[0].image" class="fa" ng-style="{'color' : activeItem.extend[0].icon.color}" ng-class="activeItem.extend[0].icon.name"></i>
								</a>
							</li>
							<li class="nav-group-item" ng-if="activeItem.menus[1]">
								<a ng-if="!activeItem.menus[2]" href="{{activeItem.menus[1].url}}" ng-style="{'background-image': activeItem.menus[1].image ? 'url('+activeItem.menus[1].image+')' : ''}">
									<i ng-hide="activeItem.menus[1].image" class="fa" ng-style="{'color' : activeItem.menus[1].icon.color}" ng-class="activeItem.menus[1].icon.name"></i>
								</a>
								<a ng-if="activeItem.menus[2]" href="{{activeItem.menus[2].url}}" ng-style="{'background-image': activeItem.menus[2].image ? 'url('+activeItem.menus[2].image+')' : ''}">
									<i ng-hide="activeItem.menus[2].image" class="fa" ng-style="{'color' : activeItem.menus[2].icon.color}" ng-class="activeItem.menus[2].icon.name"></i>
								</a>
							</li>
							<li ng-if="activeItem.menus[3]" class="nav-group-item">
								<a href="{{activeItem.menus[3].url}}" ng-style="{'background-image': activeItem.menus[3].image ? 'url('+activeItem.menus[3].image+')' : ''}">
									<i ng-hide="activeItem.menus[3].image" class="fa" ng-style="{'color' : activeItem.menus[3].icon.color}" ng-class="activeItem.menus[3].icon.name"></i>
								</a>
							</li>
						</ul>
					</div>
					<div class="js-quickmenu nav-menu-path rotate-nav has-nav-4" ng-if="activeItem.navStyle == 4">
						<div class="nav-group">
							<div class="nav-group-item on" ng-repeat="menu in activeItem.menus">
								<a href="{{menu.url}}" ng-style="{'background-image': menu.image ? 'url('+menu.image+')' : ''}">
									<i ng-hide="menu.image" class="fa" ng-style="{'color' : menu.icon.color}" ng-class="menu.icon.name"></i>
								</a>
							</div>
						</div>
						<div class="nav-home nav-group-item js-quickmenu-toggle">
							<a href="javascript:;" style="background-image:url(./resource/images/app/centerbtn.png);"></a>
						</div>
					</div>
					<div class="js-quickmenu nav-menu-sides rotate-nav has-nav-4" ng-if="activeItem.navStyle == 5">
						<div class="nav-group">
							<div class="nav-group-item on" ng-repeat="menu in activeItem.menus">
								<a href="{{menu.url}}" ng-style="{'background-image': menu.image ? 'url('+menu.image+')' : ''}">
									<i ng-hide="menu.image" class="fa" ng-style="{'color' : menu.icon.color}" ng-class="menu.icon.name"></i>
								</a>
							</div>
						</div>
						<div class="main-nav">
							<div class="nav-group-item pull-left">
								<a href="{{activeItem.extend[0].url}}" ng-style="{'background-image': activeItem.extend[0].image ? 'url('+activeItem.extend[0].image+')' : ''}">
									<i ng-hide="activeItem.extend[0].image" class="fa" ng-style="{'color' : activeItem.extend[0].icon.color}" ng-class="activeItem.extend[0].icon.name"></i>
								</a>
							</div>
							<div class="nav-home nav-group-item js-quickmenu-toggle">
								<a href="javascript:;" style="background-image:url(./resource/images/app/centerbtn.png);"></a>
							</div>
							<div class="nav-group-item pull-right">
								<a href="{{activeItem.extend[1].url}}" ng-style="{'background-image': activeItem.extend[1].image ? 'url('+activeItem.extend[1].image+')' : ''}">
									<i ng-hide="activeItem.extend[1].image" class="fa" ng-style="{'color' : activeItem.extend[1].icon.color}" ng-class="activeItem.extend[1].icon.name"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="site-edit-view">
			<div class="site-edit-nav">
				<ul>
					<li class="site-edit-item active">
						<a href="#template" data-toggle="tab">选择模板</a>
					</li>
					<li class="site-edit-item">
						<a href="#entrance" data-toggle="tab">微官网入口</a>
					</li>
					<li class="site-edit-item">
						<a href="#default" data-toggle="tab">基础信息</a>
					</li>
					<li class="site-edit-item" ng-click="loadSlideInfo()">
						<a href="#slide" data-toggle="tab" id="load-slide">幻灯片</a>
					</li>
					<li class="site-edit-item" ng-click="loadHomemenuInfo()">
						<a href="#homemenu" data-toggle="tab" id="load-homemenu">导航菜单</a>
					</li>
					<li class="site-edit-item" ng-click="loadQuickmenuInfo()">
						<a href="#quickmenu" data-toggle="tab" id="load-quickmenu">底部菜单</a>
					</li>
				</ul>
			</div>
			<div class="tab-content site-edit-content">
				<!--入口-->
				<div class="tab-pane active" id="template">
					<div class="site-select-tem" >
						<div class="select-tem-filter search-box">
							<div class="form-group">
								<select class="we7-select col-sm-12" ng-model="temtype" ng-options="tem.title for tem in temtypes">
								</select>
							</div>
							<div class="form-group">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="输入模板名" ng-model="searchedStyleName">
									<span class="input-group-btn" ng-click="searchStyle()"><a class="btn btn-default"> <i class="fa fa-search"></i></a></span>
								</div>
							</div>
						</div>
						<div class="select-tem-list">
							<ul>
								<li class="select-tem-item" ng-repeat="style in styles" ng-class="{'active': multi.style.id == style.id}" ng-click="selectStyle(style)" ng-show="temtype.name == 'all' || temtype.name == style.type">
									<input type="text" name="styleid" ng-model="multi.style.id" ng-style="{'display': 'none'}">
									<img ng-src="../app/themes/{{style.tname}}/preview.jpg" />
									<a href="javascript:;" class="cover-dark" ng-style="{'padding': '5px'}">
										<i class="fa fa-check cover-selected"></i>
										<span ng-bind="style.name" class="text-over" ng-style="{'position': 'absolute', 'bottom': '1px', 'color': 'white'}"></span>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="we7-form tab-pane " id="entrance">
					<div class="entrance-url ">
						<div class="form-group">
							<label for="" class="control-label col-sm-2">微官网链接</label>
							<div class="form-controls col-sm-10 form-control-static">
								<a ng-href="{{siteEntrance}}" class="form-control-static color-default" target="_blank" ng-bind="siteEntrance"></a>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="control-label col-sm-2"></label>
							<div class="form-controls col-sm-10">
								<a href="javascript:;" class="btn btn-default" id="copy-{{multi.id}}" clipboard supported="supported" text="siteEntrance" on-copied="success(multi.id)">复制链接</a>
							</div>
						</div>
					</div>
					<div class="entrance-edit">
						<div class="form-group">
							<label class="control-label col-sm-2">触发关键字</label>
							<div class="form-controls col-sm-10">
								<input type="text" name="keyword" class="form-control" ng-model="multi.site_info.keyword"/>
								<div class="help-block">用户触发关键字，系统回复此页面的图文链接</div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2">封面</label>
							<div class="form-controls col-sm-10">
								<div class="we7-input-img input-more" ng-class="{'active': multi.site_info.thumb}">
									<img ng-src="{{multi.site_info.thumb}}" ng-if="multi.site_info.thumb">
									<a href="javascript:;" class="input-addon" ng-click="uploadMultiImage()" ng-hide="multi.site_info.thumb"><span>+</span></a>
									<input type="text" name="thumb" ng-model="multi.site_info.thumb" ng-style="{'display' : 'none'}">
									<div class="cover-dark">
										<a href="javascript:;" class="cut" ng-click="uploadMultiImage()">更换</a>
										<a href="javascript:;" class="del" ng-click="delMultiImage()"><i class="fa fa-times text-danger"></i></a>
									</div>
								</div>
								<div class="help-block">建议尺寸：900*500 <br>用于用户触发关键字后，系统回复时的封面图片</div>
							</div>
						</div>
					</div>
				</div>

				<!--基础信息-->
				<div class="tab-pane fade in" id="default">
					<div class="we7-form">
						<div class="form-group">
							<label for="" class="control-label col-sm-2">微站名称</label>
							<div class="form-controls col-sm-10">
								<input type="text" name="title" class="form-control" ng-model="multi.title"/>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="control-label col-sm-2">是否启用</label>
							<div class="form-controls col-sm-10">
								<label>
									<input type="text" name="status" class="form-control" ng-model="multi.status" ng-style="{'display': 'none'}">
									<div class="switch" ng-class="{'switchOn' : multi.status == 1}" ng-click="changeMultiStatus()" ng-if='default_site != multi.id'></div>
									<div class="switch switchOn" ng-style="{'opacity': '0.3'}" ng-if='default_site == multi.id'>
									</div>
									<span class="help-block" ng-if="default_site == multi.id">默认微站不可关闭</span>
								</label>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="control-label col-sm-2">页面描述</label>
							<div class="form-controls col-sm-10">
								<input type="text" name="description" class="form-control" ng-model="multi.site_info.description">
								<span class="help-block">用户通过微信分享给朋友时,会自动显示页 面描述</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="control-label col-sm-2">绑定域名</label>
							<div class="form-controls col-sm-10">
								<input type="text" name="bindhost" class="form-control" ng-model="multi.bindhost">
								<span class="help-block">绑定时请先将域名解析指向到本服务器，请只填写host部分，不允许为当前系统域名。例如：www.baidu.com</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="control-label col-sm-2">底部自定义</label>
							<div class="form-controls col-sm-10">
								<textarea class="form-control" cols="30" name="footer" autocomplete="off"><?php  echo $multi['site_info']['footer'];?></textarea>
								<span class="help-block">自定义底部信息</span>
							</div>
						</div>
					</div>
				</div>

				<!--幻灯片-->
				<div class="tab-pane fade" id="slide">
					<!--幻灯片列表-->
					<div class="site-slide-list">
						<ul>
							<li ng-repeat="list in slideLists">
								<div class="site-slide-item media">
									<div class="media-left media-middle slide-sort">
										<span ng-style="{'color': '#98999a'}">排序</span>
										<input type="text" class="form-control" ng-model="list.displayorder" ng-style="{'padding': '0', 'text-align': 'center'}">
									</div>
									<div class="media-left media-middle slide-img" ng-class="{'active': list.thumb}">
										<div ng-style="{'border': '1px dashed #e7e7eb', 'position': 'relative','text-align': 'center', 'height': '65px'}">
											<img ng-src="{{list.thumb}}" ng-if="list.thumb">
											<a href="javascript:;" class="input-addon" ng-click="uploadSlideImage(list)" ng-hide="list.thumb" ng-style="{'line-height': '65px'}"><span>+</span></a>
											<div class="cover-dark">
												<a href="javascript:;" class="cut" ng-click="uploadSlideImage(list)">更换</a>
												<a href="javascript:;" class="del" ng-click="delSlideImage(list)"><i class="fa fa-times text-danger"></i></a>
											</div>
										</div>
									</div>
									<div class="media-body">
										<div class="slide-title">
											<input type="text" ng-model="list.title" ng-style="{'width': '168px', 'border': '1px solid #ccc'}">
										</div>
										<div class="slide-alter">
											<input type="text" ng-model="list.url" ng-style="{'width': '168px', 'border': '1px solid #ccc'}">
										</div>
										<a href="javascript:;" class="slide-del" ng-click="delSlide(list)"><i class="fa fa-times text-danger"></i></a>
									</div>
								</div>
							</li>
							<li class="slide-list-more site-slide-item">
								<a href="javascript:;" class="slide-add" ng-click="addSlide()">+</a>
							</li>
						</ul>
						<div class="btn btn-primary we7-padding-horizontal site-btn-bottom" ng-click="saveSlide()">保存</div>
					</div>
				</div>

				<!--首页导航菜单-->
				<div class="tab-pane fade homemenu" id="homemenu">
					<div class="panel panel-warning" ng-show="!addHomemenuStatus">
						<div class="panel-body">
							<p>当前使用的风格为：<span ng-bind="multi.style.name"></span>；</p>
							<p>模板文件为：<span ng-bind="multi.style.title"></span>（/app/themes/<span ng-bind="multi.style.tname"></span>）；</p>
							<p ng-if="multi.style.sections == 0">此模板未提供导航位置功能</p>
							<p ng-if="multi.style.sections != 0">此模板提供 <span ng-bind="multi.style.sections"></span> 个导航位置，您可以指定导航在特定的位置显示，未指位置的导航将无法显示</p>
						</div>
					</div>
					<table class="table we7-table table-hover" ng-show="!addHomemenuStatus">
						<col width="100px" />
						<col width="70px" />
						<col width="85px" />
						<col width="180px" />
						<tr>
							<th>标题</th>
							<th>图标</th>
							<th>是否显示</th>
							<th>操作</th>
						</tr>
						<tr ng-repeat="menu in homeMenu">
							<td class="title" title="{{menu.name}}" ng-bind="menu.name"></td>
							<td class="icon">
								<img ng-src="{{attachurl + menu.icon}}" width="30px" ng-if="menu.icon">
								<i class="fa fa-2x {{menu.css.icon.icon}}" ng-if="menu.icon == ''"></i>
								</td>
							<td><div class="switch" ng-class="{'switchOn': menu.status == 1}" ng-click="updateMenu(menu, 'switch')"></div></td>
							<td class="edit">
								<a href="javascript:;" id="copy-{{menu.id}}" clipboard supported="supported" text="menu.url" on-copied="successMenu(menu.id)">复制链接</a>
								<a href="javascript:;" ng-click="changeHomemenuStatus(menu)">编辑</a>
								<a href="javascript:;" ng-click="updateMenu(menu, 'del')">删除</a>
							</td>
						</tr>
						<tr class="more">
							<td colspan="4" ng-click="changeHomemenuStatus()">
								<a href="javascript:;" class="color-default">+添加</a>
							</td>
						</tr>
					</table>

					<!--首页导航菜单编辑-->
					<div class="site-nav-edit" ng-show="addHomemenuStatus">
						<div class="edit-heading">
							<a href="javascript:;" class="go-back" ng-click="changeHomemenuStatus()"><i class="wi wi-back-circle"></i></a>
							<a href="javascript:;" class="color-gray" ng-click="changeHomemenuStatus()">导航菜单列表 / </a>
							<span class="color-dark">编辑导航菜单</span>
						</div>
						<div class="we7-form">
							<div class="form-group">
								<label for="" class="control-label col-sm-2">导航显示位置</label>
								<div class="form-controls col-sm-10">
									<select ng-model="menuInfo.section" class="we7-select" ng-options="sec.val for sec in sections"></select>
									<span class="help-block">设置位置后可以将导航菜单显示到模板对应的位置中。（可以同时设置多个导航在同一个位置中，会根据排序大小依次显示），显示的位置必须要有模板支持。</span>
									<strong class="text-danger">注意：如果您添加了模板未设置的位置时，该链接将不会显示，您可以在导航列表中查看。</strong>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="control-label col-sm-2">名称</label>
								<div class="form-controls col-sm-10">
									<input type="text" value="1" ng-model="menuInfo.position" ng-style="{'display': 'none'}"/>
									<input type="text" class="form-control" ng-model="menuInfo.name"/>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="control-label col-sm-2">描述</label>
								<div class="form-controls col-sm-10">
									<textarea rows="4" cols="" class="form-control" ng-model="menuInfo.description"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="control-label col-sm-2">链接</label>
								<div class="form-controls col-sm-10">
									<div we7-linker we7-my-url="menuInfo.url" we7-my-title="menuInfo.url"></div>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="control-label col-sm-2">状态</label>
								<div class="col-sm-10">
									<input id='radio-1' type="radio" value="1" name="" ng-model="menuInfo.status" ng-checked="menuInfo.status == 1">
									<label for="radio-1">显示	</label>
									<input id='radio-2' type="radio" value="0" name="" ng-model="menuInfo.status" ng-checked="menuInfo.status == 0">
									<label for="radio-2">隐藏</label>
									<span class="help-block">设置导航菜单的显示状态</span>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="control-label col-sm-2">排序</label>
								<div class="form-controls col-sm-10">
									<input type="text" class="form-control" ng-model="menuInfo.displayorder">
									<span class="help-block">导航排序，越大越靠前</span>
								</div>
							</div>
							<div class="penel we7-panel panel-new">
								<div class="panel-heading">
									导航样式
								</div>
								<div class="panel-body we7-padding-top">
									<div class="we7-form">
										<div class="form-group">
											<label for="" class="control-label col-sm-2">图标类型</label>
											<div class="form-controls col-sm-10">
												<div class="form-control-static">
													<input id='icontype-1' type="radio" value="1" name="" ng-model="menuInfo.icontype"  ng-checked="menuInfo.icontype == 1">
													<label for="icontype-1">系统内置</label>
													<input id='icontype-2' type="radio" value="2" name="" ng-model="menuInfo.icontype"  ng-checked="menuInfo.icontype == 2"/>
													<label for="icontype-2">自定义上传</label>
												</div>
											</div>
										</div>
										<div class="form-group" ng-if="menuInfo.icontype == 2">
											<label for="" class="control-label col-sm-2">上传图标</label>
											<div class="form-controls col-sm-10">
												<div class="we7-input-img input-more input-img" ng-class="{'active': menuInfo.icon}" ng-style="{'width': '100px', 'height': '100px'}">
													<img ng-src="{{attachurl + menuInfo.icon}}" width="150px" ng-if="menuInfo.icon">
													<a href="javascript:;" class="input-addon" ng-click="uploadHomemenuImage(menuInfo)"  ng-hide="menuInfo.icon">
														<span>+</span>
													</a>
													<div class="cover-dark">
														<a href="javascript:;" class="cut" ng-click="uploadHomemenuImage(menuInfo)">更换</a>
														<a href="javascript:;" class="del" ng-click="delHomemenuImage(menuInfo)"><i class="fa fa-times text-danger"></i></a>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group" ng-if="menuInfo.icontype != 2">
											<label for="" class="control-label col-sm-2">系统图标</label>
											<div class="form-controls col-sm-10" >
												<div class="input-group">
													<input type="text" class="form-control" ng-model="menuInfo.css.icon.icon"/>
													<span class="input-group-addon" ng-click="selectHomemenuIcon()"><i class="{{menuInfo.css.icon.icon}}" ng-init="menuInfo.css.icon.icon = 'fa fa-external-link'"></i></span>
													<span class="input-group-btn" ng-click="selectHomemenuIcon()"><a class="btn btn-default">&nbsp;选择图标</a></span>
												</div>
												<span class="help-block">导航的背景图标，系统提供了丰富的图标ICON。</span>
											</div>
										</div>
										<div class="form-group" ng-if="menuInfo.icontype != 2">
											<label for="" class="control-label col-sm-2">图标颜色</label>
											<div class="form-controls col-sm-10">
												<div class="input-group">
													<input type="text" class="form-control" ng-model="menuInfo.css.icon.color" ng-style="{'display' : 'none'}">
													<div we7-colorpicker we7-my-color="menuInfo.css.icon.color" we7-my-default-color="'#2B2D30'"></div>
											
												</div>
											</div>
										</div>
										<div class="form-group" ng-if="menuInfo.icontype != 2">
											<label for="" class="control-label col-sm-2">图标大小</label>
											<div class="form-controls col-sm-10" >
												<div class="input-group col-sm-4">
													<input class="form-control" type="text" ng-model="menuInfo.css.icon.width" ng-init="menuInfo.css.icon.width = menuInfo.css.icon.width ? menuInfo.css.icon.width : 35">
													<span class="input-group-addon">PX</span>
												</div>
												<span class="help-block">图标的尺寸大小，单位为像素，上传图标时此设置项无效</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="btn btn-primary we7-padding-horizontal site-btn-bottom col-sm-offset-2" ng-click="saveMenu()">保存</div>
						</div>
					</div>
				</div>

				<!--底部菜单-->
				<div class="tab-pane fade shopNav" id="quickmenu">
					<div class="we7-form app-side">
						<div class="form-group">
							<label for="" class="control-label col-sm-2">是否开启</label>
							<div class="form-controls col-sm-10">
								<label>
									<div class="switch" ng-class="{'switchOn': quickMenuStatus}" ng-click="quickMenuSwitch()"></div>
								</label>
								<span class="help-block">微站的各个页面可以通过底部菜单串联起来。通过精心设置的底部菜单，方便访问者在页面或是栏目间快速切换，引导访问者前往您期望的页面。</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="control-label col-sm-2">导航应用:</label>
							<div class="form-controls col-sm-10 form-control-static">
								<input id='check-1' type="checkbox" ng-model="activeItem.position.homepage"/>
								<label for="check-1">微站主页</label>
								<input id='check-2' type="checkbox" ng-model="activeItem.position.page" />
								<label for="check-2">微页面</label>
								<input id='check-3' type="checkbox" ng-model="activeItem.position.article" />
								<label for="check-3">文章及分类</label>
								<span class="help-block">将导航应用在以上页面</span>
							</div>
						</div>
						<?php  if($_W['role'] != 'operator') { ?>
						<div class="form-group">
							<label for="" class="control-label col-sm-2">导航隐藏:</label>
							<div class="form-controls col-sm-10">
								<a href="javascript:;" class="color-default" ng-click="showSearchModules()">选择模块</a>
								<div class="form-control-static">
									<label class="label label-warning" ng-show="!hasIgnoreModules">未设置，将在全部模块中显示</label>
									<label style="margin-right:5px; display: inline-block;" class="label label-success" ng-show="hasIgnoreModules" ng-repeat="module in activeItem.ignoreModules">{{module.title}}</label>
								</div>
								<span class="help-block">将导航隐藏在以上模块</span>
							</div>
						</div>
						<?php  } ?>
						<div class="panel we7-panel app-shopNav-edit">
							<div class="panel-heading">
								当前模板: 微信公众号自定义菜单模板
								<div class="pull-right">
									<span class="btn btn-primary" data-toggle="modal" data-target="#shop-nav-modal">修改模板</span>
								</div>
							</div>
							<div class="panel-body">
								<!--微信公众号自定义菜单模板:shopNav-wx-->
								<div class="shopNav-wx" ng-show="activeItem.navStyle == 1">
									<div class="card" ng-init="$parentIndex = $index" ng-repeat="menu in activeItem.menus">
										<div class="btns">
											<a href="javascript:;" ng-click="removeMenu(menu)"><i class="fa fa-times"></i></a>
										</div>
										<div class="nav-region">
											<div class="first-nav">
												<h3>一级导航</h3>
												<div>
													<div class="form-group">
														<label class="control-label col-sm-2 text-center" >标题</label>
														<div class="form-controls col-sm-10">
															<input type="text" class="form-control" name="" value="" ng-model="menu.title" />
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-sm-2 text-center" >链接到</label>
														<div class="form-controls col-sm-10">
															<div we7-linker we7-my-url="menu.url" we7-my-title="menu.title"></div>
														</div>
													</div>
												</div>
											</div>
											<div class="second-nav">
												<h4>二级导航</h4>
												<div ng-repeat="submenu in menu.submenus" class="alert">
													<div class="del">
														<a href="javascript:;" ng-click="removeSubMenu($parentIndex, submenu)"><i class="fa fa-times"></i></a>
													</div>
													<div class="form-group">
														<label class="control-label col-sm-2 text-center">标题</label>
														<div class="form-controls col-sm-10">
															<input type="text" class="form-control" name="" ng-model="submenu.title">
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-sm-2 text-center" >链接到</label>
														<div class="form-controls col-sm-10">
															<div we7-linker we7-my-url="submenu.url" we7-my-title="submenu.title"></div>
														</div>
													</div>
												</div>
												<div ng-show="!menu.submenus || menu.submenus.length < 5" ng-click="menu.submenus.length >= 5 ? '' : addSubMenu(menu);" class="add-shopNav">+ 添加二级导航</div>
												<!--最多可添加5个-->
											</div>
										</div>
									</div>
									<div ng-show="!activeItem.menus || activeItem.menus.length < 3" class="add-shopNav text-center" ng-click="activeItem.menus.length >= 3 ? '' : addMenu();">+添加一级导航</div>
									<!--最多添加三个导航-->
								</div>
								<!--end微信公众号自定义菜单模板-->

								<!--APP导航样式:shopNav-app-->
								<div class="shopNav-app" ng-show="activeItem.navStyle == 2">
									<div class="form-group we7-padding-top">
										<label for="" class="control-label col-sm-2" >页面颜色</label>
										<div class="form-controls col-sm-10 input-group">
											<div we7-colorpicker we7-my-color="activeItem.bgColor" we7-my-default-color="'#2B2D30'"></div>
										</div>
									</div>
									<div class="card" ng-repeat="menu in activeItem.menus">
										<div class="btns">
											<a href="javascript:;" ng-click="removeMenu(menu)"><i class="fa fa-times"></i></a>
										</div>
										<div class="nav-img-group">
											<div class="clearfix">
												<div class="nav-img-normal pull-left">
													<label class="control-label col-sm-2">普通：</label>
													<div class="form-controls col-sm-10">
														<div we7-iconer we7-my-image="menu.image" we7-my-icon="menu.icon" we7-my-icon-color="menu.icon.color">选择</div>
													</div>
												</div>
												<div class="nav-img-highlight pull-left">
													<label class="control-label col-sm-2">高亮：</label>
													<div class="form-controls col-sm-10">
														<div we7-iconer we7-my-image="menu.hoverimage" we7-my-icon="menu.hovericon">选择</div>
													</div>
												</div>
												<div class="help-block" ng-style="{'margin-left': '90px'}">尺寸要求：不大于82*82像素，支持PNG格式</div>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-sm-2" >标题</label>
											<div class="form-controls col-sm-10">
												<input type="text" class="form-control" name="" ng-model="menu.title">
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-sm-2" >链接到</label>
											<div class="form-controls col-sm-10 ">
												<div we7-linker we7-my-url="menu.url" we7-my-title="menu.title"></div>
											</div>
										</div>
									</div>
									<div class="add-shopNav text-center" ng-show="!activeItem.menus || activeItem.menus.length < 5" ng-click="activeItem.menus.length >= 5 ? '' : addMenu();">+添加导航</div>
								</div>
								<!--end APP导航样式-->

								<!--带购物车导航模板-->
								<div class="shopNav-cart" ng-show="activeItem.navStyle == 3">
									<div class="form-group we7-padding-top" style="border-bottom:1px solid #e5e5e5;">
										<label class="control-label col-sm-2" >页面颜色</label>
										<div class="form-controls col-sm-10 input-group">
											<div we7-colorpicker we7-my-color="activeItem.bgColor" we7-my-default-color="'#2B2D30'"></div>
										</div>
									</div>
									<p>添加中间主图标</p>
									<div class="card">
										<div class="nav-img-group">
											<div class="clearfix">
												<div class="nav-img-normal pull-left">
													<label class="control-label col-sm-6">普通：</label>
													<div class="form-controls col-sm-6">
														<div we7-iconer we7-my-image="activeItem.extend[0].image" we7-my-icon="activeItem.extend[0].icon" we7-my-icon-color="activeItem.extend[0].icon.color">选择</div>
													</div>
												</div>
												<div class="nav-img-highlight pull-left">
													<label class="control-label col-sm-6">高亮：</label>
													<div class="form-controls col-sm-6">
														<div we7-iconer we7-my-image="activeItem.extend[0].hoverimage" we7-my-icon="activeItem.extend[0].hovericon">选择</div>
													</div>
												</div>
											</div>
											<div class="help-block" ng-style="{'margin-left': '90px'}">尺寸要求：不大于82*82像素，支持PNG格式</div>
										</div>
										<div class="form-group">
											<label class="control-label col-sm-2" >链接到</label>
											<div class="form-controls col-sm-10 ">
												<div we7-linker we7-my-url="activeItem.extend[0].url" we7-my-title="activeItem.extend[0].title"></div>
											</div>
										</div>
									</div>
									<p>添加两侧图标</p>
									<div class="help-block">此导航模板建议您用两个或者四个自定义图标效果图最佳哦！</div>
									<div class="card" ng-repeat="menu in activeItem.menus">
										<div class="nav-img-group">
											<div class="btns">
												<a href="javascript:;" ng-click="removeMenu(menu)"><i class="fa fa-times"></i></a>
											</div>
											<div class="clearfix">
												<div class="nav-img-normal pull-left">
													<label class="control-label col-sm-2">普通：</label>
													<div class="form-controls col-sm-10">
														<div we7-iconer we7-my-image="menu.image" we7-my-icon="menu.icon" we7-my-icon-color="menu.icon.color">选择</div>
													</div>
												</div>
												<div class="nav-img-highlight pull-left">
													<label class="control-label col-sm-2">高亮：</label>
													<div class="form-controls col-sm-10">
														<div we7-iconer we7-my-image="menu.hoverimage" we7-my-icon="menu.hovericon">选择</div>
													</div>
												</div>
											</div>
											<div class="help-block" ng-style="{'margin-left': '90px'}">尺寸要求：建议82*82像素</div>
										</div>
										<div class="form-group">
											<label class="control-label col-sm-2" >链接到</label>
											<div class="form-controls col-sm-10 ">
												<div we7-linker we7-my-url="menu.url" we7-my-title="menu.title"></div>
											</div>
										</div>
									</div>
									<div class="add-shopNav text-center" ng-show="!activeItem.menus || activeItem.menus.length < 4" ng-click="activeItem.menus.length >= 4 ? '' : addMenu();">+添加导航</div>
								</div>
								<!--end 带购物车导航模板-->

								<!--Path展开形式导航模板-->
								<div class="shopNav-path" ng-show="activeItem.navStyle == 4">
										<p class="help-block">此导航模板建议您用三个自定义图标效果最佳哦1！</p>
										<div class="card" ng-repeat="menu in activeItem.menus">
											<div class="btns">
												<a href="javascript:;" ng-click="removeMenu(menu)"><i class="fa fa-times"></i></a>
											</div>
											<div class="nav-img-group">
												<div class="clearfix">
													<div class="nav-img-normal pull-left">
														<label class="control-label col-sm-2">普通：</label>
														<div class="form-controls col-sm-10">
															<div we7-iconer we7-my-image="menu.image" we7-my-icon="menu.icon" we7-my-icon-color="menu.icon.color">选择</div>
														</div>
													</div>
												</div>
												<div class="help-block" ng-style="{'margin-left': '90px'}">尺寸要求：建议82*82像素</div>
											</div>
											<div class="form-group">
												<label class="control-label col-sm-2" >链接到</label>
												<div class="form-controls col-sm-10 ">
													<div we7-linker we7-my-url="menu.url" we7-my-title="menu.title"></div>
												</div>
											</div>
										</div>
										<div class="add-shopNav text-center" ng-show="!activeItem.menus || activeItem.menus.length < 4" ng-click="activeItem.menus.length >= 4 ? '' : addMenu();">+添加导航</div>
										<!--最多可添加4个-->
								</div>
								<!--end Path展开形式导航模板-->

								<!--两侧展开导航模板-->
								<div class="shopNav-sides" ng-show="activeItem.navStyle == 5">
										<p>添加两侧一级图标</p>
										<div class="card">
											<div class="nav-img-group">
												<div class="clearfix">
													<div class="nav-img-normal pull-left">
														<label class="control-label col-sm-2">普通：</label>
														<div class="form-controls col-sm-10">
															<div we7-iconer we7-my-image="activeItem.extend[0].image" we7-my-icon="activeItem.extend[0].icon" we7-my-icon-color="activeItem.extend[0].icon.color">选择</div>
														</div>
													</div>
												</div>
												<div class="help-block" ng-style="{'margin-left': '90px'}">尺寸要求：建议82*82像素</div>
											</div>
											<div class="form-group">
												<label class="control-label col-sm-2" >链接到</label>
												<div class="form-controls col-sm-10 ">
													<div we7-linker we7-my-url="activeItem.extend[0].url" we7-my-title="activeItem.extend[0].title"></div>
												</div>
											</div>
										</div>
										<div class="card">
											<div class="nav-img-group">
												<div class="clearfix">
													<div class="nav-img-normal pull-left">
														<label class="control-label col-sm-2">普通：</label>
														<div class="form-controls col-sm-10">
															<div we7-iconer we7-my-image="activeItem.extend[1].image" we7-my-icon="activeItem.extend[1].icon" we7-my-icon-color="activeItem.extend[1].icon.color">选择</div>
														</div>
													</div>
												</div>
												<div class="help-block" ng-style="{'margin-left': '90px'}">尺寸要求：建议82*82像素</div>
											</div>
											<div class="form-group">
												<label class="control-label col-sm-2" >链接到</label>
												<div class="form-controls col-sm-10 ">
													<div we7-linker we7-my-url="activeItem.extend[1].url" we7-my-title="activeItem.extend[1].title"></div>
												</div>
											</div>
										</div>
										<p>添加中间二级标题</p>
										<p class="help-block">此导航模板建议您用四个自定义图标效果最佳哦！</p>
										<div class="card" ng-repeat="menu in activeItem.menus">
											<div class="btns">
												<a href="javascript:;" ng-click="removeMenu(menu)"><i class="fa fa-times"></i></a>
											</div>
											<div class="nav-img-group">
												<div class="clearfix">
													<div class="nav-img-normal pull-left">
														<div we7-iconer we7-my-image="menu.image" we7-my-icon="menu.icon" we7-my-icon-color="menu.icon.color">选择</div>
													</div>
												</div>
												<div class="help-block" ng-style="{'margin-left': '90px'}">尺寸要求：建议86*82像素</div>
											</div>
											<div class="form-group">
												<label class="control-label col-sm-2" >链接到</label>
												<div class="form-controls col-sm-10 ">
													<div we7-linker we7-my-url="menu.url" we7-my-title="menu.title"></div>
												</div>
											</div>
										</div>
										<div class="add-shopNav text-center" ng-show="!activeItem.menus || activeItem.menus.length < 4" ng-click="activeItem.menus.length >= 4 ? '' : addMenu();">+添加导航</div>
										<!--最多可添加4个-->
								</div>
								<!--end 两侧展开导航模板-->
							</div>
						</div>
						<!--选择导航模板模态框-->
						<div class="modal fade" id="shop-nav-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="myModalLabel">选择导航模板</h4>
									</div>
									<div class="modal-body clearfix overflow-auto">
										<div class="alert">
											<input id="wx-radio" type="radio" value="1" ng-model="activeItem.navStyle" ng-checked="activeItem.navStyle == 1">
											<label for="wx-radio">微信公众号自定义菜单样式</label>
											<div class="wx-example"></div>
										</div>
										<div class="alert">
											<input id="app-radio" type="radio" value="2" ng-model="activeItem.navStyle" ng-checked="activeItem.navStyle == 2">
											<label for="app-radio">APP导航模板1（图标及底色都可配置）</label>
											<div class="app-example"></div>
										</div>
										<div class="alert">
											<input id="cart-radio" type="radio" value="3" ng-model="activeItem.navStyle" ng-checked="activeItem.navStyle == 3">
											<label for="cart-radio">APP导航模板2</label>
											<div class="cart-example"></div>
										</div>
										<div class="col-xs-6" style="padding-left:0;">
											<div class="alert">
												<input id="path-radio" type="radio" value="4" ng-model="activeItem.navStyle" ng-checked="activeItem.navStyle == 4">
												<label for="path-radio">Path展开形式导航</label>
												<div class="path-example"></div>
											</div>
										</div>
										<div class="col-xs-6" style="padding-right:0;">
											<div class="alert">
												<input id="sides-radio" type="radio" value="5" ng-model="activeItem.navStyle" ng-checked="activeItem.navStyle == 5">
												<label for="sides-radio">两侧展开形式导航</label>
												<div class="sides-example"></div>
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
										<button type="button" class="btn btn-primary" data-dismiss="modal" ng-click="selectNavStyle()">确定</button>
									</div>
								</div>
							</div>
						</div>
						<!--选择模块模态框-->
						<div class="modal fade" id="shop-modules-modal" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title">选择忽略模块</h4>
									</div>
									<div class="modal-body clearfix overflow-auto">
										<table class="table table-hover">
											<thead class="navbar-inner">
												<tr>
													<th style="width:70%;">标题</th>
													<th style="width:30%; text-align:right"></th>
												</tr>
											</thead>
											<tbody>
												<tr ng-repeat="m in modules">
													<td><span ng-bind="m.title"></span>（<span ng-bind="m.name"></span>）</td>
													<td>
														<a class="btn btn-default js-btn-select" ng-class="{'btn-primary' : activeItem.ignoreModules[m.name]}" js-name="{{m.name}}" js-title="{{m.title}}" onclick="$(this).toggleClass('btn-primary');$(this).html($(this).hasClass('btn-primary') ? '取消' : '选取')">选取</a>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-primary" data-dismiss="modal">确定</button>
									</div>
								</div>
							</div>
						</div>
						<div class="btn btn-primary we7-padding-horizontal site-btn-bottom col-sm-offset-2 " ng-click="saveQucikMenu()">保存</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="text-center we7-padding">
		<input type="submit" name="submit" value="完成" class="btn btn-primary">
		<input type="hidden" name="token" value="<?php  echo $_W['token'];?>">
	</div>
</form>
<script>
require(['underscore'], function(){
	angular.module('wesiteApp').value('config', {
		default_site: <?php echo !empty($default_site) ? json_encode($default_site) : '0'?>,
		multiid: <?php echo !empty($id) ? json_encode($id) : '0'?>,
		multi: <?php echo !empty($multi) ? json_encode($multi) : 'null'?>,
		styles: <?php echo !empty($styles) ? json_encode($styles) : 'null'?>,
		temtypes: <?php echo !empty($temtypes) ? json_encode($temtypes) : 'null'?>,
		attachurl: <?php echo !empty($_W['attachurl']) ? json_encode($_W['attachurl']) : 'null'?>,
		links: {
			murl: "<?php  echo murl('home', array(), true, true)?>",
			searchStyleLink: "<?php  echo url('site/multi/post')?>",
			slideDisplay: "<?php  echo url('site/slide/display')?>",
			slidePost: "<?php  echo url('site/slide/post')?>",
			slideDel: "<?php  echo url('site/slide/del')?>",
			homeMenuDisplay: "<?php  echo url('site/nav/homemenu_display')?>",
			homeMenuPost: "<?php  echo url('site/nav/homemenu_post')?>",
			homeMenuSwith: "<?php  echo url('site/nav/homemenu_switch')?>",
			homeMenuDel: "<?php  echo url('site/nav/homemenu_del')?>",
			quickMenuDisplay: "<?php  echo url('site/multi/quickmenu_display')?>",
			quickMenuPost: "<?php  echo url('site/multi/quickmenu_post')?>",
		}
	});
	angular.bootstrap($('#js-wesite-post'), ['wesiteApp']);

	var clickType = "<?php  echo trim($_GPC['clicktype'])?>";
	var index = $.inArray(clickType, ['slide', 'homemenu', 'quickmenu']);
	if(index > -1) {
		$('#load-'+clickType).click();
	};
});
</script>