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

<table class="table table-striped">
    <thead>
    <tr>
        <th>编号</th>
        <th>账户</th>
        <th>手机号</th>
        <th>邮箱</th>
        <th>头像</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $v)
    <tr>
        <td>{{$v->uid}}</td>
        <td>{{$v->uname}}</td>
        <td>{{$v->utel}}</td>
        <td>{{$v->uemail}}</td>
        <td>@if($v->uimg)<img src="{{env('UPLOAD_URL')}}{{$v->uimg}}" height="50" width="50">@endif</td>
        <td>
            <a href="javascript:;" onclick="del({{$v->uid}})" class="btn btn-danger">删除</a>
            <a href="{{url('/admin/update/'.$v->uid)}}" class="btn btn-default">编辑</a>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
</body>

<script>
    function del(uid){
        if(!uid){
            return;
        }
        if(confirm('是否删除')){
            $.get("/admin/destroy/"+uid,function(res){
                if(res.code="00000"){
                    location.reload();
                }
            },'json')
        }
    }
</script>

</html>