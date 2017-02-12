    <br>
    <div class="container">

      <!-- Static navbar -->
      <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <div>
            <ul class="nav navbar-nav">
              <li><a href="javascript:;" style="margin:5px -10px;"><b>权限分组管理</b></a></li>
             </ul>
            <div class="navbar-form navbar-right">
              <form action="/grouping/create" method="post" confirm="增加新分组 ?">
                <button class="btn btn-success btn-sm" style="margin-left:20px;" type="submit">
                  <span class="glyphicon glyphicon-plus"></span> 分组
                </button>
              </form>
            </div>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
     </div>

     <div class="container">
      <table class="table table-hover table-bordered">
        <tbody>

<?php
foreach ($groupings as $grouping) {
    $text_color = "#bbb";
    $text_decoration = "line-through";
    if (empty($grouping->deleted_at)) {
        $text_color = "";
        $text_decoration = "";
    }
    ?>
          <tr onclick="$.KTAnchor.popupLoader('/grouping/{{ $grouping->id }}')" style="cursor:pointer;overflow:hidden;">
						<td class="bs-callout bs-callout-danger">
              <span style="display:inline-block;margin:0 5px;">#{{ $grouping->id }}</span>
              <span style="color:{{ $text_color  }};text-decoration:{{ $text_decoration }}">&nbsp;{{ $grouping->name }}</span>

              <div style="float:right;">
              </div>

            </td>
          </tr>
<?php }?>

        </tbody>
      </table>
    </div>


     <div class="container">
       <div class="paging-container" style="text-align:right;" total="{{ $paging->total }}" current="{{ $paging->current }}" limit="{{ $paging->limit }}"></div>
     </div>
