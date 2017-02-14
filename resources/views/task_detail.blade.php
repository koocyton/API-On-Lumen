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
				<td style="width:80px;vertical-align:top;padding:5px;text-align:center;">
					<span class="glyphicon glyphicon-user" style="font-size:60px;"></span>
					<div>{{ $task->author }}</div>
				</td>
				<td>
					<div class="panel panel-default">
						<div class="panel-heading">#{{ $task->id }} {{ $task->title }}</div>
						<div class="panel-body">
							{{ $task->description }}
						</div>
					</div>
				</td>
				<td rowspan="3" style="width:270px;vertical-align:top;padding-left:20px;">
					<div class="panel panel-default">
					  <div class="panel-body">
					    发起：{{ $task->author }}<br><br>

					    时间：{{ $task->created_at }}<br><br>

					    状态：{{ $task->created_at }}<br><br>

					    重要：{{ $task->created_at }}<br><br>

					    指派：{{ $task->owner }}<br>
					  </div>
					</div>
				</td>
			</tr>

			<tr>
				<td style="width:80px;vertical-align:top;padding:5px;text-align:center;">
					<span class="glyphicon glyphicon-user" style="font-size:60px;"></span>
					<div>{{ $task->author }}</div>
				</td>
				<td>
					<div class="panel panel-default">
						<div class="panel-heading">#{{ $task->id }} {{ $task->title }}</div>
						<div class="panel-body">
							{{ $task->description }}
						</div>
					</div>
				</td>
			</tr>

			<tr><td colspan="2">
				<hr style="height:1px;border:none;border-top:2px solid #ccc;" />
			</td></tr>

			<tr>
				<td style="width:80px;vertical-align:top;padding:5px;text-align:center;">
					更新状态
				</td>
				<td>
					<div class="form-group btn-group" data-toggle="buttons">
						<label class="btn btn-sm btn-default active">
							<input type="radio" name="status" value="0" autocomplete="off" checked="checked"> 补充
						</label>
						<label class="btn btn-sm btn-default">
							<input type="radio" name="status" value="1" autocomplete="off"> 新问题
						</label>
						<label class="btn btn-sm btn-default">
							<input type="radio" name="status" value="1" autocomplete="off"> 已解决
						</label>
						<label class="btn btn-sm btn-default">
							<input type="radio" name="status" value="1" autocomplete="off"> 重新指派
						</label>
					</div>
				</td>
			</tr>
			<tr>
				<td style="width:80px;vertical-align:top;padding:5px;text-align:center;">
					内容补充
				</td>
				<td>

					<div class="form-group">
						<textarea name="description" class="form-control" style="padding:10px;height:250px;resize:none;"></textarea>
					</div>

					<div class="form-group">
						<button class="btn btn-success btn-sm" type="submit">　提　交　</button>
					</div>

				</td>
			</tr>

		</table>


    </div>
