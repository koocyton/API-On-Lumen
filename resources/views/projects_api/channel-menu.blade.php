						<div class="radius-4 ct-nav">
							<table class="ct-nav-table">
								<tr>
									<td class="ct-nav-left">
										<b>　API 调试　　/channel-menu</b>
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
										<td colspan="2">客户端通过此接口获取频道列表 </td>
									</tr>
                                    <tr>
										<td>请求地址：</td>
										<td style="width:80px;"><b>/channel-menu</b></td>
										<td></td>
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
                                    <tr>
										<td>返回说明：</td>
										<td colspan="2">
<pre style="line-height:18px;font-size:14px;"><b>{
	[channel_menu] => {
		[0] => {
			[id] => 1435523,
			[name] => '西直门'
		}
		[1] => {
			[id] => 1212,
			[name] => '大兴'
		}
		[2] => {
			[id] => 51263,
			[name] => '北京'
		}
		[3] => {
			[id] => 12315,
			[name] => '北京郊区'
		}
		[4] => {
			[id] => 54612,
			[name] => '赛百味'
		}
	}
}</b></pre></td>
									</tr>
								</tbody>
							</table>
						</div>

						<div style="margin-top:20px;padding:20px;border:1px solid #cccccc;">
							<form action="/access-token" method="post" container="#debug-response-container">
								<table class="notes-table">
	    							<tbody>
	    								<tr>
	    									<td style="width:610px;">
												<div style="width:600px;position:relative;">
													<dl><dd>
													<input class="text-input" value="API 请求地址：  http://{{ $_SERVER["HTTP_HOST"] }}/channel-menu" readonly="true" type="text">
													</dd></dl>
												</div>
	    									</td>
											<td style="width:80px;">
												<button type="submit" class="disable-btn" style="width:70px;">测试接口</button>
											</td>
											<td></td>
										</tr>
									</tbody>
								</table>
								<table class="notes-table">
	    							<tbody>
	                                    <tr>
											<td style="width:810px;">
												Header Send Authorization 
												<div style="width:800px;position:relative;">
													<dl><dd>
													<textarea style="height:100px;" class="text-input">{{ $authorization }}</textarea>
													</dd></dl>
												</div>
											</td>
											<td></td>
										</tr>
									</tbody>
								</table>
							</form>
						</div>