
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
                            <table class="list-table">
    							<thead>
    								<tr>
										<td style="width:80px;">ID</td>
									</tr>
    							</thead>
    							<tbody>
                                    <?php foreach ($channels as $channel) {?>
                                    <tr>
										<td>{{ $channel->id }}</td>
									</tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>

                        <div style="margin-top:20px;">
                            <div class="paging-container" style="text-align:right;" total="<?php echo $paging["total"]; ?>" current="<?php echo $paging["current"]; ?>" limit="<?php echo $paging["limit"]; ?>"></div>
                        </div>

                    </div>
                </div>
