<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Login</title>
    <link rel="stylesheet" href="/js/jquery.datetimepicker.css" />
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/KTAnchor.css" rel="stylesheet">
    <script src="/js/jquery-1.11.3.min.js"></script>
    <script src="/js/jquery.datetimepicker.js"></script>
    <script src="/js/KTAnchor.js"></script>
    <script src="/js/vue-1.0.26.min.js"></script>
    <script src="/ckeditor/ckeditor.js"></script>
</head>


<body>

<div class="body-background" style="top:0;left:0;width:100%;height:100%;overflow:hidden;">
    <div class="body-background blur-10" style="background-image:url(/css/cn_bg.jpg)"></div>
</div>

<nav class="navbar navbar-inverse opacity-80" role="navigation">
    <div class="container">
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle"
                       data-toggle="dropdown">语言：简体中文
                        <span class="caret"></span></a>
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

<div class="cn-modal-dialog modal-dialog modal-my-sm opacity-95">
    <form action="/login" method="post">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" name="account" class="form-control" placeholder="请输入邮箱账号"
                           validation="/email:请输入邮箱账号/" value="">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" autocomplete="off"
                           placeholder="请输入密码"
                           validation="/password:请输入密码/" value="">
                </div>
                <div>
                    <label>
                        <input type="checkbox" name="remember" value="1"> 记住我
                    </label>
                    <span class="separator">·</span>
                    <a href="javascript:;" native="yes"
                       style="color:#0084b4">忘记密码了 ?</a>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">登录</button>
            </div>
        </div><!-- /.modal-content -->
    </form><!-- /.modal-form -->
</div><!-- /.modal-dialog -->

<div class="alert alert-danger" role="alert">
    <strong>Warning!</strong>
    <span class="alert-message"></span>
</div><!-- /.alert -->

<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
