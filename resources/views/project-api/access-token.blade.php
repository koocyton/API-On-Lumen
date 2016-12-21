						<div class="radius-4 ct-nav">
							<table class="ct-nav-table">
								<tr>
									<td class="ct-nav-left">
										<b>　API 调试　　/access-token</b>
									</td>
									<td class="ct-nav-right">
									</td>
								</tr>
							</table>
						</div>

						<div class="content-body radius-5 content-border" style="padding:20px;">
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
<textarea wrap="off" style="height:300px;width:800px;overflow:scroll;" class="text-input">{
  [user] => {
    [id] => 用户 id
    [account] => 用户账号
    [password] => 加密的密码
    [is_action] => 是否活动状态
    [created_at] => 创建时间
    [updated_at] => 更新时间
    [privileges] => 权限
  }
  [token] => oauth token
  [token_secret] => oauth token_secret
}</textarea></td>
									</tr>
								</tbody>
							</table>
						</div>

						<div class="content-body radius-5 content-border" style="padding:20px;">
							<form action="/access-token" method="post" container="#debug-response-container">
								<table class="notes-table">
	    							<tbody>
	    								<tr>
	    									<td style="width:610px;">
												<div style="width:600px;">
													<dl><dd>
													<input class="text-input" value="API 请求地址：  http://{{ $_SERVER["HTTP_HOST"] }}/access-token" readonly="true" type="text">
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
											<td style="width:220px;">
												账号 <div style="width:200px;position:relative;">
													<dl><dd>
													<input class="text-input" name="account" validation="/!empty:请填写账号/" placeholder="请填写账号" value="" type="text">
													</dd></dl>
												</div>
											</td>
											<td style="width:220px;">
												密码 <div style="width:200px;position:relative;">
													<dl><dd>
													<input class="text-input" name="password" validation="/password:请填写八位长密码/" placeholder="请填写八位长密码" value="" type="password">
													</dd></dl>
												</div>
											</td>
											<td>
											</td>
										</tr>
									</tbody>
								</table>
							</form>
						</div>