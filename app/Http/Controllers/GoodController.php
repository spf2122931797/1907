<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GoodsModel;
use App\CateModel;

class GoodController extends Controller
{
    //前台列表展示
    
    public function good(){
    	
    	$c_id = request()->c_id??'';
    	$where = [];
    	if($c_id){
    		$where[]=['goods.c_id','=',$c_id];
    	}
    	$g_name = request()->g_name??'';
    	if($g_name){
    		$where[]=['goods.g_name','like',"%$g_name%"];
    	}
    	


    	//获取分类数据
    	$cate = CateModel::get();

    	$pageSize = config('app.pageSize');
    	$data = GoodsModel::leftjoin('cate','goods.c_id','=','cate.c_id')->where($where)->paginate($pageSize);
    	$query = request()->all();
    	// dd($where);
    	
    	return view('good.good',['data'=>$data,'cate'=>$cate]);
    }
   
}
