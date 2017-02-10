<popup-title style="display:none;" class="popup-title">配置权限 {{ $manager->account }}</popup-title>

<div class="container" style="width:600px;">
<form action="/manager/{{ $manager->id }}/_update" enctype="multipart/form-data" method="post">
	<table class="">
		<tbody>

			<tr>
				<td style="width:90px;">
					<div class="form-group">   </div>
				</td>
				<td>
<div style="top:0px;min-width:300px;position:relative;" id="main-menu">
	<div class="treemenu-container">
		<a href="javascript:;" class="tree-menu tree-menu-0">
			<div>主控</div>
		</a>
		<div style="display: block;">
			<a href="javascript:;" class="tree-menu tree-menu-1">
				<div style="color:#aaa;">
					<span>广告管理　　</span>
					<label style="margin-left:10px;"><input type="checkbox" disabled="disabled" name="privileges" value=""> 查看</label>
					<label style="margin-left:10px;"><input type="checkbox" disabled="disabled" name="privileges" value=""> 增加 / 修改</label>
				</div>
			</a>
			<a href="javascript:;" class="tree-menu tree-menu-1">
				<div style="color:#aaa;">
					<span>素材管理　　</span>
					<label style="margin-left:10px;"><input type="checkbox" disabled="disabled" name="privileges" value=""> 查看</label>
					<label style="margin-left:10px;"><input type="checkbox" disabled="disabled" name="privileges" value=""> 增加 / 修改</label>
				</div>
			</a>
			<a href="javascript:;" class="tree-menu tree-menu-1">
				<div style="color:#aaa;">
					<span>联盟管理　　</span>
					<label style="margin-left:10px;"><input type="checkbox" disabled="disabled" name="privileges" value=""> 查看</label>
					<label style="margin-left:10px;"><input type="checkbox" disabled="disabled" name="privileges" value=""> 增加 / 修改</label>
				</div>
			</a>
			<a href="javascript:;" class="tree-menu tree-menu-1 tree-menu-open">
				<div>数据统计</div>
			</a>
			<div style="display: block;">
				<a href="javascript:;" class="tree-menu tree-menu-2">
					<div style="color:#aaa;">
						<span>数据简报　　</span>
						<label style="margin-left:10px;"><input type="checkbox" disabled="disabled" name="privileges" value=""> 查看</label>
						<label style="margin-left:10px;"><input type="checkbox" disabled="disabled" name="privileges" value=""> 增加 / 修改</label>
					</div>
				</a>
				<a href="javascript:;" class="tree-menu tree-menu-2">
					<div style="color:#aaa;">
						<span>各项统计　　</span>
						<label style="margin-left:10px;"><input type="checkbox" disabled="disabled" name="privileges" value=""> 查看</label>
						<label style="margin-left:10px;"><input type="checkbox" disabled="disabled" name="privileges" value=""> 增加 / 修改</label>
					</div>
				</a>
				<a href="javascript:;" class="tree-menu tree-menu-2">
					<div style="color:#aaa;">
						<span>优化分析　　</span>
						<label style="margin-left:10px;"><input type="checkbox" disabled="disabled" name="privileges" value=""> 查看</label>
						<label style="margin-left:10px;"><input type="checkbox" disabled="disabled" name="privileges" value=""> 增加 / 修改</label>
					</div>
				</a>
			</div>
		</div>
		<a href="javascript:;" class="tree-menu tree-menu-0"><div>项目研发 · 微闻</div></a>
		<div style="display: block;">
			<a href="javascript:;" class="tree-menu tree-menu-1">
				<div style="color:#aaa;">
					<span>频道设置　　&nbsp;</span>
					<label style="margin-left:10px;"><input type="checkbox" disabled="disabled" name="privileges" value=""> 查看</label>
					<label style="margin-left:10px;"><input type="checkbox" disabled="disabled" name="privileges" value=""> 增加 / 修改</label>
				</div>
			</a>
			<a href="javascript:;" class="tree-menu-1 tree-menu">
				<div>
					<span>项目任务　　&nbsp;</span>
					<label style="margin-left:10px;"><input type="checkbox" name="privileges" value=""> 查看</label>
					<label style="margin-left:10px;"><input type="checkbox" name="privileges" value=""> 增加 / 修改</label>
				</div>
			</a>
			<a href="javascript:;" class="tree-menu tree-menu-1">
				<div>
					<span>API 接口 ...　&nbsp;</span>
					<label style="margin-left:10px;"><input type="checkbox" name="privileges" value=""> 查看</label>
					<label style="margin-left:10px;"><input type="checkbox" name="privileges" value=""> 更新</label>
				</div>
			</a>
			<a href="javascript:;" class="tree-menu tree-menu-1">
				<div>
					<span>数据管理 ...　&nbsp;</span>
					<label style="margin-left:10px;"><input type="checkbox" name="privileges" value=""> 查看</label>
					<label style="margin-left:10px;"><input type="checkbox" name="privileges" value=""> 更新</label>
				</div>
			</a>
			<a href="javascript:;" class="tree-menu tree-menu-1">
				<div>
					<span>项目文档 ...　&nbsp;</span>
					<label style="margin-left:10px;"><input type="checkbox" name="privileges" value=""> 查看</label>
					<label style="margin-left:10px;"><input type="checkbox" name="privileges" value=""> 更新</label>
				</div>
			</a>
		</div>
		<a href="javascript:;" class="tree-menu tree-menu-0">
			<div>管理员</div>
		</a>
		<div style="display: block;">
			<a href="javascript:;" class="tree-menu-1 tree-menu">
				<div>
					<span>操作日志　　&nbsp;</span>
					<label style="margin-left:10px;"><input type="checkbox" name="privileges" value=""> 查看自己</label>
					<label style="margin-left:10px;"><input type="checkbox" name="privileges" value=""> 查看全部</label>
				</div>
			</a>
			<a href="javascript:;" class="tree-menu-1 tree-menu">
				<div>
					<span>用户管理　　&nbsp;</span>
					<label style="margin-left:10px;"><input type="checkbox" name="privileges" value=""> 查看</label>
					<label style="margin-left:10px;"><input type="checkbox" name="privileges" value=""> 编辑</label>
					<label style="margin-left:10px;"><input type="checkbox" name="privileges" value=""> 新增</label>
					<label style="margin-left:10px;"><input type="checkbox" name="privileges" value=""> 修改</label>
				</div>
			</a>
		</div>
	</div>
</div>
				</td>
			</tr>

			<tr>
				<td>
					<div class="form-group"></div>
				</td>
				<td>
					<div class="form-group">
						<br>
						<button class="btn btn-success button-btn" style="width:120px;">保　存</button>
					</div>
				</td>
			</tr>

		</tbody>
	</table>
</form>
</div>
