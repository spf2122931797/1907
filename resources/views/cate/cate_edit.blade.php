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

<form class="form-horizontal" role="form" action="{{url('/cate_update/'.$res->c_id)}}" method="post">
    @csrf
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">分类名称：</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" id="lastname" value="{{$res->c_name}}" name="c_name" placeholder="请输入分类名称">
        </div>
    </div>


    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">分类描述：</label>
        <div class="col-sm-3">
            <textarea name="c_text" id="" cols="10" rows="5">{{$res->c_text}}</textarea>
        </div>
    </div>

    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">父级分类：</label>
        <div class="col-sm-3">
            <select name="p_id">
                <option value="0">--请选择--</option>
                <option value="1" {{$res->p_id==1?'selected':''}}>男士服装</option>
                <option value="2" {{$res->p_id==2?'selected':''}}>生鲜水果</option>
                <option value="3" {{$res->p_id==3?'selected':''}}>女士服装</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">编辑</button>
        </div>
    </div>
</form>
</body>
</html>
<script>
    var c_id = {{$res->c_id}}
    $.ajaxSetup({headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}});
    $(function(){
        $(document).on('click','#button',function(){
            var c_nameflag = true;
            var c_name = $("#c_name").val();
            var reg = /^[\u4e00-\u9fa50-9A-Za-z_]+$/;
            if(!reg.test(c_name)){
                $("#c_name").next().html("分类名称只能是中文、字母、数字、下划线组成");
                return;
            }
            $.ajax({
                url:"/jscate",
                data:{c_name:c_name,c_id:c_id},
                type:"post",
                async:false,
                dataType:"json",
                success:function(res){
                    if(res.count>0){
                        $("#c_name").next().html("分类名称已存在");
                        c_nameflag = false;
                    }
                }
            });
//            return;
            if(!c_nameflag){
                return;
            }

            //提交
            $('form').submit();
        });






        $(document).on('blur',"#c_name",function(){
            $(this).next().html("");
            var c_name = $(this).val();
            var reg = /^[\u4e00-\u9fa50-9A-Za-z_]+$/;
            if(!reg.test(c_name)){
                $(this).next().html('分类名称只能是中文、字母、数字、下划线组成');
                return;
            }
            $.ajax({
                url:"/jscate",
                data:{c_name:c_name,c_id:c_id},
                type:"post",
                dataType:"json",
                success:function(res){
                    if(res.count>0){
                        $("#c_name").next().html("分类名称已存在");
                    }
                }
            });
        });
    });
</script>