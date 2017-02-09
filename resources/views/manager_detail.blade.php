<popup-title style="display:none;" class="popup-title">管理员 {{ $manager->account }}</popup-title>

<div class="container" style="width:800px;">
<form action="/manager/{{ $manager->id }}/update" enctype="multipart/form-data" method="post">
	<table class="">
		<tbody>

			<tr>
				<td style="width:90px;">
					<div class="form-group">　ID：</div>
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
	  					<input type="text" name="username" class="form-control" value="{{ $manager->username }}" autocomplete="off" style="width:400px">
					</div>
				</td>
			</tr>

			<tr>
				<td>
					<div class="form-group">密　码：</div>
				</td>
				<td>
					<div class="form-group">
						<input type="password" name="password" class="form-control" autocomplete="off" style="width:400px">
					</div>
				</td>
			</tr>

			<tr>
				<td>
					<div class="form-group">分　组：</div>
				</td>
				<td>
					<div class="form-group form-tags">
						<input type="text" name="grup" search-source="GoodNight 客户端,GoodNight 服务端,GoodNight 策划,GoodNight 美术,GoodNight 项目组" autocomplete="off" class="tags-input">
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
					<div class="form-group">最　近：</div>
				</td>
				<td>
					<div class="form-group">
						{{ $manager->updated_at }}
					</div>
				</td>
			</tr>

			<tr>
				<td>
					<div class="form-group">Token：</div>
				</td>
				<td>
					<div class="form-group">
						{{ $manager->token }}
					</div>
				</td>
			</tr>

			<tr>
				<td>
					<div class="form-group">Secret：</div>
				</td>
				<td>
					<div class="form-group">
						{{ $manager->token_secret }}
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
