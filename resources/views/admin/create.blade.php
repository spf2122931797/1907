<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bootstrap 实例 - 水平表单</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

<form class="form-horizontal" role="form" action="{{url('admin/store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">账户：</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" id="uname" name="uname" placeholder="请输入账户">
            <b style="color: red">{{$errors->first('uname')}}</b>
        </div>
    </div>


    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">密码：</label>
        <div class="col-sm-3">
            <input type="password" class="form-control" id="" name="upwd" placeholder="请输入密码">
        </div>
    </div>

    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">确认密码：</label>
        <div class="col-sm-3">
            <input type="password" class="form-control" id="" name="upwds" placeholder="请输入密码">
        </div>
    </div>

    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">手机号：</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" id="" name="utel" placeholder="请输入手机号">
            <b style="color: red">{{$errors->first('utel')}}</b>
        </div>
    </div>

    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">邮箱：</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" id="" name="uemail" placeholder="请输入邮箱">
            <b style="color: red">{{$errors->first('uemail')}}</b>
        </div>
    </div>

    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">头像：</label>
        <div class="col-sm-3">
            <input type="file" class="form-control" id="" name="uimg">
        </div>
    </div>

    

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" id="button" class="btn btn-default" value="提交">
        </div>
    </div>
</form>
</body>
</html>

