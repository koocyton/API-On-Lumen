<popup-title style="display:none;" class="popup-title">配置权限 {{ $manager->account }}</popup-title>

<div class="container" style="width:800px;">
<form action="/manager/{{ $manager->id }}/update" enctype="multipart/form-data" method="post">
	<table class="">
		<tbody>

			<tr>
				<td style="width:90px;">
					<div class="form-group">　权限：</div>
				</td>
				<td>
					<div class="content-body" style="margin-top:5px;padding:0;">
							<form action="/manager/update/<?php echo $manager->id; ?>" method="post">
								<div style="height:25px;padding:0 0 0 20px;"><b>主控</b></div>
									<div style="height:25px;padding:0 0 0 40px;"><label>添加广告 <input type="checkbox" name="limits[]" value="advert" <?php echo empty($privileges_checked["advert"]) ? "" : "checked"; ?>></label></div>
									<div style="height:25px;padding:0 0 0 40px;"><label>添加素材 <input type="checkbox" name="limits[]" value="resouse" <?php echo empty($privileges_checked["resouse"]) ? "" : "checked"; ?>></label></div>
									<div style="height:25px;padding:0 0 0 40px;"><label>添加联盟 <input type="checkbox" name="limits[]" value="union" <?php echo empty($privileges_checked["union"]) ? "" : "checked"; ?>></label></div>
									<div style="height:25px;padding:0 0 0 27px;">
										<span class="octicon" style="font-size:12px;width:10px;padding:0 0 3px 0">&#xf0a3;</span>
										数据统计
									</div>
										<div style="height:25px;padding:0 0 0 60px;"><label>数据简报 <input type="checkbox" name="limits[]" value="bulletin" <?php echo empty($privileges_checked["bulletin"]) ? "" : "checked"; ?>></label></div>
										<div style="height:25px;padding:0 0 0 60px;"><label>各项统计 <input type="checkbox" name="limits[]" value="count" <?php echo empty($privileges_checked["count"]) ? "" : "checked"; ?>></label></div>
										<div style="height:25px;padding:0 0 0 60px;"><label>优化分析 <input type="checkbox" name="limits[]" value="optimize" <?php echo empty($privileges_checked["optimize"]) ? "" : "checked"; ?>></label></div>
								<div style="height:25px;padding:0 0 0 20px;"><b>管理员</b></div>
									<div style="height:25px;padding:0 0 0 40px;"><label>操作日志 <input type="checkbox" name="limits[]" value="log" <?php echo empty($privileges_checked["log"]) ? "" : "checked"; ?>></label></div>
									<div style="height:25px;padding:0 0 0 40px;"><label>权限管理 <input type="checkbox" name="limits[]" value="manager" <?php echo empty($privileges_checked["manager"]) ? "" : "checked"; ?>></label></div>
								<div style="height:25px;padding:0 0 0 20px;">
									<button button-class="submit-btn" type="submit" class="submit-btn">更新权限</button>
								</div>
							</form>
						</div>

                    </div>
                </div>
				</td>
			</tr>

		</tbody>
	</table>
</form>
</div>


