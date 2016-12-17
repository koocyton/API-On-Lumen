
				<div style="top:0px;position:relative;">
					<div style="padding:20px;">

					    <div class="radius-4 ct-nav">
							<table class="ct-nav-table">
								<tr>
									<td class="ct-nav-left">
										<b>　数据管理</b>
									</td>
									<td class="ct-nav-right">
										<div class="ct-nav-create dropdown-container" style="margin-right:15px;">
											<a href="javascript:;" title="新增管理员" style="display:inline-block;">
												<span class="octicon" style="font-size:13px;">&#xf05d;</span>
												<span class="octicon" style="font-size:25px;">&#xf018;</span>
											</a>
											<div class="pop-layout" style="top:38px;left:-60px;display:none;">
												<b class="angle-up" style="left:67px;top:-5px;"></b>
												<div class="content-board radius-4 shadow-3" style="width:278px;padding:20px;">
													<form action="/manager/create" method="post">
														<div style="margin-top:10px;">
															<div class="input-box" style="width:55px;">
																<span>邮箱</span>
															</div>
															<div class="input-box" style="width:205px;">
																<dl>
																	<dd>
																		<input type="text" class="text-input" name="email" placeholder="请填写一个邮箱" validation="/email:请填写合法的邮箱/" />
																	</dd>
																</dl>
															</div>
														</div>
														<div style="margin-top:10px;">
															<div class="input-box" style="width:55px;">
																<span>密码</span>
															</div>
															<div class="input-box" style="width:205px;">
																<dl>
																	<dd>
																		<input type="text" class="text-input" name="password" placeholder="输入 8~16 位长数字和字母" validation="/password:输入 8~16 位长数字和字母/" />
																	</dd>
																</dl>
															</div>
														</div>
														<div style="margin-top:10px;text-align:center;">
															<button type="submit" class="disable-btn">添加，并设置权限</button>
														</div>
												</form>
											  </div>
											</div>
										</div>
			                            <div class="ct-nav-search">
			                                <form action="/manager" method="get">
			                                    <div class="input-box" style="width:200px;">
			                                        <dl>
			                                            <dd>
			                                                <input type="text" class="text-input" name="q" validation="/!empty:请填写搜索条件/" placeholder="请填写搜索条件" value="" />
			                                            </dd>
			                                        </dl>
			                                    </div>
			                                    <div class="ct-search-icon">
			                                        <span style="font-family:octicons;font-size:23px;">&#xf02e;</span>
			                                    </div>
			                                </form>
			                            </div>
									</td>
								</tr>
							</table>
						</div>

                        <div style="margin-top:20px;">
                            <table class="list-table">
    							<thead>
    								<tr>
    									<?php
    									foreach($fields as $field=>$name)
    									{
    										$td_width = "";
    										//
    										if (in_array($field,['updated_at', 'created_at']))
    										{
    											$td_width = "120px;";
    										}
    										else if ($field=="deleted_at") {
    											$td_width = "80px;";
    											$name = "是否可用";
    										}
    									?>
										<td style="width:{{ $td_width }};">{{ $name }}</td>
										<?php
										}
										?>
										<td style="width:80px;">操作</td>
									</tr>
    							</thead>
    							<tbody>
                                    <?php
                                    foreach($data as $line)
                                    {
                                    	$status = empty($line->deleted_at) ? 'on' : 'off';
                                    ?>
                                    <tr>
    									<?php
    									foreach($fields as $field=>$name)
    									{
    										$field_value = $line->$field;
    										if (in_array($field,['updated_at', 'created_at', 'deleted_at'])) {
    											$field_value = date("Y-m-d H:i:s", $line->$field);
    										}
    										
    										/* if (in_array($field,['updated_at', 'created_at', 'deleted_at'])) {
    											$field_value = date("Y-m-d H:i:s", $line->$field);
    										} */
    										if (in_array($field,['deleted_at'])) {
    											$status = empty($line->deleted_at) ? 'on' : 'off';
	    									?>
											<td>
											<a href="/project/data-manage/{{ $key }}/{{ $line->id }}/switch" pushstate="no">
											<img src="/image/switch_{{ $status }}.png" style="width:50px;">
											</a>
											</td>
	    									<?php
	    									} else {
	    									?>
											<td>{{ $field_value }}</td>
										<?php
											}
										}
										?>
										<td><button type="button" class="button-btn" style="height:22px;line-height:22px;width:45px;">编辑</button></td>
									</tr>
                                    <?php }  ?>
                                </tbody>
                            </table>
                        </div>

                        <div style="margin-top:20px;">
                            <div class="paging-container" style="text-align:right;" total="<?php echo $paging["total"]?>" current="<?php echo $paging["current"]?>" limit="<?php echo $paging["limit"]?>"></div>
                        </div>

                    </div>
                </div>
