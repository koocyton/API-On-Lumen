    <br>
    <div class="container">

      <!-- Static navbar -->
      <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <div>
            <ul class="nav navbar-nav">
              <li><a href="javascript:;" style="margin:5px -10px;"><b>任务分配 / Bug 管理</b></a></li>
             </ul>
            <div class="navbar-form navbar-right">
              <button class="btn btn-success btn-sm" style="margin-left:20px;" type="button" onclick="$.KTAnchor.popupLoader('/grouping/apply')"><span class="glyphicon glyphicon-plus"></span> 分组</button>
            </div>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
     </div>

     <div class="container">
      <table class="table table-hover table-bordered">
        <thead>
          <tr class="active">
      			<th>
              组名
            </td>
      			<th style="width:80px;text-align:center;">开启</td>
          </tr>
        </thead>
        <tbody>

<?php
foreach ($groupings as $grouping) {
    $status = empty($grouping->deleted_at) ? 'on' : 'off';
    ?>
          <tr onclick="$.KTAnchor.popupLoader('/grouping/apply')" style="cursor:pointer;">
						<td class="bs-callout bs-callout-danger">

    <span style="display:inline-block;margin:0 5px;">#{{ $grouping->id }}</span>
            &nbsp;{{ $grouping->name }}

    </td>
		<td style="text-align:center;">
			{{ $grouping->owner }}
		</td>
	</tr>
<?php }?>

        </tbody>
      </table>
    </div>


     <div class="container">
       <div class="paging-container" style="text-align:right;" total="{{ $paging->total }}" current="{{ $paging->current }}" limit="{{ $paging->limit }}"></div>
     </div>
