<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Bootstrap -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- KTAnchor -->
    <link href="/bootstrap/css/KTAnchor.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <div class="body-background"></div>

    <div class="body-content">
      <div class="body-content-left scroll-container"></div>
      <div class="body-content-right scroll-container"></div>
    </div>

    <nav class="navbar navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <a href="javascript:void(0);" class="navbar-brand"> &nbsp; AOL Manager</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" native="yes" class="dropdown-toggle" data-toggle="dropdown" style="padding:6px;"><span class="glyphicon glyphicon-cog" style="font-size:24px;"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li class="dropdown-menu-arrow"><span class="glyphicon glyphicon-eject"></span></li>
                <li>
                  <a href="javascript:$.KTAnchor.popupLoader(null)"><span class="glyphicon glyphicon-list-alt"></span> &nbsp; 问题反馈</a>
                </li>
                <li>
                  <a href="javascript:$.KTAnchor.popupLoader(null)"><span class="glyphicon glyphicon-lock"></span> &nbsp; 账号安全</a>
                </li>
                <li>
                  <a href="javascript:$.KTAnchor.popupLoader('/sundry/icons')"><span class="glyphicon glyphicon-th"></span> &nbsp; 图标大全</a>
                </li>
                <li>
                  <a pushstate="no" href="/login/signout"><span class="glyphicon glyphicon-log-out"></span> &nbsp; 退出</a>
                </li>
              </ul>
            </li>
          </ul>
        </div><!-- /#navbar -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->



    <div class="alert alert-warning alert-dismissible" role="alert">
      <strong>Warning!</strong>
      <span class="alert-message"></span>
    </div><!-- /.alert -->

    <script src="/bootstrap/js/jquery-1.11.3.min.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <script src="/bootstrap/js/KTAnchor.js"></script>
  </body>
</html>
