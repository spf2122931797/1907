<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bootstrap 实例 - 水平表单</title>
    <link rel="stylesheet" href="/static/css/bootstrap.min.css">
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/bootstrap.min.js"></script>
</head>
<body>
<b style="color: red">{{session('msg')}}</b>
<form class="form-horizontal" role="form" action="{{url('/logindo')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">账号：</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="admin_name" placeholder="请输入账号">
        </div>
    </div>

    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">密码：</label>
        <div class="col-sm-3">
            <input type="password" id="lastname" class="form-control" name="admin_pwd" placeholder="请输入密码">
        </div>
    </div>


    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">登录</button>
        </div>
    </div>
</form>

</body>
</html>