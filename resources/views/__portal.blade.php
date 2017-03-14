<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AOL Manager</title>
    <!-- Datetimepicker -->
    <link rel="stylesheet" href="/js/jquery.datetimepicker.css" />
    <!-- Bootstrap -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- KTAnchor -->
    <link href="/css/KTAnchor.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="/js/jquery-1.11.3.min.js"></script>
    <script src="/js/jquery.datetimepicker.js"></script>
    <script src="/js/KTAnchor.js"></script>
    <script src="/js/vue-1.0.26.min.js"></script>
  </head>
  <body>

    <div class="body-background"></div>

    <div class="body-content">
      <div class="body-content-left scroll-container opacity-80">
        <div style="top:0px;position:relative;" id="main-menu"></div>
      </div>
      <div class="body-content-right scroll-container opacity-95">
      </div>
    </div>

    <nav class="navbar navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <a href="javascript:void(0);" class="navbar-brand"> &nbsp; AOL Manager</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="javascript:void(0);">{{ $user }}</a>
            </li>
            <li class="dropdown">
              <a href="javascript:;"  class="dropdown-toggle" data-toggle="dropdown" style="padding:8px 6px 4px 6px;"><span class="glyphicon glyphicon-cog" style="font-size:23px;"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li class="dropdown-menu-arrow"><b class="angle-up"></b></li>
                <li>
                  <a href="javascript:$.KTAnchor.popupLoader(null)"><span class="glyphicon glyphicon-list-alt"></span> &nbsp; 问题反馈</a>
                </li>
                <li>
                  <a href="javascript:$.KTAnchor.popupLoader(null)"><span class="glyphicon glyphicon-lock"></span> &nbsp; 账号安全</a>
                </li>
                <li>
                  <a href="javascript:$.KTAnchor.popupLoader('/sundry/icons')"><span class="glyphicon glyphicon-th"></span> &nbsp; 图标大全 &nbsp; <span class="badge">200</span></a>
                </li>
                <li>
                  <a pushstate="no" href="/login/signout" confirm="要退出登录么 ？"><span class="glyphicon glyphicon-log-out"></span> &nbsp; 退出</a>
                </li>
              </ul>
            </li>
          </ul>
        </div><!-- /#navbar -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->



    <div class="alert alert-danger" role="alert">
      <strong>Warning!</strong>
      <span class="alert-message"></span>
    </div><!-- /.alert -->

    <div class="popup-modal modal fade" id="popup-modal" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-my-lg">
          <div class="modal-content">
            <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title"> # </h4>
            </div>
            <div class="modal-body scroll-container"></div>
          </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.popup-modal -->

    <div class="confirm-modal modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-body"></div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success">确认</button>
            <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">取消</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.confirm-modal -->

    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <script>
    var menu_data = [
          {text:"运营 · 发行", menus:[
              {text:"广告管理", href:"/advert"},
              {text:"素材管理", href:"/resouse"},
              {text:"联盟管理", href:"/union"},
              {text:"数据统计", "open":false, menus:[
                  {text:"数据简报", href:"/bulletin"},
                  {text:"各项统计", href:"/count"},
                  {text:"优化分析", href:"/optimize"}
              ]}
          ]},
          {text:"项目研发", menus:[
              {text:"收集日志", href:"/log/list"},
              {text:"项目任务", badge:"{{ $task_count }}", href:"/task/list"},
              {text:"API 接口", href:"/project/api-manage", icon:"cog", open:false, menus:[
                  {text:"登录 GET /access-token", href:"/project/api-debug/access-token"},
                  {text:"频道列表 GET /channel-menu", href:"/project/api-debug/channel-menu"},
                  {text:"频道新闻 GET /channel-detail/{id}", href:"/project/api-debug/channel-detail"},
                  {text:"新闻内容 GET /news/{id}", href:"/project/api-debug/news"},
                  {text:"上传新闻 POST /news", href:"/project/api-debug/post-news"},
                  {text:"选择地区 UPDATE /region/{id}", href:"/project/api-debug/region/{id}"}
              ]},
              {text:"数据管理", href:"/project/data-manage", icon:"cog", open:false, menus:[
                  {text:"频道信息", href:"/project/data/channel"},
                  {text:"新闻列表", href:"/project/data/news"},
                  {text:"用户管理", href:"/project/data/user"},
              ]},
              {text:"项目文档", href:"/project/doc-manage"},
          ]},
          {text:"管理员", menus:[
              {text:"操作日志", href:"/operation/list"},
              {text:"权限管理", href:"/manager/list" },
              {text:"分组管理", href:"/grouping/list" },
              {text:"技术测试", open:false, menus:[
                  {text:"video js", href:"/test/video-js"},
                  {text:"vue js", href:"/test/vue"},
                  {text:"pixi html5", href:"/test/pixi"},
              ]},
          ]}
      ];
      $("#main-menu").html($.KTTreeMenuHTML.getMenuHtml(menu_data));
    </script>
  </body>
</html>
