
				<div style="top:0px;position:relative;">
					<div style="padding:20px;">

					    <div class="radius-4 ct-nav">
							<table class="ct-nav-table">
								<tr>
									<td class="ct-nav-left">
										<b>　频道设置</b>
									</td>
									<td class="ct-nav-right">
										<div class="ct-nav-create dropdown-container" style="margin-right:15px;">
											<a href="javascript:;" title="新增 Task" style="display:inline-block;color:#000;">
												北京
												<span class="octicon" style="font-size:13px;">&#xf0a3;</span>
											</a>
											<div class="pop-layout" style="top:30px;left:-154px;display:none;">
												<b class="angle-up" style="left:174px;top:-5px;"></b>
												<div class="content-board radius-4 shadow-3">
													<div class="dropdown-menu" style="height:111px;width:204px;">
													  <ul>
														@foreach ($channels as $channel)
														<li><a class="radius-3" href="javascript:$.KTIframe('#channel-demo', '/channel-manager/demo/{{ $channel->id }}')">
														{{ $channel->name }}
														</a></li>
														@endforeach
													  </ul>
													</div>
											  	</div>
											</div>
										</div>
									</td>
								</tr>
							</table>
						</div>

                        <div style="margin-top:20px;">
							<table class="ct-nav-table">
								<tr>
									<td class="ct-nav-left" style="width:640px;">
										<div id="channel-demo" style="border:1px solid #aaa;width:640px;height:1136px;"></div>
									</td>
								</tr>
							</table>
                        </div>

                    </div>
                </div>
