    <br>
    <div class="container">

      <!-- Static navbar -->
      <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="javascript:;" style="margin:5px -10px;"><b>操作日志</b></a></li>
             </ul>

			<form action="/operation/list" method="get" class="navbar-form navbar-right" role="search">
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
			<th style="width:80px;">ID</th>
			<th style="width:160px;">用户</th>
			<th style="width:170px;">时间</th>
			<th style="text-align:left;width:180px;">访问资源</th>
			<th style="text-align:left;">POST DATA</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach ($operations as $operation) {?>
            <tr>
				<td>{{ $operation->id }}</td>
				<td>{{ $operation->manager_name }}</td>
				<td>{{ $operation->created_at }}</td>
				<td style="text-align:left;">&nbsp;{{ $operation->request_method }} /{{ $operation->request_uri }}</td>
				<td style="text-align:left;overflow:hidden;">{{ substr($operation->post_data, 0, 200) }}</td>
			</tr>
            <?php }?>
         </tbody>
       </table>
     </div>


     <div class="container">
       <div class="paging-container" style="text-align:right;" total="{{ $paging->total }}" current="{{ $paging->current }}" limit="{{ $paging->limit }}"></div>
     </div>
