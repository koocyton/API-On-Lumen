<popup-title style="display:none;" class="popup-title">添加新任务</popup-title>

<div class="container" style="width:900px;">
	<table class="">
		<tbody>
			<tr>
				<td style="width:80px;">
					<div class="form-group">任务描述：</div>
				</td>
				<td>
					<div class="form-group">
	  					<input type="text" name="account" class="form-control">
	  				</div>
				</td>
			</tr>

			<tr>
				<td>
					<div class="form-group">指派给：</div>
				</td>
				<td>
					<div class="form-group" style="width:200px;">
	  					<input type="text" name="account" class="form-control">
	  				</div>
				</td>
			</tr>

			<tr>
				<td>
					<div class="form-group">类　型：</div>
				</td>
				<td>
					<div class="form-group">
						<label><input type="radio" name="catelog" value=""> 任务</label>
						<label><input type="radio" name="catelog" value=""> Bug</label>
						<label><input type="radio" name="catelog" value=""> 文档</label>
					</div>
				</td>
			</tr>

			<tr>
				<td>
					<div class="form-group">说　明：</div>
				</td>
				<td>
					<div class="form-group">
						<textarea class="form-control" style="padding:10px;width:700px;height:250px;resize:none;"></textarea>
					</div>
				</td>
			</tr>

			<tr>
				<td>
					<div class="form-group">上传图：</div>
				</td>
				<td>
					<div class="form-group">
                        <div class="radius-5 content-border" style="font-size:0;position:relative;text-align:center;height:194px;line-height:194px;overflow:hidden;">
							<span style="font-family:octicons;font-size:168px;color:#ddd;">&#xf05d;</span>
                        </div>
                        <input type="file" class="upload-image" >
					</div>
				</td>
			</tr>

			<tr>
				<td>
					<div class="form-group">抄　送：</div>
				</td>
				<td>
					<div class="form-group">
						<input type="text" class="form-control" name="">
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
</div>
