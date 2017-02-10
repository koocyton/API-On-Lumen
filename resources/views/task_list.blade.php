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
        			</form><!--/form -->

          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
     </div>

     <div class="container">
      <table class="table table-hover table-bordered">
        <thead>
          <tr class="active">
      			<th>简述</td>
      			<th style="width:80px;text-align:center;">指给</td>
          </tr>
        </thead>
        <tbody>

<?php
foreach ($tasks as $task) {
    $status = empty($task->deleted_at) ? 'on' : 'off';
    ?>
          <tr onclick="$.KTAnchor.popupLoader('/task/apply')">
						<td class="bs-callout bs-callout-danger">
              <?php
/*
    if ($task->status == "process") {
    echo '<span class="label label-primary">进行中</span>';
    } else if ($task->status == "resolve") {
    echo '<span class="label label-success">完成</span>';
    } else if ($task->status == "discard") {
    echo '<span class="label label-warning">抛弃</span>';
    } else {
    echo '';
    }
     */

    if ($task->category == "bug") {
        echo '<span class="label label-danger" data-toggle="tooltip" data-placement="left" title="Bug">B</span>';
    } else if ($task->category == "task") {
        echo '<span class="label label-primary" data-toggle="tooltip" data-placement="left" title="任务">T</span>';
    } else if ($task->category == "doc") {
        echo '<span class="label label-success" data-toggle="tooltip" data-placement="left" title="文档">D</span>';
    } else {
        echo '<span class="label label-default" data-toggle="tooltip" data-placement="left" title="未知">F</span>';
    }
    ?>
            &nbsp;{{ $task->title }}

            <div style="float:right;">{{ substr($task->created_at, 0, 10) }}</div>
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
