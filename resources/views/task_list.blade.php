    <br>
    <div class="container">

      <!-- Static navbar -->
      <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="javascript:;" style="margin:5px -10px;"><b>任务分配 / Bug 管理</b></a></li>
             </ul>

			<form action="/task/list" method="get" class="navbar-form navbar-right" role="search">
				<div class="form-group has-feedback">
					<div class="input-group" style="margin-right:40px;">
						<button class="btn btn-success button-btn" type="button" onclick="$.KTAnchor.popupLoader('/task/apply')">New !!</button>
					</div>
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
			<th>简述</td>
			<th style="width:80px;">提交人</td>
			<th style="width:80px;">完成度</td>
			<th style="width:80px;">操作</td>
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


     <div class="container">
       <div class="paging-container" style="text-align:right;" total="{{ $paging->total }}" current="{{ $paging->current }}" limit="{{ $paging->limit }}"></div>
     </div>
