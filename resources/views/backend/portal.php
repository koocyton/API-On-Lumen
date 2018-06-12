<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Backend</title>
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
    <script src="/ckeditor/ckeditor.js"></script>

  </head>
  <body>

    <div class="body-background" style="top:0;left:0;width:100%;height:100%;overflow:hidden;">
      <div class="body-background blur-10" style="background-image:url(/css/{{ $locale }}_bg.jpg)"></div>
    </div>

    <div class="body-content">
      <div class="body-content-left scroll-container opacity-80">
        <div style="top:0px;position:relative;padding:0 0;" id="main-menu"></div>
      </div>
      <div class="body-content-right scroll-container opacity-92" id="main-content">
      </div>
    </div>

    <nav class="navbar navbar-inverse" role="navigation" style="background-color:rgba(0,0,0,0.68);">
      <div class="container">
        <div class="navbar-header">
          <a href="javascript:void(0);" class="navbar-brand">Backend</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="javascript:void(0);">Hello , <?=$manager->username?></a>
            </li>
            <li class="dropdown">
              <a href="javascript:;"  class="dropdown-toggle" data-toggle="dropdown" style="padding:8px 6px 4px 6px;"><span class="glyphicon glyphicon-cog" style="font-size:23px;"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li class="dropdown-menu-arrow"><b class="angle-up"></b></li>
                <li>
                  <a href="javascript:;">
                    <span class="glyphicon glyphicon-envelope"></span>　问题反馈
                  </a>
                </li>
                <li>
                  <a href="javascript:;">
                    <span class="glyphicon glyphicon-lock"></span>　账号安全
                  </a>
                </li>
                <li>
                  <a href="javascript:$.KTAnchor.popupLoader('/sundry/icons')">
                    <span class="glyphicon glyphicon-th"></span>　图标大全　
                    <span class="badge">200</span>
                  </a>
                </li>
                <li>
                  <a pushstate="no" href="/logout" confirm="要退出登录么 ？">
                    <span class="glyphicon glyphicon-log-out"></span>　退出
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div><!-- /#navbar -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->



    <div class="alert alert-danger opacity-95" role="alert">
      <strong>Warning!</strong>
      <span class="alert-message"></span>
    </div><!-- /.alert -->

    <div class="popup-modal modal fade" id="popup-modal" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-my-lg">
          <div class="modal-content opacity-95">
            <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title"> # </h4>
            </div>
            <div class="modal-body scroll-container" id="popup-container"></div>
          </div>
      </div>
    </div>

    <div class="confirm-modal modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content opacity-95">
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
          {text:"运营", menus:[
              {text:"公告系统", href:"/operate/notice"},
              {text:"用户管理", href:"/operate/user"},
              {text:"商品管理", href:"/operate/goods"},
              {text:"充值流水", href:"/operate/order"},
              {text:"消费详情", href:"/operate/consume"},
              {text:"数据分析", href:"/analysis/log", icon:"list-alt", menus:[
                  {text:"基础数据", href:"/analysis/online"},
                  {text:"充值统计", href:"/analysis/purchase"},
                  {text:"房间数据", href:"/analysis/room"},
                  {text:"消费统计", href:"/analysis/consume"}
              ]},
              {text:"工具", menus:[
                  {text:"充值系统", href:"/utils/purchase"},
                  {text:"用户 OAuth", href:"/utils/oauth"}
              ]}
          ]},

      <?php
      $managerList = array("koocyton@gmail.com","test@test.com");
      if (in_array($manager->account, $managerList)) {
      ?>
        {text:"Admin", menus:[
            {text:"管理员", href:"/manager"},
            {text:"权限组", href:"/grouping"}
        ]}
      <?php } ?>
      ];
      $("#main-menu").html($.KTTreeMenuHTML.getMenuHtml(menu_data));
    </script>
  </body>
</html>
