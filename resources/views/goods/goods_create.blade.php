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

<form class="form-horizontal" role="form" action="{{url('/goods_store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">商品名称：</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" id="g_name" name="g_name" placeholder="请输入商品名称">
            <b style="color: red"></b>
        </div>
    </div>

    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">商品价格：</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" id="g_price" name="g_price" placeholder="请输入商品价格">
            <b style="color: red"></b>
        </div>
    </div>

    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">商品品牌：</label>
        <div class="col-sm-3">
            <select name="bid" id="">
                <option value="">--选择--</option>
                @foreach($brand_res as $v)
                    <option value="{{$v->bid}}">{{$v->bname}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">商品分类：</label>
        <div class="col-sm-3">
            <select name="c_id" id="">
                <option value="">--选择--</option>
                @foreach($cate_res as $v)
                    <option value="{{$v->c_id}}">{{str_repeat('----',$v->level)}}{{$v->c_name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">商品图片：</label>
        <div class="col-sm-3">
            <input type="file" name="g_img" multiple="multiple">
        </div>
    </div>

    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">商品相册：</label>
        <div class="col-sm-3">
            <input type="file" name="g_imgs[]" multiple="multiple">
        </div>
    </div>

    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">商品库存：</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" id="g_num" name="g_num" placeholder="请输入商品库存">
            <b style="color: red"></b>
        </div>
    </div>

    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">商品货号：</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" id="g_mail" name="g_mail" placeholder="请输入商品货号">
            <b style="color: red"></b>
        </div>
    </div>

    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">是否精品：</label>
        <div class="col-sm-3">
            <input type="radio" name="is_boutique" value="1" checked>是
            <input type="radio" name="is_boutique" value="2">否
        </div>
    </div>

    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">是否热销：</label>
        <div class="col-sm-3">
            <input type="radio" name="is_test" value="1" checked>是
            <input type="radio" name="is_test" value="2">否
        </div>
    </div>

    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">商品详情：</label>
        <div class="col-sm-3">
            <textarea name="g_desc" cols="30" rows="10"></textarea>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">添加</button>
        </div>
    </div>
</form>
</body>
</html>
<script>
    $(function(){
        //商品价格
        $(document).on("blur","#g_price",function(){
            $(this).next().html("");
            var g_price = $(this).val();
                if(!g_price){
                    $(this).next().html("商品价格不能为空");
                    return;
                }
        });

        //商品库存
        $(document).on("blur","#g_num",function(){
            $(this).next().html("");
            var g_num = $(this).val();
            if(!g_num){
                $(this).next().html("商品库存不能为空");
                return;
            }
        });

        //商品货号
        $(document).on("blur","#g_mail",function(){
            $(this).next().html("");
            var g_mail = $(this).val();
            if(!g_mail){
                $(this).next().html("商品货号不能为空");
                return;
            }
        });

        //商品名称
        $(document).on("blur","#g_name",function(){
            $(this).next().html("");
            var g_name = $(this).val();
            if(!g_name){
                $(this).next().html("商品名称不能为空");
                return;
            }
        });
    });
</script>