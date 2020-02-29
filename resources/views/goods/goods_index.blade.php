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
        <input type="text" class="form-control" value="{{$g_name}}" name="g_name" placeholder="请输入商品名称关键字">
    </div>
    <input type="submit" value="搜索" class="btn btn-danger">
</form>
<table class="table table-striped">
    <thead>
    <tr>
        <th>序号</th>
        <th>商品名称</th>
        <th>商品价格</th>
        <th>商品图片</th>
        <th>商品相册</th>
        <th>商品库存</th>
        <th>是否精品</th>
        <th>是否热销</th>
        <th>商品分类</th>
        <th>商品品牌</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    @foreach($res1 as $v)
        <tr>
            <td>{{$v->g_id}}</td>
            <td>{{$v->g_name}}</td>
            <td>{{$v->g_price}}</td>
            <td><img src="{{env('UPLOAD_URL')}}{{$v->g_img}}" width="50" height="50"></td>
            <td>
                @if($v->g_imgs)
                @php $info = explode('|',$v->g_imgs);@endphp
                @foreach($info as $vv)
                <img src="{{env('UPLOAD_URL')}}{{$vv}}" height="50" width="50">
                @endforeach
                @endif
            </td>
            <td>{{$v->g_num}}</td>
            <td>{{$v->is_boutique==1?'是':'否'}}</td>
            <td>{{$v->is_test==1?'是':'否'}}</td>
            <td>{{str_repeat('--',$v->level)}}{{$v->c_name}}</td>
            <td>{{$v->bname}}</td>
            <td>
                <a href="javascript:;" onclick="del({{$v->g_id}})" class="btn btn-danger">删除</a>
                <a href="{{url('/goods_edit/'.$v->g_id)}}" class="btn btn-default">编辑</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<tr><td>{{$res1->appends(['g_name'=>$g_name])->links()}}</td></tr>

<script>
    function del(g_id){
        if(!g_id){
            return;
        }
        if(confirm("是否删除")){
            $.get('/goods_destroy/'+g_id,function(res){
                if(res.code="00000"){
                    location.reload();
                }
            },'json')
        }
    }
</script>

</body>
</html>

