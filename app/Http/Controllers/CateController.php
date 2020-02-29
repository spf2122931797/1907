<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CateModel;
use App\Http\Requests\StoreCatePost;
class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = CateModel::all();
        $res = CreateTree($data);
        $c_name = request()->c_name??'';
        $where=[];
        if($c_name){
            $where[]=['c_name','like',"%$c_name%"];
        }
//        $res = CateModel::where($where)->get();
        return view("cate.index",['res'=>$res]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = CateModel::all();
        $cate = CreateTree($data);
        return view('cate.create',['cate'=>$cate]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCatePost $request)
    {
        $data = $request->except("_token");
        $res = CateModel::create($data);
        if($res){
            return redirect('/index');
        }
    }

    public function jscate(){
        $c_name = request()->c_name;
        $c_id = request()->c_id;
        $where=[];
        if($c_name){
            $where[]=['c_name','=',$c_name];
        }
        if($c_id){
            $where[]=['c_id','!=',$c_id];
        }
        $count = CateModel::where($where)->count();
        echo json_encode(['code'=>1,'msg'=>'ok','count'=>$count]);
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
    public function cate_edit($c_id)
    {
        $res = CateModel::find($c_id);
        return view('cate.cate_edit',['res'=>$res]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cate_update(StoreCatePost $request, $c_id)
    {
        $data = $request->except("_token");
        $res = CateModel::where('c_id',$c_id)->update($data);
        if($res!==false){
            return redirect('/index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_del($c_id)
    {
        $count = CateModel::where('p_id',$c_id)->count();
        if($count>0){
            echo "<script>alert('不能删除!有子分类')</script>";
        }else{
            $res = CateModel::destroy($c_id);
            if($res){
                echo json_encode(['code'=>'00000','msg'=>'ok']);
            }
        }
    }
}
