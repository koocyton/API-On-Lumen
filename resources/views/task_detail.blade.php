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
		<div class="media">
			<div class="media-left">
				<a href="#">
					<span class="glyphicon glyphicon-user" style="font-size:40px;"></span>
				</a>
			</div>
			<div class="media-body">
				<h4 class="media-heading">#{{ $task->id }} {{ $task->title }}</h4>
				<pre>{{ $task->description }}</pre>
			</div>
		</div>


		<div class="media">
			<div class="media-left">
				<a href="#">
					<span class="glyphicon glyphicon-user" style="font-size:40px;"></span>
				</a>
			</div>
			<div class="media-body">
				<h4 class="media-heading">#{{ $task->id }} {{ $task->title }}</h4>
				<pre>{{ $task->description }}</pre>
			</div>
		</div>


		<div class="media">
			<div class="media-left">
				<a href="#">
					<span class="glyphicon glyphicon-user" style="font-size:40px;"></span>
				</a>
			</div>
			<div class="media-body">
				<h4 class="media-heading">#{{ $task->id }} {{ $task->title }}</h4>
				<pre>{{ $task->description }}</pre>
			</div>
		</div>
    </div>
