    <br>

    <div class="container">
      <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
			<ul class="nav navbar-nav">
				<li><a href="/task/list" style="margin:5px -10px;"><b>任务分配</b></a></li>
				<li><a style="margin:5px -10px;color:#aaa;"><b>/</b></a></li>
				<li><a style="margin:5px -10px;"><b>{{ $task->title }}</b></a></li>
			</ul>
        </div><!--/.container-fluid -->
      </nav>
    </div>

    <div class="container">


		<table style="width:100%;">

			<tr>
				<td>
					<div class="panel panel-default">
						<div class="panel-heading">
							#{{ $task->id }} {{ $task->title }}
							<div style="float:right;">
								<span class="glyphicon glyphicon-user" style="font-size:10px;"></span> {{ $managers[$task->author] }}
								<span class="glyphicon glyphicon-time" style="margin-left:10px;font-size:10px;"></span> {{ $task->created_at }}
							</div>
						</div>
						<div class="panel-body">
							<div style="white-space: pre-wrap">{{ $task->description }}</div>
						</div>
					</div>
				</td>
				<td rowspan="3" style="width:230px;vertical-align:top;padding-left:20px;">
					<div class="panel panel-default">
					  <div class="panel-body">

						<div>
							指派：
							<span class="label label-info">{{ $managers[$task->owner] }}</span>
						</div>

						<div style="margin-top:10px;">
							发起：
							<span class="label label-success">{{ $managers[$task->author] }}</span>
						</div>

					    <div style="margin-top:10px;">
							时间：
							<span>{{ $task->created_at }}</span>
						</div>
<?php
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
						<div style="margin-top:10px;">
							状态：
							<span class="label {{ $status_class }}">{{ $status_title }}</span>
						</div>

						<div class="tags-content" style="margin-top:10px;">
							TAG：
							<?php
							$tags = explode(",", $task->tags);
							foreach($tags as $tag)
							{
								echo "<span class=\"label label-default\">" . $tag . "</span>";
							}
							?>
						</div>

					  </div>
					</div>
				</td>
			</tr>
@foreach ($task_follows as $task_follow)
			<tr>
				<td>
					<div class="panel panel-default">
						<div class="panel-heading">
							#{{ $task_follow->id }} {{ $task_follow->title }}
							<div style="float:right;">
								<span class="glyphicon glyphicon-user" style="font-size:10px;"></span> {{ $managers[$task_follow->author] }}
								<span class="glyphicon glyphicon-time" style="margin-left:10px;font-size:10px;"></span> {{ $task_follow->created_at }}
							</div>
						</div>
						<div class="panel-body">
							<div style="white-space: pre-wrap">{{ $task_follow->description }}</div>
						</div>
					</div>
				</td>
			</tr>
@endforeach


		</table>
	</div>

    <div class="container" style="margin-top:20px;">
		<form action="/task/{{ $task->id }}/update" enctype="multipart/form-data" method="post">
			<table style="width:100%;">
				<tr>
					<td style="width:50px;vertical-align:top;padding:5px;text-align:center;">
						<span class="label label-primary">状态</span>
					</td>
					<td>
						<div class="form-group btn-group" data-toggle="buttons">
							<label class="btn btn-sm btn-default">
								<input type="radio" name="status" value="process" autocomplete="off"> 处理中
							</label>
							<label class="btn btn-sm btn-default active">
								<input type="radio" name="status" value="increase" autocomplete="off"  checked="checked"> 补充
							</label>
							<label class="btn btn-sm btn-default">
								<input type="radio" name="status" value="resolve" autocomplete="off"> 已解决
							</label>
							<label class="btn btn-sm btn-default">
								<input type="radio" name="status" value="discard" autocomplete="off"> 重新指派
							</label>
						</div>
					</td>
				</tr>
				<tr>
					<td style="vertical-align:top;padding:5px;text-align:center;">
						<span class="label label-primary">指派</span>
					</td>
					<td>
						<div class="form-group">
							<input type="text" name="owner" value="{{ $task->owner }}" class="tags-input" tags-data="{{ $manager_tags_data }}" >
						</div>
					</td>
				</tr>
				<tr>
					<td style="vertical-align:top;padding:5px;text-align:center;">
						<span class="label label-primary">简述</span>
					</td>
					<td>
						<div class="form-group">
							<input type="text" name="title" class="form-control" validation="/!empty:不能为空/">
						</div>
					</td>
				</tr>
				<tr>
					<td style="vertical-align:top;padding:5px;text-align:center;">
						<span class="label label-primary">内容</span>
					</td>
					<td>
						<div class="form-group">
							<textarea name="description" class="form-control" validation="/!empty:不能为空/" style="padding:10px;height:150px;resize:none;"></textarea>
						</div>
						<div class="form-group">
							<button class="btn btn-success btn-sm" type="submit">　提　交　</button>
						</div>

					</td>
				</tr>
			</table>
		</form>
    </div>
