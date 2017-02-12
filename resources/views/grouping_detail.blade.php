<popup-title style="display:none;" class="popup-title">编辑 {{ $grouping->name }}</popup-title>

<div class="container" style="width:520px;">
<form action="/grouping/{{ $grouping->id }}/update" enctype="multipart/form-data" method="post">
	<table class="">
		<tbody>
			<tr>
				<td style="width:80px;">
					<div class="form-group">　　ID：</div>
				</td>
				<td>
					<div class="form-group">
						{{ $grouping->id }}
					</div>
				</td>
			</tr>

			<tr>
				<td style="width:80px;">
					<div class="form-group">组　名：</div>
				</td>
				<td>
					<div class="form-group">
						<input type="text" name="name" class="form-control" value="{{ $grouping->name }}">
					</div>
				</td>
			</tr>

			<tr>
				<td style="width:80px;">
					<div class="form-group">状　态：</div>
				</td>
				<td>
					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-default <?=empty($grouping->deleted_at) ? 'active' : '';?>">
							<input type="radio" name="status" value="0" autocomplete="off" <?=empty($grouping->deleted_at) ? 'checked' : '';?>> 激活
						</label>
						<label class="btn btn-default <?=!empty($grouping->deleted_at) ? 'active' : '';?>">
							<input type="radio" name="status" value="1" autocomplete="off" <?=!empty($grouping->deleted_at) ? 'checked' : '';?>> 禁用
						</label>
					</div>
				</td>
			</tr>

			<tr>
				<td style="width:80px;">
					<div class="form-group" style="height:100%;">权　限：</div>
				</td>
				<td>
				<br>
<div class="form-group" id="main-menu">
	<div class="treemenu-container">
		<a href="javascript:;" class="tree-menu tree-menu-0"><div>项目研发 · 微闻</div></a>
		<div style="display: block;">
			<a href="javascript:;" class="tree-menu tree-menu-1">
				<div style="color:#aaa;">
					<span>频道设置　　&nbsp;</span>
					<label style="margin-left:10px;"><input type="checkbox" disabled="disabled" name="privilege[]" value=""> 查看</label>
					<label style="margin-left:10px;"><input type="checkbox" disabled="disabled" name="privilege[]" value=""> 增加 / 修改</label>
				</div>
			</a>
			<a href="javascript:;" class="tree-menu-1 tree-menu">
				<div>
					<span>项目任务　　&nbsp;</span>
					<label style="margin-left:10px;"><input type="checkbox" name="privilege[]" value=""> 查看</label>
					<label style="margin-left:10px;"><input type="checkbox" name="privilege[]" value=""> 增加 / 修改</label>
				</div>
			</a>
			<a href="javascript:;" class="tree-menu tree-menu-1">
				<div>
					<span>API 接口 ...　&nbsp;</span>
					<label style="margin-left:10px;"><input type="checkbox" name="privilege[]" value=""> 查看</label>
					<label style="margin-left:10px;"><input type="checkbox" name="privilege[]" value=""> 更新</label>
				</div>
			</a>
			<a href="javascript:;" class="tree-menu tree-menu-1">
				<div>
					<span>数据管理 ...　&nbsp;</span>
					<label style="margin-left:10px;"><input type="checkbox" name="privilege[]" value=""> 查看</label>
					<label style="margin-left:10px;"><input type="checkbox" name="privilege[]" value=""> 更新</label>
				</div>
			</a>
			<a href="javascript:;" class="tree-menu tree-menu-1">
				<div>
					<span>项目文档 ...　&nbsp;</span>
					<label style="margin-left:10px;"><input type="checkbox" name="privilege[]" value=""> 查看</label>
					<label style="margin-left:10px;"><input type="checkbox" name="privilege[]" value=""> 更新</label>
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
					<label style="margin-left:10px;"><input type="checkbox" name="privilege[]" value=""> 查看自己</label>
					<label style="margin-left:10px;"><input type="checkbox" name="privilege[]" value=""> 查看全部</label>
				</div>
			</a>
			<a href="javascript:;" class="tree-menu-1 tree-menu">
				<div>
					<span>权限管理　　&nbsp;</span>
					<label style="margin-left:10px;"><input type="checkbox" name="privilege[]" value=""> 查看</label>
					<label style="margin-left:10px;"><input type="checkbox" name="privilege[]" value=""> 编辑</label>
					<label style="margin-left:10px;"><input type="checkbox" name="privilege[]" value=""> 新增</label>
					<label style="margin-left:10px;"><input type="checkbox" name="privilege[]" value=""> 修改</label>
				</div>
			</a>
			<a href="javascript:;" class="tree-menu-1 tree-menu">
				<div>
					<span>分组管理　　&nbsp;</span>
					<label style="margin-left:10px;"><input type="checkbox" name="privilege[]" value="/grouping/list,/grouping/detail"> 查看</label>
					<label style="margin-left:10px;"><input type="checkbox" name="privilege[]" value="/grouping/create"> 新增</label>
					<label style="margin-left:10px;"><input type="checkbox" name="privilege[]" value="/grouping/update"> 修改</label>
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
						<button class="btn btn-success button-btn" style="width:120px;">保　存</button>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
</form>
</div>
