    <br>

    <div class="container">
      <!-- Static navbar -->
      <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <div>
            <ul class="nav navbar-nav">
              <li><a href="javascript:;" style="margin:5px -10px;"><b>用户管理</b></a></li>
             </ul>
          </div>
          <div class="navbar-form navbar-right">
            <form action="/manager/list" method="get" role="search">
              <div class="form-group has-feedback" style="width:200px;">
                <input type="text" name="search" class="form-control" validation="/!empty:请填写搜索条件/">
                <span class="glyphicon glyphicon-search form-control-feedback" aria-hidden="true"></span>
              </div>
              <button class="btn btn-success btn-sm" style="margin-left:20px;" type="button" onclick="$.KTAnchor.popupLoader('/manager/apply')">New !!</button>
            </form><!--/form -->
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
            <th>
              #ID　账号
              <div style="float:right;">
                权限组　最近登录
              </div>
            </th>
          </tr>
        </thead>
        <tbody>
<?php
foreach ($managers as $manager) {
    $text_color = "#bbb";
    $text_decoration = "line-through";
    if (empty($manager->deleted_at)) {
        $text_color = "";
        $text_decoration = "";
    }
    ?>
          <tr onclick="$.KTAnchor.popupLoader('/manager/{{ $manager->id }}')" style="cursor:pointer;overflow:hidden;">
            <td>
              <span style="display:inline-block;margin:0 5px;">#{{ $manager->id }}</span>
              <span style="color:{{ $text_color  }};text-decoration:{{ $text_decoration }}">
                {{ $manager->username }}
              </span>
              <span style="color:{{ $text_color  }};text-decoration:{{ $text_decoration }}">
                < {{ $manager->account }} >
              </span>

              <div style="float:right;">
                <span style="margin-right:5px;">{{ $manager->groupings }}</span>
                <span data-toggle="tooltip" data-placement="left" title="{{ $manager->updated_at }}">

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
                </span>
              </div>
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


