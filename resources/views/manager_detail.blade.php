<popup-title style="display:none;" class="popup-title">管理员 {{ $manager->account }}</popup-title>

<div class="container" style="width:800px;">
<form action="/manager/update" enctype="multipart/form-data" method="post">
	<table class="">
		<tbody>

			<tr>
				<td style="width:80px;">
					<div class="form-group">账　号：</div>
				</td>
				<td>
					<div class="form-group">
						{{ $manager->id }}
					</div>
				</td>
			</tr>

			<tr>
				<td>
					<div class="form-group">账　号：</div>
				</td>
				<td>
					<div class="form-group">
						{{ $manager->account }}
					</div>
				</td>
			</tr>

			<tr>
				<td>
					<div class="form-group">用户名：</div>
				</td>
				<td>
					<div class="form-group form-tags">
	  					<input type="text" name="username" class="form-control" value="{{ $manager->username }}" style="width:400px">
					</div>
				</td>
			</tr>

			<tr>
				<td>
					<div class="form-group">密　码：</div>
				</td>
				<td>
					<div class="form-group">
						<input type="text" name="password" class="form-control"  style="width:400px">
					</div>
				</td>
			</tr>

			<tr>
				<td>
					<div class="form-group">创　建：</div>
				</td>
				<td>
					<div class="form-group">
						{{ $manager->created_at }}
					</div>
				</td>
			</tr>

			<tr>
				<td>
					<div class="form-group">分　组：</div>
				</td>
				<td>
					<div class="form-group form-tags">
						<input type="text" name="grup" search-source="GoodNight 客户端,GoodNight 服务端,GoodNight 策划,GoodNight 美术,GoodNight 项目组" class="tags-input">
					</div>
				</td>
			</tr>

			<tr>
				<td>
					<div class="form-group">头　像：</div>
				</td>
				<td>
					<div class="form-group">
						<input type="file" class="upload-input" name="illustration">
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
