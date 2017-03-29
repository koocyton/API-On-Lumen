    <br>

    <div class="container">
      <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <div>
            <ul class="nav navbar-nav">
              <li><a href="javascript:;" style="margin:5px -10px;"><b>任务分配 / Bug 管理</b></a></li>
             </ul>
          </div>
          <div class="navbar-form navbar-right">
      			<form action="/task/list" method="get" role="search">
              <div class="form-group has-feedback" style="width:200px;">
                <input type="text" name="search" class="form-control" validation="/!empty:请填写搜索条件/">
                <span class="glyphicon glyphicon-search form-control-feedback" aria-hidden="true"></span>
              </div>
              <button class="btn btn-success btn-sm" style="margin-left:20px;" type="button" onclick="$.KTAnchor.popupLoader('/task/apply')">New !!</button>
      			</form><!--/form -->
          </div>
        </div><!--/.container-fluid -->
      </nav>
     </div>

     <div class="container">
      <table class="table table-hover table-bordered">
        <thead>
          <tr class="active">
      			<th>
              简述
            </td>
      			<th style="width:80px;text-align:center;">指派</td>
          </tr>
        </thead>
        <tbody>

<?php
foreach ($tasks as $task) {
    $status = empty($task->deleted_at) ? 'on' : 'off';
    ?>
          <tr onclick="$.KTAnchor.ajaxLoader('/task/{{ $task->id }}')" style="cursor:pointer;">
						<td class="bs-callout bs-callout-danger">
              <?php

    $tit = "";
    $tab = "";
    $col = "";
    if ($task->category == "bug") {
        $tit = "Bug";
        $tab = "B";
        $col = "label-danger";
    } else if ($task->category == "task") {
        $tit = "任务";
        $tab = "T";
        $col = "label-primary";
    } else if ($task->category == "doc") {
        $tit = "文档";
        $tab = "D";
        $col = "label-success";
    }

    $status_class = "";
    $status_title = "";
    if ($task->status == "process") {
        $status_class = "label-info";
        $status_title = "处理中";
    } else if ($task->status == "increase") {
        $status_class = "label-info";
        $status_title = "补充";
    } else if ($task->status == "resolve1") {
        $status_class = "label-success";
        $status_title = "解决";
    } else if ($task->status == "discard") {
        $status_class = "label-warning";
        $status_title = "打回";
    }
    ?>
    <span class="label {{ $col }}" data-toggle="tooltip" data-placement="left" title="{{ $tit }}">{{ $tab }}</span>
    <span style="display:inline-block;margin:0 5px;">#{{ $task->id }}</span>
            &nbsp;{{ $task->title }}

      <div style="float:right;">
        <span class="label {{ $status_class }}">{{ $status_title }}</span>
        <span style="margin-left:20px;">{{ substr($task->created_at, 0, 10) }}</span>
      </div>

    </td>
		<td style="text-align:center;">
			{{ $task->owner }}
		</td>
	</tr>
<?php }?>

        </tbody>
      </table>
    </div>


     <div class="container">
       <div class="paging-container" style="text-align:right;" total="{{ $paging->total }}" current="{{ $paging->current }}" limit="{{ $paging->limit }}"></div>
     </div>
