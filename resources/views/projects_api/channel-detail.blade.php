						<div class="radius-4 ct-nav">
							<table class="ct-nav-table">
								<tr>
									<td class="ct-nav-left">
										<b>　API 调试　　/channel-detail/{channel_id}</b>
									</td>
									<td class="ct-nav-right">
									</td>
								</tr>
							</table>
						</div>

						<div style="margin-top:20px;padding:20px;border:1px solid #cccccc;">
							<table class="notes-table">
    							<tbody>
                                    <tr>
										<td style="width:80px;">接　　口：</td>
										<td colspan="2">客户端通过此接口获取频道的数据 </td>
									</tr>
                                    <tr>
										<td>请求地址：</td>
										<td style="width:80px;" colspan="2"><b>/channel-detail/{channel_id}</b></td>
									</tr>
                                    <tr>
										<td>请求方法：</td>
										<td>GET</td>
										<td></td>
									</tr>
                                    <tr>
										<td>请求参数：</td>
										<td><b>null</b></td>
										<td></td>
									</tr>
                                    <tr>
										<td>发送头：<br>Authorization</td>
										<td colspan="2" >
											<textarea style="height:80px;width:800px;" class="text-input">{{ $authorization }}</textarea>
										</td>
									</tr>
                                    <tr>
										<td>返回说明：</td>
										<td colspan="2">
<pre><b>{
	[channel] => {
		[id] => 1
		...
	}
}</b></pre></td>
									</tr>
								</tbody>
							</table>
						</div>

						<div style="margin-top:20px;padding:20px;border:1px solid #cccccc;">
							<table class="notes-table">
    							<tbody>
    								<tr>
    									<td style="width:610px;">
											<div style="width:600px;position:relative;">
												<dl><dd>
												<input class="text-input" value="API 请求地址：  http://{{ $_SERVER["HTTP_HOST"] }}/channel-detail/{channel_id}" readonly="true" type="text">
												</dd></dl>
											</div>
    									</td>
										<td style="width:80px;">
											<a href="/channel-detail/1" header='{ "Authorization": "{{ urlencode($authorization) }}" }' pushstate="no" container="#debug-response-container">
											<button type="button" class="button-btn" style="width:70px;">测试接口 1</button>
											</a>
										</td>
										<td style="width:80px;">
											<a href="/channel-detail/2" header='{ "Authorization": "{{ urlencode($authorization) }}" }' pushstate="no" container="#debug-response-container">
											<button type="button" class="button-btn" style="width:70px;">测试接口 2</button>
											</a>
										</td>
										<td style="width:80px;">
											<a href="/channel-detail/3" header='{ "Authorization": "{{ urlencode($authorization) }}" }' pushstate="no" container="#debug-response-container">
											<button type="button" class="button-btn" style="width:70px;">测试接口 3</button>
											</a>
										</td>
										<td></td>
									</tr>
								</tbody>
							</table>
						</div>