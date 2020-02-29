<?php
//无线级分类
function CreateTree($data,$p_id=0,$level=1){
    if( !$data){
        return;
    }
    static $arr = [];
    foreach($data as $k=>$v){
        if($v->p_id == $p_id){
            $v->level = $level;
            $arr[] = $v;
            CreateTree($data,$v->c_id,$level+1);
        }
    }
    return $arr;
}
//文件上传
function upload($filename){
    if(request()->file($filename)->isValid()){
        $file = request()->file($filename);
        $info = $file->store($filename);
        return $info;
    }
    exit("未获取文件");
}
?>