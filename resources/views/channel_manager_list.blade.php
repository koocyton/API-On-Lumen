
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
						@foreach ($channels as $channel)
							　<a href="javascript:$.KTIframe('#channel-demo', '/channel-manager/demo/{{ $channel->id }}')">
							{{ $channel->name }}
							</a>
						@endforeach
                        </div>

                        <div id="channel-demo" style="margin-top:20px;border:1px solid #aaa;width:460px;height:960px;">
                        </div>

                    </div>
                </div>
