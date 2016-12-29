
		<popup-title style="display:none;" class="popup-title">管理员信息</popup-title>

		<div>
			<div class="radius-4 ct-nav">
				<table class="ct-nav-table">
					<tr>
						<td class="ct-nav-left">
							<b>　ID ： {{ $manager->id }}</b>
						</td>
						<td class="ct-nav-right" style="padding: 0 12px">
							<button button-class="submit-btn" type="submit" class="submit-btn" style="width:60px;height:30px;line-height:30px;">更新</button>
						</td>
					</tr>
				</table>
			</div>

			<table class="notes-table form-field">
				<tbody>
					<tr>
						<td style="width:80px;">　　主键：</td>
						<td>{{ $manager->id }}</td>
					</tr>
					<tr>
						<td style="width:80px;">　　账号：</td>
						<td>{{ $manager->account }}</td>
					</tr>
					<tr>
						<td style="width:80px;">创建时间：</td>
						<td>
						  <div style="width:187px;position:relative;">
							<dl>
							  <dd>
								<input class="text-input" type="text" value="{{ $manager->created_at }}" readonly="readonly">
							  </dd>
							</dl>
						  </div>
						</td>
					</tr>
					<tr>
						<td style="width:80px;">激活状态：</td>
						<td>
							<label>
								<input type="radio" name="deleted_at" value="{{ time() }}" checked="<?php echo empty($manager->deleted_at) ? 'checked' : ''; ?>" >
								禁用
							</label>
							<label>
								<input type="radio" name="deleted_at" value="NULL" checked="<?php echo !empty($manager->deleted_at) ? 'checked' : ''; ?>" >
								激活
							</label>
						</td>
					</tr>
					<tr>
						<td style="width:80px;">权限设定：</td>
						<td></td>
					</tr>
				</tbody>
			</table>
		</div>
