
				<div style="top:0px;position:relative;">
					<div style="padding:20px;">

					    <div class="radius-4 ct-nav">
							<table class="ct-nav-table">
								<tr>
									<td class="ct-nav-left">
										<b>　任务分配 / Bug 管理</b>
									</td>
									<td class="ct-nav-right">
										<div class="ct-nav-create" style="margin-right:15px;">
											<a href="javascript:$.KTAnchor.popupLoader('/task/apply')" title="新增 Task" style="display:inline-block;color:#000;">
												<span class="octicon" style="font-size:13px;">&#xf05d;</span>
												<span class="octicon" style="font-size:25px;">&#xf068;</span>
											</a>
										</div>
			                            <div class="ct-nav-search">
			                                <form action="/task/list" method="get">
			                                    <div class="input-box" style="width:200px;">
			                                        <dl>
			                                            <dd>
			                                                <input type="text" class="text-input" name="q" validation="/!empty:请填写搜索条件/" placeholder="请填写搜索条件" value="{{ empty($_GET["q"]) ? "" : $_GET["q"] }}" />
			                                            </dd>
					                                    <dd class="ct-clean-search radius-14" style="display:{{ empty($_GET["q"]) ? "none" : "block" }};">
					                                        <a href="/task/list"><span>&#xf081;</span></a>
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
										<td>简述</td>
										<td style="width:80px;">提交人</td>
										<td style="width:80px;">完成度</td>
										<td style="width:80px;">操作</td>
									</tr>
    							</thead>
    							<tbody>
                                    <?php
foreach ($tasks as $task) {
    $status = empty($task->deleted_at) ? 'on' : 'off';
    ?>
                                    <tr>
										<td>{{ $manager->id }}</td>
										<td>
											<a href="/manager/{{ $task->id }}/switch" pushstate="no">
											<img src="/image/switch_{{ $status }}.png" style="width:50px;">
											</a>
										</td>
										<td><a class="normal-anchor" href="/manager/{{ $task->id }}">{{ $manager->account }}</a></td>
										<td>{{ date("Y-m-d H:i:s", $task->created_at) }}</td>
										<td>
										<?php
if ($task->updated_at == "0000-00-00 00:00:00") {
        echo "<span style=\"color:#bbb;\">从未登录</span>";
    } else {
        $ut = $task->updated_at;
        $nt = time();
        $dt = $nt - $ut;
        // 一个小时内，显示多少分钟前
        if ($dt < 3600) {
            echo "<span style=\"color:red;\">" . floor($dt / 60) . " 分钟前</span>";
        }
        // 一个天内，显示多少小时前
        else if ($dt < 86400) {
            echo "<span style=\"color:red;\">" . floor($dt / 3600) . " 小时前</span>";
        }
        // 一周内，显示多少天前
        else if ($dt < 603800) {
            echo "<span style=\"color:blue;\">" . floor($dt / 86400) . " 天前</span>";
        }
        // 一月内，显示多少周前
        else if ($dt < 2678400) {
            echo "<span style=\"color:blue;\">" . floor($dt / 603800) . " 周前</span>";
        }
        // 一年内，显示多少月前
        else if ($dt < 31536000) {
            echo "<span style=\"color:green;\">" . floor($dt / 2678400) . " 月前</span>";
        } else {
            echo "<span style=\"color:green;\">" . floor($dt / 31536000) . " 年前</span>";
        }
    }
    ?>
										<span class="separator"> / </span>
										<span>  {{ date("Y-m-d H:i:s", $task->updated_at) }}</span>
										</td>
										<td style="text-align:left;"><?php echo $task->privileges; ?></td>
									</tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>

                        <div style="margin-top:20px;">
                            <div class="paging-container" style="text-align:right;" total="{{ $paging->total }}" current="{{ $paging->current }}" limit="{{ $paging->limit }}"></div>
                        </div>

                    </div>
                </div>
