<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserModel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $data = UserModel::all();
        return view("user.list",['data'=>$data]);
    }

    public function admin(){
        $res = UserModel::all();
        return view('user.admin',['res'=>$res]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function user()
    {
       return view('user.user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function user_do(Request $request)
    {
        $data = request()->except("_token");
        $user = UserModel::where(['uname'=>$data['uname']])->first();
        $data['upwd'] = encrypt($data['upwd']);
        if($data){
            return redirect('user/list');
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
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uid)
    {
        $data = UserModel::destroy($uid);

        if($data){
            return redirect('user/list');
        }
    }
}
