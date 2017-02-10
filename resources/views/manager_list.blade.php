    <br>
    <div class="container">

      <!-- Static navbar -->
      <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="javascript:;" style="margin:5px -10px;"><b>权限管理</b></a></li>
             </ul>

			<form action="/manager/list" method="get" class="navbar-form navbar-right" role="search">
				<div class="form-group has-feedback">
          <div class="input-group" style="margin-right:40px;">
            <button class="btn btn-success button-btn" type="button" onclick="$.KTAnchor.popupLoader('/manager/apply')">New !!</button>
          </div>
					<div class="input-group">
						<input type="text" name="search" placeholder="搜索" value="" class="form-control">
						<span class="input-group-btn">
              <button class="btn btn-default" onclick='$(".search-bar").show();alert(1);' type="button">More</button>
            </span>
					</div>
				</div>
			</form>

          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
     </div>


     <div class="container">
      <div class="search-bar hidden" style="width:200px;background-color:#ccc;">
      这是 hide class 的实例
      </div>
     </div>

     <div class="container">
      <table class="table table-hover table-bordered">
        <thead>
          <tr class="active">
            <th style="width:70px;">ID</th>
            <th style="width:60px;">激活</th>
            <th style="width:200px;">账号</th>
            <th style="width:150px;">创建时间</th>
            <th style="width:230px;">最近登录</th>
            <th>权限</th>
          </tr>
        </thead>
        <tbody>
<?php
foreach ($managers as $manager) {
    $status = empty($manager->deleted_at) ? 'on' : 'off';
    ?>
          <tr>
            <td>{{ $manager->id }}</td>
            <td>
              <a pushstate="no" href="/manager/{{ $manager->id }}/switch"><img src="/image/switch_{{ $status }}.png" style="width:46px;"></a>
            </td>
            <td>
              <a class="normal-anchor" href="javascript:$.KTAnchor.popupLoader('/manager/{{ $manager->id }}')">{{ $manager->account }}</a>
            </td>
            <td>{{ $manager->created_at }}</td>
            <td>
<?php
if ($manager->updated_at == "0000-00-00 00:00:00") {
        echo "<span style=\"color:#bbb;\">从未登录</span>";
    } else {
        $ut = strtotime($manager->updated_at);
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
										<span>  {{ $manager->updated_at }}</span>
            </td>
            <td style="text-align:left;">
              <a href="javascript:$.KTAnchor.popupLoader('/manager/{{ $manager->id }}/privileges')">
                <button class="btn btn-default btn-xs" type="button">权限</button>
              </a>
            {{ $manager->privileges }}</td>
          </tr>
<?php
}
?>
        </tbody>
      </table>
    </div>


     <div class="container">
       <div class="paging-container" style="text-align:right;" total="{{ $paging->total }}" current="{{ $paging->current }}" limit="{{ $paging->limit }}"></div>
     </div>


