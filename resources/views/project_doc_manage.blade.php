    <br>

    <div class="container">
      <!-- Static navbar -->
      <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <div>
            <ul class="nav navbar-nav">
              <li><a href="/project/doc-manage" style="margin:5px -10px;"><b> 文档管理 </b></a></li>
             </ul>
          </div>
          <div class="navbar-form navbar-right">
            <form action="/project/doc-manage" method="get" role="search">
              <div class="form-group has-feedback" style="width:200px;">
                <input type="text" name="search" class="form-control">
                <span class="glyphicon glyphicon-search form-control-feedback" aria-hidden="true"></span>
              </div>
              <button class="btn btn-success btn-sm" style="margin-left:20px;" type="button" onclick="$.KTAnchor.popupLoader('/project/doc-apply')">New !!</button>
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

     <div class="container doc-list">
      <ul>
<?php
foreach ($docs as $doc) {
    ?>
          <li class="radius-5" onclick="$.KTAnchor.popupLoader('/project/doc/{{ $doc->id }}')" style="cursor:pointer;overflow:hidden;">
            #{{ $doc->id }} {{ $doc->name }}
          </li>
<?php
}
?>
      </ul>
    </div>

     <div class="container">
       <div class="paging-container" style="text-align:right;" total="{{ $paging->total }}" current="{{ $paging->current }}" limit="{{ $paging->limit }}"></div>
     </div>