<popup-title style="display:none;" class="popup-title">添加新任务</popup-title>

<div class="container" style="width:900px;">
<form action="/task/create" enctype="multipart/form-data" method="post">
	<table class="">
		<tbody>
			<tr>
				<td style="width:80px;">
					<div class="form-group">任务描述：</div>
				</td>
				<td>
					<div class="form-group">
	  					<input type="text" name="title" class="form-control">
	  				</div>
				</td>
			</tr>

			<tr>
				<td>
					<div class="form-group">指派给：</div>
				</td>
				<td >
					<div class="form-group" style="width:300px;">
						<input type="text" name="owner" value="Liuyi" class="form-control">
	  				</div>
				</td>
			</tr>

			<tr>
				<td>
					<div class="form-group">类　型：</div>
				</td>
				<td>
					<div class="form-group">

						<div class="btn-group" data-toggle="buttons">
							<label class="btn btn-default active">
								<input type="radio" name="catelog" value="task" autocomplete="off" checked> 任务
							</label>
							<label class="btn btn-default">
								<input type="radio" name="catelog" value="bug" autocomplete="off"> Bug
							</label>
							<label class="btn btn-default">
								<input type="radio" name="catelog" value="doc" autocomplete="off"> 文档
							</label>
						</div>
					</div>
				</td>
			</tr>

			<tr>
				<td>
					<div class="form-group">时　限：</div>
				</td>
				<td>
					<div class="form-group">
						<input type="date" name="lastdate" class="form-control" style="width:200px;font-weight:bold;">
					</div>
				</td>
			</tr>

			<tr>
				<td>
					<div class="form-group">说　明：</div>
				</td>
				<td>
					<div class="form-group">
						<textarea name="description" class="form-control" style="padding:10px;width:700px;height:250px;resize:none;"></textarea>
					</div>
				</td>
			</tr>

			<tr>
				<td>
					<div class="form-group">上传图：</div>
				</td>
				<td>
					<div class="form-group">
						<input type="file" class="upload-input" name="illustration">
					</div>
				</td>
			</tr>

			<tr>
				<td>
					<div class="form-group">Tags：</div>
				</td>
				<td>
					<div class="form-group form-tags ">
						<input type="text" name="tags" value="liuyi,bbs" search-source="aaa,bbb,ccc,ddd,eee,fff" class="tags-input">
					</div>
				</td>
			</tr>

			<tr>
				<td>
					<div class="form-group">抄　送：</div>
				</td>
				<td>
					<div class="form-group form-tags">
						<input type="text" name="subscribers" value="" class="tags-input">
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
