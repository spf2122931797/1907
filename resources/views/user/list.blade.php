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
        <th>管理员名称</th>
        <th>身份</th>
        <th>用户管理</th>
        <th>货物管理</th>
        <th>出入库记录管理</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $v)
    <tr>
        <td>{{$v->uid}}</td>
        <td>{{$v->uname}}</td>
        <td>{{$v->ushen==1?'库管主管':'普通'}}</td>
        @if($v->ushen==1)
        <td><a href="{{'/user/admin/'.$v->uid}}">查看</a></td>
        @else
            <td></td>
        @endif
        <td><a href="">查看</a></td>
        <td><a href="">查看</a></td>
    </tr>
    @endforeach
    </tbody>
</table>
</body>


</html>