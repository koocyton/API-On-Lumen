<!DOCTYPE HTML>
<html>
  <title>用户登录</title>
  @include('__header')
  <body>

	<table class="body-table" style="background:rgba(0, 0, 0, 0) url(/css/<?=$trans->getLocale();?>_bg.jpg) repeat scroll 0 0 / cover ;">

      <tr>
		<td class="nav-left" colspan="2">
		  <div class="nav-item" style="margin-left:21px;">

			<a href="javascript:;" pushstate="no" class="nav-item" style="font-size:14pt;color:#eee;">
			  Manager
			</a>

		  </div>
		</td>
		<td class="nav-right">
		  <div class="nav-item" style="margin-right:21px;">
            <span style="font-size:16px;"><?=$_COOKIE['auth_user']?></span>
		  </div>
		  <div class="nav-item dropdown-container" style="margin-right:21px;">
			<a href="javascript:;" pushstate="no" title="设置" class="nav-item bold-medium" style="height:40px;line-height:40px;">
			  <span class="octicon" style="font-size:23px;">&#xf02f;</span>
			</a>
			<div class="pop-layout" style="top:38px;right:-4px;">
			  <b class="angle-up" style="right:9px;top:-5px;"></b>
			  <div class="content-board radius-4 shadow-3">
				<div class="dropdown-menu" style="height:84px;width:100px;">
				  <ul>
					<li><a class="radius-3" href="javascript:$.KTAnchor.popupLoader(null)">
						<span style="font-family:octicons;font-size:15px;">&#xf02b;</span>
						&nbsp;问题反馈
					</a></li>
					<li><a class="radius-3" href="javascript:$.KTAnchor.popupLoader(null)">
						<span style="font-family:octicons;font-size:15px;">&#xf049;</span>
						&nbsp;账号安全
					</a></li>
					<li><a class="radius-3" pushstate="no" href="/login/signout">
                        <span style="font-family:octicons;font-size:15px;">&#xf032;</span>
                        &nbsp;退出登录
                    </a></li>
				  </ul>
				</div>
			  </div>
			</div>
		  </div>

		</td>
	  </tr>

	  <tr>
		<td class="body-left content-board opacity-80" style="width:20%;">
          <div class="scroll-container" id="left-container">
            <div style="top:0px;position:relative;">
              <script>
                var menu_data = [
                    {"text":"主控", "menus":[
                        {"text":"广告管理", "href":"/advert"},
                        {"text":"素材管理", "href":"/resouse"},
                        {"text":"联盟管理", "href":"/union"},
                        {"text":"数据统计", "open":true, "menus":[
                            {"text":"数据简报", "href":"/bulletin"},
                            {"text":"各项统计", "href":"/count"},
                            {"text":"优化分析", "href":"/optimize"}
                        ]}
                    ]},
                    {"text":"项目研发 · 微闻", "menus":[
                        {"text":"API 接口", "open":true, "menus":[
                            {"text":"登录 GET /access-token", "href":"/project/api-debug/access-token"},
                            {"text":"频道列表 GET /channel-menu", "href":"/project/api-debug/channel-menu"},
                            {"text":"频道新闻 GET /channel/{id}", "href":"/project/api-debug/channel"},
                            {"text":"新闻内容 GET /news/{id}", "href":"/project/api-debug/news"},
                            {"text":"上传新闻 POST /news", "href":"/project/api-debug/post-news"},
                            {"text":"选择地区 UPDATE /region/{id}", "href":"/project/api-debug/region/{id}"}
                        ]},
                        {"text":"项目文档", "open":false, "menus":[
                            {"text":"概叙", "href":"/project/doc/1"},
                            {"text":"登录", "href":"/project/doc/2"},
                            {"text":"注册", "href":"/project/doc/3"},
                            {"text":"主界面", "href":"/project/doc/4"},
                            {"text":"拍照", "href":"/project/doc/5"},
                            {"text":"填写拍照信息", "href":"/project/doc/6"},
                        ]},
                        {"text":"Task & Bugzilla", "href":"/task/list"},
                    ]},
                    {"text":"管理员", "menus":[
                        {"text":"操作日志", "href":"/operation/list"},
                        {"text":"权限管理", "href":"/manager/list" }
                    ]}
                ];
				document.write($.KTTreeMenuHTML.getMenuHtml(menu_data));
			  </script>
			</div>
		  </div>
		</td>
		<td class="body-right content-board opacity-95" colspan="2" style="width:80%;">
		  <div class="scroll-container" id="right-container">
			<div class="response-container" style="top:0px;position:relative;">
			</div>
		  </div>
		</td>
	  </tr>

	</table>
  </body>
</html>
