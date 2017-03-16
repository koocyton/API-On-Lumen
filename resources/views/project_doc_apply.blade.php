<popup-title style="display:none;" class="popup-title">添加新文档</popup-title>

<div class="container" style="width:900px;">
<form action="/project/doc/create" enctype="multipart/form-data" method="post">
	<table class="">
		<tbody>
			<tr>
				<td style="width:80px;">
					<div class="form-group">名称：</div>
				</td>
				<td>
					<div class="form-group">
	  					<input type="text" name="name" class="form-control">
	  				</div>
				</td>
			</tr>

			<tr>
				<td>
					<div class="form-group">简介：</div>
				</td>
				<td>
					<div class="form-group">
	  					<input type="text" name="introduction" class="form-control">
	  				</div>
				</td>
			</tr>

			<tr>
				<td>
					<div class="form-group">文档：</div>
				</td>
				<td>
					<div class="form-group">
						<textarea name="doc" class="form-control" style="padding:10px;width:700px;height:250px;resize:none;"></textarea>
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
