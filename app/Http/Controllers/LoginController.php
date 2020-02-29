<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoginModel;
class LoginController extends Controller
{
    public function logindo(){
        $data = request()->except("_token");
        $admin = LoginModel::where(['admin_name'=>$data['admin_name']])->first();
        $data['admin_pwd'] = encrypt($data['admin_pwd']);
        if($data['admin_pwd']!=$admin['admin_pwd']){
            session(['admin'=>$admin]);
            request()->session()->save();
            return redirect("/goods_create");
        }
        return redirect("/login")->with('msg','没有此用户或密码错误');
    }
}
