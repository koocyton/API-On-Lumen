
				<div style="top:0px;position:relative;">
					<div style="padding:20px;">

					    <div class="radius-4 ct-nav">
							<table class="ct-nav-table">
								<tr>
									<td class="ct-nav-left">
										<b>　频道设置</b>
									</td>
									<td class="ct-nav-right">
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

                        <div class="content-menu radius-5 content-border">
							@foreach ($channels as $channel)
								<a href="javascript:$.KTIframe('#channel-demo', '/channel-manager/demo/{{ $channel->id }}')">
									{{ $channel->name }}
								</a>
								<br>
							@endforeach
                        </div>

                    </div>
                </div>
