<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Index;
use App\CateModel;
use App\GoodsModel;
use Illuminate\Support\Facades\Cache;


class IndexController extends Controller
{
    public function setcookie(){

        //第一种
        // return response('测试产生cookie')->cookie('name','张珊',5);
        //第二种cookie全局辅助函数
        // $cookie = cookie('name','admin',2);

        // return response('测试产生cookie2')->cookie($cookie);
        
        //第三种队列形式设置cookie
        // Cookie::queue(Cookie::make('age','18',2));
        //第四种
        // Cookie::queue(Cookie::make('number','100',2));
    }


    //前台首页
    public function index(){
        // echo request()->cookie('name');
        // $value = Cookie::get('number');
        // echo $value;
        $cate_res = cache('cate_res');
        $goods_res = cache('goods_res');
        if(!$cate_res){
            $cate_res = CateModel::where(['p_id'=>0])->get();
            cache(['cate_res'=>$cate_res],60*60*24*30);
        }
        if(!$goods_res){
            $goods_res = GoodsModel::where(['is_show'=>1])->get();
            cache(['goods_res'=>$goods_res],60*60*24*30);
        }
        
        return view('index.index',['cate_res'=>$cate_res,'goods_res'=>$goods_res]);
    }

    public function reg(){
        return view('index.reg');
    }

    public function prolist(){
        Cache::flush();
        $data = cache('data');
        if(!$data){
            $data = Index::get();
            cache(['data'=>$data],60*60*24*30);
        }
        return view('index.prolist',['data'=>$data]);
    }

    public function proinfo($id){
        Cache::flush();
        $data = cache('data');
        $g_id = request()->g_id;
        if(!$data){
            $data = Index::where('g_id',$id)->first();
            cache(['data'=>$data],60*60*24*30);
        }


        return view('index.proinfo',['data'=>$data]);
    }
}
