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

<form class="form-horizontal" role="form" action="{{url('/admin/update_do/'.$data->uid)}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">账户：</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" id="" name="uname" value="{{$data->uname}}" placeholder="请输入账户">
            <b style="color: red"></b>
        </div>
    </div>


    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">手机号：</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" id="" name="utel" value="{{$data->utel}}" placeholder="请输入手机号">
        </div>
    </div>

    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">邮箱：</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" id="" name="uemail" value="{{$data->uemail}}" placeholder="请输入邮箱">
        </div>
    </div>

    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">头像：</label>
        <div class="col-sm-3">
        <img src="{{env('UPLOAD_URL')}}{{$data->uimg}}" height="50" width="50">
            <input type="file" class="form-control" id="" name="uimg">
        </div>
    </div>

    

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" id="button" class="btn btn-default" value="修改">
        </div>
    </div>
</form>
</body>
</html>