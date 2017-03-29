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
	  					<input type="text" name="title" class="form-control" validation="/!empty:请输入标题/">
	  				</div>
				</td>
			</tr>

			<tr>
				<td>
					<div class="form-group">指派给：</div>
				</td>
				<td>
					<div class="form-group form-tags">
						<input type="text" name="owner" tags-data="{{ $manager_tags_data }}" class="tags-input" />
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
								<input type="radio" name="category" value="task" autocomplete="off" checked> 任务
							</label>
							<label class="btn btn-default">
								<input type="radio" name="category" value="bug" autocomplete="off"> Bug
							</label>
							<label class="btn btn-default">
								<input type="radio" name="category" value="doc" autocomplete="off"> 文档
							</label>
						</div>
					</div>
				</td>
			</tr>

			<!-- <tr>
				<td>
					<div class="form-group">时　限：</div>
				</td>
				<td>
					<div class="form-group has-feedback" style="width:200px;">
						<input type="text" name="lastdate" class="date form-control">
						<span class="glyphicon glyphicon-calendar form-control-feedback" aria-hidden="true"></span>
					</div>
				</td>
			</tr> //-->

			<tr>
				<td>
					<div class="form-group">说　明：</div>
				</td>
				<td>
					<div class="form-group">
						<textarea name="description" validation="/!empty:请描述任务的内容/" class="form-control" style="padding:10px;width:700px;height:250px;resize:none;"></textarea>
					</div>
				</td>
			</tr>

			<!-- <tr>
				<td>
					<div class="form-group">上传图：</div>
				</td>
				<td>
					<div class="form-group">
						<input type="file" class="upload-input" name="illustration">
					</div>
				</td>
			</tr> //-->

			<tr>
				<td>
					<div class="form-group">TAGS：</div>
				</td>
				<td>
					<div class="form-group form-tags">
						<input type="text" name="tags" value="" class="tags-input" multiple />
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
