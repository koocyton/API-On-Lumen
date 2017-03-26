<popup-title style="display:none;" class="popup-title">添加新管理员</popup-title>

<div class="container" style="width:800px;">
<form action="/manager/create" enctype="application/x-www-form-urlencoded" method="post">
	<table class="">
		<tbody>

			<tr>
				<td>
					<div class="form-group">账　号：</div>
				</td>
				<td>
					<div class="form-group">
						<input type="password" style="position:absolute;top:-999px;"/>
						<input type="text" name="account" class="form-control" value="" autocomplete="off" style="width:400px">
					</div>
				</td>
			</tr>

			<tr>
				<td>
					<div class="form-group">用户名：</div>
				</td>
				<td>
					<div class="form-group form-tags">
	  					<input type="text" name="username" class="form-control" value="" autocomplete="off" style="width:400px">
					</div>
				</td>
			</tr>

			<tr>
				<td style="width:80px;">
					<div class="form-group">状　态：</div>
				</td>
				<td>
					<div class="form-group btn-group" data-toggle="buttons">
						<label class="btn btn-sm btn-default active">
							<input type="radio" name="status" value="0" autocomplete="off" checked="checked"> 激活
						</label>
						<label class="btn btn-sm btn-default">
							<input type="radio" name="status" value="1" autocomplete="off"> 禁用
						</label>
					</div>
				</td>
			</tr>

			<tr>
				<td>
					<div class="form-group">密　码：</div>
				</td>
				<td>
					<div class="form-group">
						<input type="password" name="_password" class="form-control" autocomplete="off" style="width:400px">
					</div>
				</td>
			</tr>

			<tr>
				<td>
					<div class="form-group">分　组：</div>
				</td>
				<td>
					<div class="form-group form-tags">
						<input type="text" name="groupings" value="{{ $groupings }}" tags-data="{{ $groupings }}" autocomplete="off" class="tags-input" multiple />
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
