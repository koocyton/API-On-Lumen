
				<div style="top:0px;position:relative;">
					<div style="padding:20px;">

					    <div class="radius-4 ct-nav">
							<table class="ct-nav-table">
								<tr>
									<td class="ct-nav-left">
										<b>　操作日志</b>
									</td>
									<td class="ct-nav-right">
			                            <div class="ct-nav-search">
			                                <form action="/operation/list" method="get">
			                                    <div class="input-box" style="width:200px;">
			                                        <dl>
			                                            <dd>
			                                                <input type="text" class="text-input" name="q" validation="/!empty:请填写搜索条件/" placeholder="请填写搜索条件" value="{{ empty($_GET["q"]) ? "" : $_GET["q"] }}" />
			                                            </dd>
					                                    <dd class="ct-clean-search radius-14" style="display:{{ empty($_GET["q"]) ? "none" : "block" }};">
					                                        <a href="/operation/list"><span>&#xf081;</span></a>
					                                    </dd>
			                                        </dl>
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
										<td style="width:80px;">ID</td>
										<td style="width:150px;">用户</td>
										<td style="width:130px;">时间</td>
										<td style="text-align:left;width:180px;">访问资源</td>
										<td style="text-align:left;">POST DATA</td>
									</tr>
    							</thead>
    							<tbody>
                                    <?php foreach ($operations as $operation) {?>
                                    <tr>
										<td>{{ $operation->id }}</td>
										<td>{{ $operation->manager_name }}</td>
										<td>{{ $operation->created_at }}</td>
										<td style="text-align:left;">&nbsp;{{ $operation->request_method }} /{{ $operation->request_uri }}</td>
										<td style="text-align:left;overflow:hidden;">{{ substr($operation->post_data, 0, 200) }}</td>
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
