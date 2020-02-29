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
<form>
    <div class="col-sm-3">
        <input type="text" class="form-control" name="c_name" placeholder="请输入分类名称关键字">
    </div>
    <input type="submit" value="搜索" class="btn btn-danger">
</form>
<table class="table table-striped">
    <thead>
    <tr>
        <th>序号</th>
        <th>分类名称</th>
        <th>分类描述</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    @foreach($res as $v)
        <tr>
            <td>{{$v->c_id}}</td>
            <td>{{str_repeat('----',$v->level)}}{{$v->c_name}}</td>
            <td>{{$v->c_text}}</td>
            <td>
                <a href="javascript:;" onclick="del({{$v->c_id}})" class="btn btn-danger">删除</a>
                <a href="{{url('/cate_edit/'.$v->c_id)}}" class="btn btn-default">编辑</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<script>
    function del(c_id){
        if(!c_id){
            return;
        }
        if(confirm("是否删除")){
            $.get('/destroy_del/'+c_id,function(res){
                if(res.code=="00000"){
                    location.reload();
                }
            },'json')
        }
    }
</script>
</body>
</html>