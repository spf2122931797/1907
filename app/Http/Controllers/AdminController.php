<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Admin::all();
        return view("admin.index",['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
       $data = $request->except('_token');

        if($data['upwd']!=$data['upwds']){
            return redirect("admin/create");die;
        }

       $data['upwd'] = encrypt($data['upwd']);
       $data['upwds'] = encrypt($data['upwds']);

        if($request->hasFile('uimg')){
            $data['uimg'] = upload('uimg');
        }
        // dd($data);


       $res = Admin::insert($data);
       if($res){
           return redirect('admin/index');
       }

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
    public function update($uid)
    {
        $data = Admin::find($uid);
        return view("admin.update",['data'=>$data]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_do(Request $request, $id)
    {
        $arr = $request->except('_token');
        if($request->hasFile('uimg')){
            $arr['uimg'] = upload('uimg');
        }

        $data = Admin::where('uid',$id)->update($arr);
        // dd($data);
        if($data){
            return redirect("admin/index");
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uid)
    {
        $data = Admin::destroy($uid);
        if($data){
            echo json_encode(['code'=>'00000','msg'=>'ok']);
        }
    }
}
