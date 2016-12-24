
				<div style="top:0px;position:relative;">
					<div style="padding:20px;">

					    <div class="radius-4 ct-nav">
							<table class="ct-nav-table">
								<tr>
									<td class="ct-nav-left">
										<b>　数据管理</b>
									</td>
									<td class="ct-nav-right">
			                            <div class="ct-nav-search">
			                                <form action="" method="get">
			                                    <div class="input-box" style="width:200px;">
			                                        <dl>
			                                            <dd>
			                                                <input type="text" class="text-input" name="q" validation="/!empty:请填写搜索条件/" placeholder="请填写搜索条件" value="{{ empty($_GET["q"]) ? "" : $_GET["q"] }}" />
			                                            </dd>
					                                    <dd class="ct-clean-search radius-14" style="display:{{ empty($_GET["q"]) ? "none" : "block" }};">
					                                        <a href="/project/data-manage/channel"><span>&#xf081;</span></a>
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
    									<?php
foreach ($fields as $field => $name) {
    $td_width = "";
    //
    if (in_array($field, ['updated_at', 'created_at'])) {
        $td_width = "120px;";
    } else if ($field == "deleted_at") {
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
foreach ($data as $line) {
    $status = empty($line->deleted_at) ? 'on' : 'off';
    ?>
                                    <tr>
    									<?php
foreach ($fields as $field => $name) {
        $field_value = $line->$field;
        if (in_array($field, ['updated_at', 'created_at', 'deleted_at'])) {
            $field_value = $line->$field;
        }

        /* if (in_array($field,['updated_at', 'created_at', 'deleted_at'])) {
        $field_value = date("Y-m-d H:i:s", $line->$field);
        } */
        if (in_array($field, ['deleted_at'])) {
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
										<td>
											<a href="javascript:$.KTAnchor.popupLoader('/project/data-manage/{{ $key }}/{{ $line->id }}')">
												<button type="button" class="button-btn" style="height:22px;line-height:22px;width:45px;">编辑</button>
											</a>
										</td>
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
