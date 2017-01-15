    <br>
    <div class="container">

      <!-- Static navbar -->
      <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="javascript:;" style="margin:5px -10px;"><b>数据管理</b></a></li>
             </ul>

			<form action="/manager/list" method="get" class="navbar-form navbar-right" role="search">
				<div class="form-group has-feedback">
					<div class="input-group">
						<input type="text" name="search" placeholder="搜索" value="" class="form-control">
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-search"></span>
						</span>
					</div>
				</div>
			</form>

          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
     </div>

     <div class="container">
      <table class="table table-hover table-bordered">
        <thead>
          <tr class="active">
<?php
foreach ($fields as $field => $name) {
    $th_width = "";
    if (in_array($field, ['updated_at', 'created_at'])) {
        $th_width = "120px;";
    } else if ($field == "deleted_at") {
        $th_width = "80px;";
        $name = "活动的";
    }
    echo "<th style=\"width:{$th_width};\">{$name}</td>";
}
?>
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


     <div class="container">
       <div class="paging-container" style="text-align:right;" total="{{ $paging->total }}" current="{{ $paging->current }}" limit="{{ $paging->limit }}"></div>
     </div>

