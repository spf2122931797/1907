<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GoodsModel;
class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function goods_index()
    {
        //设置
        // session(['name'=>'zhangsan']);
        // request()->session()->save();

        //删除
        // session(['name'=>null]);
        // request()->session()->save();
        //获取
        // echo session('name');

        //设置
        // request()->session()->put('age',19);
        // request()->session()->save();

        //获取
        // echo request()->session()->get('age');
        //删除
        // request()->session()->forget('age');

        // dd(request()->session()->get('age'));




        $g_name = request()->g_name??'';
        $where=[];
        if($g_name){
            $where[]=['g_name','like',"%$g_name%"];
        }
        $pageSize = config("app.pageSize");
        $res1 = GoodsModel::where($where)->orderby('g_id','desc')->leftjoin('cate','goods.c_id','=','cate.c_id')->leftjoin('brand','goods.bid','=','brand.bid')->paginate($pageSize);
        return view("goods.goods_index",['res1'=>$res1,'g_name'=>$g_name,'pageSize'=>$pageSize]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function goods_create()
    {
        $brand_res = \DB::table('brand')->get();
        $data = \DB::table('cate')->get();
        $cate_res = CreateTree($data);
        return view("goods.goods_create",['brand_res'=>$brand_res,'cate_res'=>$cate_res]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function goods_store(Request $request)
    {
        $data = $request->except("_token");
        if($request->hasFile('g_img')){
            $data['g_img'] = upload('g_img');
        }

        if($data['g_imgs']){
            //多文件上传
            $info = $this->Moreupload('g_imgs');
            $data['g_imgs'] = implode('|',$info);
        }

        $res = GoodsModel::create($data);
        if($res){
            return redirect("/goods_index");
        }
    }

    function Moreupload($filename){
        $file = request()->file($filename);
        if(!is_array($file)){
            return;
        }
        foreach($file as $v){
            if($v->isValid()){
                $info[]=$v->store($filename);
            }
        }
        return $info;
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function goods_edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function goods_update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function goods_destroy($g_id)
    {
        $res = GoodsModel::destroy($g_id);
        if($res){
            echo json_encode(["code"=>"00000","msg"=>"ok"]);
        }
    }
}
