
				<div style="top:0px;position:relative;">
					<div style="padding:20px;">

					    <div class="radius-4 ct-nav">
							<table class="ct-nav-table">
								<tr>
									<td class="ct-nav-left">
										<b>　API 调试</b>
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
										<td colspan="2">客户端通过此接口获取 access-token </td>
									</tr>
                                    <tr>
										<td>请求地址：</td>
										<td style="width:80px;"><b>/access-token</b></td>
										<td></td>
									</tr>
                                    <tr>
										<td>请求方法：</td>
										<td>POST</td>
										<td></td>
									</tr>
                                    <tr>
										<td>请求参数：</td>
										<td><b>account</b></td>
										<td>登录账号</td>
									</tr>
                                    <tr>
										<td></td>
										<td><b>password</b></td>
										<td>登录密码</td>
									</tr>
                                    <tr>
										<td>返回说明：</td>
										<td colspan="2">
<pre><b>{ 
  access_token:FE04************************CCE2,
  expires_in:7776000
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
											<td style="width:220px;">
												<div style="width:200px;position:relative;">
													<dl><dd>
													<input class="text-input" name="account" validation="/!empty:请填写账号/" placeholder="请填写账号" value="" type="text">
													</dd></dl>
												</div>
											</td>
											<td style="width:220px;">
												<div style="width:200px;position:relative;">
													<dl><dd>
													<input class="text-input" name="password" validation="/password:请填写八位长密码/" placeholder="请填写八位长密码" value="" type="password">
													</dd></dl>
												</div>
											</td>
											<td style="width:220px;position:relative;">
												<div style="width:200px;">
													<dl><dd>
													<input class="text-input" name="cookie-key" placeholder="Cookie 保存在 ..." value="user_token" type="text">
													</dd></dl>
												</div>
											</td>
											<td style="width:80px;position:relative;">
												<button type="submit" class="disable-btn" style="width:70px;">测试接口</button>
											</td>
											<td>
											</td>
										</tr>
									</tbody>
								</table>
							</form>
						</div>

						<div style="margin-top:20px;padding:20px;" id="debug-response-action"></div>

						<div style="margin-top:20px;padding:20px;" id="debug-response-container"></div>

                    </div>
                </div>
