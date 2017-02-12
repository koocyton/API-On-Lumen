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
<?php
$pl = explode(",", $grouping->privileges);
?>
				</td>
				<td>
				<br>
<div class="form-group" id="main-menu">
	<div class="treemenu-container">
		<a href="javascript:;" class="tree-menu tree-menu-0"><div>项目研发 · 微闻</div></a>
		<div style="display: block;">
			<a href="javascript:;" class="tree-menu-1 tree-menu">
				<div>
					<span>项目任务　　&nbsp;</span>
					<label style="margin-left:10px;">
						<input type="checkbox" name="privilege[]" value="/task/list,/task/detail" <?=(in_array("/task/list", $pl) && in_array("/task/detail", $pl)) ? 'checked' : '';?>> 浏览 / 查看
					</label>
					<label style="margin-left:10px;">
						<input type="checkbox" name="privilege[]" value="/task/create,/task/update,/task/apply" <?=(in_array("/task/create", $pl) && in_array("/task/update", $pl)) ? 'checked' : '';?>> 增加 / 修改
					</label>
				</div>
			</a>
			<a href="javascript:;" class="tree-menu tree-menu-1">
				<div>
					<span>API 接口 ...　&nbsp;</span>
					<label style="margin-left:10px;">
						<input type="checkbox" name="privilege[]" value="/project/api-list,/project/api-detail" <?=(in_array("/project/api-list", $pl) && in_array("/project/api-detail", $pl)) ? 'checked' : '';?>> 浏览 / 查看
					</label>
					<label style="margin-left:10px;">
						<input type="checkbox" name="privilege[]" value="/project/api-create,/project/api-update,/project/api-apply" <?=(in_array("/project/api-create", $pl) && in_array("/project/api-update", $pl)) ? 'checked' : '';?>> 增加 / 修改
					</label>
				</div>
			</a>
			<a href="javascript:;" class="tree-menu tree-menu-1">
				<div>
					<span>数据管理 ...　&nbsp;</span>
					<label style="margin-left:10px;">
						<input type="checkbox" name="privilege[]" value="/project/data-list,/project/data-detail" <?=(in_array("/project/data-list", $pl) && in_array("/project/data-detail", $pl)) ? 'checked' : '';?>> 浏览 / 查看
					</label>
					<label style="margin-left:10px;">
						<input type="checkbox" name="privilege[]" value="/project/data-create,/project/data-update,/project/data-apply" <?=(in_array("/project/data-create", $pl) && in_array("/project/data-update", $pl)) ? 'checked' : '';?>> 增加 / 修改
					</label>
				</div>
			</a>
			<a href="javascript:;" class="tree-menu tree-menu-1">
				<div>
					<span>项目文档 ...　&nbsp;</span>
					<label style="margin-left:10px;">
						<input type="checkbox" name="privilege[]" value="/project/doc-list,/project/doc-detail" <?=(in_array("/project/doc-list", $pl) && in_array("/project/doc-detail", $pl)) ? 'checked' : '';?>> 浏览 / 查看
					</label>
					<label style="margin-left:10px;">
						<input type="checkbox" name="privilege[]" value="/project/doc-create,/project/doc-update,/project/doc-apply" <?=(in_array("/project/doc-create", $pl) && in_array("/project/doc-update", $pl)) ? 'checked' : '';?>> 增加 / 修改
					</label>
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
					<label style="margin-left:10px;"><input type="checkbox" name="privilege[]" value="/operation/me" <?=in_array("/operation/me", $pl) ? 'checked' : '';?>> 查看自己</label>
					<label style="margin-left:10px;"><input type="checkbox" name="privilege[]" value="/operation/list" <?=in_array("/operation/list", $pl) ? 'checked' : '';?>> 查看全部</label>
				</div>
			</a>
			<a href="javascript:;" class="tree-menu-1 tree-menu">
				<div>
					<span>权限管理　　&nbsp;</span>
					<label style="margin-left:10px;">
						<input type="checkbox" name="privilege[]" value="/manager/list,/manager/detail,/manager/apply" <?=(in_array("/manager/list", $pl) && in_array("/manager/detail", $pl)) ? 'checked' : '';?>> 浏览 / 查看
					</label>
					<label style="margin-left:10px;">
						<input type="checkbox" name="privilege[]" value="/manager/create,/manager/update" <?=(in_array("/manager/create", $pl) && in_array("/manager/update", $pl)) ? 'checked' : '';?>> 增加 / 修改
					</label>
				</div>
			</a>
			<a href="javascript:;" class="tree-menu-1 tree-menu">
				<div>
					<span>分组管理　　&nbsp;</span>
					<label style="margin-left:10px;">
						<input type="checkbox" name="privilege[]" value="/grouping/list,/grouping/detail" <?=(in_array("/grouping/list", $pl) && in_array("/grouping/detail", $pl)) ? 'checked' : '';?>> 浏览 / 查看
					</label>
					<label style="margin-left:10px;">
						<input type="checkbox" name="privilege[]" value="/grouping/create,/grouping/update" <?=(in_array("/grouping/create", $pl) && in_array("/grouping/update", $pl)) ? 'checked' : '';?>> 增加 / 修改
					</label>
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
