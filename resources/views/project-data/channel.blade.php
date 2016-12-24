
		<popup-title style="display:none;" class="popup-title">频道 - {{ $data->name }} </popup-title>

		<div>
			<form method="post" action="">

				<div class="radius-4 ct-nav">
					<table class="ct-nav-table">
						<tr>
							<td class="ct-nav-left">
								<b>　ID ： {{ $data->id }}</b>
							</td>
							<td class="ct-nav-right" style="padding: 0 12px">
								<button button-class="submit-btn" type="submit" class="submit-btn" style="width:60px;height:30px;line-height:30px;">更新</button>
							</td>
						</tr>
					</table>
				</div>

				<div class="content-body radius-5 content-border">
					<table class="notes-table">
						<tbody>
							<tr>
								<td style="width:80px;height:40px;vertical-align:middle;padding-left:20px;">名　　称：</td>
								<td colspan="2">
									<div style="width:265px;position:relative;">
										<dl>
											<dd>
												<input type="text" class="text-input" maxlength="50" name="name" validation="/empty:不能为空/" placeholder="Name" value="{{ $data->name }}" readonly="readonly" />
											</dd>
										</dl>
									</div>
								</td>
							</tr>

							<tr>
								<td style="width:80px;height:40px;vertical-align:middle;padding-left:20px;">频道范围：</td>
								<td colspan="2">
									<div style="width:265px;position:relative;">
										<dl>
											<dd>
												<label>
													<input type="radio" name="region" class="text-input" style="width:16px;" /> 全国
												</label>
												<label style="margin-left:10px;">
													<input type="radio" name="region" class="text-input" style="width:16px;" /> 市
												</label>
												<label style="margin-left:10px;">
													<input type="radio" name="region" class="text-input" style="width:16px;" /> 省
												</label>
												<label style="margin-left:10px;">
													<input type="radio" name="region" class="text-input" style="width:16px;" /> 县
												</label>
											</dd>
										</dl>
									</div>
								</td>
							</tr>

							<tr>
								<td style="width:80px;height:40px;vertical-align:middle;padding-left:20px;">创建时间：</td>
								<td colspan="2">
									<div style="width:265px;position:relative;">
										<dl>
											<dd>
												<input type="datetime" class="text-input" maxlength="50" name="name" validation="/datetime:时间不能为空/" placeholder="请输入时间" value="{{ date("Y-m-d H:i:s", $data->created_at) }}" />
											</dd>
										</dl>
									</div>
								</td>
							</tr>

							<tr>
								<td style="width:80px;height:40px;vertical-align:middle;padding-left:20px;">更新时间：</td>
								<td colspan="2">
									<div style="width:265px;position:relative;">
										<dl>
											<dd>
												<input type="datetime" class="text-input" maxlength="50" name="name" validation="/datetime:时间不能为空/" placeholder="请输入时间" value="{{ date("Y-m-d H:i:s", $data->updated_at) }}" />
											</dd>
										</dl>
									</div>
								</td>
							</tr>

							<tr>
								<td style="width:80px;height:40px;vertical-align:middle;padding-left:20px;">是否启用：</td>
								<td colspan="2">
									<div style="width:265px;position:relative;line-height:40px;">
										<dl>
											<dd>
												<label>
													<input type="radio" name="updated_at" class="text-input" style="width:16px;" value="{{ time() }}" /> 禁用
												</label>
												<label style="margin-left:10px;">
													<input type="radio" name="updated_at" class="text-input" style="width:16px;" value="NULL" /> 启用
												</label>
											</dd>
										</dl>
									</div>
								</td>
							</tr>

						</tbody>
					</table>
				</div>

			</form>
		</div>
