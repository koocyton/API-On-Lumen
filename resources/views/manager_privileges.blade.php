<popup-title style="display:none;" class="popup-title">配置权限 {{ $manager->account }}</popup-title>

<div class="container" style="width:800px;">
<form action="/manager/{{ $manager->id }}/update" enctype="multipart/form-data" method="post">
	<table class="">
		<tbody>

			<tr>
				<td style="width:90px;">
					<div class="form-group"></div>
				</td>
				<td>
<div style="top:0px;min-width:300px;position:relative;" id="main-menu">
	<div class="treemenu-container">
		<a href="javascript:;" class="tree-menu tree-menu-0">
			<div>主控</div>
		</a>
		<div style="display: block;">
			<a href="/advert" class="tree-menu tree-menu-1">
				<div>广告管理</div>
			</a>
			<a href="/resouse" class="tree-menu tree-menu-1">
				<div>素材管理</div>
			</a>
			<a href="/union" class="tree-menu tree-menu-1">
				<div>联盟管理</div>
			</a>
			<a href="javascript:;" class="tree-menu tree-menu-1 tree-menu-open">
				<div>数据统计</div>
			</a>
			<div style="display: block;">
				<a href="/bulletin" class="tree-menu tree-menu-2">
					<div>数据简报</div>
				</a>
				<a href="/count" class="tree-menu tree-menu-2">
					<div>各项统计</div>
				</a>
				<a href="/optimize" class="tree-menu tree-menu-2">
					<div>优化分析</div>
				</a>
			</div>
		</div>
		<a href="javascript:;" class="tree-menu tree-menu-0"><div>项目研发 · 微闻</div></a>
		<div style="display: block;">
			<a href="/channel-manager/list" class="tree-menu tree-menu-1">
				<div>频道设置</div>
			</a>
			<a href="/task/list" class="tree-menu-1 tree-menu">
				<div>项目任务　<span class="badge">10</span></div>
			</a>
			<a href="javascript:;" class="tree-menu tree-menu-1 tree-menu-open">
				<div>API 接口</div>
			</a>
			<div style="display: block;">
				<a href="/project/api-debug/access-token" class="tree-menu-2 tree-menu">
					<div>登录 GET /access-token</div>
				</a>
				<a href="/project/api-debug/channel-menu" class="tree-menu-2 tree-menu">
					<div>频道列表 GET /channel-menu</div>
				</a>
				<a href="/project/api-debug/channel-detail" class="tree-menu-2 tree-menu">
					<div>频道新闻 GET /channel-detail/{id}</div>
				</a>
				<a href="/project/api-debug/news" class="tree-menu-2 tree-menu">
					<div>新闻内容 GET /news/{id}</div>
				</a>
				<a href="/project/api-debug/post-news" class="tree-menu-2 tree-menu">
					<div>上传新闻 POST /news</div>
				</a>
				<a href="/project/api-debug/region/{id}" class="tree-menu-2 tree-menu">
					<div>选择地区 UPDATE /region/{id}</div>
				</a>
			</div>
			<a href="javascript:;" class="tree-menu tree-menu-1 tree-menu-open">
				<div>数据管理</div>
			</a>
			<div style="display: block;">
				<a href="/project/data-manage/channel" class="tree-menu-2 tree-menu">
					<div>频道信息</div>
				</a>
				<a href="/project/data-manage/news" class="tree-menu-2 tree-menu">
					<div>新闻列表</div>
				</a>
				<a href="/project/data-manage/user" class="tree-menu-2 tree-menu">
					<div>用户管理</div>
				</a>
			</div>
			<a href="javascript:;" class="tree-menu tree-menu-1 tree-menu-close"><div>项目文档</div></a>
			<div style="display: none;">
				<a href="/project/doc/1" class="tree-menu-2 tree-menu">
					<div>概叙</div>
				</a>
				<a href="/project/doc/2" class="tree-menu-2 tree-menu">
					<div>登录</div>
				</a>
				<a href="/project/doc/3" class="tree-menu-2 tree-menu">
					<div>注册</div>
				</a>
				<a href="/project/doc/4" class="tree-menu-2 tree-menu">
					<div>主界面</div>
				</a>
				<a href="/project/doc/5" class="tree-menu-2 tree-menu">
					<div>拍照</div>
				</a>
				<a href="/project/doc/6" class="tree-menu-2 tree-menu">
					<div>填写拍照信息</div>
				</a>
			</div>
		</div>
		<a href="javascript:;" class="tree-menu tree-menu-0">
			<div>管理员</div>
		</a>
		<div style="display: block;">
			<a href="/operation/list" class="tree-menu-1 tree-menu">
				<div>操作日志</div>
			</a>
			<a href="/manager/list" class="tree-menu-1 tree-select-menu">
				<div>权限管理</div>
			</a>
		</div>
	</div>
</div>
				</td>
			</tr>

		</tbody>
	</table>
</form>
</div>
