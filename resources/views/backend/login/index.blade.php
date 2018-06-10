<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Account Login</title>
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <script src="https://cdn.bootcss.com/angular.js/1.7.0/angular.min.js"></script>
    <script src="https://cdn.bootcss.com/angular.js/1.7.0/angular-route.min.js"></script>
</head>

<body>

    <div class="body-background" style="top:0;left:0;width:100%;height:100%;overflow:hidden;">
        <div class="body-background blur-10"></div>
    </div>

    <div class="body-content">
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
    </div>

    <nav class="navbar navbar-inverse" role="navigation">
    </nav>

</body>
</html>
