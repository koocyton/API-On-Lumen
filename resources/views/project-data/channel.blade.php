
		<popup-title style="display:none;" class="popup-title">频道 - {{ $data->name }} </popup-title>

		<div style="margin:16px;width:96%;">
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
								<td style="width:80px;vertical-align:middle;padding-left:20px;">Name：</td>
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

							<tr><td style="height:7px;"></td></tr>

							<tr>
								<td style="width:80px;vertical-align:middle;padding-left:20px;">频道范围：</td>
								<td colspan="2">
									<div style="width:265px;position:relative;">
										<dl>
											<dd>
												<label>
													<input type="radio" class="text-input" style="width:36px;" />
													全国</label>
												<label><input type="radio" class="text-input" style="width:36px;" /> 市</label>
												<label><input type="radio" class="text-input" style="width:36px;" /> 省</label>
												<label><input type="radio" class="text-input" style="width:36px;" /> 县</label>
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
