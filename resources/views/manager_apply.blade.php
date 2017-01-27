<popup-title style="display:none;" class="popup-title">添加新管理员</popup-title>

<div class="container" style="width:750px;">
<form action="/manager/create" enctype="multipart/form-data" method="post">
	<table class="">
		<tbody>
			<tr>
				<td style="width:80px;">
					<div class="form-group">账　号：</div>
				</td>
				<td>
					<div class="form-group">
	  					<input type="text" name="account" class="form-control">
	  				</div>
				</td>
			</tr>

			<tr>
				<td style="width:80px;">
					<div class="form-group">实　名：</div>
				</td>
				<td>
					<div class="form-group">
	  					<input type="text" name="realname" class="form-control" style="width:200px;">
	  				</div>
				</td>
			</tr>

			<tr>
				<td>
					<div class="form-group">头　像：</div>
				</td>
				<td>
					<div class="form-group">
                        <input type="file" class="upload-input" name="face">
					</div>
				</td>
			</tr>

			<tr>
				<td>
					<div class="form-group">状　态：</div>
				</td>
				<td>
					<div class="form-group">
						<label><input type="radio" name="deleted_at" value="NULL"> 激活</label>
						&nbsp;　&nbsp;
						<label><input type="radio" name="deleted_at" value="{{ time() }}" checked="checked"> 未激活</label>
					</div>
				</td>
			</tr>

			<tr>
				<td>
					<div class="form-group">密　码：</div>
				</td>
				<td>
					<div class="form-group">
						<input type="password" class="form-control" value="****************" style="width:200px;">
					</div>
				</td>
			</tr>

			<tr>
				<td>
					<div class="form-group">说　明：</div>
				</td>
				<td>
					<div class="form-group">
						<textarea name="description" class="form-control" style="padding:10px;width:500px;height:250px;resize:none;"></textarea>
					</div>
				</td>
			</tr>

			<tr>
				<td>
					<div class="form-group"></div>
				</td>
				<td>
					<div class="form-group">
						<button class="btn btn-success button-btn" style="width:120px;">添　加</button>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
</form>
</div>
