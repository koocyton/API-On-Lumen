<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
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

  </head>
  <body>

    <div class="body-background"></div>

    <nav class="navbar navbar-inverse" role="navigation">
      <div class="container">
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" native="yes" class="dropdown-toggle" data-toggle="dropdown"><?=$trans->get('login.Language');?>：<?=$trans->get('login.Location');?> <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li class="dropdown-menu-arrow"><b class="angle-up"></b></li>
                <li><a native="yes" href="?locale=cn">简体中文</a></li>
                <li><a native="yes" href="?locale=tw">繁體中文</a></li>
                <li><a native="yes" href="?locale=kr">한국어</a></li>
                <li><a native="yes" href="?locale=jp">日本語</a></li>
                <li><a native="yes" href="?locale=en">English</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /#navbar -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->

  	<div class="cn-modal-dialog modal-dialog modal-my-sm">
      <form action="/login/signin" method="post">
        <input type="password" style="position:absolute;top:-999px;"/>
    		<div class="modal-content">
    			<div class="modal-body">
    				<div class="form-group">
    					<input type="text" name="_account" class="form-control" autocomplete="off" placeholder="{{ $trans->get('login.Please enter account') }}" value="test@test.com">
    				</div>
    				<div class="form-group">
    					<input type="password" name="_password" class="form-control" autocomplete="off" placeholder="{{ $trans->get('login.Please enter password') }}" value="test@test.com">
    				</div>
    				<div>
    					<label>
    						<input type="checkbox" name="_remberme" value="1"> {{ $trans->get('login.Remember me') }}
    					</label>
    					<span class="separator">·</span>
    					<a href="javascript:;" native="yes" style="color:#0084b4">{{ $trans->get('login.Forgot password') }}</a>
    				</div>
    			</div>
    			<div class="modal-footer">
    				<button type="submit" class="btn btn-success">{{ $trans->get('login.Login') }}</button>
    			</div>
    		</div><!-- /.modal-content -->
      </form><!-- /.modal-form -->
  	</div><!-- /.modal-dialog -->

    <div class="alert alert-danger" role="alert">
      <strong>Warning!</strong>
      <span class="alert-message"></span>
    </div><!-- /.alert -->

    <script src="/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
